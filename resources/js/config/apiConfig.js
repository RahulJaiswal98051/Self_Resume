// API Configuration - Change this when API expires or needs to be updated
const API_CONFIG = {
    // Laravel Backend API (Primary)
    BACKEND_API: {
        baseURL: '/api',
        endpoints: {
            generateResume: '/resume/generate'
        }
    },
    
    // Direct OpenAI API (Fallback)
    OPENAI_API: {
        baseURL: 'https://api.openai.com/v1',
        model: 'gpt-3.5-turbo',
        temperature: 0.7,
        // Note: API key should be stored in environment variables for security
        // This is just for demonstration - use Laravel backend instead
        apiKey: null // Don't store API key in frontend
    },
    
    // API Strategy: 'backend' or 'direct'
    // Change this to 'direct' if you want to use OpenAI API directly
    strategy: 'backend'
};

export default API_CONFIG;