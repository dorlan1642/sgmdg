<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximum-scale=1">
	<title>Homepage</title>
	<link rel="icon" href="favicon.png" type="image/png">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/linecons.css" rel="stylesheet" type="text/css">
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
	<link href="css/responsive.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" type="text/css">

	<link href='https://fonts.googleapis.com/css?family=Lato:400,900,700,700italic,400italic,300italic,300,100italic,100,900italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Dosis:400,500,700,800,600,300,200' rel='stylesheet' type='text/css'>

	<!-- =======================================================
    Theme Name: Butterfly
    Theme URL: https://bootstrapmade.com/butterfly-free-bootstrap-theme/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
	======================================================= -->

	<script type="text/javascript" src="js/jquery.1.8.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/jquery.isotope.js"></script>
	<script type="text/javascript" src="js/wow.js"></script>
	<script type="text/javascript" src="js/classie.js"></script>

	<script type="text/javascript">
		$(document).ready(function(e) {
			$('.res-nav_click').click(function() {
				$('ul.toggle').slideToggle(600)
			});

			$(document).ready(function() {
				$(window).bind('scroll', function() {
					if ($(window).scrollTop() > 0) {
						$('#header_outer').addClass('fixed');
					} else {
						$('#header_outer').removeClass('fixed');
					}
				});

			});


		});

		function resizeText() {
			var preferredWidth = 767;
			var displayWidth = window.innerWidth;
			var percentage = displayWidth / preferredWidth;
			var fontsizetitle = 25;
			var newFontSizeTitle = Math.floor(fontsizetitle * percentage);
			$(".divclass").css("font-size", newFontSizeTitle)
		}
	</script>
    
<body>

<!--Header_section-->
<header id="header_outer">
    <div class="container">
        <div class="header_section">
            <div class="logo"><a href="javascript:void(0)"><img src="img/logob.png" alt=""></a></div>
            <nav class="nav" id="nav">
                <ul class="toggle">
                    <li><a href="./index.php">Inicio</a></li>
                    <!-- <li><a href="./index.php#service">Services</a></li> -->
                    <li><a href="./aboutus.php">Acerca de</a></li>
					<li><a href="./index.php#Members">Miembros</a></li>
                    <li><a href="./index.php#Events">Eventos</a></li>
                    <li><a href="./index.php#News">Noticias</a></li>
                    <li><a href="#contact">Unirte</a></li>
                </ul>
                <ul class="">
                    <li><a href="./index.php">Inicio</a></li>
                    <!-- <li><a href="./index.php#service">Servicios</a></li> -->
                    <li><a href="./aboutus.php">Acerca de</a></li>
					<li><a href="./index.php#Members">Miembros</a></li>
                    <li><a href="./index.php#Events">Eventos</a></li>
                    <li><a href="./index.php#News">Noticias</a></li>
                    <li><a href="#contact">Unirte</a></li>
                </ul>
            </nav>
            <a class="res-nav_click animated wobble wow" href="javascript:void(0)"><i class="fa-bars"></i></a> </div>
    </div>
</header>
<!--Header_section-->
</head>