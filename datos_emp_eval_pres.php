<?php
	//Genera el select de los grados
	require("registro/docenteunicab/updreg/1cc3s4db.php");
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
	//header("Refresh: 30; URL='pen_gra_upddat.php'");
	set_time_limit(300);
	//https://unicab.org/datos_emp_eval_pres.php?documento=9397454
	
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
    
    $datos->estado = "EMP";
	
	$query1 = "SELECT e.*, g.id id_grado, g.grado  
    FROM tbl_empleados e, tbl_emp_eval_pres eep, grados g 
    WHERE e.n_documento = eep.n_documento AND eep.id_grado = g.id AND e.n_documento = '$documento'";
    $resultado1 = $mysqli1->query($query1);
    while($row1 = $resultado1->fetch_assoc()) {
        $idest = 0;
        $idgrado = $row1['id_grado'];
        $datos->nombres = $row1['nombres'];
        $datos->apellidos = $row1['apellidos'];
        $datos->tel = $row1['celular'];
        $datos->tdoc = "CEDULA";
	    $datos->id = $row1['id'];
	    $datos->acudiente = $row1['nombres']. " ".$row1['apellidos'];
	    $datos->emailA = $row1['email'];
	    //$datos->direccion = $row1['direccion'];
	    //$datos->telA = $row1['telefono_acudiente_1'];
	    //$datos->docA = $row1['documento_responsable'];
	    
	    //Se cargan los grados
	    $valores = [$row1['id_grado'],$row1['grado']];
	    $grados_temp = array_combine($keys,$valores);
  		$grados[$i] = $grados_temp;
  		$i++;
	}
	
	$datos->cod_ent = 0;
    
	$datos->grados = $grados;
	$datos->cod_prematricula = "NO";
	//$datos->email_prematricula = $email_premat;
	
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
    $datos->req_eval = "SI";
    
    $datos->req_validacion = "NO";
    $datos->fecha_validacion = "NO";
    
	
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);
	
?>