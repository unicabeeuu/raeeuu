<?php
	//Genera el select de los grados
	require("registro/docenteunicab/updreg/1cc3s4db.php");
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
	//header("Refresh: 30; URL='pen_gra_upddat.php'");
	set_time_limit(300);
	//https://unicab.org/registro_prog.php?documento=9397454
	
	$documento = $_REQUEST["documento"];
	
	$datos = new stdClass();
	$grados = array();
	$keys = ['id_gra','gra'];
	$i = 0;
	
	date_default_timezone_set('America/Bogota');
    $dia=date("d");
    $mes=date("m");
    $mesLetra=date("M");
    $fanio=date("Y");
    $fecha2 = $fanio."-".$mes."-". $dia;
    
    $idgrado = 0;
	
	//Se valida si tiene una evaluación programada
	$sql_val_prog = "SELECT COUNT(1) ct FROM tbl_eval_cargos WHERE documento = '$documento' AND fecha_programacion like '%$fanio%'";
	$exe_val_prog = $mysqli1->query($sql_val_prog);
	while($row_val_prog = $exe_val_prog->fetch_assoc()) {
	    $ct = $row_val_prog['ct'];
	}
	//echo $sql_val_prog;
	
	if ($ct > 0) {
		$datos->programado = "SI";
		
		$sql = "SELECT c.*, g.grado 
		FROM tbl_eval_cargos c, grados g 
		WHERE c.id_grado = g.id 
		AND c.fecha_programacion like '%$fanio%' AND c.documento = '$documento'";
		//echo $sql;
		$exe_sql = $mysqli1->query($sql);
		while($row_sql = $exe_sql->fetch_assoc()) {
			$datos->nombre = $row_sql['nombre_completo'];
			$datos->email = $row_sql['email'];
			$datos->documento = $row_sql['documento'];
			$idgrado = $row_sql['id_grado'];
			$datos->idgrado = $row_sql['id_grado'];
			$datos->grado = $row_sql['grado'];
			$datos->fecha_programacion = $row_sql['fecha_programacion'];
			$datos->resultado = $row_sql['resultado'];
		}
		
		//Se consulta la cantidad de preguntas
		$suma = 0;
		$sql_suma = "SELECT SUM(ct_preguntas) suma FROM tbl_temas_preguntas WHERE id_grado = $idgrado";
		//echo $sql_suma;
		$res_suma = $mysqli1->query($sql_suma);
		while($row_suma = $res_suma->fetch_assoc()){
			$suma = $row_suma['suma'];
		}
		//echo $suma;
		$datos->ct_preg = $suma;
		
		//Se valida si ya presentó la evaluación
		$sql_control = "SELECT COUNT(1) ct FROM tbl_respuestas_val WHERE identificacion = '$documento' AND estado = 'ABIERTA' AND a = $fanio AND id_grado = $idgrado";
		//echo $sql_control;
		$exe_control = $mysqli1->query($sql_control);
		while($row_control = $exe_control->fetch_assoc()){
			$ct_control = $row_control['ct'];
		}
		if($ct_control > 0) {
			$datos->eval_prog_estado = "SIN TERMINAR";
		}
		else {
			//Se valida que no tenga preguntas cargadas
			$sql_ct_preg = "SELECT COUNT(1) ct FROM tbl_respuestas_val WHERE identificacion = '$documento' AND a = $fanio AND id_grado = $idgrado";
			$exe_ct_preg = $mysqli1->query($sql_ct_preg);
			while($row_ct_preg = $exe_ct_preg->fetch_assoc()){
				$ct_ct_preg = $row_ct_preg['ct'];
			}
			if($ct_ct_preg == 0) {
				$datos->eval_prog_estado = "SIN PRESENTAR";
			}
			else {
				$datos->eval_prog_estado = "PRESENTADA";
			}
		}
	}
	else {
		$datos->programado = "NO";
	}
	
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);
	
?>