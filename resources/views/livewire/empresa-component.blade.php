<div>
    <div class="row my-2 mx-2">
        <div class="col">
            <button type="button" class="btn btn-primary btnCrearModal float-end" data-toggle="modal" data-target="#exampleModal">
                Crear Empresa
            </button>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Imagen</th>
                <th>Url</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($list_empresas as $empresa)
                <tr>
                    <td>{{$empresa->name}}</td>
                    <td>{{$empresa->user}}</td>
                    <td>{{$empresa->password}}</td>
                    <td>
                        <img width="100" class="" src="{{ Storage::url($empresa->url_imagen) }}" alt="{{$empresa->name}}"/>
                    </td>
                    <td>{{$empresa->endpoint}}</td>
                    <td>{!!$empresa->status_html!!}</td>
                    <td style="width: 10px">
                        <div class="btn-group " role="group">
                            <a href="#!" wire:loading.attr="disabled" wire:click="edit({{$empresa->id}})"  type="button" class="btn btn-sm btn-primary" >
                                Editar
                            </a>
                            <button style="opacity: .8" type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                <a onclick="EliminarEmpresa({{$empresa->id}},'{{$empresa->name}}')" class="dropdown-item" href="#!">Eliminar</a>
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
        {{ $list_empresas->links() }}
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" data-bs-focus="false" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ (($createMode)?'Crear Empresa':'Editar Empresa')}}</h5>
            </div>
            <div class="modal-body">
                
                @if($createMode)
                {!! Form::open(['id' => 'FormUser', 'method' => 'POST']) !!}
                @else
                {!! Form::model($empresa,['id' => 'FormUser', 'method' => 'PUT']) !!}
                @endif
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre *'); !!}
                        {!! Form::text('name', null, ['wire:model.defer'=> 'name', 'class' => 'form-control', 'placeholder'=>'Nombre', 'autocomplete'=>'off']); !!}
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('user', 'Usuario *'); !!}
                        {!! Form::text('user', null, ['wire:model.defer'=> 'user', 'class' => 'form-control', 'placeholder'=>'Usuario', 'autocomplete'=>'off']); !!}
                        @error('user') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    
                    <div class="form-group ">
                        {!! Form::label('password', 'Contraseña *'); !!}
                        {!! Form::text('password', null,  ['wire:model.defer'=> 'password', 'class' => 'form-control', 'placeholder'=>'Contraseña', 'autocomplete'=>'on']); !!}
                        @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('image_path', 'Imagen *'); !!}
                        {!! Form::file('image_path', ['wire:change'=> '$emit("fileChoosen", this)', 'class' => 'form-control', 'placeholder'=>'imagen', 'accept'=>'image/jpeg, image/png, image/jpg']); !!}
                        @error('image_path') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('endpoint', 'Url Endpoint *'); !!}
                        {!! Form::text('endpoint', null, ['wire:model.defer'=> 'endpoint', 'required','class' => 'form-control', 'placeholder'=>'Url Endpoint']); !!}
                        @error('endpoint') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('status', 'Estatus *'); !!}
                        {!! Form::text('status', null, ['wire:model.defer'=> 'status', 'required','class' => 'form-control', 'placeholder'=>'Url Endpoint', 'autocomplete'=>'off']); !!}
                        @error('status') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                   
                {!! Form::close() !!}

            </div>
            <div class="modal-footer">
                <button type="button" wire:click="resetInputFields" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                @if ($createMode)
                <button type="button" wire:loading.attr="disabled" wire:click="store()" class="btn btn-primary">Crear Empresa</button>
                @else
                <button type="button" wire:loading.attr="disabled" wire:click="update()" class="btn btn-primary">Editar Empresa</button>
                @endif
            </div>
            </div>
        </div>
    </div>

</div>
