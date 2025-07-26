# AI Resume Generator - Usage Guide

## Overview

This AI Resume Generator provides a complete solution for generating professional resumes using AI technology. It features a robust backend API, an intuitive frontend interface, and flexible configuration management.

## Features

✅ **AI-Powered Resume Generation** - Uses OpenAI GPT models to create professional resumes
✅ **Dual API Support** - Backend Laravel API + Direct OpenAI API with automatic fallback
✅ **Easy Configuration Management** - Change API settings in one place
✅ **PDF Export** - Download generated resumes as PDF files
✅ **Retry Logic** - Automatic retry with exponential backoff
✅ **Professional UI** - Clean, responsive design
✅ **Form Validation** - Client-side validation for better UX

## Quick Start

### 1. Access the Resume Generator
Navigate to: `http://your-domain/resume-generator`

### 2. Fill Out the Form
Complete all sections:
- **Personal Information**: Name, email, phone
- **Academic Background**: Degree, institution, year, grade
- **Professional Experience**: Role, company, duration, responsibilities
- **Skills**: List your technical and soft skills
- **Job Target**: Target position and job description

### 3. Generate Resume
Click "Generate Resume" and wait for the AI to create your professional resume.

### 4. Download PDF
Once generated, click "Download PDF" to save your resume.

## Configuration Management

### Easy API Switching

When your OpenAI API key expires or you need to change providers:

#### Option 1: Backend Configuration (Recommended)
1. Update `.env` file:
   ```env
   OPENAI_API_KEY=your-new-api-key-here
   ```
2. Restart Laravel server

#### Option 2: Frontend Configuration
Open browser console and use the ApiManager:

```javascript
// Switch to direct OpenAI API
ApiManager.switchPrimary('openai');
ApiManager.updateOpenAIKey('your-new-api-key');

// Switch back to backend API
ApiManager.switchPrimary('backend');

// Check current status
console.log(ApiManager.getStatus());
```

### Advanced Configuration

```javascript
// Update retry settings
ApiManager.updateRetryConfig({
    attempts: 5,
    delay: 2000,
    backoff: 2
});

// Enable/disable fallback
ApiManager.setFallbackEnabled(true);

// Switch fallback API
ApiManager.switchFallback('openai');

// Export configuration
console.log(ApiManager.exportConfig());
```

## File Structure

```
├── Backend (Laravel)
│   ├── app/Services/ResumeService.php          # AI API integration
│   ├── app/Http/Controllers/ResumeController.php # API controller
│   ├── app/Providers/ResumeServiceProvider.php  # Service provider
│   └── routes/api.php                           # API routes
│
├── Frontend
│   ├── resources/js/resume-generator.js         # Main functionality
│   ├── resources/js/config/api-manager.js       # Configuration management
│   ├── resources/sass/resume-generator.scss     # Styles
│   └── resources/views/resume-generator.blade.php # HTML template
│
└── Configuration
    ├── .env                                     # Environment variables
    ├── API_CONFIGURATION_GUIDE.md              # Detailed config guide
    └── RESUME_GENERATOR_USAGE.md               # This file
```

## API Endpoints

### Generate Resume
- **URL**: `POST /api/resume/generate`
- **Headers**: 
  - `Content-Type: application/json`
  - `X-CSRF-TOKEN: {token}`
- **Body**: Form data with user information
- **Response**: `{ "resume": "generated resume content" }`

## Troubleshooting

### Common Issues

1. **API Key Expired**
   - Update `.env` file with new key
   - Or use browser console: `ApiManager.updateOpenAIKey('new-key')`

2. **Backend API Not Working**
   - Switch to direct API: `ApiManager.switchPrimary('openai')`
   - Add API key: `ApiManager.updateOpenAIKey('your-key')`

3. **PDF Download Not Working**
   - Check if html2pdf library is loaded
   - Refresh the page and try again

4. **Form Validation Errors**
   - Ensure all required fields are filled
   - Check email format and phone number

### Error Messages

- **"Failed to generate resume"**: API connection issue or invalid data
- **"OpenAI API key not configured"**: Missing API key for direct API calls
- **"PDF generation library not loaded"**: html2pdf.js not loaded properly

## Browser Console Commands

Useful commands for debugging and configuration:

```javascript
// Check API status
ApiManager.getStatus();

// View current configuration
console.log(ApiManager.exportConfig());

// Test API switching
ApiManager.switchPrimary('openai');
ApiManager.switchPrimary('backend');

// Reset to defaults
ApiManager.resetToDefaults();

// Enable debug logging
localStorage.setItem('debug', 'true');
```

## Security Notes

- ✅ API keys are stored securely in `.env` file
- ✅ CSRF protection enabled for all requests
- ✅ Input validation on both frontend and backend
- ❌ Never store API keys in frontend JavaScript
- ❌ Don't commit `.env` file to version control

## Performance Tips

1. **Use Backend API** - More secure and faster than direct API calls
2. **Enable Fallback** - Ensures reliability when primary API fails
3. **Optimize Retry Settings** - Adjust based on your API rate limits
4. **Cache Results** - Consider implementing caching for repeated requests

## Support

For technical support:
1. Check browser console for error messages
2. Verify API key permissions and quotas
3. Test with minimal form data first
4. Check Laravel logs for backend errors

## Future Enhancements

Potential improvements:
- Multiple resume templates
- Resume editing capabilities
- User accounts and saved resumes
- Integration with job boards
- Resume scoring and optimization
- Multiple language support

---

**Note**: Always test configuration changes in a development environment before applying to production.