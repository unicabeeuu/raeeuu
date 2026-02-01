<?php
	//Genera el select de los grados
	session_start();
	require("admin-unicab/administrador/1cc3s4db.php");
	include "admin-unicab/administrador/php/conexion.php";
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
	//header("Refresh: 30; URL='pen_gra_upddat.php'");
	set_time_limit(300);
	//https://unicab.org/articulo_getdat1.php?idb=3
	
	$idb = $_REQUEST["idb"];
	//$idpen = $_REQUEST["idpen"];
	//echo $idb;
	//echo $idpen;
	
	$cadena = "";
	$datos = new stdClass();
	
	$query1 = "SELECT * FROM blog WHERE IdBlog = $idb";
	//echo $query1;
	
	$resultado=$mysqli1->query($query1);
	while($row = $resultado->fetch_assoc()) {
	    $datos->idb = $row['IdBlog'];
	    $datos->titulo = $row['TituloB'];
	    $datos->des = $row['DescripcionA'];
	}
	
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);
?>