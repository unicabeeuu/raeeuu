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
    
    
    <link rel="stylesheet" type="text/css" rel="estilovideo/estiloiframe.css">
    
    
    <!-- MODERNIZER  -->
    <script src="assets/vendor/modernizr/modernizr-custom.js"></script>
    
    <!-- Main Master Style  CSS  -->
    <link id="cbx-style" data-layout="1" rel="stylesheet" href="assets/css/style-default.min.css" media="all">
    <?php 
        include "admin-unicab/php/conexion.php"
    ?>
    	
	<!--SEGUIMIENTO GOOGLE-->
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158598632-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-158598632-1');
    </script>
    
    
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
        
        /* ################# NUEVOS ESTILOS DEL BLOG ######################### */
        .gallery-grid {
        	width: 50%;
        	float: left;
        }
        .effect-apollo {
            
        }
        .grid figure figcaption {
        	padding: 1em;
        	color: white;
        	font-size: .8em;
        }
        .grid figure figcaption {
        	position: absolute;
        	top: 0;
        	left: 0;
        	width: 100%;
        	height: 100%;
        }
        .grid figure figcaption a {
            position: absolute;
            bottom: 5px;
            right: 35%;
        }
        .grid figure figcaption p {
            margin-top: 3em;
            font-size: 1.5em;
            color: transparent;
        }
        #line-blog {
            height: 5px;
            color: #ff381d;
            background-color: #ff381d;
            width: 10%;
        }
        figcaption {
            background-color: #114678;
            opacity: .8;
        }
        #title-blog {
            color: #ffd350;
        }
        @media(max-width:767px) {
        	.gallery-grid {
        		width: 100%;
        		float: none;
        	}
        }
        /* ################# FIN NUEVOS ESTILOS DEL BLOG ######################### */
        
    </style>
    
</head>
<body>
    <!--== Blog Area Start  *********************************************************** ==-->
    <section id="blog-area">
        <div class="container">
            <!--== Section Title Start ==-->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <img src="assets/img/logo_jpg.jpg" alt="Logo" class="img-fluid" style="width: 40%">
                        <img src="assets/img/imgblog/logo_conectados.png" class="img-fluid"/>
                        <br>
                        <!--Categorías-->
                        <?php include "nav_blog_moodle.php"; ?>
                        
                    </div>
                </div>
            </div>
            <!--== Section Title End ==-->
            
            <!--== Blog Content Wrapper ==-->
            <div class="row">
        		<div class="container">
        		    <?php
        		        $sql_blog = "SELECT IdBlog, TituloB, DATE_FORMAT(FechaPublicacionB, '%d de %M') AS fecha, ImagenB, DescripcionB, Id_categoria FROM blog 
                        WHERE estado_rev_texto != 0 AND estado_rev_mult != 0 ORDER BY IdBlog DESC LIMIT 3";
                    			  
                        $res_blog = mysqli_query($conexion, $sql_blog);
                        while ($filab = mysqli_fetch_array($res_blog)){
                            echo '<div class="col-md-4 gallery-grid">
                					<div class="grid single-blog-post">
                						<figure class="effect-apollo blog-thumb">
                							<img src="'.substr($filab['ImagenB'], 9).'" width="100%" height="300" alt="Blog" clas="img-fluid"/>
                								<figcaption>
                								    <center>
                								        <h5 id="title-blog">'.$filab['TituloB'].'</h5>
                								        <hr id="line-blog">
                								        <p>Lively Ride</p>
                									    <a href="articulo_moodle.php?id='.$filab['IdBlog'].'&idcat='.$filab['Id_categoria'].'#page-content-wrap" class="btn btn-brand">Leer</a>
                								    </center>
                								</figcaption>
                						</figure>
                					</div>
                				</div>';
                        }
        		    ?>
        			<div class="clearfix"> </div>
        		</div>
        	</div>
        	
            <div class="row" style="display: none;">
                <!--== Single Blog Post start ==-->
                
                <?php
                    $peticion580 = "SELECT IdBlog, TituloB, DATE_FORMAT(FechaPublicacionB, '%d de %M') AS fecha, ImagenB, DescripcionB, Id_categoria FROM blog 
                        WHERE estado_rev_texto = 1 AND estado_rev_mult = 1 ORDER BY IdBlog DESC LIMIT 3";
                    			  
                    $resultado580 = mysqli_query($conexion, $peticion580);
                    while ($fila = mysqli_fetch_array($resultado580)){
                	
                    	echo "
                    	<div class='col-lg-4 col-md-6'>
                                    <article class='single-blog-post'>
                                        <figure class='blog-thumb'>
                                            <div class='blog-thumbnail'>
                                                <img src='".substr($fila['ImagenB'], 9)."' alt='Blog' class='img-fluid'>
                                            </div>
                                            <figcaption class='blog-meta clearfix'>
                                                <a href='articulo.php?id=".$fila['IdBlog']."&idcat=".$fila['Id_categoria']."#page-content-wrap' class='author'>
                                                    <div class='author-info'>
                                                        <p>".$fila['fecha']."</p>
                                                    </div>
                                                </a>
                                                <!--<div class='like-comm pull-right'>
                                                    <a href='#'><i class='fa fa-comment-o'></i>77</a>
                                                    <a href='#'><i class='fa fa-heart-o'></i>12</a>
                                                </div>-->
                                            </figcaption>
                                        </figure>
                    
                                        <div class='blog-content'>
                                            <h3><a href='articulo.php?id=".$fila['IdBlog']."#page-content-wrap'>".$fila['TituloB']."</a></h3>
                                            <p id='textoDescripcion'>".$fila['DescripcionB']."</p>
                                            <a href='articulo.php?id=".$fila['IdBlog']."&idcat=".$fila['Id_categoria']."#page-content-wrap' class='btn btn-brand'>Leer</a>
                                        </div>
                                    </article><br>
                                </div>
                    	";
                    };
                
                ?>
                <!--== Single Blog Post End ==-->
            </div>
            <!--== Blog Content Wrapper  ***********************************************************  ==-->
        </div>
    </section>
    <!--== Blog Area EndBlog ==-->

    
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

    <!-- CONFIGURACIÓN SLIDER OWL-CAROUSEL  -->
	<script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:0,
            nav:false,
        	autoplay: true,
        	autoplayTimeout:4000,
        	autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })
	</script>
	
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5e3f18af298c395d1ce6edf4/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>
