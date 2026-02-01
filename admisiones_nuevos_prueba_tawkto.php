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
			
			$("#selperiodo").change(function() {
        		var periodo = $("#selperiodo").val();
        		
        		var control = 0;
        		//alert(td);
        		if(periodo == "NA") {
        			$("#btnEnviar").hide();
        			$("#ctr_selperiodo").val(1);
        			var texto = "Debe seleccionar un periodo de ingreso";
                    $("#pdesc").html(texto).css("color","red");
        		}
        		else {
					var gra = $("#register_grado").val();
					if(periodo == 3 && (gra == 17 || gra == 18)) {
						$("#btnEnviar").hide();
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
            var control = 0;
            var control1 = 0;
            var a = parseInt($("#ctr_register_apellidos").val());
            var b = parseInt($("#ctr_register_nombres").val());
            var c = parseInt($("#ctr_register_documento").val());
            var d = parseInt($("#ctr_register_grado").val());
            var e = parseInt($("#ctr_register_tipo_documento").val());
            var f = parseInt($("#ctr_register_telefono").val());
            var g = parseInt($("#ctr_register_email").val());
            var h = parseInt($("#ctr_register_email1").val());
            //alert(h);
            
            var l = parseInt($("#ctr_register_apellidosA").val());
            var m = parseInt($("#ctr_register_nombresA").val());
            var n = parseInt($("#ctr_register_documentoA").val());
            var o = parseInt($("#ctr_register_direccionA").val());
            var p = parseInt($("#ctr_register_celularA").val());
            var q = parseInt($("#ctr_register_correoA").val());
            var r = parseInt($("#ctr_register_correoA1").val());
            //var r1 = $("#ctr_register_correoA1").val();
            var s = parseInt($("#ctr_register_rh").val());
            var t = parseInt($("#ctr_parentesco_acudiente_1").val());
            var u = parseInt($("#ctr_selperiodo").val());
            //alert(t);
            
            control = parseInt($("#ctr_register_apellidos").val()) + parseInt($("#ctr_register_nombres").val()) + parseInt($("#ctr_register_documento").val()) + 
                parseInt($("#ctr_register_grado").val()) + parseInt($("#ctr_register_tipo_documento").val()) + parseInt($("#ctr_register_telefono").val()) + 
                parseInt($("#ctr_register_email").val()) + parseInt($("#ctr_register_email1").val()) + 
                parseInt($("#ctr_register_apellidosA").val()) + parseInt($("#ctr_register_nombresA").val()) + parseInt($("#ctr_register_documentoA").val()) + 
                parseInt($("#ctr_register_direccionA").val()) + parseInt($("#ctr_register_celularA").val()) + parseInt($("#ctr_register_correoA").val()) +
                parseInt($("#ctr_register_correoA1").val()) + parseInt($("#ctr_register_rh").val()) + parseInt($("#ctr_parentesco_acudiente_1").val()) +
				parseInt($("#ctr_selperiodo").val());
            
            //alert(control);
            if(control > 0) {
                $("#btnEnviar").hide();
            }
            else {
                //alert("email=" + $("#register_email").val() + " email1=" + $("#register_email1").val());
                if($("#register_email").val() == $("#register_email1").val()) {
                    $("#btnEnviar").show();
                }
                else {
                    var texto = "El email y la confirmación del email del estudiante deben ser iguales";
    				$("#pdesc").html(texto).css("color","red");
    				$("#btnEnviar").hide();
    				control1 = 1;
                }
                
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
            
            (a == 1) ? $("#register_apellidos").addClass("error") : $("#register_apellidos").removeClass("error");
            (b == 1) ? $("#register_nombres").addClass("error") : $("#register_nombres").removeClass("error");
            (c == 1) ? $("#register_documento").addClass("error") : $("#register_documento").removeClass("error");
            (d == 1) ? $("#ctr_register_grado").addClass("error") : $("#ctr_register_grado").removeClass("error");
            (d == 1) ? $("#lblgrado").addClass("error") : $("#lblgrado").removeClass("error");
            (e == 1) ? $("#register_tipo_documento").addClass("error") : $("#register_tipo_documento").removeClass("error");
            (e == 1) ? $("#lbltd").addClass("error") : $("#lbltd").removeClass("error");
            (f == 1) ? $("#register_telefono").addClass("error") : $("#register_telefono").removeClass("error");
            (g == 1) ? $("#register_email").addClass("error") : $("#register_email").removeClass("error");
            (h == 1) ? $("#register_email1").addClass("error") : $("#register_email1").removeClass("error");
            
            (l == 1) ? $("#register_apellidosA").addClass("error") : $("#register_apellidosA").removeClass("error");
            (m == 1) ? $("#register_nombresA").addClass("error") : $("#register_nombresA").removeClass("error");
            (n == 1) ? $("#register_documentoA").addClass("error") : $("#register_documentoA").removeClass("error");
            (o == 1) ? $("#register_direccionA").addClass("error") : $("#register_direccionA").removeClass("error");
            (p == 1) ? $("#register_celularA").addClass("error") : $("#register_celularA").removeClass("error");
            (q == 1) ? $("#register_correoA").addClass("error") : $("#register_correoA").removeClass("error");
            (r == 1) ? $("#register_correoA1").addClass("error") : $("#register_correoA1").removeClass("error");
            
            (s == 1) ? $("#register_rh").addClass("error") : $("#register_rh").removeClass("error");
            (t == 1) ? $("#parentesco_acudiente_1").addClass("error") : $("#parentesco_acudiente_1").removeClass("error");
			(t == 1) ? $("#lblparentesco").addClass("error") : $("#lblparentesco").removeClass("error");
			(u == 1) ? $("#selperiodo").addClass("error") : $("#selperiodo").removeClass("error");
			(u == 1) ? $("#lblperiodo").addClass("error") : $("#lblperiodo").removeClass("error");
            
        }
        
        function val_documento() {
            //alert("hola");
            $(".loader").fadeOut("slow");
            
            //Se ponen los control de los controles en 1
            $("#ctr_register_apellidos").val(1);
            $("#ctr_register_nombres").val(1);
            //$("#ctr_register_grado").val(1);
            //$("#ctr_register_tipo_documento").val(1);
            $("#ctr_register_telefono").val(1);
            $("#ctr_register_email").val(1);
            $("#ctr_register_email1").val(1);
            
            $("#ctr_register_apellidosA").val(1);
            $("#ctr_register_nombresA").val(1);
            $("#ctr_register_documentoA").val(1);
            $("#ctr_register_direccionA").val(1);
            $("#ctr_register_celularA").val(1);
            $("#ctr_register_correoA").val(1);
            $("#ctr_register_correoA1").val(1);
            
            //Se limpian lo cuadros de texto
            $("#register_apellidos").val("");
            $("#register_nombres").val("");
            $("#register_telefono").val("");
            $("#register_email").val("");
            $("#register_email1").val("");
            
            $("#register_apellidosA").val("");
            $("#register_nombresA").val("");
            $("#register_documentoA").val("");
            $("#register_direccionA").val("");
            $("#register_celularA").val("");
            $("#register_correoA").val("");
            $("#register_correoA1").val("");

            var doc = $("#register_documento").val();
            var cifra = doc.substring(0,1);
            //alert(cifra);
            if(doc == "0" || cifra == "0") {
                $("#msgdocumento").html("El documento no puede ser 0, o no puede empezar por 0");
        		        
		        var contenido=$(".ghf");
                contenido.slideUp(250);
                var contenido1=$(".file-input");
                contenido1.slideUp(250);
            }
            else {
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
            		    var grados = res.grados;
            		    var cod_ent = res.cod_ent;
						var rh = res.rh;
						rh = rh.replace("mas", "+");
						rh = rh.replace("menos", "-");
            		    
            		    $("#register_estado").val(r_est);
            		    
            		    var contenido2=$("#divcodigo");
                        contenido2.slideUp(250);
						
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
                        
						if(control_matricula == 0) {
							if(r_est == "activo") {
								var r_grado = res.grados[0].gra;
								//alert("Este documento ya se encuentra activo en el grado " + r_grado);
								$("#msgdocumento").html("Este documento ya se encuentra activo en el grado " + r_grado + ".");
								
								//$(".ghf").addClass("oculto");
								//$(".file-input").addClass("oculto");
								var contenido=$(".ghf");
								contenido.slideUp(250);
								var contenido1=$(".file-input");
								contenido1.slideUp(250);
							}
							else if(r_est == "solicitud" || r_est == "pre_solicitud") {
								var r_grado = res.grados[0].gra;
								//alert("Este documento ya tiene una solicitud de matrícula en el grado " + r_grado);
								$("#msgdocumento").html("Este documento ya tiene una solicitud de matrícula en el grado " + r_grado + ".");
								
								//$(".ghf").addClass("oculto");
								//$(".file-input").addClass("oculto");
								var contenido=$(".ghf");
								contenido.slideUp(250);
								var contenido1=$(".file-input");
								contenido1.slideUp(250);
							}
							else if(r_est == "reprobado" || r_est == "retirado") {
								var r_grado = res.grados[0].gra;
								//alert(r_grado);
								var r_idgrado = res.grados[0].id_gra;
								//var r_grado_val = res.gra_validacion;
								//var r_idgrado_val = res.idgra_validacion;
								var eval_val = res.eval_validacion;
								var res_val = res.res_validacion;
								
								if(eval_val == "SI" && res_val == "APROBADO") {
									$("#msgdocumento").html("Estudiante antiguo, puede empezar proceso de matícula para el grado " + res.gra_a_matricular + ".");
									$("#grado_permitido").val(res.idgra_a_matricular);
								}
								else if(eval_val == "SI" && res_val == "NO APROBADO") {
									$("#msgdocumento").html("Estudiante antiguo, puede empezar proceso de matícula para el grado " + res.gra_a_matricular + ".");
									$("#grado_permitido").val(res.idgra_a_matricular);
								}
								else {
									$("#msgdocumento").html("Estudiante antiguo, puede empezar proceso de matícula para el grado " + r_grado + ".");
									$("#grado_permitido").val(grados[0].id_gra);
								}
								
								//alert("Puede realizar proceso de matrícula para el grado " + r_grado);
								//$("#msgdocumento").html("Puede empezar proceso de matrícula para el grado " + r_grado + ".");
								
								var contenido=$(".ghf");
								contenido.slideDown(250);
								var contenido1=$(".file-input");
								contenido1.slideDown(250);
								
								//Se selecciona el grado
								//cargargrados(grados[0].id_gra);
								//$("#grado_permitido").val(grados[0].id_gra);
								
								/*for (var i in grados) {
									//alert (i + " " + grados[i].id_gra + " " + grados[i].gra);
									alert(grados[i].gra);
									alert(grados[i].id_gra);
									$("#register_grado").append('<option value="' + grados[i].id_gra + '">' + grados[i].gra + '</option>');
								}*/
								
								//alert (res.cod_ent);
								$("#register_codigo").val(res.cod_ent);
								
								$("#register_nombres").val(res.nombres);
								$("#register_apellidos").val(res.apellidos);
								//$("#register_grado").val(r_idgrado).change();
								$("#register_telefono").val(res.tel);
								$("#register_email").val(res.email);
								$("#register_email1").val(res.email);
								$("#register_rh").val(rh);
								
								$("#register_documentoA").val(res.docA);
								$("#register_celularA").val(res.telA);
								$("#register_correoA").val(res.emailA);
								$("#register_correoA1").val(res.emailA);
								
								$("#ctr_register_nombres").val(0);
								$("#ctr_register_apellidos").val(0);
								//$("#ctr_register_grado").val(0);
								$("#ctr_register_telefono").val(0);
								$("#ctr_register_email").val(0);
								$("#ctr_register_email1").val(0);
								$("#ctr_register_rh").val(0);
								
								$("#ctr_register_documentoA").val(0);
								$("#ctr_register_celularA").val(0);
								$("#ctr_register_correoA").val(0);
								$("#ctr_register_correoA1").val(0);
							}
							else if(r_est == "nuevo" && res.cod_ent == 0) {
								var r_grado = res.grados[0].gra;
								//alert("Documento nuevo, puede realizar proceso de matrícula");
								$("#msgdocumento").html("Documento nuevo, pero no puede empezar proceso de matrícula porque aún no ha solicitado entrevista. Por favor comuníquese a los números 310 753 7532 / 300 815 6531.");
								$("#grado_permitido").val(0);
								
								var contenido=$(".ghf");
								contenido.slideUp(250);
								var contenido1=$(".file-input");
								contenido1.slideUp(250);
								
								$("#estnuevo").val("SI");
							}
							else if(r_est == "nuevo" && res.cod_ent != 0) {
								var r_grado = res.grados[0].gra;
								var r_idgrado = res.grados[0].id_gra;
								//var r_grado_val = res.gra_validacion;
								//var r_idgrado_val = res.idgra_validacion;
								var eval_val = res.eval_validacion;
								var res_val = res.res_validacion;
								//alert(r_est + " " + res.cod_ent);
								
								if(eval_val == "SI" && res_val == "APROBADO") {
									//alert("Documento nuevo, puede realizar proceso de matrícula");
									$("#msgdocumento").html("Documento nuevo, puede empezar proceso de matrícula para el grado " + res.gra_a_matricular + ".");
									$("#grado_permitido").val(res.idgra_a_matricular);
								}
								else if(eval_val == "SI" && res_val == "NO APROBADO") {
									//alert("Documento nuevo, puede realizar proceso de matrícula");
									$("#msgdocumento").html("Documento nuevo, puede empezar proceso de matícula para el grado " + res.gra_a_matricular + ".");
									$("#grado_permitido").val(res.idgra_a_matricular);
								}
								else {
									//alert("Documento nuevo, puede realizar proceso de matrícula");
									$("#msgdocumento").html("Documento nuevo, puede empezar proceso de matrícula.");
									$("#grado_permitido").val(0);
								}
								
								//alert("Documento nuevo, puede realizar proceso de matrícula");
								//$("#msgdocumento").html("Documento nuevo, puede empezar proceso de matrícula.");
								//$("#grado_permitido").val(0);
								
								var contenido=$(".ghf");
								contenido.slideDown(250);
								var contenido1=$(".file-input");
								contenido1.slideDown(250);
								contenido2.slideDown(250);
								
								$("#estnuevo").val("SI");
							}
							else if(r_est == "inactivo") {
								var r_grado = res.grados[0].gra;
								//alert("Documento nuevo, puede realizar proceso de matrícula");
								$("#msgdocumento").html("Este documento se encuentra inactivo en este momento. Comunícate con Secretaría Académica.");
								
								var contenido=$(".ghf");
								contenido.slideUp(250);
								var contenido1=$(".file-input");
								contenido1.slideUp(250);
							}
							else if(r_est == "aprobado") {
								var r_grado = res.grados[0].gra;
								var r_idgrado = res.grados[0].id_gra;
								
								//var r_grado_val = res.gra_validacion;
								//var r_idgrado_val = res.idgra_validacion;
								var eval_val = res.eval_validacion;
								var res_val = res.res_validacion;
								
								if(eval_val == "SI" && res_val == "APROBADO") {
									//alert("Documento nuevo, puede realizar proceso de matrícula");
									$("#msgdocumento").html("Estudiante antiguo, puede empezar proceso de matícula para el grado " + res.gra_a_matricular + ".");
									$("#grado_permitido").val(res.idgra_a_matricular);
								}
								else if(eval_val == "SI" && res_val == "NO APROBADO") {
									//alert("Documento nuevo, puede realizar proceso de matrícula");
									$("#msgdocumento").html("Estudiante antiguo, puede empezar proceso de matícula para el grado " + res.gra_a_matricular + ".");
									$("#grado_permitido").val(res.idgra_a_matricular);
								}
								else {
									//alert("Documento nuevo, puede realizar proceso de matrícula");
									$("#msgdocumento").html("Estudiante antiguo, puede empezar proceso de matícula para el grado " + r_grado + ".");
									$("#grado_permitido").val(grados[0].id_gra);
								}
								
								var contenido=$(".ghf");
								contenido.slideDown(250);
								var contenido1=$(".file-input");
								contenido1.slideDown(250);
								
								//alert (res.cod_ent);
								$("#register_codigo").val(res.cod_ent);
								
								$("#register_nombres").val(res.nombres);
								$("#register_apellidos").val(res.apellidos);
								//$("#register_grado").val(r_idgrado).change();
								$("#register_telefono").val(res.tel);
								$("#register_email").val(res.email);
								$("#register_email1").val(res.email);
								$("#register_rh").val(rh);
								
								$("#register_documentoA").val(res.docA);
								$("#register_celularA").val(res.telA);
								$("#register_correoA").val(res.emailA);
								$("#register_correoA1").val(res.emailA);
								
								$("#ctr_register_nombres").val(0);
								$("#ctr_register_apellidos").val(0);
								//$("#ctr_register_grado").val(0);
								$("#ctr_register_telefono").val(0);
								$("#ctr_register_email").val(0);
								$("#ctr_register_email1").val(0);
								$("#ctr_register_rh").val(0);
								
								$("#ctr_register_documentoA").val(0);
								$("#ctr_register_celularA").val(0);
								$("#ctr_register_correoA").val(0);
								$("#ctr_register_correoA1").val(0);
							}
							else if(r_est == "Retirado") {
								//alert("Documento nuevo, puede realizar proceso de matrícula");
								$("#msgdocumento").html("Este documento se encuentra Retirado en este momento. Comunícate con Secretaría Académica.");
								
								var contenido=$(".ghf");
								contenido.slideUp(250);
								var contenido1=$(".file-input");
								contenido1.slideUp(250);
							}
							else {
								$("#msgdocumento").html("No se pudo procesar la solicitud de matrícula para éste documento. Comunícate con Secretaría Académica.");
								
								var contenido=$(".ghf");
								contenido.slideUp(250);
								var contenido1=$(".file-input");
								contenido1.slideUp(250);
							}
						}
            		    
            		}
            	});
            }
        	
        	mostrar_submit();
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
    </style>
	
</head>
<body>

    <!--== Register Page Content Start ==-->
    <section id="page-content-wrap">
        <div class="register-page-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        
						<!--JUMBOTRÓN-->
                        <div class="jumbotron" align="center">
                          <h1 class="display-4">¿Necesitas ayuda?</h1>
                          <h4>Sí necesitas ayuda o acompañamiento en el proceso, Ingresa a nuestro servicio de chat en línea</h4>
                          <hr class="my-4">
                          
                        </div>
                        <!--JUMBOTRÓN-->
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
    
    <!--Start of Tawk.to Script-->
	<script type="text/javascript">
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
			
			$.ajax({
				type:"POST",
				url:"registro_inicial_putdat.php",
				data:"nombrea=" + nombre + "&emaila=" + email + "&telefonoa=" + telefono + "&ciudada=" + ciudad + "&documentoe=" + nDocumento,
				success:function(r) {
					//alert(r); 
				}
			});
		};
	</script>
	<!--End of Tawk.to Script-->

</body>
</html>
