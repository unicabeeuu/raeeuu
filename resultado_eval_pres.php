<?php
    include "admin-unicab/php/conexion.php";
    require "registro/docenteunicab/updreg/1cc3s4db.php";
    //https://unicab.org/resultado_eval_pres.php?n_documento=999999&idgra=10
    
    if (!isset($_REQUEST['n_documento'])) {
        echo "<script>location.href='eval_pres.php'</script>";
    }
    
    $documento = $_REQUEST['n_documento'];
    $idgra = $_REQUEST['idgra'];
    
    date_default_timezone_set('America/Bogota');
    $dia=date("d");
    $mes=date("m");
    $mesLetra=date("M");
    $fanio=date("Y");
	if ($mes >= 10) {
		$fanio++;
	}
    
    $array_materiasf = array(1, 4, 5, 6, 7, 9, 11);
	$array_materias = array(1, 4, 5, 6, 7, 9);
	$array_materias_1011 = array(10, 12, 5, 15, 7, 9);
	$array_materias_1011f = array(10, 12, 5, 15, 7, 9, 11);
    
    //Se consulta nombres y apellidos del documento
    $sql_n = "SELECT e.id, e.nombres, e.apellidos 
    FROM estudiantes e 
    WHERE e.n_documento = '$documento'";
	//echo $sql_n;
	$exe_n = mysqli_query($conexion,$sql_n);
	while ($row_n = mysqli_fetch_array($exe_n)) {
	    $nombre_completo = $row_n['nombres']." ".$row_n['apellidos'];
	}
	//echo $nombre_completo;
	
	//Se consulta el nombre del grado
	$sql_grado = "SELECT * FROM equivalence_idgra WHERE id_grado_ra = $idgra";
	//echo $sql_grado;
	$exe_grado = mysqli_query($conexion,$sql_grado);
	while ($row_grado = mysqli_fetch_array($exe_grado)) {
	    $grado_ra = $row_grado['grado_ra'];
	}
	//echo "grado_ra=".$grado_ra;
	
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
	$sql_retro_num_ct = "SELECT COUNT(1) ct 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 5";
    $exe_retro_num_ct = mysqli_query($conexion,$sql_retro_num_ct);
    while($row_retro_num_ct = mysqli_fetch_array($exe_retro_num_ct)) {
        $ct_num = $row_retro_num_ct['ct'];
    }
    //echo $ct_num;
    $sql_retro_num = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = $array_materias_final[2]";
	
	//Se hace la consulta de las recomendaciones para bioético
    $sql_retro_bio_ct = "SELECT COUNT(1) ct 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 1";
    $exe_retro_bio_ct = mysqli_query($conexion,$sql_retro_bio_ct);
    while($row_retro_bio_ct = mysqli_fetch_array($exe_retro_bio_ct)) {
        $ct_bio = $row_retro_bio_ct['ct'];
    }
    
	$sql_retro_bio = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = $array_materias_final[0]";
    
    //Se hace la consulta de las recomendaciones para social
    $sql_retro_soc_ct = "SELECT COUNT(1) ct 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 4";
    $exe_retro_soc_ct = mysqli_query($conexion,$sql_retro_soc_ct);
    while($row_retro_soc_ct = mysqli_fetch_array($exe_retro_soc_ct)) {
        $ct_soc = $row_retro_soc_ct['ct'];
    }
    
	$sql_retro_soc = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = $array_materias_final[1]";
    
    //Se hace la consulta de las recomendaciones para español
    $sql_retro_esp_ct = "SELECT COUNT(1) ct 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 6";
    $exe_retro_esp_ct = mysqli_query($conexion,$sql_retro_esp_ct);
    while($row_retro_esp_ct = mysqli_fetch_array($exe_retro_esp_ct)) {
        $ct_esp = $row_retro_esp_ct['ct'];
    }
    
	$sql_retro_esp = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = $array_materias_final[3]";
    
    //Se hace la consulta de las recomendaciones para inglés
    $sql_retro_ing_ct = "SELECT COUNT(1) ct 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 7";
    $exe_retro_ing_ct = mysqli_query($conexion,$sql_retro_ing_ct);
    while($row_retro_ing_ct = mysqli_fetch_array($exe_retro_ing_ct)) {
        $ct_ing = $row_retro_ing_ct['ct'];
    }
    
	$sql_retro_ing = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = $array_materias_final[4]";
    
    //Se hace la consulta de las recomendaciones para tecnológico
    $sql_retro_tec_ct = "SELECT COUNT(1) ct 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 9";
    $exe_retro_tec_ct = mysqli_query($conexion,$sql_retro_tec_ct);
    while($row_retro_tec_ct = mysqli_fetch_array($exe_retro_tec_ct)) {
        $ct_tec = $row_retro_tec_ct['ct'];
    }
    
	$sql_retro_tec = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = $array_materias_final[5]";
    
    //Se hace la consulta de las recomendaciones para física
    $sql_retro_fis_ct = "SELECT COUNT(1) ct 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 11";
    $exe_retro_fis_ct = mysqli_query($conexion,$sql_retro_fis_ct);
    while($row_retro_fis_ct = mysqli_fetch_array($exe_retro_fis_ct)) {
        $ct_fis = $row_retro_fis_ct['ct'];
    }
    //echo $ct_fis;
	$sql_retro_fis = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = $array_materias_final[6]";
    
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
                                                        
                                                        <!--<div>
                                                            <p><strong>Este es el resultado de tu evaluación de admisión para grado <?php echo $grado_ra; ?>.</strong></p>
                                                            <p><strong>Se envío una copia de ésta evaluación al correo del acudiente.</strong></p>
                                                        </div>-->
                                                        <div id="divenc1">
                                					        <div>
                                					            <img src="registro/images/encabezado_informes1.jpg" width="100%"/>
                                					        </div>
                                					    </div><br>
                                					
                                						<div id="divenc2">
                                						    <div id="divenc2_1">
                                						        <p>Evaluación de Admisión</p>
                                						        <p>Nombres y Apellidos: <strong><?php echo $nombre_completo; ?></strong></p>
                                						        <p>Documento: <strong><?php echo $documento; ?></strong></p>
                                						        <p>Grado: <strong><?php echo $grado_ra; ?></strong></p>
                                						    </div>
                                						    <div id="divenc2_2">
                                						        <p style="font-family: 'Poppins'; font-size: 24px; font-style: italic; color: #093A5F">GLOBAL</p>
                                						        <p style="font-family: 'Poppins-medium'; font-size: 18px; color: #093A5F; padding: 0 5px;">De <?php echo $total_todos; ?> puntos posibles, su puntaje global es de <?php echo $total_todos_ok; ?>.</p>
                                						    </div>
                                						</div><br>
                                                        
                                                        <div class="row" style="display: none;">
                                                            <table>
                                                                <tbody>
                                                                    <?php
                                                                        //$conteo = $obj_json_decode['num']['ctok'] + $obj_json_decode['num']['ctno'] + $obj_json_decode['num']['ctna'];
                                                                        //echo "conteo numérico=".$conteo;
                                                                        if($obj_json_decode['bio']['ctok'] + $obj_json_decode['bio']['ctno'] + $obj_json_decode['bio']['ctna'] > 0) {
                                                                            $linea = '<tr>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td>BIOETICO</td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['bio']['ctok'].'"/> <img src="registro/images/checked_1.jpg" height="25px"/></td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['bio']['ctno'].'"/> <img src="registro/images/unchecked_1.jpg" width="25px"/></td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['bio']['ctna'].'"/> <img src="registro/images/na_1.jpg" width="25px"/></td>';
                                                                            $linea .= '</tr>';
                                                                            echo $linea;
                                                                        }
                                                                        if($obj_json_decode['soc']['ctok'] + $obj_json_decode['soc']['ctno'] + $obj_json_decode['soc']['ctna'] > 0) {
                                                                            $linea = '<tr>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td>SOCIAL</td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['soc']['ctok'].'"/> <img src="registro/images/checked_1.jpg" height="25px"/></td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['soc']['ctno'].'"/> <img src="registro/images/unchecked_1.jpg" width="25px"/></td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['soc']['ctna'].'"/> <img src="registro/images/na_1.jpg" width="25px"/></td>';
                                                                            $linea .= '</tr>';
                                                                            echo $linea;
                                                                        }
                                                                        if($obj_json_decode['num']['ctok'] + $obj_json_decode['num']['ctno'] + $obj_json_decode['num']['ctna'] > 0) {
                                                                            $linea = '<tr>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td>NUMERICO</td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['num']['ctok'].'"/> <img src="registro/images/checked_1.jpg" height="25px"/></td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['num']['ctno'].'"/> <img src="registro/images/unchecked_1.jpg" width="25px"/></td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['num']['ctna'].'"/> <img src="registro/images/na_1.jpg" width="25px"/></td>';
                                                                            $linea .= '</tr>';
                                                                            echo $linea;
                                                                        }
                                                                        if($obj_json_decode['esp']['ctok'] + $obj_json_decode['esp']['ctno'] + $obj_json_decode['esp']['ctna'] > 0) {
                                                                            $linea = '<tr>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td>ESPAÑOL</td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['esp']['ctok'].'"/> <img src="registro/images/checked_1.jpg" height="25px"/></td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['esp']['ctno'].'"/> <img src="registro/images/unchecked_1.jpg" width="25px"/></td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['esp']['ctna'].'"/> <img src="registro/images/na_1.jpg" width="25px"/></td>';
                                                                            $linea .= '</tr>';
                                                                            echo $linea;
                                                                        }
                                                                        if($obj_json_decode['ing']['ctok'] + $obj_json_decode['ing']['ctno'] + $obj_json_decode['ing']['ctna'] > 0) {
                                                                            $linea = '<tr>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td>INGLES</td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['ing']['ctok'].'"/> <img src="registro/images/checked_1.jpg" height="25px"/></td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['ing']['ctno'].'"/> <img src="registro/images/unchecked_1.jpg" width="25px"/></td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['ing']['ctna'].'"/> <img src="registro/images/na_1.jpg" width="25px"/></td>';
                                                                            $linea .= '</tr>';
                                                                            echo $linea;
                                                                        }
                                                                        if($obj_json_decode['tec']['ctok'] + $obj_json_decode['tec']['ctno'] + $obj_json_decode['tec']['ctna'] > 0) {
                                                                            $linea = '<tr>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td>TECNOLOGICO</td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['tec']['ctok'].'"/> <img src="registro/images/checked_1.jpg" height="25px"/></td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['tec']['ctno'].'"/> <img src="registro/images/unchecked_1.jpg" width="25px"/></td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['tec']['ctna'].'"/> <img src="registro/images/na_1.jpg" width="25px"/></td>';
                                                                            $linea .= '</tr>';
                                                                            echo $linea;
                                                                        }
                                                                        if($obj_json_decode['fis']['ctok'] + $obj_json_decode['fis']['ctno'] + $obj_json_decode['fis']['ctna'] > 0) {
                                                                            $linea = '<tr>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td>FISICA</td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['fis']['ctok'].'"/> <img src="registro/images/checked_1.jpg" height="25px"/></td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['fis']['ctno'].'"/> <img src="registro/images/unchecked_1.jpg" width="25px"/></td>';
                                                                            $linea .= '<td width="50px"></td>';
                                                                            $linea .= '<td class="fondoblanco"><input type="text" class="txtct" value="'.$obj_json_decode['fis']['ctna'].'"/> <img src="registro/images/na_1.jpg" width="25px"/></td>';
                                                                            $linea .= '</tr>';
                                                                            echo $linea;
                                                                        }
                                                                    ?>
                                                                    <!--<tr>
                                                                        <td><h6>Resumen: </h6></td> 
                                                                        <td width="50px"></td>
                                                                        <td class="fondoblanco"><input type="text" id="txtok" class="txtct" value="<?php echo $ct_ok; ?>"/> <img src='registro/images/checked_1.jpg' height='25px'/></td>
                                                                        <td width="50px"></td>
                                                                        <td class="fondoblanco"><input type="text" id="txtno" class="txtct" value="<?php echo $ct_no; ?>"/> <img src='registro/images/unchecked_1.jpg' width='25px'/></td>
                                                                        <td width="50px"></td>
                                                                        <td class="fondoblanco"><input type="text" id="txtna" class="txtct" value="<?php echo $ct_na; ?>"/> <img src='registro/images/na_1.jpg' width='25px'/></td>
                                                                    </tr>-->
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        
                                                        <div style="width: 100%; background: #093A5F; color: #F1F1F2; text-align: center; font-size: 20px; font-weight: bold; font-family: 'PT Sans Narrow';">Informe Global
                                                        </div>
                                                        <div style="width: 100%; background: #F1F1F2; text-align: center; font-size: 20px; font-family: 'Poppins-medium';">
                                                            <br><p>A continuación se relacionan los puntajes obtenidos en cada uno de los pensamientos evaluados en la evaluación de admisión:</p><br>
                                                        </div>
                                
                                                        <div class="row" id="divglobal">
                                    
                                                            <table id="tblglobal" style="text-align: center;">
                                                                <thead style="font-family: 'PT Sans Narrow';">
                                                                    <tr style="background: #45A872; color: #F1F1F2; font-size: 20px; font-weight: bold; border: 2px;"><td colspan="9">Pensamientos</td></tr>
                                                                    <tr>
                                                                        <td colspan="2" width="200px" style="background: #FA4D59; color: #F1F1F2; font-size: 20px; font-weight: bold; border: 2px solid black;">Global</td>
                                                                        <td width="100px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">Bio</td>
                                                                        <td width="100px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">Esp</td>
                                                                        <td width="100px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">Ing</td>
                                                                        <td width="100px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">Num</td>
                                                                        <td width="100px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">Soc</td>
                                                                        <td width="100px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">Tec</td>
                                                                        <td width="100px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">Fis</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-family: 'PT Sans Narrow';">
                                                                    
                                                                <?php
                                                                    $linea = '<tr>';
                                                                    $linea .= '<td style="color: #064C86; border: 2px solid black;">Puntaje</td>';
                                                                    $linea .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$total_todos_ok.' / '.$total_todos.'</td>';
                                                                    $linea .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['bio']['ctok'].' / '.$obj_json_decode['bio']['ctpen'].'</td>';
                                                                    $linea .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['esp']['ctok'].' / '.$obj_json_decode['esp']['ctpen'].'</td>';
                                                                    $linea .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['ing']['ctok'].' / '.$obj_json_decode['ing']['ctpen'].'</td>';
                                                                    $linea .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['num']['ctok'].' / '.$obj_json_decode['num']['ctpen'].'</td>';
                                                                    $linea .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['soc']['ctok'].' / '.$obj_json_decode['soc']['ctpen'].'</td>';
                                                                    $linea .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['tec']['ctok'].' / '.$obj_json_decode['tec']['ctpen'].'</td>';
                                                                    $linea .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['fis']['ctok'].' / '.$obj_json_decode['fis']['ctpen'].'</td>';
                                                                    $linea .= '</tr>';
                                                                    echo $linea;
                                                                    
                                                                    $linea = '<tr>';
                                                                    $linea .= '<td style="color: #064C86; border: 2px solid black;">Desempeño</td>';
                                                                    $linea .= '<td style="color: '.$colglo.'; border: 2px solid black; font-weight: bold;">'.$nivglo.'</td>';
                                                                    $linea .= '<td style="color: '.$colbio.'; border: 2px solid black; font-weight: bold;">'.$nivbio.'</td>';
                                                                    $linea .= '<td style="color: '.$colesp.'; border: 2px solid black; font-weight: bold;">'.$nivesp.'</td>';
                                                                    $linea .= '<td style="color: '.$coling.'; border: 2px solid black; font-weight: bold;">'.$niving.'</td>';
                                                                    $linea .= '<td style="color: '.$colnum.'; border: 2px solid black; font-weight: bold;">'.$nivnum.'</td>';
                                                                    $linea .= '<td style="color: '.$colsoc.'; border: 2px solid black; font-weight: bold;">'.$nivsoc.'</td>';
                                                                    $linea .= '<td style="color: '.$coltec.'; border: 2px solid black; font-weight: bold;">'.$nivtec.'</td>';
                                                                    $linea .= '<td style="color: '.$colfis.'; border: 2px solid black; font-weight: bold;">'.$nivfis.'</td>';
                                                                    $linea .= '</tr>';
                                                                    echo $linea;
                                                                ?>
                                                                
                                                                </tbody>
                                                            </table>
                                                        </div><br>
                                                        
                                                        <div style="width: 100%; background: #093A5F; color: #F1F1F2; text-align: center; font-size: 20px; font-weight: bold; font-family: 'PT Sans Narrow';">Informe por Pensamientos</div>
                                                        
                                                        
                                                        <div class="form-group" style="background: #F1F1F2;">
                                                        <?php 
                                                            $pensamiento = "";
                    						        	    $peticion = mysqli_query($conexion,$sql);
                    							        	while ($fila = mysqli_fetch_array($peticion)){
                    							        	    if($pensamiento != $fila['pensamiento']) {
                    							        	        $pensamiento = $fila['pensamiento'];
                    							        	        //echo '<p><strong style="color: #064C86;">Pensamiento: '.$pensamiento.'</strong></p><br>';
                    							        	        echo '<div style="height: 65px; color: #093A5F; background: #45A872; display: inline-block;"><label style="padding: 15px 10px; font-size: 30px;">'.$pensamiento.'</label></div><br><br>';
                    							        	    }
                    							        	    if($fila['resultado'] == "NO") {
                    							        	        $img_resul = "https://unicab.org/registro/images/respuesta_no2.jpg";
                    							        		}
                    							        		else if($fila['resultado'] == "OK") {
                    							        		    $img_resul = "https://unicab.org/registro/images/respuesta_ok2.jpg";
                    							        		}
                    							        		else if($fila['resultado'] == "NA") {
                    							        		    $img_resul = "https://unicab.org/registro/images/respuesta_no2.jpg";
                    							        		}
                    							        	    $img_pregunta = "https://unicab.org/registro/".$fila['ruta'];
                    							        	    $tbl_pregunta = '<table id="tblres" class="table" style="width:100%;"><tbody><tr><td style="color: #F1F1F2; width: 100px;">Pregunta</td><td style="width: 600px;">'.$fila['pregunta'].'</td><td style="text-align: center;"><img src="'.$img_pregunta.'" width="50%" alt=""/></td></tr>';
                    							        	    $tbl_pregunta .= '<tr style="background: #1d2b2e; color: #F1F1F2;"><td style="color: #1d2b2e; width: 100px;">Respuesta</td><td>Tu respuesta: '.$fila['respuesta'].'</td><td  style="text-align: center;"><img src="'.$img_resul.'" width="80px"/></td></tr>';
                    							        	    $tbl_pregunta .= '</tbody></table><br>';
                    							        	    echo $tbl_pregunta;
                    							        	}
                    						        	?>
                                                    </div>
                                                    <!--</form>-->
                                                    
                                                </div>
                                                <input type="hidden" id="txtctnum" value="<?php echo $ct_num; ?>"/>
                                            	<input type="hidden" id="txtctbio" value="<?php echo $ct_bio; ?>"/>
                                            	<input type="hidden" id="txtctsoc" value="<?php echo $ct_soc; ?>"/>
                                            	<input type="hidden" id="txtctesp" value="<?php echo $ct_esp; ?>"/>
                                            	<input type="hidden" id="txtcting" value="<?php echo $ct_ing; ?>"/>
                                            	<input type="hidden" id="txtcttec" value="<?php echo $ct_tec; ?>"/>
                                            	<input type="hidden" id="txtctfis" value="<?php echo $ct_fis; ?>"/>
                                                
                                                <div style="width: 100%; background: #093A5F; color: #F1F1F2; text-align: center; font-size: 20px; font-weight: bold; font-family: 'PT Sans Narrow';">Ruta sugerida para reforzar conceptos:
                                                </div><br>
                        
                                                <div class="form-group" style="background: #F1F1F2;">
                            
                                                    <?php
                                                        $exe_retro_bio = mysqli_query($conexion,$sql_retro_bio);
                                                        $filas = mysqli_num_rows($exe_retro_bio);
                                                        //echo "filas ".$filas;
                                                        if($filas > 0) {
                                                            //echo '<h4 style="color: #5ac48c;">Pensamiento: BIOÉTICO</h4>';
                                                            echo '<ul class="list-group">';
                                                            echo '<li style="color: #5ac48c; font-size: 16px;">Pensamiento: BIOÉTICO</li>';
                                                            while($row_retro_bio = mysqli_fetch_array($exe_retro_bio)) {
                                                                echo '<li style="font-size: 14px;">'.$row_retro_bio['retroalimentacion'].'</li>';
                                                            }
                                                            echo '</ul><br>';
                                                        }
                                                        
                                                        $exe_retro_esp = mysqli_query($conexion,$sql_retro_esp);
                                                        $filas = mysqli_num_rows($exe_retro_esp);
                                                        //echo "filas ".$filas;
                                                        if($filas > 0) {
                                                            //echo '<h4 style="color: #5ac48c;">Pensamiento: HUMANÍSTICO ESPAÑOL</h4>';
                                                            echo '<ul class="list-group">';
                                                            echo '<li style="color: #5ac48c; font-size: 16px;">Pensamiento: HUMANÍSTICO ESPAÑOL</li>';
                                                            while($row_retro_esp = mysqli_fetch_array($exe_retro_esp)) {
                                                                echo '<li style="font-size: 14px;">'.$row_retro_esp['retroalimentacion'].'</li>';
                                                            }
                                                            echo '</ul><br>';
                                                        }
                                                        
                                                        $exe_retro_ing = mysqli_query($conexion,$sql_retro_ing);
                                                        $filas = mysqli_num_rows($exe_retro_ing);
                                                        if($filas > 0) {
                                                            //echo '<h4 style="color: #5ac48c;">Pensamiento: HUMANÍSTICO INGLÉS</h4>';
                                                            echo '<ul class="list-group">';
                                                            echo '<li style="color: #5ac48c; font-size: 16px;">Pensamiento: HUMANÍSTICO INGLÉS</li>';
                                                            while($row_retro_ing = mysqli_fetch_array($exe_retro_ing)) {
                                                                echo '<li style="font-size: 14px;">'.$row_retro_ing['retroalimentacion'].'</li>';
                                                            }
                                                            echo '</ul><br>';
                                                        }
                                                         
                                                        $exe_retro_num = mysqli_query($conexion,$sql_retro_num);
                                                        $filas = mysqli_num_rows($exe_retro_num);
                                                        if($filas > 0) {
                                                            //echo '<h4 style="color: #5ac48c;">Pensamiento: NUMÉRICO</h4>';
                                                            echo '<ul class="list-group">';
                                                            echo '<li style="color: #5ac48c; font-size: 16px;">Pensamiento: NUMÉRICO</li>';
                                                            while($row_retro_num = mysqli_fetch_array($exe_retro_num)) {
                                                                echo '<li style="font-size: 14px;">'.$row_retro_num['retroalimentacion'].'</li>';
                                                            }
                                                            echo '</ul><br>';
                                                        }
                                                        
                                                        $exe_retro_soc = mysqli_query($conexion,$sql_retro_soc);
                                                        $filas = mysqli_num_rows($exe_retro_soc);
                                                        if($filas > 0) {
                                                            //echo '<h4 style="color: #5ac48c;">Pensamiento: SOCIAL</h4>';
                                                            echo '<ul class="list-group">';
                                                            echo '<li style="color: #5ac48c; font-size: 16px;">Pensamiento: SOCIAL</li>';
                                                            while($row_retro_soc = mysqli_fetch_array($exe_retro_soc)) {
                                                                echo '<li style="font-size: 14px;">'.$row_retro_soc['retroalimentacion'].'</li>';
                                                            }
                                                            echo '</ul><br>';
                                                        }
                                                                
                                                        $exe_retro_tec = mysqli_query($conexion,$sql_retro_tec);
                                                        $filas = mysqli_num_rows($exe_retro_tec);
                                                        if($filas > 0) {
                                                            //echo '<h4 style="color: #5ac48c;">Pensamiento: TECNOLÓGICO</h4>';
                                                            echo '<ul class="list-group">';
                                                            echo '<li style="color: #5ac48c; font-size: 16px;">Pensamiento: TECNOLÓGICO</li>';
                                                            while($row_retro_tec = mysqli_fetch_array($exe_retro_tec)) {
                                                                echo '<li style="font-size: 14px;">'.$row_retro_tec['retroalimentacion'].'</li>';
                                                            }
                                                            echo '</ul><br>';
                                                        }
                                                                               
                                                        $exe_retro_fis = mysqli_query($conexion,$sql_retro_fis);
                                                        $filas = mysqli_num_rows($exe_retro_fis);
                                                        if($filas > 0) {
                                                            //echo '<h4 style="color: #5ac48c;">Pensamiento: BIOÉTICO (FÍSICA)</h4>';
                                                            echo '<ul class="list-group">';
                                                            echo '<li style="color: #5ac48c; font-size: 16px;">Pensamiento: BIOÉTICO (FÍSCIA)</li>';
                                                            while($row_retro_fis = mysqli_fetch_array($exe_retro_fis)) {
                                                                echo '<li style="font-size: 14px;">'.$row_retro_fis['retroalimentacion'].'</li>';
                                                            }
                                                            echo '</ul><br>';
                                                        }
                                                                        
                                                    ?>
                                                    
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
