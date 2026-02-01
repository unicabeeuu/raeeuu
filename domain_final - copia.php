<?php 
	session_start();
	include "admin-unicab/php/conexion.php";
	
	$usu_domain = $_SESSION['usu_domain'];
	
	$sql_palabras = "SELECT id_palabras FROM tbl_usuarios_domain WHERE usuario = '$usu_domain'";
	$exe_palabras = mysqli_query($conexion, $sql_palabras);
	while ($rowPalabras = mysqli_fetch_array($exe_palabras)) {
		$id_palabras = $rowPalabras['id_palabras'];
	}
	$id_palabras_array = explode(",", $id_palabras);
	if (count($id_palabras_array) > 0) {
		$sql_delete = "DELETE FROM tbl_usuarios_domain_palabras WHERE usuario = '$usu_domain'";
		$exe_delete = mysqli_query($conexion, $sql_delete);
		
		for ($i = 0; $i < count($id_palabras_array); $i++) {
			$sql_insert = "INSERT INTO tbl_usuarios_domain_palabras (usuario, id_palabra) 
			VALUES ('$usu_domain', ".$id_palabras_array[$i].")";
			$exe_insert = mysqli_query($conexion, $sql_insert);
		}
	}
	
?>

<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Unicab | Colegio Virtual.</title>

    <meta name="description" content="Unicab Corporación Educativa, es una institución de educación que desde hace 18 años busca consolidar un modelo educativo innovador y de pertinencia con la realidad del país. ">
    <meta name="keywords" content="colegio, virtual, unicab, educación, ciclos, grados, profesores, estudiantes">
    <meta name="author" content="Impacto Digital Colombia">
    
    <!-- twitter card starts from here, if you don't need remove this section -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@unicab">
    <meta name="twitter:creator" content="@unicab">
    <meta name="twitter:url" content="https://unicab.org">
    <meta name="twitter:title" content="Unicab | Colegio Virtual"> <!-- maximum 140 char -->
    <meta name="twitter:description" content="Unicab Corporación Educativa, es una institución de educación que desde hace 18 años busca consolidar un modelo educativo innovador y de pertinencia con la realidad del país."> <!-- maximum 140 char -->
    <meta name="twitter:image" content="assets/img/twitter.jpg">  <!-- when you post this page url in twitter , this image will be shown -->
    <!-- twitter card ends here -->
    
    <!-- facebook open graph starts from here, if you don't need then delete open graph related  -->
    <meta property="og:title" content="Colegio Unicab Virtual">
    <meta property="og:url" content="https://unicab.org">
    <meta property="og:locale" content="es_ES">
    <meta property="og:site_name" content="Unicab Virtual">
    <!--meta property="fb:admins" content="" /-->  <!-- use this if you have  -->
    <meta property="og:type" content="website"> <!-- 'article' for single page  -->
    <meta property="og:image" content="assets/img/opengraph/fbphoto-476-476.png"> <!-- when you post this page url in facebook , this image will be shown -->
    <!-- facebook open graph ends here -->
    
    
    <!-- icons & favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">  <!-- this icon shows in browser toolbar -->
    <link rel="icon" type="image/x-icon" href="favicon.ico"> <!-- this icon shows in browser toolbar -->
    <link rel="apple-touch-icon" sizes="57x57" href="favicon.ico">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon.ico">
    
    <link rel="icon" type="image/png" sizes="192x192" href="favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">
    <link rel="manifest" href="assets/img/favicon/manifest.json">
    
    <link rel="shortcut icon" type="favicon.ico">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/navbar/bootstrap-4-navbar.css">
    
    <!-- FONT AWESOME CSS -->
    <link rel="stylesheet" href="assets/vendor/fontawesome/css/font-awesome.min.css">
    
    <!--owl carousel css -->
    <link rel="stylesheet" href="assets/vendor/owl-carousel/owl.carousel.css" media="all">
    
    <!--Magnific Popup css -->
    <link rel="stylesheet" href="assets/vendor/magnific/magnific-popup.css" media="all">
    
    <!--Nice Select css -->
    <link rel="stylesheet" href="assets/vendor/nice-select/nice-select.css" media="all">
    
    <!--Offcanvas css -->
    <link rel="stylesheet" href="assets/vendor/js-offcanvas/css/js-offcanvas.css" media="all">
    
    
    <link rel="stylesheet" type="text/css" rel="estilovideo/estiloiframe.css">
    
	<!-- Jquery JS  -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/vendor/jquery-1.11.1.min.js"></script>
	<script src="assets/vendor/responsiveslides.min.js"></script>
    
    <!-- MODERNIZER  -->
    <script src="assets/vendor/modernizr/modernizr-custom.js"></script>
    
    <!-- Main Master Style  CSS  -->
    <link id="cbx-style" data-layout="1" rel="stylesheet" href="assets/css/style-default.min_domain.css" media="all">
    
	<!--SEGUIMIENTO GOOGLE-->
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158598632-1"></script>
    <script>
		jQuery.noConflict ();
		
		// Declaramos la lista de voces en español fuera de la función principal
		// para que sea accesible por la función decir().
		let vocesEspanol = [];
		const synth = window.speechSynthesis;

		// Función para obtener y filtrar las voces en español
		const cargarVocesEspanol = () => {
			const allVoices = synth.getVoices();
			// Filtramos solo las voces que empiezan con 'es' (español)
			const vocesFiltradas = allVoices.filter(voice => voice.lang.startsWith('es'));
			
			if (vocesFiltradas.length > 0) {
				vocesEspanol = vocesFiltradas;
				console.log('Voces en español cargadas con éxito:', vocesEspanol);
				return true;
			}
			return false;
		};

		// Patron de carga garantizada: 
		// 1. Usar el evento voiceschanged para carga automática
		if ('speechSynthesis' in window) {
			synth.onvoiceschanged = cargarVocesEspanol;
		}
		
		// 2. Intentar la carga inmediatamente por si ya se cargaron (aunque sea la fuente del problema)
		cargarVocesEspanol();
	
		$(function() {
			/*$("#slider4").responsiveSlides({
				auto: true,
				pager: false,
				nav: true,
				speed: 500,
				namespace: "callbacks",
				before: function () {
				$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});*/
			if (!'speechSynthesis' in window) return alert("Lo siento, tu navegador no soporta esta tecnología");
			window.speechSynthesis.cancel();
			//vocesDisponibles = speechSynthesis.getVoices();
			//console.log({ vocesDisponibles })
			
			var owl = $('.owl-carousel');
			owl.owlCarousel();
			// Listen to owl events:
			owl.on('changed.owl.carousel', function(event) {
				var input = ".txtpalabra" + (event.page.index + 1);
				var palabra = $(input).val();
				//console.log(palabra);
				// Asegúrate de que las voces se carguen antes de intentar hablar, si no se cargaron antes
				if (vocesEspanol.length === 0) {
					cargarVocesEspanol();
				}
				decir(palabra);
				
			});
		});
		
		function decir(palabra = "") {
			/*speechSynthesis.getVoices().forEach(function(voice) {
			   console.log('Hi! My name is ', voice.name);
			});*/
			// [0] --> Microsoft Helena - Spanish (Spain)
			// [1] --> Microsoft Laura - Spanish (Spain)
			// [2] --> Microsoft Pablo - Spanish (Spain)
			// [7] --> Google español
			// [8] --> Google español de Estados Unidos
			
			//speechSynthesis.speak(new SpeechSynthesisUtterance(palabra));
			var voz4 = new SpeechSynthesisUtterance();
			//voz4.voice = speechSynthesis.getVoices()[0]; //Microsoft Helena - Spanish (Spain)
			// Usamos la primera voz en español disponible de la lista cargada
			if (vocesEspanol && vocesEspanol.length > 0) {
				voz4.voice = vocesEspanol[0]; 
			}
			// Siempre establece el idioma para la pronunciación correcta, es lo más importante
			voz4.lang = 'es-ES'; // Establece el idioma. Puedes usar solo 'es' si prefieres.
			
			voz4.text = palabra;
			//speechSynthesis.speak(voz4);
			synth.speak(voz4);
		}
	  
    </script>
    
    <!-- BANNER XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
    
    <?php    
        //$sql_banner = "SELECT * FROM tbl_metodo_domain WHERE estado = '1' ORDER BY id DESC";
		$sql_banner = "SELECT * FROM tbl_metodo_domain WHERE id IN (SELECT id_palabra FROM tbl_usuarios_domain_palabras WHERE usuario = '$usu_domain') ORDER BY id DESC";
        $exe_banner=mysqli_query($conexion,$sql_banner);
        $cont=1;
    
        while ($rowImagen = mysqli_fetch_array($exe_banner)) {
            echo '<style type="text/css">
                    #slider-area .slide-bg-'.$cont.' {
						background-image: url('.substr($rowImagen['imagen'], 9).');
						background-size: 90% 90%;
                    }
                </style>';
            
            $cont++;
        }
    ?>
    <style>
        .titulo {
            font-size: 80px !Important;
        }
        .titulo1 {
            font-size: 80px !Important;
            color: white !Important;
        }
        #iv {
            width: 80%;
            height: 450px;
        }
        
        #navblog{
           height: 60px;
           text-align: center;
        }
    
        #navblog ul{
            list-style: none;
            display: inline-block;
        }
    
        #navblog ul li{
             float: left;
             padding: 0 18px;
             margin-left: 18px;
        }
    
        #navblog ul li a {
             color: black;
             font-weight: bold;
             text-decoration: none;
             font-size: 18px;
        }
        
        .rslides {
			position: relative;
			list-style: none;
			overflow: hidden;
			width: 100%;
			padding: 0;
			margin: 0;
		}
		.rslides li {
			-webkit-backface-visibility: hidden;
			position: absolute;
			display: none;
			width: 100%;
			left: 0;
			top: 0;
		}
		.rslides li{
			position: relative;
			display: block;
		}
        
    </style>
    
</head>
<body>

    <!--== Header Area Start ***********************************************************  ==-->
    <header id="header-area">
        <?php include "header_domain.php"; ?>        
    </header>
    <!--== Header Area End ==-->

    <!--== Slider Area Start  *********************************************************** ==-->
    <section id="slider-area">
    
        <div class="slider-active-wrap owl-carousel text-center text-md-left">
            <!-- Single Slide Item Start -->
            <?php 
                //$sql_banner1="SELECT * FROM tbl_metodo_domain WHERE estado = '1' ORDER BY id DESC";
				$sql_banner1="SELECT * FROM tbl_metodo_domain WHERE id IN (SELECT id_palabra FROM tbl_usuarios_domain_palabras WHERE usuario = '$usu_domain') ORDER BY id DESC";
                $exe_banner1=mysqli_query($conexion,$sql_banner1);
                $cont1=1;
                while ($rowBanner = mysqli_fetch_array($exe_banner1)) {
					$palabra = $rowBanner['palabra'];
					echo ' <div class="single-slide-wrap slide-bg-'.$cont1.'">
								<div class="container">
									<div class="row">
										<div class="col-lg-9">
											<div class="slider-content">
												<input type="hidden" class="txtpalabra'.$cont1.'" value="'.$palabra.'"/>
											</div>
										</div>
									</div>
								</div>
							</div>';
							$cont1++;   
                }
            ?>
        </div>
    
        <!-- Social Icons Area Start  *********************************************************** -->
        <!--<div class="social-networks-icon">
            <ul>
                <li><a href="https://es-la.facebook.com/unicabvir/"><i class="fa fa-facebook"></i> </a></li>
                <li><a href="https://www.instagram.com/unicabvirtual/"><i class="fa fa-instagram"></i> </a></li>
                <li><a href="https://www.youtube.com/channel/UCFK81Ynii3fL3iyvYhzeQ_Q"><i class="fa fa-youtube"></i> </a></li>
            </ul>
        </div>-->
        <!-- Social Icons Area End -->
    </section>
    <!--== Slider Area End ==-->
	
	<!--== Domain ==-->
	<!--<section>
		<div class="container" id="img_banner">
			<div class="banner-info">
				<div  class="callbacks_container">
					<ul class="rslides" id="slider4">
						<?php
							/*while ($row_nuevo = mysqli_fetch_array($exe_nuevo)) {
								echo '<li>
									<div class="col-md-6 ban-left">
									<img src="'.$row_nuevo['imagen'].'" alt=" " class="img-responsive" style="width: 50%;"/>
									</div>
									<div class="col-md-6 ban-right">
									<p>'.$row_nuevo['titulo'].'</p>
									</div>
									<div class="clearfix"></div>
									</li>';
							}*/
						?>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</section>-->
	<!--== Domain ==-->

    <!--== Footer Area Start ==-->
    <footer id="footer-area">
       <?php //include "footer.php" ?>
    </footer>
    <!--== Footer Area End ==-->

    <!--== Scroll Top ==-->
    <a href="#" class="scroll-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!--== Scroll Top ==-->

    <!-- SITE SCRIPT  -->
    
    <!-- BOOTSTRAP JS -->
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/navbar/bootstrap-4-navbar.js"></script>
    
    <!--owl-->
    <script src="assets/vendor/owl-carousel/owl.carousel.min.js"></script>
    
    <!--Smooth Scroll-->
    <script src="assets/vendor/smooth-scroll/jquery.smooth-scroll.min.js"></script>
    
    <!-- custom js: custom js file is added for easy custom js code  -->
    <script src="assets/js/custom.js"></script>

    <!-- CONFIGURACIÓN SLIDER OWL-CAROUSEL  -->
	<script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:0,
            nav:false,
        	autoplay: true,
        	autoplayTimeout:2000,
        	autoplayHoverPause:false,
			slideSpeed: 300,
			pagination: false,
			responsiveClass:true,
            responsive:{
                0:{
                    items:1,
					pagination: false,
                },
                600:{
                    items:1,
					pagination: false,
                },
                1000:{
                    items:1,
					pagination: false,
                }
            }
        });
	</script>
</body>
</html>
