# API Configuration Guide

This guide explains how to easily change API settings when your OpenAI API key expires or when you need to switch between different API providers.

## Quick Configuration Changes

### 1. Backend API Configuration (Recommended)

**File:** `.env`

When your OpenAI API key expires, simply update this line:
```env
OPENAI_API_KEY=your-new-api-key-here
```

### 2. Frontend API Configuration

**File:** `resources/js/config/apiConfig.js`

This is the main configuration file where you can:

#### Switch API Strategy
```javascript
// Change this to switch between backend and direct API calls
strategy: 'backend'  // or 'direct'
```

#### Update API Endpoints
```javascript
BACKEND_API: {
    baseURL: '/api',  // Change if your API base URL changes
    endpoints: {
        generateResume: '/resume/generate'  // Change endpoint if needed
    }
}
```

#### Configure Direct OpenAI API (if needed)
```javascript
OPENAI_API: {
    baseURL: 'https://api.openai.com/v1',  // Change for different providers
    model: 'gpt-3.5-turbo',  // Update model version
    temperature: 0.7,  // Adjust creativity level
    apiKey: null  // Don't store API key here for security
}
```

## Common Scenarios

### Scenario 1: OpenAI API Key Expired
1. Get a new API key from OpenAI
2. Update `.env` file:
   ```env
   OPENAI_API_KEY=sk-your-new-key-here
   ```
3. Restart your Laravel server

### Scenario 2: Switch to Different AI Provider
1. Update `resources/js/services/ResumeService.js`
2. Modify the `generateResumeViaDirect` method
3. Update API endpoints in `apiConfig.js`

### Scenario 3: Backend API Issues
1. Change strategy in `apiConfig.js`:
   ```javascript
   strategy: 'direct'
   ```
2. Add your API key to the config (not recommended for production)

### Scenario 4: Rate Limiting Issues
1. Implement retry logic in `ResumeService.js`
2. Add delay between requests
3. Switch to backup API provider

## Security Best Practices

1. **Never store API keys in frontend code**
2. **Always use environment variables for sensitive data**
3. **Use the Laravel backend approach for production**
4. **Implement proper error handling and fallbacks**

## File Structure

```
├── .env                                    # Backend API key storage
├── resources/js/config/apiConfig.js        # Main configuration file
├── resources/js/services/ResumeService.js  # API service with fallback logic
├── app/Services/ResumeService.php          # Backend service
└── app/Http/Controllers/ResumeController.php # Backend controller
```

## Testing Configuration Changes

1. **Test Backend API:**
   ```bash
   curl -X POST http://your-domain/api/resume/generate \
   -H "Content-Type: application/json" \
   -d '{"name":"Test User","email":"test@example.com"}'
   ```

2. **Check Frontend Configuration:**
   - Open browser developer tools
   - Check console for any configuration errors
   - Test the form submission

## Troubleshooting

### API Key Issues
- Verify the key is correctly set in `.env`
- Check if the key has proper permissions
- Ensure the key hasn't expired

### Network Issues
- Check if the API endpoint is accessible
- Verify CORS settings for direct API calls
- Test with different network configurations

### Rate Limiting
- Implement exponential backoff
- Add request queuing
- Consider using multiple API keys

## Advanced Configuration

### Custom Prompt Templates
Edit the `buildPrompt` method in `ResumeService.js` to customize the AI prompt.

### Multiple API Providers
Extend the service to support multiple providers:
```javascript
providers: {
    openai: { /* config */ },
    anthropic: { /* config */ },
    custom: { /* config */ }
}
```

### Caching
Implement response caching to reduce API calls:
```javascript
// Add to ResumeService.js
const cache = new Map();
// Cache responses based on user data hash
```

## Support

If you encounter issues:
1. Check the browser console for errors
2. Verify API key permissions
3. Test with minimal data first
4. Check Laravel logs for backend errors

Remember: Always test configuration changes in a development environment first!