<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Facturar en  linea</title>
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

	</head>
	<body>
	<div id="colorlib-page">
		<div class="container-wrap">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="border js-fullheight contenedor">
			<div class="text-left">
				<div class="author-img" style="background-image: url({{ Storage::url('logo.png') }});"></div>
				<h1 id="colorlib-logo"><a href="index.html"></a></h1>
				<span class="position text-black">Te recordamos que este servicio está disponible sólo para México y que tu factura electrónica estará disponible en el sistema en un lapso de entre 15-30 minutos después de finalizado tu consumo.
				</span>
			</div>
			<nav id="colorlib-main-menu" role="navigation" class="navbar">
				<div id="navbar" class="collapse">
					<ul>
						<li class="active">Recuerda que la fecha de la factura corresponde al día que la generas.</li>
						<li></li>
						<li>1 Debes contar con:</li>
						<li>- RFC</li>
						<li>- Email</li>
						<li>- Referencia</li>
						<li>- Monto de la compra</li>
						<li></li>
						<li>2 Selecciona la marca</li>
						<li></li>
						<li>3 Llena los datos</li>
					</ul>
				</div>
			</nav>

			<div class="colorlib-footer">
				<p><small>&copy; <!-- Link back to Colorlib can t be removed. Template is licensed under CC BY 3.0. -->
				Copyright <script>document.write(new Date().getFullYear());</script> All rights reserved.</small></p>
			</div>

		</aside>

		<div id="colorlib-main">
			
			<section class="colorlib-work" data-section="work">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta"></span>
							<h2 class="colorlib-heading animate-box">Facturación</h2>
						</div>
					</div>
					<div class="row row-bottom-padded-sm animate-box" data-animate-effect="fadeInLeft">
					</div>
					@livewire('inicio-component')
				</div>
			</section>


		</div><!-- end:colorlib-main -->
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

	</body>
</html>

