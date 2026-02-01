<?php
	//Genera el select de los grados
	require("registro/docenteunicab/updreg/1cc3s4db.php");
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
	//header("Refresh: 30; URL='pen_gra_upddat.php'");
	set_time_limit(300);
	//https://unicab.org/registro_cupo_0.php?documento=9397454
	
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
	
	$tablae = "estudiantes";
	//$tablae = "estudiantes_n";
	$tablam = "matricula";
	//$tablam = "matriculas_n";
	
	//Se hace la consulta del mÃ¡ximo registro en matrículas
	$query0 = "SELECT IFNULL(max(m.idmatricula), 0) maxid FROM ".$tablae." e, ".$tablam." m WHERE e.id = m.id_estudiante AND e.n_documento = '$documento'";
	//$query0 = "SELECT IFNULL(max(m.id), 0) maxid FROM ".$tablae." e, ".$tablam." m WHERE e.id = m.id_estudiante AND e.n_documento = '$documento'";
	//echo $query0;
	$resultado0 = $mysqli1->query($query0);
	while($row0 = $resultado0->fetch_assoc()) {
	    $maxid = $row0['maxid'];
	}
	
	if($maxid == 0) {
	    $datos->estado = "nuevo";
	    //Se cargan los grados
	    $query_g = "SELECT * FROM grados";
	    $resultadog = $mysqli1->query($query_g);
    	while($rowg = $resultadog->fetch_assoc()) {
    	    $valores = [$rowg['id'],$rowg['grado']];
    	    $grados_temp = array_combine($keys,$valores);
      		$grados[$i] = $grados_temp;
      		$i++;
    	}
	}
	else {
	    $query1 = "SELECT m.estado, m.id_grado, e.nombres, e.apellidos, e.telefono_estudiante, e.acudiente_1, e.email_acudiente_1, e.direccion, e.telefono_acudiente_1, 
	    e.documento_responsable, td.id, td.tipo_documento 
	    FROM ".$tablae." e, ".$tablam." m, tbl_tipos_documento td 
	    WHERE e.id = m.id_estudiante AND e.tipo_documento = td.id AND e.n_documento = '$documento' AND m.idmatricula = $maxid";
	    //$query1 = "SELECT m.estado, m.id_grado FROM ".$tablae." e, ".$tablam." m WHERE e.id = m.id_estudiante AND e.n_documento = '$documento' AND m.id = $maxid";
	    //echo $query1;
        $resultado1 = $mysqli1->query($query1);
        while($row1 = $resultado1->fetch_assoc()) {
            $datos->nombres = $row1['nombres'];
            $datos->apellidos = $row1['apellidos'];
            $datos->tel = $row1['telefono_estudiante'];
            $datos->tdoc = $row1['tipo_documento'];
    	    $datos->estado = $row1['estado'];
    	    $datos->idgra_actual = $row1['id_grado'];
    	    $datos->acudiente = $row1['acudiente_1'];
    	    $datos->emailA = $row1['email_acudiente_1'];
    	    $datos->direccion = $row1['direccion'];
    	    $datos->telA = $row1['telefono_acudiente_1'];
    	    $datos->docA = $row1['documento_responsable'];
    	    
    	    if($row1['estado'] == "aprobado" || $row1['estado'] == "retirado") {
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
    	    else if($row1['estado'] == "activo") {
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
    	    else if($row1['estado'] == "reprobado") {
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
    	    //echo $query_g;
    	}
	}
	
	//Se consulta el cÃ³digo de entrevista para estudiatnes que no sean nuevos
	$sqlcodigo = "SELECT *, ifnull(id, 0) id1 FROM entrevistas WHERE documento = '$documento' OR documento = $documento";
	//echo $sqlcodigo;
	$resultado_c = $mysqli1->query($sqlcodigo);
	while($rowc = $resultado_c->fetch_assoc()) {
	    $id = $rowc['id1'];
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
	$id = (is_null($id)) ? 0 : $id;
	$datos->cod_ent = $id;
    
	$datos->grados = $grados;
	
	//Se valida si el codigo de pre-matricula corresponde al documento
	$ct_c1 = 0;
	$sql_c1 = "SELECT COUNT(1) ct, email_pre_mat 
	FROM tbl_cod_pre_matricula WHERE identificacion = $documento AND codigo = '$codigo' 
	GROUP BY email_pre_mat";
	//echo $sql_c1;
	
	$resultado_c1 = $mysqli1->query($sql_c1);
	while($rowc1 = $resultado_c1->fetch_assoc()) {
	    $ct_c1 = $rowc1['ct'];
	    $email_premat = $rowc1['email_pre_mat'];
	}
	if($ct_c1 > 0) {
	    $datos->cod_prematricula = "OK";
	}
	else {
	    $datos->cod_prematricula = "NO";
	}
	$datos->email_prematricula = $email_premat;
	
	//Se busca si debe presentar evaluaciÃ³n de validaci¨®n
	$sql_val_ct = "SELECT COUNT(1) ct FROM tbl_validaciones WHERE documento_est = '$documento' AND fecha_programacion like '%$fanio%'";
	//echo $sql_val_ct;
	$exe_val_ct= $mysqli1->query($sql_val_ct);
    while($row_val_ct = $exe_val_ct->fetch_assoc()) {
        $ct_val_ct = $row_val_ct['ct'];
    }
    //echo $ct_val_ct;
    if($ct_val_ct > 0) {
        $datos->eval_validacion = "SI";
        //Se busca el grado m¨¢ximo
        $sql_max_grado = "SELECT g.id, g.grado 
        FROM (SELECT MAX(id_grado) id_grado FROM tbl_validaciones WHERE documento_est = '$documento' AND fecha_programacion like '%$fanio%') v, grados g 
        WHERE v.id_grado = g.id";
        $exe_max_grado = $mysqli1->query($sql_max_grado);
        while($row_max_grado = $exe_max_grado->fetch_assoc()) {
            $max_idgrado = $row_max_grado['id'];
            $max_grado = $row_max_grado['grado'];
        }
        //echo $max_grado;
        $datos->idgra_validacion = $max_idgrado;
        $datos->gra_validacion = $max_grado;
        
    	$sql_eval_val = "SELECT COUNT(1) ct FROM tbl_validaciones WHERE documento_est = '$documento' AND resultado = 'APROBADO' 
    	AND id_grado = $max_idgrado";
    	//echo $sql_eval_val;
    	$exe_eval_val = $mysqli1->query($sql_eval_val);
        while($row_eval_val = $exe_eval_val->fetch_assoc()) {
            $ct_eval_val = $row_eval_val['ct'];
        }
        if($ct_eval_val == 1) {
            $datos->res_validacion = "APROBADO";
            //Se consulta el grado a matricular
           $sql_grado_ant = "SELECT * FROM grados WHERE id = $max_idgrado + 1";
           $exe_grado_ant = $mysqli1->query($sql_grado_ant);
            while($row_grado_ant = $exe_grado_ant->fetch_assoc()) {
                //$datos->idgra_validacion_ant = $row_grado_ant['id'];
                $datos->idgra_a_matricular = $row_grado_ant['id'];
                //$datos->gra_validacion_ant = $row_grado_ant['grado'];
                $datos->gra_a_matricular = $row_grado_ant['grado'];
            }
        }
        else {
           $datos->res_validacion = "NO APROBADO";
            $datos->idgra_a_matricular = $max_idgrado;
            $datos->gra_a_matricular = $max_grado;
        }
    }
	else {
	   $datos->eval_validacion = "NO";
	   $datos->idgra_validacion = "NA";
	   $datos->gra_validacion = "NA";
	   $datos->res_validacion = "NA";
	   $datos->idgra_a_matricular = "NA";
       $datos->gra_a_matricular = "NA";
	}
	
	$sql_cupo = "SELECT COUNT(1) ct FROM tbl_cupos WHERE n_documento = '$documento'";
	$exe_cupo = $mysqli1->query($sql_cupo);
    while($row_cupo = $exe_cupo->fetch_assoc()) {
        $datos->registro_cupo =$row_cupo['ct'];
    }
	
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);
	
?>