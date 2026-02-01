<?php
    include "admin-unicab/php/conexion.php";
    //https://unicab.org/admisiones_final_nuevos.php?c=bd7155gxv7
    
    $codigo = $_REQUEST['c'];
    $prefijo = substr($codigo, 0, 4);
    
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
            /*var contenido=$(".ghf");
            contenido.slideUp(250);
            var contenido1=$(".file-input");
            contenido1.slideUp(250);*/
			$("#cargando").hide();
            
            $('form').submit(function(){
                $("#divcargando").css({display:'block'});
                $("#btnEnviar").hide();
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
        	
        	$("#adjunto12").change(function(){
        	    var len = this.files.length;
                //alert("longitud archivo vacunación: " + len);
                if(len > 0) {
                    $("#ctr_vacunacion").val(0);
                }
                else {
                    $("#ctr_vacunacion").val(1);
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
                val = $(id_obj).val();
                if(val == '' || val == "" ) {
                    var texto = "El campo " + desc + " es obligatorio";
                    $("#pdesc").html(texto).css("color","red");
                    $(ctr_obj).val(1);
                    control = 1;
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
                val = $(id_obj).val();
                if(val == '' || val == "" ) {
                    var texto = "El campo " + desc + " es obligatorio";
                    $("#pdesc").html(texto).css("color","red");
                    $(ctr_obj).val(1);
                    control = 1;
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
            
            mostrar_submit();
        }
        
        function validar_email(id, desc) {
            var control = 0;
            var id_obj = "#" + id;
            var ctr_obj = "#ctr_" + id;
            var input_email = document.getElementById(id);
            var patron = /^[_-\w.]+@[a-z]+\.[a-z]{2,5}$/;
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
                var controlVacunacion = parseInt(a.toString() + m.toString() + m.toString());
                //alert (controlVacunacion);
                
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
            
            if(controlVacunacion >= 201011) {
                $("#ctr_vacunacion").val(1);
                $("#adjunto12").attr("required", "required");
            }
            else {
                $("#ctr_vacunacion").val(0);
                $("#adjunto12").removeAttr("required");
            }
                
            mostrar_submit();
        }
        
        function mostrar_submit() {
            var control = 0;
            //var cod_ent = $("#")
            var a = parseInt($("#ctr_register_documento").val());
            var b = parseInt($("#ctr_register_apellidos").val());
            var c = parseInt($("#ctr_register_nombres").val());
            var d = parseInt($("#ctr_register_grado").val());
            var e = parseInt($("#ctr_register_tipo_documento").val());
            var f = parseInt($("#ctr_register_email").val());
            var g = parseInt($("#ctr_register_telefono").val());
            
			var h = parseInt($("#ctr_register_lugar").val());
            var i = parseInt($("#ctr_register_year").val());
            var j = parseInt($("#ctr_register_direccion").val());
            var k = parseInt($("#ctr_register_ciudad").val());
            //alert(d);
            
            //var l = parseInt($("#ctr_register_apellidosA").val());
            var l = parseInt($("#ctr_register_nombresA").val());
            var m = parseInt($("#ctr_register_documentoA").val());
            var n = parseInt($("#ctr_register_direccionA").val());
            var o = parseInt($("#ctr_register_celularA").val());
            var p = parseInt($("#ctr_register_correoA").val());
            
            //var r = parseInt($("#ctr_vacunacion").val());
            
            control = parseInt($("#ctr_register_documento").val()) + parseInt($("#ctr_register_apellidos").val()) + parseInt($("#ctr_register_nombres").val()) + 
                parseInt($("#ctr_register_grado").val()) + parseInt($("#ctr_register_tipo_documento").val()) + parseInt($("#ctr_register_email").val()) + 
				parseInt($("#ctr_register_telefono").val()) + parseInt($("#ctr_register_lugar").val()) + parseInt($("#ctr_register_year").val()) + 
				parseInt($("#ctr_register_direccion").val()) + parseInt($("#ctr_register_ciudad").val()) + 
                parseInt($("#ctr_register_nombresA").val()) + parseInt($("#ctr_register_documentoA").val()) + 
                parseInt($("#ctr_register_direccionA").val()) + parseInt($("#ctr_register_celularA").val()) + parseInt($("#ctr_register_correoA").val());
            
            //alert(control);
            if(control > 0) {
                //$("#btnEnviar").hide();
				$("#btnEnviar").attr("disabled", "disabled");
            }
            else {
                //$("#btnEnviar").show();
				$("#btnEnviar").removeAttr("disabled");
            }
            
            (a == 1) ? $("#register_documento").addClass("error") : $("#register_documento").removeClass("error");
            (b == 1) ? $("#register_apellidos").addClass("error") : $("#register_apellidos").removeClass("error");
            (c == 1) ? $("#register_nombres").addClass("error") : $("#register_nombres").removeClass("error");
            (d == 1) ? $("#register_grado").addClass("error") : $("#register_grado").removeClass("error");
            (e == 1) ? $("#register_tipo_documento").addClass("error") : $("#register_tipo_documento").removeClass("error");
            (f == 1) ? $("#register_email").addClass("error") : $("#register_email").removeClass("error");
            (g == 1) ? $("#register_telefono").addClass("error") : $("#register_telefono").removeClass("error");
            
			(h == 1) ? $("#register_lugar").addClass("error") : $("#register_lugar").removeClass("error");
            (i == 1) ? $("#register_year").addClass("error") : $("#register_year").removeClass("error");
            (j == 1) ? $("#register_direccion").addClass("error") : $("#register_direccion").removeClass("error");
            (k == 1) ? $("#register_ciudad").addClass("error") : $("#register_ciudad").removeClass("error");
            
            (l == 1) ? $("#register_nombresA").addClass("error") : $("#register_nombresA").removeClass("error");
            (m == 1) ? $("#register_documentoA").addClass("error") : $("#register_documentoA").removeClass("error");
            (n == 1) ? $("#register_direccionA").addClass("error") : $("#register_direccionA").removeClass("error");
            (o == 1) ? $("#register_celularA").addClass("error") : $("#register_celularA").removeClass("error");
            (p == 1) ? $("#register_correoA").addClass("error") : $("#register_correoA").removeClass("error");
            
            //(r == 1) ? $("#adjunto12").addClass("error") : $("#adjunto12").removeClass("error");
        }
        
        function val_documento() {
            //alert("hola");
            $(".loader").fadeOut("slow");
            
            //Se limpian los controles
            $("#register_apellidos").val("");
            $("#register_nombres").val("");
            $("#register_grado").val("");
            $("#register_tipo_documento").val("");
            $("#register_email").val("");
            $("#register_telefono").val("");
            $("#register_lugar").val("");
            $("#register_year").val("");
            $("#register_direccion").val("");
            $("#register_ciudad").val("");
            
            $("#register_nombresA").val("");
            $("#register_documentoA").val("");
            $("#register_direccionA").val("");
            $("#register_celularA").val("");
            $("#register_correoA").val("");
            
            //-----------------------------
            $("#ctr_register_apellidos").val(1);
            $("#ctr_register_nombres").val(1);
            $("#ctr_register_grado").val(1);
            $("#ctr_register_tipo_documento").val(1);
            $("#ctr_register_email").val(1);
            $("#ctr_register_telefono").val(1);
            $("#ctr_register_lugar").val(1);
            $("#ctr_register_year").val(1);
            $("#ctr_register_direccion").val(1);
            $("#ctr_register_ciudad").val(1);
            
            $("#ctr_register_nombresA").val(1);
            $("#ctr_register_documentoA").val(1);
            $("#ctr_register_direccionA").val(1);
            $("#ctr_register_celularA").val(1);
            $("#ctr_register_correoA").val(1);

            var doc = $("#register_documento").val();
            var codigo = $("#txt_codigo").val();
            //Se valida si el documento corresponde al código de pre-matrícula
			$("#cargando").show();
			setTimeout(() => {
				registroMatricula(doc, codigo);
			}, 2000);
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
            else {
                validar_texto(id, desc);
            }
        }
        
        function comprobarCodigo(id, desc) {
            //alert("codigo");
            var control = 0;
            var id_obj = "#" + id;
            var ctr_obj = "#ctr_" + id;
            var input_codigo = document.getElementById(id);
            var patron = /^[0-9]{1,}$/;
            var esCoincidente = patron.test($(id_obj).val());
            if(esCoincidente) {
                input_codigo.setCustomValidity("");
                $("#pdesc").html("");
                $(ctr_obj).val(0);
            }
            else {
                input_codigo.setCustomValidity("No es un patrón válido de código de entrevista");
                var texto = "No es un patrón válido para " + desc;
                //alert(texto);
                $("#pdesc").html(texto).css("color","red");
                $(ctr_obj).val(1);
                control = 1;
            }
            
            //Se válida que sea el código correcto
            if(control == 0) {
                //alert ($(id_obj).val());
                //alert ($("#txtcodent").val());
                //alert ("código ingresado = " + $(id_obj).val() + "... código en bd = " + $("#txtcodent").val());
                if($(id_obj).val() == $("#txtcodent").val()) {
                    input_codigo.setCustomValidity("");
                    $("#pdesc").html("");
                    $(ctr_obj).val(0);
                }
                else {
                    input_codigo.setCustomValidity("No es el código de entrevista asociado al número de identificación");
                    var texto = "No es el código de entrevista asociado al número de identificación.";
                    $("#pdesc").html(texto).css("color","red");
                    $(ctr_obj).val(1);
                    control = 1;
                }
            }
            
            //Se valida que el código no sea 0
            if(control == 0) {
                if($(id_obj).val() == 0) {
                    var texto = "El código de entrevista no puede ser cero.";
                    $("#pdesc").html(texto).css("color","red");
                    $(ctr_obj).val(1);
                    control = 1;
                }
            }
            mostrar_submit();
        }
		
		function habilitarControles() {
			//$("#register_telefono").removeAttr("disabled");
            $("#register_lugar").removeAttr("disabled");
            $("#register_year").removeAttr("disabled");
            $("#register_direccion").removeAttr("disabled");
            $("#register_ciudad").removeAttr("disabled");
            
            //$("#register_direccionA").removeAttr("disabled");
			$(".ArchivosAdjuntos").removeAttr("disabled");
			
		}
		
		function deshabilitarControles() {
			//$("#register_telefono").attr("disabled", "disabled");
            $("#register_lugar").attr("disabled", "disabled");
            $("#register_year").attr("disabled", "disabled");
            $("#register_direccion").attr("disabled", "disabled");
            $("#register_ciudad").attr("disabled", "disabled");
            
            //$("#register_direccionA").attr("disabled", "disabled");
			$(".ArchivosAdjuntos").attr("disabled", "disabled");			
		}
		
		function registroMatricula(doc, codigo) {
			$.ajax({
                type:"POST",
        		url:"registro_matricula.php",
        		data:"documento=" + doc + "&c=" + codigo,
        		success:function(r) {
        		    var res = JSON.parse(r);
        		    var r_est = res.estado;
        		    //alert(r_est);
        		    var grados = res.grados;
        		    var cod_ent = res.cod_ent;
        		    var cod_prem = res.cod_prematricula;
        		    var gra = res.grados[0].gra.toUpperCase();
        		    var idest = res.id;
        		    
        		    $("#register_estado").val(r_est);
        		    
        		    var contenido2=$("#divcodigo");
                    //contenido2.slideUp(250);
                        
        		    if(r_est == "activo") {
        		        //alert("Este documento ya se encuentra activo en el grado " + r_grado);
        		        $("#msgdocumento").html("Este documento ya se encuentra activo en el grado " + gra + ".");
        		        
        		        deshabilitarControles();
        		    }
        		    else if(r_est == "solicitud") {
        		        var r_grado = res.grados[0].gra;
        		        //alert("Este documento ya tiene una solicitud de matrícula en el grado " + r_grado);
        		        $("#msgdocumento").html("Este documento ya tiene una solicitud de matrícula en el grado " + r_grado + ".");
        		        
        		        deshabilitarControles();
        		    }
        		    else if(r_est == "reprobado" || r_est == "retirado") {
        		        var r_grado = res.grados[0].gra;
        		        //$("#msgdocumento").html("Puede realizar proceso de matrícula para el grado " + r_grado + ".");
						$("#msgdocumento").html("Esta url no está habilitada para este documento.");
        		        
        		        deshabilitarControles();
        		    }
        		    else if(r_est == "inactivo") {
        		        $("#msgdocumento").html("Este documento se encuentra inactivo en este momento. Comunícate con Secretaría Académica.");
        		        
        		        deshabilitarControles();
        		    }
        		    else if(r_est == "aprobado") {
        		        var r_grado = res.grados[0].gra;
        		        //$("#msgdocumento").html("Estudiante antiguo, puede realizar proceso de matícula para el grado " + r_grado + ".");
						$("#msgdocumento").html("Esta url no está habilitada para este documento.");
        		        
        		        deshabilitarControles();
        		    }
        		    else if(r_est == "NO_EXISTE") {
        		        $("#msgdocumento").html("Este documento no tiene un proceso de matrícula abierto");
        		        
        		        deshabilitarControles();
        		    }
        		    else if(r_est == "pre_solicitud" && cod_prem == "OK") {
        		        var r_grado = res.grados[0].gra;
        		        var prefijo = $("#prefijo").val();
        		        $("#msgdocumento").html("Puede continuar con proceso de matícula para el grado " + r_grado + ".");
        		        
        		        habilitarControles();
                        
                        //Se selecciona el grado
                        $("#grado_permitido").val(grados[0].id_gra);                        
                        //$("#txtcodent").val(res.cod_ent);
                        
                        $("#register_apellidos").val(res.apellidos);
                        //$("#register_apellidos").attr('readonly','readonly');
                        $("#ctr_register_apellidos").val(0);
                        
						$("#register_nombres").val(res.nombres);
                        //$("#register_nombres").attr('readonly','readonly');
                        $("#ctr_register_nombres").val(0);
                        
                        $("#register_grado").val(gra);
                        //$("#register_grado").attr('readonly','readonly');
                        $("#ctr_register_grado").val(0);
                        
                        $("#register_tipo_documento").val(res.tdoc);
                        //$("#register_tipo_documento").attr('readonly','readonly');
                        $("#ctr_register_tipo_documento").val(0);
                        
                        $("#register_email").val(res.email_prematricula);
						//$("#register_email").attr('readonly','readonly');
						$("#ctr_register_email").val(0);
                        
                        $("#register_telefono").val(res.tel);
                        //$("#register_telefono").attr('readonly','readonly');
                        if(res.tel == 0) {
                            $("#ctr_register_telefono").val(1);
                        }
                        else {
                            $("#ctr_register_telefono").val(0);
                        }

						$("#register_lugar").val(res.expedicion);
						if(res.expedicion == "") {
                            $("#ctr_register_lugar").val(1);
                        }
                        else {
                            $("#ctr_register_lugar").val(0);
                        }
						
						$("#register_year").val(res.fn);
						if(res.fn == "") {
                            $("#ctr_register_year").val(1);
                        }
                        else {
                            $("#ctr_register_year").val(0);
                        }
						
						$("#register_direccion").val(res.direccione);
						if(res.direccione == "") {
                            $("#ctr_register_direccion").val(1);
                        }
                        else {
                            $("#ctr_register_direccion").val(0);
                        }
						
						$("#register_ciudad").val(res.ciudad);
						if(res.ciudad == "") {
                            $("#ctr_register_ciudad").val(1);
                        }
                        else {
                            $("#ctr_register_ciudad").val(0);
                        }
                        
                        //---------------------------------------------------------
                        $("#register_nombresA").val(res.acudiente);
                        //$("#register_nombresA").attr('readonly','readonly');
                        $("#ctr_register_nombresA").val(0);
                        
                        $("#register_documentoA").val(res.docA);
                        //$("#register_documentoA").attr('readonly','readonly');
                        $("#ctr_register_documentoA").val(0);
                        
                        $("#register_direccionA").val(res.direccion);
						//$("#register_direccionA").attr('readonly','readonly');
						$("#ctr_register_direccionA").val(0);
                        
                        $("#register_celularA").val(res.telA);
						//$("#register_celularA").attr('readonly','readonly');
						$("#ctr_register_celularA").val(0);
                        
                        $("#register_correoA").val(res.emailA);
                        //$("#register_correoA").attr('readonly','readonly');
                        $("#ctr_register_correoA").val(0);
                        
                        mostrar_submit();
        		    }
        		    else if(r_est == "pre_solicitud" && cod_prem == "NO") {
        		        //alert("Documento nuevo, puede realizar proceso de matrícula");
        		        //$("#msgdocumento").html("Este documento no está habilitado para este link");
						$("#msgdocumento").html("No es posible realizar la matrícula. Las fechas de inscripción para el primer periodo han finalizado");
        		        
        		        deshabilitarControles();                        
        		    }
					$("#cargando").hide();
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
		mark {
			color: red;
		}
		.fa-asterisk {
			color: red;
		}
		
		/*************** header-admisiones ************/
		#header-admisiones {
			background: #1E2A57;
			position: relative;
		}
		#divMatriculas {
			position: absolute;
			right: 3%;
			width: 55%;
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
			text-align: justify;
		}
		#tituloCinco, #tituloSeis {
			color: #Da0229;
		}
		.imgCuatro {
			width: 80%; 
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
		.pOcho {
			text-align: justify;
		}
		.pSSEC {
			text-align: justify;
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
			font-size: 16px;
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
		.file-input, .file-input p, .file-input label, .lblAcepto {
			font-size: 16px !important;
		}
		
		.error {
            border: 3px solid red !important;
        }        
		
		@media only screen and (max-width: 650px) {
			#imgh1 {
				width: 35%; 
				height: auto;
				margin-top: 2%;
				margin-bottom: 2%;
			}
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
			.file-input, .file-input p, .file-input label, .lblAcepto {
				font-size: 12px !important;
			}
		}
    </style>
	
</head>
<body>

    <!--== Header Area Start ==-->
    <header id="header-admisiones">
        <div class="row">
			<img src="assets/img/admisiones/Admisiones_2025_1.jpg" id="imgh1" class="img-fluid"/>
		</div>
    </header><br><br><br><br>
    <!--== Header Area End ==-->
    
    <div id="divcargando" class="loader" style="display: none;"></div>
	
	<div class="container" id="divCuatro">
		<br>
		<div class="row">
			<div class="col-12">
				<center><h3 id="tituloCuatro"><strong>FINALIZAR PROCESO DE MATRÍCULA 2025</strong></h3></center>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">				
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4">
				<img src="assets/img/admisiones/estudiantes_antiguos.png" alt="" class="img-fluid imgCuatro"/>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4">				
			</div>
		</div><br>
		
	</div><br>
	
	<div class="container" id="divOcho">
		<div class="row">
			<div class="col-12">
				<center>
					<!--<hr color="#Ff9805" style="height:5px; width: 15%;">-->
					<h6 class="tituloOcho"><br/>(Se recomienda utilizar navegadores diferentes a Internet Explorer)</h6>
				</center>
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
						<h6>VALIDAR NÚMERO DE DOCUMENTO DEL ESTUDIANTE</h6>
					</div>
				</div>
				<br>
			</div>		
		</div><br>
		
		<form name="formulario" id="formulario" method="post" action="https://unicab.solutions/send_f_antiguos.php" enctype="multipart/form-data">
			<div class="row">
				<div class="col-12">
					<center>
						<div class="form-group" align="center" id="contieneSelect2">
							<input type="text" class="form-control borde-personalizado" id="register_documento" name="register_documento" required placeholder="número de documento" maxlength="20" onkeyup="validar_numero('register_documento', 'Número de documento');">
							<input type="hidden" style="width: 20px" id="ctr_register_documento" value="1"/><br>
							<button type="button" class="btn btn-brand" onclick="val_documento();" style="background-color: #42C3AE !important;">Continuar</button>
							<h5 id="msgdocumento" style="color: blue;"></h5>
							<input type="hidden" id="register_estado"/>
							<input type="hidden" id="txt_codigo" value="<?php echo $codigo; ?>"/><br>
							<img src="assets/img/admisiones/ajaxloader.gif" id="cargando" class="img-fluid"/>
						</div>
					</center>
				</div>
			</div><br>
			
			<div class="container datosEstudiante">
				<div class="container">
					<div class="row">
						<div class="col-md-2 col-2 azulclaro">
							<h6>Paso 2</h6>
						</div>
						<div class="col-md-10 col-10 azuloscuro">
							<h6>Paso 2</h6>
							<h6>DATOS FINALES DEL ESTUDIANTE</h6>
						</div>
					</div>
					<br>
				</div>		
			</div><br>
			
			<div class="row ml-5">
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_apellidos">Apellidos</label>
						<input type="text" class="form-control borde-personalizado" id="register_apellidos" name="register_apellidos" required onkeyup="mayus(this, 'register_apellidos', 'Apellidos');" readonly>
						<input type="hidden" style="width: 20px" id="ctr_register_apellidos" value="1"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_nombres">Nombres</label>
						<input type="text" class="form-control borde-personalizado" id="register_nombres" name="register_nombres" required onkeyup="mayus(this, 'register_nombres', 'Nombres');" readonly>
						<input type="hidden" style="width: 20px" id="ctr_register_nombres" value="1"/>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_grado" id="lblgrado">Grado al que ingresas</label><br>
						<input type="text" class="form-control borde-personalizado" id="register_grado" name="register_grado" required readonly>
						<input type="hidden" style="width: 20px" id="ctr_register_grado" value="1"/> 
						<input type="hidden" id="grado_permitido" value="0"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_tipo_documento" id="lbltd">Tipo de documento de identidad</label><br>
						<input type="text" class="form-control borde-personalizado" id="register_tipo_documento" name="register_tipo_documento" required readonly>
						<input type="hidden" style="width: 20px" id="ctr_register_tipo_documento" value="1"/> 
					</div>
				</div>
			</div>
			
			<div class="row ml-5">
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_email">Correo electrónico</label>
						<input type="text" class="form-control borde-personalizado" id="register_email" name="register_email" required onkeyup="validar_email('register_email', 'Correo electrónico');" readonly>
						<input type="hidden" style="width: 20px" id="ctr_register_email" value="1"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_telefono">Número telefónico</label>
						<input type="text" class="form-control borde-personalizado" id="register_telefono" name="register_telefono" required onkeyup="validar_numero('register_telefono', 'Número telefónico');" readonly>
						<input type="hidden" style="width: 20px" id="ctr_register_telefono" value="1"/>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_lugar">Lugar de expedición del documento</label>
						<input type="text" class="form-control borde-personalizado" id="register_lugar" name="register_lugar" required placeholder="Escribe el lugar de expedición del documento del estudiante" onkeyup="mayus(this, 'register_lugar', 'Lugar de expedición');" disabled>
						<input type="hidden" style="width: 20px" id="ctr_register_lugar" value="1"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_year">Fecha de nacimiento (yyyy-mm-dd)</label>
						<input type="text" class="form-control borde-personalizado" id="register_year" name="register_year" required placeholder="Fecha de nacimiento" onkeyup="validar_fecha('register_year', 'Fecha de nacimiento');" disabled>
						<input type="hidden" style="width: 20px" id="ctr_register_year" value="1"/>
						<input type="hidden" id="ctr_vacunacion" value="0"/>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_direccion">Dirección de residencia</label>
						<input type="text" class="form-control borde-personalizado" id="register_direccion" name="register_direccion" required placeholder="Escribe la dirección de residencia del estudiante" onkeyup="mayus(this, 'register_direccion', 'Dirección de residencia');" disabled>
						<input type="hidden" style="width: 20px" id="ctr_register_direccion" value="1"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_ciudad">Ciudad de Residencia</label>
						<input type="text" class="form-control borde-personalizado" id="register_ciudad" name="register_ciudad" required placeholder="Escribe la ciudad de residencia del estudiante" onkeyup="mayus(this, 'register_ciudad', 'Ciudad de residencia');" disabled>
						<input type="hidden" style="width: 20px" id="ctr_register_ciudad" value="1"/>
					</div>
				</div>
			</div>
			
			<br>
			<div class="container datosEstudiante">
				<div class="container">
					<div class="row">
						<div class="col-md-2 col-2 azulclaro">
							<h6>Paso 3</h6>
						</div>
						<div class="col-md-10 col-10 azuloscuro">
							<h6>Paso 3</h6>
							<h6>INFORMACIÓN DEL ACUDIENTE</h6>
						</div>
					</div>
					<br>
				</div>		
			</div><br>
			
			<div class="row ml-5">
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_nombresA">Nombres</label>
						<input type="text" class="form-control borde-personalizado" id="register_nombresA" name="register_nombresA" required onkeyup="mayus(this, 'register_nombresA', 'Nombres acudiente');" readonly>
						<input type="hidden" style="width: 20px" id="ctr_register_nombresA" value="1"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_docuentoA">Documento</label>
						<input type="text" class="form-control borde-personalizado" id="register_documentoA" name="register_documentoA" required onkeyup="validar_numero('register_documentoA', 'Documento acudiente');" readonly>
						<input type="hidden" style="width: 20px" id="ctr_register_documentoA" value="1"/>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_direccionA">Dirección de residencia</label>
						<input type="text" class="form-control borde-personalizado" id="register_direccionA" name="register_direccionA" required onkeyup="mayus(this, 'register_direccionA', 'Direccion de residencia acudiente');" readonly>
						<input type="hidden" style="width: 20px" id="ctr_register_direccionA" value="1"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_celularA">Celular</label>
						<input type="text" class="form-control borde-personalizado" id="register_celularA" name="register_celularA" required onkeyup="validar_numero('register_celularA', 'Celular acudiente');" readonly>
						<input type="hidden" style="width: 20px" id="ctr_register_celularA" value="1"/>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">
				<div class="col-12 col-sm-5">
					<div class="form-group">
						<label for="register_correoA">Correo Electrónico</label>
						<input type="text" class="form-control borde-personalizado" id="register_correoA" name="register_correoA" required onkeyup="validar_email('register_correoA', 'Correo electrónico acudiente');" readonly>
						<input type="hidden" style="width: 20px" id="ctr_register_correoA" value="1"/>
					</div>
				</div>
				<div class="col-1">
				</div>
				<div class="col-12 col-sm-5">
				</div>
			</div>
			
			<br>
			<div class="container datosEstudiante">
				<div class="container">
					<div class="row">
						<div class="col-md-2 col-2 azulclaro">
							<h6>Paso 4</h6>
						</div>
						<div class="col-md-10 col-10 azuloscuro">
							<h6>Paso 4</h6>
							<h6>SUBE EL CONTRATO DE MATRÍCULA Y PAGARÉ</h6>
						</div>
					</div>
					<br>
				</div>		
			</div><br>
			
			<div class="row ml-5">
				<div class="col-12">
					<div class="form-group file-input">   
						<label for="adjunto"><i class="fa fa-asterisk" aria-hidden="true"></i><span style="color: transparent;">_</span>
						<i class="fa fa-upload"></i> Adjunta el contrato diligenciado y firmado  
						<a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"> (Ayuda)</a></label><br>
					
						<div class="collapse" id="collapseExample">
							<div class="card card-body">
								<p>Imprime, diligencia todos los campos, escanea en un archivo pdf y adjunta el documento. <span class="badge badge-secondary">Formato PDF</span></p>
							</div>
						</div>
						<input type="file" id="adjunto" name="adjunto" required accept=".pdf" class="ArchivosAdjuntos" disabled>
						<!--<input type="file" id="adjunto" name="adjunto" required accept=".xlsx" class="ArchivosAdjuntos">-->
					</div>
				</div>
				
				<div class="col-12">
					<div class="form-group file-input">   
						<label for="adjuntoPagare"><i class="fa fa-asterisk" aria-hidden="true"></i><span style="color: transparent;">_</span>
						<i class="fa fa-upload"></i> Adjunta el pagaré diligenciado y firmado  
						<a data-toggle="collapse" href="#collapseExamplePagare" role="button" aria-expanded="false" aria-controls="collapseExamplePagare"> (Ayuda)</a></label><br>
					
						<div class="collapse" id="collapseExamplePagare">
							<div class="card card-body">
								<p>Imprime, diligencia los campos, escanea en un archivo pdf y adjunta el documento. <span class="badge badge-secondary">Formato PDF</span></p>
							</div>
						</div>
						<input type="file" id="adjuntoPagare" name="adjuntoPagare" required accept=".pdf" class="ArchivosAdjuntos" disabled>
						<!--<input type="file" id="adjunto" name="adjunto" required accept=".xlsx" class="ArchivosAdjuntos">-->
					</div>
				</div>
			</div>
			
			<br>
			<div class="container datosEstudiante">
				<div class="container">
					<div class="row">
						<div class="col-md-2 col-2 azulclaro">
							<h6>Paso 5</h6>
						</div>
						<div class="col-md-10 col-10 azuloscuro">
							<h6>Paso 5</h6>
							<h6>SUBE LOS SIGUIENTES DOCUMENTOS DEL ESTUDIANTE</h6>
						</div>
					</div>
					<br>
				</div>		
			</div><br>
			
			<div class="row ml-5">
				<div class="col-12">
					<div class="form-group file-input">   
						<label for="adjunto2"><i class="fa fa-asterisk" aria-hidden="true"></i><span style="color: transparent;">_</span>
						<i class="fa fa-upload"></i> Adjunta el documento de identidad del estudiante <mark><u>(solo si cambió)</u></mark>
						<a data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4"> (Ayuda)</a></label><br>
						<div class="collapse" id="collapseExample4">
							<div class="card card-body">
								<p>Escanea y sube el documento de identidad actual del estudiante. <span class="badge badge-secondary">Formato PDF</span></p>
							</div>
						</div>
						<input type="file" id="adjunto2" name="adjunto2" accept=".pdf" class="ArchivosAdjuntos" disabled>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">
				<div class="col-12">
					<div class="form-group file-input">   
						<label for="adjunto5"><i class="fa fa-upload"></i> Adjunta el certificado de actividad extracurricular <mark><u>(solo si cambió)</u></mark> 
						<a data-toggle="collapse" href="#collapseExample7" role="button" aria-expanded="false" aria-controls="collapseExample7"> (Ayuda)</a></label><br>
						<div class="collapse" id="collapseExample7">
							<div class="card card-body">
								<p>Escanea y sube el certificado de actividad extracurricular emitido por la academia o escuela.  <span class="badge badge-secondary">Formato PDF</span></p>
							</div>
						</div>
						<input type="file" id="adjunto5" name="adjunto5" accept=".pdf" class="ArchivosAdjuntos" disabled>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">
				<div class="col-12">
					<div class="form-group file-input">   
						<label for="adjunto7"><i class="fa fa-asterisk" aria-hidden="true"></i><span style="color: transparent;">_</span>
						<i class="fa fa-upload"></i> Adjunta una fotografía reciente del estudiante
						<a data-toggle="collapse" href="#collapseExample9" role="button" aria-expanded="false" aria-controls="collapseExample9"> (Ayuda)</a></label><br>
						<div class="collapse" id="collapseExample9">
							<div class="card card-body">
								<p>Sube una fotografía reciente, la misma que usaste en la Hoja de Matrícula. <span class="badge badge-secondary">Formato JPG</span></p>
							</div>
						</div>
						<input type="file" id="adjunto7" name="adjunto7" required accept=".jpg,.png,.jpeg" class="ArchivosAdjuntos" disabled>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">
				<div class="col-12">
					<div class="form-group file-input">   
						<label for="adjunto9"><i class="fa fa-asterisk" aria-hidden="true"></i><span style="color: transparent;">_</span>
						<i class="fa fa-upload"></i> Adjunta el certificado de la EPS
						<a data-toggle="collapse" href="#collapseExample11" role="button" aria-expanded="false" aria-controls="collapseExample11"> (Ayuda)</a></label><br>
						<div class="collapse" id="collapseExample11">
							<div class="card card-body">
								<p>Escanea y sube el certificado de afiliación o el carné de la EPS. <span class="badge badge-secondary">Formato PDF</span></p>
							</div>
						</div>
						<input type="file" id="adjunto9" name="adjunto9" required accept=".pdf" class="ArchivosAdjuntos" disabled>
					</div>
				</div>
			</div>
			
			<br>
			<div class="container datosEstudiante">
				<div class="container">
					<div class="row">
						<div class="col-md-2 col-2 azulclaro">
							<h6>Paso 6</h6>
						</div>
						<div class="col-md-10 col-10 azuloscuro">
							<h6>Paso 6</h6>
							<h6>SUBE LOS SIGUIENTES DOCUMENTOS ACADÉMICOS DEL ESTUDIANTE</h6>
						</div>
					</div>
					<br>
				</div>		
			</div><br>
			
			<div class="row ml-5">
				<div class="col-12">
					<div class="form-group file-input">   
						<label for="adjunto8"><i class="fa fa-asterisk" aria-hidden="true"></i><span style="color: transparent;">_</span>
						<i class="fa fa-upload"></i> Adjunta el paz y salvo de Unicab año lectivo anterior
						<a data-toggle="collapse" href="#collapseExample10" role="button" aria-expanded="false" aria-controls="collapseExample10"> (Ayuda)</a></label><br>
						<div class="collapse" id="collapseExample10">
							<div class="card card-body">
								<p>Escanea y sube el paz y salvo del colegio anterior. <span class="badge badge-secondary">Formato PDF</span></p>
							</div>
						</div>
						<input type="file" id="adjunto8" name="adjunto8" required accept=".pdf" class="ArchivosAdjuntos" disabled>
					</div>
				</div>
			</div>
			
			<div class="row ml-5">
				<div class="col-12">
					<div class="form-group file-input">   
						<label for="adjunto10"><i class="fa fa-asterisk" aria-hidden="true"></i><span style="color: transparent;">_</span>
						<i class="fa fa-upload"></i> Adjunta el comprobante del primer pago por concepto de <mark><u>matrícula 2025</u></mark> únicamente
						<a data-toggle="collapse" href="#collapseExample12" role="button" aria-expanded="false" aria-controls="collapseExample12"> (Ayuda)</a></label><br>
						<div class="collapse" id="collapseExample12">
							<div class="card card-body">
								<p>Sube el comprobante del primer pago donde se incluye:<br>Matrícula + otros cobros periódicos + póliza estudiantil + primer mes de pensión.  <span class="badge badge-secondary">Formato PDF</span></p><br>
								<h6> A continuación, las opciones para realizar el pago:</h6> 
								<p>
								<b>ENTIDAD:</b> BANCO AV VILLAS. Solicitar formato Comprobante Universal de Recaudo
								<br><b>CUENTA:</b>  CORRIENTE No. 72017457-2
								<br><b>TITULAR:</b>  UNICAB CORPORACION EDUCATIVA
								<br><b>REFERENCIA:</b> COLOCAR NÚMERO DE DOCUMENTO ACUDIENTE  
								<br><b>MEDIOS DE PAGO:</b> CONSIGNACIÓN, TRANSFERENCIA Y PAGO POR PSE<br>
								
								<br><b>ENTIDAD:</b> BANCO CAJA SOCIAL
								<br><b>CUENTA:</b>  CORRIENTE No. 21003786216
								<br><b>TITULAR:</b>  UNICAB CORPORACION EDUCATIVA
								<br><b>REFERENCIA:</b> NÚMERO DE DOCUMENTO ACUDIENTE  
								<br><b>MEDIOS DE PAGO:</b> CONSIGNACIÓN, TRANSFERENCIA Y PAGO POR PSE
								<br></p>
							</div>
						</div>
					   <input type="file" id="adjunto10" name="adjunto10" required accept=".pdf" class="ArchivosAdjuntos" disabled>
					</div>
				</div>
			</div>
			
			<br>
			<div class="container datosEstudiante">
				<div class="container">
					<div class="row">
						<div class="col-md-2 col-2 azulclaro">
							<h6>Paso 7</h6>
						</div>
						<div class="col-md-10 col-10 azuloscuro">
							<h6>Paso 7</h6>
							<h6>SUBE LOS SIGUIENTES DOCUMENTOS DEL ACUDIENTE</h6>
						</div>
					</div>
					<br>
				</div>		
			</div><br>
			
			<div class="row ml-5">
				<div class="col-12">
					<div class="form-group file-input">   
						<label for="adjunto3"><i class="fa fa-asterisk" aria-hidden="true"></i><span style="color: transparent;">_</span>
						<i class="fa fa-upload"></i> Adjunta el documento de identidad del acudiente <mark><u>(solo si cambió)</u></mark>
						<a data-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="false" aria-controls="collapseExample5"> (Ayuda)</a></label><br>
						<div class="collapse" id="collapseExample5">
							<div class="card card-body">
								<p>Escanea y sube el documento de identidad del acudiente. <span class="badge badge-secondary">Formato PDF</span></p>
							</div>
						</div>
						<input type="file" id="adjunto3" name="adjunto3" accept=".pdf" class="ArchivosAdjuntos" disabled>
					</div>
				</div>
			</div>
			
			<br>
			<div class="container datosEstudiante">
				<div class="container">
					<div class="row">
						<div class="col-md-2 col-2 azulclaro">
							<h6>Paso 8</h6>
						</div>
						<div class="col-md-10 col-10 azuloscuro">
							<h6>Paso 8</h6>
							<h6>ENVIAR FORMULARIO</h6>
						</div>
					</div>
					<br>
				</div>		
			</div><br>
			
			<div class="row ml-5">
				<div class="col-12">
					<div class="form-group ghf">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="customCheck1" required>
							<label class="custom-control-label lblAcepto" for="customCheck1"> Acepto  <a href="#" style="color:#0C0;" Data-toggle="modal" data-target="#exampleModalScrollable">Términos y condiciones</a> y autorizo el uso de mis datos personales en este proceso.</label>
							
						</div>
						<input type="hidden" name="verificacion">
						<input type="submit" id="btnEnviar" class="btn btn-info form-control" value="Enviar" style="background-color: #42C3AE;" disabled>
					</div>
				</div>
			</div>
			
			<!-- ******************************************** -->
			<input type="hidden" id="prefijo" name="prefijo" value="<?php echo $prefijo; ?>"/>
			<!-- ******************************************** -->
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

    <!-- SITE SCRIPT  -->
    <!--VALIDA TAMAÑO DE INPUT FILE-->
    <script>
        var uploadField = document.getElementById("adjunto");
		var uploadFieldPagare = document.getElementById("adjuntoPagare");
    	var uploadField2 = document.getElementById("adjunto2");
		var uploadField3 = document.getElementById("adjunto3");
    	var uploadField4 = document.getElementById("adjunto4");
    	var uploadField5 = document.getElementById("adjunto5");
    	var uploadField6 = document.getElementById("adjunto6");
    	var uploadField7 = document.getElementById("adjunto7");
    	var uploadField8 = document.getElementById("adjunto8");
    	var uploadField9 = document.getElementById("adjunto9");
    	var uploadField10 = document.getElementById("adjunto10");
    	//var uploadField11 = document.getElementById("adjunto11");
    	var uploadField12 = document.getElementById("adjunto12");
    	//var uploadField13 = document.getElementById("adjunto13");
		var uploadField14 = document.getElementById("adjunto14");
		//var uploadField15 = document.getElementById("adjunto15");
		var uploadField16 = document.getElementById("adjunto16");
    	var uploadField17 = document.getElementById("adjunto17");
    	
    	medir2(uploadField);
		medir2(uploadFieldPagare);
    	medir(uploadField2);
		medir(uploadField3);
    	medir(uploadField4);
    	medir(uploadField5);
    	medir(uploadField6);
    	medir(uploadField7);
    	medir(uploadField8);
    	medir(uploadField9);
    	medir(uploadField10);
    	//medir(uploadField11);
    	medir(uploadField12);
		//medir(uploadField13);
		medir(uploadField14);
		//medir(uploadField15);
		medir(uploadField16);
    	medir(uploadField17);
    	
    	function validarExtension(datos) {
            var extensionesValidas = ".png, .jpeg, .jpg, .pdf";
            var ruta = datos.value;
            var extension = ruta.substring(ruta.lastIndexOf('.') + 1).toLowerCase();
            var extensionValida = extensionesValidas.indexOf(extension);
            
            if(extensionValida < 0) {
                alert("¡El tipo de archivo no es permitido!\n Intenta usando archivos: png, jpg, jpeg, pdf");
                datos.value = "";
                datos.style.color="#F00";
                datos.style.border="solid 1px #F00";
                return false;
            }else {
                return true;
                $('#texto').text('');
            }
        }
    	
    	function medir(uploadField) {
    		uploadField.onchange = function() {
    			if(this.files[0].size > 2048000){
                    alert("El archivo es muy grande, el tamaño máximo es 2000 kB");
                    this.value = "";
                    uploadField.style.color="#F00";
                    uploadField.style.border="solid 1px #F00";
    			}
    			else {
        			uploadField.style.color="#27ae60";
        			uploadField.style.border="none";
    					
    				validarExtension(uploadField);
    			}
    		};
    	}
    	
    	function medir2(uploadField) {
    		uploadField.onchange = function() {
    			if(this.files[0].size > 4100000){
                    alert("El archivo es muy grande, el tamaño máximo permitido es 4000 kB");
                    this.value = "";
                    uploadField.style.color="#F00";
                    uploadField.style.border="solid 1px #F00";
    			}
    			else {
        			uploadField.style.color="#27ae60";
        			uploadField.style.border="none";
    					
    				validarExtension(uploadField);
    			}
    		};
    	}
    </script>
    <!--FIN VALIDA TAMAÑO-->
    
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
