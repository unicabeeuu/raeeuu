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
	
	<meta name="facebook-domain-verification" content="dbtztn3hr9xirgwzmzzoft2arqqq0t" />
    
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
    <link rel="shortcut icon" type="image/x-icon" href="favicon2025.ico">  <!-- this icon shows in browser toolbar -->
    <link rel="icon" type="image/x-icon" href="favicon2025.ico"> <!-- this icon shows in browser toolbar -->
    <link rel="apple-touch-icon" sizes="57x57" href="favicon2025.ico">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon2025.ico">
    
    <link rel="icon" type="image/png" sizes="192x192" href="favicon2025.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon2025.ico">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon2025.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon2025.ico">
    <link rel="manifest" href="assets/img/favicon/manifest.json">
    
    <link rel="shortcut icon" type="favicon2025.ico">
    <link rel="icon" type="image/x-icon" href="favicon2025.ico">
    
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
    
    <!-- BANNER XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
    
    <?php    
        //$sql_banner="SELECT * FROM `banner`";
        $sql_banner="SELECT * FROM `banner` WHERE estado = '1' ORDER BY id DESC";
        $exe_banner=mysqli_query($conexion,$sql_banner);
        $cont=1;
    
        while ($rowImagen = mysqli_fetch_array($exe_banner)) {
            //background-size: 100% 100%;
			//#fcf8f9 gris claro
			//#4d458f
			if($rowImagen['id'] == 47) {
				echo '<style type="text/css">
                    #slider-area .slide-bg-'.$cont.' {
                      background-image: url('.substr($rowImagen['imagen'], 9).');
                      background-size: cover;
                    }
                </style>';
			}
			else if($rowImagen['id'] == 57) {
				echo '<style type="text/css">
                    #slider-area .slide-bg-'.$cont.' {
                      background-image: url('.substr($rowImagen['imagen'], 9).');
                      background-size: 100% 100%;
					  background-color: #372F7B;
                    }
                </style>';
			}
			else if($rowImagen['id'] == 58) {
				echo '<style type="text/css">
                    #slider-area .slide-bg-'.$cont.' {
                      background-image: url('.substr($rowImagen['imagen'], 9).');
                      background-size: 100% 100%;
                    }
                </style>';
			}
			else {
				echo '<style type="text/css">
                    #slider-area .slide-bg-'.$cont.' {
                      background-image: url('.substr($rowImagen['imagen'], 9).');
                      background-size: cover;
                    }
                </style>';
			}
            
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

    <!--== Header Area Start ***********************************************************  ==-->
    <header id="header-area">
        <?php include "header.php"; ?>
        <script>
        var elemento = document.getElementById("itemInicio");
        elemento.className += "active";
    	</script>
    </header>
    <!--== Header Area End ==-->

    <!--== Slider Area Start  *********************************************************** ==-->
    <section id="slider-area">
    
        <div class="slider-active-wrap owl-carousel text-center text-md-left">
            <!-- Single Slide Item Start -->
            <?php 
                //$sql_banner1="SELECT * FROM `banner` ";
                $sql_banner1="SELECT * FROM `banner` WHERE estado = '1' ORDER BY id DESC";
                $exe_banner1=mysqli_query($conexion,$sql_banner1);
                $cont1=1;
                while ($rowBanner = mysqli_fetch_array($exe_banner1)) {
					//if($rowBanner['id'] == 37 || $rowBanner['id'] == 27 || $rowBanner['id'] == 30  || $rowBanner['id'] == 34 || $rowBanner['id'] == 35 || $rowBanner['id'] == 36) {
                    if($rowBanner['sin_texto'] == 1) {
                        echo ' <div class="single-slide-wrap slide-bg-'.$cont1.'">
								<div class="container">
									<div class="row">
										<div class="col-lg-9">
											<div class="slider-content">
												<h2><span class="titulo" style="color: transparent !Important;">'.$rowBanner['titulo'].'</span></h2> 
												<h2><span class="titulo1" style="color: transparent !Important;">'.$rowBanner['subtitulo'].'</span></h2>
												<h3 style="color: transparent !Important;">'.$rowBanner['titulo2'].'<span> '.$rowBanner['subtitulo2'].'</span></h3>
												<p style="color: transparent !Important;">'.$rowBanner['descripcion'].'</p>
											<div class="slider-btn">';
                    }
                    else if($rowBanner['id'] == 2) {
                        echo ' <div class="single-slide-wrap slide-bg-'.$cont1.'">
								<div class="container">
									<div class="row">
										<div class="col-lg-9">
											<div class="slider-content">
												<h2><span class="titulo" style="color: transparent !Important;">'.$rowBanner['titulo'].'</span></h2> 
												<h2><span class="titulo1" style="color: transparent !Important;">'.$rowBanner['subtitulo'].'</span></h2>
												<h3 style="color: transparent !Important;">'.$rowBanner['titulo2'].'<span> '.$rowBanner['subtitulo2'].'</span></h3>
												<p>'.$rowBanner['descripcion'].'</p>
											<div class="slider-btn">';
                    }
					else {
                        echo ' <div class="single-slide-wrap slide-bg-'.$cont1.'">
								<div class="container">
									<div class="row">
										<div class="col-lg-9">
											<div class="slider-content">
												<h2><span class="titulo">'.$rowBanner['titulo'].'</span></h2> <h2><span class="titulo1">'.$rowBanner['subtitulo'].'</span></h2>
												<h3>'.$rowBanner['titulo2'].'<span> '.$rowBanner['subtitulo2'].'</span></h3>
												<p>'.$rowBanner['descripcion'].'</p>
											<div class="slider-btn">';
                        }
                
                    if ($rowBanner['boton1']=="" || $rowBanner['texto1']=="") {
                        
                    }else{
						if($rowBanner['id'] == 45) {
							echo '<a href="'.$rowBanner['boton1'].'" class="btn btn-brand smooth-scroll" target="_blank" style="margin-top: 100px;">'.$rowBanner['texto1'].'</a>';
						}
						else if($rowBanner['id'] == 47 || $rowBanner['id'] == 49 || $rowBanner['id'] == 50) {
							echo '<a href="'.$rowBanner['boton1'].'" class="btn btn-brand smooth-scroll" target="_blank" style="margin-top: 600px; margin-left: 400px;">'.$rowBanner['texto1'].'</a>';
						}
						else if($rowBanner['id'] == 52) {
							echo '<a href="'.$rowBanner['boton1'].'" class="btn btn-brand smooth-scroll" target="_blank" style="margin-left: 500px; margin-top: 50px;">'.$rowBanner['texto1'].'</a>';
						}
						else if($rowBanner['id'] == 54) {
							echo '<a href="'.$rowBanner['boton1'].'" class="btn btn-brand smooth-scroll" target="_blank" style="margin-top: 450px;">'.$rowBanner['texto1'].'</a>';
						}
						else if($rowBanner['id'] == 56) {
							echo '<a href="'.$rowBanner['boton1'].'" class="btn btn-brand smooth-scroll" target="_blank" style="background-color: #FE9100">'.$rowBanner['texto1'].'</a>';
						}
						else if($rowBanner['id'] == 57) {
							echo '<a href="'.$rowBanner['boton1'].'" class="btn btn-brand smooth-scroll" target="_blank" style="background-color: #E84C7B;  margin-left: 90%; margin-top: 60%; color: white; font-size: 4rem; border-radius: 25px;"><i class="fa fa-whatsapp" aria-hidden="true"></i> '.$rowBanner['texto1'].'</a>';
						}
						else if($rowBanner['id'] == 58) {
							echo '<a href="'.$rowBanner['boton1'].'" class="btn btn-brand smooth-scroll" target="_blank" style="background-color: transparent;  margin-left: 90%; margin-top: 60%; color: transparent; font-size: 4rem; border-radius: 25px;">'.$rowBanner['texto1'].'</a>';
						}
						else {
							echo '<a href="'.$rowBanner['boton1'].'" class="btn btn-brand smooth-scroll" target="_blank">'.$rowBanner['texto1'].'</a>';
						}
                    }                   

                    if ($rowBanner['boton2']=="" || $rowBanner['texto2']=="") {
                        
                    }
					else{
                        echo '<a href="'.$rowBanner['boton2'].'" class="btn btn-brand smooth-scroll" target="_blank">'.$rowBanner['texto2'].'</a>';
                    }   
                                
                            echo '</div>
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
        <div class="social-networks-icon">
            <ul>
                <li><a href="https://es-la.facebook.com/unicabvir/"><i class="fa fa-facebook"></i> <!--<span>2.8k Seguidores</span>--></a></li>
               <!-- <li><a href="#"><i class="fa fa-twitter"></i> <span>3.2m Followers</span></a></li>-->
                <li><a href="https://www.instagram.com/unicabvirtual/"><i class="fa fa-instagram"></i> <!--<span>591 Seguidores</span>--></a></li>
                <li><a href="https://www.youtube.com/channel/UCFK81Ynii3fL3iyvYhzeQ_Q"><i class="fa fa-youtube"></i> <!--<span>307  Suscriptores</span>--></a></li>
            </ul>
        </div>
        <!-- Social Icons Area End -->
    </section>
    <!--== Slider Area End ==-->

    <!--== Blog Area Start  *********************************************************** ==-->
    <section id="blog-area" class="section-padding" style="display: nonezzz;">
        <div class="container">
            <!--== Section Title Start ==-->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <img src="assets/img/imgblog/logo_conectados.png" class="img-fluid"/>
                        <br><br>
                        <!--Categorías-->
                        <?php include "nav_blog.php"; ?>
                        
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
                									    <a href="articulo.php?id='.$filab['IdBlog'].'&idcat='.$filab['Id_categoria'].'#page-content-wrap" class="btn btn-brand">Leer</a>
                								    </center>
                								</figcaption>
                						</figure>
                					</div>
                				</div>';
                        }
        		    ?>
        			<!--<div class="col-md-4 gallery-grid">
    					<div class="grid single-blog-post">
    						<figure class="effect-apollo blog-thumb">
    							<img src="assets/img/imgblog/dia_del_idioma_1.jpeg" width="100%" alt="" />
    								<figcaption>
    								    <center>
    								        <h3 id="title-blog">Location</h3>
    								        <hr id="line-blog">
    									    <p>Lively Ride</p>
    									    <a href='articulo.php?id=".$fila['IdBlog']."&idcat=".$fila['Id_categoria']."#page-content-wrap' class='btn btn-brand'>Leer</a>
    								    </center>
    								</figcaption>
    						</figure>
    					</div>
    				</div>
    				<div class="col-md-4 gallery-grid">
    					<div class="grid single-blog-post">
    						<figure class="effect-apollo blog-thumb">
    							<a href="">
    								<img src="assets/img/imgblog/elearning_1.png" width="100%" alt="" />
    								<figcaption>
    								    <center>
    								        <h3 id="title-blog">Location</h3>
    								        <hr id="line-blog">
    									    <p>Lively Ride</p>
    								    </center>
    								</figcaption>
    							</a>
    						</figure>
    					</div>
    				</div>
    				<div class="col-md-4 gallery-grid">
    					<div class="grid single-blog-post">
    						<figure class="effect-apollo blog-thumb">
    							<a href="">
    								<img src="assets/img/imgblog/EstamosEncabezado_1.png" width="100%" alt="" />
    								<figcaption>
    								    <center>
    								        <h3 id="title-blog">Location</h3>
    								        <hr id="line-blog">
    									    <p>Lively Ride</p>
    								    </center>
    								</figcaption>
    							</a>
    						</figure>
    					</div>
    				</div>-->
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

    <!--== Upcoming Event Area Start  *********************************************************** ==-->
    <section id="upcoming-area-f">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="upcoming-event-wrap">
                        <div class="up-event-titile">
                            <h3>Próximo evento</h3>
                        </div>
                        <div class="upcoming-event-content owl-carousel">
                            <!-- No 1 Event -->
                             <?php
                             
                                //$peticion45 = "SELECT IdEvento,NombreE,DescripcionE,LinkE,FechaE,DATE_FORMAT(FechaE, '%d de %M del %Y' ) AS fecha,ImagenE
                                //$peticion45 = "SELECT IdEvento,NombreE,DescripcionE,LinkE,FechaE,DATE_FORMAT(FechaE, '19 de %M del %Y' ) AS fecha,ImagenE
                                 
                                $peticion45 = "SELECT IdEvento,NombreE,DescripcionE,LinkE,FechaE,DATE_FORMAT(FechaE, '%d de %M del %Y' ) AS fecha,ImagenE
                                FROM evento WHERE estado = 1 ORDER BY FechaE ASC LIMIT 3";
                                			   
                                $resultado45 = mysqli_query($conexion, $peticion45);
                                while ($fila = mysqli_fetch_array($resultado45)){
                                	
                                	echo " <div class='single-upcoming-event'>
                                            <div class='row'>
                                                <div class='col-lg-5'>
                                                    <div class='up-event-thumb'>
                                                        <img src='".substr($fila['ImagenE'], 9)."' class='img-fluid' alt='Upcoming Event'>
                                                        <h4 class='up-event-date'> ".$fila['fecha']."</h4>
                                                    </div>
                                                </div>
                                    
                                                <div class='col-lg-7'>
                                                    <div class='display-table'>
                                                        <div class='display-table-cell'>
                                                            <div class='up-event-text'>
                                    						<p>Tiempo restante:</p>
                                                                <div class='event-countdown'>
                                    							
                                                                    <div class='event-countdown-counter' data-date='".$fila['FechaE']."'></div>
                                                                    
                                                                </div>
                                                                <h3><b><a class='tituloEvento' href='".$fila['LinkE']."' style='color: gray;'>".$fila['NombreE']."</a></b></h3>
                                                                <p>".$fila['DescripcionE']."</p>
                                                                <a href='".$fila['LinkE']."' class='btn btn-brand'>Más Información</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                                }
                            
                            ?>
                            <!-- Evento -->
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Upcoming Event Area End ==-->

    <!--DANZA, SALUD Y FUERZA *********************************************************** -->
    <section id="danza-area" class="section-padding">
        <div class="container">
            <!--== Section Title Start ==-->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Danza, Salud y Fuerza</h2>
                    </div>
                </div>
            </div>
            <!--== Section Title End ==-->
            
            <!--== Section Title Start ==-->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="contenedor-video">
                        <iframe id="iv" class="responsive-iframe" src="https://www.youtube.com/embed/BvrvAc3SiO8" 
                                title="YouTube video player" frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>

                    </div>
                </div>
            </div>
            <!--== Section Title End ==-->
        </div>
        
    </section>
    <!--DANZA, SALUD Y FUERZA-->

    <!--SERVICIOS   *********************************************************** -->
    <section id="responsibility-area" class="section-padding">
        <div class="container">
            <!--== Section Title Start ==-->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Servicios</h2>
                    </div>
                </div>
            </div>
            <!--== Section Title End ==-->
            
            <!--== Responsibility Content Wrapper ==-->
            <div class="row text-center text-sm-left">
                <!--== Single Responsibility Start ==-->
                <div class="col-lg-6 col-sm-12">
                    <a href="quienes-somos.php">
                        <div class="single-responsibility" align="center">
                            <img src="assets/img/responsibility/03.png" alt="Responsibility">
                            <h4>Colegio virtual</h4>
                            <p>Primaria y bachillerato para niños, niñas y jóvenes que buscan desarrollar sus habilidades en el deporte, la música, el teatro, las artes, la cultura, la investigación y las ciencias.</p>
                        </div>
                     </a>
                </div>
                <!--== Single Responsibility End ==-->
    
                <!--== Single Responsibility Start ==-->
                <div class="col-lg-6 col-sm-12">
                    <a href="quienes-somos.php">
                        <div class="single-responsibility" align="center">
                            <img src="assets/img/responsibility/02.png" alt="Responsibility">
                            <h4>Educación por ciclos</h4>
                            <p>Primaria y bachillerato virtual por ciclos para jóvenes y adultos, que por algún motivo no lo han terminado, y que buscan mejores oportunidades en la vida personal, profesional y laboral.</p>
                        </div>
                     </a>
                </div>
                <!--== Single Responsibility End ==-->
    
            </div>
            <!--== Responsibility Content Wrapper ==-->
        </div>
    </section>
    <!--SERVICIOS-->
    
    <!--== Scholership Promo Area Start  ***********************************************************  ==-->
    <section id="scholership-promo">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="scholership-promo-text">
                        <h2>Calendario <span>UNICAB</span> Virtual</h2>
                        <p>Conoce nuestro calendario académico para el año 2025</p>
                        <a href="calendario/calendario_2025.pdf" target="_blank" class="btn btn-brand">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Scholership Promo Area End ==-->

    <!--GALERÍA-->
    <section id="gallery-area" class="section-padding">
        <div class="container">
            <!--== Section Title Start ==-->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Galería</h2>
                    </div>
                </div>
            </div>
            <!--== Section Title End ==-->
    
            <!--== Gallery Container Warpper ==-->
            <div class="gallery-content-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Gallery Menu Start -->
                        <div class="gallery-menu text-center">
                            <span class="active" data-filter="*">Todo</span>
                            <span data-filter=".old">Momentos UNICAB</span>
                            <span data-filter=".event">Equipo Unicab</span>
                            <span data-filter=".pic">Nuestros estudiantes</span>
                            <span class="d-none d-sm-inline-block" data-filter=".recent">Recientes</span>
                        </div>
                        <!-- Gallery Menu End -->
    
                        <!-- Gallery Item content Start -->
                            <div class="row gallery-gird">
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 recent">
            <div class="single-gallery-item gallery-bg-1">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria1.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
    
        <!-- Single Gallery Start -->
       <!-- <div class="col-lg-3  col-sm-6 old event pic">
            <div class="single-gallery-item video gallery-bg-2">
                <a href="https://player.vimeo.com/video/140182080?title=0&amp;portrait=0&amp;byline=0&amp;autoplay=1&amp;loop=1" class="btn btn-video-play video-popup"><i class="fa fa-play"></i></a>
            </div>
        </div>-->
        <!-- Single Gallery End -->
    
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 recent pic">
            <div class="single-gallery-item gallery-bg-3">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria3.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
    
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 old">
            <div class="single-gallery-item gallery-bg-4">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria4.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
    
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic">
            <div class="single-gallery-item gallery-bg-5">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria5.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
    
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 old recent">
            <div class="single-gallery-item gallery-bg-6">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria6.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
    
        <!-- Single Gallery Start -->
        <!--<div class="col-lg-3  col-sm-6 pic">
            <div class="single-gallery-item video gallery-bg-7">
                <a href="https://www.youtube.com/watch?v=d_Q0sGkXGTA" class="btn btn-video-play video-popup"><i class="fa fa-play"></i></a>
            </div>
        </div>-->
        <!-- Single Gallery End -->
    
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic recent old">
            <div class="single-gallery-item gallery-bg-8">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria8.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
         <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic recent old">
            <div class="single-gallery-item gallery-bg-9">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria9.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
         <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic recent old">
            <div class="single-gallery-item gallery-bg-10">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria10.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
         <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic recent old">
            <div class="single-gallery-item gallery-bg-11">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria11.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
         <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic recent old">
            <div class="single-gallery-item gallery-bg-12">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria12.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
         <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic recent old">
            <div class="single-gallery-item gallery-bg-13">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria13.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
         <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic recent old">
            <div class="single-gallery-item gallery-bg-14">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria14.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
         <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic recent old">
            <div class="single-gallery-item gallery-bg-15">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria15.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
         <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic recent old">
            <div class="single-gallery-item gallery-bg-16">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria16.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
         <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic recent old">
            <div class="single-gallery-item gallery-bg-17">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria17.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic recent old">
            <div class="single-gallery-item gallery-bg-18">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria18.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic recent old">
            <div class="single-gallery-item gallery-bg-19">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria19.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic recent old">
            <div class="single-gallery-item gallery-bg-20">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria20.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic recent old">
            <div class="single-gallery-item gallery-bg-21">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria21.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic recent old">
            <div class="single-gallery-item gallery-bg-22">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria22.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic recent old">
            <div class="single-gallery-item gallery-bg-23">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria23.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic recent old">
            <div class="single-gallery-item gallery-bg-24">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria24.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic recent old">
            <div class="single-gallery-item gallery-bg-25">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria25.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 pic recent old">
            <div class="single-gallery-item gallery-bg-26">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Momentos UNICAB</h4>
                        <p class="gallery-event-date">28 Oct, 2018</p>
                    </div>
                    <a href="assets/img/galeria/galeria26.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 event">
            <div class="single-gallery-item gallery-bg-28">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Equipo Administrativo</h4>
                        <p class="gallery-event-date">07 Dic, 2019</p>
                    </div>
                    <a href="assets/img/galeria/galeria28.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 event">
            <div class="single-gallery-item gallery-bg-29">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Tutores Bachillerato</h4>
                        <p class="gallery-event-date">07 Dic, 2019</p>
                    </div>
                    <a href="assets/img/galeria/galeria29.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 event">
            <div class="single-gallery-item gallery-bg-30">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Tutores Primaria</h4>
                        <p class="gallery-event-date">07 Dic, 2019</p>
                    </div>
                    <a href="assets/img/galeria/galeria30.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 event">
            <div class="single-gallery-item gallery-bg-31">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Pensamiento Humanístico Inglés</h4>
                        <p class="gallery-event-date">07 Dic, 2019</p>
                    </div>
                    <a href="assets/img/galeria/galeria31.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 event">
            <div class="single-gallery-item gallery-bg-32">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Equipo Ciclos</h4>
                        <p class="gallery-event-date">07 Dic, 2019</p>
                    </div>
                    <a href="assets/img/galeria/galeria32.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 event">
            <div class="single-gallery-item gallery-bg-33">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Pensamiento Bioético</h4>
                        <p class="gallery-event-date">07 Dic, 2019</p>
                    </div>
                    <a href="assets/img/galeria/galeria33.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 event">
            <div class="single-gallery-item gallery-bg-34">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Pensamiento Social</h4>
                        <p class="gallery-event-date">07 Dic, 2019</p>
                    </div>
                    <a href="assets/img/galeria/galeria34.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 event">
            <div class="single-gallery-item gallery-bg-35">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Pensamiento Numérico</h4>
                        <p class="gallery-event-date">07 Dic, 2019</p>
                    </div>
                    <a href="assets/img/galeria/galeria35.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 event">
            <div class="single-gallery-item gallery-bg-36">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Equipo Creativo</h4>
                        <p class="gallery-event-date">07 Dic, 2019</p>
                    </div>
                    <a href="assets/img/galeria/galeria36.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 event">
            <div class="single-gallery-item gallery-bg-37">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Equipo de Investigación GIU</h4>
                        <p class="gallery-event-date">07 Dic, 2019</p>
                    </div>
                    <a href="assets/img/galeria/galeria37.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 event">
            <div class="single-gallery-item gallery-bg-38">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Pensamiento Tecnológico</h4>
                        <p class="gallery-event-date">07 Dic, 2019</p>
                    </div>
                    <a href="assets/img/galeria/galeria38.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 event">
            <div class="single-gallery-item gallery-bg-39">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Equipo de Psicología</h4>
                        <p class="gallery-event-date">07 Dic, 2019</p>
                    </div>
                    <a href="assets/img/galeria/galeria39.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        <!-- Single Gallery Start -->
        <div class="col-lg-3  col-sm-6 event">
            <div class="single-gallery-item gallery-bg-40">
                <div class="gallery-hvr-wrap">
                    <div class="gallery-hvr-text">
                        <h4>Pensamiento Humanístico Español</h4>
                        <p class="gallery-event-date">07 Dic, 2019</p>
                    </div>
                    <a href="assets/img/galeria/galeria40.jpg" class="btn-zoom image-popup">
                        <img src="assets/img/zoom-icon.png" alt="a">
                    </a>
                </div>
            </div>
        </div>
        <!-- Single Gallery End -->
        
    </div>
                        <!-- Gallery Item content End -->
                    </div>
                </div>
            </div>
            <!--== Gallery Container Warpper==-->
        </div>
    </section>
    <!--GALERÍA-->

    <!--INICIO SECCIÓN DE NOTICIAS-->
    <section id="about-area" class="section-padding">
        <div class="container">
            <!--== Section Title Start ==-->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Actualidad educativa</h2>
                    </div>
                </div>
            </div>
            <!--== Section Title End ==-->
    
            <!--== Blog Content Wrapper ==-->
            <div class="row">
                <!--== Single Blog Post start ==-->
                <?php
                    $peticion58 = "SELECT IdNoticia,TituloN,DATE_FORMAT(FechaPublicacionN, '%d de %M') AS fecha,ImagenN, DescripcionN FROM noticia ORDER BY IdNoticia DESC LIMIT 6";
                    			   
                    $resultado58 = mysqli_query($conexion, $peticion58);
                    while ($fila = mysqli_fetch_array($resultado58)){
                    	
                    	echo "
                    	<div class='col-lg-4 col-md-6'>
                                    <article class='single-blog-post'>
                                        <figure class='blog-thumb'>
                                            <div class='blog-thumbnail'>
                                                <img src='".substr($fila['ImagenN'], 9)."' alt='Blog' class='img-fluid'>
                                            </div>
                                            <figcaption class='blog-meta clearfix'>
                                                <a href='noticia.php?id=".$fila['IdNoticia']."#page-content-wrap' class='author'>
                                                    <div class='author-info'>
                                                        <p>".$fila['fecha']."</p>
                                                    </div>
                                                </a>
                                                <div class='like-comm pull-right'>
                                                    <a href='#'><i class='fa fa-comment-o'></i>77</a>
                                                    <a href='#'><i class='fa fa-heart-o'></i>12</a>
                                                </div>
                                            </figcaption>
                                        </figure>
                    
                                        <div class='blog-content'>
                                            <h3><a href='noticia.php?id=".$fila['IdNoticia']."#page-content-wrap'>".$fila['TituloN']."</a></h3>
                                            <p id='textoDescripcion'>".$fila['DescripcionN']."</p>
                                            <a href='noticia.php?id=".$fila['IdNoticia']."#page-content-wrap' class='btn btn-brand'>Leer</a>
                                        </div>
                                    </article><br>
                                </div>
                    	";
                    };
                ?>
                <!--== Single Blog Post End ==-->
                
            </div>
            <!--== Blog Content Wrapper ==-->
        </div>
    </section>
    <!--FIN SECCIÓN DE NOTICIAS-->

    <!--Videoteca-->
	<section id="videoteca-area" class="section-padding">
        <div class="container" id="videoteca">
            <!--== Section Title Start ==-->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Videoteca Unicab.</h2><br>
    					<script src="https://apis.google.com/js/platform.js"></script>
    
                    <div class="g-ytsubscribe" data-channelid="UCFK81Ynii3fL3iyvYhzeQ_Q" data-layout="full" data-count="default"></div><br><br>
                       <iframe width="80%" height="450" src="https://www.youtube.com/embed/videoseries?list=UUFK81Ynii3fL3iyvYhzeQ_Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                       </iframe>
                    </div>
    				
                </div>
            </div>
            <!--== Section Title End ==-->
            
        </div>
    
    </section>
    <!--Videoteca-->

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

    <!-- CONFIGURACIÓN SLIDER OWL-CAROUSEL  -->
	<script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:0,
            nav:false,
        	autoplay: true,
        	autoplayTimeout:5000,
        	autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                480:{
                    items:1
                },
				600:{
                    items:1
                },
				768:{
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
