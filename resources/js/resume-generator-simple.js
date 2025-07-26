// Simple Resume Generator - Direct API calls for debugging
document.addEventListener('DOMContentLoaded', function() {
    console.log('Resume Generator loaded');
    
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
            console.log('Form submitted');
            
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
                // Get the correct base URL
                const baseUrl = window.location.origin;
                const apiUrl = `${baseUrl}/api/resume/generate`;
                console.log('Making API call to:', apiUrl);
                
                const response = await fetch(apiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(userData)
                });
                
                console.log('Response status:', response.status);
                console.log('Response headers:', response.headers);
                
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
                    errorEl.textContent = 'Failed to generate resume: ' + error.message;
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