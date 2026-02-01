<?php
    $categoria = $_GET['c'];
?>

<!DOCTYPE html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Unicab | Colegio Virtual.</title>

    <meta name="description"
        content="Unicab Corporación Educativa, es una institución de educación que desde hace 18 años busca consolidar un modelo educativo innovador y de pertinencia con la realidad del país. ">
    <meta name="keywords" content="colegio, virtual, unicab, educación, ciclos, grados, profesores, estudiantes">
    <meta name="author" content="Impacto Digital Colombia">

    <!-- twitter card starts from here, if you don't need remove this section -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@unicab">
    <meta name="twitter:creator" content="@unicab">
    <meta name="twitter:url" content="https://unicab.org">
    <meta name="twitter:title" content="Unicab | Colegio Virtual"> <!-- maximum 140 char -->
    <meta name="twitter:description"
        content="Unicab Corporación Educativa, es una institución de educación que desde hace 18 años busca consolidar un modelo educativo innovador y de pertinencia con la realidad del país.">
    <!-- maximum 140 char -->
    <meta name="twitter:image" content="assets/img/twitter.jpg">
    <!-- when you post this page url in twitter , this image will be shown -->
    <!-- twitter card ends here -->

    <!-- facebook open graph starts from here, if you don't need then delete open graph related  -->
    <meta property="og:title" content="Colegio Unicab Virtual">
    <meta property="og:url" content="https://unicab.org">
    <meta property="og:locale" content="es_ES">
    <meta property="og:site_name" content="Unicab Virtual">
    <!--meta property="fb:admins" content="" /-->
    <!-- use this if you have  -->
    <meta property="og:type" content="website"> <!-- 'article' for single page  -->
    <meta property="og:image" content="assets/img/opengraph/fbphoto-476-476.png">
    <!-- when you post this page url in facebook , this image will be shown -->
    <!-- facebook open graph ends here -->


    <!-- icons & favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"> <!-- this icon shows in browser toolbar -->
    <link rel="icon" type="image/x-icon" href="../favicon.ico"> <!-- this icon shows in browser toolbar -->
    <link rel="apple-touch-icon" sizes="57x57" href="../favicon.ico">
    <link rel="apple-touch-icon" sizes="60x60" href="../favicon.ico">

    <link rel="icon" type="image/png" sizes="192x192" href="../favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon.ico">
    <link rel="icon" type="image/png" sizes="96x96" href="../favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon.ico">
    <link rel="manifest" href="assets/img/favicon/manifest.json">

    <link rel="shortcut icon" type="../favicon.ico">
    <link rel="icon" type="image/x-icon" href="../favicon.ico">

    <!-- estilos blob-->


    <link rel="stylesheet" href="assets/css/stilo_bloc.css">
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
    <?php include "../admin-unicab/php/conexion.php" ?>

    <!--SEGUIMIENTO GOOGLE-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158598632-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-158598632-1');
    </script>

    <style>
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
                        <a class="navbar-brand" href="blog_conectados.php">
                            <img src="assets/img/imgblog/logo_conectados.png" class="img-fluid"/>
                        </a>
                        <br>
                        <!--Categorías-->
                        <?php include "nav_blog_moodle.php"; ?>
                        
                    </div>
                </div>
            </div>
            <!--== Section Title End ==-->
        </div>
        <div class="">
            
            <?php
                if ($_GET['c'] == 'giu') { 
            ?>
                <style type="text/css">
                    #b_grupoinvestigacion {
                        background-color: #60EA90;
                        font-weight: bold;
                    }
                </style>

            <?php 
                }
                if ($_GET['c'] == 'tal') { 
            ?>
                    <style type="text/css">
                    #b_talentos {
                        background-color: #60EA90;
                        font-weight: bold;
                    }
                    </style>
            <?php
                }
                if ($_GET['c'] == 'cond') { ?>
                    <style type="text/css">
                    #b_condecoraciones {
                        background-color: #60EA90;
                        font-weight: bold;
                    }
                    </style>
            <?php
                }
                if ($_GET['c'] == 'exp') { ?>
                    <style type="text/css">
                    #b_experiencias {
                        background-color: #60EA90;
                        font-weight: bold;
                    }
                    </style>
            <?php
                }
				if ($_GET['c'] == 'mi') { ?>
                    <style type="text/css">
                    #b_maestros {
                        background-color: #60EA90;
                        font-weight: bold;
                    }
                    </style>
            ?>
			<?php
                }
            ?>

        </div>
        <div class="container">
            <?php
                if ($_GET['c'] == 'giu') {
                    echo "<div class='container mt-4 b_title'>Grupo de investigacion GIU</div>";
                }
                else if ($_GET['c'] == 'tal') {
                    echo "<div class='mt-4 b_title'>Resultados Estudiantes</div>";
                }
                else if ($_GET['c'] == 'cond') {
                    echo "<div class='mt-4 b_title'>Condecoraciones</div>";
                }
                else if ($_GET['c'] == 'exp') {
                    echo "<div class='mt-4 b_title'>Experiencias Exitosas</div>";
                }
				else if ($_GET['c'] == 'mi') {
                    echo "<div class='mt-4 b_title'>Maestro Investigador</div>";
                }
            ?>
            <div class="container">
            <hr style=" border-color: #B4B4B4; margin-left:-10px;">
            </div>
        
        </div>
        <br>

        <!--== Blog Content Wrapper ==-->
            <div class="row">
        		<div class="container">
        		    <?php
        		        $registros = 0;
        		        
        		        if ($categoria == "cond") {
        		            $sql_blog = "SELECT IdBlog, TituloB, DATE_FORMAT(FechaPublicacionB, '%d de %M') AS fecha, ImagenB, DescripcionB, Id_categoria FROM blog 
                            WHERE estado_rev_texto != 0 AND estado_rev_mult != 0 AND id_categoria = 1 ORDER BY IdBlog DESC";
        		        }
        		        else if ($categoria == "exp") {
        		            $sql_blog = "SELECT IdBlog, TituloB, DATE_FORMAT(FechaPublicacionB, '%d de %M') AS fecha, ImagenB, DescripcionB, Id_categoria FROM blog 
                            WHERE estado_rev_texto != 0 AND estado_rev_mult != 0 AND id_categoria = 2 ORDER BY IdBlog DESC";
        		        }
        		        else if ($categoria == "giu") {
        		            $sql_blog = "SELECT IdBlog, TituloB, DATE_FORMAT(FechaPublicacionB, '%d de %M') AS fecha, ImagenB, DescripcionB, Id_categoria FROM blog 
                            WHERE estado_rev_texto != 0 AND estado_rev_mult != 0 AND id_categoria = 3 ORDER BY IdBlog DESC";
        		        }
        		        else if ($categoria == "tal") {
        		            /*$sql_blog = "SELECT IdBlog, TituloB, DATE_FORMAT(FechaPublicacionB, '%d de %M') AS fecha, ImagenB, DescripcionB, Id_categoria FROM blog 
                            WHERE estado_rev_texto != 0 AND estado_rev_mult != 0 AND id_categoria = 4 ORDER BY IdBlog DESC";*/
                            echo '<div class="row ">
                                    <div class="col-sm">
                                        <p id="revista_p">
                                            Informe estadístico resultados de los estudiantes del colegio UNICAB virtual en pruebas EVALUAR PARA AVANZAR y pruebas ICFES (2017-2021).
                                        </p>
                                        <div class="mt-5 text-center">
                                            <a href="assets/pdfs/Informe RESULTADOS.pdf" target="_blank" class="btn  btn-warning" id="btn_warning" style="font-size: 1em; background: #60EA90; border: none;">Leer</a>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                       <a href="assets/pdfs/Informe RESULTADOS.pdf" target="_blank" > <img class="single-blog-post" src="assets/img/imgblog/Portada_resultados_1.jpg" width="50%" class="img-fluid" alt=""></a>
                                    </div>
                                </div><br>
                                <!--<div class="row ">
                                    <div class="col-sm">
                                        <p id="revista_p">
                                            Informe por el MEN de pruebas SABER 3°, 5°, 9° y 11º comparados con la Entidad Territorial y total
                                            nacional o Colombia. (2017 – 2020).
                                        </p>
                                        <div class="mt-5 text-center">
                                            <a href="assets/pdfs/Resultados historicos Unicab saber 11º.pdf" target="_blank" class="btn  btn-warning" id="btn_warning" style="font-size: 1em; background: #60EA90; border: none;">Leer</a>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                       <a href="assets/pdfs/Resultados historicos Unicab saber 11º.pdf" target="_blank" > <img class="single-blog-post" src="assets/img/imgblog/Portada_dos_1.jpg" width="50%" class="img-fluid" alt=""></a>
                                    </div>
                                </div>-->';
        		        }
						else if ($categoria == "mi") {
        		            $sql_blog = "SELECT IdBlog, TituloB, DATE_FORMAT(FechaPublicacionB, '%d de %M') AS fecha, ImagenB, DescripcionB, Id_categoria FROM blog 
                            WHERE estado_rev_texto != 0 AND estado_rev_mult != 0 AND id_categoria = 5 ORDER BY IdBlog DESC";
        		        }
        		        
                    			  
                        $res_blog = mysqli_query($conexion, $sql_blog);
                        while ($filab = mysqli_fetch_array($res_blog)) {
                            if ($registros == 3) {
                                echo '<div class="clearfix"> </div>
                                    <div class="col-md-12" style="height: 30px;">
                    				    <label style="color: transparent;">...</label>
                    				</div>
                                    <div class="col-md-4 gallery-grid">
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
                				$registros = 0;
                            }
                            else {
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
                            
                			$registros++;
                        }
        		    ?>
        			
    				
        		</div>
        	</div>
        <!--== Blog Content Wrapper  ***********************************************************  ==-->
        
    </section>


    <style>
    .b_title {
        font-size: 22px;
        font-weight: bold;
       
    }
    </style>

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


</body>

</html>