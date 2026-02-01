<?php
    include "admin-unicab/php/conexion.php";
    require "registro/docenteunicab/updreg/1cc3s4db.php";
    //https://unicab.org/eval_pres.php
    
    //El siguiene segmento de código se dede desactivar en producción --> ES SOLO PARA PRUEBAS
    /*$sql_update_respuestas = "UPDATE tbl_respuestas SET respuesta = 'NA', resultado = 'NA'";
    $exe_update_respuestas = $mysqli1->query($sql_update_respuestas);*/
    
?>
<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Admisiones | Unicab | Colegio Virtual</title>

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
    <!--<script src="admin-unicab/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/jquery-2.1.1.min.js" type="text/javascript"></script>-->
    <!-- Jquery JS  -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    
    <!-- Main Master Style  CSS  -->
    <link id="cbx-style" data-layout="1" rel="stylesheet" href="assets/css/style-default.min.css" media="all">
    
	<!--SEGUIMIENTO GOOGLE-->
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158598632-1"></script>
    <script>
        $(function() {
            //$(".ghf").addClass("oculto");
            //$(".file-input").addClass("oculto");
            var contenido=$(".ghf");
            contenido.slideUp(250);
            var contenido1=$(".file-input");
            contenido1.slideUp(250);
            /*var contenido2=$("input[type='file']");
            contenido2.slideUp(250);*/
            
            /*$('form').submit(function(){
                $("#divcargando").css({display:'block'});
                sleep(5);
    			
    			$(".loader").fadeOut("slow");
    		});*/
            
            //alert("hola");
            
        });
        
        function val_documento() {
            //alert("hola");
            $(".loader").fadeOut("slow");
            $("#btncomenzar").hide();

            var doc = $("#register_documento").val();
            $("#n_documento").val(doc);
            
            //Se valida si el estudiante ya presentó la evaluación de presaberes
            $.ajax({
        		type:"POST",
        		url:"validacion_pres.php",
        		data:"documento=" + doc,
        		success:function(r) {
        		    var res = JSON.parse(r);
        		    //alert(res.estado);
        		    var r_est = res.estado;
        		    
        		    if(r_est == "SIN_PRESENTAR") {
        		        val_documento1();
        		    }
        		    else {
        		        $("#msgdocumento").html("Este documento ya presentó la evaluación de presaberes.");
        		        
        		        var contenido=$(".ghf");
                        contenido.slideUp(250);
                        var contenido1=$(".file-input");
                        contenido1.slideUp(250);
        		    }
        		}
        	});
        }
        
        function val_documento1() {
            //alert("hola");
            $(".loader").fadeOut("slow");
            $("#btncomenzar").hide();

            var doc = $("#register_documento").val();
            $("#n_documento").val(doc);
            
            $.ajax({
        		type:"POST",
        		url:"registro_matricula.php",
        		data:"documento=" + doc,
        		success:function(r) {
        		    var res = JSON.parse(r);
        		    //alert(res.estado);
        		    var r_est = res.estado;
        		    var grados = res.grados;
        		    var cod_ent = res.cod_ent;
        		    var r_grado = res.grados[0].gra;
        		    var r_idgrado = res.grados[0].id_gra;
        		    var r_ctpreg = res.ct_preg;
        		    //alert(r_ctpreg);
        		    
        		    $("#register_estado").val(r_est);
        		    $("#idgra").val(r_idgrado);
        		    $("#lblct_preg").html(r_ctpreg);
        		    $("#ct_preg").val(r_ctpreg);
        		    
        		    if(r_idgrado == 11 || r_idgrado == 12 || r_idgrado == 17 || r_idgrado == 18) {
        		        $("#ct_preg_cf").show();
        		        $("#ct_preg_sf").hide();
        		    }
        		    else {
        		       $("#ct_preg_cf").hide();
        		       $("#ct_preg_sf").show(); 
        		    }
        		    $("#ct_preg_cf").hide();
        		    $("#ct_preg_sf").show();
        		    
        		    var contenido2=$("#divcodigo");
                    contenido2.slideUp(250);
                    
                    //alert(r_est);
                    //alert(res.req_eval);
        		    if((r_est == "solicitud" || r_est == "activo") && res.req_eval == "SI") {
        		        $("#msgdocumento").html("");
        		        
        		        var contenido=$(".ghf");
                        contenido.slideDown(250);
                        var contenido1=$(".file-input");
                        contenido1.slideDown(250);
                        
                        //alert("para grado" + r_grado);
                        $("#lblgrado").html("para grado " + r_grado);
                        $("#btncomenzar").show();
        		    }
        		    /*else if((r_est == "solicitud" || r_est == "activo") && res.req_eval == "NO") {
        		        $("#msgdocumento").html("Este documento no es de estudiante nuevo, por lo tanto no presenta evaluación de admisión.");
        		        
        		        var contenido=$(".ghf");
                        contenido.slideUp(250);
                        var contenido1=$(".file-input");
                        contenido1.slideUp(250);
        		    }
        		    else if(r_est == "pre_solicitud"  && res.req_eval == "NO") {
        		        $("#msgdocumento").html("Este documento no es de estudiante nuevo, por lo tanto no presenta evaluación de admisión.");
        		        
        		        var contenido=$(".ghf");
                        contenido.slideUp(250);
                        var contenido1=$(".file-input");
                        contenido1.slideUp(250);
        		    }*/
        		    else if(r_est == "pre_solicitud" && res.req_eval == "SI") {
        		        $("#msgdocumento").html("");
        		        
        		        var contenido=$(".ghf");
                        contenido.slideDown(250);
                        var contenido1=$(".file-input");
                        contenido1.slideDown(250);
                        
                        $("#lblgrado").html("para grado " + r_grado);
                        $("#btncomenzar").show();
        		    }
        		    else {
        		        $("#msgdocumento").html("Este documento no tiene ninguna solicitud de matrícula.");
        		        
        		        var contenido=$(".ghf");
                        contenido.slideUp(250);
                        var contenido1=$(".file-input");
                        contenido1.slideUp(250);
        		    }
        		}
        	});
        }
        
    </script>

    <style>
        #alert {
            position: fixed;
            bottom: 0;
            left: 0;
            z-index: 5000;
        }
        #txtvacio {
            border: 0;
        }
        .error {
            border: 3px solid red !important;
        }
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('assets/img/loading1.gif') 50% 50% no-repeat;
            opacity: .8;
        }
        .fa-hand-o-right {
            color: red;
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
    
    <div id="divcargando" class="loader" style="display: none;"></div>
    
    <!--== Page Title Area Start ==-->
    <section id="page-title-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="page-title-content">
                        <h1 class="h2">Evaluación admisión</h1>
                        <p>(Se recomienda utilizar navegadores diferentes a Internet Explorer)</p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Inicio</a>
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
                        <div class="register-page-inner">
                            <div class="col-lg-10 m-auto">
                                <div class="register-form-content">
                                    <div class="row">
                                        <!-- Signin Area Content Start -->
                                        
                                        <!-- Signin Area Content End -->

                                        <!-- Regsiter Form Area Start -->
                                        <div class="col-lg-12 col-md-12 ml-auto">
                                            <div class="register-form-wrap">
                                            
                                                <h3><span class="badge badge-success">Paso 1</span> Información del Estudiante</h3>
                                                
                                                <div class="register-form" id="divform">
                                                    
                                                        
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12">
                                                            <div class="jumbotron jumbotron-fluid">
                                                                <div class="container" align="center" id="contieneSelect">
                                                                    <h3 class="display-4xxx">Número de documento de identidad del estudiante (sin puntos)</h3>
                                                                    <div class="form-group" align="center" id="contieneSelect2">
                                                                        <!--<input type="text" class="form-control" id="register_documento" name="register_documento" required placeholder="número de documento" maxlength="20" onkeyup="validar_numero('register_documento', 'Número de documento');">-->
                                                                        <input type="text" class="form-control" id="register_documento" name="register_documento" required placeholder="número de documento" maxlength="20">
                                                                        <input type="hidden" style="width: 20px" id="ctr_register_documento" value="1"/><br>
                                                                        <button class="btn btn-brand smooth-scroll" onclick="val_documento();">Continuar</button>
                                                                        <h5 id="msgdocumento" style="color: blue;"></h5>
                                                                        <input type="hidden" id="register_estado"/><br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row ghf">
                                                        <h4>Bienvenido a ésta evaluación de admisión <label id="lblgrado"></label>.</h4>
                                                        <p><i class="fa fa-hand-o-right "></i> El propósito de ésta evaluación es ayudarte a identificar las falencias en los conceptos previos o presaberes, en los
                                                            cuales debes investigar y profundizar para desarrollar las actividades de cada pensamiento.
                                                        </p>
                                                        <p><i class="fa fa-hand-o-right "></i> Al concluir la evaluación, encontraras un <strong>resumen del resultado y una hoja de ruta sugerida, </strong>para
                                                            convertir tus falencias en fortalezas y que puedas integrar y construir el conocimiento requerido para este grado. <strong>Este resultado será enviado al correo del acudiente.</strong>
                                                        </p>
                                                        <!--<p><i class="fa fa-hand-o-right "></i> <strong>Esta evaluación es requerida para completar tu proceso de matrícula.</strong>-->
                                                        </p>
                                                        <p id="ct_preg_sf"><i class="fa fa-hand-o-right "></i> La evaluación consta de <strong><label id="lblct_preg"></label> preguntas</strong> (o menos) no calificables cuantitativamente y <strong>no hay límite de tiempo.</strong>
                                                        </p>
                                                        <!--<p id="ct_preg_cf"><i class="fa fa-hand-o-right "></i> La evaluación consta de <strong><?php echo $ct_preguntasf; ?> preguntas</strong> (o menos) no calificables cuantitativamente y <strong>no hay límite de tiempo.</strong>
                                                        </p>-->
                                                        <p><i class="fa fa-hand-o-right "></i> <strong>Cada pregunta tiene un sólo intento.</strong> Pero se puede pausar la evaluación y volver a ingresar luego para completarla. 
                                                        <!--<strong>Pero recuerda que es requisito para completar la matrícula.</strong>-->
                                                        </p>
                                                        
                                                    </div>
                                                        
                                                    <form name="formulario" id="formulario" method="post" action="eval_adm1.php" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <input type="hidden" name="verificacion">
                                                            <input type="hidden" id="n_documento" name="n_documento"/>
                                                            <input type="hidden" id="idgra" name="idgra"/>
                                                            <input type="hidden" id="ct_preg" name="ct_preg"/>
                                                            <!--<input type="hidden" id="ct_pregf" name="ct_pregf" value="<?php echo $ct_preguntasf; ?>"/>-->
                                                            <input id="btncomenzar" type="submit" class="btn btn-reg" value="Siguiente" style="display: none;"/>
                                                        </div>
                                                    </form>
                                                    <div class="alert alert-danger" role="alert" id="alert" style="display: none;">
                                                        <p><i class="fa fa-warning"></i><span>: </span><label id="pdesc"></label>
                                                        <input type="text" class="alert alert-danger" style="width: 20px" id="txtvacio" value="0"></p>
						                            </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Regsiter Form Area End -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    
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
    
    <!--<script>
    	$(document).ready(function(){
    		$('form').submit(function(){
    			if($('input[type="text"]').val() == '' || $('input[type="email"]').val() == '' || $('input[type="file"]').val() == '' || $('textarea').val() == ''){
    				alert('Rellena todos los campos');
    				return false;
    			}
    		});
    	});
    </script>-->

</body>
</html>
