<div class="pb-4">
    <div class="row my-2 mx-2">
        <div class="col">
            <button type="button" class="btn btn-primary btnCrearModal float-end" data-toggle="modal" data-target="#exampleModal">
                Crear Metodo de pago
            </button>
        </div>
    </div>

    <table class="table table-striped ">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Clave</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody >
            @forelse ($list_metodos as $metodo)
                <tr>
                    <td>{{$metodo->name}}</td>
                    <td>{{$metodo->clave}}</td>
                    <td>{{$metodo->description}}</td>
                    <td>{!!$metodo->status_html!!}</td>
                    <td style="width: 10px">
                        <div class="btn-group " role="group">
                            <a href="#!" wire:loading.attr="disabled" wire:click="edit({{$metodo->id}})"  type="button" class="btn btn-sm btn-primary" >
                                Editar
                            </a>
                            <button style="opacity: .8" type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                <a onclick="EliminarMetodo({{$metodo->id}},'{{$metodo->name}}')" class="dropdown-item" href="#!">Eliminar</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay resultados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div>
        {{ $list_metodos->links() }}
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" data-bs-focus="false" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ (($createMode)?'Crear Metodo de Pago':'Editar Metodo de Pago')}}</h5>
            </div>
            <div class="modal-body">
                
                @if($createMode)
                {!! Form::open(['id' => 'FormUser', 'method' => 'POST']) !!}
                @else
                {!! Form::model($metodo,['id' => 'FormUser', 'method' => 'PUT']) !!}
                @endif
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre *'); !!}
                        {!! Form::text('name', null, ['wire:model.defer'=> 'name', 'class' => 'form-control', 'placeholder'=>'Nombre', 'autocomplete'=>'off']); !!}
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('clave', 'Clave *'); !!}
                        {!! Form::text('clave', null, ['wire:model.defer'=> 'clave', 'class' => 'form-control', 'placeholder'=>'Clave', 'autocomplete'=>'off']); !!}
                        @error('clave') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    
                    <div class="form-group ">
                        {!! Form::label('description', 'Descripcion *'); !!}
                        {!! Form::text('description', null,  ['wire:model.defer'=> 'description', 'class' => 'form-control', 'placeholder'=>'Descripcion', 'autocomplete'=>'on']); !!}
                        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('status', 'Estatus *'); !!}
                        <div class="form-check form-check-inline">
                            <input wire:model.defer='status' checked class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1">
                            <label class="form-check-label" for="inlineRadio1">Activo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input wire:model.defer='status' class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0">
                            <label class="form-check-label" for="inlineRadio2">Inactivo</label>
                        </div>
                        @error('status') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                   
                {!! Form::close() !!}

            </div>
            <div class="modal-footer">
                <button type="button" wire:click="resetInputFields" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                @if ($createMode)
                <button type="button" wire:loading.attr="disabled" wire:click="store()" class="btn btn-primary">Crear Metodo</button>
                @else
                <button type="button" wire:loading.attr="disabled" wire:click="update()" class="btn btn-primary">Editar Metodo</button>
                @endif
            </div>
            </div>
        </div>
    </div>

</div>
