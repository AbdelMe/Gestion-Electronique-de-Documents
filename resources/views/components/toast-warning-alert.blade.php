<div>
    @props(['message', 'type' => 'warning', 'position' => 'top-end', 'timer' => 2500])
    
    <style>
        .colored-toast {
            margin-top: 70px !important;
            padding: 0.75rem 1.25rem !important;
            border-radius: 8px !important;
            font-size: 0.875rem !important;
            min-width: auto !important;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.15) !important;
            position: relative !important;
            background-color: #cedb5d !important;
            color: black !important;
        }
        
        .colored-toast .swal2-title {
            color: black !important;
            padding: 0 1.5rem 0 0.75rem !important;
            margin: 0 !important;
            font-size: 0.875rem !important;
            text-align: center !important;
            display: block !important;
            width: 100% !important;
            font-weight: 500 !important;
        }
        
        .colored-toast .swal2-close {
            color: rgba(0, 0, 0, 0.7) !important;
            font-size: 1.25rem !important;
            position: absolute !important;
            top: 6px !important;
            right: 6px !important;
            width: 1rem !important;
            height: 1rem !important;
            transition: all 0.2s ease !important;
        }
        
        .colored-toast .swal2-close:hover {
            color: black !important;
            transform: scale(1.1);
        }
        
        .colored-toast .swal2-timer-progress-bar {
            height: 2px !important;
            background: rgba(0, 0, 0, 0.2) !important;
        }
        
        .colored-toast .swal2-icon {
            color: black !important;
            border-color: black !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                toast: true,
                position: '{{ $position }}',
                icon: '{{ $type }}',
                title: '{{ $message }}',
                iconColor: 'black',
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