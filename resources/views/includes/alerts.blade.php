<script>
    document.addEventListener('DOMContentLoaded', function() {

        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3581B8',
                    cancelButtonColor: '#ff5e5b',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        button.closest('form').submit(); // NOTE: Si el usuario confirma, realiza la eliminación
                    }
                });
            });
        });

        // NOTE: Mostrar alerta de éxito si existe el mensaje 'status' en la sesión
        @if(session('status'))
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: "{{ session('status') }}",
                confirmButtonText: 'OK'
            });
        @endif

        // NOTE: Mostrar alerta de error si existe el mensaje 'error' en la sesión
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "{{ session('error') }}",
                confirmButtonText: 'OK'
            });
        @endif
    });
</script>
