<div id="colorlib-main">	
    <section class="colorlib-{{$clave}}" data-section="{{$clave}}">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3" data-animate-effect="fadeInLeft">
                    <span class="heading-meta"></span>
                    <h2 class="colorlib-heading">Facturación</h2>
                </div>
            </div>
            <div class="row contenedor_info ">
                @if ($permitir)
                <div class="colorlib-feature colorlib-feature-sm" data-animate-effect="fadeInLeft">
                    <div class="colorlib-icon">
                        <img style="max-width: 100px" src="{{ Storage::url($empresa->url_imagen) }}" class="mr-3" alt="{{$empresa->name}}">
                    </div>
                    <div class="colorlib-text">
                        <p>        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem eveniet, eum soluta fuga voluptas doloremque numquam, ratione consectetur a fugiat adipisci, alias laudantium quo quisquam corporis molestias quibusdam harum! Similique?
                        </p>
                    </div>
                </div>
                {{--     
                <div class="media mb-3">
                    <img style="max-width: 150px" src="{{ Storage::url($empresa->url_imagen) }}" class="mr-3" alt="{{$empresa->name}}">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem eveniet, eum soluta fuga voluptas doloremque numquam, ratione consectetur a fugiat adipisci, alias laudantium quo quisquam corporis molestias quibusdam harum! Similique?
                </div> --}}
                <form method="POST">
                    <div class="form-group row">
                        <label for="rfc" class="col-sm-3 col-form-label">RFC</label>
                        <div class="col-sm-9">
                            <input wire:model.defer="rfc" type="text" class="form-control" id="rfc" name="rfc">
                            @error('rfc') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Correo Electrónico</label>
                        <div class="col-sm-9">
                            <input wire:model.defer="email" type="email" class="form-control" id="email" name="email">
                            @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Metodo de Pago</label>
                        <div class="col-sm-9">
                            <select wire:model.defer="metodo" class="form-control">
                                <option selected>** Seleccionar **</option>
                                @foreach ($metodos as $metodo)
                                <option value="{{$metodo->clave}}">{{$metodo->name}}</option>
                                @endforeach
                            </select>
                            @error('metodo') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="referencia" class="col-sm-3 col-form-label">Referencia</label>
                        <div class="col-sm-9">
                            <input wire:model.defer="referencia" type="text" class="form-control" id="referencia" name="referencia">
                            <span class="msj_referencia"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="monto" class="col-sm-3 col-form-label">Monto</label>
                        <div class="col-sm-9">
                            <input wire:model.defer="monto" type="text" class="form-control" id="monto" name="monto">
                            @error('monto') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    
                    <div class="form-group row justify-content-md-center">
                        <div class="col-sm-6">
                            <button wire:click="enviar" wire:loading.attr="disabled" type="button" class="btn btn-block btn-primary"><i class="fas fa-file-invoice"></i> Facturar</button>
                        </div>
                    </div>                   
                
                </form>
            @else
            <strong>{{$mensaje}}</strong>
            @endif
            </div>
        </div>
    </section>
</div><!-- end:colorlib-main -->