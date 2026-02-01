<?php
	//Genera el select de los grados
	require("registro/docenteunicab/updreg/1cc3s4db.php");
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
	//header("Refresh: 30; URL='pen_gra_upddat.php'");
	set_time_limit(300);
	//https://unicab.org/validacion_pres.php?documento=999999
	
	$documento = $_REQUEST["documento"];
	
	date_default_timezone_set('America/Bogota');
    $dia=date("d");
    $mes=date("m");
    $mesLetra=date("M");
    $fanio=date("Y");
	
	$datos = new stdClass();
	
	//Se hace la consulta
	$ct = 0;
	$ct1 = 0;
	$ct2 = 0;
	$query0 = "SELECT COUNT(1) ct FROM tbl_respuestas WHERE identificacion = '$documento' AND respuesta = 'NA' AND a = $fanio";
	//echo $query0;
	$resultado0 = $mysqli1->query($query0);
	while($row0 = $resultado0->fetch_assoc()) {
	    $ct = $row0['ct'];
	}
	//echo $ct1;
	
	if($ct > 0) {
	    $datos->estado = "SIN_PRESENTAR";
	}
	else {
	    //Se validan si existen preguntas cargadas en estado abierta para el documento
	    $sql_ct_preg = "SELECT COUNT(1) ct FROM tbl_respuestas WHERE identificacion = '$documento' AND a = $fanio AND estado = 'ABIERTA'";
	    //echo $sql_ct_preg;
	    $exe_ct_preg = $mysqli1->query($sql_ct_preg);
	    while($row_ct_preg = $exe_ct_preg->fetch_assoc()) {
	        $ct1 = $row_ct_preg['ct'];
	    }
	    if($ct1 > 0) {
	        $datos->estado = "SIN_PRESENTAR";
	    }
	    else {
	        //Se validan si existen preguntas cargadas para el documento
    	    $sql_ct_preg1 = "SELECT COUNT(1) ct FROM tbl_respuestas WHERE identificacion = '$documento' AND a = $fanio";
    	    //echo $sql_ct_preg1;
    	    $exe_ct_preg1 = $mysqli1->query($sql_ct_preg1);
    	    while($row_ct_preg1 = $exe_ct_preg1->fetch_assoc()) {
    	        $ct2 = $row_ct_preg1['ct'];
    	    }
    	    if($ct2 == 0) {
    	        $datos->estado = "SIN_PRESENTAR";
    	    }
    	    else {
	            $datos->estado = "PRESENTADA";
    	    }
	    }
	}
	
	//Se busca el grado en la tabla tbl_pre_matricula para no tener en cuenta los ciclos
	/*$id_grado = 0;
	$sql_grado = "SELECT id_grado FROM tbl_pre_matricula WHERE documento_est LIKE '$documento'";
	$exe_grado = $mysqli1->query($sql_grado);
	while($row_grado = $exe_grado->fetch_assoc()) {
		$id_grado = $row_grado['id_grado'];
	}
	if ($id_grado >= 13) {
		$datos->estado = "PRESENTADA";
	}*/
	
	//Se valida si existen preguntas para el grado
	$idgra = "0";
	$grado = "_";
	
	$sql_grado = "SELECT m.id_grado, g.grado 
	FROM estudiantes e, matricula m, grados g 
	WHERE e.id = m.id_estudiante AND m.id_grado = g.id AND e.n_documento = '$documento' AND m.n_matricula like '%$fanio%' AND m.estado IN ('solicitud', 'activo')";
	$res_grado = $mysqli1->query($sql_grado);
	while($row_g = $res_grado->fetch_assoc()) {
	    $idgra = $row_g['id_grado'];
	    $grado = $row_g['grado'];
	}
	if($idgra != "0") {
	    $datos->idgra = $idgra;
	    $datos->grado = $grado;
	    $datos->estado_doc = "EnBD";
	}
	else {
	    $datos->idgra = "0";
	    $datos->grado = "_";
	    $datos->estado_doc = "NoBD";
	}
	//echo $sql_grado;
	
	$ct_p = 0;
	$sql_preg = "SELECT COUNT(1) ct FROM tbl_preguntas WHERE id_grado = $idgra";
	$res_preg = $mysqli1->query($sql_preg);
	while($row_p = $res_preg->fetch_assoc()) {
	    $ct_p = $row_p['ct'];
	}
	$datos->ct_preg = $ct_p;	
	
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);
	
?>