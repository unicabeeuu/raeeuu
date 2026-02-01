<?php
    include "admin-unicab/php/conexion.php";
    require "registro/docenteunicab/updreg/1cc3s4db.php";
    //header("Cache-Control: no-cache, must-revalidate");
    //https://unicab.org/eval_adm_comprobar.php?idpreg=
    
    $idpreg = $_REQUEST['idpreg'];
    

    //Se arma el listado de preguntas
    $listado = $idpreg."_14_";
        	
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
        $(function() {
            var contenido=$(".ghf");
            contenido.slideUp(250);
            var contenido1=$(".ghf1");
            //contenido1.slideUp(250);
            
            val_documento();
        });
        
        function validar_texto(id) {
            var control = 0;
            var id_obj = "#" + id;
            var ctr_obj = "#ctr_" + id;
            //var input_desc = document.getElementById("desc");
            var v_input = document.getElementById(id);
            //var v_val = /[-_'"\<\>\~\^\*\$\!\¡\#\%\&\¿\?\/\=\+\|,;:\(\)\{\}\[\]\\]{1,}/;
            var v_val = /[_'"\~\$\!\¡\#\&\¿\?\|;:\{\}\[\]\\]{1,}/;
            var val = String($(id_obj).val()).match(v_val);
            if(val == null) {
                v_input.setCustomValidity("");
                $("#txt_control_respuesta").val("OK");
            }
            else {
                v_input.setCustomValidity("Ha ingresado caracteres inválidos");
                var texto = "Ha ingresado alguno de los siguientes caracteres no válidos para la respuesta: ";
                texto += "_ \' \" ~ $ ! ¡ # & ¿ ? | ; : { } [ ] \\";
                $("#txt_control_respuesta").val("ERROR");
                alert(texto);
            }
        }
        
        function val_documento() {
            var doc = $("#txt_documento").val();
            
            //Se valida si el estudiante ya presentó la evaluación de presaberes
            $.ajax({
        		type:"POST",
        		url:"validacion_pres.php",
        		data:"documento=" + doc,
        		success:function(r) {
        		    var res = JSON.parse(r);
        		    //alert(res.estado);
        		    var r_est = res.estado;
        		    
        		    if(r_est == "SIN_PRESENTAR") {
        		        //val_documento1();
        		        $(".p1").removeClass("oculto");
                        $(".p2").removeClass("nooculto");
        		    }
        		    else {
        		        $("#msgdocumento").html("Este documento ya presentó la evaluación de presaberes.");
        		        
        		        var contenido=$(".ghf");
                        contenido.slideUp(250);
                        var contenido1=$(".ghf1");
                        contenido1.slideUp(250);
                        
                        $(".p1").addClass("oculto");
                        $(".p2").addClass("nooculto");
        		    }
        		}
        	});
        }
        
        function primer_pregunta() {
            var contenido=$(".ghf");
	        contenido.slideDown(250);
            var contenido1=$(".ghf1");
            contenido1.slideUp(250);
            
            $("#divencp").show();
            
            var listado = $("#txt_ids_preguntas").val();
            //alert(listado);
            var longitud = listado.length;
            //alert(longitud);
            var separa = listado.split("_");
            var idpreg = separa[0];
            //alert(idpreg);
            var separa1 = idpreg + "_";
            //alert(separa1);
            var longitud1 = separa1.length;
            //var listado_final = listado.substring(longitud1,longitud);
            //$("#txt_ids_preguntas").val(listado_final);
            $("#txt_idpreg").val(idpreg);
            
            //Se carga la pregunta
            $.ajax({
        		type:"POST",
        		url:"preguntas_est_getdat.php",
        		data:"idpreg=" + idpreg,
        		success:function(r) {
        		    var res = JSON.parse(r);
        		    //alert(res.id_tp);
        		    var long_img = res.imagen.length;
        		    var imagen = "registro" + res.imagen.substring(5,long_img);
        		    
        		    $("#txt_respuesta1").val(res.r1ok);
        		    $("#txt_respuesta2").val(res.r2ok);
        		    $("#txt_respuesta3").val(res.r3ok);
        		    $("#txt_retro").val(res.retro);
        		    
        		    var opciones = [res.r1ok, res.r1no, res.r2no, res.r3no];
        		    //La función Math.random() nos devuelve un número aleatorio entre 0 y 0.9999..., 
        		    //lo que conseguimos al restarle 0.5 es que nos genere números negativos y positivos 
        		    //para que la función sort() nos re-ordene el array de forma aleatoria colocando un elemento delante otro detrás.
        		    opciones.sort(function() { return Math.random() - 0.5 });
        		    
        		    var opciones2 = [res.r1ok, res.r2ok, res.r1no, res.r2no];
        		    opciones2.sort(function() { return Math.random() - 0.5 });
        		    
        		    var opciones3 = [res.r1ok, res.r2ok, res.r3ok, res.r1no];
        		    opciones3.sort(function() { return Math.random() - 0.5 });
        		    
        		    $("#txt_tp").val(res.id_tp);
        		    
        		    if(res.id_tp == 2) {
        		        var html = '';
        		        var html_modal = '';
        		        html = html + '<div id="divimagen" class="col-4 col-sm-4">';
        		        //html = html + '<img src="' + imagen + '" width="250px">';
        		        if(res.imagen != "NA") {
            		        //html = html + '<img class="imgpreg" src="' + imagen + '" width="300px">';
            		        //html = html + '<a href="https://unicab.org/' + imagen + '" target="_blank"><img class="imgpreg" src="' + imagen + '" width="300px"></a>';
            		        html = html + '<a href="#" data-toggle="modal" data-target="#modal_img"><img class="imgpreg" src="' + imagen + '" width="250px"></a>';
            		        html_modal = html_modal + '<img src="' + imagen + '" width="600px">';
        		        }
        		        html = html + '</div>';
        		        html = html + '<div id="divtextopregunta" class="col-8 col-sm-8">';
        		        html = html + '<p>' + res.pregunta + '</p>';
        		        html = html + '<p>Respuesta: <input type="text" id="txtrespuesta" /></p>';
        		        if(res.imagen != "NA") {
        		            html = html + '</div><label>Clic en la imagen para agrandar</label>';
        		        }
        		        else {
        		            html = html + '</div>';
        		        }
        		        
        		        $("#divpreguntas").empty();
        		        $("#divpreguntas").html(html);
        		        
        		        $("#divmodalimg").empty();
        		        $("#divmodalimg").html(html_modal);
        		    }
        		    else if(res.id_tp == 3) {
        		        var html = '';
        		        var html_modal = '';
        		        html = html + '<div id="divimagen" class="col-4 col-sm-4">';
        		        if(res.imagen != "NA") {
            		        //html = html + '<img class="imgpreg" src="' + imagen + '" width="300px">';
            		        html = html + '<a href="#" data-toggle="modal" data-target="#modal_img"><img class="imgpreg" src="' + imagen + '" width="250px"></a>';
            		        html_modal = html_modal + '<img src="' + imagen + '" width="600px">';
        		        }
        		        html = html + '</div>';
        		        html = html + '<div id="divtextopregunta" class="col-8 col-sm-8">';
        		        html = html + '<p>' + res.pregunta + '</p>';
        		        html = html + '<p><label><input type="radio" name="respuesta" id="r1" value="' + opciones[0] + '"> ' + opciones[0] + '</label></p>';
        		        html = html + '<p><label><input type="radio" name="respuesta" id="r2" value="' + opciones[1] + '"> ' + opciones[1] + '</label></p>';
        		        html = html + '<p><label><input type="radio" name="respuesta" id="r3" value="' + opciones[2] + '"> ' + opciones[2] + '</label></p>';
        		        html = html + '<p><label><input type="radio" name="respuesta" id="r4" value="' + opciones[3] + '"> ' + opciones[3] + '</label></p>';
        		        if(res.imagen != "NA") {
        		            html = html + '</div><label>Clic en la imagen para agrandar</label>';
        		        }
        		        else {
        		            html = html + '</div>';
        		        }
        		        //alert($('input:radio[name=respuesta]:checked').val());
        		        
        		        $("#divpreguntas").empty();
        		        $("#divpreguntas").html(html);
        		        
        		        $("#divmodalimg").empty();
        		        $("#divmodalimg").html(html_modal);
        		    }
        		    else if(res.id_tp == 4) {
        		        var html = '';
        		        var html_modal = '';
        		        html = html + '<div id="divimagen" class="col-4 col-sm-4">';
        		        if(res.imagen != "NA") {
            		        //html = html + '<img class="imgpreg" src="' + imagen + '" width="300px">';
            		        html = html + '<a href="#" data-toggle="modal" data-target="#modal_img"><img class="imgpreg" src="' + imagen + '" width="250px"></a>';
            		        html_modal = html_modal + '<img src="' + imagen + '" width="600px">';
        		        }
        		        html = html + '</div>';
        		        html = html + '<div id="divtextopregunta" class="col-8 col-sm-8">';
        		        html = html + '<p>' + res.pregunta + ' (Seleccione dos)</p>';
        		        html = html + '<p><input type="checkbox" id="r1" value="' + opciones2[0] + '"> ' + opciones2[0] + '</p>';
        		        html = html + '<p><input type="checkbox" id="r2" value="' + opciones2[1] + '"> ' + opciones2[1] + '</p>';
        		        html = html + '<p><input type="checkbox" id="r3" value="' + opciones2[2] + '"> ' + opciones2[2] + '</p>';
        		        html = html + '<p><input type="checkbox" id="r4" value="' + opciones2[3] + '"> ' + opciones2[3] + '</p>';
        		        if(res.imagen != "NA") {
        		            html = html + '</div><label>Clic en la imagen para agrandar</label>';
        		        }
        		        else {
        		            html = html + '</div>';
        		        }
        		        /*//http://jsfiddle.net/7PV2e/
        		        var sel = $('input[type=checkbox]:checked').map(function(_, el) {
                            return $(el).val();
                        }).get();
                        alert(sel);*/
        		        
        		        $("#divpreguntas").empty();
        		        $("#divpreguntas").html(html);
        		        
        		        $("#divmodalimg").empty();
        		        $("#divmodalimg").html(html_modal);
        		    }
        		    else if(res.id_tp == 5) {
        		        var html = '';
        		        var html_modal = '';
        		        html = html + '<div id="divimagen" class="col-4 col-sm-4">';
        		        if(res.imagen != "NA") {
            		        //html = html + '<img class="imgpreg" src="' + imagen + '" width="300px">';
            		        html = html + '<a href="#" data-toggle="modal" data-target="#modal_img"><img class="imgpreg" src="' + imagen + '" width="250px"></a>';
            		        html_modal = html_modal + '<img src="' + imagen + '" width="600px">';
        		        }
        		        html = html + '</div>';
        		        html = html + '<div id="divtextopregunta" class="col-8 col-sm-8">';
        		        html = html + '<p>' + res.pregunta + ' (Seleccione tres)</p>';
        		        html = html + '<p><input type="checkbox" id="r1" value="' + opciones3[0] + '"> ' + opciones3[0] + '</p>';
        		        html = html + '<p><input type="checkbox" id="r2" value="' + opciones3[1] + '"> ' + opciones3[1] + '</p>';
        		        html = html + '<p><input type="checkbox" id="r3" value="' + opciones3[2] + '"> ' + opciones3[2] + '</p>';
        		        html = html + '<p><input type="checkbox" id="r4" value="' + opciones3[3] + '"> ' + opciones3[3] + '</p>';
        		        if(res.imagen != "NA") {
        		            html = html + '</div><label>Clic en la imagen para agrandar</label>';
        		        }
        		        else {
        		            html = html + '</div>';
        		        }
        		        /*$('input[type=checkbox]:checked').map(function(_, el) {
                            return $(el).val();
                        }).get();
                        alert(sel);*/
        		        
        		        $("#divpreguntas").empty();
        		        $("#divpreguntas").html(html);
        		        
        		        $("#divmodalimg").empty();
        		        $("#divmodalimg").html(html_modal);
        		    }
        		}
        	});
            
            //Se valida si ya todas las preguntas se contestaron para activar la finalización
            //Se multiplican por 1 para parsear el valor a numérico y evitar errores de validación
            var tot_conteo = $("#txtconteo").val() * 1;
            var tot_totpreg = $("#txttotalpreg").val() * 1;
            //alert(tot_conteo + " " + tot_totpreg);
            if(tot_conteo > tot_totpreg) {
                //alert("control");
                //$("#btnsiguiente").hide();
                //$("#btnfinalizar").show();
                
                //tot_conteo--;
    	        //$("#txtconteo").val(tot_conteo);
            }
        }
        
        function sig_pregunta() {
            //Se valida si el campo texto esta lleno para el tipo de pregunta 2
            var tp = $("#txt_tp").val();
            if(tp == "2") {
                if($("#txtrespuesta").val() == "") {
                    alert("Se debe indicar la respuesta");
                    return;
                }
                
                validar_texto('txtrespuesta');
                //alert($("#txt_control_respuesta").val());
                if($("#txt_control_respuesta").val() == "ERROR") {
                    return;
                }
            }
            else if(tp == "3") {
                var respuesta = $('input:radio[name=respuesta]:checked').val();
                
                if(respuesta == undefined) {
                    alert("Se debe seleccionar una opción");
                    return;
                }
            }
            else if(tp == "4") {
                var sel = $('input[type=checkbox]:checked').map(function(_, el) {
                            return $(el).val();
                        }).get();
                if(sel == "") {
                    alert("No ha seleccionado ningua opción");
                    return;
                }
            }
            else if(tp == "5") {
                var sel = $('input[type=checkbox]:checked').map(function(_, el) {
                            return $(el).val();
                        }).get();
                if(sel == "") {
                    alert("No ha seleccionado ningua opción");
                    return;
                }
            }
            
            //Se actualiza la respuesta en la tabla tbl_respuestas *********************
            actualizar_respuesta(tp);
            //Fin actualización respuesta **********************************************
            
            
            //Se cambia el consecutivo
            //Se multiplican por 1 para parsear el valor a numérico y evitar errores de validación
            /*var conteo = $("#txtconteo").val() * 1;
            var tot_totpreg = $("#txttotalpreg").val() * 1;
            conteo++;
            //alert(conteo);
            $("#txtconteo").val(conteo);
            //Se valida si es la última pregunta
            if(conteo > tot_totpreg) {
                $("#btnsiguiente").hide();
                $("#btnfinalizar").show();
                
                var html = '';
    	        html = html + '<div id="divimagen" class="col-4 col-sm-4">';
    	        html = html + '</div>';
    	        html = html + '<div id="divtextopregunta" class="col-8 col-sm-8">';
    	        html = html + '</div>';
    	        
    	        $("#divpreguntas").empty();
    	        $("#divpreguntas").html(html);
    	        
    	        conteo--;
    	        $("#txtconteo").val(conteo);
            }*/
            
            var listado = $("#txt_ids_preguntas").val();
            //alert(listado);
            var longitud = listado.length;
            //alert(longitud);
            var separa = listado.split("_");
            var idpreg = separa[0];
            //alert(idpreg);
            var separa1 = idpreg + "_";
            //alert(separa1);
            var longitud1 = separa1.length;
            //var listado_final = listado.substring(longitud1,longitud);
            //$("#txt_ids_preguntas").val(listado_final);
            $("#txt_idpreg").val(idpreg);
            
            //Se carga la pregunta
            $.ajax({
        		type:"POST",
        		url:"preguntas_est_getdat.php",
        		data:"idpreg=" + idpreg,
        		success:function(r) {
        		    var res = JSON.parse(r);
        		    //alert(res.id_tp);
        		    var long_img = res.imagen.length;
        		    var imagen = "registro" + res.imagen.substring(5,long_img);
        		    
        		    $("#txt_respuesta1").val(res.r1ok);
        		    $("#txt_respuesta2").val(res.r2ok);
        		    $("#txt_respuesta3").val(res.r3ok);
        		    $("#txt_retro").val(res.retro);
        		    
        		    var opciones = [res.r1ok, res.r1no, res.r2no, res.r3no];
        		    //La función Math.random() nos devuelve un número aleatorio entre 0 y 0.9999..., 
        		    //lo que conseguimos al restarle 0.5 es que nos genere números negativos y positivos 
        		    //para que la función sort() nos re-ordene el array de forma aleatoria colocando un elemento delante otro detrás.
        		    opciones.sort(function() { return Math.random() - 0.5 });
        		    
        		    var opciones2 = [res.r1ok, res.r2ok, res.r1no, res.r2no];
        		    opciones2.sort(function() { return Math.random() - 0.5 });
        		    
        		    var opciones3 = [res.r1ok, res.r2ok, res.r3ok, res.r1no];
        		    opciones3.sort(function() { return Math.random() - 0.5 });
        		    
        		    $("#txt_tp").val(res.id_tp);
        		    
        		    if(res.id_tp == 2) {
        		        var html = '';
        		        var html_modal = '';
        		        html = html + '<div id="divimagen" class="col-4 col-sm-4">';
        		        //html = html + '<img src="' + imagen + '" width="250px">';
        		        if(res.imagen != "NA") {
            		        //html = html + '<img class="imgpreg" src="' + imagen + '" width="300px">';
            		        html = html + '<a href="#" data-toggle="modal" data-target="#modal_img"><img class="imgpreg" src="' + imagen + '" width="250px"></a>';
            		        html_modal = html_modal + '<img src="' + imagen + '" width="600px">';
        		        }
        		        html = html + '</div>';
        		        html = html + '<div id="divtextopregunta" class="col-8 col-sm-8">';
        		        html = html + '<p>' + res.pregunta + '</p>';
        		        html = html + '<p>Respuesta: <input type="text" id="txtrespuesta" /></p>';
        		        if(res.imagen != "NA") {
        		            html = html + '</div><label>Clic en la imagen para agrandar</label>';
        		        }
        		        else {
        		            html = html + '</div>';
        		        }
        		        
        		        $("#divpreguntas").empty();
        		        $("#divpreguntas").html(html);
        		        
        		        $("#divmodalimg").empty();
        		        $("#divmodalimg").html(html_modal);
        		    }
        		    else if(res.id_tp == 3) {
        		        var html = '';
        		        var html_modal = '';
        		        html = html + '<div id="divimagen" class="col-4 col-sm-4">';
        		        if(res.imagen != "NA") {
            		        //html = html + '<img class="imgpreg" src="' + imagen + '" width="300px">';
            		        html = html + '<a href="#" data-toggle="modal" data-target="#modal_img"><img class="imgpreg" src="' + imagen + '" width="250px"></a>';
            		        html_modal = html_modal + '<img src="' + imagen + '" width="600px">';
        		        }
        		        html = html + '</div>';
        		        html = html + '<div id="divtextopregunta" class="col-8 col-sm-8">';
        		        html = html + '<p>' + res.pregunta + '</p>';
        		        html = html + '<p><label><input type="radio" name="respuesta" id="r1" value="' + opciones[0] + '"> ' + opciones[0] + '</label></p>';
        		        html = html + '<p><label><input type="radio" name="respuesta" id="r2" value="' + opciones[1] + '"> ' + opciones[1] + '</label></p>';
        		        html = html + '<p><label><input type="radio" name="respuesta" id="r3" value="' + opciones[2] + '"> ' + opciones[2] + '</label></p>';
        		        html = html + '<p><label><input type="radio" name="respuesta" id="r4" value="' + opciones[3] + '"> ' + opciones[3] + '</label></p>';
        		        if(res.imagen != "NA") {
        		            html = html + '</div><label>Clic en la imagen para agrandar</label>';
        		        }
        		        else {
        		            html = html + '</div>';
        		        }
        		        
        		        $("#divpreguntas").empty();
        		        $("#divpreguntas").html(html);
        		        
        		        $("#divmodalimg").empty();
        		        $("#divmodalimg").html(html_modal);
        		    }
        		    else if(res.id_tp == 4) {
        		        var html = '';
        		        var html_modal = '';
        		        html = html + '<div id="divimagen" class="col-4 col-sm-4">';
        		        if(res.imagen != "NA") {
            		        //html = html + '<img class="imgpreg" src="' + imagen + '" width="300px">';
            		        html = html + '<a href="#" data-toggle="modal" data-target="#modal_img"><img class="imgpreg" src="' + imagen + '" width="250px"></a>';
            		        html_modal = html_modal + '<img src="' + imagen + '" width="600px">';
        		        }
        		        html = html + '</div>';
        		        html = html + '<div id="divtextopregunta" class="col-8 col-sm-8">';
        		        html = html + '<p>' + res.pregunta + ' (Seleccione dos)</p>';
        		        html = html + '<p><input type="checkbox" id="r1" value="' + opciones2[0] + '"> ' + opciones2[0] + '</p>';
        		        html = html + '<p><input type="checkbox" id="r2" value="' + opciones2[1] + '"> ' + opciones2[1] + '</p>';
        		        html = html + '<p><input type="checkbox" id="r3" value="' + opciones2[2] + '"> ' + opciones2[2] + '</p>';
        		        html = html + '<p><input type="checkbox" id="r4" value="' + opciones2[3] + '"> ' + opciones2[3] + '</p>';
        		        if(res.imagen != "NA") {
        		            html = html + '</div><label>Clic en la imagen para agrandar</label>';
        		        }
        		        else {
        		            html = html + '</div>';
        		        }
        		        
        		        $("#divpreguntas").empty();
        		        $("#divpreguntas").html(html);
        		        
        		        $("#divmodalimg").empty();
        		        $("#divmodalimg").html(html_modal);
        		    }
        		    else if(res.id_tp == 5) {
        		        var html = '';
        		        var html_modal = '';
        		        html = html + '<div id="divimagen" class="col-4 col-sm-4">';
        		        if(res.imagen != "NA") {
            		        //html = html + '<img class="imgpreg" src="' + imagen + '" width="300px">';
            		        html = html + '<a href="#" data-toggle="modal" data-target="#modal_img"><img class="imgpreg" src="' + imagen + '" width="250px"></a>';
            		        html_modal = html_modal + '<img src="' + imagen + '" width="600px">';
        		        }
        		        html = html + '</div>';
        		        html = html + '<div id="divtextopregunta" class="col-8 col-sm-8">';
        		        html = html + '<p>' + res.pregunta + ' (Seleccione tres)</p>';
        		        html = html + '<p><input type="checkbox" id="r1" value="' + opciones3[0] + '"> ' + opciones3[0] + '</p>';
        		        html = html + '<p><input type="checkbox" id="r2" value="' + opciones3[1] + '"> ' + opciones3[1] + '</p>';
        		        html = html + '<p><input type="checkbox" id="r3" value="' + opciones3[2] + '"> ' + opciones3[2] + '</p>';
        		        html = html + '<p><input type="checkbox" id="r4" value="' + opciones3[3] + '"> ' + opciones3[3] + '</p>';
        		        if(res.imagen != "NA") {
        		            html = html + '</div><label>Clic en la imagen para agrandar</label>';
        		        }
        		        else {
        		            html = html + '</div>';
        		        }
        		        /*$('input[type=checkbox]:checked').map(function(_, el) {
                            return $(el).val();
                        }).get();
                        alert(sel);*/
        		        
        		        $("#divpreguntas").empty();
        		        $("#divpreguntas").html(html);
        		        
        		        $("#divmodalimg").empty();
        		        $("#divmodalimg").html(html_modal);
        		    }
        		}
        	});
        }
        
        function actualizar_respuesta(tp) {
            //alert(tp);
            var idpreg = $("#txt_idpreg").val();
            var documento = $("#txt_documento").val();
            var respuesta1 = $("#txt_respuesta1").val(); //Esta es la respuesta ok de la pregunta cargada desde la base de datos
            var respuesta2 = $("#txt_respuesta2").val(); //Esta es la respuesta ok de la pregunta cargada desde la base de datos
            var respuesta3 = $("#txt_respuesta3").val(); //Esta es la respuesta ok de la pregunta cargada desde la base de datos
            var resultado = "";
                
            if(tp == "2") {
                var respuesta = $("#txtrespuesta").val();
                respuesta = respuesta.toUpperCase();
                
                if(respuesta == respuesta1) {
                    resultado = "OK";
                }
                else {
                    resultado = "NO";
                }
                alert("respuesta ingresada: " + respuesta + ";\nrespuesta bd: " + respuesta1 + ";\nresultado: " + resultado);
                
                //Se actualiza la respuesta
                /*$.ajax({
            		type:"POST",
            		url:"respuestas_est_upddat.php",
            		data:"idpreg=" + idpreg + "&documento=" + documento + "&respuesta=" + respuesta + "&resultado=" + resultado,
            		success:function(r) {
            		    //nada
            		}
            	});*/
            }
            else if(tp == "3") {
                var respuesta = $('input:radio[name=respuesta]:checked').val();
                
                if(respuesta == respuesta1) {
                    resultado = "OK";
                }
                else {
                    resultado = "NO";
                }
                alert("respuesta ingresada: " + respuesta + ";\nrespuesta bd: " + respuesta1 + ";\nresultado: " + resultado);
                
                //Se actualiza la respuesta
                /*$.ajax({
            		type:"POST",
            		url:"respuestas_est_upddat.php",
            		data:"idpreg=" + idpreg + "&documento=" + documento + "&respuesta=" + respuesta + "&resultado=" + resultado,
            		success:function(r) {
            		    //nada
            		}
            	});*/
            }
            else if(tp == "4") {
                var sel = $('input[type=checkbox]:checked').map(function(_, el) {
                            return $(el).val();
                        }).get();
                //alert(sel);
                var respuesta_combinada = respuesta1 + "," + respuesta2;
                var respuesta_combinada1 = respuesta2 + "," + respuesta1;
                
                if(sel == respuesta_combinada) {
                    resultado = "OK";
                }
                else if(sel == respuesta_combinada1) {
                    resultado = "OK";
                }
                else {
                    resultado = "NO";
                }
                alert("respuesta ingresada: " + sel + ";\nrespuesta bd: " + respuesta_combinada + " o " + respuesta_combinada1 + ";\nresultado: " + resultado);
                
                //Se actualiza la respuesta
                /*$.ajax({
            		type:"POST",
            		url:"respuestas_est_upddat.php",
            		data:"idpreg=" + idpreg + "&documento=" + documento + "&respuesta=" + sel + "&resultado=" + resultado,
            		success:function(r) {
            		    //nada
            		}
            	});*/
            }
            else if(tp == "5") {
                var sel = $('input[type=checkbox]:checked').map(function(_, el) {
                            return $(el).val();
                        }).get();
                //alert(sel);
                var respuesta_combinada = respuesta1 + "," + respuesta2 + "," + respuesta3;
                var respuesta_combinada1 = respuesta1 + "," + respuesta3 + "," + respuesta2;
                var respuesta_combinada2 = respuesta2 + "," + respuesta1 + "," + respuesta3;
                var respuesta_combinada3 = respuesta2 + "," + respuesta3 + "," + respuesta1;
                var respuesta_combinada4 = respuesta3 + "," + respuesta2 + "," + respuesta1;
                var respuesta_combinada5 = respuesta3 + "," + respuesta1 + "," + respuesta2;
                
                if(sel == respuesta_combinada) {
                    resultado = "OK";
                }
                else if(sel == respuesta_combinada1) {
                    resultado = "OK";
                }
                else if(sel == respuesta_combinada2) {
                    resultado = "OK";
                }
                else if(sel == respuesta_combinada3) {
                    resultado = "OK";
                }
                else if(sel == respuesta_combinada4) {
                    resultado = "OK";
                }
                else if(sel == respuesta_combinada5) {
                    resultado = "OK";
                }
                else {
                    resultado = "NO";
                }
                alert("respuesta ingresada: " + sel + ";\nrespuesta bd: " + respuesta_combinada + " o " + respuesta_combinada1 + 
                " o " + respuesta_combinada2 + " o " + respuesta_combinada3 + " o " + respuesta_combinada4 + " o " + respuesta_combinada5 + ";\nresultado: " + resultado);
                
                //Se actualiza la respuesta
                /*$.ajax({
            		type:"POST",
            		url:"respuestas_est_upddat.php",
            		data:"idpreg=" + idpreg + "&documento=" + documento + "&respuesta=" + sel + "&resultado=" + resultado,
            		success:function(r) {
            		    //nada
            		}
            	});*/
            }
            
            conteos(documento);
            //sleep(5);
            conteos(documento);
        }
        
        function finalizar() {
            $("#btnfinalizar").hide();
            /*var tp = $("#txt_tp").val();
            //Se actualiza la respuesta en la tabla tbl_respuestas *********************
            actualizar_respuesta(tp);
            //Fin actualización respuesta **********************************************
            
            var html = '';
	        html = html + '<div id="divimagen" class="col-4 col-sm-4">';
	        html = html + '</div>';
	        html = html + '<div id="divtextopregunta" class="col-8 col-sm-8">';
	        html = html + '</div>';
	        
	        $("#divpreguntas").empty();
	        $("#divpreguntas").html(html);*/
	        
	        //$("#divcargando").css({display:'block'});
            //sleep(5);
            
	        //location.href = 'resultado_eval_pres.php?n_documento=' + $("#txt_documento").val();
	        location.href = 'res_eval_pres_correo_1.php?n_documento=' + $("#txt_documento").val() + '&idgra=' + $("#txtidgra").val();
	        //$(".loader").fadeOut("slow");
	        //$("#divcargando").css({display:'none'});
        }
        
        function conteos(doc) {
            //Se hacen los conteos
            $.ajax({
        		type:"POST",
        		url:"conteos_resp_pres.php",
        		data:"documento=" + doc,
        		success:function(r) {
        		    var res = JSON.parse(r);
        		    
        		    $("#txtok").val(res.ctok);
        		    $("#txtno").val(res.ctno);
        		    $("#txtna").val(res.ctna);
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
            color: red;
        }
        .conteo {
            width: 40px;
            border: none;
            color: white;
            font-weight: bold;
            background-color: #247fb7;
            font-size: 16px;
        }
        #divimagen, #divtextopregunta {
            height: 350px;
        }
        #divtextopregunta {
            background: lightblue;
        }
        #divimagen {
            border: 1px solid black;
        }
        .imgpreg {
            margin-top: 10px;
        }
        .p2 {
            display: none;
        }
        .oculto {
            display: none;
        }
        .nooculto {
            display: inline;
        }
        .txtct {
            width: 20px;
            border: 0;
            background: transparent;
            color: black;
            font-weight: bold;
        }
        .fondoblanco {
            background: white;
        }
    </style>
	
</head>
<body ondragstart="return false" onselectstart="return false" oncontextmenu="return false">

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
                                            
                                                <!--<h3><span class="badge badge-success">Hola </span> <?php echo $nombre_completo;?></h3>-->
                                                
                                                <div class="register-form" id="divform">
                                                    <!--<form name="formulario" id="formulario" method="post" action="" enctype="multipart/form-data">-->
                                                        
                                                        <!--<div class="row">
                                                            <p class="p1"><i class="fa fa-hand-o-right "></i> Vas a encontrar preguntas de varios pensamientos y varios conceptos.
                                                            </p>
                                                            <p class="p1"><i class="fa fa-hand-o-right "></i> Todas las preguntas están relacionadas con contenidos y temas <strong>que son necesarios ya conocer</strong> para que puedas 
                                                                desarrollar todas las actividades de grado <strong><?php echo $grado; ?></strong>.
                                                            </p>
                                                            <p class="p1"><i class="fa fa-hand-o-right "></i> Una vez más te recordamos que al concluir la evaluación, encontraras un <strong>resumen del resultado y una hoja de ruta sugerida, </strong>para
                                                                convertir tus falencias en fortalezas y que puedas integrar y construir el conocimiento requerido para este grado.
                                                            </p>
                                                            <p class="p2"><i class="fa fa-hand-o-right "></i> Este documento ya presentó la evaluación de presaberes.</p>
                                                            
                                                        </div>-->
                                                        
                                                        <div class="form-group">
                                                            <input type="hidden" name="verificacion">
                                                            <button id="btncomenzar" class="btn btn-reg ghf1" onclick="primer_pregunta();"> Comenzar</button>
                                                            <!--<label>Listado: </label>--><input type="hidden" id="txt_ids_preguntas" value="<?php echo $listado; ?>"/><br>
                                                            <label>Respuesta1: </label><input type="text" id="txt_respuesta1" value="" readonly/>
                                                            <label>Respuesta2: </label><input type="text" id="txt_respuesta2" value="" readonly/>
                                                            <label>Respuesta3: </label><input type="text" id="txt_respuesta3" value="" readonly/><br>
                                                            <label>Retro: </label><input type="text" id="txt_retro" value="" readonly/>
                                                            <label>Tp: </label><input type="text" id="txt_tp" value="" readonly/><br>
                                                            <input type="hidden" id="txt_control_respuesta" value="ERROR"/>
                                                            <!--<label>Id_preg: </label><input type="text" id="txt_idpreg" value=""/>-->
                                                            <input type="hidden" id="txt_documento" value="<?php echo $documento; ?>"/>
                                                        </div>
                                                        
                                                        <div id="divencp" class="btn btn-reg ghf">
                                                            <table style="display: none;">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <h6>Pregunta <input type="text" id="txtconteo" class="conteo btn" value="<?php echo $ct_preg_ya + 1; ?>" readonly/> de <input id="txttotalpreg" type="text" class="conteo btn" value="<?php echo $longitud_final; ?>" readonly/></h6>
                                                                        </td>
                                                                        <td width="200px"></td>
                                                                        <td><h6 class="oculto">Resumen: </h6></td> 
                                                                        <td width="50px"></td>
                                                                        <td class="fondoblancox"><input type="text" id="txtok" class="txtct oculto" value="<?php echo $ct_ok; ?>"/> <img class="oculto" src='registro/images/checked_1.jpg' height='25px'/></td>
                                                                        <td width="50px"></td>
                                                                        <td class="fondoblancox"><input type="text" id="txtno" class="txtct oculto" value="<?php echo $ct_no; ?>"/> <img class="oculto" src='registro/images/unchecked_1.jpg' width='25px'/></td>
                                                                        <td width="50px"></td>
                                                                        <td class="fondoblancox"><input type="text" id="txtna" class="txtct oculto" value="<?php echo $ct_na; ?>"/> <img class="oculto" src='registro/images/na_1.jpg' width='25px'/></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div id="divpreguntas" class="row ghf">
                                                            <div id="divimagen" class="col-5 col-sm-5">
                                                                <label></label>
                                                            </div>
                                                            <div id="divtextopregunta" class="col-7 col-sm-7">
                                                                <label></label>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group ghf">
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <button id="btnsiguiente" class="btn btn-reg" onclick="sig_pregunta();"> Siguiente <i class="fa fa-arrow-circle-right"></i></button>
                                                                    </td>
                                                                    <td width="600"></td>
                                                                    <td>
                                                                        <button id="btnfinalizar" class="btn btn-reg" onclick="finalizar();" style="display: none;"> Finalizar <i class="fa fa-arrow-circle-right"></i></button>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            
                                                        </div>
                                                    <!--</form>-->
                                                    <input type="hidden" id="txtidgra" value="<?php echo $idgrado; ?>"/>
                                                    <input type="hidden" id="identif" value="<?php echo $documento; ?>"/>
                                                    
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
    </section>
    
    <!-- Modal imagen grande -->
        <div class="modal fade" id="modal_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">IMAGEN PREGUNTA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="divmodalimg">
                    
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <!--<button type="button" class="btn btn-warning" id="btnupdpor" data-dismiss="modal" onclick="updpor()">Guardar</button>-->
              </div>
            </div>
          </div>
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

</body>
</html>
