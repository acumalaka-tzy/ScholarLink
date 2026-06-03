
<div id="toast-container" class="fixed top-4 sm:top-6 right-4 sm:right-6 z-50 pointer-events-none"></div>

<script>
    // Toast Notification System
    window.showToast = function(message, type = 'success', duration = 3500) {
        const container = document.getElementById('toast-container');
        
        // Determine colors based on type
        let bgColor = 'bg-green-500';
        let textColor = 'text-white';
        let icon = 'bi-check-circle-fill';
        
        switch(type) {
            case 'error':
                bgColor = 'bg-red-500';
                icon = 'bi-exclamation-circle-fill';
                break;
            case 'warning':
                bgColor = 'bg-yellow-500';
                icon = 'bi-exclamation-triangle-fill';
                break;
            case 'info':
                bgColor = 'bg-blue-500';
                icon = 'bi-info-circle-fill';
                break;
        }
        
        // Create toast element
        const toast = document.createElement('div');
        toast.className = `${bgColor} ${textColor} px-4 sm:px-6 py-3 sm:py-4 rounded-lg sm:rounded-xl shadow-lg shadow-${type === 'success' ? 'green' : type === 'error' ? 'red' : type === 'warning' ? 'yellow' : 'blue'}-500/50 flex items-center gap-3 sm:gap-4 font-bold text-sm sm:text-base mb-3 pointer-events-auto animate-slide-in`;
        
        toast.innerHTML = `
            <div class="w-5 h-5 sm:w-6 sm:h-6 flex items-center justify-center flex-shrink-0">
                <i class="bi ${icon}"></i>
            </div>
            <span class="flex-1">${message}</span>
            <button onclick="this.parentElement.remove()" class="opacity-70 hover:opacity-100 transition text-sm sm:text-base">
                <i class="bi bi-x-lg"></i>
            </button>
        `;
        
        container.appendChild(toast);
        
        // Auto remove after duration
        setTimeout(() => {
            toast.classList.add('animate-slide-out');
            setTimeout(() => toast.remove(), 300);
        }, duration);
    };
    
    // Alternative toast function for compatibility
    window.showNotification = window.showToast;
</script>

<style>
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(400px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes slideOut {
        from {
            opacity: 1;
            transform: translateX(0);
        }
        to {
            opacity: 0;
            transform: translateX(400px);
        }
    }
    
    .animate-slide-in {
        animation: slideIn 0.3s ease-out;
    }
    
    .animate-slide-out {
        animation: slideOut 0.3s ease-in;
    }
</style>
<?php /**PATH C:\wl\ScholarLink-main\ScholarLink-main\resources\views/components/toast.blade.php ENDPATH**/ ?>