<?php
    include "admin-unicab/php/conexion.php";
    //https://unicab.org/admisiones_final.php?c=52p89vpv3p
    
    $codigo = $_REQUEST['c'];
    $prefijo = substr($codigo, 0, 4);
    
    //Se busca el id del estudiante
    /*$sql_idest = "SELECT id FROM estudiantes 
        WHERE n_documento = (SELECT identificacion FROM tbl_cod_pre_matricula WHERE codigo = '$codigo')";
    $exe_idest = mysqli_query($conexion,$sql_idest);
    while ($row_idest = mysqli_fetch_array($exe_idest)) {
        $idest = $row_idest['id'];
    }
    if($idest < 1155) {
        $codigo_entrevista_comodin = -1;
    }*/
    
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
            //$(".ghf").addClass("oculto");
            //$(".file-input").addClass("oculto");
            var contenido=$(".ghf");
            contenido.slideUp(250);
            var contenido1=$(".file-input");
            contenido1.slideUp(250);
            /*var contenido2=$("input[type='file']");
            contenido2.slideUp(250);*/
            
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
            var a = parseInt($("#ctr_register_apellidos").val());
            var b = parseInt($("#ctr_register_nombres").val());
            var c = parseInt($("#ctr_register_documento").val());
            var d = parseInt($("#ctr_register_year").val());
            var e = parseInt($("#ctr_register_lugar").val());
            var f = parseInt($("#ctr_register_direccion").val());
            var g = parseInt($("#ctr_register_ciudad").val());
            var h = parseInt($("#ctr_register_email").val());
            var i = parseInt($("#ctr_register_telefono").val());
            var j = parseInt($("#ctr_register_actividad").val());
            var k = parseInt($("#ctr_register_grado").val());
            var td = parseInt($("#ctr_register_tipo_documento").val());
            var gen = parseInt($("#ctr_register_genero").val());
            var cod = parseInt($("#ctr_register_codigo").val());
            //alert(d);
            
            //var l = parseInt($("#ctr_register_apellidosA").val());
            var m = parseInt($("#ctr_register_nombresA").val());
            var n = parseInt($("#ctr_register_documentoA").val());
            var o = parseInt($("#ctr_register_direccionA").val());
            var p = parseInt($("#ctr_register_celularA").val());
            var q = parseInt($("#ctr_register_correoA").val());
            
            var r = parseInt($("#ctr_vacunacion").val());
            
            control = parseInt($("#ctr_register_apellidos").val()) + parseInt($("#ctr_register_nombres").val()) + parseInt($("#ctr_register_documento").val()) + 
                parseInt($("#ctr_register_year").val()) + parseInt($("#ctr_register_lugar").val()) + parseInt($("#ctr_register_direccion").val()) + 
                parseInt($("#ctr_register_ciudad").val()) + parseInt($("#ctr_register_email").val()) + parseInt($("#ctr_register_telefono").val()) + 
                parseInt($("#ctr_register_actividad").val()) + parseInt($("#ctr_register_grado").val()) + parseInt($("#ctr_register_codigo").val()) + 
                parseInt($("#ctr_register_tipo_documento").val()) + parseInt($("#ctr_register_genero").val()) + 
                parseInt($("#ctr_register_nombresA").val()) + parseInt($("#ctr_register_documentoA").val()) + 
                parseInt($("#ctr_register_direccionA").val()) + parseInt($("#ctr_register_celularA").val()) + parseInt($("#ctr_register_correoA").val()) + 
                parseInt($("#ctr_vacunacion").val());
            
            //alert(control);
            if(control > 0) {
                $("#btnEnviar").hide();
            }
            else {
                $("#btnEnviar").show();
            }
            
            (a == 1) ? $("#register_apellidos").addClass("error") : $("#register_apellidos").removeClass("error");
            (b == 1) ? $("#register_nombres").addClass("error") : $("#register_nombres").removeClass("error");
            (c == 1) ? $("#register_documento").addClass("error") : $("#register_documento").removeClass("error");
            (d == 1) ? $("#register_year").addClass("error") : $("#register_year").removeClass("error");
            (e == 1) ? $("#register_lugar").addClass("error") : $("#register_lugar").removeClass("error");
            (f == 1) ? $("#register_direccion").addClass("error") : $("#register_direccion").removeClass("error");
            (g == 1) ? $("#register_ciudad").addClass("error") : $("#register_ciudad").removeClass("error");
            (h == 1) ? $("#register_email").addClass("error") : $("#register_email").removeClass("error");
            (i == 1) ? $("#register_telefono").addClass("error") : $("#register_telefono").removeClass("error");
            (j == 1) ? $("#register_actividad").addClass("error") : $("#register_actividad").removeClass("error");
            (k == 1) ? $("#register_grado").addClass("error") : $("#register_grado").removeClass("error");
            //(k == 1) ? $("#lblgrado").addClass("error") : $("#lblgrado").removeClass("error");
            (td == 1) ? $("#register_tipo_documento").addClass("error") : $("#register_tipo_documento").removeClass("error");
            //(td == 1) ? $("#lbltd").addClass("error") : $("#lbltd").removeClass("error");
            (gen == 1) ? $("#register_genero").addClass("error") : $("#register_genero").removeClass("error");
            (gen == 1) ? $("#lblgen").addClass("error") : $("#lblgen").removeClass("error");
            (cod == 1) ? $("#register_codigo").addClass("error") : $("#register_codigo").removeClass("error");
            
            //(l == 1) ? $("#register_apellidosA").addClass("error") : $("#register_apellidosA").removeClass("error");
            (m == 1) ? $("#register_nombresA").addClass("error") : $("#register_nombresA").removeClass("error");
            (n == 1) ? $("#register_documentoA").addClass("error") : $("#register_documentoA").removeClass("error");
            (o == 1) ? $("#register_direccionA").addClass("error") : $("#register_direccionA").removeClass("error");
            (p == 1) ? $("#register_celularA").addClass("error") : $("#register_celularA").removeClass("error");
            (q == 1) ? $("#register_correoA").addClass("error") : $("#register_correoA").removeClass("error");
            
            (r == 1) ? $("#adjunto12").addClass("error") : $("#adjunto12").removeClass("error");
        }
        
        function val_documento() {
            //alert("hola");
            $(".loader").fadeOut("slow");
            
            //Se limpian los controles
            $("#register_nombres").val("");
            $("#register_apellidos").val("");
            $("#register_grado").val("");
            $("#register_tipo_documento").val("");
            $("#register_telefono").val("");
            $("#register_email").val("");
            $("#register_year").val("");
            $("#register_lugar").val("");
            $("#register_direccion").val("");
            $("#register_ciudad").val("");
            $("#register_actividad").val("");
            $("#register_genero").val("");
            $("#register_codigo").val(0);
            
            $("#register_nombresA").val("");
            //$("#register_apellidosA").val("");
            $("#register_documentoA").val("");
            $("#register_direccionA").val("");
            $("#register_celularA").val("");
            $("#register_correoA").val("");
            
            //-----------------------------
            $("#ctr_register_nombres").val(1);
            $("#ctr_register_apellidos").val(1);
            $("#ctr_register_grado").val(1);
            $("#ctr_register_tipo_documento").val(1);
            $("#ctr_register_telefono").val(1);
            $("#ctr_register_email").val(1);
            $("#ctr_register_year").val(1);
            $("#ctr_register_lugar").val(1);
            $("#ctr_register_direccion").val(1);
            $("#ctr_register_ciudad").val(1);
            $("#ctr_register_actividad").val(1);
            $("#ctr_register_genero").val(1);
            $("#ctr_register_codigo").val(1);
            
            $("#ctr_register_nombresA").val(1);
            //$("#ctr_register_apellidosA").val(1);
            $("#ctr_register_documentoA").val(1);
            $("#ctr_register_direccionA").val(1);
            $("#ctr_register_celularA").val(1);
            $("#ctr_register_correoA").val(1);

            var doc = $("#register_documento").val();
            var codigo = $("#txt_codigo").val();
            //Se valida si el documento corresponde al código de pre-matrícula
            
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
        		        
        		        //$(".ghf").addClass("oculto");
                        //$(".file-input").addClass("oculto");
                        var contenido=$(".ghf");
                        contenido.slideUp(250);
                        var contenido1=$(".file-input");
                        contenido1.slideUp(250);
        		    }
        		    else if(r_est == "solicitud") {
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
        		        //alert("Puede realizar proceso de matrícula para el grado " + r_grado);
        		        $("#msgdocumento").html("Puede realizar proceso de matrícula para el grado " + r_grado + ".");
        		        
        		        var contenido=$(".ghf");
        		        contenido.slideDown(250);
                        var contenido1=$(".file-input");
                        contenido1.slideDown(250);
                        
                        //Se selecciona el grado
                        //cargargrados(grados[0].id_gra);
                        $("#grado_permitido").val(grados[0].id_gra);
                        /*for (var i in grados) {
                            //alert (i + " " + grados[i].id_gra + " " + grados[i].gra);
                            alert(grados[i].gra);
                            alert(grados[i].id_gra);
                            $("#register_grado").append('<option value="' + grados[i].id_gra + '">' + grados[i].gra + '</option>');
                        }*/
                        
                        //alert (res.cod_ent);
                        $("#register_codigo").val(res.cod_ent);
        		    }
        		    else if(r_est == "inactivo") {
        		        //alert("Documento nuevo, puede realizar proceso de matrícula");
        		        $("#msgdocumento").html("Este documento se encuentra inactivo en este momento. Comunícate con Secretaría Académica.");
        		        
        		        var contenido=$(".ghf");
        		        contenido.slideUp(250);
                        var contenido1=$(".file-input");
                        contenido1.slideUp(250);
        		    }
        		    else if(r_est == "aprobado") {
        		        var r_grado = res.grados[0].gra;
        		        //alert("Documento nuevo, puede realizar proceso de matrícula");
        		        $("#msgdocumento").html("Estudiante antiguo, puede realizar proceso de matícula para el grado " + r_grado + ".");
        		        
        		        var contenido=$(".ghf");
        		        contenido.slideDown(250);
                        var contenido1=$(".file-input");
                        contenido1.slideDown(250);
                        
                        //Se selecciona el grado
                        //cargargrados(grados[0].id_gra);
                        $("#grado_permitido").val(grados[0].id_gra);
                        
                        
                        //alert (res.cod_ent);
                        $("#register_codigo").val(res.cod_ent);
        		    }
        		    else if(r_est == "NO_EXISTE") {
        		        //alert("Este documento ya se encuentra activo en el grado " + r_grado);
        		        $("#msgdocumento").html("Este documento no tiene un proceso de matrícula abierto");
        		        
        		        //$(".ghf").addClass("oculto");
                        //$(".file-input").addClass("oculto");
                        var contenido=$(".ghf");
                        contenido.slideUp(250);
                        var contenido1=$(".file-input");
                        contenido1.slideUp(250);
        		    }
        		    else if(r_est == "pre_solicitud" && cod_prem == "OK") {
        		        var r_grado = res.grados[0].gra;
        		        var prefijo = $("#prefijo").val();
        		        //alert("Documento nuevo, puede realizar proceso de matrícula");
        		        $("#msgdocumento").html("Puede continuar con proceso de matícula para el grado " + r_grado + ".");
        		        
        		        var contenido=$(".ghf");
        		        contenido.slideDown(250);
                        var contenido1=$(".file-input");
                        contenido1.slideDown(250);
                        
                        //Se selecciona el grado
                        //cargargrados(grados[0].id_gra);
                        $("#grado_permitido").val(grados[0].id_gra);
                        
                        
                        $("#txtcodent").val(res.cod_ent);
                        //$("#register_codigo").val(res.cod_ent);
                        if(res.cod_ent == -1) {
                            $("#ctr_register_codigo").val(1);
                            $("#divcodigo").hide();
                        }
                        else {
                            //alert (res.cod_ent);
                            $("#ctr_register_codigo").val(0);
                            $("#divcodigo").show();
                        }
                        
                        if(idest <= 1885) {
            		        $("#register_codigo").val(cod_ent);
            		        $("#ctr_register_codigo").val(0);
            		        $("#register_codigo").attr("disabled", "disabled");
            		    }
            		    /*else {
            		        $("#ctr_register_codigo").val(1);
            		        $("#register_codigo")
            		    }*/
                        
                        $("#register_nombres").val(res.nombres);
                        $("#register_nombres").attr('readonly','readonly');
                        $("#ctr_register_nombres").val(0);
                        
                        $("#register_apellidos").val(res.apellidos);
                        $("#register_apellidos").attr('readonly','readonly');
                        $("#ctr_register_apellidos").val(0);
                        
                        if(prefijo == "VER_") {
                            $("#register_email").val("");
                            $("#ctr_register_email").val(1);
                        }
                        else {
                            $("#register_email").val(res.email_prematricula);
                            $("#register_email").attr('readonly','readonly');
                            $("#ctr_register_email").val(0);
                        }
                        
                        $("#register_telefono").val(res.tel);
                        //$("#register_telefono").attr('readonly','readonly');
                        if(res.tel == 0) {
                            $("#ctr_register_telefono").val(1);
                        }
                        else {
                            $("#ctr_register_telefono").val(0);
                        }
                        
                        $("#register_grado").val(gra);
                        $("#register_grado").attr('readonly','readonly');
                        $("#ctr_register_grado").val(0);
                        
                        $("#register_tipo_documento").val(res.tdoc);
                        $("#register_tipo_documento").attr('readonly','readonly');
                        $("#ctr_register_tipo_documento").val(0);
                        
                        //---------------------------------------------------------
                        $("#register_nombresA").val(res.acudiente);
                        $("#register_nombresA").attr('readonly','readonly');
                        $("#ctr_register_nombresA").val(0);
                        
                        $("#register_documentoA").val(res.docA);
                        $("#register_documentoA").attr('readonly','readonly');
                        $("#ctr_register_documentoA").val(0);
                        
                        if(prefijo == "VER_") {
                            $("#register_direccionA").val("");
                            $("#ctr_register_direccionA").val(1);
                        }
                        else {
                            $("#register_direccionA").val(res.direccion);
                            $("#register_direccionA").attr('readonly','readonly');
                            $("#ctr_register_direccionA").val(0);
                        }
                        
                        if(prefijo == "VER_") {
                            $("#register_celularA").val("");
                            $("#ctr_register_celularA").val(1);
                        }
                        else {
                            $("#register_celularA").val(res.telA);
                            $("#register_celularA").attr('readonly','readonly');
                            $("#ctr_register_celularA").val(0);
                        }
                        
                        $("#register_correoA").val(res.emailA);
                        $("#register_correoA").attr('readonly','readonly');
                        $("#ctr_register_correoA").val(0);
                        
                        mostrar_submit();
        		    }
        		    else if(r_est == "pre_solicitud" && cod_prem == "NO") {
        		        //alert("Documento nuevo, puede realizar proceso de matrícula");
        		        $("#msgdocumento").html("Este documento no está habilitado para este link");
        		        
        		        var contenido=$(".ghf");
                        contenido.slideUp(250);
                        var contenido1=$(".file-input");
                        contenido1.slideUp(250);
                        
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
                        <h1 class="h2">Finalizar proceso de admisión</h1>
                        <p>Diligencia el formulario y envía tu solicitud.<br/>(Se recomienda utilizar navegadores diferentes a Internet Explorer)</p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Continuar</a>
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
                                                    <!--<form name="formulario" id="formulario" method="post" action="php/formulario_admisiones/send_f.php" enctype="multipart/form-data">-->
                                                    <form name="formulario" id="formulario" method="post" action="https://unicab.solutions/send_f.php" enctype="multipart/form-data"> 
                                                        <!-- ******************************************** -->
                                                        <input type="hidden" id="prefijo" name="prefijo" value="<?php echo $prefijo; ?>"/>
                                                        <!-- ******************************************** -->
                                                        <div class="row">
                                                            <div class="col-12 col-sm-12">
                                                                <div class="jumbotron jumbotron-fluid">
                                                                    <div class="container" align="center" id="contieneSelect">
                                                                        <h3 class="display-4xxx">Número de documento de identidad del estudiante (sin puntos)</h3>
                                                                        <div class="form-group" align="center" id="contieneSelect2">
                                                                            <!--<input type="text" class="form-control" id="register_documento" name="register_documento" required placeholder="Escribe el número de documento del estudiante sin puntos" maxlength="20" onkeyup="comprobarCodigo();" onBlur="comprobarCodigo()" oninput="validar_numero('register_documento', 'Número de documento');">-->
                                                                            <input type="text" class="form-control" id="register_documento" name="register_documento" required placeholder="número de documento" maxlength="20" onkeyup="validar_numero('register_documento', 'Número de documento');">
                                                                            <input type="hidden" style="width: 20px" id="ctr_register_documento" value="1"/><br>
                                                                            <button class="btn btn-brand smooth-scroll" onclick="val_documento();">Continuar</button>
                                                                            <h5 id="msgdocumento" style="color: blue;"></h5>
                                                                            <input type="hidden" id="register_estado"/>
                                                                            <input type="hidden" id="txt_codigo" value="<?php echo $codigo; ?>"/><br>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row ghf">
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_apellidos">Apellidos</label>
                                                                    <input type="text" class="form-control" id="register_apellidos" name="register_apellidos" placeholder="Escribe los apellidos del estudiante" required onkeyup="mayus(this, 'register_apellidos', 'Apellidos');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_apellidos" value="1"/>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_nombres">Nombres</label>
                                                                    <input type="text" class="form-control" id="register_nombres" name="register_nombres" required placeholder="Escribe los nombres del estudiante" onkeyup="mayus(this, 'register_nombres', 'Nombres');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_nombres" value="1"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row ghf">
                                                        	
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <!--<option value="0" selected>Selecciona grado</option>-->
                                                                    <label for="register_grado" id="lblgrado">Grado a que ingresas</label><br>
                                                                    <!--<select class="form-control snormal" id="register_grado" name="register_grado" requiered>
                                                                        <option value="0" selected>Seleccione grado</option>
                                                                        <?php
                                                                            while ($row = mysqli_fetch_array($petecion)) {
                                                                                //echo '<option value="'.$row['id'].'">'.$row['grado'].'</option>';
                                                                            }
                                                                        ?>
                                                                    </select>-->
                                                                    <input type="text" class="form-control" id="register_grado" name="register_grado" required>
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_grado" value="1"/> 
                                                                    <input type="hidden" id="grado_permitido" value="0"/>
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_tipo_documento" id="lbltd">Tipo de documento de identidad</label><br>
                                                                    <!--<select class="form-control form-control-lg snormal" id="register_tipo_documento" name="register_tipo_documento" required>
                                                                        <option value="0" selected>Seleccione tipo documento</option>
                                                                        <?php
                                                                            while ($row1 = mysqli_fetch_array($petecion1)) {
                                                                                //echo '<option value="'.$row1['id'].'">'.$row1['tipo_documento'].'</option>';
                                                                            }
                                                                        ?>
                                                                    </select>-->
                                                                    <input type="text" class="form-control" id="register_tipo_documento" name="register_tipo_documento" required>
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_tipo_documento" value="1"/> 
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_email">Correo electrónico</span></label>
                                                                    <input type="text" class="form-control" id="register_email" name="register_email" required placeholder="Escribe el correo electrónico del estudiante" onkeyup="validar_email('register_email', 'Correo electrónico');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_email" value="1"/>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_telefono">Número telefónico</label>
                                                                    <input type="text" class="form-control" id="register_telefono" name="register_telefono" required placeholder="Escribe el número telefónico del estudiante sin espacios" onkeyup="validar_numero('register_telefono', 'Número telefónico');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_telefono" value="1"/>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_lugar">Lugar de expedición del documento</label>
                                                                    <input type="text" class="form-control" id="register_lugar" name="register_lugar" required placeholder="Escribe el lugar de expedición del documento del estudiante" onkeyup="mayus(this, 'register_lugar', 'Lugar de expedición');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_lugar" value="1"/>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_genero" id="lblgen">Género</label><br>
                                                                    <select class="form-control form-control-lg snormal" id="register_genero" name="register_genero" required>
                                                                        <option value="0" selected>Seleccione género</option>
                                                                        <option value="MASCULINO">MASCULINO</option>
                                                                        <option value="FEMENINO">FEMENINO</option>
                                                                    </select>
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_genero" value="1"/>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        
                                                        <div class="row ghf">
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_year">Fecha de nacimiento (yyyy-mm-dd)</label>
                                                                    <input type="text" class="form-control" id="register_year" name="register_year" required placeholder="Fecha de nacimiento" onkeyup="validar_fecha('register_year', 'Fecha de nacimiento');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_year" value="1"/>
                                                                    <input type="hidden" id="ctr_vacunacion" value="0"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_direccion">Dirección de residencia</label>
                                                                    <input type="text" class="form-control" id="register_direccion" name="register_direccion" required placeholder="Escribe la dirección de residencia del estudiante" onkeyup="mayus(this, 'register_direccion', 'Dirección de residencia');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_direccion" value="1"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_ciudad">Ciudad de Residencia</label>
                                                                    <input type="text" class="form-control" id="register_ciudad" name="register_ciudad" required placeholder="Escribe la ciudad de residencia del estudiante" onkeyup="mayus(this, 'register_ciudad', 'Ciudad de residencia');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_ciudad" value="1"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_actividad">Actividad Extracurrícular</label>
                                                                    <input type="text" class="form-control" id="register_actividad" name="register_actividad" required placeholder="Escribe la actividad (Fútbol - patinaje - natación - danzas - etc)" onkeyup="mayus(this, 'register_actividad', 'Actividad extracurrícular');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_actividad" value="1"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group" id="divcodigo">
                                                                    <label for="register_codigo">Código de Entrevista 
                                                                    <a data-toggle="collapse" href="#collapseExampleAyuda" role="button" aria-expanded="false" aria-controls="collapseExampleAyuda"> (Ayuda)</a> </label>
                                                                    <input type="number" class="form-control" id="register_codigo" name="register_codigo" placeholder="Ingrese código entrevista" required onkeyup="comprobarCodigo('register_codigo', 'Código entrevista');">
                                                                    <input type="hidden" id="txtcodent"/>
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_codigo" value="1"/>
                                                                    <span id="estado_codigo"></span> 
                                                                    <div class="collapse" id="collapseExampleAyuda">
                                                                        <div class="card card-body">
                                                                            <a style="color:#0C0; display:inline-block;" href="directorio.php" target="_blank"><i class="fa fa-download"></i> Contacta aquí al psicólogo de Unicab</a> y solicita tu código para completar el proceso.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><br> 
                                                        
                                                        <hr><br><!--**************************************************************************-->
                                                        
                                                        <div class="row ghf">
                                                            <div class="col-12 col-sm-12">
                                                                <h3><span class="badge badge-success">Paso 2</span> Información del acudiente</h3>
                                                            </div>
              
               											    <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_nombresA">Nombres</label>
                                                                    <input type="text" class="form-control" id="register_nombresA" name="register_nombresA" placeholder="Escribe los nombres del acudiente" required onkeyup="mayus(this, 'register_nombresA', 'Nombres acudiente');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_nombresA" value="1"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_docuentoA">Documento</label>
                                                                    <input type="text" class="form-control" id="register_documentoA" name="register_documentoA" placeholder="Escribe el número de documento del acudiente sin puntos" required onkeyup="validar_numero('register_documentoA', 'Documento acudiente');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_documentoA" value="1"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_direccionA">Dirección de residencia</label>
                                                                    <input type="text" class="form-control" id="register_direccionA" name="register_direccionA" placeholder="Escribe la dirección del acudiente" required onkeyup="mayus(this, 'register_direccionA', 'Direccion de residencia acudiente');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_direccionA" value="1"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_celularA">Celular</label>
                                                                    <input type="text" class="form-control" id="register_celularA" name="register_celularA" placeholder="Escribe el número de celular del acudiente sin espacios" required onkeyup="validar_numero('register_celularA', 'Celular acudiente');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_celularA" value="1"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_correoA">Correo Electrónico</label>
                                                                    <input type="text" class="form-control" id="register_correoA" name="register_correoA" placeholder="Escribe el correo electrónico del acudiente" required onkeyup="validar_email('register_correoA', 'Correo electrónico acudiente');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_correoA" value="1"/>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <hr>
                                                        
                                                        <h3 class="ghf"><span class="badge badge-success">Paso 3</span> Sube el contrato de matrícula</h3>
                                                        
                                                        <div class="form-group file-input">   
                                                            <label for="adjunto"><i class="fa fa-upload"></i> Adjunta el contrato diligenciado y firmado  
                                                            <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"> (Ayuda)</a></label><br>
                                                        
                                                            <div class="collapse" id="collapseExample">
                                                                <div class="card card-body">
                                                                    <p>Imprime, diligencia todos los campos, escanea en un sólo archivo pdf y adjunta el documento. <span class="badge badge-secondary">Formato PDF</span></p>
                                                                </div>
                                                            </div>
                                                            <input type="file" id="adjunto" name="adjunto" required accept=".pdf,.jpg,.png,.jpeg,.docx,.doc" class="ArchivosAdjuntos">
															<!--<input type="file" id="adjunto" name="adjunto" required accept=".xlsx" class="ArchivosAdjuntos">-->
                                                        </div>
                                                        
                                                        <hr>
                                                        
                                                        <h3 class="ghf"><span class="badge badge-success">Paso 4</span> Sube los siguientes documentos</h3>
                                                        <!--CARGA DE ARCHIVO-->
                                                        <div class="form-group file-input">   
                                                            <label for="adjunto2"><i class="fa fa-upload"></i> Adjunta el documento de identidad del estudiante 
                                                            <a data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4"> (Ayuda)</a></label><br>
                                                            <div class="collapse" id="collapseExample4">
                                                                <div class="card card-body">
                                                                    <p>Escanea y sube el registro civil sí el estudiante es menor de 7 años o sube la tarjeta de identidad sí el estudiante es mayor de 7 años. <span class="badge badge-secondary">Formato PDF</span></p>
                                                                </div>
                                                            </div>
                                                            <input type="file" id="adjunto2" name="adjunto2" required accept=".pdf,.jpg,.png,.jpeg,docx.doc" class="ArchivosAdjuntos">
                                                        </div>
                                                        <!--FIN CARGA DE ARCHIVO-->
                                                        <!--CARGA DE ARCHIVO-->
                                                        <div class="form-group file-input">   
                                                            <label for="adjunto3"><i class="fa fa-upload"></i> Adjunta el documento de identidad del acudiente 
                                                            <a data-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="false" aria-controls="collapseExample5"> (Ayuda)</a></label><br>
                                                            <div class="collapse" id="collapseExample5">
                                                                <div class="card card-body">
                                                                    <p>Escanea y sube el documento de identidad del acudiente. <span class="badge badge-secondary">Formato PDF</span></p>
                                                                </div>
                                                            </div>
                                                            <input type="file" id="adjunto3" name="adjunto3" required accept=".pdf,.jpg,.png,.jpeg,docx.doc" class="ArchivosAdjuntos">
                                                        </div>
                                                        <!--FIN CARGA DE ARCHIVO-->
                                                        <!--CARGA DE ARCHIVO-->
                                                        <div class="form-group file-input">   
                                                            <label for="adjunto4">
                                                            <i class="fa fa-upload"></i> Adjunta el certificado de notas: (Primaria sólamente año anterior. Bachillerato todos los certificados desde quinto de primaria en un sólo archivo pdf). 
                                                            <a data-toggle="collapse" href="#collapseExample6" role="button" aria-expanded="false" aria-controls="collapseExample6"> (Ayuda)</a></label><br>
                                                            <div class="collapse" id="collapseExample6">
                                                                <div class="card card-body">
                                                                    <p>Escanea y sube el certificado de estudio de cursos anteriores. <br>(para bachillerato debes enviar desde el grado quinto hasta el año anterior cursado, para primaria solo el certificado del año anterior) <span class="badge badge-secondary">Formato PDF</span></p>
                                                                </div>
                                                            </div>
                                                            <input type="file" id="adjunto4" name="adjunto4" required accept=".pdf,.jpg,.png,.jpeg,docx.doc" class="ArchivosAdjuntos">
                                                        </div>
                                                        <!--FIN CARGA DE ARCHIVO-->
                                                                                                                
                                                        <hr>

                                                        <h3 class="ghf"><span class="badge badge-success">Paso 5</span> Sube los siguientes documentos</h3>
                                                        <!--CARGA DE ARCHIVO-->
                                                        <div class="form-group file-input">   
                                                            <label for="adjunto5"><i class="fa fa-upload"></i> Adjunta el certificado de actividad extracurricular 
                                                            <a data-toggle="collapse" href="#collapseExample7" role="button" aria-expanded="false" aria-controls="collapseExample7"> (Ayuda)</a></label><br>
                                                            <div class="collapse" id="collapseExample7">
                                                                <div class="card card-body">
                                                                    <p>Escanea y sube el certificado de actividad extracurricular emitido por la academia o escuela.  <span class="badge badge-secondary">Formato PDF</span></p>
                                                                </div>
                                                            </div>
                                                            <input type="file" id="adjunto5" name="adjunto5" accept=".pdf,.jpg,.png,.jpeg,docx.doc" class="ArchivosAdjuntos">
                                                        </div>
                                                        <!--FIN CARGA DE ARCHIVO-->
                                                        <!--CARGA DE ARCHIVO-->
                                                        <div class="form-group file-input">   
                                                            <label for="adjunto6"><i class="fa fa-upload"></i> Adjunta el certificado de Retiro del SIMAT (Estudiantes nuevos sólamente)
                                                            <a data-toggle="collapse" href="#collapseExample8" role="button" aria-expanded="false" aria-controls="collapseExample8"> (Ayuda)</a></label><br>
                                                            <div class="collapse" id="collapseExample8">
                                                                <div class="card card-body">
                                                                    <p>Escanea y sube el certificado de retiro del SIMAT del colegio anterior <span class="badge badge-secondary">Formato PDF</span></p>
                                                                </div>
                                                            </div>
                                                            <input type="file" id="adjunto6" name="adjunto6" accept=".pdf,.jpg,.png,.jpeg,docx.doc" class="ArchivosAdjuntos">
                                                        </div>
                                                        <!--FIN CARGA DE ARCHIVO-->
                                                        <!--CARGA DE ARCHIVO-->
                                                        <div class="form-group file-input">   
                                                            <label for="adjunto7"><i class="fa fa-upload"></i> Adjunta una fotografía reciente del estudiante
                                                            <a data-toggle="collapse" href="#collapseExample9" role="button" aria-expanded="false" aria-controls="collapseExample9"> (Ayuda)</a></label><br>
                                                            <div class="collapse" id="collapseExample9">
                                                                <div class="card card-body">
                                                                    <p>Sube una fotografía reciente, la misma que usaste en la Hoja de Matrícula. <span class="badge badge-secondary">Formato JPG</span></p>
                                                                </div>
                                                            </div>
                                                            <input type="file" id="adjunto7" name="adjunto7" required accept=".pdf,.jpg,.png,.jpeg,docx.doc" class="ArchivosAdjuntos">
                                                        </div>
                                                        <!--FIN CARGA DE ARCHIVO-->
                                                                                                           
                                                        <hr>
                                                        
                                                        <h3 class="ghf"><span class="badge badge-success">Paso 6</span> Sube los siguientes documentos</h3>
                                                        
                                                        <!--CARGA DE ARCHIVO-->
                                                        <div class="form-group file-input">   
                                                            <label for="adjunto8"><i class="fa fa-upload"></i> Adjunta el paz y salvo del colegio anterior
                                                            <a data-toggle="collapse" href="#collapseExample10" role="button" aria-expanded="false" aria-controls="collapseExample10"> (Ayuda)</a></label><br>
                                                            <div class="collapse" id="collapseExample10">
                                                                <div class="card card-body">
                                                                    <p>Escanea y sube el paz y salvo del colegio anterior. <span class="badge badge-secondary">Formato PDF</span></p>
                                                                </div>
                                                            </div>
                                                            <input type="file" id="adjunto8" name="adjunto8" required accept=".pdf,.jpg,.png,.jpeg,docx.doc" class="ArchivosAdjuntos">
                                                        </div>
                                                        <!--FIN CARGA DE ARCHIVO-->
                                                        <!--CARGA DE ARCHIVO-->
                                                        <div class="form-group file-input">   
                                                            <label for="adjunto9"><i class="fa fa-upload"></i> Adjunta el certificado de la EPS
                                                            <a data-toggle="collapse" href="#collapseExample11" role="button" aria-expanded="false" aria-controls="collapseExample11"> (Ayuda)</a></label><br>
                                                            <div class="collapse" id="collapseExample11">
                                                                <div class="card card-body">
                                                                    <p>Escanea y sube el certificado de afiliación o el carné de la EPS. <span class="badge badge-secondary">Formato PDF</span></p>
                                                                </div>
                                                            </div>
                                                            <input type="file" id="adjunto9" name="adjunto9" required accept=".pdf,.jpg,.png,.jpeg,docx.doc" class="ArchivosAdjuntos">
                                                        </div>
                                                        <!--FIN CARGA DE ARCHIVO-->
                                                        <!--CARGA DE ARCHIVO-->
                                                        <div class="form-group file-input">   
                                                            <label for="adjunto10"><i class="fa fa-upload"></i> Adjunta el comprobante del primer pago
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
                                                           <input type="file" id="adjunto10" name="adjunto10" required accept=".pdf,.jpg,.png,.jpeg,docx.doc" class="ArchivosAdjuntos">
                                                        </div>
                                                        <!--FIN CARGA DE ARCHIVO-->
                                                        <!--CARGA DE RUT-->
                                                        <div class="form-group file-input">   
                                                            <label for="adjunto11"><i class="fa fa-upload"></i> Adjunta el RUT (Registro Unico Tributario) del acudiente responsable, necesario para la facturación electrónica.
                                                            <a data-toggle="collapse" href="#collapseExample13" role="button" aria-expanded="false" aria-controls="collapseExample13"> (Ayuda)</a></label><br>
                                                            <div class="collapse" id="collapseExample13">
                                                                <div class="card card-body">
                                                                    <p>Escanea y sube el RUT de la persona responsable de hacer los pagos. <span class="badge badge-secondary">Formato PDF</span></p>
                                                                </div>
                                                            </div>
                                                            <input type="file" id="adjunto11" name="adjunto11" required accept=".pdf,.jpg,.png,.jpeg,docx.doc" class="ArchivosAdjuntos">
                                                        </div>
                                                        <!--FIN CARGA DE RUT-->
                                                        <!--CARGA VACUNACION-->
                                                        <div class="form-group file-input">   
                                                            <label for="adjunto12"><i class="fa fa-upload"></i> Adjunta el Certificado de Vacunación de Sarampión y Rubéola de niños y niñas nacidos a partir de enero de 2010.
                                                            <a data-toggle="collapse" href="#collapseExample14" role="button" aria-expanded="false" aria-controls="collapseExample13"> (Ayuda)</a></label><br>
                                                            <div class="collapse" id="collapseExample14">
                                                                <div class="card card-body">
                                                                    <p>Escanea y sube el Certificado de Vacunación de Sarampión y Rubéola de niños y niñas nacidos a partir de enero de 2010. <span class="badge badge-secondary">Formato PDF</span></p>
                                                                </div>
                                                            </div>
                                                            <input type="file" id="adjunto12" name="adjunto12" accept=".pdf,.jpg,.png,.jpeg,docx.doc" class="ArchivosAdjuntos">
                                                        </div>
                                                        <!--FIN CARGA VACUNACION-->
                                                        <!--CARGA CONSENTIMIENTO INFORMADO-->
                                                        <div class="form-group file-input">   
                                                            <label for="adjunto13"><i class="fa fa-upload"></i> Adjunta el Consentimiento Informado enviado al correo del acudiente.
                                                            <a data-toggle="collapse" href="#collapseExample15" role="button" aria-expanded="false" aria-controls="collapseExample13"> (Ayuda)</a></label><br>
                                                            <div class="collapse" id="collapseExample15">
                                                                <div class="card card-body">
                                                                    <p>Escanea y sube el Consentimiento Informado enviado al correo del acudiente. <span class="badge badge-secondary">Formato PDF</span></p>
                                                                </div>
                                                            </div>
                                                            <input type="file" id="adjunto13" name="adjunto13" required accept=".pdf,.jpg,.png,.jpeg,docx.doc" class="ArchivosAdjuntos">
                                                        </div>
                                                        <!--FIN CARGA CONSENTIMIENTO INFORMADO-->
                                                     
                                                        <hr>

                                                        <div class="form-group ghf">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                                                                <label class="custom-control-label" for="customCheck1"> Acepto  <a href="#" style="color:#0C0;" Data-toggle="modal" data-target="#exampleModalScrollable">Términos y condiciones</a> y autorizo el uso de mis datos personales en este proceso.</label>
                                                                
                                                            </div>
                                                            <input type="hidden" name="verificacion">
                                                            <input type="submit" id="btnEnviar" class="btn btn-reg" value="Enviar" style="display: none;">
                                                        </div>
                                                    </form>
                                                    <div class="alert alert-danger" role="alert" id="alert">
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

                        <!--JUMBOTRÓN-->
                        <div class="jumbotron" align="center">
                          <h1 class="display-4">¿Necesitas ayuda?</h1>
                          <p class="lead">Sí necesitas ayuda o acompañamiento en el proceso, contáctate con nuestro equipo de trabajo</p>
                          <hr class="my-4">
                          <p>Llámanos o escríbenos</p>
                          <a class="btn btn-primary btn-lg" href="directorio.php" role="button">Contactar</a>
                        </div>
                        <!--JUMBOTRÓN-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Modal -->
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
    	var uploadField2 = document.getElementById("adjunto2");
    	var uploadField3 = document.getElementById("adjunto3");
    	var uploadField4 = document.getElementById("adjunto4");
    	var uploadField5 = document.getElementById("adjunto5");
    	var uploadField6 = document.getElementById("adjunto6");
    	var uploadField7 = document.getElementById("adjunto7");
    	var uploadField8 = document.getElementById("adjunto8");
    	var uploadField9 = document.getElementById("adjunto9");
    	var uploadField10 = document.getElementById("adjunto10");
    	var uploadField11 = document.getElementById("adjunto11");
    	var uploadField12 = document.getElementById("adjunto12");
    	
    	
    	medir2(uploadField);
    	medir(uploadField2);
    	medir(uploadField3);
    	medir(uploadField4);
    	medir(uploadField5);
    	medir(uploadField6);
    	medir(uploadField7);
    	medir(uploadField8);
    	medir(uploadField9);
    	medir(uploadField10);
    	medir(uploadField11);
    	medir(uploadField12);
    	
    	function validarExtension(datos) {
            var extensionesValidas = ".png, .jpeg, .jpg, .pdf, .docx, .doc";
            var ruta = datos.value;
            var extension = ruta.substring(ruta.lastIndexOf('.') + 1).toLowerCase();
            var extensionValida = extensionesValidas.indexOf(extension);
            
            if(extensionValida < 0) {
                alert("¡El tipo de archivo no es permitido!\n Intenta usando archivos: jpg, png, pdf, docx, doc");
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
