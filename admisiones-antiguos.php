<?php
    include "admin-unicab/php/conexion.php";
    
    $sql="SELECT * FROM grados WHERE id > 1";
	//echo $sql;
	$petecion=mysqli_query($conexion,$sql);
	
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
<meta name="twitter:url" content="http://unicab.org">
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
<script src="admin-unicab/js/jquery-1.11.1.min.js"></script>

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
        //alert("hola");
        $("#register_grado").change(function() {
    		var gra = $("#register_grado").val();
    		if(gra == 0) {
    			$("#btnEnviar").hide();
    			$("#ctr_register_grado").val(1);
    		}
    		else {
    		    $("#btnEnviar").show();
    		    $("#ctr_register_grado").val(0);
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
        var l = parseInt($("#ctr_register_apellidosA").val());
        var m = parseInt($("#ctr_register_nombresA").val());
        var n = parseInt($("#ctr_register_documentoA").val());
        var o = parseInt($("#ctr_register_direccionA").val());
        var p = parseInt($("#ctr_register_celularA").val());
        var q = parseInt($("#ctr_register_correoA").val());
        
        control = parseInt($("#ctr_register_apellidos").val()) + parseInt($("#ctr_register_nombres").val()) + parseInt($("#ctr_register_documento").val()) +
            parseInt($("#ctr_register_year").val()) + parseInt($("#ctr_register_lugar").val()) + parseInt($("#ctr_register_direccion").val()) +
            parseInt($("#ctr_register_ciudad").val()) + parseInt($("#ctr_register_email").val()) + parseInt($("#ctr_register_telefono").val()) +
            parseInt($("#ctr_register_actividad").val()) + parseInt($("#ctr_register_grado").val()) +
            parseInt($("#ctr_register_apellidosA").val()) + parseInt($("#ctr_register_nombresA").val()) + parseInt($("#ctr_register_documentoA").val()) +
            parseInt($("#ctr_register_direccionA").val()) + parseInt($("#ctr_register_celularA").val()) + parseInt($("#ctr_register_correoA").val());
        
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
        
        (l == 1) ? $("#register_apellidosA").addClass("error") : $("#register_apellidosA").removeClass("error");
        (m == 1) ? $("#register_nombresA").addClass("error") : $("#register_nombresA").removeClass("error");
        (n == 1) ? $("#register_documentoA").addClass("error") : $("#register_documentoA").removeClass("error");
        (o == 1) ? $("#register_direccionA").addClass("error") : $("#register_direccionA").removeClass("error");
        (p == 1) ? $("#register_celularA").addClass("error") : $("#register_celularA").removeClass("error");
        (q == 1) ? $("#register_correoA").addClass("error") : $("#register_correoA").removeClass("error");
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
            border: 3px solid red;
        }
    </style>	
</head>
<body>

    <!--[if lt IE 7]>
    <p class="browsehappy">We are Extreamly sorry, But the browser you are using is probably from when civilization started.
        Which is way behind to view this site properly. Please update to a modern browser, At least a real browser. </p>
    <![endif]-->

    <!--== Header Area Start ==-->
<header id="header-area">
    <?php include "header.php"; ?>
     <script>
    var elemento = document.getElementById("itemServicios");
    elemento.className += " active";
	</script>
</header>

<script>
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
</script>

<!--== Header Area End ==-->

    <!--== Page Title Area Start ==-->
    <section id="page-title-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="page-title-content">
                        <h1 class="h2">Proceso de admisión</h1>
                        <p>Diligencia el formulario y envía tu solicitud</p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Empezar</a>
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
                                            
                                            
<div class="alert alert-info" role="alert" align="center">
  <h4 class="alert-heading">Importante!</h4>
  <p>Este formulario lo deben diligenciar solo los estudiantes antiguos</p>
  <hr>
  <p class="mb-0">Sí eres estudiante nuevo <a href="admisiones-nuevos.php" title="Ir a página de estudiantes nuevos" class="alert-link">selecciona este enlace</a></p>
</div><br><hr>
                                            
                                                <h3><span class="badge badge-success">Paso 1</span> Información del Estudiante Antiguo</h3>
                                                
   
                                                
                                                
                                                <div class="register-form">
        <form name="formulario" id="formulario" method="post" action="php/formulario_admisiones_antiguos/send.php" enctype="multipart/form-data"> 
                                                        <div class="row">
                                                        <div class="col-12 col-sm-12">
                                                                <div class="form-group">
                                                                	
                                                                </div>
                                                         </div>
                                                        <div class="col-12 col-sm-12">
                                                        <div class="jumbotron jumbotron-fluid">
                                                          <div class="container" align="center" id="contieneSelect">
                                                            <h1 class="display-4">Selecciona el grado al que ingresas</h1><br>
                                                            <div class="form-group" align="center" id="contieneSelect2">
                                                            
                                                                                                                        
                                        <select class="selectFormulario" id="register_grado" name="register_grado" requiered>
                                                                    	
                                                                        <option value="0" selected>Selecciona grado</option>
                                                                        <?php
                                                                            while ($row = mysqli_fetch_array($petecion)) {
                                                                                echo '<option value="'.$row['id'].'">'.$row['grado'].'</option>';
                                                                            }
                                                                        ?>
                                                                        
                                                                        <!--<option value="2">Primero</option>
                                                                        <option value="3">Segundo</option>
                                                                        <option value="4">Tercero</option>
                                                                        <option value="5">Cuarto</option>
                                                                        <option value="6">Quinto</option>
                                                                        <option value="7">Sexto</option>
                                                                        <option value="8">Séptimo</option>
                                                                        <option value="9">Octavo</option>
                                                                        <option value="10">Noveno</option>
                                                                        <option value="11">Décimo</option>
                                                                        <option value="12">Undécimo</option>
                                                                        <option value="13">Ciclo I</option>
                                                                        <option value="14">Ciclo II</option>
                                                                        <option value="15">Ciclo III</option>
                                                                        <option value="16">Ciclo IV</option>
                                                                        <option value="17">Ciclo V</option>
                                                                        <option value="18">Ciclo VI</option>-->
                                          </select>
                                            <input type="hidden" style="width: 20px" id="ctr_register_grado" value="1"/>                            
                                                                </div>
                                                          </div>
                                                        </div>
                                                                
                                                            </div>
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
                                                        <div class="row">
                                                         <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                 <label for="register_tipo_documento">Tipo de documento de identidad</label><br>
                                      <select class="form-control form-control-lg snormal" id="register_tipo_documento" name="register_tipo_documento">
                                                             <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                                                             <option value="Registro Civil">Registro Civil</option>
                                                             <option value="Cédula">Cédula</option>
                                                             <option value="Pasaporte">Pasaporte</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_documento">Número de documento de identidad</label>
                                                                    <input type="text" class="form-control" id="register_documento" name="register_documento" required placeholder="Escribe el número de documento del estudiante sin puntos" onkeyup="validar_numero('register_documento', 'Número de documento');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_documento" value="1"/>
                                                                </div>
                                                            </div>

                                                          
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_year">Fecha de nacimiento (yyyy-mm-dd)</label>
                                                                    <input type="text" class="form-control" id="register_year" name="register_year" required placeholder="Fecha de nacimiento" onkeyup="validar_fecha('register_year', 'Fecha de nacimiento');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_year" value="1"/>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_lugar">Lugar de nacimiento</label>
                                                                    <input type="text" class="form-control" id="register_lugar" name="register_lugar" required placeholder="Escribe el lugar de nacimiento del estudiante" onkeyup="mayus(this, 'register_lugar', 'Lugar de nacimiento');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_lugar" value="1"/>
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
                                                                    <label for="register_email">Correo electrónico</label>
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
                                                                    <label for="register_actividad">Actividad Extracurrícular</label>
                                                                    <input type="text" class="form-control" id="register_actividad" name="register_actividad" required placeholder="Escribe la actividad (Fútbol - patinaje - natación - danzas - etc)" onkeyup="mayus(this, 'register_actividad', 'Actividad extracurrícular');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_actividad" value="1"/>
                                                                </div>
                                                            </div>
                                                            
                                                        </div><br> <hr><br>
                                                         <div class="row">
                                                        
                                                          <div class="col-12 col-sm-12">
              <h3><span class="badge badge-success">Paso 2</span> Información del acudiente</h3>
              </div>
              
               											<div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_apellidosA">Apellidos</label>
                                                                    <input type="text" class="form-control" id="register_apellidosA" name="register_apellidosA" placeholder="Escribe los apelidos del acudiente" required onkeyup="mayus(this, 'register_apellidosA', 'Apellidos acudiente');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_apellidosA" value="1"/>
                                                                </div>
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
                                                            
                                                            
                                                       
                                                      <!--  <div class="gender form-group">
                                                            <label class="g-name d-block">Género</label>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="register_gender_male" name="register_gender" value="mail" class="custom-control-input">
                                                                <label class="custom-control-label" for="register_gender_male">Masculino</label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="register_gender_female" name="register_gender" value="female" class="custom-control-input">
                                                                <label class="custom-control-label" for="register_gender_female">Femenino</label>
                                                            </div>
                                                        </div>-->
                                                        <hr>
                                                        <h3><span class="badge badge-success">Paso 3</span> Sube el contrato de matrícula</h3>
                                                        
<div class="form-group file-input">   
<label for="adjunto"><i class="fa fa-upload"></i> Adjunta el contrato <a data-toggle="collapse" href="#collapseExample"
     role="button" aria-expanded="false" aria-controls="collapseExample"> (Ayuda)</a></label><br>

    <div class="collapse" id="collapseExample">
      <div class="card card-body">
         
         <p><a download style="color:#0C0; display:inline-block;" href="assets/descargas/matricula/CONTRATO_MATRICULA_UNICAB.pdf"><i class="fa fa-download"></i> Descarga aquí el formato</a> Imprime, diligencia todos los campos, escanea y adjunta el documento. <span class="badge badge-secondary">Formato PDF</span></p>
      </div>
    </div>
    <input type="file" id="adjunto" name="adjunto" required accept=".pdf,.jpg,.png,.jpeg,docx.doc" class="ArchivosAdjuntos">
     
</div>
                                          
                                                        
                                                        
<hr>

                                                        <h3><span class="badge badge-success">Paso 4</span> Sube los siguientes documentos</h3>
<!--CARGA DE ARCHIVO-->
<div class="form-group file-input">   
<label for="adjunto2">
<i class="fa fa-upload"></i> Adjunta el documento de identidad del estudiante 
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
<label for="adjunto3">
<i class="fa fa-upload"></i> Adjunta el documento de identidad del acudiente 
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
<i class="fa fa-upload"></i> Adjunta el certificado de estudios 
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

<h3><span class="badge badge-success">Paso 5</span> Sube los siguientes documentos</h3>
<!--CARGA DE ARCHIVO-->
<div class="form-group file-input">   
<label for="adjunto5">
<i class="fa fa-upload"></i> Adjunta el certificado de actividad extracurricular 
<a data-toggle="collapse" href="#collapseExample7" role="button" aria-expanded="false" aria-controls="collapseExample7"> (Ayuda)</a></label><br>

    <div class="collapse" id="collapseExample7">
    <div class="card card-body">
  <p>Escanea y sube el certificado de actividad extracurricular emitido por la academia o escuela.  <span class="badge badge-secondary">Formato PDF</span></p>
  </div>
    </div>
    <input type="file" id="adjunto5" name="adjunto5" required accept=".pdf,.jpg,.png,.jpeg,docx.doc" class="ArchivosAdjuntos">
</div>
<!--FIN CARGA DE ARCHIVO-->

<!--CARGA DE ARCHIVO-->
<div class="form-group file-input">   
<label for="adjunto7">
<i class="fa fa-upload"></i> Adjunta una fotografía reciente del estudiante
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

<h3><span class="badge badge-success">Paso 6</span> Sube los siguientes documentos</h3>

<!--CARGA DE ARCHIVO-->
<div class="form-group file-input">   
<label for="adjunto8">
<i class="fa fa-upload"></i> Adjunta el paz y salvo del colegio anterior
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
<label for="adjunto9">
<i class="fa fa-upload"></i> Adjunta el certificado de la EPS
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
<label for="adjunto10">
<i class="fa fa-upload"></i> Adjunta el comprobante del primer pago
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

                                                     
<hr>


                                                        <div class="form-group">
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
    
    <!--== Register Page Content End ==-->

    <!--== Footer Area Start ==-->

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

	var uploadField7 = document.getElementById("adjunto7");
	var uploadField8 = document.getElementById("adjunto8");
	var uploadField9 = document.getElementById("adjunto9");
	var uploadField10 = document.getElementById("adjunto10");
	
	
	medir2(uploadField);
	medir(uploadField2);
	medir(uploadField3);
	medir(uploadField4);
	medir(uploadField5);

	medir(uploadField7);
	medir(uploadField8);
	medir(uploadField9);
	medir(uploadField10);
	
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
	
	
	function medir(uploadField)
	{
		
		
		uploadField.onchange = function() {
			if(this.files[0].size > 2048000){
			   alert("El archivo es muy grande, el tamaño máximo permitido es 2000 kB");
			   this.value = "";
			   uploadField.style.color="#F00";
			   uploadField.style.border="solid 1px #F00";
			}
			else
			{
			uploadField.style.color="#27ae60";
			uploadField.style.border="none";
					
					validarExtension(uploadField);
			}
			
			
		};
	}
	
	function medir2(uploadField)
	{
		
		
		uploadField.onchange = function() {
			if(this.files[0].size > 4100000){
			   alert("El archivo es muy grande, el tamaño máximo permitido es 4000 kB");
			   this.value = "";
			   uploadField.style.color="#F00";
			   uploadField.style.border="solid 1px #F00";
			}
			else
			{
			uploadField.style.color="#27ae60";
			uploadField.style.border="none";
					
					validarExtension(uploadField);
			}
			
			
		};
	}

		
    </script>

    <!--FIN VALIDA TAMAÑO-->

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

<!-- Countdown -->
<script src="assets/vendor/jquery.countdown/jquery.countdown.min.js"></script>

<!-- custom js: main custom theme js file  -->
<script src="assets/js/theme.min.js"></script>

<!-- custom js: custom js file is added for easy custom js code  -->
<script src="assets/js/custom.js"></script>

<!-- custom js: custom scripts for theme style switcher for demo purpose  -->


<script>
	$(document).ready(function(){
		
				
		$('form').submit(function(){
			if($('input[type="text"]').val() == '' || $('input[type="email"]').val() == '' || $('input[type="file"]').val() == '' || $('textarea').val() == ''){
				alert('Rellena todos los campos');
				return false;
			}
		});
	});
	

</script>


</body>
</html>
