<?php
    include "admin-unicab/php/conexion.php";
    require "registro/docenteunicab/updreg/1cc3s4db.php";
    header("Cache-Control: no-store");
    //https://unicab.org/res_eval_val_correo_1.php?n_documento=1111&idgra=3
    
    require_once 'registro/docenteunicab/updreg/dompdf/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    
    class PDF {
        public static function stream($nom_pdf, $html) {
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait'); // (Opcional) Configurar papel y orientación landscape | portrait
            $dompdf->render(); // Generar el PDF desde contenido HTML
            $pdf = $dompdf->output(); // Obtener el PDF generado
            $dompdf->stream($nom_pdf); // Enviar el PDF generado al navegador
        }
        
        public static function saveDisk($nom_pdf, $html, $folder) {
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait'); // (Opcional) Configurar papel y orientación landscape | portrait
            $dompdf->render(); // Generar el PDF desde contenido HTML
            $pdf = $dompdf->output(); // Obtener el PDF generado
            
            $pdf_guardar = $folder.$nom_pdf;
            //echo $pdf_guardar;
            
            if(!file_exists($folder)) {
                if(mkdir($folder, 0755, true)) {
                    file_put_contents($pdf_guardar, $pdf);
                }
            }
            else {
                file_put_contents($pdf_guardar, $pdf);
            }
        }
    }
    
    require('registro/financieraunicab/PHPMailer_master/src/Exception.php');
    require('registro/financieraunicab/PHPMailer_master/src/PHPMailer.php');
    require('registro/financieraunicab/PHPMailer_master/src/SMTP.php');
    use  PHPMailer\PHPMailer\PHPMailer ;
    use  PHPMailer\PHPMailer\SMTP ;
    use  PHPMailer\PHPMailer\Exception ;
    
    $documento = $_REQUEST['n_documento'];
    $idgra = $_REQUEST['idgra'];
    //echo $documento;
    
    date_default_timezone_set('America/Bogota');
    $dia=date("d");
    $mes=date("m");
    $mesLetra=date("M");
    $fanio=date("Y");
    
    $array_materiasf = array(1, 4, 5, 6, 7, 9, 11);
	$array_materias = array(1, 4, 5, 6, 7, 9);
	$array_materias_1011 = array(10, 12, 5, 15, 7, 9);
	$array_materias_1011f = array(10, 12, 5, 15, 7, 9, 11);
    
    //Se consulta nombres y apellidos del documento
    $sql_n = "SELECT * FROM tbl_pre_matricula WHERE documento_est = '$documento'";
	//echo $sql_n;
	$exe_n = mysqli_query($conexion,$sql_n);
	while ($row_n = mysqli_fetch_array($exe_n)) {
	    $nombre_completo = $row_n['nombres_est']." ".$row_n['apellidos_est'];
	    $email_a = $row_n['email_a'];
	    $acudiente = $row_n['nombre_a'];
	}
	//echo $nombre_completo;
	
	//********************* SE FINAIZAN LAS RESPUESTAS ***************************
	$sql_updfin = "UPDATE tbl_respuestas_val SET estado = 'FINALIZADA' WHERE identificacion = '$documento' AND a = $fanio AND resultado != 'NA' AND id_grado = $idgra";
	$exe_updfin = mysqli_query($conexion,$sql_updfin);
	//***************************************************************************
	
	//Se consulta el nombre del grado
	$sql_grado = "SELECT * FROM equivalence_idgra WHERE id_grado_ra = $idgra";
	$exe_grado = mysqli_query($conexion,$sql_grado);
	while ($row_grado = mysqli_fetch_array($exe_grado)) {
	    $grado_ra = $row_grado['grado_ra'];
	}
	
	if($idgra == 11 || $idgra == 12 || $idgra == 17 || $idgra == 18 ) {
	    //$array_materias_final = $array_materiasf;
	    $array_materias_final = $array_materias_1011f;
	    $con_fisica = "SI";
	}
	else {
	    $array_materias_final = $array_materias;
	}
    
    //Se consulta el resultado de las preguntas
    $sql = "SELECT m.materia, p.pregunta, r.respuesta, r.resultado, 
    case r.resultado when 'OK' then 'MUY BIEN' else p.retroalimentacion end comentarios
    FROM tbl_respuestas_val r, tbl_preguntas p, materias m 
    WHERE r.id_pregunta = p.id AND r.id_materia = m.id 
    AND r.a = $fanio AND r.identificacion = '$documento' AND r.id_grado = $idgra";
	//echo $sql;
	
	//Se hace la consulta de las recomendaciones para numérico
	/*$sql_retro_num = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 5";*/
	
	//Se hace la consulta de las recomendaciones para bioético
    /*$sql_retro_bio = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 1";*/
    
    //Se hace la consulta de las recomendaciones para social
    /*$sql_retro_soc = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 4";*/
    
    //Se hace la consulta de las recomendaciones para español
    /*$sql_retro_esp = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 6";*/
    
    //Se hace la consulta de las recomendaciones para inglés
    /*$sql_retro_ing = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 7";*/
    
    //Se hace la consulta de las recomendaciones para tecnológico
    /*$sql_retro_tec = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 9";*/
    
    //Se hace la consulta de las recomendaciones para física
    /*$sql_retro_fis = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 11";*/
    
    //Se hacen los conteos generales
    $conteos = array(ctok=>0, ctno=>0, ctna=>0);
    $resumen = new stdClass();
    $resumen->bio = $conteos;
    $resumen->soc = $conteos;
    $resumen->num = $conteos;
    $resumen->esp = $conteos;
    $resumen->ing = $conteos;
    $resumen->tec = $conteos;
    $resumen->fis = $conteos;
    $obj_json = json_encode($resumen, JSON_UNESCAPED_UNICODE);
    $obj_json_decode = json_decode($obj_json, true);
    //echo $obj_json;
    
    //Totales por pensamiento
    $totbio = 0;
    $totsoc = 0;
    $totnum = 0;
    $totesp = 0;
    $toting = 0;
    $tottec = 0;
    $totfis = 0;
    $total_todos = 0;
    $total_todos_ok = 0;
    
    //Nivel por pensamiento
    $nivbio = "";
    $nivsoc = "";
    $nivnum = "";
    $nivesp = "";
    $niving = "";
    $nivtec = "";
    $nivfis = "";
    $nivglo = "";
    
    $colbio = "";
    $colsoc = "";
    $colnum = "";
    $colesp = "";
    $coling = "";
    $coltec = "";
    $colfis = "";
    $colglo = "";
    
    $tot_ok = 0;
    $tot_gen = 0;
    $sql_ctok = "SELECT COUNT(1) ct_ok, identificacion, id_materia FROM tbl_respuestas_val WHERE resultado = 'OK' AND identificacion = '$documento' 
    AND a = $fanio AND id_grado = $idgra GROUP BY identificacion, id_materia";
    //echo $sql_ctok;
    $exe_ctok = $mysqli1->query($sql_ctok);
    while($row_ctok = $exe_ctok->fetch_assoc()) {
        //echo "control";
        if($row_ctok['id_materia'] == 1) {
            $obj_json_decode['bio']['ctok'] = $row_ctok['ct_ok'];
            $totbio += $row_ctok['ct_ok'];
            $total_todos_ok += $row_ctok['ct_ok'];
        }
        else if($row_ctok['id_materia'] == 10) {
            $obj_json_decode['bio']['ctok'] = $row_ctok['ct_ok'];
            $totbio += $row_ctok['ct_ok'];
            $total_todos_ok += $row_ctok['ct_ok'];
        }
        else if($row_ctok['id_materia'] == 4) {
            $obj_json_decode['soc']['ctok'] = $row_ctok['ct_ok'];
            $totsoc += $row_ctok['ct_ok'];
            $total_todos_ok += $row_ctok['ct_ok'];
        }
        else if($row_ctok['id_materia'] == 12) {
            $obj_json_decode['soc']['ctok'] = $row_ctok['ct_ok'];
            $totsoc += $row_ctok['ct_ok'];
            $total_todos_ok += $row_ctok['ct_ok'];
        }
        else if($row_ctok['id_materia'] == 5) {
            $obj_json_decode['num']['ctok'] = $row_ctok['ct_ok'];
            $totnum += $row_ctok['ct_ok'];
            $total_todos_ok += $row_ctok['ct_ok'];
        }
        else if($row_ctok['id_materia'] == 6) {
            $obj_json_decode['esp']['ctok'] = $row_ctok['ct_ok'];
            $totesp += $row_ctok['ct_ok'];
            $total_todos_ok += $row_ctok['ct_ok'];
        }
        else if($row_ctok['id_materia'] == 15) {
            $obj_json_decode['esp']['ctok'] = $row_ctok['ct_ok'];
            $totesp += $row_ctok['ct_ok'];
            $total_todos_ok += $row_ctok['ct_ok'];
        }
        else if($row_ctok['id_materia'] == 7) {
            $obj_json_decode['ing']['ctok'] = $row_ctok['ct_ok'];
            $toting += $row_ctok['ct_ok'];
            $total_todos_ok += $row_ctok['ct_ok'];
        }
        else if($row_ctok['id_materia'] == 9) {
            $obj_json_decode['tec']['ctok'] = $row_ctok['ct_ok'];
            $tottec += $row_ctok['ct_ok'];
            $total_todos_ok += $row_ctok['ct_ok'];
        }
        else if($row_ctok['id_materia'] == 11) {
            $obj_json_decode['fis']['ctok'] = $row_ctok['ct_ok'];
            $totfis += $row_ctok['ct_ok'];
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
        if($row_ctno['id_materia'] == 1) {
            $obj_json_decode['bio']['ctno'] = $row_ctno['ct_no'];
            $totbio += $row_ctno['ct_no'];
        }
        else if($row_ctno['id_materia'] == 10) {
            $obj_json_decode['bio']['ctno'] = $row_ctno['ct_no'];
            $totbio += $row_ctno['ct_no'];
        }
        else if($row_ctno['id_materia'] == 4) {
            $obj_json_decode['soc']['ctno'] = $row_ctno['ct_no'];
            $totsoc += $row_ctno['ct_no'];
        }
        else if($row_ctno['id_materia'] == 12) {
            $obj_json_decode['soc']['ctno'] = $row_ctno['ct_no'];
            $totsoc += $row_ctno['ct_no'];
        }
        else if($row_ctno['id_materia'] == 5) {
            $obj_json_decode['num']['ctno'] = $row_ctno['ct_no'];
            $totnum += $row_ctno['ct_no'];
        }
        else if($row_ctno['id_materia'] == 6) {
            $obj_json_decode['esp']['ctno'] = $row_ctno['ct_no'];
            $totesp += $row_ctno['ct_no'];
        }
        else if($row_ctno['id_materia'] == 15) {
            $obj_json_decode['esp']['ctno'] = $row_ctno['ct_no'];
            $totesp += $row_ctno['ct_no'];
        }
        else if($row_ctno['id_materia'] == 7) {
            $obj_json_decode['ing']['ctno'] = $row_ctno['ct_no'];
        }
        else if($row_ctno['id_materia'] == 9) {
            $obj_json_decode['tec']['ctno'] = $row_ctno['ct_no'];
            $tottec += $row_ctno['ct_no'];
        }
        else if($row_ctno['id_materia'] == 11) {
            $obj_json_decode['fis']['ctno'] = $row_ctno['ct_no'];
            $totfis += $row_ctno['ct_no'];
        }
        
        $tot_gen += $row_ctno['ct_no'];
    }
    //echo $tot_ok;
    //echo $tot_gen;
    
    $sql_ctna = "SELECT COUNT(1) ct_na, identificacion, id_materia FROM tbl_respuestas_val WHERE resultado = 'NA' AND identificacion = '$documento' 
    AND a = $fanio AND id_grado = $idgra GROUP BY identificacion, id_materia";
    $exe_ctna = $mysqli1->query($sql_ctna);
    while($row_ctna = $exe_ctna->fetch_assoc()) {
        if($row_ctna['id_materia'] == 1) {
            $obj_json_decode['bio']['ctna'] = $row_ctna['ct_na'];
            $totbio += $row_ctna['ct_na'];
        }
        else if($row_ctna['id_materia'] == 10) {
            $obj_json_decode['bio']['ctna'] = $row_ctna['ct_na'];
            $totbio += $row_ctna['ct_na'];
        }
        else if($row_ctna['id_materia'] == 4) {
            $obj_json_decode['soc']['ctna'] = $row_ctna['ct_na'];
            $totsoc += $row_ctna['ct_na'];
        }
        else if($row_ctna['id_materia'] == 12) {
            $obj_json_decode['soc']['ctna'] = $row_ctna['ct_na'];
            $totsoc += $row_ctna['ct_na'];
        }
        else if($row_ctna['id_materia'] == 5) {
            $obj_json_decode['num']['ctna'] = $row_ctna['ct_na'];
            $totnum += $row_ctna['ct_na'];
        }
        else if($row_ctna['id_materia'] == 6) {
            $obj_json_decode['esp']['ctna'] = $row_ctna['ct_na'];
            $totesp += $row_ctna['ct_na'];
        }
        else if($row_ctna['id_materia'] == 15) {
            $obj_json_decode['esp']['ctna'] = $row_ctna['ct_na'];
            $totesp += $row_ctna['ct_na'];
        }
        else if($row_ctna['id_materia'] == 7) {
            $obj_json_decode['ing']['ctna'] = $row_ctna['ct_na'];
            $toting += $row_ctna['ct_na'];
        }
        else if($row_ctna['id_materia'] == 9) {
            $obj_json_decode['tec']['ctna'] = $row_ctna['ct_na'];
            $tottec += $row_ctna['ct_na'];
        }
        else if($row_ctna['id_materia'] == 11) {
            $obj_json_decode['fis']['ctna'] = $row_ctna['ct_na'];
            $totfis += $row_ctna['ct_na'];
        }
        
        $tot_gen += $row_ctna['ct_na'];
    }
    //echo $tot_gen;
    
    //echo $obj_json_decode['num']['ctok'] + $obj_json_decode['num']['ctno'] + $obj_json_decode['num']['ctna'];
    
    $obj_json_decode['bio']['ctpen'] = $totbio;
    $obj_json_decode['soc']['ctpen'] = $totsoc;
    $obj_json_decode['num']['ctpen'] = $totnum;
    $obj_json_decode['esp']['ctpen'] = $totesp;
    $obj_json_decode['ing']['ctpen'] = $toting;
    $obj_json_decode['tec']['ctpen'] = $tottec;
    $obj_json_decode['fis']['ctpen'] = $totfis;
    
    $total_todos = $totbio + $totsoc + $totnum + $totesp + $toting + $tottec + $totfis;
    
    if($obj_json_decode['bio']['ctok'] / $totbio > 0.75) {
        $nivbio = "SUPER ALTO";
        $colbio = "#138726";
    }
    else if($obj_json_decode['bio']['ctok'] / $totbio > 0.5) {
        $nivbio = "ALTO";
        $colbio = "#4b9db9";
    }
    else if($obj_json_decode['bio']['ctok'] / $totbio > 0.25) {
        $nivbio = "MEDIO";
        $colbio = "#FFC300";
    }
    else {
        if($totbio > 0) {
            $nivbio = "BAJO";
            $colbio = "#e8222e";
        }
        else {
            $nivbio = "NO APLICA";
            $colbio = "#000";
        }
    }
    
    if($obj_json_decode['soc']['ctok'] / $totsoc > 0.75) {
        $nivsoc = "SUPER ALTO";
        $colsoc = "#138726";
    }
    else if($obj_json_decode['soc']['ctok'] / $totsoc > 0.5) {
        $nivsoc = "ALTO";
        $colsoc = "#4b9db9";
    }
    else if($obj_json_decode['soc']['ctok'] / $totsoc > 0.25) {
        $nivsoc = "MEDIO";
        $colsoc = "#FFC300";
    }
    else {
        if($totsoc > 0) {
            $nivsoc = "BAJO";
            $colsoc = "#e8222e";
        }
        else {
            $nivsoc = "NO APLICA";
            $colsoc = "#000";
        }
    }
    
    if($obj_json_decode['num']['ctok'] / $totnum > 0.75) {
        $nivnum = "SUPER ALTO";
        $colnum = "#138726";
    }
    else if($obj_json_decode['num']['ctok'] / $totnum > 0.5) {
        $nivnum = "ALTO";
        $colnum = "#4b9db9";
    }
    else if($obj_json_decode['num']['ctok'] / $totnum > 0.25) {
        $nivnum = "MEDIO";
        $colnum = "#FFC300";
    }
    else {
        if($totnum > 0) {
            $nivnum = "BAJO";
            $colnum = "#e8222e";
        }
        else {
            $nivnum = "NO APLICA";
            $colnum = "#000";
        }
    }
    
    if($obj_json_decode['esp']['ctok'] / $totesp > 0.75) {
        $nivesp = "SUPER ALTO";
        $colesp = "#138726";
    }
    else if($obj_json_decode['esp']['ctok'] / $totesp > 0.5) {
        $nivesp = "ALTO";
        $colesp = "#4b9db9";
    }
    else if($obj_json_decode['esp']['ctok'] / $totesp > 0.25) {
        $nivesp = "MEDIO";
        $colesp = "#FFC300";
    }
    else {
        if($totesp > 0) {
            $nivesp = "BAJO";
            $colesp = "#e8222e";
        }
        else {
            $nivesp = "NO APLICA";
            $colesp = "#000";
        }
    }
    
    if($obj_json_decode['ing']['ctok'] / $toting > 0.75) {
        $niving = "SUPER ALTO";
        $coling = "#138726";
    }
    else if($obj_json_decode['ing']['ctok'] / $toting > 0.5) {
        $niving = "ALTO";
        $coling = "#4b9db9";
    }
    else if($obj_json_decode['ing']['ctok'] / $toting > 0.25) {
        $niving = "MEDIO";
        $coling = "#FFC300";
    }
    else {
        if($toting > 0) {
            $niving = "BAJO";
            $coling = "#e8222e";
        }
        else {
            $niving = "NO APLICA";
            $coling = "#000";
        }
    }
    
    if($obj_json_decode['tec']['ctok'] / $tottec > 0.75) {
        $nivtec = "SUPER ALTO";
        $coltec = "#138726";
    }
    else if($obj_json_decode['tec']['ctok'] / $tottec > 0.5) {
        $nivtec = "ALTO";
        $coltec = "#4b9db9";
    }
    else if($obj_json_decode['tec']['ctok'] / $tottec > 0.25) {
        $nivtec = "MEDIO";
        $coltec = "#FFC300";
    }
    else {
        if($tottec > 0) {
            $nivtec = "BAJO";
            $coltec = "#e8222e";
        }
        else {
            $nivtec = "NO APLICA";
            $coltec = "#000";
        }
    }
    
    if($obj_json_decode['fis']['ctok'] / $totfis > 0.75) {
        $nivfis = "SUPER ALTO";
        $colfis = "#138726";
    }
    else if($obj_json_decode['fis']['ctok'] / $totfis > 0.5) {
        $nivfis = "ALTO";
        $colfis = "#4b9db9";
    }
    else if($obj_json_decode['fis']['ctok'] / $totfis > 0.25) {
        $nivfis = "MEDIO";
        $colfis = "#FFC300";
    }
    else {
        if($totfis > 0) {
            $nivfis = "BAJO";
            $colfis = "#e8222e";
        }
        else {
            $nivfis = "NO APLICA";
            $colfis = "#000";
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
    //echo $porc;
    
    //Se actualiza el resultado en la tabla tbl_validaciones
    if($porc >= 70) {
        $sql_updval = "UPDATE tbl_validaciones SET resultado = 'APROBADO' WHERE documento_est = '$documento' AND id_grado = $idgra";
    }
    else {
        $sql_updval = "UPDATE tbl_validaciones SET resultado = 'NO APROBADO' WHERE documento_est = '$documento' AND id_grado = $idgra";
    }
    $exe_updval = $mysqli1->query($sql_updval);
    
    
    //***************************************************************************************************************************
    
    $content = '<html>';
    $content .= '<head>';
    $content .= '<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
                 <link rel="stylesheet" href="assets/vendor/fontawesome/css/font-awesome.min.css">';
    $content .= '<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
                 <script type="text/javascript" src="registro/docenteunicab/updreg/js/Chart.bundle.min.js"></script>';
    $content .= '<style>';
    $content .= '.fa-chevron-right {color: blue;}';
    $content .= '#divnum {background: #CEF6F5;}
                 #divtec {background: #F5A9A9;}
                 #diving {background: #F3F781;}
                 #divesp {background: #F7BE81;}
                 #divbio {background: #F6CECE;}
                 #divfis {background: #A9F5A9;}
                 #divsoc {background: #D8D8D8;}';
    $content .= '#tblres .tdcorto {width: 80px; text-align: center;}
                 #tblres .tdmedio {width: 150px;}';
    //$content .= 'thead {padding: 5px; font-weight: bold; background-color: #CCCCCC; color: #000000;}';
    //$content .= 'td {font-size: 10px;}';
    $content .= 'ul {margin: 0; padding: 0; list-style: none; text-indent: -1;}';
    $content .= 'li {background: white; border-bottom: 1px solid black; font-size: 12px; list-style: none;}';
    $content .= '.txtct {width: 20px; border: 0; color: black; font-weight: bold; font-size: 14px;}';
    $content .= '.txtct1 {width: 100px; border: 0; color: black; font-weight: bold; font-size: 14px;}';
    $content .= '#al {color: white;}';
    $content .= '#divenc2_1 {border: 3px solid #093A5F; width: 60%; padding-left: 10px; font-size: 14px;}';
    $content .= '#divenc2_2 {background: #54CF8C; width: 30%; text-align: center;}';
    $content .= ' @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap");';
    $content .= ' @import url("https://fonts.googleapis.com/css2?family=Poppins-medium:wght@500&display=swap");';
    $content .= ' @import url("https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap");';
    $content .= '#divglobal {display: flex; justify-content: center; text-align: center; background: #F1F1F2;}';
    $content .= '#tblglobal, thead {border: 2px solid black;}';
    
    $content .= '</style>';
    $content .= '</head><body>';
    
    $content1 = '';
    $content1 .= '<div">';
        $content1 .= '<div">';
            $content1 .= '<div id="divenc1">
					        <div>
					            <img src="registro/images/encabezado_informes1.jpg" width="100%"/>
					        </div>
					    </div><br>';
					    
			$content1 .= '<div id="divenc2">
			                <table>
			                    <tbody>
			                        <tr>
			                            <td id="divenc2_1">
			                                <p>Evaluación de Validación</p>
            						        <p>Nombres y Apellidos: <strong>'.$nombre_completo.'</strong></p>
            						        <p>Documento: <strong>'.$documento.'</strong></p>
            						        <p>Grado: <strong>'.$grado_ra.'</strong></p>
			                            </td>
			                            <td width="10px"></td>
			                            <td id="divenc2_2">
			                                <p style="font-size: 24px; font-style: italic; color: #093A5F; font-weight: bold;">GLOBAL</p>
						                    <p style="font-size: 18px; color: #093A5F; padding: 0 5px;">De '.$tot_gen.' puntos posibles, su puntaje global es de '.$tot_ok.'.</p>
			                            </td>
			                        </tr>
			                    </tbody>
			                </table>
						</div><br></br>';
						
            //$content1 .= '<h5><span class="badge badge-success">Hola </span> '.$nombre_completo.'</h5>';
            $content1 .= '<div>';
                /*$content1 .= '<div>';
                    $content1 .= '<p><i class="fa fa-chevron-right"></i> <strong>Este es el resultado de tu evaluación de validación para grado '.$grado_ra.'.</strong></p>';
                    $content1 .= '<p><i class="fa fa-chevron-right"></i> <strong>Resumen:</strong> (cantidad de preguntas bien contestadas, mal contestadas y no contestadas por pensamiento)</p>';
                $content1 .= '</div>';*/
                
                $content1 .= '<div style="width: 100%; background: #093A5F; color: #F1F1F2; text-align: center; font-size: 20px; font-weight: bold;">Informe Global</div>';
                $content1 .= '<div style="width: 100%; background: #F1F1F2; text-align: center; font-size: 20px;">
                                    <br><p>A continuación se relacionan los puntajes obtenidos en cada uno de los pensamientos evaluados en la evaluación de validación:</p><br>
                                </div>';
                
                $content1 .= '<div class="row" id="divglobal">';
                    $content1 .= '<table id="tblglobal" style="text-align: center; padding: 0 10px;">';
                        $content1 .= '<thead style="font-size: 16px; font-weight: bold; color: #064C86;">';
                            $content1 .= '<tr style="background: #45A872; color: #F1F1F2; font-size: 20px; font-weight: bold; border: 2px;"><td colspan="5">Pensamientos</td></tr>';
                            $content1 .= '<tr>';
                                //$content1 .= '<td width="150px"></td>';
                                $content1 .= '<td colspan="2" width="280px" style="background: #FA4D59; color: #F1F1F2; font-size: 20px; font-weight: bold; border: 2px solid black;">Global</td>';
                                $content1 .= '<td width="140px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">Bio</td>';
                                $content1 .= '<td width="140px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">Esp</td>';
                                $content1 .= '<td width="140px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">Ing</td>';
                            $content1 .= '</tr>';
                        $content1 .= '</thead>';
                        $content1 .= '<tbody>';
                            
                        
                            $content1 .= '<tr>';
                            $content1 .= '<td style="color: #064C86; border: 2px solid black;">Puntaje</td>';
                            $content1 .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$tot_ok.' / '.$tot_gen.'</td>';
                            $content1 .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['bio']['ctok'].' / '.$obj_json_decode['bio']['ctpen'].'</td>';
                            $content1 .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['esp']['ctok'].' / '.$obj_json_decode['esp']['ctpen'].'</td>';
                            $content1 .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['ing']['ctok'].' / '.$obj_json_decode['ing']['ctpen'].'</td>';
                            $content1 .= '</tr>';
                            //echo $linea;
                            
                            $content1 .= '<tr>';
                            $content1 .= '<td style="color: #064C86; border: 2px solid black;">Desempeño</td>';
                            $content1 .= '<td style="color: '.$colglo.'; border: 2px solid black; font-weight: bold;">'.$nivglo.'</td>';
                            $content1 .= '<td style="color: '.$colbio.'; border: 2px solid black; font-weight: bold;">'.$nivbio.'</td>';
                            $content1 .= '<td style="color: '.$colesp.'; border: 2px solid black; font-weight: bold;">'.$nivesp.'</td>';
                            $content1 .= '<td style="color: '.$coling.'; border: 2px solid black; font-weight: bold;">'.$niving.'</td>';
                            $content1 .= '</tr><tr><td colspan="5"></td></tr>';
                            //echo $linea;
                            
                            $content1 .= '<tr style="font-size: 16px; font-weight: bold; color: #064C86;">';
                                $content1 .= '<td width="140px"></td>';
                                $content1 .= '<td width="140px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">Num</td>';
                                $content1 .= '<td width="140px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">Soc</td>';
                                $content1 .= '<td width="140px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">Tec</td>';
                                $content1 .= '<td width="140px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">Fis</td>';
                            $content1 .= '</tr>';
                            
                            $content1 .= '<tr>';
                            $content1 .= '<td style="color: #064C86; border: 2px solid black;">Puntaje</td>';
                            $content1 .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['num']['ctok'].' / '.$obj_json_decode['num']['ctpen'].'</td>';
                            $content1 .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['soc']['ctok'].' / '.$obj_json_decode['soc']['ctpen'].'</td>';
                            $content1 .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['tec']['ctok'].' / '.$obj_json_decode['tec']['ctpen'].'</td>';
                            $content1 .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['fis']['ctok'].' / '.$obj_json_decode['fis']['ctpen'].'</td>';
                            $content1 .= '</tr>';
                            //echo $linea;
                            
                            $content1 .= '<tr>';
                            $content1 .= '<td style="color: #064C86; border: 2px solid black;">Desempeño</td>';
                            $content1 .= '<td style="color: '.$colnum.'; border: 2px solid black; font-weight: bold;">'.$nivnum.'</td>';
                            $content1 .= '<td style="color: '.$colsoc.'; border: 2px solid black; font-weight: bold;">'.$nivsoc.'</td>';
                            $content1 .= '<td style="color: '.$coltec.'; border: 2px solid black; font-weight: bold;">'.$nivtec.'</td>';
                            $content1 .= '<td style="color: '.$colfis.'; border: 2px solid black; font-weight: bold;">'.$nivfis.'</td>';
                            $content1 .= '</tr>';
                            //$content1 .= '</tr><tr><td colspan="5" style="border: 2px solid #F1F1F2; color: #F1F1F2">Fila vacía</td></tr>';
                            //echo $linea;
                        
                        
                        $content1 .= '</tbody>';
                    $content1 .= '</table>';
                $content1 .= '</div><br><br>';
                
                //$content1 .= '<div><br><p><i class="fa fa-hand-o-right "></i> <strong>Detalle:</strong></p>';
                $content1 .= '<div class="row">';
                    $content1 .= '<p><strong style="color: #064C86; padding-left: 20px;">Convenciones:</strong> Contestadas bien <img src="registro/images/checked_1.jpg" height="25px"/>,'; 
                    $content1 .= ' Contestadas incorrectas <img src="registro/images/unchecked_1.jpg" width="25px"/>, No contestadas <img src="registro/images/na_1.jpg" width="25px"/></p>';
                $content1 .= '</div>';
                
                $content1 .= '<div style="width: 100%; background: #093A5F; color: #F1F1F2; text-align: center; font-size: 20px; font-weight: bold;">Informe por Materias</div>';
                    $content1 .= '<table id="tblres" border="1px" class="table" style="width:100%">';
                        $content1 .= '<thead>';
                            $content1 .= '<tr>';
                                $content1 .= '<th class="tdmedio">Materia</th>
    						                  <th>Pregunta</th>
    						                  <th class="tdcorto">Resultado</th>';
                            $content1 .= '</tr>';
                        $content1 .= '</thead>';
                        $content1 .= '<tbody>';
                        $peticion = mysqli_query($conexion,$sql);
                        while ($fila = mysqli_fetch_array($peticion)){
                            if($fila['resultado'] == "NO") {
                                $content1 .= '<tr class="GridviewScrollItem">';
                                $content1 .= '<td>'.$fila['materia'].'</td>';
                                $content1 .= '<td>'.$fila['pregunta'].'</td>';
                                $content1 .= '<td class="tdcorto"><img src="registro/images/unchecked_1.jpg" width="25px"/></td></tr>';
			        		}
			        		else if($fila['resultado'] == "OK") {
			        		    $content1 .= '<tr class="GridviewScrollItem">';
                                $content1 .= '<td>'.$fila['materia'].'</td>';
                                $content1 .= '<td>'.$fila['pregunta'].'</td>';
                                $content1 .= '<td class="tdcorto"><img src="registro/images/checked_1.jpg" height="25px"/></td></tr>';
			        		}
			        		else if($fila['resultado'] == "NA") {
			        		    $content1 .= '<tr class="GridviewScrollItem">';
                                $content1 .= '<td>'.$fila['materia'].'</td>';
                                $content1 .= '<td>'.$fila['pregunta'].'</td>';
                                $content1 .= '<td class="tdcorto"><img src="registro/images/na_1.jpg" width="25px"/></td></tr>';
			        		}
                        }
                        $content1 .= '</tbody>';
                    $content1 .= '</table>';
                $content1 .= '</div>';
            $content1 .= '</div><br>';
            
            if($porc >= 70) {
                $content1 .= '<h5><span class="badge badge-success">El resultado de la evaluación de validación es: '.$porc.'%. Validación aprobada.</span></h5>';
                $content1 .= '<h5><span class="badge badge-secondary">Puedes empezar proceso de matrícula <a href="https://unicab.org/pre_admisiones.php" id="al">AQUI</a></span></h5>';
            }
            else {
                $content1 .= '<h5><span class="badge badge-danger">El resultado de la evaluación de validación es: '.$porc.'%. Validación no aprobada.</span></h5>';
                $content1 .= '<h5><span class="badge badge-warning">Por favor ponte en contacto con el Coordinador Académico al número 318 400 4412</span></h5>';
            }
            
            
        $content1 .= '</div>';
    $content1 .= '</div>';
    
    $content1 .= '</body></html>';
    
    $nom_pdf = "ep_".$grado_ra."_".str_replace(" ","_",$nombre_completo)."_".$fanio.".pdf";
    
    //$mpdf->WriteHTML($content.$content1);
    echo $content;
    echo $content1;
    
    //Se crea la carpeta
    $path = 'eval_val/'.$fanio.'/'.str_replace(" ","_",$grado_ra).'/';
    //echo $path;
    if (!file_exists($path)) {
        mkdir($path, 0755, true);
    }
    
    $folder0 = '/eval_val/'.$fanio.'/'.str_replace(" ","_",$grado_ra).'/';
    $folder = __DIR__.$folder0;
    PDF::saveDisk($nom_pdf,$content.$content1,$folder);
    
    $folder_correo = 'eval_val/'.$fanio.'/'.str_replace(" ","_",$grado_ra).'/';
    //echo $nom_pdf;
    //echo "<br>".$folder;
    $ruta = "https://unicab.org".$folder0.$nom_pdf;
    //echo "<br>".$ruta;
    //echo "hasta aquí OK";
    
    // ###################### INICIO ENVIO DE CORREO ###################
    $mail = new PHPMailer(true);
    
    try {
        //echo $email;
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        //$mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = false;
        //$mail->Username   = 'numericopensamientoclei2@gmail.com';                     // SMTP username
        //$mail->Username   = 'unicabfinanciera@gmail.com';
        //$mail->Password   = 'Financiera2020#';
        $mail->Username   = 'sistemasunicab@gmail.com';
        $mail->Password   = 'psfa0301';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 25;
    
        //Recipients
        $mail->setFrom('sistemasunicab@gmail.com');     //Debe ser igual al Username
        //$mail->addAddress('liliasda19@gmail.com');     // Add a recipient
        //$mail->addAddress('unicabfinanciera@gmail.com');     // Add a recipient
        $mail->addAddress($email_a);     // Add a recipient
        //$mail->addReplyTo('numericopensamientoclei2@gmail.com', 'FYI');
        //$mail->addCC('cc@example.com');
        $mail->addBCC('numericopensamientoclei2@gmail.com');
        $mail->addBCC('matriculas.unicab@gmail.com');
    
        // Attachments
        //$mail->addAttachment('../docenteunicab/dhonor/2020/prueba.pdf', 'prueba.pdf');
        $mail->addAttachment($folder_correo.$nom_pdf, $nom_pdf);         // Add attachments
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'RESULTADOS EVALUACION DE VALIDACION '.$fanio;
        $mail->Body    = '<p>Señor(a): '.strtoupper($acudiente).'</p>
            <p>Este es un envío de correo automático de UNICAB COLEGIO VIRTUAL.</p>
            <p>A continuación encontrará un documento pdf con el resultado de la evaluación de validación de '.$nombre_completo.'.</p>
            <p>Al final encontrará el valor porcentual para el grado '.$grado_ra.'.</p>
            <p>--</p>
            <p>Áreas de Admisiones y Sistemas</p>
            <p>UNICAB COLEGIO VIRTUAL</p>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        //echo 'Message has been sent';
        $msg_correo = "CorreoOK";
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        $msg_correo = "CorreoError";
    }
    
    // ###################### FIN ENVIO DE CORREO ###################
    
    //***************************************************************************************************************************
    
    //redireccionamos a url del resultado
    //echo $msg_correo;
    header('location: resultado_eval_val.php?n_documento='.$documento.'&idgra='.$idgra.'&msg='.$msg_correo);
    echo "<script>location.href='resultado_eval_val.php?n_documento=".$documento."&idgra=".$idgra."&msg=".$msg_correo."';</script>";
    	
?>

