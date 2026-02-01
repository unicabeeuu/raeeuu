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
        var a = parseInt($("#ctr_register_documento").val());
        var b = parseInt($("#ctr_register_nombres").val());
        var c = parseInt($("#ctr_register_grado").val());
        var d = parseInt($("#ctr_register_nombresA").val());
        var e = parseInt($("#ctr_register_celularA").val());
            
        control = parseInt($("#ctr_register_documento").val()) + parseInt($("#ctr_register_nombres").val()) + parseInt($("#ctr_register_grado").val()) +
            parseInt($("#ctr_register_nombresA").val()) + parseInt($("#ctr_register_celularA").val());
        
        //alert(control);
        if(control > 0) {
            $("#btnEnviar").hide();
        }
        else {
            $("#btnEnviar").show();
        }
        
        (a == 1) ? $("#register_documento").addClass("error") : $("#register_documento").removeClass("error");
        (b == 1) ? $("#register_nombres").addClass("error") : $("#register_nombres").removeClass("error");
        (c == 1) ? $("#register_grado").addClass("error") : $("#register_grado").removeClass("error");
        (d == 1) ? $("#register_nombresA").addClass("error") : $("#register_nombresA").removeClass("error");
        (e == 1) ? $("#register_celularA").addClass("error") : $("#register_celularA").removeClass("error");
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
<!--== Header Area End ==-->

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

<!--valida código psicólogo-->
<script src="assets/js/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function comprobarCodigo() {
 var dato1=$("#register_documento").val();
 var dato2=$("#register_codigo").val();

 var dataString = 'documento=' + dato1 + '&codigo=' + dato2;

 jQuery.ajax({
   url: "php/verificar-codigo.php",
   data: dataString,
   type: "POST",
   success:function(data){
     $("#estado_codigo").html(data);
   },
   
   error:function (){}
   });
}
</script>
    <!--== Page Title Area Start ==-->
    <section id="page-title-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="page-title-content">
                        <h1 class="h4">Registro de Asistencia Reuniones Padres</h4>
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
                                                <h3><span class="badge badge-success">*</span> Complete el formulario</h3>
                                                <div class="register-form">
													<form name="formulario" id="formulario" method="post" action="asistencia_putdat1.php" enctype="multipart/form-data"> 
                                                        
														<div class="row">                                                        
															<div class="col-12 col-sm-6">
																<div class="form-group">
																	<label for="register_documento">Número Documento Estudiatne</label>
																	<input type="number" class="form-control" id="register_documento" name="register_documento" required maxlength="20" onkeyup="validar_numero('register_documento', 'Número de documento');">
																	<input type="hidden" style="width: 20px" id="ctr_register_documento" value="1"/>
																</div>
															</div>

															<div class="col-12 col-sm-6">
																<div class="form-group">
																	<label for="register_nombres">Nombres y Apellidos del Estudiante</label>
																	<input type="text" class="form-control" id="register_nombres" name="register_nombres" required placeholder="Escribe los nombres del estudiante" onkeyup="mayus(this, 'register_nombres', 'Nombres');">
																	<input type="hidden" style="width: 20px" id="ctr_register_nombres" value="1"/>
																</div>
															</div>
														</div>
															
                                                        <div class="row">                                                        	
                                                            <div class="col-12 col-sm-6">
																<div class="form-group">
																	<label for="register_grado">Selecciona el grado al que ingresas</label>
																	<select class="form-control form-control-lg snormal" id="register_grado" name="register_grado" requiered>																											
																		<option value="0" selected>Selecciona grado</option>
																		<?php
																			while ($row = mysqli_fetch_array($petecion)) {
																				echo '<option value="'.$row['id'].'">'.$row['grado'].'</option>';
																			}
																		?>
																	</select>
																	<input type="hidden" style="width: 20px" id="ctr_register_grado" value="1"/>                        
																</div>                                                                
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_nombresA">Nombres y Apellidos Padre de Familia y/o Acudiente</label>
                                                                    <input type="text" class="form-control" id="register_nombresA" name="register_nombresA" placeholder="Escribe los nombres del acudiente" required onkeyup="mayus(this, 'register_nombresA', 'Nombres acudiente');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_nombresA" value="1"/>
                                                                </div>
                                                            </div>
                                                        </div>
														
                                                        <div class="row">
															<div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_celularA">Celular</label>
                                                                    <input type="number" class="form-control" id="register_celularA" name="register_celularA" placeholder="Escribe el número de celular del acudiente sin espacios" required onkeyup="validar_numero('register_celularA', 'Celular acudiente');">
                                                                    <input type="hidden" style="width: 20px" id="ctr_register_celularA" value="1"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                                                                <label class="custom-control-label" for="customCheck1"> Acepto  <a href="#" style="color:#0C0;" Data-toggle="modal" data-target="#exampleModalScrollable">Términos y condiciones</a> y autorizo el uso de los datos personales en este proceso.</label>
                                                                
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

</body>
</html>
