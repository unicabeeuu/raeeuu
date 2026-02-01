<?php
	//Genera el select de los grados
	require("registro/docenteunicab/updreg/1cc3s4db.php");
	include "mcript.php";
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
	//header("Refresh: 30; URL='pen_gra_upddat.php'");
	set_time_limit(300);
	$id_gra = $_REQUEST["id_gra"];
	
	if($id_gra == 0) {
	    $query1 = "SELECT grado, id FROM grados";
	}
	else {
	    $query1 = "SELECT grado, id FROM grados WHERE id = $id_gra";
	}
	//echo $query1;
	
	$cadena = $cadena."<option value='0' selected>Seleccione grado</option>";
	$resultado=$mysqli1->query($query1);
	while($row = $resultado->fetch_assoc()) {
		$cadena = $cadena."<option value='".$row['id']."'>".$row['grado']."</option>";
	}
	echo $cadena;
?>