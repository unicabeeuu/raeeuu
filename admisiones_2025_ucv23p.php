<?php
    include "admin-unicab/php/conexion.php";
	
	$codigo23P = $_REQUEST["c"];
    
    $sql = "SELECT * FROM grados WHERE id > 1";
	//echo $sql;
	$petecion=mysqli_query($conexion,$sql);
	
	$sqltd = "SELECT * FROM tbl_tipos_documento";
	$petecion1=mysqli_query($conexion,$sqltd);
	
	$sql_fecha_ordinarias = "SELECT IdEvento,NombreE,DescripcionE,LinkE,FechaE,DATE_FORMAT(FechaE, '%d de %M del %Y' ) AS fecha,ImagenE, 
	DATE_FORMAT(FechaE, '%d' ) AS diaCierre, DATE_FORMAT(FechaE, '%m' ) AS mesCierre, DATE_FORMAT(FechaE, '%Y' ) AS añoCierre 
	FROM evento WHERE idEvento = 6";
				   
	$res_fecha_ordinarias = mysqli_query($conexion, $sql_fecha_ordinarias);
	while ($fila = mysqli_fetch_array($res_fecha_ordinarias)){
		$fecha_ordinarias = $fila["FechaE"];
		$fecha_texto = $fila["fecha"];
		$nombreE = $fila["NombreE"];
		$descripcionE = $fila["DescripcionE"];
		$diaCierre = $fila["diaCierre"];
		$mesCierre = $fila["mesCierre"];
		$añoCierre = $fila["añoCierre"];
	}
	
	switch ($mesCierre) {
    	case '01':
    		$nuevoMes="Enero"; 
    		break;
    	case '02':
    		$nuevoMes="Febrero";
    		break;
    	case '03':
    		$nuevoMes="Marzo";
    		break;
    	case '04':
    		$nuevoMes="Abril";
    		break;
    	case '05':
    		$nuevoMes="Mayo";
    		break;
    	case '06':
    		$nuevoMes="Junio";
    		break;
    	case '07':
    		$nuevoMes="Julio";
    		break;
    	case '08':
    		$nuevoMes="Agosto";
    		break;
    	case '09':
    		$nuevoMes="Septiembre";
    		break;
    	case '10':
    		$nuevoMes="Octubre";
    		break;
    	case '11':
    		$nuevoMes="Noviembre";
    		break;
    	case '12':
    		$nuevoMes="Diciembre";
    		break;
    }
	
?>
<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Admisiones | Unicab | Colegio Virtual</title>

    <meta name="description" content="Unicab Corporación Educativa, es una institución de educación que desde hace 18 años, busca consolidar un modelo educativo innovador y de pertinencia con la realidad del país. ">
    <meta name="keywords" content="colegio, virtual, unicab, educación, ciclos, grados, profesores, estudiantes">
    <meta name="author" content="Impacto Digital Colombia">
    
    <!-- twitter card starts from here, if you don't need remove this section -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@unicab">
    <meta name="twitter:creator" content="@unicab">
    <meta name="twitter:url" content="https://unicab.org">
    <meta name="twitter:title" content="Unicab | Colegio Virtual"> <!-- maximum 140 char -->
    <meta name="twitter:description" content="Unicab Corporación Educativa, es una institución de educación que desde hace 18 años, busca consolidar un modelo educativo innovador y de pertinencia con la realidad del país."> <!-- maximum 140 char -->
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
	
	<meta name="facebook-domain-verification" content="dbtztn3hr9xirgwzmzzoft2arqqq0t" />
    
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
    
    <!-- Main Master Style  CSS -->
    <link id="cbx-style" data-layout="1" rel="stylesheet" href="assets/css/style-default.min.css" media="all">
    
	<!--SEGUIMIENTO GOOGLE-->
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158598632-1"></script>
	
	<!-- Meta Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '371421771980229');
	fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=371421771980229&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Meta Pixel Code -->
    
	<script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'UA-158598632-1');
        
        $(function() {
			$("#cargando").hide();
            $('form').submit(function(){
                //$("#divcargando").css({display:'block'});
                //sleep(5);
    			if($('input[type="text"]').val() == '' || $('input[type="email"]').val() == '' || $('input[type="number"]').val() == ''){
    				alert('Rellena todos los campos');
    				return false;
    			}
    		});
        });
        
        function validar_numero(id, desc) {
            var control = 0;
            var id_obj = "#" + id;
            var ctr_obj = "#ctr_" + id;
            var v_input = document.getElementById(id);
            var patron = /^[0-9]{1,}$/;
			$("#msgdocumento").html("");
			$("#btnEnviar").attr("disabled", "disabled");
			$("#ctr_estado").val(1);
			
            var esCoincidente = patron.test($(id_obj).val());
            //alert(esCoincidente);
            if(esCoincidente) {
                v_input.setCustomValidity("");
                $(ctr_obj).val(0);
            }
            else {
                v_input.setCustomValidity("Ha ingresado caracteres inválidos");
				$(ctr_obj).val(1);
                var texto = "Ingrese sólamente números para " + desc;
                $("#msgdocumento").html(texto);
                control = 1;
            }
            
            if(control == 0) {
			    if($(id_obj).val() == "") {
			        var texto = "El campo " + desc + " se debe llenar";
    				$("#msgdocumento").html(texto);
                    $(ctr_obj).val(1);
			    }
			}
			
            mostrar_submit();
        }
        
        function mostrar_submit() {
            var control = 0;
            var control1 = 0;
            var a = parseInt($("#ctr_register_documentoe").val());
            var b = parseInt($("#ctr_estado").val());
            
            control = parseInt($("#ctr_register_documentoe").val()) + parseInt($("#ctr_estado").val());
            
            console.log("control: " + control);
            if(control > 0) {
                $("#btnEnviar").attr("disabled", "disabled");
            }
            else {
				$('#exampleModalScrollable').modal('hide');
                $("#btnEnviar").removeAttr("disabled");
            }
            
            (a == 1) ? $("#register_documentoe").addClass("error") : $("#register_documentoe").removeClass("error");            
        }
        
        function val_documento() {
            //alert("hola");
			$("#msgdocumento").html("");
			$("#estado").val("");
            
            var doc = $("#register_documentoe").val();
            var cifra = doc.substring(0,1);
            //alert(cifra);
            if(doc == "0" || cifra == "0") {
                $("#msgdocumento").html("El documento no puede ser 0, o no puede empezar por 0");
            }
			else if(doc == "") {
                $("#msgdocumento").html("Ingrese el número de documento del estudiante");
            }
            else {
				//$('#exampleModalScrollable').modal('show');
				$("#cargando").show();
				$("#msgdocumento").html("Consultando documento...");
				setTimeout(() => {
					registroMatricula0(doc);
				}, 2000);
            }			
        	
        }
        
        function cargargrados(id_gra) {
        	$.ajax({
        		type:"POST",
        		url:"cargar_grados_putdat.php",
        		data:"id_gra=" + id_gra,
        		success:function(r) {
        		    alert(r);
        			$("#register_grado").html(r);
        		}
        	});
        }
        
        function prueba() {
			$('#exampleModalScrollable').modal('toggle');
            $('#exampleModalScrollable').modal('show');
		}
		
		function registroMatricula0(doc) {
			let codigo23P = $("#codigo23P").val();
			$.ajax({
				type:"POST",
				url:"registro_matricula_0_23p.php",
				data:"documento=" + doc + "&c=" + codigo23P,
				success:function(r) {
					var res = JSON.parse(r);
					//alert(res.estado);
					var control_matricula = 0;
					var r_est = res.estado;
					
					$("#estado").val(r_est);
					
					if(res.codigo23P == "NO") {
						control_matricula = 1;
						$("#msgdocumento").html("El link no pertenece a este documento.");							
					}
					
					if(res.validar_extemporaneidad == "SI") {
						if(res.solicitud_matricula_escrita == "NO") {
							control_matricula = 1;
							$("#msgdocumento").html("Este documento no ha enviado solicitud de matrícula por escrito");
						}							
					}
					
					if(res.bloqueado == "SI") {
						control_matricula = 1;
						$("#msgdocumento").html("Por favor comunícate con Rectoría o Secretaría Académica.");							
					}
					
					if(control_matricula == 0) {
						if(res.mat_ordinaria == "AUN NO") {
							control_matricula = 1;
							$("#msgdocumento").html("Las matrículas ordinarias van desde el " + res.mat_ordinaria_desde + " hasta el " + res.mat_ordinaria_hasta);
						}
						else if(res.mat_ordinaria == "SI") {
							control_matricula = 0;
						}
						else if(res.mat_ordinaria == "NO") {
							if(res.mat_extraordinaria == "AUN NO") {
								control_matricula = 1;
								$("#msgdocumento").html("Las matrículas extraordinarias van desde el " + res.mat_extraordinaria_desde + " hasta el " + res.mat_extraordinaria_hasta);
							}
							else if(res.mat_extraordinaria == "SI") {
								control_matricula = 0;
							}
							else if(res.mat_extraordinaria == "NO") {
								control_matricula = 1;
								$("#msgdocumento").html("Las matrículas extraordinarias van desde el " + res.mat_extraordinaria_desde + " hasta el " + res.mat_extraordinaria_hasta);
							}
						}
					}            		    
					
					if(control_matricula == 0) {
						if(r_est == "activo") {
							var r_grado = res.grados[0].gra;
							//alert(r_grado);
							var r_idgrado = res.grados[0].id_gra;
							$("#ctr_estado").val(1);
							
							$("#msgdocumento").html("Este documento se encuentra activo en el grado " + r_grado + ".");
						}
						else if(r_est == "solicitud" || r_est == "pre_solicitud") {
							var r_grado = res.grados[0].gra;
							//alert(r_grado);
							var r_idgrado = res.grados[0].id_gra;
							$("#ctr_estado").val(1);
							
							$("#msgdocumento").html("Este documento ya tiene una solicitud de matrícula en el grado " + r_grado + ".");
						}
						else if(r_est == "reprobado") {
							var r_grado = res.grados[0].gra;
							var r_idgrado = res.grados[0].id_gra;
							$("#ctr_estado").val(0);
							$("#register_grado").val(r_idgrado);
							$("#msgdocumento").html("Estudiante antiguo, puede iniciar proceso de matícula para el grado " + r_grado + ".");
						}
						else if(r_est == "aprobado") {
							var r_grado = res.grados[0].gra;
							var r_idgrado = res.grados[0].id_gra;
							$("#ctr_estado").val(0);
							$("#register_grado").val(r_idgrado);
							$("#msgdocumento").html("Estudiante antiguo, puede iniciar proceso de matrícula para el grado " + r_grado + ".");
						}
						else if(r_est == "retirado") {
							$("#ctr_estado").val(1);
							$("#msgdocumento").html("Este documento se encuentra Retirado en este momento. Comunícate con Secretaría Académica.");
						}
						else if(r_est == "nuevo") { //Así estaba if(r_est == "nuevo" && res.cod_ent != 0)
							if (res.programoEntrevista == "NO") {
								$("#ctr_estado").val(1);								
								$("#msgdocumento").html("Estudiante no ha presentado entrevista.");
							}
							else if (res.evaluacionPresaberes == "NO") {
								$("#ctr_estado").val(1);								
								$("#msgdocumento").html("Estudiante no ha presentado la evaluación de presaberes.");
							}
							else {
								$("#ctr_estado").val(0);
								$("#register_grado").val(0);
								$("#msgdocumento").html("Estudiante nuevo, puede continuar proceso de matrícula.");
							}								
						}
						else if(r_est == "inactivo") {
							$("#ctr_estado").val(1);
							$("#msgdocumento").html("Este documento se encuentra inactivo en este momento. Comunícate con Secretaría Académica.");
						}
						else {
							$("#ctr_estado").val(1);
							$("#msgdocumento").html("No se pudo procesar la solicitud de matrícula para éste documento. Comunícate con Secretaría Académica.");
						}
					}
					$('#exampleModalScrollable').modal('hide');
					$("#cargando").hide();
					
					mostrar_submit();
					$('#exampleModalScrollable').modal('hide');
				}
			});
		}
		
    </script>

    <style>
		body {
			overflow: scroll;
		}
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
		.back_img {
			background-image: url("assets/img/requisitos_nuevos_1.jpg");
			background-repeat: no-repeat;
			background-size: 100%, 100%;
			width: 100%;
			height: 720px;
		}
		.back_img1 {
			background-image: url("assets/img/requisitos_Antiguos_1.jpg");
			background-repeat: no-repeat;
			background-size: 100%, 100%;
			width: 100%;
			height: 720px;
		}
		#btnimg {
			margin-left: 700px;
		}
		
		/*************** ADMISIONES ************/
		@font-face {font-family: "CaveatBrush"; src: url("assets/fonts/CaveatBrush-Regular.ttf") format("TrueType");}
		.caveatBrush {
			font-family: "CaveatBrush";
			font-size: 3.5rem;
		}
		.mark {
			background: yellow;
		}
		
		#headerFormulario {
			background: #1E2A57;
		}
		.slide_right:hover {
			box-shadow: inset 500px 0 0 0 #42C3AE;
		}
		.form-group label {
			font-size: 1.7rem;
		}
		#tituloMatriculas {
			color: #F1C603;
		}
		#textoMatriculas {
			color: white;
		}
		#divFormulario, #divCuatro {
			background: #F0EAEA;
		}
		.obligatorio {
			color: red !important;
		}
		#btnEnviar {
			background: #59E9B6;
			border-radius: 15px;
			font-size: 2rem;
		}
		#cuentaRegresiva {
			background: #Ff9805;
		}
		.tituloTiempo, #cuentaRegresiva p, #cuentaRegresiva span, #descripcionE {
			color: white;
			font-size: 2rem;
		}
		#pCuentaRegresiva {
			color: #1E2A57 !important;
		}
		#nombreE {
			color: white;
		}
		.tiempo {
			border: 1px solid white;
			background: #FBD252;
			text-align: center;
		}
		#tituloDos {
			color: #Ff9805;
			text-align: justify;
		}
		#pDos {
			font-size: 2rem;
		}
		#tituloDosB {
			color: #253668;
		}
		.animacionmenu:hover {
			transform: translateY(-10px);
			box-shadow: inset 0px 0px 40px transparent,
                    0px 0px 40px #253668;
		}
		.animacionmenu{
			transform-style: preserve-3d;
			transition: all ease-in-out 1s;			
		}
		#tituloTres, #tituloCuatro, #tituloCinco, .resolucion {
			color: #253668;
		}
		/*#imgTres, #tituloTres {
			margin-left: 6% !important;
		}*/
		.pCuatro {
			color: #Ff9805;
			font-size: 2rem;
		}
		.pCuatroB {
			color: black;
			font-size: 1.7rem;
		}
		.imgCuatro {
			width: 30%; 
			height: auto;
		}
		.blanco {
			background: white !important;
		}
		.pCuatroTransp {
			color: transparent;
		}
		.loader {
            opacity: .8;
			width: 50%;
			margin-left: 25%;
        }
		.documentos {
			width: 50%;
		}
		.resolucion {
			font-size: 2rem;
		}
		
		#whatsapp {
		   position: fixed;
		   bottom: 20px;
		   right:20px;
		}
		svg {
		   width: 80px;
		   filter: drop-shadow(0 1px 4px rgba(0,0,0,.4));
		}
		circle {
		   fill: #25d366;
		}
		path {
		   fill: #fff;
		}
		
		@media only screen and (max-width: 650px) {
			iframe {
				width: 460px;
				height: auto;
			}
			/*.imgTres {
				margin-left: 1% !important;
			}*/
			.imgCuatro {
				width: 15%; 
				height: auto;
			}
			.tiempo {
				width: 20%;
			}
		}
		@media only screen and (max-width: 1200px) {
			iframe {
				width: 400px;
				height: auto;
			}
		}
		/*@media only screen and (min-width: 960px) {
			#tituloTres {
				margin-left: 10% !important;
			}
		}
		@media (min-width: 992px) {
			.container {
				/*.container{max-width:960px} ... así estaba en assets/vendor/bootstrap/css/bootstrap.min.css*/
				max-width:1100px !important;
			}
		}

		@media (min-width: 1200px) {
			.container {
				/*.container{max-width:1140px}*/
				max-width:1400px !important;
			}
		}*/
    </style>
	
</head>
<body>
    <!--== Header Area Start ==-->
    <div class="row">
		<!--<div class="col-12">
			<img src="assets/img/admisiones/header50_1.png" id="imgh1" class="img-fluid"/>
		</div>-->
		<img src="assets/img/admisiones/Admisiones_2025_1.jpg" id="imgh1" class="img-fluid"/>
	</div><br><br>
    <!--== Header Area End ==-->
	
	<div class="container" id="divPrincipal">
		<div class="row">
			<div class="col-lg-1 col-md-1 col-sm-12">
			</div>
			<div class="col-lg-5 col-md-5 col-sm-12" id="divFormulario">
				<form name="formulario" id="formulario" method="post" action="valida_nuevo_antiguo.php" enctype="multipart/form-data">
					<div class="row" id="headerFormulario">
						<div class="col-12">
							<center>
								<h5 id="tituloMatriculas">¡Matrículas abiertas!</h5>
							</center>
						</div>
					</div><br>
					
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="register_nombres"><label class="obligatorio">*</label> Escribe el número documento estudiante y luego haz clic fuera del cuadro de texto</label>
								<input type="text" class="form-control" id="register_documentoe" name="register_documentoe" required placeholder="Escribe el número de documento del estudiante" onkeyup="validar_numero('register_documentoe', 'Número documento estudiante');" onBlur="val_documento();">
								<input type="hidden" style="width: 20px" id="ctr_register_documentoe" value="1"/>
								<input type="hidden" id="codigo23P" name="codigo23P" value="<?php echo $codigo23P; ?>"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-1">
						</div>
						<div class="col-11">
							<img src="assets/img/admisiones/ajaxloader.gif" id="cargando" class="img-fluid"/>
							<h6 id="msgdocumento" style="color: blue;"></h6>
						</div>
					</div>
					<input type="hidden" id="estado" name="estado" value="NO"/>
					<input type="hidden" id="ctr_estado" name="ctr_estado" value="1"/>
					<input type="hidden" id="register_grado" name="register_grado" />
					<div class="form-group">
						<center>
							<button type="submit" id="btnEnviar" class="btn btn-reg form-control slide_right" disabled>
								¡Continua con el proceso!
							</button>
						</center>
					</div>
				</form>
			</div>
			
			<div class="col-lg-1 col-md-1 col-sm-12">
			</div>
			
			<div class="col-lg-5 col-md-5 col-sm-12 pl-5">
				<div class="row">
					<div class="col-12">
						<h5 class="caveatBrush">Únete al <strong>colegio UNICAB VIRTUAL</strong> y descubre un nuevo mundo de posibilidades educativas en Colombia.</h5>
						<img src="assets/img/admisiones/AVISO_1.png" id="imgAviso" class="img-fluid"/>
					</div>
				</div>
				
			</div>
		</div>
	</div><br><br>	
	
	<div class="container" id="divCinco">
		<div class="row">
			<div class="col-12">
				<center>
					<hr>
					<h3 id="tituloCinco"><strong>Documentos legales:</strong></h3>
				</center>
			</div>
		</div><br>
		
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-12">				
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<center><a href="assets/descargas/Licencia-2007.pdf" target="_blank"> 
					<img src="assets/img/admisiones/descarga.png" alt="" class="img-fluid documentos animacionmenu" title="Resolución 061 del 15 de diciembre de 2007"/>
				</a>
				<label class="resolucion"><strong>Resolución 061 del 15 de diciembre de 2007</strong></label></center>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-12">				
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<center><a href="assets/descargas/Licencia-2015.pdf" target="_blank"> 
					<img src="assets/img/admisiones/descargas.png" alt="" class="img-fluid documentos animacionmenu" title="Resolución 326 del 22 de septiembre de 2015"/>
				</a>
				<label class="resolucion"><strong>Resolución 326 del 22 de septiembre de 2015</strong></label></center>
			</div>
		</div>
	</div><br><br><br>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Consultando documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div id="divcargando" class="loader">
					<center><p><img src="assets/img/loading1.gif" alt="" class="img-fluid"/></p></center>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
      </div>
    </div>
    <!--modal-->
	
	<div id="whatsapp">
		<a href="https://wa.me/573008156531/?text=Hola. Necesito asesoría del proceso de admisiones." target="_blank">
			<svg width="80" height="80" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
			<g class="layer">
			<title>¿Necesitas asesoría?</title>
			<circle cx="40" cy="40" fill="#fff" id="svg_1" r="38" stroke="#000000" stroke-width="0"/>
			<path d="m57.81072,21.975c-4.48928,-4.5 -10.46786,-6.975 -16.82142,-6.975c-13.11429,0 -23.78571,10.67143 -23.78571,23.78571c0,4.18928 1.09286,8.28215 3.17143,11.89286l-3.375,12.32142l12.61072,-3.31072c3.47143,1.89642 7.38215,2.89286 11.36786,2.89286l0.01072,0c13.10358,0 24.01072,-10.67143 24.01072,-23.78571c0,-6.35357 -2.7,-12.32142 -7.18928,-16.82142l-0.00001,-0.00001l-0.00001,0l-0.00002,0.00001zm-16.82142,36.6c-3.55714,0 -7.03928,-0.95357 -10.07143,-2.75357l-0.71785,-0.42857l-7.47858,1.96072l1.99286,-7.29642l-0.47143,-0.75c-1.98215,-3.15 -3.02142,-6.78215 -3.02142,-10.52142c0,-10.89642 8.87143,-19.76786 19.77858,-19.76786c5.28215,0 10.24286,2.05714 13.97143,5.79642c3.72857,3.73928 6.02142,8.7 6.01072,13.98215c0,10.90714 -9.09642,19.77858 -19.99286,19.77858l0,-0.00002l-0.00001,0l-0.00001,-0.00001zm10.84286,-14.80714c-0.58928,-0.3 -3.51429,-1.73572 -4.06072,-1.92857c-0.54643,-0.20358 -0.94286,-0.3 -1.33928,0.3c-0.39642,0.6 -1.53214,1.92857 -1.88571,2.33572c-0.34286,0.39642 -0.69642,0.45 -1.28571,0.15c-3.49286,-1.74643 -5.78571,-3.11785 -8.08928,-7.07143c-0.61072,-1.05 0.61072,-0.975 1.74643,-3.24643c0.19286,-0.39642 0.09642,-0.73928 -0.05357,-1.03928c-0.15,-0.3 -1.33928,-3.225 -1.83214,-4.41429c-0.48215,-1.15714 -0.975,-0.99642 -1.33928,-1.01785c-0.34286,-0.02142 -0.73928,-0.02142 -1.13572,-0.02142c-0.39642,0 -1.03928,0.15 -1.58571,0.73928c-0.54643,0.6 -2.07858,2.03572 -2.07858,4.96072c0,2.925 2.13214,5.75357 2.42142,6.15c0.3,0.39642 4.18928,6.39642 10.15714,8.97858c3.77143,1.62857 5.25,1.76786 7.13572,1.48928c1.14643,-0.17143 3.51429,-1.43572 4.00714,-2.82857c0.49286,-1.39286 0.49286,-2.58215 0.34286,-2.82857c-0.13928,-0.26786 -0.53572,-0.41785 -1.125,-0.70714l-0.00001,-0.00001l0.00002,-0.00001l-0.00002,-0.00001z" fill="currentColor" id="svg_2"/>
			</g>
			</svg>
		</a>
	</div>
    
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
	
	<!--Start of Tawk.to Script-->
<script type="text/javascript">
	/*var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/652aa7feeb150b3fb9a1584c/1hcna0f50';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
	})();
	
	Tawk_API.onPrechatSubmit = function(data){
        //console.log(data);
        console.log(JSON.stringify(data, null, 2));
        var nombre = "";
        var email = "";
        var ciudad = "";
        var telefono = "";
        var nDocumento = "";
        data.forEach(datos => {
            //console.log(datos.answer);
            if(datos.label == "Nombre acudiente") {
                nombre = datos.answer;
            }
            else if(datos.label == "Correo electrónico acudiente") {
                email = datos.answer;
            }
            else if(datos.label == "Teléfono acudiente") {
                telefono = datos.answer;
            }
            else if(datos.label == "Ciudad acudiente") {
                ciudad = datos.answer;
            }
            else if(datos.label == "Número documento estudiante") {
                nDocumento = datos.answer;
				nDocumento = nDocumento.replaceAll('.', '');
				nDocumento = nDocumento.replaceAll(',', '');
				nDocumento = nDocumento.replaceAll(/[a-zA-Z\s]/g, '');
				console.log("4" + nDocumento);
            }
        });
        console.log(nombre + " - " + email + " - " + telefono + " - " + ciudad + " - " + nDocumento);
    };*/
</script>
<!--End of Tawk.to Script-->

</body>
</html>
