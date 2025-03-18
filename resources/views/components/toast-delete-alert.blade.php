<div>
    @props(['message'])
    <style>
        .colored-toast.swal2-icon-success {
            background-color: #fa6161 !important;
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
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
            });

            Toast.fire({
                icon: 'success',
                title: '{{ $message }}',
            });
        });
    </script>

</div>
