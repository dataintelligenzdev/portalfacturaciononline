<div class="row">
    @foreach ($listado_empresas as $empresa)
        <div class="col-md-6 animate-box animate-box2" data-animate-effect="fadeInLeft">
            <a href="{{ route('facturaenlinea', $empresa->password) }}">
                <div class="project" style="background-image: url({{ Storage::url($empresa->url_imagen) }});">
                <div class="desc">
                        <div class="con">
                        <h3>Facturar con {{$empresa->name}}</h3>
                    </div>
                </div>
            </div>
            </a>
        </div>
    @endforeach
    
</div>
