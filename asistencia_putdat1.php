<?php
    include "admin-unicab/php/conexion.php";
    require("registro/docenteunicab/updreg/1cc3s4db.php");
    header("Cache-Control: no-store");
	//https://unicab.org/registro_inicial_putdat.php?register_nombrea=yenny&register_emaila=ghernandof@gmail.com&register_telefonoa=3006510212&register_ciudada=pesca&register_documentoe=46379709
    
    $documentoe = $_REQUEST['register_documento'];
	$nombree = strtoupper($_REQUEST['register_nombres']);
	$idgra = $_REQUEST['register_grado'];
    $nombrea = strtoupper($_REQUEST['register_nombresA']);
    $celulara = $_REQUEST['register_celularA'];
	//echo $idgra;
    
    date_default_timezone_set('America/Bogota');
    $dia = date("d");
    $mes = date("m");
    $mesLetra = date("M");
    $fanio = date("Y");
    $espaniol="";
    //echo $fanio;
    $fecha2 = $fanio."/".$mes."/". $dia;
	
	//Se valida si el registro ya existe en tbl_asistencias
	$sql_val = "SELECT COUNT(1) ct FROM tbl_asistencias WHERE n_documento = '$documentoe' AND fecha = '$fecha2'";
	echo "<br>".$sql_val;
	$res_val = $mysqli1->query($sql_val);	
	while($row_val = $res_val->fetch_assoc()){
		$ct_val = $row_val['ct'];
	}
	echo "<br>ct_val: ".$ct_val;
	
	if ($ct_val > 0) {
		$existe = "SI";
	}
	else {
		$existe = "NO";
		$sql_insupd = "INSERT INTO tbl_asistencias (n_documento, nombre, grado, nombre_a, celular_a, fecha) 
		VALUES ('$documentoe', '$nombree', $idgra, '$nombrea', '$celulara', '$fecha2')";
		echo "<br>".$sql_insupd;
		$exe_insupd = mysqli_query($conexion,$sql_insupd);
	}    
    
	//Se direcciona
	header('Location: resultado_asistencia.php?existe='.$existe);
    	
?>

