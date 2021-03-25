<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Facturar en linea</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="land/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="land/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="land/css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="land/css/flexslider.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="land/css/owl.carousel.min.css">
	<link rel="stylesheet" href="land/css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="land/css/style.css?{{ uniqid()}}">

	<!-- Modernizr JS -->
	<script src="land/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="land/js/respond.min.js"></script>
	<![endif]-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    @livewireStyles
	</head>
	<body>
	<div id="colorlib-page">
		<div class="container-wrap">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="border js-fullheight contenedor">
			<a href="/">
                <div class="text-left">
                    <div class="author-img" style="background-image: url({{ Storage::url('logo.png') }});"></div>
                    {{-- <h1 id="colorlib-logo"><a href="index.html"></a></h1> --}}
                    {{-- <span class="position text-black">Te recordamos que este servicio está disponible sólo para México y que tu factura electrónica estará disponible en el sistema en un lapso de entre 15-30 minutos después de finalizado tu consumo.
                    </span> --}}
                </div>
            </a>
			<nav id="colorlib-main-menu"  >
				<div  >
					<ul>
						@foreach ($listado_empresas as $empresa)
                            <li class="{{ (($empresa->password==$clave)?'active':'')}}"><a href="{{ route('facturaenlinea', $empresa->password) }}" data-nav-section="{{$empresa->password}}">{{$empresa->name}}</a></li>
                        @endforeach
					</ul>
				</div>
			</nav>

			<div class="colorlib-footer">
				<p><small>&copy; <!-- Link back to Colorlib can t be removed. Template is licensed under CC BY 3.0. -->
				Copyright <script>document.write(new Date().getFullYear());</script> All rights reserved.</small></p>
			</div>

		</aside>
        @livewire('facturar-component', ['clave' => $clave, 'permitir'=>$permitir, 'mensaje' => $mensaje])		
	</div><!-- end:container-wrap -->
	</div><!-- end:colorlib-page -->

	<!-- jQuery -->
	<script src="land/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="land/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="land/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="land/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="land/js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="land/js/owl.carousel.min.js"></script>
	<!-- Counters -->
	<script src="land/js/jquery.countTo.js"></script>
	
	
	<!-- MAIN JS -->
	<script src="land/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @livewireScripts
    <script type="text/javascript">

        @if (!$permitir)
            swal({
                title: 'Disculpe',
                text: '{{$mensaje}}',
                icon: "info",
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location='/';
                } else {
                    window.location='/';
                }
            });
        @endif
        window.livewire.on('empresaInactiva', (message) => {
            swal({
                title: 'Disculpe',
                text: message,
                icon: "info",
              })
              .then((willDelete) => {
                if (willDelete) {
                    window.location='/';
                } else {
                    window.location='/';
                }
            });
        });

		window.livewire.on('validarReferencia', (message) => {
            $('.msj_referencia').text(message)
        });
		
		window.livewire.on('facturacion', (message) => {

            swal({
                title: ((message.ok=='1')?'Exito':'Disculpe'),
                text: ((message.ok=='1')?message.msg:message.err),
                icon: ((message.ok=='1')?'success':'warning'),
              })
              .then((willDelete) => {
                if (willDelete) {
                    ((message.ok=='1')?window.location='/':'');
                } else {
                }
            });
        });
    </script>
</body>

</html>