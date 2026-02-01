<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Noticia | Unicab | Colegio Virtual</title>

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


<meta property="og:site_name" content="Unicab.org">
<!--meta property="fb:admins" content="" /-->  <!-- use this if you have  -->
<meta property="og:type" content="website"> <!-- 'article' for single page  -->
 <!-- when you post this page url in facebook , this image will be shown -->
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
<?php include "admin-unicab/php/conexion.php"?>
<?php
			function dameURL(){
			$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			return $url;
			}
		?> 
<!-- COMPARTIR FACEBOOK-->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v5.0"></script>
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

<!--== Header Area Start ==-->
<header id="header-area">
 <?php include "header.php"; ?>
    <script>
    var elemento = document.getElementById("itemInicio");
    elemento.className += " active";
	</script>
</header>
<!--== Header Area End ==-->

<?php
		$peticion = "SELECT *, DATE_FORMAT(FechaPublicacionN, '%W %d de %M de %Y') AS fecha 
		FROM noticia WHERE IdNoticia =".$_GET['id']." LIMIT 1";
		$resultado = mysqli_query($conexion, $peticion);
			while ($fila = mysqli_fetch_array($resultado)){ 
				$id=$fila['IdNoticia'];
				$titulo=$fila['TituloN'];
				$fecha=$fila['fecha'];
				$categoria=$fila['CategoriaN'];
				$descripcion=$fila['DescripcionN'];
				$imagen=$fila['ImagenN'];
			};
?>


<!--== Page Title Area Start ==-->
<section id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">Actualidad Educativa</h1>
                    <p>Información Veraz</p>
                    <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Leer</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Page Title Area End ==-->

<!--== Blog Page Content Start ==-->
<div id="page-content-wrap">
    <div class="blog-page-content-wrap section-padding">
        <div class="container">
            <div class="row">
                <!-- Blog content Area Start -->
                <div class="col-lg-8">
                    <article class="single-blog-content-wrap">
                    
                        <header class="article-head">
                            <div class="single-blog-thumb">
                                <img src="<?php echo $imagen; ?>" class="img-fluid" alt="Blog">
                            </div>
                            <footer class="post-share">
                            <div class="row no-gutters ">
                                <div class="col-8">
                                    <div class="shareonsocial">
                                        <span>Comparte:</span>
                                       
                                        <a href="http://www.facebook.com/sharer.php?u=<?php echo dameURL()?>">
                                        <i class="fa fa-facebook"></i></a>
                                        <a href="https://twitter.com/intent/tweet?button_hashtag=<?php echo dameURL()?>&ref_src=twsrc%5Etfw"><i class="fa fa-twitter"></i></a>
                                        <a href="whatsapp://send?text=texto%20con%20URL"><i class="fa fa-whatsapp"></i></a>
                                    </div>
                                </div>
                                <div class="col-4 text-right">
                                    <div class="post-like-comm">
                                        <a href="#"><i class="fa fa-thumbs-o-up"></i>20</a>
                                        <a href="#"><i class="fa fa-comment-o"></i>15</a>
                                    </div>
                                </div>
                            </div>
                        </footer>
                            <div class="single-blog-meta">
                                <h2><?php echo $titulo; ?></h2><hr>
                                <div class="posting-info">
                                    <?php echo $fecha; ?>
                                     
                                </div>
                            </div>
                        </header>
                        
                        <section class="blog-details">
                           
                            <p><?php echo nl2br($descripcion);?> </p>
                           
                            
                            
                            
                            <blockquote class="blockquote">
                                UNICAB - Actualidad Educativa
                            </blockquote>
                        </section>
                        <footer class="post-share">
                            <div class="row no-gutters ">
                                <div class="col-8">
                                    <div class="shareonsocial">
                                        <span>Comparte:</span>
                                       
                                        <a href="http://www.facebook.com/sharer.php?u=<?php echo dameURL()?>">
                                        <i class="fa fa-facebook"></i></a>
                                        <a href="https://twitter.com/intent/tweet?button_hashtag=<?php echo dameURL()?>&ref_src=twsrc%5Etfw"><i class="fa fa-twitter"></i></a>
                                        <a href="whatsapp://send?text=texto%20con%20URL"><i class="fa fa-whatsapp"></i></a>
                                    </div>
                                </div>
                                <div class="col-4 text-right">
                                    <div class="post-like-comm">
                                        <a href="#"><i class="fa fa-thumbs-o-up"></i>20</a>
                                        <a href="#"><i class="fa fa-comment-o"></i>15</a>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </article>
                </div>
                <!-- Blog content Area End -->

                <!-- Sidebar Area Start -->
                <div class="col-lg-4 order-first order-lg-last">
                    
<div class="sidebar-area-wrap">

 <!-- Single Sidebar Start -->
    <div class="single-sidebar-wrap d-none d-lg-block">
       <h4 class="sidebar-title">Síguenos en Facebook</h4>
        <div class="sidebar-body">
           <div class="fb-page" data-href="https://www.facebook.com/unicabvir/" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/unicabvir/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/unicabvir/">Colegio  Virtual Unicab</a></blockquote></div>
        </div>
    </div>
    <!-- Single Sidebar End -->
 

    <!-- Single Sidebar Start -->
    <div class="single-sidebar-wrap">
       <h4 class="sidebar-title">Últimas Noticias</h4>
        <div class="sidebar-body">
            <ul class="brand-unorderlist">
            <?php
		$peticion = "SELECT *, DATE_FORMAT(FechaPublicacionN, '%W %d de %M de %Y') AS fecha 
		FROM noticia WHERE IdNoticia !=".$_GET['id']." ORDER BY IdNoticia DESC LIMIT 3";
		$resultado = mysqli_query($conexion, $peticion);
			while ($fila = mysqli_fetch_array($resultado)){ 
				$id=$fila['IdNoticia'];
				$titulo=$fila['TituloN'];
				$fecha=$fila['fecha'];
				$categoria=$fila['CategoriaN'];
				$descripcion=$fila['DescripcionN'];
				$imagen=$fila['ImagenN'];
				
				echo" <li><a href='noticia.php?id=".$id."#page-content-wrap'><span class='badge badge-primary'>".$fecha."</span><img src=".$imagen." class='img-fluid' alt='Noticia'>".$titulo."</a></li>";
			};
?>
               
            </ul>
        </div>
    </div>
    <!-- Single Sidebar End -->

    <!-- Single Sidebar Start -->
    <div class="single-sidebar-wrap d-none d-lg-block">
       <h4 class="sidebar-title">Enlaces de interés</h4>
        <div class="sidebar-body">
            <div class="tags">
                <a href="admisiones-nuevos.php">Admisiones</a>
                <a href="quienes-somos.php">Nosotros</a>
                <a href="mediadores.php">Mediadores</a>
                <a class="active" href="directorio.php">Directorio</a>
                <a href="historia.php">Historia</a>
                <a href="contacto.php">Contacto</a>
                <a href="index.php">Principal</a>
            </div>
        </div>
    </div>
    <!-- Single Sidebar End -->
</div>
                </div>
                <!-- Sidebar Area End -->
            </div>
        </div>
    </div>
</div>
<!--== Blog Page Content End ==-->

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
<head>
 <meta property="og:title" content= "<?php echo $titulo; ?>" />
 <meta property="og:image" content="<?php echo $imagen;?>"/>
 
 <meta property="og:description" content= "<?php echo $descripcion ;?>" />
 <meta property="og:url" content="<?php echo dameURL()?>"/>
 <meta property="og:site_name" content="Unicab.org" />
 <title><?php echo $titulo;?></title>
 <meta name="<?php echo $descripcion;?>" />



 </head>
</html>
