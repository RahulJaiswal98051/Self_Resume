import React, { useState } from 'react';
import ResumeService from '../services/ResumeService';
import html2pdf from 'html2pdf.js';

const ResumeGenerator = () => {
    const [formData, setFormData] = useState({
        name: '',
        email: '',
        phone: '',
        degree: '',
        institute: '',
        year: '',
        grade: '',
        role: '',
        company: '',
        duration: '',
        desc: '',
        skills: '',
        job_title: '',
        job_company: '',
        job_description: ''
    });

    const [generatedResume, setGeneratedResume] = useState('');
    const [isLoading, setIsLoading] = useState(false);
    const [error, setError] = useState('');

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setFormData(prev => ({
            ...prev,
            [name]: value
        }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setIsLoading(true);
        setError('');
        
        try {
            const resume = await ResumeService.generateResume(formData);
            setGeneratedResume(resume);
        } catch (err) {
            setError('Failed to generate resume. Please try again.');
            console.error('Resume generation error:', err);
        } finally {
            setIsLoading(false);
        }
    };

    const downloadPDF = () => {
        const element = document.getElementById('resume-preview');
        const opt = {
            margin: 1,
            filename: `${formData.name || 'resume'}.pdf`,
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        };
        
        html2pdf().set(opt).from(element).save();
    };

    const clearForm = () => {
        setFormData({
            name: '',
            email: '',
            phone: '',
            degree: '',
            institute: '',
            year: '',
            grade: '',
            role: '',
            company: '',
            duration: '',
            desc: '',
            skills: '',
            job_title: '',
            job_company: '',
            job_description: ''
        });
        setGeneratedResume('');
        setError('');
    };

    return (
        <div className="resume-generator">
            <div className="container">
                <h1 className="title">AI Resume Generator</h1>
                
                <div className="content-wrapper">
                    {/* Form Section */}
                    <div className="form-section">
                        <form onSubmit={handleSubmit} className="resume-form">
                            <div className="form-group">
                                <h3>Personal Information</h3>
                                <input
                                    type="text"
                                    name="name"
                                    placeholder="Full Name"
                                    value={formData.name}
                                    onChange={handleInputChange}
                                    required
                                />
                                <input
                                    type="email"
                                    name="email"
                                    placeholder="Email Address"
                                    value={formData.email}
                                    onChange={handleInputChange}
                                    required
                                />
                                <input
                                    type="tel"
                                    name="phone"
                                    placeholder="Phone Number"
                                    value={formData.phone}
                                    onChange={handleInputChange}
                                    required
                                />
                            </div>

                            <div className="form-group">
                                <h3>Academic Background</h3>
                                <input
                                    type="text"
                                    name="degree"
                                    placeholder="Degree (e.g., Bachelor of Computer Science)"
                                    value={formData.degree}
                                    onChange={handleInputChange}
                                    required
                                />
                                <input
                                    type="text"
                                    name="institute"
                                    placeholder="Institute/University"
                                    value={formData.institute}
                                    onChange={handleInputChange}
                                    required
                                />
                                <input
                                    type="text"
                                    name="year"
                                    placeholder="Graduation Year"
                                    value={formData.year}
                                    onChange={handleInputChange}
                                    required
                                />
                                <input
                                    type="text"
                                    name="grade"
                                    placeholder="Grade/GPA"
                                    value={formData.grade}
                                    onChange={handleInputChange}
                                />
                            </div>

                            <div className="form-group">
                                <h3>Professional Experience</h3>
                                <input
                                    type="text"
                                    name="role"
                                    placeholder="Job Role/Position"
                                    value={formData.role}
                                    onChange={handleInputChange}
                                    required
                                />
                                <input
                                    type="text"
                                    name="company"
                                    placeholder="Company Name"
                                    value={formData.company}
                                    onChange={handleInputChange}
                                    required
                                />
                                <input
                                    type="text"
                                    name="duration"
                                    placeholder="Duration (e.g., Jan 2020 - Dec 2022)"
                                    value={formData.duration}
                                    onChange={handleInputChange}
                                    required
                                />
                                <textarea
                                    name="desc"
                                    placeholder="Job Responsibilities and Achievements"
                                    value={formData.desc}
                                    onChange={handleInputChange}
                                    rows="4"
                                    required
                                />
                            </div>

                            <div className="form-group">
                                <h3>Skills</h3>
                                <textarea
                                    name="skills"
                                    placeholder="List your skills (e.g., JavaScript, React, Node.js, Python)"
                                    value={formData.skills}
                                    onChange={handleInputChange}
                                    rows="3"
                                    required
                                />
                            </div>

                            <div className="form-group">
                                <h3>Job Target</h3>
                                <input
                                    type="text"
                                    name="job_title"
                                    placeholder="Target Job Title"
                                    value={formData.job_title}
                                    onChange={handleInputChange}
                                    required
                                />
                                <input
                                    type="text"
                                    name="job_company"
                                    placeholder="Target Company"
                                    value={formData.job_company}
                                    onChange={handleInputChange}
                                />
                                <textarea
                                    name="job_description"
                                    placeholder="Job Description (paste the job posting here)"
                                    value={formData.job_description}
                                    onChange={handleInputChange}
                                    rows="4"
                                />
                            </div>

                            <div className="form-actions">
                                <button 
                                    type="submit" 
                                    disabled={isLoading}
                                    className="btn btn-primary"
                                >
                                    {isLoading ? 'Generating Resume...' : 'Generate Resume'}
                                </button>
                                <button 
                                    type="button" 
                                    onClick={clearForm}
                                    className="btn btn-secondary"
                                >
                                    Clear Form
                                </button>
                            </div>
                        </form>
                    </div>

                    {/* Preview Section */}
                    <div className="preview-section">
                        {error && (
                            <div className="error-message">
                                <p>{error}</p>
                            </div>
                        )}

                        {generatedResume && (
                            <div className="resume-preview-container">
                                <div className="preview-header">
                                    <h3>Generated Resume</h3>
                                    <button 
                                        onClick={downloadPDF}
                                        className="btn btn-download"
                                    >
                                        Download PDF
                                    </button>
                                </div>
                                
                                <div 
                                    id="resume-preview" 
                                    className="resume-preview"
                                    dangerouslySetInnerHTML={{ 
                                        __html: generatedResume.replace(/\\n/g, '<br>') 
                                    }}
                                />
                            </div>
                        )}

                        {!generatedResume && !error && !isLoading && (
                            <div className="placeholder">
                                <p>Fill out the form and click "Generate Resume" to see your AI-generated resume here.</p>
                            </div>
                        )}

                        {isLoading && (
                            <div className="loading">
                                <p>Generating your resume...</p>
                                <div className="spinner"></div>
                            </div>
                        )}
                    </div>
                </div>
            </div>
        </div>
    );
};

export default ResumeGenerator;