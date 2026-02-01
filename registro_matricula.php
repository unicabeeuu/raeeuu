<?php
	//Genera el select de los grados
	require("registro/docenteunicab/updreg/1cc3s4db.php");
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
	//header("Refresh: 30; URL='pen_gra_upddat.php'");
	set_time_limit(300);
	//https://unicab.org/registro_matricula.php?documento=1025069911&c=ba4zbeopjh
	
	//https://unicab.org/registro_matricula.php?documento=9397454&c=gogx2knana --> antiguo
	//https://unicab.org/registro_matricula.php?documento=1096193910&c=lngp2ieaev --> nuevo
	
	$documento = $_REQUEST["documento"];
	$codigo = $_REQUEST["c"];
	
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
	
	$tablae = "estudiantes";
	//$tablae = "estudiantes_n";
	$tablam = "matricula";
	//$tablam = "matriculas_n";
	
	//Se hace la consulta del máximo registro en matrículas
	$query0 = "SELECT IFNULL(max(m.idmatricula), 0) maxid FROM ".$tablae." e, ".$tablam." m WHERE e.id = m.id_estudiante AND e.n_documento = '$documento'";
	//$query0 = "SELECT IFNULL(max(m.id), 0) maxid FROM ".$tablae." e, ".$tablam." m WHERE e.id = m.id_estudiante AND e.n_documento = '$documento'";
	//echo $query0;
	$resultado0 = $mysqli1->query($query0);
	while($row0 = $resultado0->fetch_assoc()) {
	    $maxid = $row0['maxid'];
	}
	//echo $maxid;
	$idest = -1;
	$idgrado = 0;
	
	if($maxid == 0) {
	    $datos->estado = "NO_EXISTE";
	    $valores = ["NA","NA"];
	    $grados_temp = array_combine($keys,$valores);
        $grados[$i] = $grados_temp;
	}
	else {
	    $query1 = "SELECT m.estado, m.id_grado, e.id, e.nombres, e.apellidos, e.telefono_estudiante, e.acudiente_1, e.email_acudiente_1, e.direccion, e.telefono_acudiente_1, 
	    e.documento_responsable, e.id idest, td.id idtd, td.tipo_documento, e.expedicion, e.fecha_nacimiento, e.direccion_estudiante, e.ciudad 
	    FROM ".$tablae." e, ".$tablam." m, tbl_tipos_documento td 
	    WHERE e.id = m.id_estudiante AND e.tipo_documento = td.id AND e.n_documento = '$documento' AND m.idmatricula = $maxid";
	    //$query1 = "SELECT m.estado, m.id_grado FROM ".$tablae." e, ".$tablam." m WHERE e.id = m.id_estudiante AND e.n_documento = '$documento' AND m.id = $maxid";
	    //echo $query1;
        $resultado1 = $mysqli1->query($query1);
        while($row1 = $resultado1->fetch_assoc()) {
            $idest = $row1['id'];
            $idgrado = $row1['id_grado'];
            $datos->nombres = $row1['nombres'];
            $datos->apellidos = $row1['apellidos'];
            $datos->tel = $row1['telefono_estudiante'];
            $datos->tdoc = $row1['tipo_documento'];
			$datos->expedicion = $row1['expedicion'];
			$datos->fn = $row1['fecha_nacimiento'];
			$datos->direccione = $row1['direccion_estudiante'];
			$datos->ciudad = $row1['ciudad'];
    	    $datos->estado = $row1['estado'];
    	    $datos->id = $row1['idest'];
    	    $datos->acudiente = $row1['acudiente_1'];
    	    $datos->emailA = $row1['email_acudiente_1'];
    	    $datos->direccion = $row1['direccion'];
    	    $datos->telA = $row1['telefono_acudiente_1'];
    	    $datos->docA = $row1['documento_responsable'];
    	    
    	    if($row1['estado'] == "aprobado") {
    	        //Se cargan los grados
        	    $query_g = "SELECT * FROM grados WHERE id = ".$row1['id_grado']." + 1";
        	    $resultadog = $mysqli1->query($query_g);
            	while($rowg = $resultadog->fetch_assoc()) {
            	    $valores = [$rowg['id'],$rowg['grado']];
            	    $grados_temp = array_combine($keys,$valores);
              		$grados[$i] = $grados_temp;
              		$i++;
            	}
    	    }
    	    else  {
    	        //Se cargan los grados
        	    $query_g = "SELECT * FROM grados WHERE id = ".$row1['id_grado'];
        	    $resultadog = $mysqli1->query($query_g);
            	while($rowg = $resultadog->fetch_assoc()) {
            	    $valores = [$rowg['id'],$rowg['grado']];
            	    $grados_temp = array_combine($keys,$valores);
              		$grados[$i] = $grados_temp;
              		$i++;
            	}
    	    }
    	}
	}
	
	//Se valida el id para estudiatnes que no sean nuevos
	//echo $idest;
	if($idest < 0) {
	    $id = -1;
	}
	else {
	    $sqlcodigo = "SELECT *, ifnull(id, 0) id1 FROM entrevistas WHERE documento = '$documento'";
    	//echo $sqlcodigo;
    	$resultado_c = $mysqli1->query($sqlcodigo);
    	while($rowc = $resultado_c->fetch_assoc()) {
    	    $id = $rowc['id1'];
    	}
	}
	$id = (is_null($id)) ? 0 : $id;
	if($id == 0) {
	    $sqlcodigo1 = "SELECT *, ifnull(id, 0) id1 FROM tbl_pre_matricula WHERE documento_est = '$documento'";
    	//echo $sqlcodigo;
    	$resultado_c1 = $mysqli1->query($sqlcodigo1);
    	while($rowc1 = $resultado_c1->fetch_assoc()) {
    	    $id = $rowc1['id1'];
    	}
	}
	//echo $id;
	$id = (is_null($id)) ? 0 : $id;
	$datos->cod_ent = $id;
    
	$datos->grados = $grados;
	
	//Se valida si el codigo de pre-matricula corresponde al documento
	$ct_c1 = 0;
	$email_premat = "";
	$sql_c1 = "SELECT COUNT(1) ct, email_pre_mat 
	FROM tbl_cod_pre_matricula WHERE identificacion = $documento AND codigo = '$codigo' 
	GROUP BY email_pre_mat";
	//echo $sql_c1;
	
	$resultado_c1 = $mysqli1->query($sql_c1);
	while($rowc1 = $resultado_c1->fetch_assoc()) {
	    $ct_c1 = $rowc1['ct'];
	    $email_premat = $rowc1['email_pre_mat'];
	}
	//echo $ct_c1;
	if($ct_c1 > 0) {
	    $datos->cod_prematricula = "OK";
	}
	else {
	    $datos->cod_prematricula = "NO";
	}
	$datos->email_prematricula = $email_premat;
	
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
    /*$sql_eval = "SELECT COUNT(1) ct FROM estudiantes WHERE id >= 1155 AND n_documento = '$documento'";
    $res_eval = $mysqli1->query($sql_eval);
    while($row_eval = $res_eval->fetch_assoc()){
        $ct_eval = $row_eval['ct'];
    }
    if($ct_eval == 1) {
        $datos->req_eval = "SI";
    }
    else {
        $datos->req_eval = "NO";
    }*/
    //echo $ct_eval;
    $datos->req_eval = "SI";
    
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
        $sql_valf = "SELECT COUNT(1) ct 
        FROM tbl_pre_matricula pm, (SELECT * FROM tbl_validaciones WHERE documento_est = '$documento' AND '$fecha2' >= fecha_programacion) v 
        WHERE pm.documento_est = v.documento_est AND pm.documento_est = '$documento' AND pm.eval = 1";
        $res_valf = $mysqli1->query($sql_valf);
        //echo $sql_val;
        while($row_valf = $res_valf->fetch_assoc()){
            $ct_valf = $row_valf['ct'];
        }
        if($ct_valf == 1) {
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
    
	
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);
	
?>