<?php
	//Genera el select de los grados
	require("registro/docenteunicab/updreg/1cc3s4db.php");
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
	//header("Refresh: 30; URL='pen_gra_upddat.php'");
	set_time_limit(300);
	//https://unicab.org/validacion_pres.php?documento=1033106291&id_grado=6
	
	$documento = $_REQUEST["documento"];
	$id_grado = $_REQUEST["id_grado"];
	
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
	$query0 = "SELECT COUNT(1) ct FROM tbl_respuestas_val WHERE identificacion = '$documento' AND respuesta = 'NA' AND a = $fanio AND id_grado = $id_grado";
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
	    $sql_ct_preg = "SELECT COUNT(1) ct FROM tbl_respuestas_val WHERE identificacion = '$documento' AND a = $fanio AND estado = 'ABIERTA' AND id_grado = $id_grado";
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
    	    $sql_ct_preg1 = "SELECT COUNT(1) ct FROM tbl_respuestas_val WHERE identificacion = '$documento' AND a = $fanio AND id_grado = $id_grado";
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
	
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);
	
?>