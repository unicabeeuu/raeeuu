<?php
	//Genera el select de los grados
	session_start();
	require("admin-unicab/administrador/1cc3s4db.php");
	include "admin-unicab/administrador/php/conexion.php";
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
	//header("Refresh: 30; URL='pen_gra_upddat.php'");
	set_time_limit(300);
	//https://unicab.org/domain_upddat.php
	
	$registrosactivos = 10;
	$registrosacambiar = 5;
	
	for ($i = 1; $i <= $registrosacambiar; $i++) {
		$query1 = "SELECT MAX(id) maxidactivo, (SELECT MAX(id) FROM tbl_metodo_domain) maxidgeneral, 
		(SELECT MIN(id) FROM tbl_metodo_domain WHERE estado = 0) minidinactivo 
		FROM tbl_metodo_domain WHERE estado = 1";
		//echo $query1;
		
		$resultado = $mysqli1->query($query1);
		while($row = $resultado->fetch_assoc()) {
			$maxidactivo = $row['maxidactivo'];
			$maxidgeneral = $row['maxidgeneral'];
			$minidinactivo = $row['minidinactivo'];
		}
		echo "<br>maxidactivo: ".$maxidactivo;
		echo "<br>maxidgeneral: ".$maxidgeneral;
		echo "<br>minidinactivo: ".$minidinactivo;
		
		if ($maxidactivo == $maxidgeneral) {
			$sql_activar = "UPDATE tbl_metodo_domain SET estado = 1 WHERE id = ".$minidinactivo;
			$res_activar = $mysqli1->query($sql_activar);
			echo "<br>sql_activar: ".$sql_activar;
			
			$sql_desactivar = "UPDATE tbl_metodo_domain SET estado = 0 WHERE id = ".($maxidactivo - ($registrosactivos - $minidinactivo));
			$res_desactivar = $mysqli1->query($sql_desactivar);
			echo "<br>sql_desactivar: ".$sql_desactivar;
		}
		else {
			$sql_activar1 = "UPDATE tbl_metodo_domain SET estado = 1 WHERE id = ".($maxidactivo + 1);
			$res_activar1 = $mysqli1->query($sql_activar1);
			echo "<br>sql_activar: ".$sql_activar1;
			
			$sql_desactivar1 = "UPDATE tbl_metodo_domain SET estado = 0 WHERE id = ".($maxidactivo + 1 - $registrosactivos);
			$res_desactivar1 = $mysqli1->query($sql_desactivar1);
			echo "<br>sql_desactivar: ".$sql_desactivar1;
		}
		
		$query2 = "SELECT MAX(id) maxidactivo, (SELECT MAX(id) FROM tbl_metodo_domain) maxidgeneral, 
		(SELECT MIN(id) FROM tbl_metodo_domain WHERE estado = 0) minidinactivo 
		FROM tbl_metodo_domain WHERE estado = 1";
		//echo $query1;
		
		$resultado2=$mysqli1->query($query2);
		while($row2 = $resultado2->fetch_assoc()) {
			$maxidactivo1 = $row2['maxidactivo'];
			$maxidgeneral1 = $row2['maxidgeneral'];
			$minidinactivo1 = $row2['minidinactivo'];
		}
		echo "<br>maxidactivo: ".$maxidactivo1;
		echo "<br>maxidgeneral: ".$maxidgeneral1;
		echo "<br>minidinactivo: ".$minidinactivo1;
	}
	
	
?>