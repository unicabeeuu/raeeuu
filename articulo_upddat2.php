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
	$ide = $_REQUEST["ide"];
	//echo $idb;
	//echo $idpen;
	
	$cadena = "";
	
	$query1 = "UPDATE blog SET estado_rev_mult = $ide WHERE IdBlog = $idb";
	//echo $query1;
	
	$resultado=$mysqli1->query($query1);
	
	echo "Revisión del diseño del blog generada con éxito";
?>