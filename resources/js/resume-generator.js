// Resume Generator - Vanilla JavaScript Implementation
import axios from 'axios';
import './config/api-manager';

class ResumeGenerator {
    constructor() {
        this.apiManager = window.ApiManager;
        this.init();
    }

    init() {
        // Wait for DOM to be ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => this.setupEventListeners());
        } else {
            this.setupEventListeners();
        }
    }

    setupEventListeners() {
        const form = document.getElementById('resume-form');
        const generateBtn = document.getElementById('generate-btn');
        const clearBtn = document.getElementById('clear-btn');
        const downloadBtn = document.getElementById('download-btn');

        if (form) {
            form.addEventListener('submit', (e) => this.handleSubmit(e));
        }

        if (clearBtn) {
            clearBtn.addEventListener('click', () => this.clearForm());
        }

        if (downloadBtn) {
            downloadBtn.addEventListener('click', () => this.downloadPDF());
        }
    }

    async handleSubmit(e) {
        e.preventDefault();
        
        const formData = new FormData(e.target);
        const userData = Object.fromEntries(formData.entries());
        
        this.showLoading(true);
        this.clearError();

        try {
            const resume = await this.generateResumeWithRetry(userData);
            this.displayResume(resume);
        } catch (error) {
            console.error('Resume generation failed:', error);
            this.showError('Failed to generate resume. Please try again.');
        } finally {
            this.showLoading(false);
        }
    }

    async generateResumeWithRetry(userData) {
        const retryConfig = this.apiManager.getRetryConfig();
        let lastError;

        for (let attempt = 1; attempt <= retryConfig.attempts; attempt++) {
            try {
                // Try primary API
                return await this.callAPI(userData, this.apiManager.getCurrentConfig(), 'primary');
            } catch (error) {
                lastError = error;
                console.warn(`Primary API attempt ${attempt} failed:`, error.message);

                // Try fallback if enabled and this is the last attempt
                if (attempt === retryConfig.attempts && this.apiManager.config.fallback.enabled) {
                    try {
                        console.log('Trying fallback API...');
                        return await this.callAPI(userData, this.apiManager.getFallbackConfig(), 'fallback');
                    } catch (fallbackError) {
                        console.error('Fallback API also failed:', fallbackError.message);
                        throw fallbackError;
                    }
                }

                // Wait before retry (except on last attempt)
                if (attempt < retryConfig.attempts) {
                    const delay = retryConfig.delay * Math.pow(retryConfig.backoff, attempt - 1);
                    await new Promise(resolve => setTimeout(resolve, delay));
                }
            }
        }

        throw lastError;
    }

    async callAPI(userData, config, apiType) {
        if (apiType === 'primary' && this.apiManager.config.primary.type === 'backend') {
            return await this.callBackendAPI(userData, config);
        } else if (apiType === 'primary' && this.apiManager.config.primary.type === 'openai') {
            return await this.callOpenAIAPI(userData, config);
        } else if (apiType === 'fallback' && this.apiManager.config.fallback.type === 'backend') {
            return await this.callBackendAPI(userData, config);
        } else if (apiType === 'fallback' && this.apiManager.config.fallback.type === 'openai') {
            return await this.callOpenAIAPI(userData, config);
        }
    }

    async callBackendAPI(userData, config) {
        const response = await axios.post(
            `${config.baseURL}${config.endpoint}`,
            userData,
            {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }
        );

        if (response.data.error) {
            throw new Error(response.data.error);
        }

        return response.data.resume;
    }

    async callOpenAIAPI(userData, config) {
        if (!config.apiKey) {
            throw new Error('OpenAI API key not configured');
        }

        const prompt = this.buildPrompt(userData);
        
        const response = await axios.post(
            `${config.baseURL}/chat/completions`,
            {
                model: config.model,
                messages: [
                    { role: 'system', content: 'You are a professional resume writer.' },
                    { role: 'user', content: prompt }
                ],
                temperature: config.temperature
            },
            {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${config.apiKey}`
                }
            }
        );

        return response.data.choices[0].message.content;
    }

    buildPrompt(userData) {
        let prompt = "You are a professional resume writer. Based on the following data, generate a complete and polished resume:\\n\\n";
        prompt += "Personal Info:\\n";
        prompt += `Name: ${userData.name || '{{name}}'}\\n`;
        prompt += `Email: ${userData.email || '{{email}}'}\\n`;
        prompt += `Phone: ${userData.phone || '{{phone}}'}\\n\\n`;
        prompt += "Academic Background:\\n";
        prompt += `- ${userData.degree || '{{degree}}'} at ${userData.institute || '{{institute}}'}, ${userData.year || '{{year}}'}, ${userData.grade || '{{grade}}'}\\n\\n`;
        prompt += "Professional Experience:\\n";
        prompt += `- Role: ${userData.role || '{{role}}'} at ${userData.company || '{{company}}'}, Duration: ${userData.duration || '{{duration}}'}, Responsibilities: ${userData.desc || '{{desc}}'}\\n\\n`;
        prompt += `Skills:\\n${userData.skills || '{{skills}}'}\\n\\n`;
        prompt += "Job Target:\\n";
        prompt += `${userData.job_title || '{{job_title}}'} at ${userData.job_company || '{{job_company}}'}. Here's the job description: ${userData.job_description || '{{job_description}}'}\\n\\n`;
        prompt += "Please return the full resume in professional format.";
        
        return prompt;
    }

    showLoading(show) {
        const loadingEl = document.getElementById('loading');
        const generateBtn = document.getElementById('generate-btn');
        
        if (loadingEl) {
            loadingEl.style.display = show ? 'block' : 'none';
        }
        
        if (generateBtn) {
            generateBtn.disabled = show;
            generateBtn.textContent = show ? 'Generating Resume...' : 'Generate Resume';
        }
    }

    showError(message) {
        const errorEl = document.getElementById('error-message');
        if (errorEl) {
            errorEl.textContent = message;
            errorEl.style.display = 'block';
        }
    }

    clearError() {
        const errorEl = document.getElementById('error-message');
        if (errorEl) {
            errorEl.style.display = 'none';
        }
    }

    displayResume(resumeContent) {
        const previewEl = document.getElementById('resume-preview');
        const downloadBtn = document.getElementById('download-btn');
        const placeholderEl = document.getElementById('placeholder');
        
        if (previewEl) {
            previewEl.innerHTML = resumeContent.replace(/\\n/g, '<br>');
            previewEl.style.display = 'block';
        }
        
        if (downloadBtn) {
            downloadBtn.style.display = 'inline-block';
        }
        
        // Hide placeholder
        if (placeholderEl) {
            placeholderEl.style.display = 'none';
        }
    }

    clearForm() {
        const form = document.getElementById('resume-form');
        const previewEl = document.getElementById('resume-preview');
        const downloadBtn = document.getElementById('download-btn');
        
        if (form) {
            form.reset();
        }
        
        if (previewEl) {
            previewEl.innerHTML = '';
            previewEl.style.display = 'none';
        }
        
        if (downloadBtn) {
            downloadBtn.style.display = 'none';
        }
        
        this.clearError();
    }

    async downloadPDF() {
        const previewEl = document.getElementById('resume-preview');
        const nameInput = document.querySelector('input[name="name"]');
        const filename = nameInput ? `${nameInput.value || 'resume'}.pdf` : 'resume.pdf';
        
        if (previewEl && window.html2pdf) {
            const opt = {
                margin: 1,
                filename: filename,
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            
            html2pdf().set(opt).from(previewEl).save();
        } else {
            alert('PDF generation library not loaded. Please refresh the page and try again.');
        }
    }

    // Method to update API configuration easily
    updateApiConfig(newConfig) {
        this.apiConfig = { ...this.apiConfig, ...newConfig };
    }
}

// Initialize the resume generator when the script loads
new ResumeGenerator();