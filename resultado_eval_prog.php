<?php
    include "admin-unicab/php/conexion.php";
    require "registro/docenteunicab/updreg/1cc3s4db.php";
    //https://unicab.org/resultado_eval_val.php?n_documento=999999&idgra=10
    
    if (!isset($_REQUEST['n_documento'])) {
        echo "<script>location.href='eval_val.php'</script>";
    }
    
    $documento = $_REQUEST['n_documento'];
    $idgra = $_REQUEST['idgra'];
    
    date_default_timezone_set('America/Bogota');
    $dia=date("d");
    $mes=date("m");
    $mesLetra=date("M");
    $fanio=date("Y");
    
    //Se consulta nombres y apellidos del documento
    $sql_n = "SELECT * FROM tbl_eval_cargos WHERE documento = '$documento'";
	//echo $sql_n;
	$exe_n = mysqli_query($conexion,$sql_n);
	while ($row_n = mysqli_fetch_array($exe_n)) {
	    $nombre_completo = $row_n['nombre_completo'];
	    $email = $row_n['email'];
	    //$acudiente = $row_n['nombre_a'];
	}
	//echo $nombre_completo;
	
	//Se consulta el nombre del grado
	$sql_grado = "SELECT * FROM grados WHERE id = $idgra";
	//echo $sql_grado;
	$exe_grado = mysqli_query($conexion,$sql_grado);
	while ($row_grado = mysqli_fetch_array($exe_grado)) {
	    $grado_ra = str_replace(" ", "_", $row_grado['grado']);
	}	
	//echo $grado_ra;
    
    //Se consulta el resultado de las preguntas
    $sql = "SELECT m.tema, p.pregunta, r.respuesta, r.resultado, 
    case r.resultado when 'OK' then 'MUY BIEN' else p.retroalimentacion end comentarios
    FROM tbl_respuestas_val r, tbl_preguntas p, tbl_temas_preguntas m 
    WHERE r.id_pregunta = p.id AND r.id_materia = m.id 
    AND r.a = $fanio AND r.identificacion = '$documento' AND r.id_grado = $idgra";
	//echo $sql;
	
	//Se hace la consulta de las recomendaciones para numérico
	
    //Se hacen los conteos generales
    $conteos = array(ctok=>0, ctno=>0, ctna=>0);
    $resumen = new stdClass();
    $resumen->html = $conteos;
    $resumen->css = $conteos;
    $resumen->js = $conteos;
    $resumen->htmlcss = $conteos;
    $obj_json = json_encode($resumen, JSON_UNESCAPED_UNICODE);
    $obj_json_decode = json_decode($obj_json, true);
    //echo $obj_json;
    
    //Totales por tema
    $tothtml = 0;
    $totcss = 0;
    $totjs = 0;
    $tothtmlcss = 0;
	$totjq = 0;
    $total_todos = 0;
    $total_todos_ok = 0;
    
    //Nivel por tema
    $nivhtml = "";
    $nivcss = "";
    $nivjs = "";
    $nivhtmlcss = "";
	$nivjq = "";
    $nivglo = "";
    
    $colhtml = "";
    $colcss = "";
    $coljs = "";
    $colhtmlcss = "";
	$coljq = "";
    $colglo = "";
    
    $tot_ok = 0;
    $tot_gen = 0;
    $sql_ctok = "SELECT COUNT(1) ct_ok, identificacion, id_materia FROM tbl_respuestas_val WHERE resultado = 'OK' AND identificacion = '$documento' 
    AND a = $fanio AND id_grado = $idgra GROUP BY identificacion, id_materia";
    //echo $sql_ctok;
    $exe_ctok = $mysqli1->query($sql_ctok);
    while($row_ctok = $exe_ctok->fetch_assoc()) {
        //echo "control";
        if($row_ctok['id_materia'] == 348) {
            $obj_json_decode['html']['ctok'] = $row_ctok['ct_ok'];
            $tothtml += $row_ctok['ct_ok'];
            $total_todos_ok += $row_ctok['ct_ok'];
        }
        else if($row_ctok['id_materia'] == 349) {
            $obj_json_decode['css']['ctok'] = $row_ctok['ct_ok'];
            $totcss += $row_ctok['ct_ok'];
            $total_todos_ok += $row_ctok['ct_ok'];
        }
        else if($row_ctok['id_materia'] == 350) {
            $obj_json_decode['js']['ctok'] = $row_ctok['ct_ok'];
            $totjs += $row_ctok['ct_ok'];
            $total_todos_ok += $row_ctok['ct_ok'];
        }
        else if($row_ctok['id_materia'] == 351) {
            $obj_json_decode['htmlcss']['ctok'] = $row_ctok['ct_ok'];
            $tothtmlcss += $row_ctok['ct_ok'];
            $total_todos_ok += $row_ctok['ct_ok'];
        }
		else if($row_ctok['id_materia'] == 352) {
            $obj_json_decode['jq']['ctok'] = $row_ctok['ct_ok'];
            $totjq += $row_ctok['ct_ok'];
            $total_todos_ok += $row_ctok['ct_ok'];
        }
        //echo "control1";
        $tot_ok += $row_ctok['ct_ok'];
        $tot_gen += $row_ctok['ct_ok'];
    }
    //echo $tot_ok;
    //echo $tot_gen;
    
    $sql_ctno = "SELECT COUNT(1) ct_no, identificacion, id_materia FROM tbl_respuestas_val WHERE resultado = 'NO' AND identificacion = '$documento' 
    AND a = $fanio AND id_grado = $idgra GROUP BY identificacion, id_materia";
    //echo $sql_ctno;
    $exe_ctno = $mysqli1->query($sql_ctno);
    while($row_ctno = $exe_ctno->fetch_assoc()) {
        if($row_ctno['id_materia'] == 348) {
            $obj_json_decode['html']['ctno'] = $row_ctno['ct_no'];
            $tothtml += $row_ctno['ct_no'];
        }
        else if($row_ctno['id_materia'] == 349) {
            $obj_json_decode['css']['ctno'] = $row_ctno['ct_no'];
            $totcss += $row_ctno['ct_no'];
        }
        else if($row_ctno['id_materia'] == 350) {
            $obj_json_decode['js']['ctno'] = $row_ctno['ct_no'];
            $totjs += $row_ctno['ct_no'];
        }
        else if($row_ctno['id_materia'] == 351) {
            $obj_json_decode['htmlcss']['ctno'] = $row_ctno['ct_no'];
            $tothtmlcss += $row_ctno['ct_no'];
        }
        else if($row_ctno['id_materia'] == 352) {
            $obj_json_decode['jq']['ctno'] = $row_ctno['ct_no'];
            $totjq += $row_ctno['ct_no'];
        }
        $tot_gen += $row_ctno['ct_no'];
    }
    //echo $tot_ok;
    //echo $tot_gen;
    
    $sql_ctna = "SELECT COUNT(1) ct_na, identificacion, id_materia FROM tbl_respuestas_val WHERE resultado = 'NA' AND identificacion = '$documento' 
    AND a = $fanio AND id_grado = $idgra GROUP BY identificacion, id_materia";
    $exe_ctna = $mysqli1->query($sql_ctna);
    while($row_ctna = $exe_ctna->fetch_assoc()) {
        if($row_ctna['id_materia'] == 348) {
            $obj_json_decode['html']['ctna'] = $row_ctna['ct_na'];
            $tothtml += $row_ctna['ct_na'];
        }
        else if($row_ctna['id_materia'] == 349) {
            $obj_json_decode['css']['ctna'] = $row_ctna['ct_na'];
            $totcss += $row_ctna['ct_na'];
        }
        else if($row_ctna['id_materia'] == 350) {
            $obj_json_decode['js']['ctna'] = $row_ctna['ct_na'];
            $totjs += $row_ctna['ct_na'];
        }
        else if($row_ctna['id_materia'] == 351) {
            $obj_json_decode['htmlcss']['ctna'] = $row_ctna['ct_na'];
            $tothtmlcss += $row_ctna['ct_na'];
        }
        else if($row_ctna['id_materia'] == 352) {
            $obj_json_decode['jq']['ctna'] = $row_ctna['ct_na'];
            $totjq += $row_ctna['ct_na'];
        }
        $tot_gen += $row_ctna['ct_na'];
    }
    //echo $tot_gen;
    
    $obj_json_decode['html']['ctpen'] = $tothtml;
    $obj_json_decode['css']['ctpen'] = $totcss;
    $obj_json_decode['js']['ctpen'] = $totjs;
    $obj_json_decode['htmlcss']['ctpen'] = $tothtmlcss;
	$obj_json_decode['jq']['ctpen'] = $totjq;
    
    $total_todos = $tothtml + $totcss + $totjs + $tothtmlcss + $totjq;
    
    if($obj_json_decode['html']['ctok'] / $tothtml > 0.75) {
        $nivhtml = "SUPER ALTO";
        $colhtml = "#138726";
    }
    else if($obj_json_decode['html']['ctok'] / $tothtml > 0.5) {
        $nivhtml = "ALTO";
        $colhtml = "#4b9db9";
    }
    else if($obj_json_decode['html']['ctok'] / $tothtml > 0.25) {
        $nivhtml = "MEDIO";
        $colhtml = "#FFC300";
    }
    else {
        if($tothtml > 0) {
            $nivhtml = "BAJO";
            $colhtml = "#e8222e";
        }
        else {
            $nivhtml = "NO APLICA";
            $colhtml = "#000";
        }
    }
    
    if($obj_json_decode['css']['ctok'] / $totcss > 0.75) {
        $nivcss = "SUPER ALTO";
        $colcss = "#138726";
    }
    else if($obj_json_decode['css']['ctok'] / $totcss > 0.5) {
        $nivcss = "ALTO";
        $colcss = "#4b9db9";
    }
    else if($obj_json_decode['css']['ctok'] / $totcss > 0.25) {
        $nivcss = "MEDIO";
        $colcss = "#FFC300";
    }
    else {
        if($totcss > 0) {
            $nivcss = "BAJO";
            $colcss = "#e8222e";
        }
        else {
            $nivcss = "NO APLICA";
            $colcss = "#000";
        }
    }
    
    if($obj_json_decode['js']['ctok'] / $totjs > 0.75) {
        $nivjs = "SUPER ALTO";
        $coljs = "#138726";
    }
    else if($obj_json_decode['js']['ctok'] / $totjs > 0.5) {
        $nivjs = "ALTO";
        $coljs = "#4b9db9";
    }
    else if($obj_json_decode['js']['ctok'] / $totjs > 0.25) {
        $nivjs = "MEDIO";
        $coljs = "#FFC300";
    }
    else {
        if($totjs > 0) {
            $nivjs = "BAJO";
            $coljs = "#e8222e";
        }
        else {
            $nivjs = "NO APLICA";
            $coljs = "#000";
        }
    }
    
    if($obj_json_decode['htmlcss']['ctok'] / $tothtmlcss > 0.75) {
        $nivhtmlcss = "SUPER ALTO";
        $colhtmlcss = "#138726";
    }
    else if($obj_json_decode['htmlcss']['ctok'] / $tothtmlcss > 0.5) {
        $nivhtmlcss = "ALTO";
        $colhtmlcss = "#4b9db9";
    }
    else if($obj_json_decode['htmlcss']['ctok'] / $tothtmlcss > 0.25) {
        $nivhtmlcss = "MEDIO";
        $colhtmlcss = "#FFC300";
    }
    else {
        if($tothtmlcss > 0) {
            $nivhtmlcss = "BAJO";
            $colhtmlcss = "#e8222e";
        }
        else {
            $nivhtmlcss = "NO APLICA";
            $colhtmlcss = "#000";
        }
    }
	
	if($obj_json_decode['jq']['ctok'] / $totjq > 0.75) {
        $nivjq = "SUPER ALTO";
        $coljq = "#138726";
    }
    else if($obj_json_decode['jq']['ctok'] / $totjq > 0.5) {
        $nivjq = "ALTO";
        $coljq = "#4b9db9";
    }
    else if($obj_json_decode['jq']['ctok'] / $totjq > 0.25) {
        $nivjq = "MEDIO";
        $coljq = "#FFC300";
    }
    else {
        if($totjq > 0) {
            $nivjq = "BAJO";
            $coljq = "#e8222e";
        }
        else {
            $nivjq = "NO APLICA";
            $coljq = "#000";
        }
    }
    
    if($total_todos_ok / $total_todos > 0.75) {
        $nivglo = "SUPER ALTO";
        $colglo = "#138726";
    }
    else if($total_todos_ok / $total_todos > 0.5) {
        $nivglo = "ALTO";
        $colglo = "#4b9db9";
    }
    else if($total_todos_ok / $total_todos > 0.25) {
        $nivglo = "MEDIO";
        $colglo = "#FFC300";
    }
    else {
        $nivglo = "BAJO";
        $colglo = "#e8222e";
    }
    
    $porc = round(($tot_ok / $tot_gen),2) * 100;
    
?>
<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Admisiones | Unicab | Colegio Virtual</title>

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
    <script type="text/javascript" src="registro/docenteunicab/updreg/js/gridviewscroll.js"></script>
	<script type="text/javascript" src="registro/docenteunicab/updreg/js/Chart.bundle.min.js"></script>
    
    <!-- Main Master Style  CSS  -->
    <link id="cbx-style" data-layout="1" rel="stylesheet" href="assets/css/style-default.min.css" media="all">
    
	<!--SEGUIMIENTO GOOGLE-->
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158598632-1"></script>
    <script>
        var gridViewScroll = null;
        
        $(function() {
            var options = new GridViewScrollOptions();
            options.elementID = "tblres";
            options.width = 100%;
            options.height = 300;
            options.freezeColumn = true;
            //options.freezeFooter = false;
            options.freezeColumnCssClass = "GridViewScrollItemFreeze";
            //options.freezeFooterCssClass = "GridViewScrollFooterFreeze";
            options.freezeColumnCount = 2;

            gridViewScroll = new GridViewScroll(options);
            gridViewScroll.enhance();
                
            var contenido=$(".ghf");
            contenido.slideUp(250);
            var contenido1=$(".ghf1");
            //contenido1.slideUp(250);
            
            //val_documento();
        });
        
    </script>

    <style>
        .fa-chevron-right {
            color: blue;
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
        #divnum {
            background: #CEF6F5;
        }
        #divtec {
            background: #F5A9A9;
        }
        #diving {
            background: #F3F781;
        }
        #divesp {
            background: #F7BE81;
        }
        #divbio {
            background: #F6CECE;
        }
        #divfis {
            background: #A9F5A9;
        }
        #divsoc {
            background: #D8D8D8;
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
        #tblres {
            table-layout: fixed;
        }
        #tblres .tdcorto {
            width: 80px;
            text-align: center;
        }
        #tblres .tdmedio {
            width: 200px;
        }
        .GridViewScrollHeader TH, .GridViewScrollHeader TD {
            padding: 5px;
            font-weight: bold;
            background-color: #CCCCCC;
            color: #000000;
        }
        .GridViewScrollItem TD {
            padding: 5px;
            color: #444444;
        }
        .GridViewScrollItemFreeze TD {
            padding: 5px;
            background-color: #CCCCCC;
            color: #444444;
        }
        .GridviewScrollItemHover TD
        {
            background-color: #CCCCCC;
            color: blue;
        }
        .txtct {
            width: 20px;
            border: 0;
            color: black;
            font-weight: bold;
        }
        .fondoblanco {
            background: white;
        }
        #divenc1 {
            display: flex;
            justify-content: center;
        }
        #divenc2 {
            display: flex;
            justify-content: space-around;
        }
        #divenc2_1 {
            border: 3px solid #093A5F;
            width: 50%;
            padding-left: 20px;
        }
        #divenc2_2 {
            background: #54CF8C;
            width: 30%;
            text-align: center;
        }
        
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins-medium:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap');
        /*@import url('https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@700&display=swap');*/
        
        #divglobal {
            display: flex;
            justify-content: center;
            text-align: center;
            background: #F1F1F2;
        }
        #tblglobal, thead {
            border: 2px solid black;
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
                                            
                                                <div class="register-form" id="divform">
                                                    <!--<form name="formulario" id="formulario" method="post" action="" enctype="multipart/form-data">-->
                                                        <div id="divenc1">
                                					        <div>
                                					            <img src="registro/images/encabezado_informes1.jpg" width="100%"/>
                                					        </div>
                                					    </div><br>
                                					    
                                					    <div id="divenc2">
                                						    <div id="divenc2_1">
                                						        <p>Evaluación de Cargo</p>
                                						        <p>Nombres y Apellidos: <strong><?php echo $nombre_completo; ?></strong></p>
                                						        <p>Documento: <strong><?php echo $documento; ?></strong></p>
                                						        <p>Cargo: <strong><?php echo $grado_ra; ?></strong></p>
                                						    </div>
                                						    <div id="divenc2_2">
                                						        <p style="font-family: 'Poppins'; font-size: 24px; font-style: italic; color: #093A5F">GLOBAL</p>
                                						        <p style="font-family: 'Poppins-medium'; font-size: 18px; color: #093A5F; padding: 0 5px;">De <?php echo $total_todos; ?> puntos posibles, su puntaje global es de <?php echo $total_todos_ok; ?>.</p>
                                						    </div>
                                						</div><br>
                                						
                                						<div style="width: 100%; background: #093A5F; color: #F1F1F2; text-align: center; font-size: 20px; font-weight: bold; font-family: 'PT Sans Narrow';">Informe Global
                                                        </div>
                                                        <div style="width: 100%; background: #F1F1F2; text-align: center; font-size: 20px; font-family: 'Poppins-medium';">
                                                            <br><p>A continuación se relacionan los puntajes obtenidos en cada uno de los temas evaluados en la evaluación de cargo:</p><br>
                                                        </div>
                                                        
                                                        <div class="row" id="divglobal">
                                                            <table id="tblglobal" style="text-align: center;">
                                                                <thead style="font-family: 'PT Sans Narrow';">
                                                                    <tr style="background: #45A872; color: #F1F1F2; font-size: 20px; font-weight: bold; border: 2px;"><td colspan="9">Temas</td></tr>
                                                                    <tr>
                                                                        <td colspan="2" width="200px" style="background: #FA4D59; color: #F1F1F2; font-size: 20px; font-weight: bold; border: 2px solid black;">Global</td>
                                                                        <td width="100px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">HTML5</td>
                                                                        <td width="100px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">CSS3</td>
                                                                        <td width="100px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">JS</td>
                                                                        <td width="100px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">HTML5CSS3</td>
                                                                        <td width="100px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">JQUERY</td>
                                                                        <!--<td width="100px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">Tec</td>
                                                                        <td width="100px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">Fis</td>-->
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-family: 'PT Sans Narrow';">
                                                                    
                                                                <?php
                                                                    $linea = '<tr>';
                                                                    $linea .= '<td style="color: #064C86; border: 2px solid black;">Puntaje</td>';
                                                                    $linea .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$total_todos_ok.' / '.$total_todos.'</td>';
                                                                    $linea .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['html']['ctok'].' / '.$obj_json_decode['html']['ctpen'].'</td>';
                                                                    $linea .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['css']['ctok'].' / '.$obj_json_decode['css']['ctpen'].'</td>';
                                                                    $linea .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['js']['ctok'].' / '.$obj_json_decode['js']['ctpen'].'</td>';
                                                                    $linea .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['htmlcss']['ctok'].' / '.$obj_json_decode['htmlcss']['ctpen'].'</td>';
                                                                    $linea .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['jq']['ctok'].' / '.$obj_json_decode['jq']['ctpen'].'</td>';
                                                                    /*$linea .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['tec']['ctok'].' / '.$obj_json_decode['tec']['ctpen'].'</td>';
                                                                    $linea .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['fis']['ctok'].' / '.$obj_json_decode['fis']['ctpen'].'</td>';*/
                                                                    $linea .= '</tr>';
                                                                    echo $linea;
                                                                    
                                                                    $linea = '<tr>';
                                                                    $linea .= '<td style="color: #064C86; border: 2px solid black;">Desempeño</td>';
                                                                    $linea .= '<td style="color: '.$colglo.'; border: 2px solid black; font-weight: bold;">'.$nivglo.'</td>';
                                                                    $linea .= '<td style="color: '.$colhtml.'; border: 2px solid black; font-weight: bold;">'.$nivhtml.'</td>';
                                                                    $linea .= '<td style="color: '.$colcss.'; border: 2px solid black; font-weight: bold;">'.$nivcss.'</td>';
                                                                    $linea .= '<td style="color: '.$coljs.'; border: 2px solid black; font-weight: bold;">'.$nivjs.'</td>';
                                                                    $linea .= '<td style="color: '.$colhtmlcss.'; border: 2px solid black; font-weight: bold;">'.$nivhtmlcss.'</td>';
                                                                    $linea .= '<td style="color: '.$coljq.'; border: 2px solid black; font-weight: bold;">'.$nivjq.'</td>';
                                                                    /*$linea .= '<td style="color: '.$coltec.'; border: 2px solid black; font-weight: bold;">'.$nivtec.'</td>';
                                                                    $linea .= '<td style="color: '.$colfis.'; border: 2px solid black; font-weight: bold;">'.$nivfis.'</td>';*/
                                                                    $linea .= '</tr>';
                                                                    echo $linea;
                                                                ?>
                                                                
                                                                </tbody>
                                                            </table>
                                                        </div><br>
                                                        
                                                        <div>
                                                            <p><i class="fa fa-chevron-right"></i> <strong>Convenciones:</strong> Contestadas bien <img src="registro/images/checked_1.jpg" height="25px"/>,  Contestadas incorrectas <img src="registro/images/unchecked_1.jpg" width="25px"/>, No contestadas <img src="registro/images/na_1.jpg" width="25px"/></p>
                                                        </div>
                                                        
                                                        <div style="width: 100%; background: #093A5F; color: #F1F1F2; text-align: center; font-size: 20px; font-weight: bold; font-family: 'PT Sans Narrow';">Informe por Tema</div>
                                                        
                                                        <div class="form-group" style="background: #F1F1F2;">
                                                            <table id="tblres" border="1px" class="table" style="width:100%">
                                                                <thead>                    
                                						            <tr class="GridViewScrollHeader">
                                						                <td class="tdmedio">Tema</td>
                                						                <td>Pregunta</td>
                                						                <td class="tdcorto">Resultado</td>
                                						            </tr>
                                						        </thead>
                                						        <tbody>
                                						        	<?php 
                                						        	    $peticion = mysqli_query($conexion,$sql);
                                							        	while ($fila = mysqli_fetch_array($peticion)){
                                							        	    if($fila['resultado'] == "NO") {
                                							        		    echo"<tr class='GridviewScrollItem'>
                                    							        		<td>".$fila['tema']."</td>
                                    							        		<td>".$fila['pregunta']."</td>
                                    							        		<td class='tdcorto'><img src='registro/images/unchecked_1.jpg' width='25px'/></td></tr>";
                                							        		}
                                							        		else if($fila['resultado'] == "OK") {
                                							        		    echo"<tr class='GridviewScrollItem'>
                                    							        		<td>".$fila['tema']."</td>
                                    							        		<td>".$fila['pregunta']."</td>
                                    							        		<td class='tdcorto'><img src='registro/images/checked_1.jpg' height='25px'/></td></tr>";
                                							        		}
                                							        		else if($fila['resultado'] == "NA") {
                                							        		    echo"<tr class='GridviewScrollItem'>
                                    							        		<td>".$fila['tema']."</td>
                                    							        		<td>".$fila['pregunta']."</td>
                                    							        		<td class='tdcorto'><img src='registro/images/na_1.jpg' width='25px'/></td></tr>";
                                							        		}
                                							        	}
                                						        	?>
                                						        </tbody>
                                                            </table>
                                                        </div>
                                                    <!--</form>-->
                                                    
                                                </div><br>
                                                <input type="hidden" id="txtctnum" value="<?php echo $ct_num; ?>"/>
                                            	<input type="hidden" id="txtctbio" value="<?php echo $ct_bio; ?>"/>
                                            	<input type="hidden" id="txtctsoc" value="<?php echo $ct_soc; ?>"/>
                                            	<input type="hidden" id="txtctesp" value="<?php echo $ct_esp; ?>"/>
                                            	<input type="hidden" id="txtcting" value="<?php echo $ct_ing; ?>"/>
                                            	<input type="hidden" id="txtcttec" value="<?php echo $ct_tec; ?>"/>
                                            	<input type="hidden" id="txtctfis" value="<?php echo $ct_fis; ?>"/>
                                                
                                                <?php
                                                    if($porc >= 80) {
                                                ?>
                                                        <h3><span class="badge badge-success">El resultado de la evaluación de cargo es: <?php echo $porc;?>%. Validación aprobada.</span></h3>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <h3><span class="badge badge-danger">El resultado de la evaluación de cargo es: <?php echo $porc;?>%. Validación no aprobada.</span></h3>
                                                <?php
                                                    }
                                                ?>
                                                <h5><span class="badge badge-secondary">Se envío una copia del resultado al correo registrado.</span></h5>
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

</body>
</html>
