<?php
	//Genera el select de los grados
	require("registro/docenteunicab/updreg/1cc3s4db.php");
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
	//header("Refresh: 30; URL='pen_gra_upddat.php'");
	set_time_limit(300);
	//https://unicab.org/preguntas_est_getdat.php?idpreg=14
	
	$idpreg = $_REQUEST['idpreg'];
	$documento = $_REQUEST['documento'];
	$respuesta = $_REQUEST['respuesta'];
	$resultado = $_REQUEST['resultado'];
	
	date_default_timezone_set('America/Bogota');
    $dia=date("d");
    $mes=date("m");
    $mesLetra=date("M");
    $fanio=date("Y");
    
    //Se actualiza la respuesta
	$sql_updpreg = "UPDATE tbl_respuestas SET respuesta = '$respuesta', resultado = '$resultado' 
	    WHERE id_pregunta = $idpreg AND identificacion = '$documento' AND a = $fanio";
	$exe_updpreg = $mysqli1->query($sql_updpreg);
	
	echo "UPDATE_OK";
	
?>