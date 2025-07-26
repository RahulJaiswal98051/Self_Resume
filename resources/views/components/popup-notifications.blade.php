<!-- Popup Notification System -->
<div id="notification-container" class="fixed top-4 right-4 z-50 space-y-4">
    <!-- Notifications will be dynamically inserted here -->
</div>

<!-- Success/Error Modal -->
<div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header" id="modalHeader">
                <h5 class="modal-title d-flex align-items-center" id="notificationModalLabel">
                    <i id="modalIcon" class="me-2"></i>
                    <span id="modalTitle">Notification</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="modalMessage"></div>
                <ul id="modalMessageList" class="mb-0 d-none"></ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
/* Toast Notification Styles */
.toast-notification {
    min-width: 300px;
    max-width: 400px;
    padding: 16px 20px;
    border-radius: 8px;
    color: white;
    font-weight: 500;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    transform: translateX(100%);
    transition: all 0.3s ease-in-out;
    position: relative;
    overflow: hidden;
}

.toast-notification.show {
    transform: translateX(0);
}

.toast-notification.success {
    background: linear-gradient(135deg, #10b981, #059669);
}

.toast-notification.error {
    background: linear-gradient(135deg, #ef4444, #dc2626);
}

.toast-notification.warning {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.toast-notification.info {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
}

.toast-notification::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    height: 4px;
    width: 100%;
    background: rgba(255, 255, 255, 0.3);
    animation: progress 5s linear forwards;
}

@keyframes progress {
    from { width: 100%; }
    to { width: 0%; }
}

.toast-close {
    background: none;
    border: none;
    color: white;
    font-size: 18px;
    cursor: pointer;
    padding: 0;
    margin-left: 12px;
    opacity: 0.8;
    transition: opacity 0.2s;
}

.toast-close:hover {
    opacity: 1;
}

/* Modal Styles */
.modal-content {
    border-radius: 12px;
}

.modal-header.success {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.modal-header.error {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
}

.modal-header.warning {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
}

.modal-header.info {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
}

.modal-header.success .btn-close,
.modal-header.error .btn-close,
.modal-header.warning .btn-close,
.modal-header.info .btn-close {
    filter: brightness(0) invert(1);
}
</style>

<script>
class NotificationSystem {
    constructor() {
        this.container = document.getElementById('notification-container');
        this.modal = document.getElementById('notificationModal');
        this.modalInstance = null;
        
        // Initialize Bootstrap modal if available
        if (typeof bootstrap !== 'undefined') {
            this.modalInstance = new bootstrap.Modal(this.modal);
        }
    }

    // Show toast notification
    showToast(message, type = 'info', duration = 5000) {
        const toast = document.createElement('div');
        toast.className = `toast-notification ${type}`;
        
        const icon = this.getIcon(type);
        
        toast.innerHTML = `
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="${icon} me-2"></i>
                    <span>${message}</span>
                </div>
                <button class="toast-close" onclick="this.parentElement.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;

        this.container.appendChild(toast);

        // Trigger animation
        setTimeout(() => toast.classList.add('show'), 100);

        // Auto remove
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => toast.remove(), 300);
        }, duration);

        return toast;
    }

    // Show modal notification
    showModal(title, message, type = 'info', messageList = null) {
        const modalHeader = document.getElementById('modalHeader');
        const modalTitle = document.getElementById('modalTitle');
        const modalIcon = document.getElementById('modalIcon');
        const modalMessage = document.getElementById('modalMessage');
        const modalMessageList = document.getElementById('modalMessageList');

        // Set icon and title
        modalIcon.className = this.getIcon(type) + ' me-2';
        modalTitle.textContent = title;

        // Set header style
        modalHeader.className = `modal-header ${type}`;

        // Set message content
        if (messageList && Array.isArray(messageList) && messageList.length > 0) {
            modalMessage.style.display = 'none';
            modalMessageList.style.display = 'block';
            modalMessageList.className = 'mb-0';
            modalMessageList.innerHTML = '';
            
            messageList.forEach(msg => {
                const li = document.createElement('li');
                li.textContent = msg;
                modalMessageList.appendChild(li);
            });
        } else {
            modalMessage.style.display = 'block';
            modalMessageList.style.display = 'none';
            modalMessage.innerHTML = message;
        }

        // Show modal
        if (this.modalInstance) {
            this.modalInstance.show();
        } else {
            // Fallback for non-Bootstrap environments
            this.modal.style.display = 'block';
            this.modal.classList.add('show');
        }
    }

    // Get icon based on type
    getIcon(type) {
        const icons = {
            success: 'fas fa-check-circle',
            error: 'fas fa-exclamation-circle',
            warning: 'fas fa-exclamation-triangle',
            info: 'fas fa-info-circle'
        };
        return icons[type] || icons.info;
    }

    // Handle Laravel session messages
    handleLaravelMessages() {
        // Get Laravel session data
        const successMessage = @json(session('success'));
        const errorMessage = @json(session('error'));
        const warningMessage = @json(session('warning'));
        const infoMessage = @json(session('info'));
        const errors = @json($errors->any() ? $errors->all() : []);

        // Show success message
        if (successMessage) {
            this.showToast(successMessage, 'success');
        }

        // Show warning message
        if (warningMessage) {
            this.showToast(warningMessage, 'warning');
        }

        // Show info message
        if (infoMessage) {
            this.showToast(infoMessage, 'info');
        }

        // Show error message or validation errors
        if (errorMessage) {
            this.showModal('Error', errorMessage, 'error');
        } else if (errors.length > 0) {
            this.showModal('Validation Errors', 'Please fix the following errors:', 'error', errors);
        }
    }
}

// Initialize notification system when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    window.notificationSystem = new NotificationSystem();
    window.notificationSystem.handleLaravelMessages();
});

// Global functions for easy access
function showToast(message, type = 'info', duration = 5000) {
    if (window.notificationSystem) {
        return window.notificationSystem.showToast(message, type, duration);
    }
}

function showModal(title, message, type = 'info', messageList = null) {
    if (window.notificationSystem) {
        return window.notificationSystem.showModal(title, message, type, messageList);
    }
}

function showSuccess(message, useModal = false) {
    if (useModal) {
        showModal('Success', message, 'success');
    } else {
        showToast(message, 'success');
    }
}

function showError(message, useModal = true) {
    if (useModal) {
        showModal('Error', message, 'error');
    } else {
        showToast(message, 'error');
    }
}

function showWarning(message, useModal = false) {
    if (useModal) {
        showModal('Warning', message, 'warning');
    } else {
        showToast(message, 'warning');
    }
}

function showInfo(message, useModal = false) {
    if (useModal) {
        showModal('Information', message, 'info');
    } else {
        showToast(message, 'info');
    }
}
</script>