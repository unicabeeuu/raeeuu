<?php
	//Genera el select de los grados
	require("registro/docenteunicab/updreg/1cc3s4db.php");
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
	//header("Refresh: 30; URL='pen_gra_upddat.php'");
	set_time_limit(300);
	//https://unicab.org/cargar_datos_est_nuevo_getdat.php?documento=23543550
	
	$documento = $_REQUEST["documento"];
	
	$datos = new stdClass();
	$grados = array();
	$keys = ['id_gra','gra'];
	$i = 0;
	
	date_default_timezone_set('America/Bogota');
    $dia = date("d");
    $mes = date("m");
    $mesLetra = date("M");
    $fanio = date("Y");
	$fanio1 = date("Y");
    if($mes >= 11) {
        $fanio = $fanio + 1;
    }
	$fechaHoy = $fanio1."-".$mes."-".$dia;
	
	$tablae = "estudiantes";
	//$tablae = "estudiantes_n";
	$tablam = "matricula";
	//$tablam = "matriculas_n";
	
	$control_antiguos = 0;
	
	//Se hace la consulta del mÃ¡ximo registro en matrículas
	$query0 = "SELECT IFNULL(max(m.idmatricula), 0) maxid FROM ".$tablae." e, ".$tablam." m WHERE e.id = m.id_estudiante AND e.n_documento = '$documento'";
	//echo $query0;
	$resultado0 = $mysqli1->query($query0);
	while($row0 = $resultado0->fetch_assoc()) {
	    $maxid = $row0['maxid'];
	}
	
	if($maxid == 0) {
		$datos->nombres = "";
		$datos->apellidos = "";
		$datos->tel = "";
		$datos->idtdoc = "0";
		$datos->tdoc = "";
		$datos->estado = "nuevo";
		$datos->email = "";
		$datos->rh = "";
		$datos->extra = "";
		$datos->genero = "0";
		$datos->idmedio = "0";
		$datos->medio = "";
		$datos->situacion = "";
		$datos->grado = "";
			
	    //Se buscan datos iniciales... ¡si existen!
		//$query1 = "SELECT * FROM ".$tablae." e WHERE e.n_documento = '$documento'";
		$query1 = "SELECT pm.id_medio, m.medio, t.tipo_documento td_descripcion, e.* 
		FROM `estudiantes` e, tbl_pre_matricula pm, tbl_medios_llegada m, tbl_tipos_documento t 
		WHERE e.n_documento = pm.documento_est AND pm.id_medio = m.id AND e.tipo_documento = t.id
		AND e.n_documento = '$documento' AND pm.año = 2025 AND e.a_matricula = 2025";
	    //echo $query1;
        $resultado1 = $mysqli1->query($query1);
		while($row1 = $resultado1->fetch_assoc()) {
			$datos->nombres = $row1['nombres'];
			$datos->apellidos = $row1['apellidos'];
			$datos->tel = $row1['telefono_estudiante'];
			$datos->idtdoc = $row1['tipo_documento'];
			$datos->tdoc = $row1['td_descripcion'];
			$datos->email = $row1['email_institucional'] == "NA" ? "" : $row1['email_institucional'];
			$datos->extra = $row1['actividad_extra'];
			$datos->genero = $row1['genero'];
			$datos->idmedio = $row1['id_medio'];
			$datos->medio = $row1['medio'];
		
            $datos->acudiente = $row1['acudiente_1'];
    	    $datos->emailA = $row1['email_acudiente_1'];
    	    $datos->telA = $row1['telefono_acudiente_1'];
    	    $datos->ciudadA = $row1['ciudad'];
    	}
		
		$datos->direccion = "";
		$datos->docA = "";
		
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
		//ANTIGUO
		//Se valida que sea antiguo del presente año para matriculas ordinarias o del año anterior para matrículas extraordinarias
		$sql_val_estado = "SELECT *, (YEAR(NOW()) - YEAR(fecha_ingreso)) diferencia, YEAR(now()) actual FROM ".$tablam." WHERE idMatricula = $maxid";
		$res_val_estado = $mysqli1->query($sql_val_estado);
        while($row_val_estado = $res_val_estado->fetch_assoc()) {
			$estado_val = $row_val_estado['estado'];
			$diferencia_val = $row_val_estado['diferencia'];
			$actual_val = $row_val_estado['actual'];
		}
		
		if ($estado_val != 'activo' && $diferencia_val == 0 && $actual_val = 2023) {
			$control_antiguos = 1;
		}
		else if ($estado_val != 'activo' && $diferencia_val == 1 && $actual_val = 2024) {
			$control_antiguos = 1;
		}
		else {
			$datos->estado = "nuevo";
			$datos->rh = "NA";
			
			//Se vuelve a validar el máximo registro en matrículas para verificar si ya inicio proceso para el año actual
			$query0 = "SELECT IFNULL(max(m.idmatricula), 0) maxid FROM ".$tablae." e, ".$tablam." m 
			WHERE e.id = m.id_estudiante AND e.n_documento = '$documento' AND m.n_matricula LIKE '%$fanio%'";
			//echo $query0;
			$resultado0 = $mysqli1->query($query0);
			while($row0 = $resultado0->fetch_assoc()) {
				$maxid = $row0['maxid'];
			}
			
			//Se buscan datos iniciales... ¡si existen!
			if($maxid > 0) {//antiguo con mayor a un año considerado nuevo
				$query1 = "SELECT m.estado, m.id_grado, e.nombres, e.apellidos, e.telefono_estudiante, e.email_institucional, e.estado rh, 
				e.acudiente_1, e.email_acudiente_1, e.direccion, e.telefono_acudiente_1, 
				e.documento_responsable, td.id, td.tipo_documento, e.ciudad, e.actividad_extra, e.genero, IFNULL(e.situacion_se, '') situacion_se 
				FROM ".$tablae." e, ".$tablam." m, tbl_tipos_documento td 
				WHERE e.id = m.id_estudiante AND e.tipo_documento = td.id AND e.n_documento = '$documento' AND m.idmatricula = $maxid";
				//$query1 = "SELECT m.estado, m.id_grado FROM ".$tablae." e, ".$tablam." m WHERE e.id = m.id_estudiante AND e.n_documento = '$documento' AND m.id = $maxid";
				//echo $query1;
				$resultado1 = $mysqli1->query($query1);
				while($row1 = $resultado1->fetch_assoc()) {
					$datos->nombres = $row1['nombres'];
					$datos->apellidos = $row1['apellidos'];
					$datos->tel = $row1['telefono_estudiante'];
					$datos->idtdoc = $row1['id'];
					$datos->tdoc = $row1['tipo_documento'];
					$datos->estado = $row1['estado'];
					$datos->email = $row1['email_institucional'];
					$rh = str_replace("+", "mas", $row1['rh']);
					$rh = str_replace("-", "menos", $rh);
					$datos->rh = $rh;
					$datos->extra = $row1['actividad_extra'];
					$datos->genero = $row1['genero'];
					$datos->situacion = $row1['situacion_se'];
					$idgrado = $row1['id_grado'];
					$datos->acudiente = $row1['acudiente_1'];
					$datos->emailA = $row1['email_acudiente_1'];
					$datos->direccion = $row1['direccion'];
					$datos->telA = $row1['telefono_acudiente_1'];
					$datos->docA = $row1['documento_responsable'];
					$datos->ciudadA = $row1['ciudad'];
				}
				
				//Se cargan los grados
				$query_g = "SELECT * FROM grados WHERE id = $idgrado";
				$resultadog = $mysqli1->query($query_g);
				while($rowg = $resultadog->fetch_assoc()) {
					$valores = [$rowg['id'],$rowg['grado']];
					$grados_temp = array_combine($keys,$valores);
					$grados[$i] = $grados_temp;
					$i++;
				}			
				
				//Se busca el medio de llegada 
				$sql_medio = "SELECT pm.*, m.medio 
				FROM tbl_pre_matricula pm, tbl_medios_llegada m 
				WHERE pm.id_medio = m.id AND pm.documento_est = '$documento' order by id desc limit 1;";
				$exe_medio = $mysqli1->query($sql_medio);
				while($row_medio = $exe_medio->fetch_assoc()) {
					$medio = $row_medio['medio'];
					$datos->medio = $row_medio['medio'];
					$datos->idmedio = $row_medio['id_medio'];
				}
				
				if ($medio == "") {
					$datos->medio = "";
					$datos->idmedio = "";
				}
			}
			else {
				//Se cargan los grados
				$query_g = "SELECT * FROM grados WHERE id < 19";
				$resultadog = $mysqli1->query($query_g);
				while($rowg = $resultadog->fetch_assoc()) {
					$valores = [$rowg['id'],$rowg['grado']];
					$grados_temp = array_combine($keys,$valores);
					$grados[$i] = $grados_temp;
					$i++;
				}
			
			
				$query1 = "SELECT e.acudiente_1, e.email_acudiente_1, e.ciudad, e.telefono_acudiente_1 
				FROM ".$tablae." e 
				WHERE e.n_documento = '$documento'";
				//echo $query1;
				$resultado1 = $mysqli1->query($query1);
				while($row1 = $resultado1->fetch_assoc()) {
					$datos->nombres = "";
					$datos->apellidos = "";
					$datos->tel = "";
					$datos->idtdoc = "0";
					$datos->tdoc = "";
					$datos->email = "";
					$datos->rh = "";
					$datos->extra = "";
					$datos->genero = "0";
					$datos->idmedio = "0";
					$datos->medio = "";
					$datos->situacion = "";
					$datos->grado = "";
					
					$datos->acudiente = $row1['acudiente_1'];
					$datos->emailA = $row1['email_acudiente_1'];
					$datos->direccion = "";
					$datos->telA = $row1['telefono_acudiente_1'];
					$datos->docA = "";
					$datos->ciudadA = $row1['ciudad'];
				}
			}			
			
		}
		
		if ($control_antiguos == 1) {
			$query1 = "SELECT m.estado, m.id_grado, e.nombres, e.apellidos, e.telefono_estudiante, e.email_institucional, e.estado rh, 
			e.acudiente_1, e.email_acudiente_1, e.direccion, e.telefono_acudiente_1, 
			e.documento_responsable, td.id, td.tipo_documento, e.ciudad, e.actividad_extra, e.genero, IFNULL(e.situacion_se, '') situacion_se 
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
				$datos->email = $row1['email_institucional'];
				$rh = str_replace("+", "mas", $row1['rh']);
				$rh = str_replace("-", "menos", $rh);
				$datos->rh = $rh;
				$datos->extra = $row1['actividad_extra'];
				$datos->genero = $row1['genero'];
				$datos->situacion = $row1['situacion_se'];
				$datos->acudiente = $row1['acudiente_1'];
				$datos->emailA = $row1['email_acudiente_1'];
				$datos->direccion = $row1['direccion'];
				$datos->telA = $row1['telefono_acudiente_1'];
				$datos->docA = $row1['documento_responsable'];
				$datos->ciudadA = $row1['ciudad'];
				
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
				//echo $query_g;
			}
		}
	    
	}
	
	$datos->grados = $grados;
	
	//Se busca si debe presentar evaluación de validación
	$sql_val_ct = "SELECT COUNT(1) ct FROM tbl_validaciones WHERE documento_est = '$documento' AND año = '$fanio'";
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
	
	//Se consulta el rango de matrícula ordinaria
	$sql_matricula = "SELECT f1, f2 FROM tbl_parametros WHERE parametro = 'mat_ordinarias'";
	$exe_matricula = $mysqli1->query($sql_matricula);
	while($row_matricula = $exe_matricula->fetch_assoc()) {
		$f1 = $row_matricula['f1'];
		$f2 = $row_matricula['f2'];
	}
	$datos->mat_ordinaria_desde = $f1;
	$datos->mat_ordinaria_hasta = $f2;
	
	if($fechaHoy >= $f1 && $fechaHoy <= $f2) {
		$datos->mat_ordinaria = "SI";
	}
	else {				
		if($fechaHoy < $f1) {
			$datos->mat_ordinaria = "AUN NO";
		}
		else {
			$datos->mat_ordinaria = "NO";
		}
	}
	
	//Se consulta el rango de matrícula extra ordinaria
	$sql_matricula_extra = "SELECT f1, f2 FROM tbl_parametros WHERE parametro = 'mat_extraordinarias'";
	$exe_matricula_extra = $mysqli1->query($sql_matricula_extra);
	while($row_matricula_extra = $exe_matricula_extra->fetch_assoc()) {
		$f1e = $row_matricula_extra['f1'];
		$f2e = $row_matricula_extra['f2'];
	}
	$datos->mat_extraordinaria_desde = $f1e;
	$datos->mat_extraordinaria_hasta = $f2e;
	
	if($fechaHoy >= $f1e && $fechaHoy <= $f2e) {
		$datos->mat_extraordinaria = "SI";
	}
	else {				
		if($fechaHoy < $f1e) {
			$datos->mat_extraordinaria = "AUN NO";
		}
		else {
			$datos->mat_extraordinaria = "NO";
		}
	}
	
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);
	
?>