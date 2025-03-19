<div>
    @props(['message'])
    <style>
        .colored-toast.swal2-icon-warning {
            background-color: #cedb5d !important; 
        }
        .colored-toast {
            margin-top: 70px !important;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                iconColor: 'black',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
            });

            Toast.fire({
                icon: 'warning',
                title: '{{ $message }}',
            });
        });
    </script>
</div>