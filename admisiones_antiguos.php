<?php
    include "admin-unicab/php/conexion.php";
	
	$documento = $_REQUEST["documento"];
    
    $sql = "SELECT * FROM grados WHERE id > 1";
	//echo $sql;
	$petecion=mysqli_query($conexion,$sql);
	
	$sqltd = "SELECT * FROM tbl_tipos_documento";
	$petecion1=mysqli_query($conexion,$sqltd);
	
	$sql_medio = "SELECT * FROM tbl_medios_llegada";
    $res_medio = mysqli_query($conexion, $sql_medio);
	
?>
<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
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
			val_documento();
			
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
        		$("#selperiodo").val("NA").change();
				$("#ctr_selperiodo").val(1);
        		
        		
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
        			$("#btnEnviar").attr("disabled", "disabled");
        			$("#ctr_register_grado").val(1);
        			var texto = "Debe seleccionar un grado para la matrícula";
                    $("#pdesc").html(texto).css("color","red");
        		}
        		else if(gra == 0 && control == 1) {
        			$("#btnEnviar").attr("disabled", "disabled");
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
        			$("#btnEnviar").attr("disabled", "disabled");
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
			
			$("#parentesco_acudiente_1").change(function() {
        		var parentesco = $("#parentesco_acudiente_1").val();
        		
        		var control = 0;
        		//alert(td);
        		if(parentesco == "NA") {
        			$("#btnEnviar").attr("disabled", "disabled");
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
			
			$("#selperiodo").change(function() {
        		var periodo = $("#selperiodo").val();
        		
        		var control = 0;
        		//alert(td);
        		if(periodo == "NA") {
        			$("#btnEnviar").attr("disabled", "disabled");
        			$("#ctr_selperiodo").val(1);
        			var texto = "Debe seleccionar un periodo de ingreso";
                    $("#pdesc").html(texto).css("color","red");
        		}
        		else {
					var gra = $("#register_grado").val();
					if(periodo == 3 && (gra == 17 || gra == 18)) {
						$("#btnEnviar").attr("disabled", "disabled");
						$("#ctr_selperiodo").val(1);
						var texto = "Para Ciclos V y VI sólo se permite periodo 1 o 2";
						$("#pdesc").html(texto).css("color","red");
					}
					else {
						//$("#btnEnviar").show();
						$("#ctr_selperiodo").val(0);
						$("#pdesc").html("");
					}
        		    
        		}
        		mostrar_submit();
        	});
			
			$("#register_genero").change(function() {
        		var gen = $("#register_genero").val();
        		var control = 0;
        		//alert(td);
        		if(gen == 0) {
        			$("#btnEnviar").attr("disabled", "disabled");
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
			
			$("#register_medio").change(function() {
        		var medio = $("#register_medio").val();
        		
        		var control = 0;
        		//alert(td);
        		if(medio == "0") {
        			$("#btnEnviar").attr("disabled", "disabled");
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
			var correo_e = $("#register_email1").val();
			var correo_a = $("#register_correoA").val();
			
			if (correo_e.includes('hotmail')) {
				var texto = "Hemos detectado incovenientes con los correos de hotmail. Por favor ingresar otro correo de estudiante.";
				$("#pdesc").html(texto).css("color","red");
				$("#btnEnviar").attr("disabled", "disabled");
				return;
			}
			
			if (correo_a.includes('hotmail')) {
				var texto = "Hemos detectado incovenientes con los correos de hotmail. Por favor ingresar otro correo de acudiente.";
				$("#pdesc").html(texto).css("color","red");
				$("#btnEnviar").attr("disabled", "disabled");
				return;
			}
			
            var control = 0;
            var control1 = 0;
            var a = parseInt($("#ctr_register_apellidos").val());
            var b = parseInt($("#ctr_register_nombres").val());
            var c = parseInt($("#ctr_register_grado").val());
            var d = parseInt($("#ctr_register_tipo_documento").val());
            var e = parseInt($("#ctr_register_telefono").val());
            var f = parseInt($("#ctr_register_email").val());
            var g = parseInt($("#ctr_register_email1").val());
            var h = parseInt($("#ctr_register_rh").val());
			var i = parseInt($("#ctr_register_medio").val());
			var j = parseInt($("#ctr_activiadad_extra").val());
			var j1 = parseInt($("#ctr_register_genero").val());
			var k = parseInt($("#ctr_situacion").val());
            //alert(h);
            
            var l = parseInt($("#ctr_register_nombreA").val());
            var m = parseInt($("#ctr_register_documentoA").val());
            var n = parseInt($("#ctr_register_direccionA").val());
            var o = parseInt($("#ctr_register_celularA").val());
            var p = parseInt($("#ctr_register_correoA").val());
            var q = parseInt($("#ctr_register_correoA1").val());
            var r = parseInt($("#ctr_parentesco_acudiente_1").val());
            //console.log("a " + a + " b " + b + " c " + c + " d " + d + " e " + e + " f " + f + " g " + g + " h " + h + " i " + i + " j " + j + " k " + k);
			//console.log("l " + l + " m " + m + " n " + n + " o " + o + " p " + p + " q " + q + " r " + r);
            
            control = parseInt($("#ctr_register_apellidos").val()) + parseInt($("#ctr_register_nombres").val()) +  
                parseInt($("#ctr_register_grado").val()) + parseInt($("#ctr_register_tipo_documento").val()) + parseInt($("#ctr_register_telefono").val()) + 
                parseInt($("#ctr_register_email").val()) + parseInt($("#ctr_register_email1").val()) + parseInt($("#ctr_register_rh").val()) + 
				parseInt($("#ctr_register_medio").val()) + parseInt($("#ctr_activiadad_extra").val()) + parseInt($("#ctr_register_genero").val()) + 
				parseInt($("#ctr_situacion").val()) + 
                parseInt($("#ctr_register_nombreA").val()) + parseInt($("#ctr_register_documentoA").val()) + 
                parseInt($("#ctr_register_direccionA").val()) + parseInt($("#ctr_register_celularA").val()) + parseInt($("#ctr_register_correoA").val()) +
                parseInt($("#ctr_register_correoA1").val()) +  parseInt($("#ctr_parentesco_acudiente_1").val());
            
            //console.log("control: " + control);
			//console.log("ctr_register_nombreA: " + $("#ctr_register_nombreA").val());
            if(control > 0) {
                $("#btnEnviar").attr("disabled", "disabled");
            }
            else {
                //alert("email=" + $("#register_email").val() + " email1=" + $("#register_email1").val());
                if($("#register_email").val() == $("#register_email1").val()) {
                    $("#btnEnviar").removeAttr("disabled");
                }
                else {
                    var texto = "El email y la confirmación del email del estudiante deben ser iguales";
    				$("#pdesc").html(texto).css("color","red");
    				$("#btnEnviar").attr("disabled", "disabled");
    				control1 = 1;
                }
                
                if(control1 == 0) {
                    if($("#register_correoA").val() == $("#register_correoA1").val()) {
                        $("#btnEnviar").removeAttr("disabled");
                    }
                    else {
                        var texto = "El email y la confirmación del email del acudiente deben ser iguales";
        				$("#pdesc").html(texto).css("color","red");
        				$("#btnEnviar").attr("disabled", "disabled");
                    }
                }
            }
            
            (a == 1) ? $("#register_apellidos").addClass("error") : $("#register_apellidos").removeClass("error");
            (b == 1) ? $("#register_nombres").addClass("error") : $("#register_nombres").removeClass("error");
            (c == 1) ? $("#register_grado").addClass("error") : $("#register_grado").removeClass("error");
            //(c == 1) ? $("#lblgrado").addClass("error") : $("#lblgrado").removeClass("error");
            (d == 1) ? $("#register_tipo_documento").addClass("error") : $("#register_tipo_documento").removeClass("error");
            //(d == 1) ? $("#lbltd").addClass("error") : $("#lbltd").removeClass("error");
            (e == 1) ? $("#register_telefono").addClass("error") : $("#register_telefono").removeClass("error");
            (f == 1) ? $("#register_email").addClass("error") : $("#register_email").removeClass("error");
            (g == 1) ? $("#register_email1").addClass("error") : $("#register_email1").removeClass("error");
			(h == 1) ? $("#register_rh").addClass("error") : $("#register_rh").removeClass("error");
			(i == 1) ? $("#register_medio").addClass("error") : $("#register_medio").removeClass("error");
			(j == 1) ? $("#activiadad_extra").addClass("error") : $("#activiadad_extra").removeClass("error");
			(j1 == 1) ? $("#register_genero").addClass("error") : $("#register_genero").removeClass("error");
			(k == 1) ? $("#situacion").addClass("error") : $("#situacion").removeClass("error");
            
            (l == 1) ? $("#register_nombreA").addClass("error") : $("#register_nombreA").removeClass("error");
            (m == 1) ? $("#register_documentoA").addClass("error") : $("#register_documentoA").removeClass("error");
            (n == 1) ? $("#register_direccionA").addClass("error") : $("#register_direccionA").removeClass("error");
            (o == 1) ? $("#register_celularA").addClass("error") : $("#register_celularA").removeClass("error");
            (p == 1) ? $("#register_correoA").addClass("error") : $("#register_correoA").removeClass("error");
            (q == 1) ? $("#register_correoA1").addClass("error") : $("#register_correoA1").removeClass("error");
            (r == 1) ? $("#parentesco_acudiente_1").addClass("error") : $("#parentesco_acudiente_1").removeClass("error");
			//(r == 1) ? $("#lblparentesco").addClass("error") : $("#lblparentesco").removeClass("error");
            
        }
        
        function val_documento() {
            //Se ponen los control de los controles en 1
            $("#ctr_register_apellidos").val(1);
            $("#ctr_register_nombres").val(1);
            $("#ctr_register_grado").val(1);
            $("#ctr_register_tipo_documento").val(1);
            $("#ctr_register_telefono").val(1);
            $("#ctr_register_email").val(1);
            $("#ctr_register_email1").val(1);
			$("#ctr_register_rh").val(1);
			$("#ctr_register_medio").val(1);
			$("#ctr_activiadad_extra").val(1);
			$("#ctr_situacion").val(1);
            
            $("#ctr_register_nombreA").val(1);
            $("#ctr_register_documentoA").val(1);
            $("#ctr_register_direccionA").val(1);
            $("#ctr_register_celularA").val(1);
            $("#ctr_register_correoA").val(1);
            $("#ctr_register_correoA1").val(1);
			$("#ctr_parentesco_acudiente_1").val(1);
            
            //Se limpian lo cuadros de texto
            $("#register_apellidos").val("");
            $("#register_nombres").val("");
			$("#register_grado").val(0);
			$('#register_grado').change();
            $("#register_tipo_documento").val(0);
			$('#register_tipo_documento').change();
            $("#register_telefono").val("");
            $("#register_email").val("");
            $("#register_email1").val("");
			$("#register_rh").val("");
			$("#register_medio").val(0);
			$('#register_medio').change();
			$("#activiadad_extra").val("");
			$("#situacion").val("");
            
            $("#register_nombreA").val("");
            $("#register_documentoA").val("");
            $("#register_direccionA").val("");
            $("#register_celularA").val("");
            $("#register_correoA").val("");
            $("#register_correoA1").val("");
			$("#parentesco_acudiente_1").val("NA");
			$('#parentesco_acudiente_1').change();
			
			//Se inabilitan los controles
			$("#register_apellidos").attr("disabled", "disabled");
            $("#register_nombres").attr("disabled", "disabled");
			$("#register_grado").attr("disabled", "disabled");
            $("#register_tipo_documento").attr("disabled", "disabled");
            $("#register_telefono").attr("disabled", "disabled");
            $("#register_email").attr("disabled", "disabled");
            $("#register_email1").attr("disabled", "disabled");
			$("#register_rh").attr("disabled", "disabled");
			$("#register_medio").attr("disabled", "disabled");
			$("#activiadad_extra").attr("disabled", "disabled");
			$("#register_genero").attr("disabled", "disabled");
			$("#situacion").attr("disabled", "disabled");
            
            $("#register_nombreA").attr("disabled", "disabled");
            $("#register_documentoA").attr("disabled", "disabled");
            $("#register_direccionA").attr("disabled", "disabled");
            $("#register_celularA").attr("disabled", "disabled");
            $("#register_correoA").attr("disabled", "disabled");
            $("#register_correoA1").attr("disabled", "disabled");
			$("#parentesco_acudiente_1").attr("disabled", "disabled");
			

            var doc = $("#register_documento").val();
            $.ajax({
				type:"POST",
				url:"cargar_datos_est_antiguo_getdat.php",
				data:"documento=" + doc,
				success:function(r) {
					var res = JSON.parse(r);
					//alert(res.estado);
					var control_matricula = 0;
					var r_est = res.estado;
					var grados = res.grados;
					var cod_ent = res.cod_ent;
					var rh = res.rh;
					rh = rh.replace("mas", "+");
					rh = rh.replace("menos", "-");
					
					//$("#register_estado").val(r_est);
					
					if(res.mat_ordinaria == "AUN NO") {
						control_matricula = 1;
						$("#pdesc").html("Las matrículas ordinarias van desde el " + res.mat_ordinaria_desde + " hasta el " + res.mat_ordinaria_hasta);
					}
					else if(res.mat_ordinaria == "SI") {
						control_matricula = 0;
					}
					else if(res.mat_ordinaria == "NO") {
						if(res.mat_extraordinaria == "AUN NO") {
							control_matricula = 1;
							$("#pdesc").html("Las matrículas extraordinarias van desde el " + res.mat_extraordinaria_desde + " hasta el " + res.mat_extraordinaria_hasta);
						}
						else if(res.mat_extraordinaria == "SI") {
							control_matricula = 0;
						}
						else if(res.mat_extraordinaria == "NO") {
							control_matricula = 1;
							$("#pdesc").html("Las matrículas extraordinarias van desde el " + res.mat_extraordinaria_desde + " hasta el " + res.mat_extraordinaria_hasta);
						}
					}
					
					if(control_matricula == 0) {
						if(r_est == "activo") {
							var r_grado = res.grados[0].gra;
							$("#pdesc").html("Este documento ya se encuentra activo en el grado " + r_grado + ".");
						}
						else if(r_est == "solicitud" || r_est == "pre_solicitud") {
							var r_grado = res.grados[0].gra;
							$("#pdesc").html("Este documento ya tiene una solicitud de matrícula en el grado " + r_grado + ".");
						}
						else if(r_est == "reprobado" || r_est == "aprobado" || r_est == "retirado") {
							var r_grado = res.grados[0].gra;
							//alert(r_grado);
							var r_idgrado = res.grados[0].id_gra;
							
							//$("#pdesc").html("Este documento no está habilitado para proceso de matrícula de estudiantes nuevos. Está en estado " + r_est + ".");
							
							//Se cargan los datos
							$("#register_apellidos").val(res.apellidos);
							$("#register_nombres").val(res.nombres);
							$("#register_grado").val(r_idgrado);
							$("#register_grado").change();
							$("#grado_permitido").val(r_idgrado);
							$("#register_tipo_documento").val(res.idtdoc);
							$("#register_tipo_documento").change();
							$("#register_telefono").val(res.tel);
							$("#register_email").val(res.email);
							$("#register_email1").val(res.email);
							$("#register_rh").val(res.rh);
							$("#register_medio").val(res.idmedio);
							$("#register_medio").change();
							$("#activiadad_extra").val(res.extra);
							$("#register_genero").val(res.genero);
							$("#register_genero").change();
							$("#situacion").val(res.situacion);
							
							$("#ctr_register_apellidos").val(0);
							$("#ctr_register_nombres").val(0);
							$("#ctr_register_grado").val(0);
							$("#ctr_register_tipo_documento").val(0);
							$("#ctr_register_telefono").val(0);
							$("#ctr_register_email").val(0);
							$("#ctr_register_email1").val(0);
							(res.rh == "") ? $("#ctr_register_rh").val(1) : $("#ctr_register_rh").val(0);
							$("#ctr_register_medio").val(0);
							(res.extra == "") ? $("#ctr_activiadad_extra").val(1) : $("#ctr_activiadad_extra").val(0);
							$("#ctr_register_genero").val(0);
							(res.situacion == "") ? $("#ctr_situacion").val(1) : $("#ctr_situacion").val(0);
							
							$("#register_nombreA").val(res.acudiente);
							$("#register_documentoA").val(res.docA);
							$("#register_direccionA").val(res.direccion);
							$("#register_celularA").val(res.telA);
							$("#register_correoA").val(res.emailA);
							$("#register_correoA1").val(res.emailA);
							$("#parentesco_acudiente_1").val(res.parentesco);
							$("#parentesco_acudiente_1").change();
							
							$("#ctr_register_nombreA").val(0);
							$("#ctr_register_documentoA").val(0);
							$("#ctr_register_direccionA").val(0);
							$("#ctr_register_celularA").val(0);
							$("#ctr_register_correoA").val(0);
							$("#ctr_register_correoA1").val(0);
							$("#ctr_parentesco_acudiente_1").val(0);
							
							//Se habilitan los controles
							$("#register_apellidos").removeAttr("disabled");
							$("#register_nombres").removeAttr("disabled");
							//$("#register_grado").removeAttr("disabled");
							$("#register_tipo_documento").removeAttr("disabled");
							$("#register_telefono").removeAttr("disabled");
							$("#register_email").removeAttr("disabled");
							$("#register_email1").removeAttr("disabled");
							$("#register_rh").removeAttr("disabled");
							$("#register_medio").removeAttr("disabled");
							$("#activiadad_extra").removeAttr("disabled");
							$("#situacion").removeAttr("disabled");
							
							$("#register_nombreA").removeAttr("disabled");
							$("#register_documentoA").removeAttr("disabled");
							$("#register_direccionA").removeAttr("disabled");
							$("#register_celularA").removeAttr("disabled");
							$("#register_correoA").removeAttr("disabled");
							$("#register_correoA1").removeAttr("disabled");
							$("#parentesco_acudiente_1").removeAttr("disabled");
							
							mostrar_submit();
						}
						else if(r_est == "inactivo") {
							var r_grado = res.grados[0].gra;
							$("#pdesc").html("Este documento se encuentra inactivo en este momento. Comunícate con Secretaría Académica.");
						}
						else {
							
						}
					}					
				}
			});
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
		
		/*************** header-admisiones ************/
		.form-group label {
			font-size: 1.7rem;
		}
		#divRequisitos {
			background: #1E2A57;
			border-radius: 15px;
		}
		#tituloRequisitos {
			color: #F1C603;
		}
		#divFormulario, #divCuatro, #divSiete {
			background: #F0EAEA;
		}
		#tituloTres, #tituloCuatro {
			color: #253668;			
			font-weight: bold;
		}
		.pCuatro, #subTituloCuatro, .tituloOcho {
			color: #Ff9805;
		}
		.pCuatroB {
			text-align: justify;
			font-size: 11px;
		}
		.pRequisitos {
			font-size: 2rem;
		}
		#tituloCinco, #tituloSeis {
			color: #Da0229;
		}
		.imgCuatro {
			width: 60%; 
			height: auto;
		}
		.btn-brand {
			background: #A36AC1 !important;
		}
		.imgSiete {
			width: 10%; 
			height: auto;
		}
		.imgOcho {
			width: 40%; 
			height: auto;
		}
		#divOcho {
			background: white;
		}
		#imgOcho {
			transform: rotate(90deg);
		}
		.pSiete, .pOcho {
			font-size: 2rem;
		}
		.pSSEC {
			font-size: 2rem;
			padding-right: 3%;
		}
		.notaOcho {
			color: #Da0229;
		}
		#situacion {
			width: 98%;
		}
		.azulclaro {
			background: #4495EC;
			color: #4495EC;
		}
		.azuloscuro {
			background: #1E2A57;
			color: white;
			font-weight: bold;
		}
		.borde-personalizado {
			border: 2px solid #e0d1a1 !important;
		}
		.form-select {
			appearance: none !important;
			background-image: url("assets/img/admisiones/select_Icon.png") !important;
			background-repeat: no-repeat;
			background-position: right 0.1rem center;
			min-height: 40px !important;
		}
		#btnEnviar{
			border-radius: 32px;
			background-color: #1E2A57;
			border-color: #1E2A57;
		}
		.imgAyuda {
			width: 20%;
			height: auto;
		}
		.display-4, .llamanos {
			color: #253668;			
			font-weight: bold;
		}
		.lead {
			font-size: 14px;
		}
		
		.error {
            border: 3px solid red !important;
        }        
		
		@media only screen and (max-width: 650px) {
			iframe {
				width: 460px;
				height: auto;
			}
			.imgCuatro {
				width: 50%; 
				height: auto;
				margin-left: 20%;
			}
			.imgSiete {
				width: 20%; 
				height: auto;
			}
			.imgOcho {
				width: 80%; 
				height: auto;
			}
			.imgAyuda {
				width: 30%;
				height: auto;
			}
		}
    </style>
	
</head>
<body>

    <!--== Header Area Start ==-->
    <div class="row">
		<div class="col-12">
			<img src="assets/img/admisiones/header50_1.png" id="imgh1" class="img-fluid"/>
		</div>
	</div><br><br>
    <!--== Header Area End ==-->
    
    <div id="divcargando" class="loader" style="display: none;"></div>
	
	<div class="container" id="divCuatro">
		<br>
		<div class="row">
			<div class="col-12">
				<center><h3 id="tituloCuatro"><strong>MATRÍCULAS 2024</strong></h3></center>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12">
				<center><h5 id="subTituloCuatro"><strong>Documentos para formalizar matrícula de estudiantes antiguos</strong></h5></center>
			</div>
		</div><br><br>
		
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3">				
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<center><p><img src="assets/img/admisiones/estudiantes_antiguos.png" alt="" class="img-fluid imgCuatro"/></p></center>
				<div id="divRequisitos">
					<center><h6 id="tituloRequisitos"><img src="assets/img/admisiones/flecha-96.png" alt="" class="img-fluid" style="width: 2em;"/> REQUISITOS ESTUDIANTES ANTIGUOS</h6></center>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3">				
			</div>
		</div><br>
		
		<div class="row">
			<div class="col-1">
				<img src="assets/img/admisiones/flecha-96.png" alt="" class="img-fluid" style="width: 2em;"/>
			</div>
			<div class="col-11">
				<p class="pRequisitos">
					<mark>Imagen de consignación efectuada <strong>por concepto de matrícula para el año 2024 más un 5% por extemporaneidad.</strong></mark>
				</p>
			</div>
		</div>

		<div class="row">
			<div class="col-1">
				<img src="assets/img/admisiones/flecha-96.png" alt="" class="img-fluid" style="width: 2em;"/>
			</div>
			<div class="col-11">
				<p class="pRequisitos">
					Contrato de matrícula, Pagaré y consentimiento informado firmados y autenticados en notaría (Archivo enviado al correo del 
					acudiente por el Colegio Unicab Virtual en el momento de la entrevista).
				</p>
			</div>
		</div>
		
		<div class="row">
			<div class="col-1">
				<img src="assets/img/admisiones/flecha-96.png" alt="" class="img-fluid" style="width: 2em;"/>
			</div>
			<div class="col-11">
				<p class="pRequisitos">
					Documento de identidad del estudiante (registro civil para menores de 7 años; tarjeta de identidad entre 7 y 17 años y cédula 
					de ciudadanía para mayores de 18 años). <mark><u>Solo si cambió</u></mark>.
				</p>
			</div>
		</div>
		
		<div class="row">
			<div class="col-1">
				<img src="assets/img/admisiones/flecha-96.png" alt="" class="img-fluid" style="width: 2em;"/>
			</div>
			<div class="col-11">
				<p class="pRequisitos">
					Documento de identidad del acudiente, (misma persona que firma el contrato). <mark><u>Solo si cambió</u></mark>.
				</p>
			</div>
		</div>
		
		<div class="row">
			<div class="col-1">
				<img src="assets/img/admisiones/flecha-96.png" alt="" class="img-fluid" style="width: 2em;"/>
			</div>
			<div class="col-11">
				<p class="pRequisitos">
					Paz y salvo de Unicab año lectivo anterior.
				</p>
			</div>
		</div>
		
		<div class="row">
			<div class="col-1">
				<img src="assets/img/admisiones/flecha-96.png" alt="" class="img-fluid" style="width: 2em;"/>
			</div>
			<div class="col-11">
				<p class="pRequisitos">
					Fotografía reciente del estudiante.
				</p>
			</div>
		</div>
		
		<div class="row">
			<div class="col-1">
				<img src="assets/img/admisiones/flecha-96.png" alt="" class="img-fluid" style="width: 2em;"/>
			</div>
			<div class="col-11">
				<p class="pRequisitos">
					Certificado de afiliación a E.P.S del estudiante.
				</p>
			</div>
		</div>

		<div class="row">
			<div class="col-1">
				<img src="assets/img/admisiones/flecha-96.png" alt="" class="img-fluid" style="width: 2em;"/>
			</div>
			<div class="col-11">
				<p class="pRequisitos">
					Certificado de actividad extracurricular. <mark><u>Solo si cambió</u></mark>.
				</p>
			</div>
		</div>
				
	</div><br><br>
	
	<div class="container" id="divSiete">
		<br>
		<div class="row">
			<div class="col-12">
				<center>
					<hr color="#A36AC1" style="height:5px; width: 15%;">
					<img src="assets/img/admisiones/6c.png" alt="" class="img-fluid imgSiete"/>
					<p class="pSiete">Consulta aquí los costos de matrículas extraordinarias</p>
					<a href="assets/descargas/costos/COSTOS_MATRICULA_EXTRAORDINARIA_2024.pdf" target="_blank" class="btn btn-brand smooth-scroll">COSTOS DE MATRICULA EXTRAORDINARIA 2024</a><br><br>
					
				</center>
			</div>
		</div>		
				
	</div><br>
	
	<div class="container" id="divOcho">
		<br>
		<div class="row">
			<div class="col-12">
				<center>
					<!--<hr color="#Ff9805" style="height:5px; width: 15%;">-->
					<img src="assets/img/admisiones/imagen formulario admision_1.jpg" alt="" class="img-fluid imgOcho"/>
					<h6 class="tituloOcho"><br/>(Se recomienda utilizar navegadores diferentes a Internet Explorer)</h6>
				</center>
			</div>
		</div><br>
		
		<div class="row">
			<div class="col-1">
				<img src="assets/img/admisiones/flecha-96.png" id="imgOcho" class="img-fluid" style="width: 2em;"/>
			</div>
			<div class="col-11">
				<p class="pOcho">
					<strong>A la dirección de correo del acudiente que registre, se le enviará:</strong>
				</p>
			</div>
		</div>
		
		<div class="row">
			<div class="col-1">				
			</div>
			<div class="col-1">
				<img src="assets/img/admisiones/flecha-96.png" alt="" class="img-fluid" style="width: 2em;"/>
			</div>
			<div class="col-10">
				<p class="pOcho">
					Un link para <strong>contestar</strong> la evaluación de admisión que se debe presentar al momento de la entrevista.
				</p>
			</div>
		</div>
		
		<div class="row">
			<div class="col-1">				
			</div>
			<div class="col-1">
				<img src="assets/img/admisiones/flecha-96.png" alt="" class="img-fluid" style="width: 2em;"/>
			</div>
			<div class="col-10">
				<p class="pOcho">
					Un link con el día y hora en la que se programó de la entrevista.
				</p>
			</div>
		</div>
		
		<div class="row">		
			<div class="col-1">
				<img src="assets/img/admisiones/flecha-96.png" alt="" class="img-fluid" style="width: 2em;"/>
			</div>
			<div class="col-11">
				<p class="pOcho notaOcho">
					<strong>NOTA: Hemos detectado incovenientes con algunos correos de hotmail. Aconsejamos utilizar otro correo.</strong>
				</p>
			</div>
		</div><br>
		
		<div class="container datosEstudiante">
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-2 azulclaro">
						<h6>Paso 1</h6>
					</div>
					<div class="col-md-10 col-10 azuloscuro">
						<h6>Paso 1</h6>
						<h6>DATOS COMPLEMENTARIOS DEL ESTUDIANTE</h6>
					</div>
				</div>
				<br>
			</div>		
		</div><br>
		
		<form name="formulario" id="formulario" method="post" action="pre_admisiones1_us_antiguos.php" enctype="multipart/form-data">
			<div class="row ml-5">
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_apellidos">Apellidos</label>
						<input type="text" class="form-control borde-personalizado" id="register_apellidos" name="register_apellidos" placeholder="Escribe los apellidos del estudiante" required onkeyup="mayus(this, 'register_apellidos', 'Apellidos');">
						<input type="hidden" style="width: 20px" id="ctr_register_apellidos" value="1"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_nombres">Nombres</label>
						<input type="text" class="form-control borde-personalizado" id="register_nombres" name="register_nombres" required placeholder="Escribe los nombres del estudiante" onkeyup="mayus(this, 'register_nombres', 'Nombres');">
						<input type="hidden" style="width: 20px" id="ctr_register_nombres" value="1"/>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">                                                        	
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_grado" id="lblgrado">Selecciona el grado a que ingresas</label><br>
						<select class="form-control form-select snormal borde-personalizado" id="register_grado" name="register_grado" requiered>
							<option value="0" selected>Seleccione grado</option>
							<?php
								while ($row = mysqli_fetch_array($petecion)) {
									echo '<option value="'.$row['id'].'">'.$row['grado'].'</option>';
								}
							?>
						</select>
						<input type="hidden" style="width: 20px" id="ctr_register_grado" value="1"/> 
						<input type="hidden" id="grado_permitido" name="grado_permitido" value="0"/>
					</div>
				</div>
				<div class="col-1">
				</div>			
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_tipo_documento" id="lbltd">Tipo de documento de identidad</label><br>
						<select class="form-control form-select form-control-lg snormal borde-personalizado" id="register_tipo_documento" name="register_tipo_documento" required>
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
						<input type="text" class="form-control borde-personalizado" id="register_telefono" name="register_telefono" required placeholder="Escribe el número telefónico del estudiante sin espacios" onkeyup="validar_numero('register_telefono', 'Número telefónico');">
						<input type="hidden" style="width: 20px" id="ctr_register_telefono" value="1"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_email">Correo electrónico</span></label>
						<input type="text" class="form-control borde-personalizado" id="register_email" name="register_email" required placeholder="Escribe el correo electrónico del estudiante" onkeyup="validar_email('register_email', 'Correo electrónico');">
						<input type="hidden" style="width: 20px" id="ctr_register_email" value="1"/>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_email1">Confirmar correo electrónico</label>
						<input type="text" class="form-control borde-personalizado" id="register_email1" name="register_email1" required placeholder="Escribe el correo electrónico del estudiante" onkeyup="validar_email('register_email1', 'Confirmar correo electrónico');">
						<input type="hidden" style="width: 20px" id="ctr_register_email1" value="1"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="rh">Factor RH</label>
						<input type="text" class="form-control borde-personalizado" id="register_rh" name="register_rh" required placeholder="Escribe el factor RH del estudiante" onkeyup="mayus(this, 'register_rh', 'Factor RH');">
						<input type="hidden" style="width: 20px" id="ctr_register_rh" value="1"/>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">                                                        	
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_grado" id="lblgrado">Selecciona el medio de llegada</label><br>
						<select class="form-control form-select snormal borde-personalizado" id="register_medio" name="register_medio" requiered>
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
				<div class="col-1">
				</div>			
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="">Actividad extra</label>
						<input type="text" class="form-control borde-personalizado" id="activiadad_extra" name="activiadad_extra" required placeholder="Escribe la actividad extra del estudiante" onkeyup="mayus(this, 'activiadad_extra', 'Actividad extra');">
						<input type="hidden" style="width: 20px" id="ctr_activiadad_extra" value="1"/>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">                                                        	
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_genero" id="lblgen">Género</label><br>
						<select class="form-control form-select snormal borde-personalizado" id="register_genero" name="register_genero" required>
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
				</div>
			</div><br>			
			
			<div class="container situacion">
				<div class="container">
					<div class="row">
						<div class="col-md-2 col-2 azulclaro">
							<h6>Paso 2</h6>
						</div>
						<div class="col-md-10 col-10 azuloscuro">
							<h6>Paso 2</h6>
							<h6>SITUACIÓN SOCIO-ECONÓMICA</h6>
						</div>
					</div>
					<br>
				</div>		
			</div>
			
			<div class="row ml-5">
				<div class="col-1">
					<img src="assets/img/admisiones/flecha-96.png" alt="" class="img-fluid" style="width: 2em;"/>
				</div>
				<div class="col-11">
					<p class="pSSEC">En esta sección es importante que nos indique por qué motivo desea matricular a su hijo, hija o acudido al Colegio 
					UNICAB Virtual. Es de vital importancia que esta información sea diligenciada con las razones y argumentos que crea pertinentes, 
					obedeciendo al derecho que por ley, promueve el respeto y garantía a los padres de familia para educar a sus hijos conforme a sus 
					convicciones, creencias, principios y valores sin discriminación o perjuicio alguno.
					</p>
				</div>
			</div>
			
			<div class="row ml-5">
				<div class="col-1">
					<img src="assets/img/admisiones/flecha-96.png" alt="" class="img-fluid" style="width: 2em;"/>
				</div>
				<div class="col-11">
					<p class="pSSEC"><strong>* IMPORTANTE:</strong> Mencionar la necesidad socio económica presentada en la familia para matricular
					a su hijo, hija o acudido en modalidad virtual, entendiéndose como todo argumento que indique la pertinencia del modelo 
					(situaciones económicas, problemáticas sociales relacionadas con el estudiante, situaciones de desplazamiento forzado o generado 
					por motivos laborales del acudiente, padre o madre de familia, presencia de discapacidad física o psicosocial, actividades
					extracurriculares de los estudiantes como deportes, alto rendimiento, artes y/o emprendimientos, dificultad para acceder a educación, 
					entre otras).
					</p>
				</div>
			</div>
			
			<div class="row ml-5">
				<div class="col-12">
					<div class="form-group">
						<label for="register_email1">(Máximo 2000 caracteres)</label>
						<textArea type="text" class="form-control largo1 borde-personalizado" id="situacion" name="situacion" placeholder="Ingrese situación socio-económica" onkeyup="mayus(this, 'situacion', 'Situación socio-económica');" maxlength="2000" required rows="5"></textArea>
						<input type="hidden" id="ctr_situacion" name="ctr_situacion" value="1"/>
					</div>
				</div>
			</div><br>
			
			<div class="container datosAcudiente">
				<div class="container">
					<div class="row">
						<div class="col-md-2 col-2 azulclaro">
							<h6>Paso 3</h6>
						</div>
						<div class="col-md-10 col-10 azuloscuro">
							<h6>Paso 3</h6>
							<h6>DATOS COMPLEMENTARIOS DEL ACUDIENTE</h6>
						</div>
					</div>
					<br>
				</div>		
			</div>
			
			<div class="row ml-5">
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_apellidosA">Nombre</label>
						<input type="text" class="form-control borde-personalizado" id="register_nombreA" name="register_nombreA" placeholder="Escribe el nombre del acudiente" required onkeyup="mayus(this, 'register_nombreA', 'Nombre acudiente');">
						<input type="hidden" style="width: 20px" id="ctr_register_nombreA" value="1"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_docuentoA">Documento</label>
						<input type="text" class="form-control borde-personalizado" id="register_documentoA" name="register_documentoA" placeholder="Escribe el número de documento del acudiente sin puntos" required onkeyup="validar_numero('register_documentoA', 'Documento acudiente');">
						<input type="hidden" style="width: 20px" id="ctr_register_documentoA" value="1"/>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_direccionA">Dirección de residencia</label>
						<input type="text" class="form-control borde-personalizado" id="register_direccionA" name="register_direccionA" placeholder="Escribe la dirección del acudiente" required onkeyup="mayus(this, 'register_direccionA', 'Direccion de residencia acudiente');">
						<input type="hidden" style="width: 20px" id="ctr_register_direccionA" value="1"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_celularA">Celular</label>
						<input type="text" class="form-control borde-personalizado" id="register_celularA" name="register_celularA" placeholder="Escribe el número de celular del acudiente sin espacios" required onkeyup="validar_numero('register_celularA', 'Celular acudiente');">
						<input type="hidden" style="width: 20px" id="ctr_register_celularA" value="1"/>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_correoA">Correo electrónico acudiente (al cual llegará la factura electrónica)</label>
						<input type="text" class="form-control borde-personalizado" id="register_correoA" name="register_correoA" placeholder="Escribe el correo electrónico del acudiente" required onkeyup="validar_email('register_correoA', 'Correo electrónico acudiente');">
						<input type="hidden" style="width: 20px" id="ctr_register_correoA" value="1"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_correoA1">Confirmar correo electrónico acudiente</label>
						<input type="text" class="form-control borde-personalizado" id="register_correoA1" name="register_correoA1" required placeholder="Escribe el correo electrónico del acudiente" onkeyup="validar_email('register_correoA1', 'Confirmar correo electrónico acudiente');">
						<input type="hidden" style="width: 20px" id="ctr_register_correoA1" value="1"/>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">                                                        	
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="parentesco_acudiente_1" id="lblparentesco">Parentesco</label>
						<select id="parentesco_acudiente_1" name="parentesco_acudiente_1" class="form-control form-select snormal borde-personalizado">
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
				</div>
			</div>
			
			<div class="row ml-5">                                                        	
				<div class="col-12">
					<div class="form-group">
						<!--<input type="hidden" name="verificacion">-->
						<button type="submit" id="btnEnviar" style="background-color: #42C3AE;" class="btn btn-info form-control" disabled>
							<h6 style="display: inline-block;" class="pr-3" id="entrar">Enviar</h6>
						</button>
					</div>
				</div>
			</div>
			<input type="hidden" value="<?php echo $documento; ?>" id="register_documento" name="register_documento"/>
			
		</form><br>
		
		<div class="row ml-5">                                                        	
			<div class="col-12">
				<!--JUMBOTRÓN-->
				<div class="jumbotronzz" align="center">
				<img src="assets/img/admisiones/Panchita.png" alt="" class="img-fluid imgAyuda"/>
				<h4 class="display-4">¿Necesitas ayuda?</h4>
				<p class="lead">Sí necesitas ayuda o acompañamiento en el proceso, contáctate con nuestro equipo de trabajo</p>
				<hr class="my-4">
				<h4 class="llamanos">Llámanos o escríbenos</h4>
				<h4 class="llamanos">300 815 6531 - 315 696 5291</h4>
				<!--<a class="btn btn-primary btn-lg" href="contacto.php" role="button">Contactar</a>-->
				</div>
				<!--JUMBOTRÓN-->
			</div>
		</div>		
						
		<div class="alert alert-danger" role="alert" id="alert">
			<p><i class="fa fa-warning"></i><span>: </span><label id="pdesc"></label>
			<input type="text" class="alert alert-danger" style="width: 20px" id="txtvacio" value="0"></p>
		</div>
		
	</div>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Términos y Condiciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                Unicab respeta la privacidad de sus usuarios, los datos de registro y demás información recibida a través de la página web, dominios, subdominios, landing pages, blogs, redes sociales oficiales, entre otros, serán preservados y protegidos. Está Política de Privacidad también se aplica a nuestra recopilación de datos, procesamiento y metodología de uso.  Al utilizar nuestro sitio web, aceptas la política de manejo de la información que se describe en la presente Política de Privacidad. En caso de que no estés de acuerdo con los métodos mencionados que aquí se describen, no deberás hacer uso de nuestros sitios web.<br><br>
                <b>Políticas de Privacidad y Uso de Datos</b><br><br>
                El propósito por el que recopilamos tus datos personales radica principalmente  en agilizar tu proceso de matrícula en nuestra organización, Es fundamental para nosotros hacer uso apropiado de la información de nuestros usuarios, así como garantizar la protección y confidencialidad de tus datos mediante el cumplimiento de la Ley 1581 de 2012 sobre la política de tratamiento y procedimiento de datos personales.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
      </div>
    </div>
    <!--modal-->
    
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

</body>
</html>
