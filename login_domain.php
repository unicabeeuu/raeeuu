<?php
    include "admin-unicab/php/conexion.php";
    
    $sql = "SELECT * FROM grados WHERE id > 1";
	//echo $sql;
	$petecion=mysqli_query($conexion,$sql);
	
	$sqltd = "SELECT * FROM tbl_tipos_documento";
	$petecion1=mysqli_query($conexion,$sqltd);
	
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
    <link rel="shortcut icon" type="image/x-icon" href="favicon2025.ico">  <!-- this icon shows in browser toolbar -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon2025.ico"> <!-- this icon shows in browser toolbar -->
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
    
    <!-- MODERNIZER  -->
    <script src="assets/vendor/modernizr/modernizr-custom.js"></script>
    <!--<script src="admin-unicab/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/jquery-2.1.1.min.js" type="text/javascript"></script>-->
    <!-- Jquery JS  -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/navbar/bootstrap-4-navbar.js"></script>
    
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
        
        $(function() {
            //$(".ghf").addClass("oculto");
            //$(".file-input").addClass("oculto");
            var contenido=$(".ghf");
            contenido.slideUp(250);
            var contenido1=$(".file-input");
            contenido1.slideUp(250);
            /*var contenido2=$("input[type='file']");
            contenido2.slideUp(250);*/
            
            $(document).on("cut copy paste","#register_email1",function(e) {
                e.preventDefault();
            });
            $(document).on("cut copy paste","#register_email",function(e) {
                e.preventDefault();
            });
            /*$('#register_email1').live("cut copy paste",function(e) {
                e.preventDefault();
            });*/
            //***************************** Activar las siguientes líneas en produción ***********************************************************
            $(document).on("cut copy paste","#register_correoA",function(e) {
                e.preventDefault();
            });
            $(document).on("cut copy paste","#register_correoA1",function(e) {
                e.preventDefault();
            });
            
            $('form').submit(function(){
                $("#divcargando").css({display:'block'});
                sleep(5);
    			if($('input[type="text"]').val() == '' || $('input[type="email"]').val() == '' || $('input[type="file"]').val() == '' || $('textarea').val() == ''){
    				alert('Rellena todos los campos');
    				return false;
    			}
    			$(".loader").fadeOut("slow");
    		});
            
            //alert("hola");
            $("#register_grado").change(function() {
        		var gra = $("#register_grado").val();
        		var gra_permitido = $("#grado_permitido").val();
        		var control = 0;
        		//alert(gra + " " + gra_permitido);
        		if(gra_permitido == 0) {
        		    //No hace nada
        		}
        		else {
        		    if(gra == gra_permitido) {
            		    $("#pdesc").html("");
            		    $("#ctr_register_grado").val("0");
            		}
            		else {
            		    //("Ha seleccionado un grado no permitido para tu estado actual");
            		    $("#ctr_register_grado").val("1");
            		    gra = 0;
            		    control = 1;
            		    var texto = "Ha seleccionado un grado no permitido para tu estado actual";
                        //alert(texto);
                        $("#pdesc").html(texto).css("color","red");
            		}    
        		}
        		
        		if(gra == 0 && control == 0) {
        			$("#btnEnviar").hide();
        			$("#ctr_register_grado").val(1);
        			var texto = "Debe seleccionar un grado para la matrícula";
                    $("#pdesc").html(texto).css("color","red");
        		}
        		else if(gra == 0 && control == 1) {
        			$("#btnEnviar").hide();
        			$("#ctr_register_grado").val(1);
        		}
        		else {
        		    //$("#btnEnviar").show();
        		    $("#ctr_register_grado").val(0);
        		    $("#pdesc").html("");
        		}
        		mostrar_submit();
        	});
        	
        	$("#register_tipo_documento").change(function() {
        		var td = $("#register_tipo_documento").val();
        		var td_txt = $("#register_tipo_documento option:selected").text();
        		$("#td_text").val(td_txt);
        		
        		var control = 0;
        		//alert(td);
        		if(td == 0) {
        			$("#btnEnviar").hide();
        			$("#ctr_register_tipo_documento").val(1);
        			var texto = "Debe seleccionar un tipo de documento para la matrícula";
                    $("#pdesc").html(texto).css("color","red");
        		}
        		else {
        		    //$("#btnEnviar").show();
        		    $("#ctr_register_tipo_documento").val(0);
        		    $("#pdesc").html("");
        		}
        		mostrar_submit();
        	});
        });
        
        function validar_email() {
            var input_email = document.getElementById("email");
            var patron = /^[_-\w.]+@[a-z]+\.[a-z]{2,5}$/;
            //var esCoincidente = patron.test(document.getElementById("email2").value);
            var esCoincidente = patron.test($("#email").val());
            if(esCoincidente) {
                input_email.setCustomValidity("");
                $("#alert").html("");
            }
            else {
                input_email.setCustomValidity("El email no tiene el formato correcto");
                $("#alert").html("El email no tiene el formato correcto").css("color","red");
            }
        }
        
        function Validar(){
		 	var usuario=document.getElementById('email').value;
		 	var password=document.getElementById('pass').value;

		 	if (usuario=="") {
     			$('#alert').html('<center><strong>Advertencia</strong> Campo Obligatorio</center>').slideDown(500);
	       		$('#usuario').focus();
	       	return false;
	     	}else{
	      		$('#alert').html('').slideUp(300);
	     	}

	     	if (password=="") {
	     		$('#alert').html('<center><strong>Advertencia</strong> Campo Obligatorio</center>').slideDown(500);
	     		$('#contrasena').focus();
	       	return false;
	     	}else{
	       		$('#alert').html('').slideUp(300);
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
        .fa-hand-o-right {
            color: green;
        }
        .fa-check-circle  {
            margin-left: 20px;
            color: red;
        }
        .fa-asterisk, .fa-file-text  {
            color: white;
        }
        .fa-exclamation-triangle {
            color: yellow;
        }
        .ancho1 {
            border: 10px;
        }
        .rojo {
            color: red;
            font-weight: bold;
        }
        .centrado {
            width: auto; 
            height: auto; 
            margin: 0 auto; 
            display: block;
        }
        .blanco {
            color: white;
        }
        input[type="email"], input[type="password"] {
            font-size: 1em;
            padding: 14px 15px 14px 37px;
            width: 100%;
            color: #A8A8A8;
            outline: none;
            border: 1px solid #D3D3D3;
            background: #FFFFFF;
            font-size: .9em;
		    padding: 10px 15px 10px 37px;
            margin: 0em 0em 1.5em 0em;
        }
        input.user {
            background: url(admin-unicab/images/user.png)no-repeat 8px 16px #fff;
        }
        input.lock {
            background: url(admin-unicab/images/lock.png)no-repeat 8px 16px #fff;
        }
        input.user, input.lock{
    		background-size: 8%;
    	}
		#header-area .header-bottom-area.fixed .navbar-brand img {
			width: 100px;
		}
    </style>
	
</head>
<body>

    <!--== Header Area Start ==-->
    <div class="header-bottom-area" id="fixheader">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
						<a class="navbar-brand" href="https://unicab.org">
							<img src="assets/img/logo_color_10.png" alt="Logo">
						</a> 
					</div>
            </div>
        </div>
    </div>
    <!--== Header Area End ==-->
    
    <div id="divcargando" class="loader" style="display: none;"></div>
    
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
                                        <!-- Regsiter Form Area Start  -->
                                        <div class="col-lg-12 col-md-12 ml-auto">
                                            <div class="register-form-wrap">
                                                
                                                <div class="register-form" id="divform">
                                                        
                                                        <div class="row">
                                                            <div class="col-12 col-sm-12">
                                                                <div class="jumbotron jumbotron-fluid">
                                                                    <div class="container" align="center" id="contieneSelect">
                                                                        <h3 class="display-4xxx">Iniciar sesión método doman</h3>
                                                                        <div class="form-group" align="center" id="contieneSelect2" style="width: 300px;!important">
                                                                            <form action="admin-unicab/php/login_domain1.php" method="POST" onsubmit="javascript:return Validar(this);" >
                                                                                <input type="email" class="form-control" id="email" name="email" placeholder="Usuario &#9658; email institucional" autofocus="" oninput="validar_email()" required>
                                                        						<input type="password" class="form-control" id="pass" name="pass"  placeholder="Password" required>
																				
																				<div style="display: none;">
																					<input type="radio" name="idioma" value="E" checked /> Español<label style="color: transparent">--</label>
																					<input type="radio" name="idioma" value="I" /> Inglés
																				</div>
																				
                                                        						<br><input type="submit" class="btn btn-brand smooth-scroll" value="Continuar">
                                                        
                                                        						<div class="alert alert-danger" role="alert" id="alert" style="margin-top: 30px;">
                                                        						</div>
                                                        					</form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
    
    <!--== Scroll Top ==-->
    <a href="#" class="scroll-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!--== Scroll Top ==-->

    <!-- POPPER JS -->
    <script src="assets/vendor/bootstrap/js/popper.min.js"></script>
    
    <!-- BOOTSTRAP JS -->
    
    
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
