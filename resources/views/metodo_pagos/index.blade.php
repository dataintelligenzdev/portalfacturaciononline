<x-app-layout>
    <div class="py-2">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mx-2">
            @livewire('metodo-pago-component')
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">

            window.livewire.on('metodopagoUpdateStore', (message) => {
                swal(message, {icon: "success",});
                $('#exampleModal').modal('hide');
            });
            window.livewire.on('metodopagoEdit', () => {
                $('#exampleModal').modal('show');
            });

            window.livewire.on('roleUserEdit', (message) =>{
                $('#roleModalLabel').html(message)
                $('#roleModal').modal('show')
            })
            window.livewire.on('roleUserUpdate', (message) => {
                $('#roleModal').modal('hide');
                swal(message, {icon: "success",});
            });

            function EliminarMetodo(id, name){
                swal({
                    title: "¿Estas seguro?",
                    text: "Se eliminara el metodo de pago: "+name+". Esta accion es irreversible",
                    icon: "warning",
                    buttons: {
                        cancel: "Cancelar",
                        catch: {
                            text: "Si, Eliminar",
                            closeModal: false,
                            className: 'swal-button--danger'
                        },
                    },
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.livewire.emit('onDeleteRow',id)
                        window.livewire.on('metodopagoDelete', () => {
                            swal('Metodo Eliminado', {icon: "success",});
                        });
                    }
                });
            }
        </script>
    </x-slot>
</x-app-layout>
