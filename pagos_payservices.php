<?php
    $codigo = "";
	$sa1 = ["q","a","1","z","x","2","s","w","3","p","l","4","m","k","5","o","e","6",
            "d","c","7","i","j","8","n","r","9","f","v","0","u","h","b","t","g"];
	
	for($i = 1; $i <=10; $i++) {
		$ale=mt_rand(1,sizeof($sa1));
		$codigo = $codigo.$sa1[$ale-1];
	}

    //https://unicab.org/registro/docenteunicab/updreg/sogap/consulta_pago_getdat.php?codigo=9397454-2020-ocp&convenio=UNICAB_COLEGIO_VIRTUAL&tipo=PEB
    //https://unicab.org/registro/docenteunicab/updreg/sogap/consulta_pago_getdat_f.php?ndoc=1014859175&a=2020&tabla=tbl_costos_unicab
?>

<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Pagos | Unicab | Colegio Virtual</title>

    <meta name="description" content="simple description for your site">
<meta name="keywords" content="keyword1, keyword2">
<meta name="author" content="Jobz">

<!-- twitter card starts from here, if you don't need remove this section -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@yourtwitterusername">
<meta name="twitter:creator" content="@yourtwitterusername">
<meta name="twitter:url" content="http://twitter.com">
<meta name="twitter:title" content="Your home page title, max 140 char"> <!-- maximum 140 char -->
<meta name="twitter:description" content="Your site description, maximum 140 char "> <!-- maximum 140 char -->
<meta name="twitter:image" content="assets/img/twittercardimg/twittercard-144-144.png">  <!-- when you post this page url in twitter , this image will be shown -->
<!-- twitter card ends here -->

<!-- facebook open graph starts from here, if you don't need then delete open graph related  -->
<meta property="og:title" content="Your home page title">
<meta property="og:url" content="http://your domain here.com">
<meta property="og:locale" content="en_US">
<meta property="og:site_name" content="Your site name here">
<!--meta property="fb:admins" content="" /-->  <!-- use this if you have  -->
<meta property="og:type" content="website"> <!-- 'article' for single page  -->
<meta property="og:image" content="assets/img/opengraph/fbphoto-476-476.png"> <!-- when you post this page url in facebook , this image will be shown -->
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
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>

<!-- EPAYCO  -->
<script type="text/javascript" src="https://checkout.epayco.co/checkout.js"></script>

<!-- Main Master Style  CSS  -->
<link id="cbx-style" data-layout="1" rel="stylesheet" href="assets/css/style-default.min.css" media="all">

	<!--SEGUIMIENTO GOOGLE-->
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-158598632-1"></script>-->
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    
    gtag('config', 'UA-158598632-1');
    
    $(function() {
        $("#trrefpago").hide();
        $("#tringvalor").hide();
        $("#trrefpago0").hide();
        $("#tringvalor0").hide();
        
        $("input[name=opvalor]").click(function() {
            $("#txtref").val("");
            $("#txtvalorref").val("");
            
            $("#txtndoc").val("");
            $("#txtano").val("");
            $("#txtvalor").val("");
            $("#txtref_valor").val("");
            
            $("#ctr_txtndoc").val(1);
        	$("#ctr_txtano").val(1);
                
            var opvalor = $('input:radio[name=opvalor]:checked').val();
            //alert(opvalor);
            if(opvalor == 0) {
                $("#trrefpago").show();
                $("#tringvalor").hide();
                $("#trrefpago0").show();
                $("#tringvalor0").hide();
                $("#txtcontrolpago").val(0);
            }
            if(opvalor == 1) {
                $("#trrefpago").hide();
                $("#tringvalor").show();
                $("#trrefpago0").hide();
                $("#tringvalor0").show();
                $("#txtcontrolpago").val(1);
            }
            
            mostrar_submit();
    	});
    	
    	$("#selconcepto").change(function() {
    	    var conc1 = $("#selconcepto").val();
    	    //alert(conc1);
    	    //Se arma la referencia de pago
            if(conc1 == "NA") {
                $("#txtref").val("");
                $("#ctr_txtref").val(1);
                $("#txtref_valor").val("");
                
                $("#txtvalorref").val("");
                $("#txtvalor").val("");
            }
            else {
                var ndoc1 = $("#txtndoc").val();
                var ano1 = $("#txtano").val();
                
                var ref_pago_manual = ndoc1 + "-" + ano1 + "-" + conc1;
                $("#txtref_valor").val(ref_pago_manual);
                $("#txtref").val(ref_pago_manual);
                $("#ctr_txtref").val(0);
                
                //Se consulta el pago
                qval();
            }
            
            mostrar_submit();
    	});
    	
    	$("#selmedio").change(function() {
    	    var medio = $("#selmedio").val();
    	    //Se arma la referencia de pago
            if(medio == "NA") {
                $("#txtref").val("");
                $("#ctr_txtref").val(1);
                $("#txtref_valor").val("");
                
                $("#txtvalorref").val("");
                $("#txtvalor").val("");
                
                //$("#btncontinuar").hide();
            }
            else {
                $("#pdesc").html("");
            }
            
            mostrar_submit();
    	});
    	
            	
        mostrar_submit();
    });
    
    var handler = ePayco.checkout.configure({
        key: '870fd53ee9274a76a62c34f434b09569',
        test: false
    });
    
    function callEpayco() {
        //Se genera código de factura
        var codfact1 = "";
        var ale = 0;
    	var sa1 = ["q","a","1","z","x","2","s","w","3","p","l","4","m","k","5","o","e","6",
                "d","c","7","i","j","8","n","r","9","f","v","0","u","h","b","t","g"];
        //alert (sa1.length)
        
        var medio = $("#selmedio").val();
	    
	    for(var i = 1; i <=10; i++) {
    		ale = parseInt(Math.random()*sa1.length);
    		//alert (ale);
    		codfact1 = codfact1 + sa1[ale];
    	}
    	//alert (codfact1);
        
        //Se arma la petición de pago
        var codigo = $("#txtref").val();
        var array = codigo.split("-");
        var doc_est = array[0];
        var nombre = $("#txtnom").val();
        var identif = $("#txtidentif").val();
        var codfact = $("#txtcodfact").val();
        var concepto = $("#txtconcepto").val();
        //Esto hace un replace de manera global, utilizando expresiones regulares
        var concepto1 = concepto.replace(/[ ]/gi,"_");
        
        var opvalor = $('input:radio[name=opvalor]:checked').val();
        if(opvalor == 0) {
            var valor = $("#txtvalorref").val();
        }
        else if(opvalor == 1) {
            var valor = $("#txtvalor").val();
        }
        
        //var factura = doc_est + "_" + codfact;
        var factura = doc_est + "_" + codfact1;
        //alert (factura);
        
        //var url = "https://unicab.org/resultado_pagos.php?estado=ACEPTADA&ref=" + codigo + "&fact=" + factura + "&val=" + valor + "&conc=" + concepto1;
        //alert (url);
        //confirmation: "https://unicab.org/resultado_pagos.php?ref=" + codigo + "&fact=" + factura + "&val=" + valor + "&conc=" + concepto1,
        //response: "https://unicab.org/resultado_pagos.php?ref=" + codigo + "&fact=" + factura + "&val=" + valor + "&conc=" + concepto1,
        
        //Se arma la referencia de pago
        if(medio == "E") {
            var data={
                //Parametros compra (obligatorio)
                name: "Unicab Colegio Virtual",
                description: concepto,
                invoice: factura,
                currency: "cop",
                amount: valor,
                tax_base: "0",
                tax: "0",
                country: "co",
                lang: "es",
                
                //Onpage="false" - Standard="true"
                external: "false",
                key: "870fd53ee9274a76a62c34f434b09569",
                
                //Atributos opcionales
                extra1: codigo,
                extra2: "extra2",
                extra3: "extra3",
                confirmation: "https://unicab.org/resultado_pagos.php",
                response: "https://unicab.org/resultado_pagos.php",
                
                
                //Atributos cliente
                name_billing: nombre,
                //address_billing: "Carrera 19 numero 14 91",
                type_doc_billing: "cc",
                //mobilephone_billing: "3050000000",
                number_doc_billing: identif,
                
                //atributo deshabilitación metodo de pago
                methodsDisable: ["TDC", "PSE", "SP", "DP"]
                
            };
        }
    	else if(medio == "P" || medio == "P6") {
            var data={
                //Parametros compra (obligatorio)
                name: "Unicab Colegio Virtual",
                description: concepto,
                invoice: factura,
                currency: "cop",
                amount: valor,
                tax_base: "0",
                tax: "0",
                country: "co",
                lang: "es",
                
                //Onpage="false" - Standard="true"
                external: "false",
                key: "870fd53ee9274a76a62c34f434b09569",
                
                //Atributos opcionales
                extra1: codigo,
                extra2: "extra2",
                extra3: "extra3",
                confirmation: "https://unicab.org/resultado_pagos.php",
                response: "https://unicab.org/resultado_pagos.php",
                
                
                //Atributos cliente
                name_billing: nombre,
                //address_billing: "Carrera 19 numero 14 91",
                type_doc_billing: "cc",
                //mobilephone_billing: "3050000000",
                number_doc_billing: identif,
                
                //atributo deshabilitación metodo de pago
                methodsDisable: ["TDC", "SP", "CASH", "DP"]
                
            };
        }
        else if(medio == "TC") {
            var data={
                //Parametros compra (obligatorio)
                name: "Unicab Colegio Virtual",
                description: concepto,
                invoice: factura,
                currency: "cop",
                amount: valor,
                tax_base: "0",
                tax: "0",
                country: "co",
                lang: "es",
                
                //Onpage="false" - Standard="true"
                external: "false",
                key: "870fd53ee9274a76a62c34f434b09569",
                
                //Atributos opcionales
                extra1: codigo,
                extra2: "extra2",
                extra3: "extra3",
                confirmation: "https://unicab.org/resultado_pagos.php",
                response: "https://unicab.org/resultado_pagos.php",
                
                
                //Atributos cliente
                name_billing: nombre,
                //address_billing: "Carrera 19 numero 14 91",
                type_doc_billing: "cc",
                //mobilephone_billing: "3050000000",
                number_doc_billing: identif,
                
                //atributo deshabilitación metodo de pago
                methodsDisable: ["PSE", "SP", "CASH", "DP"]
                
            };
        }
        
        handler.open(data);
        
    }
    
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
        
        //Sa valida que no esté vacío
        var contenido = $(id_obj).val();
        if(contenido == "") {
            $(ctr_obj).val(1);
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
        
        //Sa valida que no esté vacío
        var contenido = $(id_obj).val();
        if(contenido == "") {
            $(ctr_obj).val(1);
        }
        
        if(control == 0 && id == "txtref") {
            $("#txtconcepto").val("");
			$("#txtvalorref").val("");
			$("#txtvalor").val("");
			$("#ctr_txtvalor").val(1);
			$("#txtref_valor").val("");
			
			$("#txtndoc").val("");
            $("#txtano").val("");
            $("#ctr_txtndoc").val(1);
        	$("#ctr_txtano").val(1);
        			
            var patron = /[0-9]{1,11}-{1}[0-9]{4}-{1}[0-9a-z]{1,4}/;
            var esCoincidente = patron.test($(id_obj).val());
            if(esCoincidente) {
                v_input.setCustomValidity("");
                $("#pdesc").html("");
                $(ctr_obj).val(0);
            }
            else {
                v_input.setCustomValidity("Ha ingresado caracteres inválidos");
                var texto = "El código de referencia no tiene el formato correcto " + desc;
                //alert(texto);
                $("#pdesc").html(texto).css("color","red");
                $(ctr_obj).val(1);
                //control = 1;
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
            //control = 1;
        }
        
        //Se valida si el concepto es ICFES
        var concepto = $("#selconcepto").val();
        var id_gra = $("#txtidgrado").val();
        //alert(concepto + " " + id_gra);
        if(concepto == "icfes") {
            if(id_gra == "12" || id_gra == "18") {
                $("#pdesc").html("");
                $(ctr_obj).val(0);
            }
            else {
                var texto = "El pago de ICFES sólamente es para grado 11 y Ciclo VI.";
                //alert(texto);
                $("#pdesc").html(texto).css("color","red");
                $(ctr_obj).val(1);
                //control = 1;
            }
        }
        
        //alert (id_obj);
        if(id_obj == "#txtndoc") {
            control = 1;
            patron = /^[0-9]{1,11}$/;
            var esCoincidente = patron.test($(id_obj).val());
            //alert(esCoincidente);
            if(esCoincidente) {
                v_input.setCustomValidity("");
                $("#pdesc").html("");
                $(ctr_obj).val(0);
            }
            else {
                v_input.setCustomValidity("Ha ingresado caracteres inválidos");
                var texto = "Se permiten máximo 11 dígitos para " + desc;
                //alert(texto);
                $("#pdesc").html(texto).css("color","red");
                $(ctr_obj).val(1);
                
                $("#txtref").val("");
                $("#ctr_txtref").val(1);
                $("#txtref_valor").val("");
                
                $("#txtvalorref").val("");
                $("#txtvalor").val("");
                control = 2;
            }
        }
        else if(id_obj == "#txtano") {
            control = 1;
            patron = /^[2]{1}[0]{1}[2]{1}[0-9]{1}$/;
            var esCoincidente = patron.test($(id_obj).val());
            //alert(esCoincidente);
            if(esCoincidente) {
                v_input.setCustomValidity("");
                $("#pdesc").html("");
                $(ctr_obj).val(0);
            }
            else {
                v_input.setCustomValidity("Ha ingresado caracteres inválidos");
                var texto = "Ha ingresado un valor no válido para " + desc;
                //alert(texto);
                $("#pdesc").html(texto).css("color","red");
                $(ctr_obj).val(1);
                
                $("#txtref").val("");
                $("#ctr_txtref").val(1);
                $("#txtref_valor").val("");
                
                $("#txtvalorref").val("");
                $("#txtvalor").val("");
                control = 2;
            }
        }
        
        //Se arma la referencia de pago
        if(control == 1) {
            var conc1 = $("#selconcepto").val();
            if(conc1 == "NA") {
                $("#txtref").val("");
                $("#ctr_txtref").val(1);
                $("#txtref_valor").val("");
            }
            else {
                var ndoc1 = $("#txtndoc").val();
                var ano1 = $("#txtano").val();
                
                var ref_pago_manual = ndoc1 + "-" + ano1 + "-" + conc1;
                $("#txtref_valor").val(ref_pago_manual);
                $("#txtref").val(ref_pago_manual);
                $("#ctr_txtref").val(0);
                
                //Se consulta el pago
                qval();
            }
        }
        else if(control == 2) {
            $("#txtref").val("");
            $("#ctr_txtref").val(1);
            $("#txtref_valor").val("");
        }
        
        mostrar_submit();
    }
    
    function mostrar_submit() {
        var control = 0;
        var a = parseInt($("#ctr_txtref").val());
        var b = parseInt($("#ctr_txtnom").val());
        var c = parseInt($("#ctr_txtidentif").val());
        var d = parseInt($("#ctr_txtvalor").val());
        var e = parseInt($("#ctr_txtndoc").val());
        var f = parseInt($("#ctr_txtano").val());
        //alert ("d=" + d);
        
        control = a + b + c + d + e + f;
        
        //alert("control=" + control);
        if(control > 0) {
            $("#btncontinuar").hide();
        }
        else {
            $("#btncontinuar").show();
        }
        
        (a == 1) ? $("#txtref").addClass("error") : $("#txtref").removeClass("error");
        (b == 1) ? $("#txtnom").addClass("error") : $("#txtnom").removeClass("error");
        (c == 1) ? $("#txtidentif").addClass("error") : $("#txtidentif").removeClass("error");
        (d == 1) ? $("#txtvalor").addClass("error") : $("#txtvalor").removeClass("error");
        (e == 1) ? $("#txtndoc").addClass("error") : $("#txtndoc").removeClass("error");
        (f == 1) ? $("#txtano").addClass("error") : $("#txtano").removeClass("error");
        
        var medio = $("#selmedio").val();
	    //Se arma la referencia de pago
        if(medio == "NA") {
            $("#btncontinuar").hide();
        }
        
    }
    
    function mayus(e, id, desc) {
        e.value = e.value.toUpperCase();
        validar_texto(id, desc);
    }
    
    function qval() {
        var medio = $("#selmedio").val();
        var control = 0;
        
	    if(medio == "NA") {
            var texto = "Debe seleccionar un medio de pago.";
            $("#pdesc").html(texto).css("color","red");
        }
        else {
            $("#pdesc").html("");
            
            var codigo = $("#txtref").val();
            var array = codigo.split("-");
            var ndoc = array[0];
            var ano = array[1];
            var tipo_conc = array[2];
			console.log(tipo_conc);
            //alert (codigo);
            //alert(tipo_conc);
            
            $("#txtndoc").val(ndoc);
            $("#txtano").val(ano);
            
            //Se hace la consulta del pago
            //url:"registro/docenteunicab/updreg/sogap/consulta_pago_getdat.php",
        	//data:"codigo=" + codigo + "&convenio=UNICAB_COLEGIO_VIRTUAL&tipo=PEB",
        	
        	//Se valida el medio de pago
        	var medio = $("#selmedio").val();
        	if(medio == "E") {
        	    var datos = "ndoc=" + ndoc + "&a=" + ano + "&tabla=tbl_costos_unicab&conv=UNICAB_COLEGIO_VIRTUAL&tipo=PEB&tconc=" + tipo_conc;
        	}
        	else if(medio == "P") {
        	    var datos = "ndoc=" + ndoc + "&a=" + ano + "&tabla=tbl_costos_unicab&conv=UNICAB_COLEGIO_VIRTUAL&tipo=PEB&tconc=" + tipo_conc;
        	}
        	else if(medio == "P6") {
        	    var datos = "ndoc=" + ndoc + "&a=" + ano + "&tabla=tbl_costos_unicab&conv=UNICAB_COLEGIO_VIRTUAL&tipo=PSE&tconc=" + tipo_conc;
        	}
        	else if(medio == "TC") {
        	    var datos = "ndoc=" + ndoc + "&a=" + ano + "&tabla=tbl_costos_unicab&conv=UNICAB_COLEGIO_VIRTUAL&tipo=TC&tconc=" + tipo_conc;
        	}
        	var url = "registro/docenteunicab/updreg/sogap/consulta_pago_getdat_f.php?" + datos;
			console.log(url);
			
            $.ajax({
        		type:"POST",
        		url:"registro/docenteunicab/updreg/sogap/consulta_pago_getdat_f.php",
        		data:datos,
        		success:function(r) {
        		    //alert(r);
        			//$("#register_grado").html(r);
        			
        			var res = JSON.parse(r);
        			//alert (res);
        			var estado = res.estado;
        			//alert (estado);
        			
        			if(estado == 1) {
        			    if(tipo_conc == "m") {
        			        //var valor = res.registros[0].matricula;
							var valor = res.valor;
        			        var concepto1 = "MATRICULA";
        			    }
        			    else if(tipo_conc == "pm1") {
        			        //var valor = res.registros[0].pension;
        			        var valor = res.valor;
        			        var concepto1 = "PENSION M1";
        			    }
        			    else if(tipo_conc == "pm2") {
        			        //var valor = res.registros[0].pension;
        			        var valor = res.valor;
        			        var concepto1 = "PENSION M2";
        			    }
        			    else if(tipo_conc == "pm3") {
        			        //var valor = res.registros[0].pension;
        			        var valor = res.valor;
        			        var concepto1 = "PENSION M3";
        			    }
        			    else if(tipo_conc == "pm4") {
        			        //var valor = res.registros[0].pension;
        			        var valor = res.valor;
        			        var concepto1 = "PENSION M4";
        			    }
        			    else if(tipo_conc == "pm5") {
        			        //var valor = res.registros[0].pension;
        			        var valor = res.valor;
        			        var concepto1 = "PENSION M5";
        			    }
        			    else if(tipo_conc == "pm6") {
        			        //var valor = res.registros[0].pension;
        			        var valor = res.valor;
        			        var concepto1 = "PENSION M6";
        			    }
        			    else if(tipo_conc == "pm7") {
        			        //var valor = res.registros[0].pension;
        			        var valor = res.valor;
        			        var concepto1 = "PENSION M7";
        			    }
        			    else if(tipo_conc == "pm8") {
        			        //var valor = res.registros[0].pension;
        			        var valor = res.valor;
        			        var concepto1 = "PENSION M8";
        			    }
        			    else if(tipo_conc == "pm9") {
        			        //var valor = res.registros[0].pension;
        			        var valor = res.valor;
        			        var concepto1 = "PENSION M9";
        			    }
        			    else if(tipo_conc == "pm10") {
        			        //var valor = res.registros[0].pension;
        			        var valor = res.valor;
        			        var concepto1 = "PENSION M10";
        			    }
        			    else if(tipo_conc == "ocp") {
        			        var valor = res.registros[0].ocp;
        			        var concepto1 = "OCP";
        			    }
        			    else if(tipo_conc == "p") {
        			        var valor = res.registros[0].poliza;
        			        var concepto1 = "POLIZA";
        			    }
        			    else if(tipo_conc == "dg") {
        			        var valor = res.registros[0].dg;
        			        var concepto1 = "DERECHOS GRADO PRESENCIAL";
        			    }
						else if(tipo_conc == "dgv") {
        			        var valor = res.registros[0].dgv;
        			        var concepto1 = "DERECHOS GRADO VIRTUAL";
        			    }
        			    else if(tipo_conc == "pp") {
        			        //var valor = res.registros[0].pp;
        			        var valor = res.valor;
        			        var concepto1 = "PRIMER PAGO";
        			    }
        			    else if(tipo_conc == "mocp") {
        			        //var valor = res.registros[0].pp;
        			        var valor = res.valor;
        			        var concepto1 = "MATRICULA Y OCP";
        			    }
        			    else if(tipo_conc == "icfes") {
        			        if(res.id_grado_est == "12" || res.id_grado_est == "18") {
        			            var valor = res.valor;
        			        }
        			        else {
        			            var valor = 0;
        			        }
        			        var concepto1 = "ICFES";
        			    }
        			    //alert(valor);
        			    
        			    var concepto = "PAGO " + concepto1 + " " + ano;
        			    //alert(res.inc);
        			    if(res.inc == "SI") {
        			        var comision = parseFloat(res.incrementos[0].comision_epayco);
        			        var fijo = parseInt(res.incrementos[0].val_fijo_epayco);
        			        var iva = parseFloat(res.incrementos[0].iva_comision_epayco);
        			        var comision1 = comision * valor;
        			        var iva1 = iva * (comision1 + fijo);    
        			        //alert("comisión="+comision1);
        			        //alert("iva="+iva1);
        			        //alert("fijo="+fijo);
        			        valor = Math.ceil(parseFloat(valor) + comision1 + fijo + iva1);
        			    }
        			    
        			    $("#txtconcepto").val(concepto);
            			$("#txtvalorref").val(valor);
            			$("#txtvalor").val(valor);
            			$("#ctr_txtvalor").val(0);
            			$("#txtref_valor").val(codigo);
            			
            			$("#txtidgrado").val(res.id_grado_est);
            			
            			$("#ctr_txtndoc").val(0);
            			$("#ctr_txtano").val(0);
            			
            			if(tipo_conc == "icfes") {
            			    if(res.id_grado_est == "12" || res.id_grado_est == "18") {
        			            //No hace nada
        			        }
        			        else {
        			            var texto = "El pago de ICFES sólamente es para grado 11 y Ciclo VI.";
                                $("#pdesc").html(texto).css("color","red");
                                $("#ctr_txtvalor").val(1);
        			        }
                            
                        }
        			}
        			else {
        			    $("#txtconcepto").val("");
            			$("#txtvalorref").val("");
            			$("#txtvalor").val("");
            			$("#ctr_txtvalor").val(1);
            			$("#txtref_valor").val("");
            			
            			$("#ctr_txtndoc").val(1);
            			$("#ctr_txtano").val(1);
        			}
        		}
        	});
        }
    	
    	mostrar_submit();
    	//$("#selconcepto option[value='"+ tipo_conc +"']").attr("selected",true);
    	setTimeout("mostrar_submit()",1000);

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
    .trborder {
        border: 2px solid gray;
    }
    .trtitulo {
        background-color: gray;
        color: white;
    }
    .trespacio {
        height: 10px;
    }
    .inactivo {
        background: lightgray;
        border: none;
        color: blue;
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

<!--== Page Title Area Start ==-->
<!--<section id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">Pagos</h1>
                    <p>Realiza tus pagos en línea</p>
                    <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Ver más</a>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!--== Page Title Area End ==-->

<!--== Gallery Page Content Start ==-->
<section id="page-content-wrap">
    <div class="event-page-content-wrap section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="all-event-list">
                        
                        <div class='single-upcoming-event'>
                            <div class="row alert alert-success">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/HTNTZL02dKc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            
                            <div class="row alert alert-success">
                                <div class='col-lg-5'>
                                    <div class='up-event-thumb'>
                                        <img src="assets/img/logo_cs.jpg" width="400" height="182">
                                        <h4 class='up-event-date'>Haz clic en el botón de mi pago amigo.</h4>
                                    </div>
                                </div>
                        
                                <div class='col-lg-7'>
                                    <div class='display-table'>
                                        <div class='display-table-cell'>
                                            <div class='up-event-text'>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <a href="https://www.mipagoamigo.com/MPA_WebSite/ServicePayments/StartPayment?id=3555&searchedCategoryId=&searchedAgreementName=UNICAB%20CORPORACION%20EDUCATIVA" target="_blank">
                                                                <img src="assets/img/btn_mi_pa.png" width="210" height="118">
                                                            </a>
                                                        </td>
                                                        <td width="50"></td>
                                                        <td>
                                                            <a href="https://youtu.be/Q48MW92gABA" target="_blank">
                                                                <img src="assets/img/pago_pse_cs.png" width="307" height="107">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </table>
                            					
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="row alert alert-success">
                                <div class='col-lg-5'>
                                    <div class='up-event-thumbxx'>
                                        <!--<img src="assets/img/logo_cs.jpg" width="400" height="182">-->
                                        <h4 class='up-event-date'>Pagar a través de:</h4>
                                        <img src="assets/img/logo_epayco_1.png" ></br></br>
                                        <table style="margin-left: 10px; border: 2px solid blue;">
                                            <thead style="font-weight: bold; font-size: 16px;">
                                                <tr>
                                                    <td colspan="3" style=" text-align: center;">CONCEPTOS DE PAGO DE PENSIÓN</td>
                                                </tr>
                                                <tr>
                                                    <td>Concepto</td>
                                                    <td width="20px"></td>
                                                    <td>Descripción</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>pm1</td>
                                                    <td></td>
                                                    <td>Pago mes febrero</td>
                                                </tr>
                                                <tr>
                                                    <td>pm2</td>
                                                    <td></td>
                                                    <td>Pago mes marzo</td>
                                                </tr>
                                                <tr>
                                                    <td>pm3</td>
                                                    <td></td>
                                                    <td>Pago mes abril</td>
                                                </tr>
                                                <tr>
                                                    <td>pm4</td>
                                                    <td></td>
                                                    <td>Pago mes mayo</td>
                                                </tr>
                                                <tr>
                                                    <td>pm5</td>
                                                    <td></td>
                                                    <td>Pago mes junio</td>
                                                </tr>
                                                <tr>
                                                    <td>pm6</td>
                                                    <td></td>
                                                    <td>Pago mes julio</td>
                                                </tr>
                                                <tr>
                                                    <td>pm7</td>
                                                    <td></td>
                                                    <td>Pago mes agosto</td>
                                                </tr>
                                                <tr>
                                                    <td>pm8</td>
                                                    <td></td>
                                                    <td>Pago mes septiembre</td>
                                                </tr>
                                                <tr>
                                                    <td>pm9</td>
                                                    <td></td>
                                                    <td>Pago mes octubre</td>
                                                </tr>
                                                <tr>
                                                    <td>pm10</td>
                                                    <td></td>
                                                    <td>Pago mes noviembre</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class='col-lg-7'>
                                    <div class='display-table'>
                                        <div class='display-table-cell'>
                                            <div class='up-event-text'>
                                                <!--<script
                                                    src="https://checkout.epayco.co/checkout.js"
                                                    class="epayco-button"
                                                    data-epayco-key="870fd53ee9274a76a62c34f434b09569"
                                                    data-epayco-amount="50000"
                                                    data-epayco-name="Unicab Colegio Virtual"
                                                    data-epayco-description="Pagos en línea Unicab"
                                                    data-epayco-currency="cop"
                                                    data-epayco-country="co"
                                                    data-epayco-test="true"
                                                    data-epayco-external="false"
                                                    data-epayco-response="https://ejemplo.com/respuesta.html"
                                                    data-epayco-confirmation="https://ejemplo.com/confirmacion">
                                                </script>-->
                                                <h5>Referencia de pago</h5>
                                                <img src="assets/img/ref_pago_2022.png" width="500px"><br><br>
                                                                
                                                <table>
                                                    <tbody>
                                                        <tr class="trtitulo">
                                                            <td><input type="radio" id="opvalor0" name="opvalor" value="0"> Ingrese referencia de pago.</td>
                                                            <td width="50"></td>
                                                            <td><input type="radio" id="opvalor1" name="opvalor" value="1"> Ingrese valor manual.</td>
                                                        </tr>
                                                        <tr class="trespacio">
                                                            <td colspan="3"></td>
                                                        </tr>
                                                        <tr class="trtitulo">
                                                            <td colspan="3">MEDIO DE PAGO  (Efectivo --> Baloto, Efecty, Punto Red, Red Servi, Gana, etc...)</td>
                                                        </tr>
                                                        <tr id="trmediopago">
                                                            <td>
                                                                <br/>
                                                                <select id="selmedio">
                                                                    <option value="NA" selected>Seleccione medio de pago</option>
                                                                    <option value="E">Efectivo</option>
                                                                    <option value="P">PSE</option>
                                                                    <option value="P6">PSE < 60000</option>
                                                                    <option value="TC">Tarjeta de crédito</option>
                                                                </select>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr class="trespacio">
                                                            <td colspan="3"></td>
                                                        </tr>
                                                        <tr class="trtitulo" id="trrefpago0">
                                                            <td colspan="3">DATOS PARA REFERENCIA DE PAGO</td>
                                                        </tr>
                                                        <tr >
                                                            <td colspan="3">
                                                                <label>* Ingrese referencia de pago. <span style="color:red">(* Incremento de 5% en pensión si paga después del día 10)</span></label>
                                                                <br>
                                                                <p style="text-align: justify; color: blue">
																	<strong>NOTA:</strong> El valor de la pensión se debe pagar a partir de febrero del año 2024 con los nuevos costos emitidos por la Secretaría de Educación. 
																	<strong>A partir del 1 de febrero el costo por concepto de matrícula tendrá un recargo adicional del 10% por extemporaneidad.</strong> 
																	El concepto de pago <strong>pp</strong> (primer pago) incluye el valor de la matrícula más otros cobros periódicos (incluye póliza) más pensión primer mes.
																</p>
                                                            </td>
                                                        </tr>
                                                        <tr id="trrefpago">
                                                            <td>
                                                                <!--<label>* Ingrese referencia de pago. (* Incremento del 3% si paga después del día 10)</label><br/>-->
                                                                <input type="text" id="txtref" placeholder="Referencia de pago" onkeyup="validar_texto1('txtref', 'Referencia de pago');"/>
                                                                <button id="btnqval" class="btn btn-success" onclick="qval()">CONSULTAR</button>
                                                                <input type="hidden" style="width: 20px" id="ctr_txtref" value="1"/>
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                                <br/><!--<label>* Incremento del 3% si paga después del día 10</label>--><br/>
                                                                <input type="text" id="txtvalorref" class="inactivo" placeholder="Valor a pagar" readonly/>
                                                            </td>
                                                        </tr>
                                                        <tr class="trtitulo" id="tringvalor0">
                                                            <td colspan="3">DATOS PARA VALOR MANUAL</td>
                                                        </tr>
                                                        <tr id="tringvalor">
                                                            <td>
                                                                <label>* Documento estudiante</label><br/>
                                                                <input type="text" id="txtndoc" placeholder="Documento estudiante" onkeyup="validar_numero('txtndoc', 'Documento estudiante');"/>
                                                                <input type="hidden" style="width: 20px" id="ctr_txtndoc" value="1"/>
                                                                <br/><label>* Año</label><br/>
                                                                <input type="text" id="txtano" placeholder="Año" onkeyup="validar_numero('txtano', 'Año');"/>
                                                                <input type="hidden" style="width: 20px" id="ctr_txtano" value="1"/>
                                                                <br/><label>* Concepto de pago</label><br/>
                                                                <select id="selconcepto">
                                                                    <option value="NA" selected>Seleccione concepto de pago</option>
                                                                    <option value="m">Matrícula</option>
                                                                    <!--<option value="mocp">Matrícula y otros cobros periódicos</option>-->
                                                                    <option value="pm1">Pensión mes 1 (Febrero)</option>
                                                                    <option value="pm2">Pensión mes 2 (Marzo)</option>
                                                                    <option value="pm3">Pensión mes 3 (Abril)</option>
                                                                    <option value="pm4">Pensión mes 4 (Mayo)</option>
                                                                    <option value="pm5">Pensión mes 5 (Junio)</option>
                                                                    <option value="pm6">Pensión mes 6 (Julio)</option>
                                                                    <option value="pm7">Pensión mes 7 (Agosto)</option>
                                                                    <option value="pm8">Pensión mes 8 (Septiembre)</option>
                                                                    <option value="pm9">Pensión mes 9 (Octubre)</option>
                                                                    <option value="pm10">Pensión mes 10 (Noviembre)</option>
                                                                    <option value="ocp">Otros cobros periódicos</option>
                                                                    <!--<option value="p">Póliza</option>-->
                                                                    <option value="pp">Primer pago</option>
                                                                    <option value="dg">Derechos de grado</option>
                                                                    <!--<option value="icfes">ICFES</option>-->
                                                                </select>
                                                                <br/><label>* Ingrese valor a pagar</label><br/>
                                                                <input type="text" id="txtvalor" placeholder="Ingrese valor" onkeyup="validar_numero('txtvalor', 'Valor a pagar');"/>
                                                                <input type="hidden" style="width: 20px" id="ctr_txtvalor" value="1"/>
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                                <br/><!--<label>Referencia de pago</label>--><br/>
                                                                <input type="text" id="txtref_valor" class="inactivo" placeholder="Refencia de pago" readonly/>
                                                            </td>
                                                        </tr>
                                                        <tr class="trespacio">
                                                            <td colspan="3"></td>
                                                        </tr>
                                                        <tr class="trtitulo">
                                                            <td colspan="3">DATOS DE QUIEN PAGA</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label>* Nombre de quien paga</label><br/>
                                                                <input type="text" id="txtnom" placeholder="Nombre" onkeyup="mayus(this, 'txtnom', 'Nombre');"/>
                                                                <input type="hidden" style="width: 20px" id="ctr_txtnom" value="1"/>
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                                <label>* Número de identificación</label><br/>
                                                                <input type="text" id="txtidentif" placeholder="Número de identificación" onkeyup="validar_numero('txtidentif', 'Número de identificación');"/>
                                                                <input type="hidden" style="width: 20px" id="ctr_txtidentif" value="1"/>
                                                            </td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table><br/><hr>
                            					<button id="btncontinuar" class="btn btn-brand" onclick="callEpayco()">Hacer pago por Epayco</button>
                            					<input type="hidden" id="txtcodfact" value="<?php //echo $codigo; ?>"/>
                            					<input type="hidden" id="txtconcepto"/>
                            					<input type="hidden" id="txtcontrolpago" value="0"/>
                            					<input type="hidden" id="txtidgrado" value="0"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="alert alert-danger" role="alert" id="alert">
                                <p><i class="fa fa-warning"></i><span>: </span><label id="pdesc"></label>
                                <input type="hidden" class="alert alert-danger" style="width: 20px" id="txtvacio" value="0"></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Gallery Page Content End ==-->

<!--== Footer Area Start ==-->
<footer id="footer-area">
   <?php include "footer.php" ?>
</footer>
<!--== Footer Area End ==-->

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

<!-- custom js: custom scripts for theme style switcher for demo purpose  -->



</body>
</html>
