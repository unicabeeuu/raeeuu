<?php
	//Genera el select de los grados
	require("registro/docenteunicab/updreg/1cc3s4db.php");
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
	//header("Refresh: 30; URL='pen_gra_upddat.php'");
	set_time_limit(300);
	//https://unicab.org/registro_validacion.php?documento=1111
	
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
	
	/*$sql = "SELECT pm.*, v.id_grado id_grado_val, g.grado 
	FROM tbl_pre_matricula pm, tbl_validaciones)v, grados g 
	WHERE pm.documento_est = v.documento_est AND v.id_grado = g.id AND pm.documento_est = '$documento' 
	AND v.fecha_programacion like '%$fanio%'";*/
	$sql = "SELECT pm.*, v.id_grado id_grado_val, g.grado 
	FROM tbl_pre_matricula pm, tbl_validaciones v, grados g 
	WHERE pm.documento_est = v.documento_est AND v.id_grado = g.id AND pm.documento_est = '$documento' 
	AND v.fecha_programacion like '%$fanio%' AND v.id_grado = (SELECT MIN(id_grado) FROM tbl_validaciones WHERE documento_est = '$documento' AND resultado = 'NA')";
    //echo $sql;
	$exe_sql = $mysqli1->query($sql);
	while($row_sql = $exe_sql->fetch_assoc()) {
	    $datos->nombres = $row_sql['nombres_est'];
        $datos->apellidos = $row_sql['apellidos_est'];
        $datos->acudiente = $row_sql['nombre_a'];
        $datos->emailA = $row_sql['email_a'];
        $datos->telA = $row_sql['celular_a'];
        $idgrado = $row_sql['id_grado_val'];
        $datos->idgrado = $row_sql['id_grado_val'];
        $datos->grado = $row_sql['grado'];
	}
	
    //Se consulta la cantidad de preguntas
	$suma = 0;
	//$sql_suma = "SELECT SUM(ct_temas * ct_preguntas) suma FROM tbl_ct_preguntas_f WHERE id_grado = $idgrado AND incluir = 'SI'";
	$sql_suma = "SELECT SUM(ct_preguntas) suma FROM tbl_temas_preguntas WHERE id_grado = $idgrado";
	//echo $sql_suma;
	$res_suma = $mysqli1->query($sql_suma);
    while($row_suma = $res_suma->fetch_assoc()){
        $suma = $row_suma['suma'];
    }
    //echo $suma;
    $datos->ct_preg = $suma;
    
    //Se valida si presenta examen de admisión
    $sql_eval = "SELECT COUNT(1) ct FROM estudiantes WHERE id >= 0 AND n_documento = '$documento'";
    $res_eval = $mysqli1->query($sql_eval);
    while($row_eval = $res_eval->fetch_assoc()){
        $ct_eval = $row_eval['ct'];
    }
    if($ct_eval == 1) {
        $datos->req_eval_adm = "SI";
    }
    else {
        //Se valida si el documento existe para saber si es nuevo
        $sql_nuevo = "SELECT COUNT(1) ct FROM estudiantes WHERE n_documento = '$documento'";
        $res_nuevo = $mysqli1->query($sql_nuevo);
        while($row_nuevo = $res_nuevo->fetch_assoc()){
            $ct_nuevo = $row_nuevo['ct'];
        }
        if($ct_nuevo == 0) {
            $datos->req_eval_adm = "SI";
        }
        else {
            $datos->req_eval_adm = "NO";
        }
    }
    //echo $ct_eval;
    
    //Se valida si presenta examen de validación
    $sql_val = "SELECT COUNT(1) ct FROM tbl_pre_matricula WHERE documento_est = '$documento' AND eval = 1";
    /*$sql_val = "SELECT COUNT(1) ct 
    FROM tbl_pre_matricula pm, (SELECT * FROM tbl_validaciones WHERE documento_est = '$documento' AND '$fecha2' >= fecha_programacion) v 
    WHERE pm.documento_est = v.documento_est AND pm.documento_est = '$documento' AND pm.eval = 1";*/
    $res_val = $mysqli1->query($sql_val);
    //echo $sql_val;
    
    while($row_val = $res_val->fetch_assoc()){
        $ct_val = $row_val['ct'];
    }
    if($ct_val == 1) {
        $datos->req_validacion = "SI";
        //Se valida que tenga fecha de programación
        /*$sql_valf = "SELECT COUNT(1) ct 
        FROM tbl_pre_matricula pm, (SELECT * FROM tbl_validaciones WHERE documento_est = '$documento' AND '$fecha2' >= fecha_programacion) v 
        WHERE pm.documento_est = v.documento_est AND pm.documento_est = '$documento' AND pm.eval = 1";*/
        $sql_valf = "SELECT COUNT(1) ct 
        FROM tbl_pre_matricula pm, (SELECT * FROM tbl_validaciones WHERE documento_est = '$documento' AND fecha_programacion like '%$fanio%') v 
        WHERE pm.documento_est = v.documento_est AND pm.documento_est = '$documento' AND pm.eval = 1";
        $res_valf = $mysqli1->query($sql_valf);
        //echo $sql_valf;
        while($row_valf = $res_valf->fetch_assoc()){
            $ct_valf = $row_valf['ct'];
        }
        if($ct_valf >= 1) {
            $datos->fecha_validacion = "OK";
        }
        else {
            $datos->fecha_validacion = "NO";
        }
    }
    else {
        $datos->req_validacion = "NO";
        $datos->fecha_validacion = "NO";
    }
    
    //Se valida si ya presentó la evaluación
    $sql_control = "SELECT COUNT(1) ct FROM tbl_respuestas_val WHERE identificacion = '$documento' AND estado = 'ABIERTA' AND a = $fanio AND id_grado = $idgrado";
    //echo $sql_control;
    $exe_control = $mysqli1->query($sql_control);
    while($row_control = $exe_control->fetch_assoc()){
        $ct_control = $row_control['ct'];
    }
	if($ct_control > 0) {
	    $datos->eval_val_estado = "SIN PRESENTAR";
	}
	else {
	    //Se valida que no tenga preguntas cargadas
	    $sql_ct_preg = "SELECT COUNT(1) ct FROM tbl_respuestas_val WHERE identificacion = '$documento' AND a = $fanio AND id_grado = $idgrado";
	    $exe_ct_preg = $mysqli1->query($sql_ct_preg);
        while($row_ct_preg = $exe_ct_preg->fetch_assoc()){
            $ct_ct_preg = $row_ct_preg['ct'];
        }
        if($ct_ct_preg == 0) {
            $datos->eval_val_estado = "SIN PRESENTAR";
        }
        else {
            $datos->eval_val_estado = "PRESENTADA";
        }
	}
	
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);
	
?>