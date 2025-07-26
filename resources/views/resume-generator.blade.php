<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AI Resume Generator</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Fallback Inline Styles -->
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; line-height: 1.6; color: #333; }
        .resume-generator { min-height: 100vh; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 20px 0; }
        .container { max-width: 1400px; margin: 0 auto; padding: 0 20px; }
        .title { text-align: center; color: white; font-size: 2.5rem; margin-bottom: 30px; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); }
        .content-wrapper { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; }
        @media (max-width: 768px) { .content-wrapper { grid-template-columns: 1fr; } }
        .form-section, .preview-section { background: white; border-radius: 15px; padding: 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
        .form-group { margin-bottom: 25px; }
        .form-group h3 { color: #333; margin-bottom: 15px; font-size: 1.2rem; border-bottom: 2px solid #667eea; padding-bottom: 5px; }
        .form-group input, .form-group textarea { width: 100%; padding: 12px; border: 2px solid #e1e5e9; border-radius: 8px; font-size: 14px; margin-bottom: 10px; transition: border-color 0.3s ease; }
        .form-group input:focus, .form-group textarea:focus { outline: none; border-color: #667eea; box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1); }
        .form-group textarea { resize: vertical; min-height: 80px; }
        .form-actions { display: flex; gap: 15px; margin-top: 30px; }
        .btn { padding: 12px 24px; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; text-decoration: none; display: inline-block; text-align: center; }
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .btn-primary:hover:not(:disabled) { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4); }
        .btn-primary:disabled { opacity: 0.6; cursor: not-allowed; }
        .btn-secondary { background: #6c757d; color: white; }
        .btn-secondary:hover { background: #5a6268; transform: translateY(-2px); }
        .btn-download { background: #28a745; color: white; }
        .btn-download:hover { background: #218838; transform: translateY(-2px); }
        .preview-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding-bottom: 15px; border-bottom: 2px solid #e1e5e9; }
        .preview-header h3 { color: #333; margin: 0; }
        .resume-preview { background: #f8f9fa; border: 1px solid #e1e5e9; border-radius: 8px; padding: 30px; min-height: 500px; font-family: 'Times New Roman', serif; line-height: 1.6; color: #333; }
        .resume-preview h1, .resume-preview h2, .resume-preview h3 { color: #2c3e50; margin-top: 20px; margin-bottom: 10px; }
        .resume-preview h1 { font-size: 24px; text-align: center; border-bottom: 2px solid #2c3e50; padding-bottom: 10px; }
        .resume-preview h2 { font-size: 18px; border-bottom: 1px solid #bdc3c7; padding-bottom: 5px; }
        .resume-preview h3 { font-size: 16px; }
        .resume-preview p, .resume-preview li { margin-bottom: 8px; }
        .resume-preview ul { padding-left: 20px; }
        .placeholder { display: flex; align-items: center; justify-content: center; height: 400px; color: #666; text-align: center; font-style: italic; }
        .loading { display: flex; flex-direction: column; align-items: center; justify-content: center; height: 400px; color: #667eea; }
        .spinner { width: 40px; height: 40px; border: 4px solid #f3f3f3; border-top: 4px solid #667eea; border-radius: 50%; animation: spin 1s linear infinite; margin-top: 15px; }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
        .error-message { background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; border: 1px solid #f5c6cb; margin-bottom: 20px; }
        .error-message p { margin: 0; }
    </style>
    
    <!-- HTML2PDF Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
</head>
<body>
    <div class="resume-generator">
        <div class="container">
            <h1 class="title">AI Resume Generator</h1>
            
            <div class="content-wrapper">
                <!-- Form Section -->
                <div class="form-section">
                    <form id="resume-form" class="resume-form">
                        <div class="form-group">
                            <h3>Personal Information</h3>
                            <input type="text" name="name" placeholder="Full Name" required>
                            <input type="email" name="email" placeholder="Email Address" required>
                            <input type="tel" name="phone" placeholder="Phone Number" required>
                        </div>

                        <div class="form-group">
                            <h3>Academic Background</h3>
                            <input type="text" name="degree" placeholder="Degree (e.g., Bachelor of Computer Science)" required>
                            <input type="text" name="institute" placeholder="Institute/University" required>
                            <input type="text" name="year" placeholder="Graduation Year" required>
                            <input type="text" name="grade" placeholder="Grade/GPA">
                        </div>

                        <div class="form-group">
                            <h3>Professional Experience</h3>
                            <input type="text" name="role" placeholder="Job Role/Position" required>
                            <input type="text" name="company" placeholder="Company Name" required>
                            <input type="text" name="duration" placeholder="Duration (e.g., Jan 2020 - Dec 2022)" required>
                            <textarea name="desc" placeholder="Job Responsibilities and Achievements" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <h3>Skills</h3>
                            <textarea name="skills" placeholder="List your skills (e.g., JavaScript, React, Node.js, Python)" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <h3>Job Target</h3>
                            <input type="text" name="job_title" placeholder="Target Job Title" required>
                            <input type="text" name="job_company" placeholder="Target Company">
                            <textarea name="job_description" placeholder="Job Description (paste the job posting here)" rows="4"></textarea>
                        </div>

                        <div class="form-actions">
                            <button type="submit" id="generate-btn" class="btn btn-primary">Generate Resume</button>
                            <button type="button" id="clear-btn" class="btn btn-secondary">Clear Form</button>
                        </div>
                    </form>
                </div>

                <!-- Preview Section -->
                <div class="preview-section">
                    <div id="error-message" class="error-message" style="display: none;">
                        <p></p>
                    </div>

                    <div id="loading" class="loading" style="display: none;">
                        <p>Generating your resume...</p>
                        <div class="spinner"></div>
                    </div>

                    <div class="resume-preview-container">
                        <div class="preview-header">
                            <h3>Generated Resume</h3>
                            <button id="download-btn" class="btn btn-download" style="display: none;">Download PDF</button>
                        </div>
                        
                        <div id="resume-preview" class="resume-preview" style="display: none;">
                            <!-- Generated resume will appear here -->
                        </div>
                    </div>

                    <div class="placeholder" id="placeholder">
                        <p>Fill out the form and click "Generate Resume" to see your AI-generated resume here.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    <!-- Fallback Inline JavaScript -->
    <script>
        // Fallback JavaScript in case external file doesn't load
        if (typeof window.resumeGeneratorLoaded === 'undefined') {
            document.addEventListener('DOMContentLoaded', function() {
                console.log('Using fallback JavaScript');
                
                const form = document.getElementById('resume-form');
                const generateBtn = document.getElementById('generate-btn');
                const clearBtn = document.getElementById('clear-btn');
                const downloadBtn = document.getElementById('download-btn');
                const previewEl = document.getElementById('resume-preview');
                const loadingEl = document.getElementById('loading');
                const errorEl = document.getElementById('error-message');
                const placeholderEl = document.getElementById('placeholder');

                if (form) {
                    form.addEventListener('submit', async function(e) {
                        e.preventDefault();
                        console.log('Form submitted (fallback)');
                        
                        // Show loading
                        if (loadingEl) loadingEl.style.display = 'block';
                        if (generateBtn) {
                            generateBtn.disabled = true;
                            generateBtn.textContent = 'Generating Resume...';
                        }
                        if (errorEl) errorEl.style.display = 'none';
                        if (placeholderEl) placeholderEl.style.display = 'none';
                        
                        // Get form data
                        const formData = new FormData(form);
                        const userData = {};
                        for (let [key, value] of formData.entries()) {
                            userData[key] = value;
                        }
                        
                        console.log('Form data:', userData);
                        
                        try {
                            // First test basic connectivity
                            console.log('Testing basic connectivity...');
                            try {
                                const testResponse = await fetch('/test-api');
                                const testData = await testResponse.json();
                                console.log('Test API response:', testData);
                            } catch (testError) {
                                console.log('Test API failed:', testError.message);
                            }
                            
                            // Try multiple URL patterns to find the working one
                            const possibleUrls = [
                                '/api/resume/generate',
                                `${window.location.origin}/api/resume/generate`,
                                `${window.location.protocol}//${window.location.host}/api/resume/generate`,
                                `${window.location.href.split('/resume-generator')[0]}/api/resume/generate`,
                                '/test-resume'  // Fallback test route
                            ];
                            
                            console.log('Current URL:', window.location.href);
                            console.log('Trying API URLs:', possibleUrls);
                            
                            let response;
                            let workingUrl;
                            
                            for (const apiUrl of possibleUrls) {
                                try {
                                    console.log('Attempting:', apiUrl);
                                    response = await fetch(apiUrl, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'Accept': 'application/json'
                                        },
                                        body: JSON.stringify(userData)
                                    });
                                    
                                    if (response.ok) {
                                        workingUrl = apiUrl;
                                        console.log('Success with URL:', apiUrl);
                                        break;
                                    } else {
                                        console.log(`Failed with ${apiUrl}: ${response.status}`);
                                    }
                                } catch (urlError) {
                                    console.log(`Error with ${apiUrl}:`, urlError.message);
                                }
                            }
                            
                            if (!response || !response.ok) {
                                throw new Error(`All API URLs failed. Last status: ${response ? response.status : 'No response'}`);
                            }
                            
                            console.log('Response status:', response.status);
                            
                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }
                            
                            const result = await response.json();
                            console.log('API Response:', result);
                            
                            if (result.error) {
                                throw new Error(result.error);
                            }
                            
                            // Display resume
                            if (result.resume && previewEl) {
                                previewEl.innerHTML = result.resume;
                                previewEl.style.display = 'block';
                                if (downloadBtn) downloadBtn.style.display = 'inline-block';
                                console.log('Resume displayed successfully');
                            } else {
                                throw new Error('No resume content received');
                            }
                            
                        } catch (error) {
                            console.error('Error generating resume:', error);
                            if (errorEl) {
                                errorEl.querySelector('p').textContent = 'Failed to generate resume: ' + error.message;
                                errorEl.style.display = 'block';
                            }
                            if (placeholderEl) placeholderEl.style.display = 'block';
                        } finally {
                            // Hide loading
                            if (loadingEl) loadingEl.style.display = 'none';
                            if (generateBtn) {
                                generateBtn.disabled = false;
                                generateBtn.textContent = 'Generate Resume';
                            }
                        }
                    });
                }
                
                if (clearBtn) {
                    clearBtn.addEventListener('click', function() {
                        if (form) form.reset();
                        if (previewEl) {
                            previewEl.innerHTML = '';
                            previewEl.style.display = 'none';
                        }
                        if (downloadBtn) downloadBtn.style.display = 'none';
                        if (errorEl) errorEl.style.display = 'none';
                        if (placeholderEl) placeholderEl.style.display = 'block';
                    });
                }
                
                if (downloadBtn) {
                    downloadBtn.addEventListener('click', function() {
                        if (previewEl && window.html2pdf) {
                            const nameInput = document.querySelector('input[name="name"]');
                            const filename = nameInput ? `${nameInput.value || 'resume'}.pdf` : 'resume.pdf';
                            
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
                    });
                }
            });
        }
    </script>
</body>
</html>