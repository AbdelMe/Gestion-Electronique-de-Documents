<div>
    @props(['message', 'type' => 'success', 'position' => 'top-end', 'timer' => 2500])
    
    <style>
        .compact-toast {
            margin-top: 80px !important;
            padding: 0.5rem 1rem !important;
            border-radius: 8px !important;
            font-size: 0.875rem !important;
            min-width: auto !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1) !important;
        }
        
        .compact-toast.swal2-icon-success { background-color: #48bb78 !important; }
        .compact-toast.swal2-icon-error { background-color: #f56565 !important; }
        .compact-toast.swal2-icon-warning { background-color: #ed8936 !important; }
        .compact-toast.swal2-icon-info { background-color: #4299e1 !important; }
        .compact-toast.swal2-icon-question { background-color: #9f7aea !important; }
        
        .compact-toast .swal2-title {
            color: white !important;
            padding: 0 0.5rem !important;
            margin: 0 !important;
            font-size: 0.875rem !important;
            position: relative;
            top: 5px;          
        }
        
        .compact-toast .swal2-close {
            color: rgba(255, 255, 255, 0.8) !important;
            font-size: 1.25rem !important;
            width: 1rem !important;
            height: 1rem !important;
            top: -2px !important;
            right: -2px !important;
        }
        
        .compact-toast .swal2-timer-progress-bar {
            height: 2px !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                toast: true,
                position: '{{ $position }}',
                icon: '{{ $type }}',
                title: '{{ $message }}',
                showConfirmButton: false,
                showCloseButton: true,
                timer: {{ $timer }},
                timerProgressBar: true,
                customClass: {
                    popup: 'compact-toast'
                },
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                },
                willClose: () => {
                    const toast = document.querySelector('.swal2-container');
                    if (toast) {
                        toast.style.transition = 'opacity 0.1s';
                        toast.style.opacity = '0';
                        setTimeout(() => toast.remove(), 100);
                    }
                }
            });
        });
    </script>
</div>