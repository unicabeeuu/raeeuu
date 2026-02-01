<?php
    include "admin-unicab/php/conexion.php";
    require("registro/docenteunicab/updreg/1cc3s4db.php");
    header("Cache-Control: no-store");
    
    $documento = $_REQUEST['documento'];
    $sql_insert = str_replace("_", " ", $_REQUEST['sqlinsert']);
    $resultado = $_REQUEST['s'];
    $idest = $_REQUEST['idest'];
	$nuevo = $_REQUEST['nuevo'];
    //echo $documento;
    
    echo "<br>".$resultado;
    
    //Se hace el insert en la tabla de solicitudes
	$sql_log = 'INSERT INTO solicitudes_matricula (msg, id_est, sentencia) VALUES ("'.$resultado.'", '.$idest.', "'.$sql_insert.'")';
	//echo "<br>".$sql_log;
	$exe_log=mysqli_query($conexion,$sql_log);
	
	//redireccionamos a la página final del proceso
	if ($nuevo == "SI") {
		header('Location: resultado_pre_admisiones_f_2024.php?s='.$resultado);
	}
	else {
		header('Location: resultado_pre_admisiones_f.php?s='.$resultado);
	}	
    	
?>

