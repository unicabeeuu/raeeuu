<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Mediadores | Unicab | Colegio Virtual</title>

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



<!--== Header Area Start ==-->
<header id="header-area">
    <?php include "header.php"; ?>
    <script>
    var elemento = document.getElementById("itemNosotros");
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
                    <h1 class="h2">Equipo de trabajo</h1>
                    <p>Familia Unicab</p>
                    <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Ver más</a>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!--== Page Title Area End ==-->


<!--== Committee Page Content Start ==-->
<section id="page-content-wrap">
    <div class="people-to-say section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="about-page-area-title">
                     <h2>Administrativos</h2>
                    </div>
                    <img src="assets/img/deslizar.gif" width="150px" alt="Desliza" class="img-fluid">
                </div>           
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="people-to-say-wrapper owl-carousel">
                      <?php 
                        //$sql_administrativos="SELECT * FROM `mediadores` WHERE dependencia='Administrativo'";
                        $sql_administrativos="SELECT e.* FROM tbl_empleados e, tbl_grupos_emp ge, tbl_grupos g 
                            WHERE e.id = ge.id_empleado AND ge.id_grupo = g.id AND g.grupo = 'Administrativo' AND e.estado = 'activo'";
                        $exe_administrativos=mysqli_query($conexion,$sql_administrativos);
                        $contAdministrativos=0;
                        while ($rowAdministrativos = mysqli_fetch_array($exe_administrativos)) {
                          $contAdministrativos++;
                          echo "
                           <div class='single-testimonial-wrap'>
                            <div class='people-thumb'>
                                <img src='".substr($rowAdministrativos['foto'], 9)."' alt='Administrativos' class='img-fluid'>
                            </div>
                            <i class='quote-icon'></i>
                            <p>".$rowAdministrativos['profesion']."<br>  
                          <a id='btnSobreMi' style='color:#FFF;' class='btn btn-success btn-lg' data-toggle='modal' data-target='#exampleModal".$contAdministrativos."'>
                          Sobre mí
                          </a>                                               
                         <br>
                        </p>
                            <h4>".$rowAdministrativos['nombre_corto']."<span class='people-deg'>".$rowAdministrativos['cargo']."</span></h4>
                        </div>
                          ";
                        }
                      ?>
                    </div>
                    <?php 
                      $contAdministrativos1=0;
                        //$sql_administrativos1="SELECT * FROM `mediadores` WHERE dependencia='Administrativo'";
                        $sql_administrativos1="SELECT e.* FROM tbl_empleados e, tbl_grupos_emp ge, tbl_grupos g 
                            WHERE e.id = ge.id_empleado AND ge.id_grupo = g.id AND g.grupo = 'Administrativo' AND e.estado = 'activo'";
                        $exe_administrativos1=mysqli_query($conexion,$sql_administrativos1);
                        while ($rowAdministrativos = mysqli_fetch_array($exe_administrativos1)) {
                          $contAdministrativos1++;
                          echo "<div class='modal fade' id='exampleModal".$contAdministrativos1."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLongTitle'>".$rowAdministrativos['nombre_corto']." <a class='badge badge-primary' style='color:#FFF;' id='cargo'>".$rowAdministrativos['cargo']."</a></h5>

                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>
                          <div class='modal-body'>
                            ".$rowAdministrativos['descripcion']."
                          </div>
                          <div class='modal-footer'>
                          <a href='directorio.php' type='button' class='btn btn-success btn-lg'>Contactar</a>
                          <button type='button' class='btn btn-info btn-lg' data-dismiss='modal'>Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>";
                        }
                      ?>
                </div>
            </div><br><br>
            
            <hr><br>
           
             <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="about-page-area-title">
                     <h2>Mediadores</h2>
                    </div>
                    <img src="assets/img/deslizar.gif" width="150px" alt="Desliza" class="img-fluid">
                </div>
            </div>
            
             <div class="row">
                <div class="col-lg-12">
                    <div class="people-to-say-wrapper owl-carousel">
                      <?php 
                        //$sql_mediadores="SELECT * FROM `mediadores` WHERE dependencia='Mediadores'";
                        $sql_mediadores="SELECT e.* FROM tbl_empleados e, tbl_grupos_emp ge, tbl_grupos g 
                            WHERE e.id = ge.id_empleado AND ge.id_grupo = g.id AND g.grupo = 'Mediadores' AND e.estado = 'activo'";
                        $exe_mediadores=mysqli_query($conexion,$sql_mediadores);
                        $contMediadores=0;
                        while ($rowMediadores = mysqli_fetch_array($exe_mediadores)) {
                          $contMediadores++;
                          echo "<div class='single-testimonial-wrap'>
                            <div class='people-thumb'>
                                <img src='".substr($rowMediadores['foto'], 9)."' alt='Mediadores' class='img-fluid'>
                            </div>
                            <i class='quote-icon'></i>
                            <p>";
                            if (strlen($rowMediadores['profesion'])>43) {
                              echo "".$rowMediadores['profesion']."<br>";
                            }else{
                              echo "".$rowMediadores['profesion']."<br><br>";
                            }
                            echo "
                            <a id='btnSobreMi' style='color:#FFF;' class='btn btn-success btn-lg' data-toggle='modal' data-target='#exampleModal1".$contMediadores."'>
                            Sobre mí
                            </a>
                                                    
                         <br>
                        </p>
                            <h4>".$rowMediadores['nombre_corto']."<span class='people-deg'>".$rowMediadores['cargo']."</span></h4>
                        </div>";
                        }
                      ?>
                    </div>
                    <?php 
                        //$sql_mediadores1="SELECT * FROM `mediadores` WHERE dependencia='Mediadores'";
                        $sql_mediadores1="SELECT e.* FROM tbl_empleados e, tbl_grupos_emp ge, tbl_grupos g 
                            WHERE e.id = ge.id_empleado AND ge.id_grupo = g.id AND g.grupo = 'Mediadores'  AND e.estado = 'activo'";
                        $exe_mediadores1=mysqli_query($conexion,$sql_mediadores1);
                        $contMediadores1=0;
                        while ($rowMediadores1 = mysqli_fetch_array($exe_mediadores1)) {
                          $contMediadores1++;
                          echo "<div class='modal fade' id='exampleModal1".$contMediadores1."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLongTitle'>".$rowMediadores1['nombre_corto']." <a class='badge badge-primary' style='color:#FFF;' id='cargo'>".$rowMediadores1['cargo']."</a></h5>

                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>
                          <div class='modal-body'>
                            ".$rowMediadores1['descripcion']."
                          </div>
                          <div class='modal-footer'>
                          <a href='directorio.php' type='button' class='btn btn-success btn-lg'>Contactar</a>
                          <button type='button' class='btn btn-info btn-lg' data-dismiss='modal'>Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>";
                        }
                      ?>
                </div>
            </div><br><br>
             <hr><br>
            
             <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="about-page-area-title">
                     <h2>Equipo Creativo</h2>
                    </div>
                    <img src="assets/img/deslizar.gif" width="150px" alt="Desliza" class="img-fluid">
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="people-to-say-wrapper owl-carousel">
                        <?php 
                          //$sql_creativo="SELECT * FROM `mediadores` WHERE dependencia='Creativo'";
                          $sql_creativo="SELECT e.* FROM tbl_empleados e, tbl_grupos_emp ge, tbl_grupos g 
                            WHERE e.id = ge.id_empleado AND ge.id_grupo = g.id AND g.grupo = 'Creativo' AND e.estado = 'activo'";
                          $exe_creativo=mysqli_query($conexion,$sql_creativo);
                          $contCreativo=0;
                          while ($rowCreativo = mysqli_fetch_array($exe_creativo)) {
                            $contCreativo++;
                            echo "
                              <div class='single-testimonial-wrap'>
                                <div class='people-thumb'>
                                    <img src='".substr($rowCreativo['foto'], 9)."' alt='Creativo' class='img-fluid'>
                                </div>
                                <i class='quote-icon'></i>
                                <p>";
                                if (strlen($rowCreativo['profesion'])>43) {
                                  echo "".$rowCreativo['profesion']."<br>";
                                }else{
                                  echo "".$rowCreativo['profesion']."<br><br>";
                                }
                               echo "<a id='btnSobreMi' style='color:#FFF;' class='btn btn-success btn-lg' data-toggle='modal' data-target='#exampleModalc".$contCreativo."'>
                              Sobre mí
                              </a>                                               
                             <br>
                            </p>
                                <h4>".$rowCreativo['nombre_corto']."<span class='people-deg'>".$rowCreativo['dependencia']."</span></h4>
                            </div>
                            ";
                          }
                        ?>  
                    </div>
                     <?php 
                          //$sql_creativo1="SELECT * FROM `mediadores` WHERE dependencia='Creativo'";
                          $sql_creativo1="SELECT e.* FROM tbl_empleados e, tbl_grupos_emp ge, tbl_grupos g 
                            WHERE e.id = ge.id_empleado AND ge.id_grupo = g.id AND g.grupo = 'Creativo' AND e.estado = 'activo'";
                          $exe_creativo1=mysqli_query($conexion,$sql_creativo1);
                          $contCreativo1=0;
                          while ($rowCreativo1 = mysqli_fetch_array($exe_creativo1)) {
                            $contCreativo1++;
                            echo "<div class='modal fade' id='exampleModalc".$contCreativo1."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLongTitle'>".$rowCreativo1['nombre_corto']." <a class='badge badge-primary' style='color:#FFF;' id='cargo'>".$rowCreativo1['dependencia']."</a></h5>

                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>
                          <div class='modal-body'>
                            ".$rowCreativo1['descripcion']."
                          </div>
                          <div class='modal-footer'>
                          <a href='directorio.php' type='button' class='btn btn-success btn-lg'>Contactar</a>
                          <button type='button' class='btn btn-info btn-lg' data-dismiss='modal'>Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>";
                          }
                    ?>
                </div>
            </div><br><br>
             <hr><br>
            
             <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="about-page-area-title">
                     <h2>Grupo de Investigación</h2>
                    </div>
                    <img src="assets/img/deslizar.gif" width="150px" alt="Desliza" class="img-fluid">
                </div>
            </div>
             
             <div class="row">
                <div class="col-lg-12">
                    <div class="people-to-say-wrapper owl-carousel">
                       <!-- Single People Testimonial -->
                       <?php 
                        //$sql_investigacion="SELECT * FROM `mediadores` WHERE dependencia='Investigación'";
                        $sql_investigacion="SELECT e.* FROM tbl_empleados e, tbl_grupos_emp ge, tbl_grupos g 
                            WHERE e.id = ge.id_empleado AND ge.id_grupo = g.id AND g.grupo = 'Investigación' AND e.estado = 'activo'";
                        $exe_investigacion=mysqli_query($conexion,$sql_investigacion);
                        $contInvestigacion=0;
                        while ($rowInvestigacion = mysqli_fetch_array($exe_investigacion)) {
                          $contInvestigacion++;
                          echo "<div class='single-testimonial-wrap'>
                            <div class='people-thumb'>
                                <img src='".substr($rowInvestigacion['foto'], 9)."' alt='Investigación' class='img-fluid'>
                            </div>
                            <i class='quote-icon'></i>
                            <p>";
                            if (strlen($rowInvestigacion['profesion'])>43) {
                              echo "".$rowInvestigacion['profesion']."<br>";
                            }else{
                              echo "".$rowInvestigacion['profesion']."<br><br>";
                            }
                           echo "<a id='btnSobreMi' style='color:#FFF;' class='btn btn-success btn-lg' data-toggle='modal' data-target='#exampleModali".$contInvestigacion."'>
                          Sobre mí
                          </a>
                                                    
                         <br>
                        </p>
                            <h4>".$rowInvestigacion['nombre_corto']."<span class='people-deg'>INVESTIGADOR</span></h4>
                        </div>";
                        }
                       ?>
                    </div>
                    <?php 
                        //$sql_investigacion1="SELECT * FROM `mediadores` WHERE dependencia='Investigación'";
                        $sql_investigacion1="SELECT e.* FROM tbl_empleados e, tbl_grupos_emp ge, tbl_grupos g 
                            WHERE e.id = ge.id_empleado AND ge.id_grupo = g.id AND g.grupo = 'Investigación' AND e.estado = 'activo'";
                        $exe_investigacion1=mysqli_query($conexion,$sql_investigacion1);
                        $contInvestigacion1=0;
                        while ($rowInvestigacion1 = mysqli_fetch_array($exe_investigacion1)) {
                          $contInvestigacion1++;
                          echo "<div class='modal fade' id='exampleModali".$contInvestigacion1."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLongTitle'>".$rowInvestigacion1['nombre_corto']." <a class='badge badge-primary' style='color:#FFF;' id='cargo'>".$rowInvestigacion1['cargo']."</a></h5>

                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>
                          <div class='modal-body'>
                            ".$rowInvestigacion1['descripcion']."
                          </div>
                          <div class='modal-footer'>
                          <a href='directorio.php' type='button' class='btn btn-success btn-lg'>Contactar</a>
                          <button type='button' class='btn btn-info btn-lg' data-dismiss='modal'>Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>";
                        }
                    ?>
                </div>
            </div><br><br>
             <hr><br>
            
             <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="about-page-area-title">
                     <h2>Equipo de Psicología</h2>
                    </div>
                    <img src="assets/img/deslizar.gif" width="150px" alt="Desliza" class="img-fluid">
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="people-to-say-wrapper owl-carousel">
                       <!-- Single People Testimonial -->
                       <?php 
                        //$sql_psicologia="SELECT * FROM `mediadores` WHERE dependencia='Psicología'";
                        $sql_psicologia="SELECT e.* FROM tbl_empleados e, tbl_grupos_emp ge, tbl_grupos g 
                            WHERE e.id = ge.id_empleado AND ge.id_grupo = g.id AND g.grupo = 'Psicología' AND e.estado = 'activo'";
                        $exe_psicologia=mysqli_query($conexion,$sql_psicologia);
                        $contPsicologia=0;
                        while ($rowPsicologia = mysqli_fetch_array($exe_psicologia)) {
                          $contPsicologia++;
                          echo "
                          <div class='single-testimonial-wrap'>
                            <div class='people-thumb'>
                                <img src='".substr($rowPsicologia['foto'], 9)."' alt='Psicología' class='img-fluid'>
                            </div>
                            <i class='quote-icon'></i>
                            <p>
                            ".$rowPsicologia['profesion']."<br>  
                            <a id='btnSobreMi' style='color:#FFF;' class='btn btn-success btn-lg' data-toggle='modal' data-target='#exampleModalp".$contPsicologia."'>
                          Sobre mí
                          </a>
                                                    
                          <br>
                          </p>
                            <h4>".$rowPsicologia['nombre_corto']."<span class='people-deg'>".$rowPsicologia['cargo']."</span></h4>
                          </div>";
                        }
                       ?>
                    </div>
                    <?php 
                        //$sql_psicologia1="SELECT * FROM `mediadores` WHERE dependencia='Psicología'";
                        $sql_psicologia1="SELECT e.* FROM tbl_empleados e, tbl_grupos_emp ge, tbl_grupos g 
                            WHERE e.id = ge.id_empleado AND ge.id_grupo = g.id AND g.grupo = 'Psicología' AND e.estado = 'activo'";
                        $exe_psicologia1=mysqli_query($conexion,$sql_psicologia1);
                        $contPsicologia1=0;
                        while ($rowPsicologia1 = mysqli_fetch_array($exe_psicologia1)) {
                          $contPsicologia1++;
                           echo "<div class='modal fade' id='exampleModalp".$contPsicologia1."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                        <div class='modal-dialog modal-dialog-centered' role='document'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title' id='exampleModalLongTitle'>".$rowPsicologia1['nombre_corto']." <a class='badge badge-primary' style='color:#FFF;' id='cargo'>".$rowPsicologia1['cargo']."</a></h5>

                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>
                            <div class='modal-body'>
                              ".$rowPsicologia1['descripcion']."
                            </div>
                            <div class='modal-footer'>
                            <a href='directorio.php' type='button' class='btn btn-success btn-lg'>Contactar</a>
                            <button type='button' class='btn btn-info btn-lg' data-dismiss='modal'>Cerrar</button>
                            </div>
                          </div>
                        </div>
                      </div>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Committee Page Content End ==-->

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



<!-- custom js: main custom theme js file  -->
<script src="assets/js/theme.min.js"></script>

<!-- custom js: custom js file is added for easy custom js code  -->
<script src="assets/js/custom.js"></script>

<!-- custom js: custom scripts for theme style switcher for demo purpose  -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span id="nombre">Imelda Vergara</span> <a class="badge badge-primary" style="color:#FFF;" id="cargo">Rectora</a></h5>
        <button type="button" class="close btn-lg" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <p id="descripcion"></p>
        
      </div>
      <div class="modal-footer">
      	<a href="directorio.php" type="button" class="btn btn-success btn-lg" >Contactar</a>
        <button type="button" class="btn btn-info btn-lg" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> -->
                          
 <script>
 $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
<!--MODAL FIN-->
</body>
</html>
