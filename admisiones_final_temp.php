<?php
    include "admin-unicab/php/conexion.php";
    //https://unicab.org/admisiones_final.php?c=52p89vpv3p
    
    $codigo = $_REQUEST['c'];
    $prefijo = substr($codigo, 0, 4);
    
    header('Location: https://unicab.solutions/admisiones_final_us.php?c='.$codigo);
	
?>

