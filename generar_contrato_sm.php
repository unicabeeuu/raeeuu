<?php
	include "admin-unicab/php/conexion.php";
    require("registro/docenteunicab/updreg/1cc3s4db.php");
    header("Cache-Control: no-store");
	//https://unicab.org/generar_contrato.php?doc=1147484336
	
	require 'PhpSpreadsheet/vendor/autoload.php';
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use \PhpOffice\PhpSpreadsheet\IOFactory;	
    
	$documento = $_REQUEST['doc'];
    
    $sql_datos = "SELECT e.*, m.id_grado, m.n_matricula, g.grado, td.id id_td, td.tipo_documento 
	FROM estudiantes e, matricula m, grados g, tbl_tipos_documento td 
	WHERE e.id = m.id_estudiante AND m.id_grado = g.id AND e.tipo_documento = td.id 
	AND e.n_documento = '$documento' AND m.estado IN ('activo', 'pre_solicitud')";
	echo "<br>".$sql_datos;
	
	$res_datos = $mysqli1->query($sql_datos);
	while($row_datos = $res_datos->fetch_assoc()){
		$idest = $row_datos['id'];
		$apellidos = $row_datos['apellidos'];
		//echo "apellidos ".$apellidos;
		$nombres = $row_datos['nombres'];
		$nombre_completo = $nombres." ".$apellidos;
		$idgra = $row_datos['id_grado'];
		$tdoc = $row_datos['id_td'];
		$td_text = $row_datos['tipo_documento'];
		$cel = $row_datos['telefono_estudiante'];
		$email = $row_datos['email_institucional'];
		$rh = $row_datos['estado'];
		$fn = $row_datos['fecha_nacimiento'];
		//$medio = $row_datos['register_medio'];
		$aextra = $row_datos['activiadad_extra'];
		$genero = $row_datos['genero'];
		$situacion = $row_datos['situacion_se'];
		$grado = $row_datos['grado'];
		$n_matricula = $row_datos['n_matricula'];
		
		$nombreA = $row_datos['acudiente_1'];
		$documentoA = $row_datos['documento_responsable'];
		$dirA = $row_datos['direccion'];
		$celA = $row_datos['telefono_acudiente_1'];
		$emailA = $row_datos['email_acudiente_1'];
		$parentesco1 = $row_datos['parentesco_acudiente_1'];
	}
    
    if(is_null($fn)) {
		//No hace nada
	}
	else {
		$partesfn = explode("-", $fn);
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
	echo $sql;
	
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
    $per = 1;
	if(date($fecha2) >= date('2024/11/01') && date($fecha2) < date('2025/04/11')) {
	    $per = 1;
		$comienzocontrato = "2025/02/03";
	}
	else if(date($fecha2) >= date('2025/04/12') && date($fecha2) < date('2025/06/13')) {
	    $per = 2;
		$comienzocontrato = "2025/04/11";
	}
	else if(date($fecha2) >= date('2025/06/14') && date($fecha2) < date('2025/08/29')) {
	    $per = 3;
		$comienzocontrato = "2025/06/13";
	}
	else if(date($fecha2) >= date('2025/08/30')) {
	    $per = 4;
		$comienzocontrato = "2025/08/29";
	}
	$fincontrato = "2025/11/14";
	echo "<br> per=".$per." comienzo contrato=".$comienzocontrato;
	$beca = 0;
    $descuento = 0;
    $ct_pagos = 0;
        
	$sql_beca = "SELECT * FROM tbl_becas WHERE identificacion = $documento AND periodo_lectivo = 2025";
	$res_beca=$mysqli1->query($sql_beca);
    while($row_beca = $res_beca->fetch_assoc()){
        $beca = $row_beca['beca'];
        $descuento = $row_beca['descuento'];
        $ct_pagos = $row_beca['ct_pagos'];
    }
    
    $sql_costos = "SELECT * FROM tbl_costos_unicab WHERE a = $fanio AND id_grado = $idgra";
    //echo "<br>".$sql_costos;
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
			$fincontrato = "2025/06/30";
        }
		else if($per == 4) {
            $pagos_anuales_de = 2.5;
			$pagos_anuales_de_letra = $pagos_anuales_de." (Dos punto cinco)";
			$fincontrato = "2025/11/14";
        }
        else {
            $pagos_anuales_de = 5;
			$pagos_anuales_de_letra = $pagos_anuales_de." (Cinco)";
			if($per == 1) {
				$fincontrato = "2025/06/30";
			}
			else if($per == 3) {
				$fincontrato = "2025/11/14";
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
    
	$sql_updins_est = "UPDATE estudiantes SET descuento = $descuento, beca = $beca, acuerdo_ct_pagos = $ct_pagos, pension_de = $pension, 
	pension_a = 0, pagos_anuales_de = $pagos_anuales_de, pagos_anuales_a = 0, pagos_anuales_f = $pagos_anuales_de, tot_anual_de = $total_anual_de, 
	descuento1 = $descuento1, tot_anual_sd = $total_anual_sd, beca1 = $beca1, tot_anual_sb = $total_anual_sb, pension_final = $pension_final 
	WHERE n_documento = '$documento'";
    echo "<br>".$sql_updins_est;
	
    $res_updinst_est = $mysqli1->query($sql_updins_est);
    
	//************FIN ACTUALIZACION TABLAS ESTUDIANTES Y MATRICULA **************************************************************
    
    //$sql_insert2 = str_replace(" ", "_", $sql_insert1);
    //echo "<br/>".$sql_insert2;
	
	// ###################### INICIO CONTRATO ###################
	echo "<br>Inicio contrato";
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
		if($tdoc == 1) {
			$sheet->setCellValue('C22', "X");
		}
		else if($tdoc == 3) {
			$sheet->setCellValue('D22', "X");
		}
		else if($tdoc == 4) {
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
		//$sheet->setCellValue('K26', $difa);
		
		$sheet->setCellValue('C27', $cel);
		$sheet->setCellValue('M27', $email);
		$sheet->setCellValue('C28', $aextra);
		
		//Inicio Datos Acudiente
		$sheet->setCellValue('C34', $nombreA);
		$sheet->setCellValue('C36', $documentoA);
		$sheet->setCellValue('I37', $dirA);
		$sheet->setCellValue('C39', $celA);
		$sheet->setCellValue('K39', $emailA);
		//Fin Datos Acudiente
		
		//Inicio Datos Padre
		if($parentesco1 == "PADRE") {
			$sheet->setCellValue('C41', $nombreA);
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
			$sheet->setCellValue('C48', $nombreA);
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
		$sheet->setCellValue('F76', $nombreA);
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
			$sheet->setCellValue('H189', "3 día(s)");
			$sheet->setCellValue('K189', "Febrero");
			$sheet->setCellValue('P189', "2025");
		}
		else if($fecha2_yyyymmdd >= "20250101" && $fecha2_yyyymmdd < "20250201") {
			$sheet->setCellValue('H189', "3 día(s)");
			$sheet->setCellValue('K189', "Febrero");
			$sheet->setCellValue('P189', "2025");
		}
		else {
			$sheet->setCellValue('H189', $dia." día(s)");
			$sheet->setCellValue('K189', $espaniol);
			$sheet->setCellValue('P189', $fanio1);
		}

		$sheet->setCellValue('G194', "Nombre: ".$nombreA);	
		$sheet->setCellValue('K194', "Nombre: ".$nombre_completo);
		$sheet->setCellValue('H195', $documentoA);	
		$sheet->setCellValue('M195', $documento);
		
		$sheet->setCellValue('C235', $nombreA);
		$sheet->setCellValue('C236', $documentoA);
		
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
		
			if($mes >= 10) {
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
	}
	catch(Exception $e) {
		echo $e->getMessage();
	}
	echo "<br>Fin contrato";
    // ###################### FIN CONTRATO ###################	

?>