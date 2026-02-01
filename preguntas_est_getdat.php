<?php
	//Genera el select de los grados
	require("registro/docenteunicab/updreg/1cc3s4db.php");
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
	//header("Refresh: 30; URL='pen_gra_upddat.php'");
	set_time_limit(300);
	//https://unicab.org/preguntas_est_getdat.php?idpreg=14
	
	$idpreg = $_REQUEST['idpreg'];
	
	date_default_timezone_set('America/Bogota');
    $dia=date("d");
    $mes=date("m");
    $mesLetra=date("M");
    $fanio=date("Y");
    
    $datos = new stdClass();
	
	//Se consulta el id pensamiento
	$sql_preg = "SELECT * FROM tbl_preguntas WHERE id = $idpreg";
	$exe_preg = $mysqli1->query($sql_preg);
	while($row_preg = $exe_preg->fetch_assoc()) {
	    $datos->id_tp = $row_preg['id_tipo_pregunta'];
	    $datos->pregunta = $row_preg['pregunta'];
	    $datos->r1ok = $row_preg['r1ok'];
	    $datos->r2ok = $row_preg['r2ok'];
	    $datos->r3ok = $row_preg['r3ok'];
	    $datos->r1no = $row_preg['r1no'];
	    $datos->r2no = $row_preg['r2no'];
	    $datos->r3no = $row_preg['r3no'];
	    $datos->retro = $row_preg['retroalimentacion'];
	    $datos->imagen = $row_preg['imagen'];
	}
	
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);
	
?>