<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Eventos | Unicab | Colegio Virtual</title>

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
	<!--SEGUIMIENTO GOOGLE-->
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-158598632-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-158598632-1');
</script>


</head>
<body>

<!--[if lt IE 7]>
<p class="browsehappy">We are Extreamly sorry, But the browser you are using is probably from when civilization started.
    Which is way behind to view this site properly. Please update to a modern browser, At least a real browser. </p>
<![endif]-->

<!--== Header Area Start ==-->
<header id="header-area">
    <?php include "header.php"; ?>
    <script>
    var elemento = document.getElementById("itemEventos");
    elemento.className += " active";
	</script>
</header>
<!--== Header Area End ==-->

<!--== Page Title Area Start ==-->
<!--<section id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">Eventos</h1>
                    <p>Conoce los próximos eventos</p>
                    <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Ver más</a>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!--== Page Title Area End ==-->

<!--== Gallery Page Content Start ==-->
<section id="page-content-wrap">
    <div class="event-page-content-wrap section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--<div class="event-filter-area">
                        <form action="index.php" class="form-inline">
                            <select name="year" id="year">
                                <option selected>Año</option>
                                <option>2018</option>
                                <option>2017</option>
                                <option>2016</option>
                                <option>2015</option>
                                <option>2014</option>
                            </select>

                            <select name="place" id="place">
                                <option selected>Lugar</option>
                                <option>Bogotá</option>
                                <option>Tunja</option>
                                <option>Sogamoso</option>
                            </select>

                            <select name="type" id="type">
                                <option selected>Tipo</option>
                                <option>Evento UNICAB</option>
                                <option>Congreso</option>
                                <option>Seminario</option>
                            </select>

                            <button class="btn btn-brand">Filtro</button>
                        </form>
                    </div>-->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="all-event-list">
                        <!-- Single Event Start -->
                         <?php
$peticion45 = "SELECT IdEvento,NombreE,DescripcionE,LinkE,FechaE,DATE_FORMAT(FechaE, '%d de %M del %Y' ) AS fecha,ImagenE, tipo 
FROM evento WHERE estado = 1 ORDER BY FechaE ASC LIMIT 3";
			   
$resultado45 = mysqli_query($conexion, $peticion45);
while ($fila = mysqli_fetch_array($resultado45)){
	$ruta=substr($fila['ImagenE'], 9);
	$comienzo = "El evento comienza en:";
	$fin = "El evento finaliza en:";
	$comienzo1 = "Comienza el:";
	$fin1 = "Finaliza el:";
	
	if($fila['tipo'] == "fin") {
	    echo " <div class='single-upcoming-event'>
            <div class='row'>
                <div class='col-lg-5'>
                    <div class='up-event-thumb'>
                        <img src='".$ruta."' class='img-fluid' alt='Upcoming Event'>
                        <h4 class='up-event-date'>".$fin1." ".$fila['fecha']."</h4>
                    </div>
                </div>

                <div class='col-lg-7'>
                    <div class='display-table'>
                        <div class='display-table-cell'>
                            <div class='up-event-text'>
							<p>".$fin."</p>
                                <div class='event-countdown'>
								
                                    <div class='event-countdown-counter' data-date='".$fila['FechaE']."'></div>
                                    
                                </div>
                                <h3><b><a class='tituloEvento' href='admisiones-nuevos.php'>".$fila['NombreE']."</a></b></h3>
                                <p>".$fila['DescripcionE']."</p>
                                <a href='".$fila['LinkE']."' class='btn btn-brand'>Más información</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
	}
	else if($fila['tipo'] == "comienzo") {
	    echo " <div class='single-upcoming-event'>
            <div class='row'>
                <div class='col-lg-5'>
                    <div class='up-event-thumb'>
                        <img src='".$ruta."' class='img-fluid' alt='Upcoming Event'>
                        <h4 class='up-event-date'>".$comienzo1." ".$fila['fecha']."</h4>
                    </div>
                </div>

                <div class='col-lg-7'>
                    <div class='display-table'>
                        <div class='display-table-cell'>
                            <div class='up-event-text'>
							<p>".$comienzo."</p>
                                <div class='event-countdown'>
								
                                    <div class='event-countdown-counter' data-date='".$fila['FechaE']."'></div>
                                    
                                </div>
                                <h3><b><a class='tituloEvento' href='admisiones-nuevos.php'>".$fila['NombreE']."</a></b></h3>
                                <p>".$fila['DescripcionE']."</p>
                                <a href='".$fila['LinkE']."' class='btn btn-brand'>Más información</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
	}
	
};

?>

                        <!-- Evento -->
                        

                       
                    </div>
                </div>
            </div>

            <!-- Pagination Start -->
            <!--<div class="row">
                <div class="col-lg-12">
                    <div class="pagination-wrap text-center">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">50</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>-->
            <!-- Pagination End -->
        </div>
    </div>
</section>
<!--== Gallery Page Content End ==-->

<!--== Footer Area Start ==-->
<footer id="footer-area">
   <?php include "footer.php" ?>
</footer>
<!--== Footer Area End ==-->

<!--== Scroll Top ==-->
<a href="#" class="scroll-top">
    <i class="fa fa-angle-up"></i>
</a>
<!--== Scroll Top ==-->

<!-- SITE SCRIPT  -->

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



</body>
</html>
