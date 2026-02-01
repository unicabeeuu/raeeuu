<?php
	//Genera el select de los grados
	require("registro/docenteunicab/updreg/1cc3s4db.php");
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
	//header("Refresh: 30; URL='pen_gra_upddat.php'");
	set_time_limit(300);
	//https://unicab.org/cargue_manual_calificaciones.php?idgra=2
	
	$idgra = $_REQUEST["idgra"];
	//echo $idgra;
	
	/*$datos = new stdClass();
	$grados = array();
	$keys = ['id_gra','gra'];
	$i = 0;*/
	
	date_default_timezone_set('America/Bogota');
    $dia=date("d");
    $mes=date("m");
    $mesLetra=date("M");
    $fanio=date("Y");
    $fecha2 = $fanio."/".$mes."/".$dia;
	
	$tabla = "notas";
	//$tabla = "notas_temp_manual";
	
	//Se consultan las calificaciones manuales
	$query0 = "SELECT * FROM notas_manual_2023 WHERE id_grado = $idgra";
	//echo "<br>".$query0;
	$resultado0 = $mysqli1->query($query0);
	while($row0 = $resultado0->fetch_assoc()) {
	    $registro = "nota ".$row0['nota'].", id_periodo ".$row0['id_periodo'].", id_materia ".$row0['id_materia'].", id_grado ".$row0['id_grado'].", id_estudiante ".$row0['id_estudiante'];
		$nota_anterior = 0;
		$ct_val_cal = 0;
		$resultado = "";
		
		//Se valida si el registro exite en notas
		$sql_val_cal = "SELECT COUNT(1) ct, nota FROM $tabla 
		WHERE id_periodo = ".$row0['id_periodo']." AND id_materia = ".$row0['id_materia']." AND id_grado = ".$row0['id_grado']." AND id_estudiante = ".$row0['id_estudiante'].
		" GROUP BY nota";
		//echo "<br>".$sql_val_cal;
		$res_val_val = $mysqli1->query($sql_val_cal);
		while($row_val_cal = $res_val_val->fetch_assoc()) {
			$ct_val_cal = $row_val_cal['ct'];
			$nota_anterior = $row_val_cal['nota'];
		}
		
		if ($ct_val_cal == 1) {
			//Se actualiza la calificación
			if ($nota_anterior > $row0['nota']) {
				$sql_upd_ins = "UPDATE tbl_temp SET v1 = 0 WHERE id = -1";
				$registro = $registro.", resultado NO ACTUALIZADA (NOTA MENOR)";
				$resultado = "NO ACTUALIZADA (NOTA MENOR)";
			}
			else if ($nota_anterior == $row0['nota']) {
				$sql_upd_ins = "UPDATE tbl_temp SET v1 = 0 WHERE id = -1";
				$registro = $registro.", resultado NO ACTUALIZADA";
				$resultado = "NO ACTUALIZADA";
			}
			else {
				$sql_upd_ins = "UPDATE $tabla SET nota = ".$row0['nota']." 
				WHERE id_periodo = ".$row0['id_periodo']." AND id_materia = ".$row0['id_materia']." AND id_grado = ".$row0['id_grado']." AND id_estudiante = ".$row0['id_estudiante'];
				$registro = $registro.", nota anterior ".$nota_anterior.", resultado ACTUALIZADA";
				$resultado = "ACTUALIZADA";
			}
			
		}
		else {
			//Se agrega la calificación
			if ($row0['nota'] > 0) {
				$sql_upd_ins = "INSERT INTO $tabla (nota, id_periodo, id_materia, id_grado, id_estudiante) 
				VALUES (".$row0['nota'].", ".$row0['id_periodo'].", ".$row0['id_materia'].", ".$row0['id_grado'].", ".$row0['id_estudiante'].")";
				$registro = $registro.", resultado AGREGADA";
				$resultado = "AGREGADA";
			}
			else {
				$sql_upd_ins = "UPDATE tbl_temp SET v1 = 0 WHERE id = -1";
				$registro = $registro.", resultado NO ACTUALIZADA";
				$resultado = "NO AGREGADA (NOTA 0)";
			}
		}
		//echo "<br>".$res_upd_ins;
		$res_upd_ins = $mysqli1->query($sql_upd_ins);
		echo "<br>".$registro;
		
		//Se inserta en la tabla log_calificaciones_manuales
		$sql_log = "INSERT INTO log_calificaciones_manuales (nota, nota_anterior, id_periodo, id_materia, id_grado, id_estudiante, resultado, fecha) 
		VALUES (".$row0['nota'].", ".$nota_anterior.", ".$row0['id_periodo'].", ".$row0['id_materia'].", ".$row0['id_grado'].", ".$row0['id_estudiante'].", '$resultado', '$fecha2')";
		$res_log = $mysqli1->query($sql_log);
	}
	
	//echo json_encode($datos, JSON_UNESCAPED_UNICODE);
	
?>