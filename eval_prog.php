<?php
    include "admin-unicab/php/conexion.php";
    require "registro/docenteunicab/updreg/1cc3s4db.php";
	//require "homeunicabpro/business/repositories/1cc2s4Home.php";
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
            var contenido=$(".ghf");
            contenido.slideUp(250);
            var contenido1=$(".file-input");
            contenido1.slideUp(250);
            
            $("#selgra").unbind("change").bind("change", function(e) {
                
        	});
            
        });
        
        function mostrar_grados(documento) {
            //alert(documento);
            $.ajax({
        		type:"POST",
        		url:"cargar_cargos_validacion.php",
        		data:"documento=" + documento,
        		success:function(r) {
        			$("#divselgra").html(r);
        			//$("#selgra").html(r);
        		}
        	});
        }
        
        function val_documento() {
            //alert("----");
            $(".loader").fadeOut("slow");
            $("#btncomenzar").hide();
            $("#divselgra").empty();

            var doc = $("#register_documento").val();
            $("#n_documento").val(doc);
            
            $.ajax({
        		type:"POST",
        		url:"registro_prog.php",
        		data:"documento=" + doc,
        		success:function(r) {
        		    var res = JSON.parse(r);
        		    var r_ctpreg = res.ct_preg;
        		    //alert(res.req_validacion);
        		    //alert(res.fecha_validacion);
        		    //var r_req_val = res.req_validacion;
        		    var r_fecha_val = res.fecha_programacion;
        		    
        		    $("#lblct_preg").html(r_ctpreg);
        		    $("#ct_preg").val(r_ctpreg);
        		    $("#idgra").val(res.idgrado);
        		    $("#txtgra").val(res.grado);
        		    
					if(res.programado == "NO") {
						$("#msgdocumento").html("Este documento no ha sido programado para ninguna evaluación de cargo.");
						
						var contenido=$(".ghf");
                        contenido.slideUp(250);
                        var contenido1=$(".file-input");
                        contenido1.slideUp(250);
                        
                        $("#divgrados").hide();						
					}
					else if(res.programado == "SI") {
						if(res.eval_prog_estado == "PRESENTADA") {
							$("#msgdocumento").html("Este documento ya presentó evaluación para el cargo " + res.grado + ".");
							
							var contenido=$(".ghf");
							contenido.slideUp(250);
							var contenido1=$(".file-input");
							contenido1.slideUp(250);
							
							$("#divgrados").hide();
						}
						else {
							//Se muestran los grados
							mostrar_grados(doc);
							$("#btncontinuar").hide();
							$("#divgrados").show();
						}
					}        		    
        		}
        	});
        }
        
        function comprobar_grado() {
            var gra = $("#selgra option:selected").text();
            //alert("gra=" + gra);
            var idgra = $("#selgra").val();
            $("#idgra").val(idgra);
            $("#txtgra").val(gra);
            
            if(gra == "Seleccione grado") {
                var contenido=$(".ghf");
                contenido.slideUp(250);
                var contenido1=$(".file-input");
                contenido1.slideUp(250);
                
                $("#lblgrado").html("");
                $("#btncomenzar").hide();
            }
            else {
                var contenido=$(".ghf");
                contenido.slideDown(250);
                var contenido1=$(".file-input");
                contenido1.slideDown(250);
                
                $("#lblgrado").html("para el cargo " + gra);
                $("#btncomenzar").show();
            }
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
        .fa-chevron-right {
            color: blue;
        }
		#page-title-areazz {
			background: #fe9100;
		}
		.btn-brandzz {
			background: #0D3041;
			font-size: 24px;
			color: white;
		}
    </style>
	
</head>
<body>

    <!--== Header Area Start ==
    <header id="header-area">
        <?php //include "header.php"; ?>
         <script>
        var elemento = document.getElementById("itemServicios");
        elemento.className += " active";
    	</script>
    </header>-->
    <!--== Header Area End ==-->
    
    <div id="divcargando" class="loader" style="display: none;"></div>
    
    <!--== Page Title Area Start ==-->
    <section id="page-title-areazz">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="page-title-content">
                        <h1 class="h2">Evaluación Desarrolladores Web</h1>
                        <p>(Se recomienda utilizar navegadores diferentes a Internet Explorer)</p>
                        <a href="#page-content-wrap" class="btn btn-brandzz smooth-scroll">Inicio</a><br><br>
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
                                            
                                                <h3><span class="badge badge-success">Paso 1</span> Información del Aspirante</h3>
                                                
                                                <div class="register-form" id="divform">
                                                        
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12">
                                                            <div class="jumbotron jumbotron-fluid">
                                                                <div class="container" align="center" id="contieneSelect">
                                                                    <h3 class="display-4">Número de documento de identidad (sin puntos)</h3>
                                                                    <div class="form-group" align="center" id="contieneSelect2">
                                                                        <input type="text" class="form-control" id="register_documento" name="register_documento" required placeholder="número de documento" maxlength="20">
                                                                        <input type="hidden" style="width: 20px" id="ctr_register_documento" value="1"/><br>
                                                                        <button id="btncontinuar" class="btn btn-brandzz smooth-scroll" onclick="val_documento();">Continuar</button>
                                                                        
                                                                        <input type="hidden" id="register_estado"/><br>
                                                                    </div>
                                                                    <div id="divgrados" style="display: none;">
                                                                        <h3 class="display-4">Cargo a validar</h3>
                                                                        <div id="divselgra">
                                                                            <!--</div><br>
                                                                            <button id="btncontinuar1" class="btn btn-brand smooth-scroll" onclick="val_grado();">Continuar</button>-->
                                                                        </div>
                                                                    </div>
                                                                    <h5 id="msgdocumento" style="color: blue;"></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="row ghf">
                                                            <h4>Bienvenido a esta evaluación de conocimientos <label id="lblgrado"></label>.</h4>
                                                            <p><i class="fa fa-chevron-right"></i> El propósito de ésta evaluación es validar los conocimientos mínimos requeridos.
                                                            </p>
                                                            <p><i class="fa fa-chevron-right"></i> Al concluir la evaluación, encontraras un <strong>resumen del resultado y una puntuación en porcentaje. </strong>
                                                                Si esta puntuación <strong>es superior al 80%</strong> el aspirante aprueba la evaluación.
                                                            </p>
                                                            <p><i class="fa fa-chevron-right"></i> <strong>Cada pregunta tiene un sólo intento.</strong>
																La evaluación consta de <strong><label id="lblct_preg"></label> preguntas</strong>.  
                                                            </p>
                                                            
                                                        </div>
                                                        
                                                        <form name="formulario" id="formulario" method="post" action="eval_prog1.php" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <input type="hidden" name="verificacion">
                                                                <input type="hidden" id="n_documento" name="n_documento"/>
                                                                <input type="hidden" id="idgra" name="idgra"/>
                                                                <input type="hidden" id="txtgra" name="txtgra"/>
                                                                <input type="hidden" id="ct_preg" name="ct_preg"/>
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
        </div>
    </section>
    
    <!-- Footer Bottom Start -->
    <footer id="footer-area">
        <?php 
			include "footer.php";			
		?>
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
