import axios from 'axios';
import API_CONFIG from '../config/apiConfig';

class ResumeService {
    constructor() {
        this.config = API_CONFIG;
    }

    /**
     * Generate resume using the configured strategy
     * @param {Object} userData - User data for resume generation
     * @returns {Promise<string>} Generated resume content
     */
    async generateResume(userData) {
        try {
            if (this.config.strategy === 'backend') {
                return await this.generateResumeViaBackend(userData);
            } else {
                return await this.generateResumeViaDirect(userData);
            }
        } catch (error) {
            console.error('Resume generation failed:', error);
            
            // Try fallback strategy if primary fails
            if (this.config.strategy === 'backend') {
                console.log('Trying direct API as fallback...');
                return await this.generateResumeViaDirect(userData);
            } else {
                console.log('Trying backend API as fallback...');
                return await this.generateResumeViaBackend(userData);
            }
        }
    }

    /**
     * Generate resume via Laravel backend
     * @param {Object} userData 
     * @returns {Promise<string>}
     */
    async generateResumeViaBackend(userData) {
        const response = await axios.post(
            `${this.config.BACKEND_API.baseURL}${this.config.BACKEND_API.endpoints.generateResume}`,
            userData,
            {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            }
        );

        if (response.data.error) {
            throw new Error(response.data.error);
        }

        return response.data.resume;
    }

    /**
     * Generate resume via direct OpenAI API call
     * @param {Object} userData 
     * @returns {Promise<string>}
     */
    async generateResumeViaDirect(userData) {
        if (!this.config.OPENAI_API.apiKey) {
            throw new Error('OpenAI API key not configured for direct access');
        }

        const prompt = this.buildPrompt(userData);
        
        const response = await axios.post(
            `${this.config.OPENAI_API.baseURL}/chat/completions`,
            {
                model: this.config.OPENAI_API.model,
                messages: [
                    { role: 'system', content: 'You are a professional resume writer.' },
                    { role: 'user', content: prompt }
                ],
                temperature: this.config.OPENAI_API.temperature
            },
            {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${this.config.OPENAI_API.apiKey}`
                }
            }
        );

        return response.data.choices[0].message.content;
    }

    /**
     * Build prompt for resume generation
     * @param {Object} userData 
     * @returns {string}
     */
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

    /**
     * Update API configuration
     * @param {Object} newConfig 
     */
    updateConfig(newConfig) {
        this.config = { ...this.config, ...newConfig };
    }

    /**
     * Switch API strategy
     * @param {string} strategy - 'backend' or 'direct'
     */
    switchStrategy(strategy) {
        this.config.strategy = strategy;
    }
}

export default new ResumeService();