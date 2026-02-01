<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Admisiones | Unicab | Colegio Virtual</title>

    <meta name="description" content="simple description for your site">
<meta name="keywords" content="keyword1, keyword2">
<meta name="author" content="Jobz">

<!-- twitter card starts from here, if you don't need remove this section -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@yourtwitterusername">
<meta name="twitter:creator" content="@yourtwitterusername">
<meta name="twitter:url" content="http://twitter.com">
<meta name="twitter:title" content="Your home page title, max 140 char"> <!-- maximum 140 char -->
<meta name="twitter:description" content="Your site description, maximum 140 char "> <!-- maximum 140 char -->
<meta name="twitter:image" content="assets/img/twittercardimg/twittercard-144-144.png">  <!-- when you post this page url in twitter , this image will be shown -->
<!-- twitter card ends here -->

<!-- facebook open graph starts from here, if you don't need then delete open graph related  -->
<meta property="og:title" content="Your home page title">
<meta property="og:url" content="http://your domain here.com">
<meta property="og:locale" content="en_US">
<meta property="og:site_name" content="Your site name here">
<!--meta property="fb:admins" content="" /-->  <!-- use this if you have  -->
<meta property="og:type" content="website"> <!-- 'article' for single page  -->
<meta property="og:image" content="assets/img/opengraph/fbphoto-476-476.png"> <!-- when you post this page url in facebook , this image will be shown -->
<!-- facebook open graph ends here -->

<!-- desktop bookmark -->
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="assets/img/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!-- icons & favicons -->
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">  <!-- this icon shows in browser toolbar -->
<link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico"> <!-- this icon shows in browser toolbar -->
<link rel="apple-touch-icon" sizes="57x57" href="favicon.ico">
<link rel="apple-touch-icon" sizes="60x60" href="favicon.ico">

<link rel="icon" type="image/png" sizes="192x192" href="favicon.ico">
<link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
<link rel="icon" type="image/png" sizes="96x96" href="favicon.ico">
<link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">
<link rel="manifest" href="assets/img/favicon/manifest.json">

    <link rel="shortcut icon" type="favicon.ico">
<link rel="icon" type="image/x-icon" href="favicon.ico">

<!-- Fallback For IE 9 [ Media Query and html5 Shim] -->
<!--[if lt IE 9]>
<script src="assets/vendor/css3-mediaqueries-js/css3-mediaqueries.js"></script>
<![endif]-->

<!-- GOOGLE FONT -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

<!-- BOOTSTRAP CSS -->
<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/vendor/navbar/bootstrap-4-navbar.css">

<!--Animate css -->
<link rel="stylesheet" href="assets/vendor/animate/animate.css" media="all">

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

<!-- MODERNIZER  -->
<script src="assets/vendor/modernizr/modernizr-custom.js"></script>

<!-- Main Master Style  CSS  -->
<link id="cbx-style" data-layout="1" rel="stylesheet" href="assets/css/style-default.min.css" media="all">

<style>
	hr {
		border-color: #Ff9805;
	}
	.imgAyuda {
		width: 20%;
		height: auto;
	}
</style>

</head>
<body>
    <!--== Header Area Start ==-->
    <header id="header-area">
        <?php include "header.php"; ?>
         <script>
        var elemento = document.getElementById("itemServicios");
        elemento.className += " active";
    	</script>
    </header>
    <!--== Header Area End ==-->
    
     <?php 
        $mensaje = $_REQUEST['s'];
        //echo $mensaje;
        $resultados = explode("_", $mensaje);
        //print_r($resultados);
     ?>

    <!--== Page Title Area Start ==-->
    <section id="page-title-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="page-title-content">
                        <?php
                            if($resultados[0] == "CorreoOK" && $resultados[1] == "EstudianteOK" && $resultados[2] == "MatriculaOK") {
                                echo "<h3>¡EL FORMULARIO SE ENVIÓ CON ÉXITO!</h3>";
                                echo "<h3>Resumen:</h3><h4>Correo enviado a la secretaría académica con éxito.</h4>";
                                echo "<h4>Estudiante validado con éxito.</h4><h4>Proceso de solicitud de matrícula con éxito.</h4><hr>";
								echo "<h5>Por favor escríbenos por whatsapp al número 315 696 5291 para confirmar que los documentos fueron recibidos.</h5><hr>";
								//echo "<h5 style='color: yellow;'>Para completar el proceso de matrícula es necesario que presentes una evaluación de presaberes <a class='btn btn-warning btn-lg' href='eval_pres.php' target='_blank'>AQUI <i class='fa fa-check-circle' aria-hidden='true'></i></a>.</h5><hr>";
								echo "<h4>Si es correcta la información suministrada en 10 días hábiles recibirás confirmación de la matrícula </h4>";
								echo "<a href='index.php' class='btn btn-brand smooth-scroll'>Página Principal</a>";
                            }
                            else if($resultados[0] == "CorreoOK" && $resultados[1] == "EstudianteOK" && $resultados[2] == "MatriculaError") {
                                echo "<h1 class='h2'>¡SE PRESENTARON ERRORES EN EL PROCESO!</h1><hr>";
                                echo "<h3>Resumen:</h3><h4>Correo enviado a la secretaría académica con éxito.</h4>";
                                echo "<h4>Estudiante validado con éxito.</h4><h4>Proceso de solicitud de matrícula con error.</h4><hr>";
								echo "<p>ENVÍANOS UN CORREO A matriculas.academica@unicab.org</p>";
								echo "<a href='pre_admisiones.php' class='btn btn-brand smooth-scroll'>Intentar nuevamente</a>";
                            }
                            else if($resultados[0] == "CorreoOK" && $resultados[1] == "EstudianteError") {
                                echo "<h1 class='h2'>¡SE PRESENTARON ERRORES EN EL PROCESO!</h1><hr>";
                                echo "<h3>Resumen:</h3><h4>Correo enviado a la secretaría académica con éxito.</h4>";
                                echo "<h4>Error validando estudiante.</h4><hr>";
								echo "<p>ENVÍANOS UN CORREO A matriculas.academica@unicab.org</p>";
								echo "<a href='pre_admisiones.php' class='btn btn-brand smooth-scroll'>Intentar nuevamente</a>";
                            }
                            else if($resultados[0] == "CorreoError") {
                                echo "<h1 class='h2'>¡SE PRESENTARON ERRORES EN EL PROCESO!</h1><hr>";
                                echo "<h3>Resumen:</h3><h4>Error enviado correo a la secretaría académica.</h4>";
                                echo "<hr>";
								echo "<p>ENVÍANOS UN CORREO A matriculas.academica@unicab.org</p>";
								echo "<a href='pre_admisiones.php' class='btn btn-brand smooth-scroll'>Intentar nuevamente</a>";
                            }
						 
						?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Register Page Content Start ==-->
    <section id="page-content-wrap">
        <div class="register-page-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">                        
                        <!--JUMBOTRÓN-->
						<div class="jumbotronzz" align="center">
						<img src="assets/img/admisiones/Panchita.png" alt="" class="img-fluid imgAyuda"/>
						<h4 class="display-4">¿Necesitas ayuda?</h4>
						<p class="lead">Sí necesitas ayuda o acompañamiento en el proceso, contáctate con nuestro equipo de trabajo</p>
						<hr class="my-4">
						<h4 class="llamanos">Llámanos o escríbenos</h4>
						<h4 class="llamanos">300 815 6531 - 315 696 5291</h4>
						<!--<a class="btn btn-primary btn-lg" href="contacto.php" role="button">Contactar</a>-->
						</div>
						<!--JUMBOTRÓN-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Modal -->
	<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalScrollableTitle">Términos y Condiciones</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			Unicab respeta la privacidad de sus usuarios, los datos de registro y demás información recibida a través de la página web, dominios, subdominios, landing pages, blogs, redes sociales oficiales, entre otros, serán preservados y protegidos. Está Política de Privacidad también se aplica a nuestra recopilación de datos, procesamiento y metodología de uso.  Al utilizar nuestro sitio web, aceptas la política de manejo de la información que se describe en la presente Política de Privacidad. En caso de que no estés de acuerdo con los métodos mencionados que aquí se describen, no deberás hacer uso de nuestros sitios web.<br><br>

	<b>Políticas de Privacidad y Uso de Datos</b><br><br>

	El propósito por el que recopilamos tus datos personales radica principalmente  en agilizar tu proceso de matrícula en nuestra organización, Es fundamental para nosotros hacer uso apropiado de la información de nuestros usuarios, así como garantizar la protección y confidencialidad de tus datos mediante el cumplimiento de la Ley 1581 de 2012 sobre la política de tratamiento y procedimiento de datos personales.

		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		  </div>
		</div>
	  </div>
	</div>
	<!--modal-->
    
    <!--== Register Page Content End ==-->

    <!--== Footer Area Start ==-->

    <!-- Footer Bottom Start -->
    <footer id="footer-area">
   <?php include "footer.php" ?>
</footer>
    <!-- Footer Bottom End -->


<!--== Scroll Top ==-->
<a href="#" class="scroll-top">
    <i class="fa fa-angle-up"></i>
</a>
<!--== Scroll Top ==-->

    <!-- SITE SCRIPT  -->
    
    <!--VALIDA TAMAÑO DE INPUT FILE-->
    
    <!--FIN VALIDA TAMAÑO-->

<!-- Jquery JS  -->
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>

<!-- POPPER JS -->
<script src="assets/vendor/bootstrap/js/popper.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/navbar/bootstrap-4-navbar.js"></script>

<!--owl-->
<script src="assets/vendor/owl-carousel/owl.carousel.min.js"></script>

<!--Waypoint-->
<script src="assets/vendor/waypoint/waypoints.min.js"></script>

<!--CounterUp-->
<script src="assets/vendor/counterup/jquery.counterup.min.js"></script>

<!--isotope-->
<script src="assets/vendor/isotope/isotope.pkgd.min.js"></script>

<!--magnific-->
<script src="assets/vendor/magnific/jquery.magnific-popup.min.js"></script>

<!--Smooth Scroll-->
<script src="assets/vendor/smooth-scroll/jquery.smooth-scroll.min.js"></script>

<!--Jquery Easing-->
<script src="assets/vendor/jquery-easing/jquery.easing.1.3.min.js"></script>

<!--Nice Select -->
<script src="assets/vendor/nice-select/jquery.nice-select.js"></script>



<!--Jquery Valadation -->
<script src="assets/vendor/validation/jquery.validate.min.js"></script>
<script src="assets/vendor/validation/additional-methods.min.js"></script>

<!--off-canvas js -->
<script src="assets/vendor/js-offcanvas/js/js-offcanvas.pkgd.min.js"></script>

<!-- Countdown -->
<script src="assets/vendor/jquery.countdown/jquery.countdown.min.js"></script>

<!-- custom js: main custom theme js file  -->
<script src="assets/js/theme.min.js"></script>

<!-- custom js: custom js file is added for easy custom js code  -->
<script src="assets/js/custom.js"></script>

<!-- custom js: custom scripts for theme style switcher for demo purpose  -->


<script>
	$(document).ready(function(){
		
				
		$('form').submit(function(){
			if($('input[type="text"]').val() == '' || $('input[type="email"]').val() == '' || $('input[type="file"]').val() == '' || $('textarea').val() == ''){
				alert('Rellena todos los campos');
				return false;
			}
		});
	});
	

</script>


</body>
</html>
