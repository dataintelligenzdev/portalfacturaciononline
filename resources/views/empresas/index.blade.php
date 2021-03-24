<x-app-layout>
    <div class="py-2">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mx-2">
            @livewire('empresa-component')
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript"> 
            window.livewire.on('fileChoosen', (message) => {
                let inputField = $('#image_path');
                console.log(inputField[0])
                let file = inputField[0].files[0];
                let reader = new FileReader();
                reader.onloadend = () =>{
                    window.livewire.emit('fileUpload', reader.result)
                }
                reader.readAsDataURL(file)
            });

            window.livewire.on('empresaUpdateStore', (message) => {
                swal(message, {icon: "success",});
                $('#exampleModal').modal('hide');
                $('#image_path').val('')
            });
            window.livewire.on('empresaEdit', () => {
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

            function EliminarEmpresa(id, name){
                swal({
                    title: "¿Estas seguro?",
                    text: "Se eliminara la empresa "+name+". Esta accion es irreversible",
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
                        window.livewire.on('empresaDelete', () => {
                            swal('Empresa Eliminada', {icon: "success",});
                        });
                    }
                });
            }
        </script>
    </x-slot>
</x-app-layout>
