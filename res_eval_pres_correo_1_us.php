<?php
    include "admin-unicab/php/conexion.php";
    require "registro/docenteunicab/updreg/1cc3s4db.php";
    header("Cache-Control: no-store");
    //https://unicab.org/res_eval_pres_correo_1.php?n_documento=999999&idgra=10
    
    require_once 'registro/docenteunicab/updreg/dompdf/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    
    class PDF {
        public static function stream($nom_pdf, $html) {
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('letter', 'portrait'); // (Opcional) Configurar papel y orientación landscape | portrait
            $dompdf->render(); // Generar el PDF desde contenido HTML
            $pdf = $dompdf->output(); // Obtener el PDF generado
            $dompdf->stream($nom_pdf); // Enviar el PDF generado al navegador
        }
        
        public static function saveDisk($nom_pdf, $html, $folder) {
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('letter', 'portrait'); // (Opcional) Configurar papel y orientación landscape | portrait
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
    
    /*require('registro/financieraunicab/PHPMailer_master/src/Exception.php');
    require('registro/financieraunicab/PHPMailer_master/src/PHPMailer.php');
    require('registro/financieraunicab/PHPMailer_master/src/SMTP.php');
    use  PHPMailer\PHPMailer\PHPMailer ;
    use  PHPMailer\PHPMailer\SMTP ;
    use  PHPMailer\PHPMailer\Exception ;*/
    
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
    $sql_n = "SELECT e.id, e.nombres, e.apellidos, e.email_acudiente_1, e.acudiente_1 
    FROM estudiantes e 
    WHERE e.n_documento = '$documento'";
	//echo $sql_n;
	$exe_n = mysqli_query($conexion,$sql_n);
	while ($row_n = mysqli_fetch_array($exe_n)) {
	    $nombre_completo = $row_n['nombres']." ".$row_n['apellidos'];
	    $email_a = $row_n['email_acudiente_1'];
	    $acudiente = $row_n['acudiente_1'];
	}
	//echo $nombre_completo;
	
	//********************* SE FINAIZAN LAS RESPUESTAS ***************************
	$sql_updfin = "UPDATE tbl_respuestas SET estado = 'FINALIZADA' WHERE identificacion = '$documento' AND a = $fanio AND resultado != 'NA'";
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
    $sql = "SELECT m.materia, m.pensamiento, p.pregunta, r.respuesta, r.resultado, 
    case r.resultado when 'OK' then 'MUY BIEN' else p.retroalimentacion end comentarios, 
    substring(p.imagen, 7) ruta 
    FROM tbl_respuestas r, tbl_preguntas p, materias m 
    WHERE r.id_pregunta = p.id AND r.id_materia = m.id 
    AND r.a = $fanio AND r.identificacion = '$documento'";
	//echo $sql;
	
	//Se hace la consulta de las recomendaciones para numérico
	$sql_retro_num = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 5";
	
	//Se hace la consulta de las recomendaciones para bioético
	if($idgra == 11 || $idgra == 12) {
	    $sql_retro_bio = "SELECT DISTINCT p.retroalimentacion 
        FROM tbl_respuestas r, tbl_preguntas p 
        WHERE r.id_pregunta = p.id 
        AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 10";
	}
	else {
	    $sql_retro_bio = "SELECT DISTINCT p.retroalimentacion 
        FROM tbl_respuestas r, tbl_preguntas p 
        WHERE r.id_pregunta = p.id 
        AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 1";
	}
    
    
    //Se hace la consulta de las recomendaciones para social
    if($idgra == 11 || $idgra == 12) {
        $sql_retro_soc = "SELECT DISTINCT p.retroalimentacion 
        FROM tbl_respuestas r, tbl_preguntas p 
        WHERE r.id_pregunta = p.id 
        AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 12";
    }
    else {
        $sql_retro_soc = "SELECT DISTINCT p.retroalimentacion 
        FROM tbl_respuestas r, tbl_preguntas p 
        WHERE r.id_pregunta = p.id 
        AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 4";
    }
    
    //Se hace la consulta de las recomendaciones para español
    if($idgra == 11 || $idgra == 12) {
        $sql_retro_esp = "SELECT DISTINCT p.retroalimentacion 
        FROM tbl_respuestas r, tbl_preguntas p 
        WHERE r.id_pregunta = p.id 
        AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 15";
    }
    else {
        $sql_retro_esp = "SELECT DISTINCT p.retroalimentacion 
        FROM tbl_respuestas r, tbl_preguntas p 
        WHERE r.id_pregunta = p.id 
        AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 6";
    }
    
    //Se hace la consulta de las recomendaciones para inglés
    $sql_retro_ing = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 7";
    
    //Se hace la consulta de las recomendaciones para tecnológico
    $sql_retro_tec = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 9";
    
    //Se hace la consulta de las recomendaciones para física
    $sql_retro_fis = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 11";
    
    //Se hacen los conteos generales
    $conteos = array(ctok=>0, ctno=>0, ctna=>0, ctpen=>0);
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
    
    $sql_ctok = "SELECT COUNT(1) ct_ok, identificacion, id_materia FROM tbl_respuestas WHERE resultado = 'OK' AND identificacion = '$documento' 
    AND a = $fanio GROUP BY identificacion, id_materia";
    //echo $sql_ctok;
    $exe_ctok = $mysqli1->query($sql_ctok);
    while($row_ctok = $exe_ctok->fetch_assoc()) {
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
    }
    //echo $ct_ok;
    
    $sql_ctno = "SELECT COUNT(1) ct_no, identificacion, id_materia FROM tbl_respuestas WHERE resultado = 'NO' AND identificacion = '$documento' 
    AND a = $fanio GROUP BY identificacion, id_materia";
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
            $toting += $row_ctno['ct_no'];
        }
        else if($row_ctno['id_materia'] == 9) {
            $obj_json_decode['tec']['ctno'] = $row_ctno['ct_no'];
            $tottec += $row_ctno['ct_no'];
        }
        else if($row_ctno['id_materia'] == 11) {
            $obj_json_decode['fis']['ctno'] = $row_ctno['ct_no'];
            $totfis += $row_ctno['ct_no'];
        }
    }
    //echo $ct_no;
    
    $sql_ctna = "SELECT COUNT(1) ct_na, identificacion, id_materia FROM tbl_respuestas WHERE resultado = 'NA' AND identificacion = '$documento' 
    AND a = $fanio GROUP BY identificacion, id_materia";
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
    }
    //echo $ct_na;
    
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
    
    //***************************************************************************************************************************
    
    $content = '<html>';
    $content .= '<head>';
    $content .= '<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
                 <link rel="stylesheet" href="assets/vendor/fontawesome/css/font-awesome.min.css">';
    $content .= '<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
                 <script type="text/javascript" src="registro/docenteunicab/updreg/js/Chart.bundle.min.js"></script>';
    $content .= '<style>';
    $content .= '.fa-hand-o-right {color: red;}';
    $content .= '#tblres .tdcorto {width: 80px; text-align: center;}
                 #tblres .tdmedio {width: 150px;}';
    //$content .= 'thead {padding: 5px; font-weight: bold; background-color: #CCCCCC; color: #000000;}';
    //$content .= 'td {font-size: 12px;}';
    $content .= 'ul {margin: 0; padding: 0; list-style: none; text-indent: -1;}';
    //$content .= 'li {background: white; font-size: 12px; list-style: none;}';
    $content .= '.txtct {width: 20px; border: 0; color: black; font-weight: bold; font-size: 14px;}';
    $content .= '.txtct1 {width: 100px; border: 0; color: black; font-weight: bold; font-size: 14px;}';
    //$content .= '#divenc1 {display: flex; justify-content: center;}';
    //$content .= '#divenc2 {display: flex; justify-content: space-around;}';
    $content .= '#divenc2_1 {border: 3px solid #093A5F; width: 60%; padding-left: 10px;}';
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
            //$content1 .= '<h5><span class="badge badge-success">Hola </span> '.$nombre_completo.'</h5>';
            //$content1 .= '<p><span style="color: #064C86; font-size: 16px; font-weight: bold;">Evaluación de Admisión de: </span> '.$nombre_completo.'.</p>';
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
			                                <p>Evaluación de Admisión</p>
            						        <p>Nombres y Apellidos: <strong>'.$nombre_completo.'</strong></p>
            						        <p>Documento: <strong>'.$documento.'</strong></p>
            						        <p>Grado: <strong>'.$grado_ra.'</strong></p>
			                            </td>
			                            <td width="10px"></td>
			                            <td id="divenc2_2">
			                                <p style="font-size: 24px; font-style: italic; color: #093A5F; font-weight: bold;">GLOBAL</p>
						                    <p style="font-size: 18px; color: #093A5F; padding: 0 5px;">De '.$total_todos.' puntos posibles, su puntaje global es de '.$total_todos_ok.'.</p>
			                            </td>
			                        </tr>
			                    </tbody>
			                </table>
						</div><br></br>';
            
            $content1 .= '<div>';
                $content1 .= '<div style="width: 100%; background: #093A5F; color: #F1F1F2; text-align: center; font-size: 20px; font-weight: bold;">Informe Global</div>';
                $content1 .= '<div style="width: 100%; background: #F1F1F2; text-align: center; font-size: 20px;">
                                    <br><p>A continuación se relacionan los puntajes obtenidos en cada uno de los pensamientos evaluados en la evaluación de admisión:</p><br>
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
                            $content1 .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$total_todos_ok.' / '.$total_todos.'</td>';
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
                    $content1 .= '</table><br><br>';
                    
                $content1 .= '</div><br><br>';
                
                $content1 .= '<div style="width: 100%; background: #093A5F; color: #F1F1F2; text-align: center; font-size: 20px; font-weight: bold;">Informe por Pensamientos</div>';
                
                /*$content1 .= '<div class="row">';
                    $content1 .= '<p><strong style="color: #064C86;">Convenciones:</strong> Contestadas bien <img src="registro/images/checked_1.jpg" height="25px"/>,'; 
                    $content1 .= 'Contestadas incorrectas <img src="registro/images/unchecked_1.jpg" width="25px"/>, No contestadas <img src="registro/images/na_1.jpg" width="25px"/></p>';
                $content1 .= '</div>';*/
                
                $content1 .= '<div class="form-group" style="background: #F1F1F2;">';
                 
                $pensamiento = "";
        	    $peticion = mysqli_query($conexion,$sql);
	        	while ($fila = mysqli_fetch_array($peticion)){
	        	    if($pensamiento != $fila['pensamiento']) {
	        	        $pensamiento = $fila['pensamiento'];
	        	        //$content1 .= '<p><strong style="color: #064C86;">Pensamiento: '.$pensamiento.'</strong></p><br>';
	        	        $content1 .= '<div style="height: 65px; color: #093A5F; background: #45A872; display: inline-block;"><label style="padding: 15px 10px; font-size: 30px;">'.$pensamiento.'</label></div><br><br>';
	        	    }
	        	    if($fila['resultado'] == "NO") {
	        	        $img_resul = "registro/images/respuesta_no2.jpg";
	        		}
	        		else if($fila['resultado'] == "OK") {
	        		    $img_resul = "registro/images/respuesta_ok2.jpg";
	        		}
	        		else if($fila['resultado'] == "NA") {
	        		    $img_resul = "registro/images/respuesta_no2.jpg";
	        		}
	        	    $img_pregunta = "registro/".$fila['ruta'];
	        	    if($fila['ruta'] != "") {
	        	        $tbl_pregunta = '<table id="tblres" class="table" style="width:100%;"><tbody><tr><td style="color: #F1F1F2; width: 100px;">Pregunta</td><td style="width: 400px;">'.$fila['pregunta'].'</td><td style="text-align: center;"><img src="'.$img_pregunta.'" width="150px" alt="Sin Imagen"/></td></tr>';
	        	    }
	        	    else {
	        	        $tbl_pregunta = '<table id="tblres" class="table" style="width:100%;"><tbody><tr><td style="color: #F1F1F2; width: 100px;">Pregunta</td><td style="width: 400px;">'.$fila['pregunta'].'</td><td style="text-align: center;"></td></tr>';
	        	    }
	        	    $tbl_pregunta .= '<tr style="background: #1d2b2e; color: #F1F1F2;"><td style="color: #1d2b2e; width: 100px;">Respuesta</td><td>Tu respuesta: '.$fila['respuesta'].'</td><td  style="text-align: center;"><img src="'.$img_resul.'" width="100px"/></td></tr>';
	        	    $tbl_pregunta .= '</tbody></table><br>';
	        	    $content1 .= $tbl_pregunta;
	        	}
	        	
            $content1 .= '</div>';
            
            $content1 .= '<div class="row">';
                //$content1 .= '<h5><span class="badge badge-success">Hoja de ruta sugerida para reforzar conceptos </span></h5>';
                //$content1 .= '<p><span style="color: #064C86; font-size: 16px; font-weight: bold;">Ruta sugerida para reforzar conceptos: </span></p>';
                $content1 .= '<div style="width: 100%; background: #093A5F; color: #F1F1F2; text-align: center; font-size: 20px; font-weight: bold;">Ruta sugerida para reforzar conceptos:
                        </div>';
                $content1 .= '<br>';
            $content1 .= '</div>';
            
            $content1 .= '<div class="form-group" style="background: #F1F1F2;">';
                
                    $exe_retro_bio = mysqli_query($conexion,$sql_retro_bio);
                    $filas = mysqli_num_rows($exe_retro_bio);
                    //echo "filas ".$filas;
                    if($filas > 0) {
                        //$content1 .= '<h4 style="color: #5ac48c;">Pensamiento: BIOÉTICO</h4>';
                        $content1 .= '<ul style="padding-left: 20px;">';
                        $content1 .= '<li style="color: #5ac48c; font-size: 16px;">Pensamiento: BIOÉTICO</li>';
                        while($row_retro_bio = mysqli_fetch_array($exe_retro_bio)) {
                            $content1 .= '<li style="font-size: 14px;">'.$row_retro_bio['retroalimentacion'].'</li>';
                        }
                        $content1 .= '</ul><br>';
                    }
                    
                    $exe_retro_esp = mysqli_query($conexion,$sql_retro_esp);
                    $filas = mysqli_num_rows($exe_retro_esp);
                    //echo "filas ".$filas;
                    if($filas > 0) {
                        //$content1 .= '<h4 style="color: #5ac48c;">Pensamiento: HUMANÍSTICO ESPAÑOL</h4>';
                        $content1 .= '<ul style="padding-left: 20px;">';
                        $content1 .= '<li style="color: #5ac48c; font-size: 16px;">Pensamiento: HUMANÍSTICO ESPAÑOL</li>';
                        while($row_retro_esp = mysqli_fetch_array($exe_retro_esp)) {
                            $content1 .= '<li style="font-size: 14px;">'.$row_retro_esp['retroalimentacion'].'</li>';
                        }
                        $content1 .= '</ul><br>';
                    }
                    
                    $exe_retro_ing = mysqli_query($conexion,$sql_retro_ing);
                    $filas = mysqli_num_rows($exe_retro_ing);
                    if($filas > 0) {
                        //$content1 .= '<h4 style="color: #5ac48c;">Pensamiento: HUMANÍSTICO INGLÉS</h4>';
                        $content1 .= '<ul style="padding-left: 20px;">';
                        $content1 .= '<li style="color: #5ac48c; font-size: 16px;">Pensamiento: HUMANÍSTICO INGLÉS</li>';
                        while($row_retro_ing = mysqli_fetch_array($exe_retro_ing)) {
                            $content1 .= '<li style="font-size: 14px;">'.$row_retro_ing['retroalimentacion'].'</li>';
                        }
                        $content1 .= '</ul><br>';
                    }
                     
                    $exe_retro_num = mysqli_query($conexion,$sql_retro_num);
                    $filas = mysqli_num_rows($exe_retro_num);
                    if($filas > 0) {
                        //$content1 .= '<h4 style="color: #5ac48c;">Pensamiento: NUMÉRICO</h4>';
                        $content1 .= '<ul style="padding-left: 20px;">';
                        $content1 .= '<li style="color: #5ac48c; font-size: 16px;">Pensamiento: NUMÉRICO</li>';
                        while($row_retro_num = mysqli_fetch_array($exe_retro_num)) {
                            $content1 .= '<li style="font-size: 14px;">'.$row_retro_num['retroalimentacion'].'</li>';
                        }
                        $content1 .= '</ul><br>';
                    }
                    
                    $exe_retro_soc = mysqli_query($conexion,$sql_retro_soc);
                    $filas = mysqli_num_rows($exe_retro_soc);
                    if($filas > 0) {
                        //$content1 .= '<h4 style="color: #5ac48c;">Pensamiento: SOCIAL</h4>';
                        $content1 .= '<ul style="padding-left: 20px;">';
                        $content1 .= '<li style="color: #5ac48c; font-size: 16px;">Pensamiento: SOCIAL</li>';
                        while($row_retro_soc = mysqli_fetch_array($exe_retro_soc)) {
                            $content1 .= '<li style="font-size: 14px;">'.$row_retro_soc['retroalimentacion'].'</li>';
                        }
                        $content1 .= '</ul><br>';
                    }
                            
                    $exe_retro_tec = mysqli_query($conexion,$sql_retro_tec);
                    $filas = mysqli_num_rows($exe_retro_tec);
                    if($filas > 0) {
                        //$content1 .= '<h4 style="color: #5ac48c;">Pensamiento: TECNOLÓGICO</h4>';
                        $content1 .= '<ul style="padding-left: 20px;">';
                        $content1 .= '<li style="color: #5ac48c; font-size: 16px;">Pensamiento: TECNOLÓGICO</li>';
                        while($row_retro_tec = mysqli_fetch_array($exe_retro_tec)) {
                            $content1 .= '<li style="font-size: 14px;">'.$row_retro_tec['retroalimentacion'].'</li>';
                        }
                        $content1 .= '</ul><br>';
                    }
                                           
                    $exe_retro_fis = mysqli_query($conexion,$sql_retro_fis);
                    $filas = mysqli_num_rows($exe_retro_fis);
                    if($filas > 0) {
                        //$content1 .= '<h4 style="color: #5ac48c;">Pensamiento: BIOÉTICO (FÍSICA)</h4>';
                        $content1 .= '<ul style="padding-left: 20px;">';
                        $content1 .= '<li style="color: #5ac48c; font-size: 16px;">Pensamiento: BIOÉTICO (FÍSICA)</li>';
                        while($row_retro_fis = mysqli_fetch_array($exe_retro_fis)) {
                            $content1 .= '<li style="font-size: 14px;">'.$row_retro_fis['retroalimentacion'].'</li>';
                        }
                        $content1 .= '</ul><br>';
                    }
                
            $content1 .= '</div>';
            
        $content1 .= '</div>';
    $content1 .= '</div>';
    
    $content1 .= '</body></html>';
    
    $nom_pdf = "ep_".$grado_ra."_".str_replace(" ","_",$nombre_completo)."_".$fanio.".pdf";
    
    //$mpdf->WriteHTML($content.$content1);
    echo $content;
    echo $content1;
    
    //Se crea la carpeta
    $path = 'eval_pres/'.$fanio.'/'.str_replace(" ","_",$grado_ra).'/';
    //echo $path;
    if (!file_exists($path)) {
        mkdir($path, 0755, true);
    }
    
    $folder0 = '/eval_pres/'.$fanio.'/'.str_replace(" ","_",$grado_ra).'/';
    $folder = __DIR__.$folder0;
    PDF::saveDisk($nom_pdf,$content.$content1,$folder);
    
    $folder_correo = 'eval_pres/'.$fanio.'/'.str_replace(" ","_",$grado_ra).'/';
    //echo $nom_pdf;
    //echo "<br>".$folder;
    $ruta = "https://unicab.org".$folder0.$nom_pdf;
    //echo "<br>".$ruta;
    //echo "hasta aquí OK";
    
    // ###################### INICIO ENVIO DE CORREO ###################
    //redireccionamos a url para enviar el correo desde unicab.solutions
    //echo $msg_correo;
    header('location: https://unicab.solutions/res_eval_pres_correo_1_us.php?n_documento='.$documento.'&idgra='.$idgra.'&msg='.$msg_correo.'&pdf='.$ruta);
    echo "<script>location.href='https://unicab.solutions/res_eval_pres_correo_1_us.php?n_documento=".$documento."&idgra=".$idgra."&msg=".$msg_correo."&pdf=".$ruta."';</script>";
    // ###################### FIN ENVIO DE CORREO ###################
    
    //***************************************************************************************************************************
    
    
    	
?>

