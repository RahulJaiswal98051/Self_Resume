<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AI Resume Generator</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('custom.css') }}" rel="stylesheet">

    <!-- HTML2PDF Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
</head>
<body>
    <div class="resume-generator bg-light">
        <div class="container py-5">
            <h1 class="text-center mb-5">AI Resume Generator</h1>
            
            <div class="row">
                <!-- Form Section -->
                <div class="col-lg-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body p-4">
                            <form id="resume-form">
                                <div class="mb-4">
                                    <h3 class="h5 mb-3"><i class="fas fa-user-circle me-2"></i>Personal Information</h3>
                                    <div class="mb-3">
                                        <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="tel" name="phone" class="form-control" placeholder="Phone Number" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h3 class="h5 mb-3"><i class="fas fa-graduation-cap me-2"></i>Academic Background</h3>
                                    <div id="academic-container">
                                        <div class="academic-item border p-3 mb-3 rounded bg-light">
                                            <div class="mb-3">
                                                <input type="text" name="degree[]" class="form-control" placeholder="Degree" required>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="institute[]" class="form-control" placeholder="Institute/University" required>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="joining_year" class="form-label">Joining Year</label>
                                                    <input type="number" name="joining_year[]" class="form-control" placeholder="YYYY" min="1900" max="2100" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="completion_year" class="form-label">Completion Year</label>
                                                    <input type="number" name="completion_year[]" class="form-control" placeholder="YYYY" min="1900" max="2100" required>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="number" step="any" name="grade[]" class="form-control grade-input" placeholder="Grade (0-100)" min="0" max="100">
                                                <select name="grade_type[]" class="form-select grade-type-select">
                                                    <option value="Percentage">Percentage</option>
                                                    <option value="GPA">GPA</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <button type="button" id="add-academic-btn" class="btn btn-info btn-sm"><i class="fas fa-plus me-2"></i>Add Academic</button>
                                        <button type="button" id="remove-academic-btn" class="btn btn-danger btn-sm"><i class="fas fa-minus me-2"></i>Remove Academic</button>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h3 class="h5 mb-3"><i class="fas fa-briefcase me-2"></i>Professional Experience</h3>
                                    <div id="experience-container">
                                        <div class="experience-item border p-3 mb-3 rounded bg-light">
                                            <div class="mb-3">
                                                <input type="text" name="role[]" class="form-control" placeholder="Job Role">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="company[]" class="form-control" placeholder="Company Name">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="duration[]" class="form-control" placeholder="Duration (e.g., Jan 2020 - Dec 2022)">
                                            </div>
                                            <div class="mb-3">
                                                <textarea name="desc[]" class="form-control" placeholder="Job Responsibilities" rows="4"></textarea>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <button type="button" id="add-experience-btn" class="btn btn-info btn-sm"><i class="fas fa-plus me-2"></i>Add Experience</button>
                                        <button type="button" id="remove-experience-btn" class="btn btn-danger btn-sm"><i class="fas fa-minus me-2"></i>Remove Experience</button>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h3 class="h5 mb-3"><i class="fas fa-cogs me-2"></i>Skills</h3>
                                    <div class="mb-3">
                                        <textarea name="skills" class="form-control" placeholder="e.g., JavaScript, React, Node.js" rows="3" required></textarea>
                                    </div>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                    <button type="submit" id="generate-btn" class="btn btn-primary"><i class="fas fa-robot me-2"></i>Generate Resume</button>
                                    <button type="button" id="clear-btn" class="btn btn-secondary"><i class="fas fa-times me-2"></i>Clear Form</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Preview Section -->
                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3 class="h5 mb-0">Resume Preview</h3>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-paint-brush me-2"></i>Template
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-template="classic">Classic</a></li>
                                        <li><a class="dropdown-item" href="#" data-template="modern">Modern</a></li>
                                        <li><a class="dropdown-item" href="#" data-template="creative">Creative</a></li>
                                    </ul>
                                </div>
                                <button id="download-btn" class="btn btn-success" style="display: none;"><i class="fas fa-download me-2"></i>Download PDF</button>
                            </div>
                            <div id="resume-preview" class="border p-4 bg-white rounded">
                                <!-- Live preview will appear here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('resume-form');
            const generateBtn = document.getElementById('generate-btn');
            const clearBtn = document.getElementById('clear-btn');
            const downloadBtn = document.getElementById('download-btn');
            const previewEl = document.getElementById('resume-preview');
            let currentTemplate = 'classic';

            // Update preview on form input
            form.addEventListener('input', updatePreview);

            // Handle grade type change for dynamically added academic items
            document.getElementById('academic-container').addEventListener('change', function(e) {
                if (e.target.classList.contains('grade-type-select')) {
                    const currentGradeInput = e.target.closest('.academic-item').querySelector('.grade-input');
                    if (e.target.value === 'GPA') {
                        currentGradeInput.placeholder = 'Grade (0-4)';
                        currentGradeInput.min = '0';
                        currentGradeInput.max = '4';
                        currentGradeInput.step = '0.01';
                    } else {
                        currentGradeInput.placeholder = 'Grade (0-100)';
                        currentGradeInput.min = '0';
                        currentGradeInput.max = '100';
                        currentGradeInput.step = 'any';
                    }
                    updatePreview();
                }
            });

            // Handle template selection
            document.querySelectorAll('.dropdown-item').forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    currentTemplate = this.dataset.template;
                    updatePreview();
                });
            });

            function updatePreview() {
                const formData = new FormData(form);
                let html = '';

                // Get all professional experience entries
                const experienceItems = [];
                document.querySelectorAll('.experience-item').forEach(item => {
                    const role = item.querySelector('input[name="role[]"]').value;
                    const company = item.querySelector('input[name="company[]"]').value;
                    const duration = item.querySelector('input[name="duration[]"]').value;
                    const desc = item.querySelector('textarea[name="desc[]"]').value;
                    if (role || company || duration || desc) { // Only add if at least one field is filled
                        experienceItems.push({ role, company, duration, desc });
                    }
                });

                // Get all academic entries
                const academicItems = [];
                document.querySelectorAll('.academic-item').forEach(item => {
                    const degree = item.querySelector('input[name="degree[]"]').value;
                    const institute = item.querySelector('input[name="institute[]"]').value;
                    const joining_year = item.querySelector('input[name="joining_year[]"]').value;
                    const completion_year = item.querySelector('input[name="completion_year[]"]').value;
                    const grade = item.querySelector('input[name="grade[]"]').value;
                    const grade_type = item.querySelector('select[name="grade_type[]"]').value;
                    if (degree || institute || joining_year || completion_year || grade) { // Only add if at least one field is filled
                        academicItems.push({ degree, institute, joining_year, completion_year, grade, grade_type });
                    }
                });

                // Add template-specific classes
                previewEl.className = `border p-4 bg-white rounded ${currentTemplate}`;

                // Generate HTML based on template
                switch (currentTemplate) {
                    case 'modern':
                        html = generateModernTemplate(formData, experienceItems, academicItems);
                        break;
                    case 'creative':
                        html = generateCreativeTemplate(formData, experienceItems, academicItems);
                        break;
                    default:
                        html = generateClassicTemplate(formData, experienceItems, academicItems);
                }

                previewEl.innerHTML = html;
                downloadBtn.style.display = 'inline-block';
                generateBtn.innerHTML = '<i class="fas fa-robot me-2"></i>Improve with AI';
            }

            function generateClassicTemplate(data, experienceItems, academicItems) {
                let personalInfoHtml = `
                    <h1 class="text-center">${data.get('name') || 'Your Name'}</h1>
                    <p class="text-center">${data.get('email') || 'your.email@example.com'} | ${data.get('phone') || '123-456-7890'}</p>
                    <hr>
                `;

                let academicHtml = '';
                if (academicItems.length > 0) {
                    academicHtml += `<h4><i class="fas fa-graduation-cap me-2"></i>Academic Background</h4>`;
                    academicItems.forEach(acad => {
                        let gradeDisplay = 'N/A';
                        if (acad.grade) {
                            gradeDisplay = acad.grade_type === 'Percentage' ? `${acad.grade}%` : `GPA: ${acad.grade}`;
                        }
                        academicHtml += `
                            <p><b>${acad.degree || 'Degree'}</b></p>
                            <p>${acad.institute || 'University'} (${acad.joining_year || 'Joining Year'} - ${acad.completion_year || 'Completion Year'})</p>
                            <p>Grade: ${gradeDisplay}</p>
                            <hr>
                        `;
                    });
                }

                let experienceHtml = '';
                if (experienceItems.length > 0) {
                    experienceHtml += `<h4><i class="fas fa-briefcase me-2"></i>Professional Experience</h4>`;
                    experienceItems.forEach(exp => {
                        experienceHtml += `
                            <h5>${exp.role || 'Job Role'} at ${exp.company || 'Company'}</h5>
                            <p><i>${exp.duration || 'Duration'}</i></p>
                            <p>${exp.desc || 'Job responsibilities'}</p>
                            <hr>
                        `;
                    });
                }

                return `
                    ${personalInfoHtml}
                    ${academicItems.length > 0 ? academicHtml : ''}
                    ${experienceItems.length > 0 ? experienceHtml : ''}
                    <h4><i class="fas fa-cogs me-2"></i>Skills</h4>
                    <p>${data.get('skills') || 'Your skills'}</p>
                `;
            }

            function generateModernTemplate(data, experienceItems, academicItems) {
                let personalInfoHtml = `
                    <div class="col-4">
                        <h2 class="h4">${data.get('name') || 'Your Name'}</h2>
                        <p>${data.get('email') || 'your.email@example.com'}</p>
                        <p>${data.get('phone') || '123-456-7890'}</p>
                    </div>
                `;

                let academicHtml = '';
                if (academicItems.length > 0) {
                    academicHtml += `<h4><i class="fas fa-graduation-cap me-2"></i>Academic Background</h4>`;
                    academicItems.forEach(acad => {
                        let gradeDisplay = 'N/A';
                        if (acad.grade) {
                            gradeDisplay = acad.grade_type === 'Percentage' ? `${acad.grade}%` : `GPA: ${acad.grade}`;
                        }
                        academicHtml += `
                            <p><b>${acad.degree || 'Degree'}</b></p>
                            <p>${acad.institute || 'University'} (${acad.joining_year || 'Joining Year'} - ${acad.completion_year || 'Completion Year'})</p>
                            <p>Grade: ${gradeDisplay}</p>
                            <hr>
                        `;
                    });
                }

                let experienceHtml = '';
                if (experienceItems.length > 0) {
                    experienceHtml += `<h4><i class="fas fa-briefcase me-2"></i>Professional Experience</h4>`;
                    experienceItems.forEach(exp => {
                        experienceHtml += `
                            <h5>${exp.role || 'Job Role'} at ${exp.company || 'Company'}</h5>
                            <p><i>${exp.duration || 'Duration'}</i></p>
                            <p>${exp.desc || 'Job responsibilities'}</p>
                            <hr>
                        `;
                    });
                }

                return `
                    <div class="row">
                        ${personalInfoHtml}
                        <div class="col-8">
                            ${academicItems.length > 0 ? academicHtml : ''}
                            ${experienceItems.length > 0 ? experienceHtml : ''}
                            <h4><i class="fas fa-cogs me-2"></i>Skills</h4>
                            <p>${data.get('skills') || 'Your skills'}</p>
                        </div>
                    </div>
                `;
            }

            function generateCreativeTemplate(data, experienceItems, academicItems) {
                let personalInfoHtml = `
                    <div class="text-center bg-light p-4 rounded">
                        <h1 class="display-4">${data.get('name') || 'Your Name'}</h1>
                        <p class="lead">${data.get('email') || 'your.email@example.com'} | ${data.get('phone') || '123-456-7890'}</p>
                    </div>
                `;

                let academicHtml = '';
                if (academicItems.length > 0) {
                    academicHtml += `<h4><i class="fas fa-graduation-cap me-2"></i>Academic Background</h4>`;
                    academicItems.forEach(acad => {
                        let gradeDisplay = 'N/A';
                        if (acad.grade) {
                            gradeDisplay = acad.grade_type === 'Percentage' ? `${acad.grade}%` : `GPA: ${acad.grade}`;
                        }
                        academicHtml += `
                            <p><b>${acad.degree || 'Degree'}</b></p>
                            <p>${acad.institute || 'University'} (${acad.joining_year || 'Joining Year'} - ${acad.completion_year || 'Completion Year'})</p>
                            <p>Grade: ${gradeDisplay}</p>
                        `;
                    });
                }

                let experienceHtml = '';
                if (experienceItems.length > 0) {
                    experienceHtml += `<h4><i class="fas fa-briefcase me-2"></i>Professional Experience</h4>`;
                    experienceItems.forEach(exp => {
                        experienceHtml += `
                            <h5>${exp.role || 'Job Role'} at ${exp.company || 'Company'}</h5>
                            <p><i>${exp.duration || 'Duration'}</i></p>
                            <p>${exp.desc || 'Job responsibilities'}</p>
                        `;
                    });
                }

                return `
                    ${personalInfoHtml}
                    ${academicItems.length > 0 ? `<div class="mt-4">${academicHtml}</div>` : ''}
                    ${experienceItems.length > 0 ? `<div class="mt-4">${experienceHtml}</div>` : ''}
                    <div class="mt-4">
                        <h4><i class="fas fa-cogs me-2"></i>Skills</h4>
                        <p>${data.get('skills') || 'Your skills'}</p>
                    </div>
                `;
            }

            // Handle form submission for AI improvement
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                // AI generation logic will go here
            });

            // Add Academic
            document.getElementById('add-academic-btn').addEventListener('click', function() {
                const container = document.getElementById('academic-container');
                const newItem = container.querySelector('.academic-item').cloneNode(true);
                newItem.querySelectorAll('input, select').forEach(input => {
                    if (input.classList.contains('grade-type-select')) {
                        input.value = 'Percentage'; // Reset select to default
                    } else {
                        input.value = ''; // Clear input fields
                    }
                });
                // Re-attach event listener for grade type change to the new item's select
                const newGradeTypeSelect = newItem.querySelector('.grade-type-select');
                const newGradeInput = newItem.querySelector('.grade-input');
                newGradeTypeSelect.addEventListener('change', function() {
                    if (this.value === 'GPA') {
                        newGradeInput.placeholder = 'Grade (0-4)';
                        newGradeInput.min = '0';
                        newGradeInput.max = '4';
                        newGradeInput.step = '0.01';
                    } else {
                        newGradeInput.placeholder = 'Grade (0-100)';
                        newGradeInput.min = '0';
                        newGradeInput.max = '100';
                        newGradeInput.step = 'any';
                    }
                    updatePreview();
                });
                container.appendChild(newItem);
                updatePreview();
            });

            // Remove Academic
            document.getElementById('remove-academic-btn').addEventListener('click', function() {
                const academicItems = document.querySelectorAll('.academic-item');
                if (academicItems.length > 1) {
                    academicItems[academicItems.length - 1].remove(); // Remove the last academic item
                    updatePreview();
                } else {
                    alert('You must have at least one academic entry.');
                }
            });

            // Add Experience
            document.getElementById('add-experience-btn').addEventListener('click', function() {
                const container = document.getElementById('experience-container');
                const newItem = container.querySelector('.experience-item').cloneNode(true);
                newItem.querySelectorAll('input, textarea').forEach(input => input.value = '');
                container.appendChild(newItem);
                updatePreview();
            });

            // Remove Experience
            document.getElementById('remove-experience-btn').addEventListener('click', function() {
                const experienceItems = document.querySelectorAll('.experience-item');
                if (experienceItems.length > 1) {
                    experienceItems[experienceItems.length - 1].remove(); // Remove the last experience item
                    updatePreview();
                } else {
                    alert('You must have at least one professional experience entry.');
                }
            });

            // Clear form
            clearBtn.addEventListener('click', function() {
                form.reset();
                previewEl.innerHTML = '';
                downloadBtn.style.display = 'none';
                generateBtn.innerHTML = '<i class="fas fa-robot me-2"></i>Generate Resume';
                
                // Reset academic to one empty item
                const academicContainer = document.getElementById('academic-container');
                academicContainer.innerHTML = `
                    <div class="academic-item border p-3 mb-3 rounded bg-light">
                        <div class="mb-3">
                            <input type="text" name="degree[]" class="form-control" placeholder="Degree" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="institute[]" class="form-control" placeholder="Institute/University" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="joining_year" class="form-label">Joining Year</label>
                                <input type="number" name="joining_year[]" class="form-control" placeholder="YYYY" min="1900" max="2100" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="completion_year" class="form-label">Completion Year</label>
                                <input type="number" name="completion_year[]" class="form-control" placeholder="YYYY" min="1900" max="2100" required>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" step="any" name="grade[]" class="form-control grade-input" placeholder="Grade (0-100)" min="0" max="100">
                            <select name="grade_type[]" class="form-select grade-type-select">
                                <option value="Percentage">Percentage</option>
                                <option value="GPA">GPA</option>
                            </select>
                        </div>
                        
                    </div>
                `;
                // Re-attach event listener for grade type change to the initial academic item
                const initialAcademicItem = academicContainer.querySelector('.academic-item');
                const initialGradeTypeSelect = initialAcademicItem.querySelector('.grade-type-select');
                const initialGradeInput = initialAcademicItem.querySelector('.grade-input');
                initialGradeTypeSelect.addEventListener('change', function() {
                    if (this.value === 'GPA') {
                        initialGradeInput.placeholder = 'Grade (0-4)';
                        initialGradeInput.min = '0';
                        initialGradeInput.max = '4';
                        initialGradeInput.step = '0.01';
                    } else {
                        initialGradeInput.placeholder = 'Grade (0-100)';
                        initialGradeInput.min = '0';
                        initialGradeInput.max = '100';
                        initialGradeInput.step = 'any';
                    }
                    updatePreview();
                });

                // Reset experience to one empty item
                const experienceContainer = document.getElementById('experience-container');
                experienceContainer.innerHTML = `
                    <div class="experience-item border p-3 mb-3 rounded bg-light">
                        <div class="mb-3">
                            <input type="text" name="role[]" class="form-control" placeholder="Job Role">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="company[]" class="form-control" placeholder="Company Name">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="duration[]" class="form-control" placeholder="Duration (e.g., Jan 2020 - Dec 2022)">
                        </div>
                        <div class="mb-3">
                            <textarea name="desc[]" class="form-control" placeholder="Job Responsibilities" rows="4"></textarea>
                        </div>
                        <button type="button" class="btn btn-danger btn-sm remove-experience"><i class="fas fa-trash me-2"></i>Remove Experience</button>
                    </div>
                `;
            });

            // Download PDF
            downloadBtn.addEventListener('click', function() {
                const nameInput = document.querySelector('input[name="name"]');
                const filename = nameInput && nameInput.value ? `${nameInput.value.replace(' ', '_')}_resume.pdf` : 'resume.pdf';
                
                const opt = {
                    margin: 0.5,
                    filename: filename,
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
                };
                
                html2pdf().set(opt).from(previewEl).save();
            });
        });
    </script>
</body>
</html>