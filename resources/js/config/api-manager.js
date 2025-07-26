// API Manager - Easy configuration switching
class ApiManager {
    constructor() {
        this.config = {
            // Primary API Configuration
            primary: {
                type: 'backend', // 'backend' or 'openai'
                backend: {
                    baseURL: '/api',
                    endpoint: '/resume/generate'
                },
                openai: {
                    baseURL: 'https://api.openai.com/v1',
                    model: 'gpt-3.5-turbo',
                    temperature: 0.7,
                    apiKey: null // Set this if using direct OpenAI API
                }
            },
            
            // Fallback API Configuration
            fallback: {
                type: 'backend', // Switch this when primary fails
                enabled: true
            },
            
            // Retry Configuration
            retry: {
                attempts: 3,
                delay: 1000, // milliseconds
                backoff: 2 // exponential backoff multiplier
            }
        };
    }

    /**
     * Get current API configuration
     */
    getCurrentConfig() {
        const type = this.config.primary.type;
        return this.config.primary[type];
    }

    /**
     * Get fallback API configuration
     */
    getFallbackConfig() {
        const type = this.config.fallback.type;
        return this.config.primary[type];
    }

    /**
     * Switch primary API type
     * @param {string} type - 'backend' or 'openai'
     */
    switchPrimary(type) {
        if (['backend', 'openai'].includes(type)) {
            this.config.primary.type = type;
            console.log(`Switched primary API to: ${type}`);
        }
    }

    /**
     * Switch fallback API type
     * @param {string} type - 'backend' or 'openai'
     */
    switchFallback(type) {
        if (['backend', 'openai'].includes(type)) {
            this.config.fallback.type = type;
            console.log(`Switched fallback API to: ${type}`);
        }
    }

    /**
     * Update OpenAI API key
     * @param {string} apiKey 
     */
    updateOpenAIKey(apiKey) {
        this.config.primary.openai.apiKey = apiKey;
        console.log('OpenAI API key updated');
    }

    /**
     * Update backend endpoint
     * @param {string} baseURL 
     * @param {string} endpoint 
     */
    updateBackendEndpoint(baseURL, endpoint) {
        this.config.primary.backend.baseURL = baseURL;
        this.config.primary.backend.endpoint = endpoint;
        console.log('Backend endpoint updated');
    }

    /**
     * Enable/disable fallback
     * @param {boolean} enabled 
     */
    setFallbackEnabled(enabled) {
        this.config.fallback.enabled = enabled;
    }

    /**
     * Get retry configuration
     */
    getRetryConfig() {
        return this.config.retry;
    }

    /**
     * Update retry configuration
     * @param {Object} retryConfig 
     */
    updateRetryConfig(retryConfig) {
        this.config.retry = { ...this.config.retry, ...retryConfig };
    }

    /**
     * Export current configuration
     */
    exportConfig() {
        return JSON.stringify(this.config, null, 2);
    }

    /**
     * Import configuration
     * @param {Object} config 
     */
    importConfig(config) {
        this.config = { ...this.config, ...config };
    }

    /**
     * Reset to default configuration
     */
    resetToDefaults() {
        this.config.primary.type = 'backend';
        this.config.fallback.type = 'backend';
        this.config.fallback.enabled = true;
        console.log('Configuration reset to defaults');
    }

    /**
     * Get status of current configuration
     */
    getStatus() {
        return {
            primary: this.config.primary.type,
            fallback: this.config.fallback.enabled ? this.config.fallback.type : 'disabled',
            retryAttempts: this.config.retry.attempts
        };
    }
}

// Create global instance
window.ApiManager = new ApiManager();

// Export for module usage
export default ApiManager;