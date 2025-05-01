<div>
    @props(['message', 'type' => 'success', 'position' => 'top-end', 'timer' => 2500])
    
    <style>
        .colored-toast {
            margin-top: 70px !important;
            padding: 0.75rem 1.25rem !important;
            border-radius: 8px !important;
            font-size: 0.875rem !important;
            min-width: auto !important;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.15) !important;
            position: relative !important;
            background-color: #fa6161 !important;
        }
        
        .colored-toast .swal2-title {
            color: white !important;
            padding: 0 1.5rem 0 0.75rem !important; /* Extra right padding for close button */
            margin: 0 !important;
            font-size: 0.875rem !important;
            text-align: center !important;
            display: block !important;
            width: 100% !important;
        }
        
        .colored-toast .swal2-close {
            color: rgba(255, 255, 255, 0.8) !important;
            font-size: 1.25rem !important;
            position: absolute !important;
            top: 6px !important;
            right: 6px !important;
            width: 1rem !important;
            height: 1rem !important;
            transition: all 0.2s ease !important;
        }
        
        .colored-toast .swal2-close:hover {
            color: white !important;
            transform: scale(1.1);
        }
        
        .colored-toast .swal2-timer-progress-bar {
            height: 2px !important;
            background: rgba(255, 255, 255, 0.4) !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                toast: true,
                position: '{{ $position }}',
                icon: '{{ $type }}',
                title: '{{ $message }}',
                iconColor: 'white',
                showConfirmButton: false,
                showCloseButton: true,
                timer: {{ $timer }},
                timerProgressBar: true,
                customClass: {
                    popup: 'colored-toast'
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