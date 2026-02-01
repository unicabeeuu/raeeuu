<?php
    include "admin-unicab/php/conexion.php";
    require("registro/docenteunicab/updreg/1cc3s4db.php");
    header("Cache-Control: no-store");
	
    require 'PhpSpreadsheet/vendor/autoload.php';
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use \PhpOffice\PhpSpreadsheet\IOFactory;
    
    $apellidos = $_REQUEST['register_apellidos'];
    $nombres = $_REQUEST['register_nombres'];
    $idgra = $_REQUEST['register_grado'];
    $tdoc = $_REQUEST['register_tipo_documento'];
    $td_text = $_REQUEST['td_text'];
    $cel = $_REQUEST['register_telefono'];
    $email = $_REQUEST['register_email'];
    $rh = $_REQUEST['register_rh'];
	$medio = $_REQUEST['register_medio'];
    $extra = $_REQUEST['activiadad_extra'];
	$situacion = $_REQUEST['situacion'];
    
	$documento = $_REQUEST['register_documento'];
    
    $nombre_completo = $apellidos." ".$nombres;
    
    $nombreA = $_REQUEST['register_nombreA'];
    $documentoA = $_REQUEST['register_documentoA'];
    $dirA = $_REQUEST['register_direccionA'];
    $celA = $_REQUEST['register_celularA'];
    $emailA = $_REQUEST['register_correoA'];
	$parentesco1 = $_REQUEST['parentesco_acudiente_1'];
    
    //Se busca el id del est
    if($estnuevo == "NO") {
        $sql_id = "SELECT * FROM estudiantes WHERE n_documento = '$documento'";
        echo $sql_id;
        $res_id = $mysqli1->query($sql_id);
        while($row_id = $res_id->fetch_assoc()){
            $idest = $row_id['id'];
            $td = $row_id['tipo_documento'];
			$fn = $row_id['fecha_nacimiento'];
			$genero = strtoupper($row_id['genero']);
			$aextra = $row_id['actividad_extra'];
			$nombre1 = $row_id['acudiente_1'];
			$email1 = $row_id['email_acudiente_1'];
			$tel1 = $row_id['telefono_acudiente_1'];
			//$parentesco1 = $row_id['parentesco_acudiente_1'];
			$nombre2 = $row_id['acudiente_2'];
			$email2 = $row_id['email_acudiente_2'];
			$tel2 = $row_id['telefono_acudiente_2'];
			$parentesco2 = $row_id['parentesco_acudiente_2'];
        }
    }
    //echo $idest;
	if(is_null($fn)) {
		//No hace nada
	}
	else {
		$partesfn = explode("-", $fn);
	}
	
	//Se busca el grado
	$sql_grado = "SELECT grado FROM grados WHERE id = $idgra";
	$res_grado = $mysqli1->query($sql_grado);
	while($row_grado = $res_grado->fetch_assoc()){
		$grado = $row_grado['grado'];
	}
    
    date_default_timezone_set('America/Bogota');
    $dia = date("d");
    $mes = date("m");
    $mesLetra = date("M");
    $fanio = date("Y");
    $fanio1 = date("Y");
    $espaniol = "";
    //echo $fanio;
    $fecha2 = $fanio."/".$mes."/".$dia;
	$fecha2_yyyymmdd = $fanio.$mes.$dia;
	$controlfinaño = "NO";
    
    if($mes >= 11) {
	    $fanio++;
		$controlfinaño = "OK";
	}
    
    $fecha3 = $fanio."/".$mes."/".$dia;
    $fecha_cbpp = date("Ymd");
    if($mes == "02") {
        $diapp = 28;
    }
    else {
        $diapp = 30;
    }
    $fecha1_cbpp = $fanio.$mes.$diapp;
    $fecha2_cbpp = date("Ymd",strtotime($fecha1_cbpp."+ 30 days"));
	//echo $fecha2;
	
	switch ($mes) {
    	case '1':
    		$espaniol="Enero"; 
    		break;
    	case '2':
    		$espaniol="Febrero";
    		break;
    	case '3':
    		$espaniol="Marzo";
    		break;
    	case '4':
    		$espaniol="Abril";
    		break;
    	case '5':
    		$espaniol="Mayo";
    		break;
    	case '6':
    		$espaniol="Junio";
    		break;
    	case '7':
    		$espaniol="Julio";
    		break;
    	case '8':
    		$espaniol="Agosto";
    		break;
    	case '9':
    		$espaniol="Septiembre";
    		break;
    	case '10':
    		$espaniol="Octubre";
    		break;
    	case '11':
    		$espaniol="Noviembre";
    		break;
    	case '12':
    		$espaniol="Diciembre";
    		break;
    }
    
    $codigo = "";
	$sa1 = ["q","a","1","z","x","2","s","w","3","p","l","4","m","k","5","o","e","6",
            "d","c","7","i","j","8","n","r","9","f","v","0","u","h","b","t","g"];
	$meses = ["", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
	
	for($i = 1; $i <=10; $i++) {
		$ale=mt_rand(1,sizeof($sa1));
		$codigo = $codigo.$sa1[$ale-1];
	}
	//$codigo = "VER_".$codigo;
	//echo $codigo;
	
	//Se valida si el documento ya tiene código de pre-matrícula para el año lectivo
	$ct_pre = 0;
	$sql = "SELECT COUNT(1) ct, codigo FROM tbl_cod_pre_matricula WHERE identificacion = $documento AND periodo_lectivo = $fanio 
	GROUP BY codigo";
	//echo $sql;
	
	$res_sql=$mysqli1->query($sql);
    while($row_sql = $res_sql->fetch_assoc()){
        $ct_pre = $row_sql['ct'];
        $codigo = $row_sql['codigo'];
    }
    //echo "<br>".$codigo;
    //echo $ct_pre;
    if($ct_pre == 0) {
        $sql_insert0 = "INSERT INTO tbl_cod_pre_matricula (identificacion, periodo_lectivo, codigo, email_pre_mat) VALUES 
        ($documento, $fanio, '$codigo', '$email')";
        //echo $sql_insert0;
        $res_insert0=$mysqli1->query($sql_insert0);
    }
    
    
    //**************************************************************************************************************
    //Se actualizan las tablas de estudiantes con los pagos y matrículas
    
    //Se valida la fecha actual con respecto a los cierres de periodo para el periodo de ingreso
    /*$per = "1";
	if(date($fecha2) >= date('2022/11/20') && date($fecha2) < date('2023/04/07')) {
	    $per = "1";
		$comienzocontrato = "2023/02/01";
	}
	else if(date($fecha2) >= date('2023/04/08') && date($fecha2) < date('2023/06/30')) {
	    $per = "2";
		$comienzocontrato = "2023/04/08";
	}
	else if(date($fecha2) >= date('2023/07/01') && date($fecha2) < date('2023/09/08')) {
	    $per = "3";
		$comienzocontrato = "2023/07/01";
	}
	else if(date($fecha2) >= date('2023/09/09')) {
	    $per = "4";
		$comienzocontrato = "2023/09/09";
	}*/
	if($per == 1) {
		$comienzocontrato = "2024/02/05";
	}
	else if($per == 2) {
		$comienzocontrato = "2024/04/13";
	}
	else if($per == 3) {
		$comienzocontrato = "2024/06/08";
	}
	else {
		$comienzocontrato = "2024/08/31";
	}
	$fincontrato = "2024/11/18";
	echo "<br> per=".$per;
	//beca = 0 -> sin beca; = 1 media beca; = 2 beca completa
	//pension_a -> es la nueva pensión de promoción anticipada
	$beca = 0;
    $descuento = 0;
    $ct_pagos = 0;
        
	$sql_beca = "SELECT * FROM tbl_becas WHERE identificacion = $documento AND periodo_lectivo = 2024";
	$res_beca=$mysqli1->query($sql_beca);
    while($row_beca = $res_beca->fetch_assoc()){
        $beca = $row_beca['beca'];
        $descuento = $row_beca['descuento'];
        $ct_pagos = $row_beca['ct_pagos'];
    }
    
    $sql_costos = "SELECT * FROM tbl_costos_unicab WHERE a = $fanio AND id_grado = $idgra";
    //echo $sql_costos;
	$res_costos=$mysqli1->query($sql_costos);
    while($row_costos = $res_costos->fetch_assoc()){
        $matricula = $row_costos['matricula'];
        $pension = $row_costos['pension'];
        $ocp = $row_costos['ocp'];
        $poliza = $row_costos['poliza'];
        $dg = $row_costos['dg'];
        $pp = $row_costos['pp'];
    }
    
    if($idgra > 16) {
        if($per == 2) {
            $pagos_anuales_de = 2.5;
			$pagos_anuales_de_letra = $pagos_anuales_de." (Dos punto cinco)";
			$fincontrato = "2024/06/30";
        }
		else if($per == 4) {
            $pagos_anuales_de = 2.5;
			$pagos_anuales_de_letra = $pagos_anuales_de." (Dos punto cinco)";
			$fincontrato = "2024/11/18";
        }
        else {
            $pagos_anuales_de = 5;
			$pagos_anuales_de_letra = $pagos_anuales_de." (Cinco)";
			if($per == 1) {
				$fincontrato = "2024/06/30";
			}
			else if($per == 3) {
				$fincontrato = "2024/11/18";
			}
        }
    }
    else {
        if($per == 2) {
            $pagos_anuales_de = 7.5;
			$pagos_anuales_de_letra = $pagos_anuales_de." (Siete punto cinco)";
        }
        else if($per == 3) {
            $pagos_anuales_de = 5;
			$pagos_anuales_de_letra = $pagos_anuales_de." (Cinco)";
        }
        else {
            $pagos_anuales_de = 10;
			$pagos_anuales_de_letra = $pagos_anuales_de." (Diez)";
        }
    }
    $total_anual_de = $pension * $pagos_anuales_de;
    $descuento1 = $descuento/100 * $pension;
    $total_anual_sd = ($pension - $descuento1) * $pagos_anuales_de;
    if($beca == 1) {
        $beca1 = $pension/2;
    }
    else if($beca == 2) {
        $beca1 = $pension;
    }
    else {
        $beca1 = 0;
    }
    $total_anual_sb = ($pension - $beca1) * $pagos_anuales_de;
    $pension_final = $total_anual_sb / $pagos_anuales_de;
    
    if($estnuevo == "NO") {
        /*$sql_updins_est = "UPDATE estudiantes SET periodo_ing = $per, descuento = $descuento, beca = $beca, acuerdo_ct_pagos = $ct_pagos, pension_de = $pension, 
        pension_a = 0, pagos_anuales_de = $pagos_anuales_de, pagos_anuales_a = 0, pagos_anuales_f = $pagos_anuales_de, tot_anual_de = $total_anual_de, 
        descuento1 = $descuento1, tot_anual_sd = $total_anual_sd, beca1 = $beca1, tot_anual_sb = $total_anual_sb, pension_final = $pension_final 
        WHERE n_documento = '$documento'";*/
        $sql_updins_est = "UPDATE estudiantes SET periodo_ing = $per, descuento = $descuento, beca = $beca, acuerdo_ct_pagos = $ct_pagos, pension_de = $pension, 
        pension_a = 0, pagos_anuales_de = $pagos_anuales_de, pagos_anuales_a = 0, pagos_anuales_f = $pagos_anuales_de, tot_anual_de = $total_anual_de, 
        descuento1 = $descuento1, tot_anual_sd = $total_anual_sd, beca1 = $beca1, tot_anual_sb = $total_anual_sb, pension_final = $pension_final, 
        telefono_estudiante = $cel, tipo_documento = $tdoc, 
        email_acudiente_1 = '$emailA', acudiente_1 = '$nombre_completoA', telefono_acudiente_1 = '$celA', documento_responsable = '$documentoA', 
        estado = '$rh', parentesco_acudiente_1 = '$parentesco1' 
        WHERE n_documento = '$documento'";
    }
    else if($estnuevo == "SI") {
        $sql_updins_est = "INSERT INTO estudiantes 
        (apellidos, nombres, genero, tipo_documento, n_documento, fecha_nacimiento, expedicion, ciudad, direccion, direccion_estudiante, telefono_estudiante, email_institucional, 
        actividad_extra, email_acudiente_1, email_acudiente_2, acudiente_1, acudiente_2, telefono_acudiente_1, telefono_acudiente_2, estado, password, mensaje, fecha_datos, 
        documento_responsable, periodo_ing, descuento, beca, acuerdo_ct_pagos, pension_de, pension_a, pagos_anuales_de, pagos_anuales_a, pagos_anuales_f, tot_anual_de, 
        descuento1, tot_anual_sd, beca1, tot_anual_sb, pension_final, parentesco_acudiente_1) 
        VALUES 
        ('$apellidos', '$nombres', 'NA', '$tdoc', '$documento', '1900/01/01', 'NA', 'NA', '$dirA', 'NA', '$cel', 'NA', 
        'NA', '$emailA', 'NA', '$nombre_completoA', 'NA', '$celA', 'NA', '$rh', 'NA', 'NA', '$fecha2', 
        '$documentoA', $per, $descuento, $beca, $ct_pagos, $pension, 0, $pagos_anuales_de, 0, $pagos_anuales_de, $total_anual_de, 
        $descuento1, $total_anual_sd, $beca1, $total_anual_sb, $pension_final, '$parentesco1')";
		
		//Se hace el insert en la tabla tbl_pre_matricula
    }
    echo "<br>".$sql_updins_est;
    $res_updinst_est = $mysqli1->query($sql_updins_est);
    
    //se arma el n_matricula
    $sql_maxa = "SELECT MAX(DATE_FORMAT(fecha_ingreso, '%Y')) a FROM matricula";
    $exe_maxa = mysqli_query($conexion,$sql_maxa);
    while ($rowa = mysqli_fetch_array($exe_maxa)) {
        $maxa = $rowa['a'];
    }
    //echo "<br/>".$a;
    //echo "<br/>".$maxa;
    if($fanio == $maxa) {
        $sql_mat = "SELECT MAX(idMatricula) maxid FROM matricula WHERE date_format(fecha_ingreso, '%Y') = $fanio OR fecha_ingreso >= '2023-11-01'";
        //echo "<br/>".$sql_mat;
        $exe_mat = mysqli_query($conexion,$sql_mat);
        while ($rowm = mysqli_fetch_array($exe_mat)) {
            $consecutivo = $rowm['maxid'];
            $consecutivo1 = $consecutivo + 1;
        }
    }
    else {
        $consecutivo = 1;
        $consecutivo1 = 1;
    }
    //echo "<br/>".$consecutivo;
    
    //Se captura el n_matricula del maxid
    //$sql_n_matric = "SELECT n_matricula FROM matricula WHERE idMatricula = $consecutivo";
    $sql_n_matric = "SELECT n_matricula FROM matricula 
    WHERE idMatricula = (SELECT MAX(idMatricula) maxid FROM matricula WHERE date_format(fecha_ingreso, '%Y') = $fanio OR fecha_ingreso >= '2023-11-01')";
    $exe_n_matric = $mysqli1->query($sql_n_matric);
    while($row_n_matric = $exe_n_matric->fetch_assoc()) {
        $n_matric = $row_n_matric['n_matricula'];
    }
    $consec_n_matric = explode("-", $n_matric);
    $consec_n_matric0 = $consec_n_matric[0];
    $consec_n_matric1 = $consec_n_matric0 + 1;
    
    //$n_matricula = $consecutivo."-".$fanio."-".$idgra."G";
    //$n_matricula1 = $consecutivo1."-".$fanio."-".$idgra."G";
    $n_matricula = $consec_n_matric1."-".$fanio."-".$idgra."G";
    //echo "<br>".$n_matricula;
    //echo "<br>".$n_matricula1;
    
    //Se captura el id del estudiante
	$sqlid = "SELECT id FROM estudiantes WHERE n_documento = '$documento'";
	$exe_id = mysqli_query($conexion,$sqlid);
    while ($rowid = mysqli_fetch_array($exe_id)) {
        $idest = $rowid['id'];
    }
	//echo $idest;
	
	//Se hace el insert en la tabla de matrículas
	if($idest > 0) {
	    //Se valida si ya existe un registro en estado pre_solicitud
	    $ct_matric = 0;
	    $sql_valm = "SELECT COUNT(1) ct FROM matricula 
		WHERE id_estudiante = $idest AND estado = 'pre_solicitud' AND (date_format(fecha_ingreso, '%Y') = $fanio OR fecha_ingreso >= '2022-11-01')";
	    $msg_estudiante = "EstudianteOK";
	    $exe_valm = mysqli_query($conexion,$sql_valm);
        while ($row_valm = mysqli_fetch_array($exe_valm)) {
            $ct_matric = $row_valm['ct'];
        }
        //echo $ct_matric;
        if($ct_matric == 0) {
            if($mes >= 11) {
        	    $sql_insert1 = "INSERT INTO matricula (n_matricula, fecha_ingreso, estado, id_estudiante, id_grado, EstadoGrado) VALUES ('$n_matricula', '$fecha3', 'pre_solicitud', $idest, $idgra, 'NA')";
        	}
        	else {
        	    $sql_insert1 = "INSERT INTO matricula (n_matricula, fecha_ingreso, estado, id_estudiante, id_grado, EstadoGrado) VALUES ('$n_matricula', '$fecha2', 'pre_solicitud', $idest, $idgra, 'NA')";
        	}
            
            //echo "<br/>".$sql_insert1;
            $exe_insert1 = mysqli_query($conexion,$sql_insert1);
        }
	}
	
    //************FIN ACTUALIZACION TABLAS ESTUDIANTES Y MATRICULA **************************************************************
    
    $sql_insert2 = str_replace(" ", "_", $sql_insert1);
    echo "<br/>".$sql_insert2;
    
    // ###################### INICIO CONTRATO ###################
	try {
		$inputFileName = 'registro/adminunicab/php/contratos/formato_contrato.xlsx';
		$spreadsheet = IOFactory::load($inputFileName);
		$spreadsheet->setActiveSheetIndex(0); //opcional
		$sheet = $spreadsheet->getActiveSheet();
		
		$sheet->setCellValue('R9', $dia);
		$sheet->setCellValue('S9', $mes);
		$sheet->setCellValue('T9', $fanio1);
		if($estnuevo == "SI") {
			$sheet->setCellValue('I13', "X");
		}
		else {
			$sheet->setCellValue('U13', "X");
		}
		if($idgra < 7) {
			$sheet->setCellValue('L14', "X");
		}
		else if($idgra < 10) {
			$sheet->setCellValue('Q14', "X");
		}
		else {
			$sheet->setCellValue('U14', "X");
		}
		if($idgra < 13) {
			$sheet->setCellValue('H15', $grado);
		}
		else {
			$sheet->setCellValue('P15', $grado);
		}
		$sheet->setCellValue('R17', $n_matricula);
		$sheet->setCellValue('C19', $nombres." ".$apellidos);
		if($td == 1) {
			$sheet->setCellValue('C22', "X");
		}
		else if($td == 3) {
			$sheet->setCellValue('D22', "X");
		}
		else if($td == 4) {
			$sheet->setCellValue('E22', "X");
		}
		$sheet->setCellValue('F22', $documento);
		if(is_null($fn)) {
			//No hace nada
		}
		else {
			$sheet->setCellValue('O22', $partesfn[2]);
			$sheet->setCellValue('P22', $partesfn[1]);
			$sheet->setCellValue('R22', $partesfn[0]);
		}
		if($genero == "MASCULINO") {
			$sheet->setCellValue('T22', "M");
		}
		else if($genero == "FEMENINO") {
			$sheet->setCellValue('T22', "F");
		}
		
		//Se consulta el último grado aprobado
		$sql_ultgrado = "SELECT grado FROM grados WHERE id = ($idgra - 1)";
		$exe_ultgrado = mysqli_query($conexion,$sql_ultgrado);
		while ($row_ultgrado = mysqli_fetch_array($exe_ultgrado)) {
			$ultgrado = $row_ultgrado['grado'];
		}
		echo "<br/>".$sql_ultgrado;
		$sheet->setCellValue('R24', $ultgrado);
		
		//Se calcula la edad
		echo "<br/>fn ".$fn;
		echo "<br/>a ".$partesfn[0]." m ".$partesfn[1]." d ".$partesfn[2];
		$difa = $fanio1 - $partesfn[0];
		$difm = $mes - $partesfn[1];
		$difd = $dia - $partesfn[2];
		echo "<br/>difa ".$difa." difm ".$difm." difd ".$difd;
		if($difm <= 0 && $difd < 0) {
			$difa--;
		}
		$sheet->setCellValue('K26', $difa);
		
		$sheet->setCellValue('C27', $cel);
		$sheet->setCellValue('M27', $email);
		$sheet->setCellValue('C28', $aextra);
		
		//Inicio Datos Acudiente
		$sheet->setCellValue('C34', $nombre_completoA);
		$sheet->setCellValue('C36', $documentoA);
		$sheet->setCellValue('I37', $dirA);
		$sheet->setCellValue('C39', $celA);
		$sheet->setCellValue('K39', $emailA);
		//Fin Datos Acudiente
		
		//Inicio Datos Padre
		if($parentesco1 == "PADRE") {
			$sheet->setCellValue('C41', $nombre_completoA);
			$sheet->setCellValue('C43', $documentoA);
			$sheet->setCellValue('I44', $dirA);
			$sheet->setCellValue('C46', $celA);
			$sheet->setCellValue('K46', $emailA);
		}
		else if($parentesco2 == "PADRE") {
			$sheet->setCellValue('C41', $nombre2);
			//$sheet->setCellValue('C43', $documentoA);
			//$sheet->setCellValue('I44', $dirA);
			$sheet->setCellValue('C46', $tel2);
			$sheet->setCellValue('K46', $email2);
		}
		//Fin Datos Padre
		
		//Inicio Datos Madre
		if($parentesco1 == "MADRE") {
			$sheet->setCellValue('C48', $nombre_completoA);
			$sheet->setCellValue('C50', $documentoA);
			$sheet->setCellValue('I51', $dirA);
			$sheet->setCellValue('C53', $celA);
			$sheet->setCellValue('K53', $emailA);
		}
		else if($parentesco2 == "MADRE") {
			$sheet->setCellValue('C48', $nombre2);
			//$sheet->setCellValue('C50', $documentoA);
			//$sheet->setCellValue('I51', $dirA);
			$sheet->setCellValue('C53', $tel2);
			$sheet->setCellValue('K53', $email2);
		}
		//Fin Datos Madre
		
		$sheet->setCellValue('H75', $nombre_completo);
		$sheet->setCellValue('F76', $nombre_completoA);
		$sheet->setCellValue('L76', $nombre2);
		
		$partescomienzocontrato = explode("/", $comienzocontrato);
		$partesfincontrato = explode("/", $fincontrato);
		
		/*$sheet->setCellValue('K108', $dia);
		$sheet->setCellValue('M108', $espaniol);
		$sheet->setCellValue('P108', $fanio1);
		$sheet->setCellValue('S108', "17");
		$sheet->setCellValue('B109', "Noviembre");
		$sheet->setCellValue('D109', $fanio);*/
		$sheet->setCellValue('K108', $partescomienzocontrato[2]);
		$sheet->setCellValue('M108', $meses[intval($partescomienzocontrato[1])]);
		$sheet->setCellValue('P108', $partescomienzocontrato[0]);
		$sheet->setCellValue('S108', $partesfincontrato[2]);
		$sheet->setCellValue('B109', $meses[intval($partesfincontrato[1])]);
		$sheet->setCellValue('D109', $partesfincontrato[0]);
		
		$sheet->setCellValue('G115', $pagos_anuales_de_letra);
		$sheet->setCellValue('F126', $pagos_anuales_de_letra);
		
		if($controlfinaño == "OK") {
			$sheet->setCellValue('H189', "1 día(s)");
			$sheet->setCellValue('K189', "Febrero");
			$sheet->setCellValue('P189', "2023");
		}
		else if($fecha2_yyyymmdd >= "20230101" && $fecha2_yyyymmdd < "20230201") {
			$sheet->setCellValue('H189', "1 día(s)");
			$sheet->setCellValue('K189', "Febrero");
			$sheet->setCellValue('P189', "2023");
		}
		else {
			$sheet->setCellValue('H189', $dia." día(s)");
			$sheet->setCellValue('K189', $espaniol);
			$sheet->setCellValue('P189', $fanio1);
		}

		$sheet->setCellValue('G194', "Nombre: ".$nombre_completoA);	
		$sheet->setCellValue('K194', "Nombre: ".$nombre_completo);
		$sheet->setCellValue('H195', $documentoA);	
		$sheet->setCellValue('M195', $documento);		
		
		$sheet->setCellValue('J207', $n_matricula);
		$sheet->setCellValue('R207', $dia);
		$sheet->setCellValue('S207', $mes);
		$sheet->setCellValue('T207', $fanio1);
		$sheet->setCellValue('D209', $n_matricula);
		if($mes >= 11) {
			$sheet->setCellValue('K209', $fecha3);
		}
		else {
			$sheet->setCellValue('K209', $fecha2);
		}	
		$sheet->setCellValue('P212', $pagos_anuales_de_letra);
		
		$sheet->setCellValue('C214', $nombre_completoA);
		$sheet->setCellValue('C216', $documentoA);
		$sheet->setCellValue('I217', $dirA);
		$sheet->setCellValue('C219', $celA);
		$sheet->setCellValue('K219', $emailA);
		$sheet->setCellValue('C220', $nombre_completo);
		$sheet->setCellValue('K220', $documento);
		$sheet->setCellValue('S220', $grado);
		
		$sheet->setCellValue('T230', $fanio);
		//$sheet->setCellValue('S242', $pagos_anuales_de_letra);	
		$sheet->setCellValue('C243', $pagos_anuales_de_letra);
		//$sheet->setCellValue('Q243', $partescomienzocontrato[2]." de ".$meses[intval($partescomienzocontrato[1])]." de ".$partescomienzocontrato[0]); //inicio del contrato
		$sheet->setCellValue('B244', $partescomienzocontrato[2]." de ".$meses[intval($partescomienzocontrato[1])]." de ".$partescomienzocontrato[0]); //inicio del contrato
		
		//$sheet->setCellValue('C279', $nombre_completoA); 
		//$sheet->setCellValue('C280', $documentoA);
		$sheet->setCellValue('C304', $nombre_completoA);
		$sheet->setCellValue('C305', $documentoA);
		
		//Se crea la carpeta del contrato
		$path = 'registro/adminunicab/php/contratos/'.$fanio.'/'.str_replace(" ","_",$grado).'/';
		echo "<br/>path=".$path;
		if (!file_exists($path)) {
			mkdir($path, 0755, true);
		}	
		
		$folder0 = '/registro/adminunicab/php/contratos/'.$fanio.'/'.str_replace(" ","_",$grado).'/';
		$folder_correo = 'registro/adminunicab/php/contratos/'.$fanio.'/'.str_replace(" ","_",$grado).'/';
		$folder = __DIR__.$folder0;
		$nombre_excel = "contrato_".$documento."_".$n_matricula.".xlsx";
		$ruta = "https://unicab.org".$folder0.$nombre_excel;
		echo "<br/>ruta=".$ruta;
		
		//Se guarda el contrato en la tabla
		$sql_contrato = "SELECT COUNT(1) ct FROM tbl_contratos WHERE n_documento = '$documento' AND año = $fanio";
		$exe_contrato = mysqli_query($conexion,$sql_contrato);
		while ($row_contrato = mysqli_fetch_array($exe_contrato)) {
			$ct_contrato = $row_contrato['ct'];
		}
		if($ct_contrato == 0) {
			$writer = new Xlsx($spreadsheet);
			//$writer->save('registro/adminunicab/php/contratos/formato_contrato_ghf.xlsx');
			$writer->save($path.$nombre_excel);
		
			if($mes >= 11) {
				$sql_insertc = "INSERT INTO tbl_contratos (n_documento, n_contrato, ruta, año, fecha_modificacion) 
				VALUES ('$documento', '$n_matricula', '$ruta', $fanio, '$fecha3')";
			}
			else {
				$sql_insertc = "INSERT INTO tbl_contratos (n_documento, n_contrato, ruta, año, fecha_modificacion) 
				VALUES ('$documento', '$n_matricula', '$ruta', $fanio, '$fecha2')";
			}
			$exe_insertc = mysqli_query($conexion,$sql_insertc);	
			echo "<br/>".$sql_insertc;
		}
		else {
			$writer = new Xlsx($spreadsheet);
			//$writer->save('registro/adminunicab/php/contratos/formato_contrato_ghf.xlsx');
			$writer->save($path.$nombre_excel);
			
			if($mes >= 11) {
				$sql_updtc = "UPDATE tbl_contratos SET ruta = '$ruta', fecha_modificacion = '$fecha3', n_contrato = '$n_matricula' 
				WHERE n_documento = '$documento' AND año = $fanio";
			}
			else {
				$sql_updtc = "UPDATE tbl_contratos SET ruta = '$ruta', fecha_modificacion = '$fecha2', n_contrato = '$n_matricula' 
				WHERE n_documento = '$documento' AND año = $fanio";
			}
			$exe_insertc = mysqli_query($conexion,$sql_updtc);	
			echo "<br/>".$sql_updtc;
		}
	}
	catch(Exception $e) {
		echo $e->getMessage();
	}
	
    // ###################### FIN CONTRATO ###################
	
	//redireccionamos a unicab.solutions para el envío del correo
	//header('Location: resultado_pre_admisiones_f.php?s='.$resultado);
	header('Location: https://unicab.solutions/pre_admisiones1_us.php?documento='.$documento.'&c='.$codigo.'&msgest='.$msg_estudiante.'&sqlinsert='.$sql_insert2);
    
    	
?>

