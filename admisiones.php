<?php
    include "admin-unicab/php/conexion.php";
    
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
	
	$sql_medio = "SELECT * FROM tbl_medios_llegada";
    $res_medio = mysqli_query($conexion, $sql_medio);
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
    
    <!--Nice Select css 
    <link rel="stylesheet" href="assets/vendor/nice-select/nice-select.css" media="all">-->
    
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
			$("#divcargando").css({display:'none'});
			
            $('form').submit(function(){
                //$("#divcargando").css({display:'block'});
                //sleep(5);
    			if($('input[type="text"]').val() == '' || $('input[type="email"]').val() == '' || $('input[type="number"]').val() == ''){
    				alert('Rellena todos los campos');
    				return false;
    			}
    		});
			
			$("#register_grado").change(function() {
        		let gra = $("#register_grado").val();
        		//let gra_permitido = $("#grado_permitido").val();
				let gra_permitido = 0;
        		let control = 0;
        		//alert(gra + " " + gra_permitido);
        		//$("#selperiodo").val("NA").change();
				//$("#ctr_selperiodo").val(1);
        		
        		
        		if(gra_permitido == 0 && control == 0) {
        		    //Se valida si hay cupo para el grado
            		/*if(gra == 4 || gra == 5 || gra == 6) {
            		    $("#ctr_register_grado").val("1");
            		    gra = 0;
            		    control = 1;
            		    var texto = "Ya no hay cupo para este grado.";
                        alert(texto);
                        $("#pdesc").html(texto).css("color","red");
            		}*/
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
			
			$("#register_medio").change(function() {
        		var medio = $("#register_medio").val();
        		
        		var control = 0;
        		//alert(td);
        		if(medio == "0") {
        			$("#btnEnviar").hide();
        			$("#ctr_register_medio").val(1);
        			var texto = "Debe seleccionar un medio de llegada";
                    $("#pdesc").html(texto).css("color","red");
        		}
        		else {
					//$("#btnEnviar").show();
					$("#ctr_register_medio").val(0);
					$("#pdesc").html("");        		    
        		}
        		mostrar_submit();
        	});
			
			$("#register_genero").change(function() {
        		var gen = $("#register_genero").val();
        		var control = 0;
        		//alert(td);
        		if(gen == 0) {
        			$("#btnEnviar").hide();
        			$("#ctr_register_genero").val(1);
        			var texto = "Debe seleccionar un género para la matrícula";
                    $("#pdesc").html(texto).css("color","red");
        		}
        		else {
        		    //$("#btnEnviar").show();
        		    $("#ctr_register_genero").val(0);
        		    $("#pdesc").html("");
        		}
        		mostrar_submit();
        	});
			
			$("#parentesco_acudiente_1").change(function() {
        		var parentesco = $("#parentesco_acudiente_1").val();
        		
        		var control = 0;
        		//alert(td);
        		if(parentesco == "NA") {
        			$("#btnEnviar").hide();
        			$("#ctr_parentesco_acudiente_1").val(1);
        			var texto = "Debe seleccionar un parentesco para el acudiente";
                    $("#pdesc").html(texto).css("color","red");
        		}
        		else {
        		    //$("#btnEnviar").show();
        		    $("#ctr_parentesco_acudiente_1").val(0);
        		    $("#pdesc").html("");
        		}
        		mostrar_submit();
        	});
			
			$(".datos").hide();
        });
        
        function validar_texto(id, desc) {
            var control = 0;
            var id_obj = "#" + id;
            var ctr_obj = "#ctr_" + id;
            //var input_desc = document.getElementById("desc");
            var v_input = document.getElementById(id);
            var v_val = /[-_'"\<\>\~\^\*\$\!\¡\#\%\&\¿\?\/\=\+\|,;:\(\)\{\}\[\]\\]{1,}/;
            var val = String($(id_obj).val()).match(v_val);
            if(val == null) {
                v_input.setCustomValidity("");
                $("#pdesc").html("");
                $(ctr_obj).val(0);
            }
            else {
                v_input.setCustomValidity("Ha ingresado caracteres inválidos");
                var texto = "Ha ingresado alguno de los siguientes caracteres no válidos para " + desc + ": ";
                texto += "- _ \' \" < > ~ ^ * $ ! ¡ # % & ¿ ? /= + , ; : ( ) { } [ ] \\";
                //alert(texto);
                $("#pdesc").html(texto).css("color","red");
                $(ctr_obj).val(1);
                control = 1;
            }
            
            if(control == 0) {
			    if($(id_obj).val() == "") {
			        var texto = "El campo " + desc + " se debe llenar";
    				$("#pdesc").html(texto).css("color","red");
                    $(ctr_obj).val(1);
			    }
			}
    			
            mostrar_submit();
        }
        
        function validar_texto1(id, desc) {
            var control = 0;
            var id_obj = "#" + id;
            var ctr_obj = "#ctr_" + id;
            //var input_desc = document.getElementById("desc");
            var v_input = document.getElementById(id);
            var v_val = /[_'"\<\>\~\^\*\$\!\¡\#\%\&\¿\?\/\=\+\|,;:\(\)\{\}\[\]\\]{1,}/;
            var val = String($(id_obj).val()).match(v_val);
            if(val == null) {
                v_input.setCustomValidity("");
                $("#pdesc").html("");
                $(ctr_obj).val(0);
            }
            else {
                v_input.setCustomValidity("Ha ingresado caracteres inválidos");
                var texto = "Ha ingresado alguno de los siguientes caracteres no válidos para " + desc + ": ";
                texto += "_ \' \" < > ~ ^ * $ ! ¡ # % & ¿ ? /= + , ; : ( ) { } [ ] \\";
                //alert(texto);
                $("#pdesc").html(texto).css("color","red");
                $(ctr_obj).val(1);
                control = 1;
            }
            
            if(control == 0) {
			    if($(id_obj).val() == "") {
			        var texto = "El campo " + desc + " se debe llenar";
    				$("#pdesc").html(texto).css("color","red");
                    $(ctr_obj).val(1);
			    }
			}
			
            mostrar_submit();
        }
        
        function validar_texto2(id, desc) {
            var control = 0;
            var id_obj = "#" + id;
            var ctr_obj = "#ctr_" + id;
            //var input_desc = document.getElementById("desc");
            var v_input = document.getElementById(id);
            var v_val = /[_'"\<\>\~\^\*\$\!\¡\#\%\&\¿\?\/\=\|,;:\(\)\{\}\[\]\\]{1,}/;
            var val = String($(id_obj).val()).match(v_val);
            if(val == null) {
                v_input.setCustomValidity("");
                $("#pdesc").html("");
                $(ctr_obj).val(0);
            }
            else {
                v_input.setCustomValidity("Ha ingresado caracteres inválidos");
                var texto = "Ha ingresado alguno de los siguientes caracteres no válidos para " + desc + ": ";
                texto += "_ \' \" < > ~ ^ * $ ! ¡ # % & ¿ ? /= , ; : ( ) { } [ ] \\";
                //alert(texto);
                $("#pdesc").html(texto).css("color","red");
                $(ctr_obj).val(1);
                control = 1;
            }
            
            if(control == 0) {
			    if($(id_obj).val() == "") {
			        var texto = "El campo " + desc + " se debe llenar";
    				$("#pdesc").html(texto).css("color","red");
                    $(ctr_obj).val(1);
			    }
			}
			
            mostrar_submit();
        }
        
        function validar_numero(id, desc) {
            var control = 0;
            var id_obj = "#" + id;
            var ctr_obj = "#ctr_" + id;
            var v_input = document.getElementById(id);
            var patron = /^[0-9]{1,}$/;
            //var val = String($(id_obj).val()).match(v_val);
            var esCoincidente = patron.test($(id_obj).val());
            //alert(esCoincidente);
            if(esCoincidente) {
                v_input.setCustomValidity("");
                $("#pdesc").html("");
                $(ctr_obj).val(0);
            }
            else {
                v_input.setCustomValidity("Ha ingresado caracteres inválidos");
                var texto = "Ingrese sólamente números para " + desc;
                //alert(texto);
                $("#pdesc").html(texto).css("color","red");
                $(ctr_obj).val(1);
                control = 1;
            }
            
            //Se valida si el campo es el número de documento
            if(id == "register_documento" && control == 1) {
                var contenido=$(".ghf");
                contenido.slideUp(250);
                var contenido1=$(".file-input");
                contenido1.slideUp(250);
                
                $("#msgdocumento").html("");
            }
            
            if(control == 0) {
			    if($(id_obj).val() == "") {
			        var texto = "El campo " + desc + " se debe llenar";
    				$("#pdesc").html(texto).css("color","red");
                    $(ctr_obj).val(1);
			    }
			}
			
            mostrar_submit();
        }
        
        function validar_email(id, desc) {
            var control = 0;
            var id_obj = "#" + id;
            var ctr_obj = "#ctr_" + id;
            var input_email = document.getElementById(id);
            var patron = /^[_-\w.]+@[a-z]+\.[a-z.]{2,6}$/;
            var esCoincidente = patron.test($(id_obj).val());
            if(esCoincidente) {
                input_email.setCustomValidity("");
                $("#pdesc").html("");
                $(ctr_obj).val(0);
            }
            else {
                input_email.setCustomValidity("No es un patrón de correo válido");
                var texto = "No es un patrón de correo válido para " + desc;
                //alert(texto);
                $("#pdesc").html(texto).css("color","red");
                $(ctr_obj).val(1);
                control = 1;
            }
            
            if(control == 0) {
			    if($(id_obj).val() == "") {
			        var texto = "El campo " + desc + " se debe llenar";
    				$("#pdesc").html(texto).css("color","red");
                    $(ctr_obj).val(1);
                    control = 1;
			    }
			}
			
			if(id == "register_email" || id == "register_email1") {
    			if($("#register_email").val() == $("#register_email1").val()) {
                    //$("#btnEnviar").show();
                }
                else {
                    var texto = "El email y la confirmación del email del estudiante deben ser iguales";
    				$("#pdesc").html(texto).css("color","red");
                }
			}
			else if(id == "register_correoA" || id == "register_correoA1") {
    			if($("#register_correoA").val() == $("#register_correoA1").val()) {
                    //$("#btnEnviar").show();
                }
                else {
                    var texto = "El email y la confirmación del email del acudiente deben ser iguales";
    				$("#pdesc").html(texto).css("color","red");
                }
			}
			
            mostrar_submit();
        }
        
        function validar_fecha(id, desc) {
            var control = 0;
            var id_obj = "#" + id;
            var ctr_obj = "#ctr_" + id;
            var input_email = document.getElementById(id);
            var patron = /^[0-9]{4}-[0-1]{1}[0-9]{1}-[0-3]{1}[0-9]{1}$/;
            var esCoincidente = patron.test($(id_obj).val());
            if(esCoincidente) {
                input_email.setCustomValidity("");
                $("#pdesc").html("");
                $(ctr_obj).val(0);
                
                var fecha = $(id_obj).val();
                var porciones = fecha.split("-");
                var a = parseInt(porciones[0]);
                var m = parseInt(porciones[1]);
                var d = parseInt(porciones[2]);
                
                if(a < 1850 || a > 2050) {
                    input_email.setCustomValidity("No es una fecha de nacimiento válida");
                    var texto = "No es un patrón válido para " + desc;
                    $("#pdesc").html(texto).css("color","red");
                    $(ctr_obj).val(1);
                }
                if(m < 1 || m > 12) {
                    input_email.setCustomValidity("No es una fecha de nacimiento válida");
                    var texto = "No es un patrón válido para " + desc;
                    $("#pdesc").html(texto).css("color","red");
                    $(ctr_obj).val(1);
                }
                else {
                    if(m == 2) {
                       if(d < 1 || d > 29) {
                            input_email.setCustomValidity("No es una fecha de nacimiento válida");
                            var texto = "No es un patrón válido para " + desc;
                            $("#pdesc").html(texto).css("color","red");
                            $(ctr_obj).val(1);
                        } 
                    }
                    else if(m == 4 || m == 6 || m == 9 || m == 11) {
                       if(d < 1 || d > 30) {
                            input_email.setCustomValidity("No es una fecha de nacimiento válida");
                            var texto = "No es un patrón válido para " + desc;
                            $("#pdesc").html(texto).css("color","red");
                            $(ctr_obj).val(1);
                        } 
                    }
                    else {
                       if(d < 1 || d > 31) {
                            input_email.setCustomValidity("No es una fecha de nacimiento válida");
                            var texto = "No es un patrón válido para " + desc;
                            $("#pdesc").html(texto).css("color","red");
                            $(ctr_obj).val(1);
                        } 
                    }
                }
                
            }
            else {
                input_email.setCustomValidity("No es una fecha de nacimiento válida");
                var texto = "No es un patrón válido para " + desc;
                //alert(texto);
                $("#pdesc").html(texto).css("color","red");
                $(ctr_obj).val(1);
                control = 1;
            }
            mostrar_submit();
        }
        
        function mostrar_submit() {
			//Se valida si algún correo es de hotmail para impedir continuar
			var correo_a = $("#register_correoA").val();
			
			if (correo_a.includes('hotmail')) {
				var texto = "Hemos detectado incovenientes con los correos de hotmail. Por favor ingresar otro correo de acudiente.";
				$("#pdesc").html(texto).css("color","red");
				$("#btnEnviar").hide();
				return;
			}
			
            var control = 0;
            var control1 = 0;
            var a0 = parseInt($("#ctr_register_documentoe").val());
			var a = parseInt($("#ctr_register_apellidos").val());
            var b = parseInt($("#ctr_register_nombres").val());
            var c = parseInt($("#ctr_register_grado").val());
            var d = parseInt($("#ctr_register_tipo_documento").val());
            var e = parseInt($("#ctr_register_telefono").val());
            //var f = parseInt($("#ctr_register_email").val());
            //var g = parseInt($("#ctr_register_email1").val());
            //var h = parseInt($("#ctr_register_rh").val());
			var i = parseInt($("#ctr_register_medio").val());
			var j = parseInt($("#ctr_activiadad_extra").val());
			var j1 = parseInt($("#ctr_register_genero").val());
			//var k = parseInt($("#ctr_situacion").val());
            //alert(h);
            
            var l = parseInt($("#ctr_register_nombreA").val());
            var m = parseInt($("#ctr_register_documentoA").val());
            var n = parseInt($("#ctr_register_direccionA").val());
            var o = parseInt($("#ctr_register_celularA").val());
            var p = parseInt($("#ctr_register_correoA").val());
            var q = parseInt($("#ctr_register_correoA1").val());
            var r = parseInt($("#ctr_parentesco_acudiente_1").val());
			var s = parseInt($("#ctr_register_ciudada").val());
            //console.log("a " + a + " b " + b + " c " + c + " d " + d + " e " + e + " f " + f + " g " + g + " h " + h + " i " + i + " j " + j + " k " + k);
			//console.log("l " + l + " m " + m + " n " + n + " o " + o + " p " + p + " q " + q + " r " + r);
            
            control = parseInt($("#ctr_register_documentoe").val()) + parseInt($("#ctr_register_apellidos").val()) + parseInt($("#ctr_register_nombres").val()) +  
                parseInt($("#ctr_register_grado").val()) + parseInt($("#ctr_register_tipo_documento").val()) + parseInt($("#ctr_register_telefono").val()) + 
                parseInt($("#ctr_register_medio").val()) + parseInt($("#ctr_activiadad_extra").val()) + parseInt($("#ctr_register_genero").val()) + 
				parseInt($("#ctr_register_nombreA").val()) + parseInt($("#ctr_register_documentoA").val()) + 
                parseInt($("#ctr_register_direccionA").val()) + parseInt($("#ctr_register_celularA").val()) + parseInt($("#ctr_register_correoA").val()) +
                parseInt($("#ctr_register_correoA1").val()) +  parseInt($("#ctr_parentesco_acudiente_1").val()) +  parseInt($("#ctr_register_ciudada").val());
            
            //console.log("control: " + control);
			//console.log("ctr_register_nombreA: " + $("#ctr_register_nombreA").val());
            if(control > 0) {
                $("#btnEnviar").hide();
            }
            else {
                //alert("email=" + $("#register_email").val() + " email1=" + $("#register_email1").val());
                if(control1 == 0) {
                    if($("#register_correoA").val() == $("#register_correoA1").val()) {
                        $("#btnEnviar").show();
                    }
                    else {
                        var texto = "El email y la confirmación del email del acudiente deben ser iguales";
        				$("#pdesc").html(texto).css("color","red");
        				$("#btnEnviar").hide();
                    }
                }
            }
            
            (a0 == 1) ? $("#register_documentoe").addClass("error") : $("#register_documentoe").removeClass("error");
			(a == 1) ? $("#register_apellidos").addClass("error") : $("#register_apellidos").removeClass("error");
            (b == 1) ? $("#register_nombres").addClass("error") : $("#register_nombres").removeClass("error");
            (c == 1) ? $("#register_grado").addClass("error") : $("#register_grado").removeClass("error");
            //(c == 1) ? $("#lblgrado").addClass("error") : $("#lblgrado").removeClass("error");
            (d == 1) ? $("#register_tipo_documento").addClass("error") : $("#register_tipo_documento").removeClass("error");
            //(d == 1) ? $("#lbltd").addClass("error") : $("#lbltd").removeClass("error");
            (e == 1) ? $("#register_telefono").addClass("error") : $("#register_telefono").removeClass("error");
            //(f == 1) ? $("#register_email").addClass("error") : $("#register_email").removeClass("error");
            //(g == 1) ? $("#register_email1").addClass("error") : $("#register_email1").removeClass("error");
			//(h == 1) ? $("#register_rh").addClass("error") : $("#register_rh").removeClass("error");
			(i == 1) ? $("#register_medio").addClass("error") : $("#register_medio").removeClass("error");
			(j == 1) ? $("#activiadad_extra").addClass("error") : $("#activiadad_extra").removeClass("error");
			(j1 == 1) ? $("#register_genero").addClass("error") : $("#register_genero").removeClass("error");
			//(k == 1) ? $("#situacion").addClass("error") : $("#situacion").removeClass("error");
            
            (l == 1) ? $("#register_nombreA").addClass("error") : $("#register_nombreA").removeClass("error");
            (m == 1) ? $("#register_documentoA").addClass("error") : $("#register_documentoA").removeClass("error");
            (n == 1) ? $("#register_direccionA").addClass("error") : $("#register_direccionA").removeClass("error");
            (o == 1) ? $("#register_celularA").addClass("error") : $("#register_celularA").removeClass("error");
            (p == 1) ? $("#register_correoA").addClass("error") : $("#register_correoA").removeClass("error");
            (q == 1) ? $("#register_correoA1").addClass("error") : $("#register_correoA1").removeClass("error");
            (r == 1) ? $("#parentesco_acudiente_1").addClass("error") : $("#parentesco_acudiente_1").removeClass("error");
			//(r == 1) ? $("#lblparentesco").addClass("error") : $("#lblparentesco").removeClass("error");
			(s == 1) ? $("#register_ciudada").addClass("error") : $("#register_ciudada").removeClass("error");
        }
        
        function val_documento() {
			$("#divcargando").css({display:'block'});
			
            //alert("hola");
			$(".datos").hide();
			$("#msgdocumento").html("");
			$("#estnuevo").val("NO");
			$("#btnEnviar").hide();
			$("#register_documentoe_f").val("");
            
            //Se ponen los control de los controles en 1
            $("#ctr_register_nombres").val(1);
			$("#ctr_register_apellidos").val(1);
			$("#crt_register_grado").val(1);
			$("#ctr_register_tipo_documento").val(1);
			$("#ctr_register_telefono").val(1);
			$("#ctr_register_medio").val(1);
			$("#ctr_activiadad_extra").val(1);
			$("#ctr_register_genero").val(1);
			
            $("#ctr_register_nombreA").val(1);
            $("#ctr_register_documentoA").val(1);
            $("#ctr_register_direccionA").val(1);
            $("#ctr_register_celularA").val(1);
            $("#ctr_register_correoA").val(1);
            $("#ctr_register_correoA1").val(1);
			$("#ctr_parentesco_acudiente_1").val(1);
			$("#ctr_register_ciudada").val(1);
            
            //Se limpian lo cuadros de texto
            $("#register_nombres").val("");
			$("#register_apellidos").val("");
			$("#register_grado").val(0);
			$('#register_grado').change();
			$("#register_tipo_documento").val(0);
			$('#register_tipo_documento').change();
			$("#register_telefono").val("");
			$("#register_medio").val(0);
			$('#register_medio').change();
			$("#activiadad_extra").val("");
			$("#register_genero").val(0);
			$("#register_genero").change();
			
            $("#register_nombreA").val("");
            $("#register_documentoA").val("");
            $("#register_direccionA").val("");
            $("#register_celularA").val("");
            $("#register_correoA").val("");
            $("#register_correoA1").val("");
			$("#parentesco_acudiente_1").val("NA");
			$('#parentesco_acudiente_1').change();
			$("#register_ciudada").val("");
			
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
			
                //alert("ajax");
                $.ajax({
            		type:"POST",
            		url:"registro_matricula_0.php",
            		data:"documento=" + doc,
            		success:function(r) {
            		    var res = JSON.parse(r);
            		    //alert(res.estado);
						var control_matricula = 0;
            		    var r_est = res.estado;
            		    
            		    $("#register_estado").val(r_est);
						
						//################################### OJO ############################
						/*if(res.validar_extemporaneidad == "SI") {
							if(res.solicitud_matricula_escrita == "NO") {
								control_matricula = 1;
								$("#msgdocumento").html("Este documento no ha enviado solicitud de matrícula por escrito");
							}							
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
						}*/ 
						//################################### OJO ############################						
                        
						//Se valida si ya tiene un proceso de pre matrícula abierto
						if(res.procesoAbierto == "SI") {
							control_matricula = 1;
							$("#pdesc").html("");
							if(res.programoEntrevista == "SI") {
								$("#msgdocumento").html("Este documento ya tiene un proceso de entrevista abierto. Verificar el email " + res.emailA + " para revisar la información que se envío de la entrevista.");
							}
							else {
								$("#msgdocumento").html("Este documento ya tiene un proceso de entrevista abierto. Verificar el email " + res.emailA + " para revisar la información que se le enviará de la entrevista.");
							}							
						}
						
						if(control_matricula == 0) {
							$("#pdesc").html("");
							if(r_est == "activo") {
								var r_grado = res.grados[0].gra;
								//alert(r_grado);
								var r_idgrado = res.grados[0].id_gra;
								
								//$("#msgdocumento").html("Este documento se encuentra activo en el grado " + r_grado + ".");
								$("#msgdocumento").html("Este documento se encuentra activo en el grado " + r_grado + ". El proceso de entrevista es solo para estudiantes nuevos.");
							}
							else if(r_est == "solicitud" || r_est == "pre_solicitud") {
								var r_grado = res.grados[0].gra;
								//alert(r_grado);
								var r_idgrado = res.grados[0].id_gra;
								
								//$("#msgdocumento").html("Este documento ya tiene una solicitud de matrícula en el grado " + r_grado + ".");
								$("#msgdocumento").html("Este documento ya tiene una solicitud de matrícula en el grado " + r_grado + ". El proceso de entrevista es solo para estudiantes nuevos.");
							}
							else if(r_est == "reprobado") {
								var r_grado = res.grados[0].gra;
								//alert(r_grado);
								var r_idgrado = res.grados[0].id_gra;
								
								//$("#msgdocumento").html("Estudiante antiguo, puede iniciar proceso de matícula para el grado " + r_grado + ".");
								$("#msgdocumento").html("Estudiante antiguo, el proceso de entrevista es solo para estudiantes nuevos.");
							}
							else if(r_est == "aprobado") {
								var r_grado = res.grados[0].gra;
								var r_idgrado = res.grados[0].id_gra;
								
								//$("#msgdocumento").html("Estudiante antiguo, puede empezar proceso de matrícula para el grado " + r_grado + ".");
								$("#msgdocumento").html("Estudiante antiguo, el proceso de entrevista es solo para estudiantes nuevos.");
							}
							else if(r_est == "retirado") {
								$("#msgdocumento").html("Este documento se encuentra Retirado. Comunícate con Secretaría Académica.");
							}
							else if(r_est == "nuevo") { //Así estaba if(r_est == "nuevo" && res.cod_ent != 0)
								//$("#msgdocumento").html("Documento nuevo, puede empezar proceso de matrícula.");
								$("#estnuevo").val("SI");
								$("#register_documentoe_f").val(doc);
								$(".datos").show();
								$(".btnContinuar").hide();
								$("#btnEnviar").hide();
								$("#divcargando").css({display:'none'});
								mostrar_submit();
								$("#pdesc").html("");
								
								//Se cargan los datos si existen
								if (res.control_antiguos == "2") {
									$("#register_nombres").val(res.nombres);
									$("#register_apellidos").val(res.apellidos);
									//$("#register_grado").val(0);
									//$('#register_grado').change();
									$("#register_tipo_documento").val(res.id_tdoc);
									$('#register_tipo_documento').change();
									$("#register_telefono").val(res.tel);
									//$("#register_medio").val(0);
									//$('#register_medio').change();
									$("#activiadad_extra").val(res.actividad_extra);
									$("#register_genero").val(res.genero);
									$("#register_genero").change();
									
									$("#register_nombreA").val(res.acudiente);
									$("#register_documentoA").val(res.documento_responsable);
									$("#register_direccionA").val(res.direccion);
									$("#register_celularA").val(res.telA);
									$("#register_correoA").val(res.emailA);
									$("#register_correoA1").val(res.emailA);
									$("#parentesco_acudiente_1").val(res.parentesco_acudiente_1);
									$('#parentesco_acudiente_1').change();
									$("#register_ciudada").val(res.ciudadA);
									
									//Se ponen los control de los controles en 0
									$("#ctr_register_nombres").val(0);
									$("#ctr_register_apellidos").val(0);
									//$("#crt_register_grado").val(1);
									$("#ctr_register_tipo_documento").val(0);
									$("#ctr_register_telefono").val(0);
									//$("#ctr_register_medio").val(1);
									$("#ctr_activiadad_extra").val(0);
									$("#ctr_register_genero").val(0);
									
									$("#ctr_register_nombreA").val(0);
									$("#ctr_register_documentoA").val(0);
									$("#ctr_register_direccionA").val(0);
									$("#ctr_register_celularA").val(0);
									$("#ctr_register_correoA").val(0);
									$("#ctr_register_correoA1").val(0);
									$("#ctr_parentesco_acudiente_1").val(0);
									$("#ctr_register_ciudada").val(0);
									
									mostrar_submit();
								}
								
							}
							else if(r_est == "inactivo") {
								$("#msgdocumento").html("Este documento se encuentra inactivo en este momento. Comunícate con Secretaría Académica.");
							}
							else {
								$("#msgdocumento").html("No se pudo procesar la solicitud de matrícula para éste documento. Comunícate con Secretaría Académica.");
							}
						}
            		    
						$("#divcargando").css({display:'none'});
						//mostrar_submit();						
            		}
            	});				
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
        
        function mayus(e, id, desc) {
            e.value = e.value.toUpperCase();
            if(id == "register_direccion") {
                validar_texto1(id, desc);
            }
            else if(id == "register_actividad") {
                validar_texto1(id, desc);
            }
            else if(id == 'register_direccionA') {
                validar_texto1(id, desc);
            }
            else if(id == 'register_rh') {
                validar_texto2(id, desc);
            }
            else {
                validar_texto(id, desc);
            }
        }
		
		function prueba() {
			$('#exampleModalScrollable').modal('toggle');
            $('#exampleModalScrollable').modal('show');
		}
		
		function limpiar() {
			$(".datos").hide();
			$("#msgdocumento").html("");
			$("#estnuevo").val("NO");
			$(".btnContinuar").show();
			$("#btnEnviar").hide();
			$("#register_documentoe_f").val("");
			
			//Se ponen los control de los controles en 1
            $("#ctr_register_nombres").val(1);
			$("#ctr_register_apellidos").val(1);
			$("#crt_register_grado").val(1);
			$("#ctr_register_tipo_documento").val(1);
			$("#ctr_register_telefono").val(1);
			$("#ctr_register_medio").val(1);
			$("#ctr_activiadad_extra").val(1);
			$("#ctr_register_genero").val(1);
			
            $("#ctr_register_nombreA").val(1);
            $("#ctr_register_documentoA").val(1);
            $("#ctr_register_direccionA").val(1);
            $("#ctr_register_celularA").val(1);
            $("#ctr_register_correoA").val(1);
            $("#ctr_register_correoA1").val(1);
			$("#ctr_parentesco_acudiente_1").val(1);
			$("#ctr_register_ciudada").val(1);
            
            //Se limpian lo cuadros de texto
            $("#register_nombres").val("");
			$("#register_apellidos").val("");
			$("#register_grado").val(0);
			$('#register_grado').change();
			$("#register_tipo_documento").val(0);
			$('#register_tipo_documento').change();
			$("#register_telefono").val("");
			$("#register_medio").val(0);
			$('#register_medio').change();
			$("#activiadad_extra").val("");
			$("#register_genero").val(0);
			$("#register_genero").change();
			
            $("#register_nombreA").val("");
            $("#register_documentoA").val("");
            $("#register_direccionA").val("");
            $("#register_celularA").val("");
            $("#register_correoA").val("");
            $("#register_correoA1").val("");
			$("#parentesco_acudiente_1").val("NA");
			$('#parentesco_acudiente_1').change();
			$("#register_ciudada").val("");
			
			$("#pdesc").html("");
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
            /*border: 3px solid red !important;*/
			background: #FBE5E7;
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
		.btnContinuar, .btnEnviar {
			border: none;
			background: transparent;
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
		.amarillo {
			background: #FFD156;
			color: #FFD156;
		}
		.azuloscuro {
			background: #16224F;
			color: white;
			font-weight: bold;
			display: table;
			height:50px;
		}
		.azuloscuro h6 {
			display: table-cell;
			vertical-align: middle;
		}
		.form-select {
			appearance: none !important;
			background-image: url("assets/img/admisiones/select_Icon2.png") !important;
			background-repeat: no-repeat;
			background-position: right center;
			min-height: 40px !important;
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
		.icono {
			width: 50%;
		}
		.icono1 {
			width: 15%;
		}
		input[type="text"], .select {
			border-radius: 15px !important;
			border: 2px solid #42C3AE;
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
	
	<div class="container datosEstudiante">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-2 amarillo">
					<h6>Paso 1</h6>
				</div>
				<div class="col-md-1 col-1 azuloscuro">
					<h6>Paso 1.</h6>
				</div>
				<div class="col-md-9 col-9 azuloscuro">
					<h6>Ingresa los siguientes datos para iniciar el proceso de matrícula en nuestro colegio UNICAB Virtual.</h6>
				</div>
			</div>
			<br>
		</div>		
	</div><br>
	
	<div class="container datosEstudiante">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-5"></div>
				<div class="col-md-2 col-2">
					<center>
						<img src="assets/img/admisiones/ico1_admisiones_2025_1.jpg" id="imgh1" class="icono img-fluid"/>
					</center>
				</div>
				<div class="col-md-5 col-5"></div>
			</div><br>
			<div class="row">
				<div class="col-md-4 col-4"></div>
				<div class="col-md-4 col-4">
					<center>
						<div class="form-group">
							<label for="register_documentoe">Escribe el número documento estudiante y luego haz clic en Continua con el proceso!</label>
							<input type="text" class="form-control" id="register_documentoe" name="register_documentoe" placeholder="Escribe el número de documento del estudiante" onkeyup="validar_numero('register_documentoe', 'Número documento estudiante');" onBlur="limpiar();">
							<input type="hidden" style="width: 20px" id="ctr_register_documentoe" value="1"/>
						</div>
					</center>
				</div>
				<div class="col-md-4 col-4"></div>
			</div>
			<div class="row">
				<div class="col-md-2 col-2"></div>
				<div class="col-md-8 col-8">
					<h6 id="msgdocumento" style="color: blue;"></h6>
				</div>				
				<div class="col-md-2 col-2"></div>
			</div><br>
			<div class="row">
				<div class="col-md-4 col-4"></div>
				<div class="col-md-4 col-4">
					<div class="form-group">
						<center>
							<button type="button" class="btnContinuar" onclick="val_documento();">
								<img src="assets/img/admisiones/continua_proceso_1.jpg" id="sig1" class="img-fluid"/>
							</button>
						</center>
					</div>
				</div>
				<div class="col-md-4 col-4"></div>
			</div><br>
			<div id="divcargando" class="loader">
				<center><p><img src="assets/img/loading1.gif" alt="" class="img-fluid"/></p></center>
			</div>
		</div>		
	</div><br>
	
	<div class="container datos">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-2 amarillo">
					<h6>Paso 2</h6>
				</div>
				<div class="col-md-1 col-1 azuloscuro">
					<h6>Paso 2.</h6>
				</div>
				<div class="col-md-9 col-9 azuloscuro">
					<h6>Datos complementarios del estudiante.</h6>
				</div>
			</div>
			<br>
		</div>		
	</div><br>
	
	<div class="container datos">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-5"></div>
				<div class="col-md-2 col-2">
					<center>
						<img src="assets/img/admisiones/ico2_admisiones_2025_1.jpg" id="imgh1" class="icono img-fluid"/>
					</center>
				</div>
				<div class="col-md-5 col-5"></div>
			</div>
		</div>		
	</div><br>
	
	<div class="container datos">
		<form name="formulario" id="formulario" method="post" action="registro_inicial_putdat.php" enctype="multipart/form-data">
			<input type="hidden" id="register_documentoe_f" name="register_documentoe_f" required>
			<input type="hidden" id="estnuevo" name="estnuevo">
			
			<div class="row ml-5">
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_apellidos">Apellidos</label>
						<input type="text" class="form-control" id="register_apellidos" name="register_apellidos" placeholder="Escribe los apellidos del estudiante" required onkeyup="mayus(this, 'register_apellidos', 'Apellidos');">
						<input type="hidden" style="width: 20px" id="ctr_register_apellidos" value="1"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_nombres">Nombres</label>
						<input type="text" class="form-control" id="register_nombres" name="register_nombres" required placeholder="Escribe los nombres del estudiante" onkeyup="mayus(this, 'register_nombres', 'Nombres');">
						<input type="hidden" style="width: 20px" id="ctr_register_nombres" value="1"/>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">                                                        	
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_grado" id="lblgrado">Selecciona el grado a que ingresas</label><br>
						<select class="form-control form-select snormal select" id="register_grado" name="register_grado" required>
							<option value="0" selected>Seleccione grado</option>
							<?php
								while ($row = mysqli_fetch_array($petecion)) {
									echo '<option value="'.$row['id'].'">'.$row['grado'].'</option>';
								}
							?>
						</select>
						<input type="hidden" style="width: 20px" id="ctr_register_grado" value="1"/> 
						<input type="hidden" id="grado_permitido" value="0"/>
					</div>
				</div>
				<div class="col-1">
				</div>			
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_tipo_documento" id="lbltd">Tipo de documento de identidad</label><br>
						<select class="form-control form-select form-control-lg snormal select" id="register_tipo_documento" name="register_tipo_documento" required>
							<option value="0" selected>Seleccione tipo documento</option>
							<?php
								while ($row1 = mysqli_fetch_array($petecion1)) {
									echo '<option value="'.$row1['id'].'">'.$row1['tipo_documento'].'</option>';
								}
							?>
						</select>
						<input type="hidden" style="width: 20px" id="ctr_register_tipo_documento" value="1"/> 
						<input type="hidden" id="td_text" name="td_text"/>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_telefono">Número telefónico</label>
						<input type="text" class="form-control" id="register_telefono" name="register_telefono" required placeholder="Escribe el número telefónico del estudiante sin espacios" onkeyup="validar_numero('register_telefono', 'Número telefónico');">
						<input type="hidden" style="width: 20px" id="ctr_register_telefono" value="1"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_grado" id="lblgrado">Selecciona el medio de llegada</label><br>
						<select class="form-control form-select snormal select" id="register_medio" name="register_medio" requiered>
							<option value="0" selected>Seleccione medio</option>
							<?php
								while ($row_medio = mysqli_fetch_array($res_medio)) {
									echo '<option value="'.$row_medio['id'].'">'.$row_medio['medio'].'</option>';
								}
							?>
						</select>
						<input type="hidden" style="width: 20px" id="ctr_register_medio" value="1"/>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_genero" id="lblgen">Género</label><br>
						<select class="form-control form-select snormal select" id="register_genero" name="register_genero" required>
							<option value="0" selected>Seleccione género</option>
							<option value="MASCULINO">MASCULINO</option>
							<option value="FEMENINO">FEMENINO</option>
						</select>
						<input type="hidden" style="width: 20px" id="ctr_register_genero" value="1"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="">Actividad extra</label>
						<input type="text" class="form-control" id="activiadad_extra" name="activiadad_extra" required placeholder="Escribe la actividad extra del estudiante" onkeyup="mayus(this, 'activiadad_extra', 'Actividad extra');">
						<input type="hidden" style="width: 20px" id="ctr_activiadad_extra" value="1"/>
					</div>
				</div>
			</div><br>
			
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-2 amarillo">
						<h6>Paso 3</h6>
					</div>
					<div class="col-md-1 col-1 azuloscuro">
						<h6>Paso 3.</h6>
					</div>
					<div class="col-md-9 col-9 azuloscuro">
						<h6>Datos complementarios del acudiente.</h6>
					</div>
				</div>
				<br>
			</div><br>
			
			<div class="row ml-5">
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_apellidosA">Nombre</label>
						<input type="text" class="form-control" id="register_nombreA" name="register_nombreA" placeholder="Escribe el nombre del acudiente" required onkeyup="mayus(this, 'register_nombreA', 'Nombre acudiente');">
						<input type="hidden" style="width: 20px" id="ctr_register_nombreA" value="1"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_docuentoA">Documento</label>
						<input type="text" class="form-control" id="register_documentoA" name="register_documentoA" placeholder="Escribe el número de documento del acudiente sin puntos" required onkeyup="validar_numero('register_documentoA', 'Documento acudiente');">
						<input type="hidden" style="width: 20px" id="ctr_register_documentoA" value="1"/>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_direccionA">Dirección de residencia</label>
						<input type="text" class="form-control" id="register_direccionA" name="register_direccionA" placeholder="Escribe la dirección del acudiente" required onkeyup="mayus(this, 'register_direccionA', 'Direccion de residencia acudiente');">
						<input type="hidden" style="width: 20px" id="ctr_register_direccionA" value="1"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_celularA">Celular</label>
						<input type="text" class="form-control" id="register_celularA" name="register_celularA" placeholder="Escribe el número de celular del acudiente sin espacios" required onkeyup="validar_numero('register_celularA', 'Celular acudiente');">
						<input type="hidden" style="width: 20px" id="ctr_register_celularA" value="1"/>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_correoA">Correo electrónico acudiente (al cual llegará la factura electrónica)</label>
						<input type="text" class="form-control" id="register_correoA" name="register_correoA" placeholder="Escribe el correo electrónico del acudiente" required onkeyup="validar_email('register_correoA', 'Correo electrónico acudiente');">
						<input type="hidden" style="width: 20px" id="ctr_register_correoA" value="1"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_correoA1">Confirmar correo electrónico acudiente</label>
						<input type="text" class="form-control" id="register_correoA1" name="register_correoA1" required placeholder="Escribe el correo electrónico del acudiente" onkeyup="validar_email('register_correoA1', 'Confirmar correo electrónico acudiente');">
						<input type="hidden" style="width: 20px" id="ctr_register_correoA1" value="1"/>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">                                                        	
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="parentesco_acudiente_1" id="lblparentesco">Parentesco</label>
						<select id="parentesco_acudiente_1" name="parentesco_acudiente_1" class="form-control form-select snormal select">
							<option value="NA">Seleccione Parentesco</option>
							<option value="MADRE">MADRE</option>
							<option value="PADRE">PADRE</option>
							<option value="ABUELA">ABUELA</option>
							<option value="ABUELO">ABUELO</option>
							<option value="HERMANA">HERMANA</option>
							<option value="HERMANO">HERMANO</option>
							<option value="TIA">TIA</option>
							<option value="TIO">TIO</option>
							<option value="PRIMA">PRIMA</option>
							<option value="PRIMO">PRIMO</option>
							<option value="OTRO">OTRO</option>
						</select>
						<input type="hidden" style="width: 20px" id="ctr_parentesco_acudiente_1" value="1"/> 
					</div>
				</div>
				<div class="col-1">
				</div>			
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_nombres">Ciudad acudiente</label>
						<input type="text" class="form-control" id="register_ciudada" name="register_ciudada" required placeholder="Escribe la ciudad del acudiente" onkeyup="mayus(this, 'register_ciudada', 'Ciudad acudiente');">
						<input type="hidden" style="width: 20px" id="ctr_register_ciudada" value="1"/>
					</div>
				</div>
			</div>
			
			<br>
			<div class="row ml-5">                                                        	
				<div class="col-md-4 col-4"></div>
				<div class="col-md-4 col-4">
					<div class="form-group">
						<center>
							<button type="submit" id="btnEnviar" class="btnEnviar">
								<img src="assets/img/admisiones/enviar_1.jpg" id="sig1" class="img-fluid"/>
							</button>
						</center>
					</div>
				</div>
				<div class="col-md-4 col-4"></div>
			</div>
			<input type="hidden" value="<?php echo $documento; ?>" id="register_documento" name="register_documento"/>
			
		</form><br>		
	</div>
	
	<div class="alert alert-danger" role="alert" id="alert" style="margin-left: 5rem;">
		<p><i class="fa fa-warning"></i><span>: </span><label id="pdesc"></label>
		<input type="text" class="alert alert-danger" style="width: 20px" id="txtvacio" value="0"></p>
	</div>
	
	<!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Consultando documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <!--<div id="divcargando" class="loader">
					<center><p><img src="assets/img/loading1.gif" alt="" class="img-fluid"/></p></center>
				</div>-->
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
    
    <!--Nice Select 
    <script src="assets/vendor/nice-select/jquery.nice-select.js"></script>-->
    
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
	<!--<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
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
			
			/*$.ajax({
				type:"POST",
				url:"registro_inicial_putdat.php",
				data:"nombrea=" + nombre + "&emaila=" + email + "&telefonoa=" + telefono + "&ciudada=" + ciudad + "&documentoe=" + nDocumento,
				success:function(r) {
					//alert(r); 
				}
			});*/
		};
	</script>-->
	<!--End of Tawk.to Script-->

</body>
</html>
