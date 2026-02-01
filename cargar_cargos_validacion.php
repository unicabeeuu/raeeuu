<?php
	//Genera el select de los grados
	require("registro/docenteunicab/updreg/1cc3s4db.php");
	include "mcript.php";
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
	//https://unicab.org/cargar_cargos_validacion.php?documento=1013269543
	set_time_limit(300);
	$doc = $_REQUEST["documento"];
	
	$query1 = "SELECT v.*, g.grado 
	FROM tbl_eval_cargos v, grados g WHERE v.id_grado = g.id AND v.documento = '$doc'";
	//echo $query1;
	$cadena = "";
	$cadena .= "<select id='selgra' name='selgra' onchange='comprobar_grado()'>";
	$cadena .= "<option value='0' selected>Seleccione cargo</option>";
	$resultado=$mysqli1->query($query1);
	while($row = $resultado->fetch_assoc()) {
		$cadena .= "<option value='".$row['id_grado']."'>".$row['grado']."</option>";
	}
	$cadena .= "</select>";
	echo $cadena;
?>