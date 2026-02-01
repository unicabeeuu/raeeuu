<?php
	session_start();
	require("admin-unicab/administrador/1cc3s4db.php");
	include "admin-unicab/administrador/php/conexion.php";
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
	//header("Refresh: 30; URL='pen_gra_upddat.php'");
	set_time_limit(300);
	//https://unicab.org/domain_upddat.php
	
	$usu_domain = $_SESSION['usu_domain'];
	
	date_default_timezone_set('America/Bogota');
	$fecha = time();
	$dia = date("d",$fecha);
	$mes = date("m",$fecha);
	$a = date("Y",$fecha);
	$hora = date("H",$fecha);
	$minutos = date("i",$fecha);
	if($dia < 10) {
		//$dia = "0".$dia;
	}
	if($mes < 10) {
		//$mes = "0".$mes;
	}
	$fecha2 =$a."/".$mes."/". $dia;
	$fecha3 =$a."-".$mes."-". $dia;
		
	//Se valida si ya existe en la tabla tbl_usuarios_domain
	$sql_usu_domain = "SELECT COUNT(1) ct FROM tbl_usuarios_domain_i WHERE usuario = '$usu_domain'";
	//echo $sql_usu_domain;
	$res_usu_domain = $mysqli1->query($sql_usu_domain);
	while($row_usu_domain = $res_usu_domain->fetch_assoc()) {
		$ct = $row_usu_domain['ct'];
	}
	//echo $ct;
	
	if ($ct == 0) {
		//Se hace el registro
		$sql_insert_ini = "INSERT INTO tbl_usuarios_domain_i (usuario, id_palabras, fecha_registro, ultimo_id_cambiado) 
		VALUES ('$usu_domain', '1,2,3,4,5', '$fecha2', 5)"; //'1,2,3,4,5' --- 5 ########################################
		$res_insert_ini = $mysqli1->query($sql_insert_ini);
	}
	else if ($ct > 0) {
		$sql_usu_domain = "SELECT id_palabras, ultimo_id_cambiado, fecha_registro 
		FROM tbl_usuarios_domain_i WHERE usuario = '$usu_domain'";
		//echo $sql_usu_domain;
		$res_usu_domain = $mysqli1->query($sql_usu_domain);
		while($row_usu_domain = $res_usu_domain->fetch_assoc()) {
			$id_palabras = $row_usu_domain['id_palabras'];
			$ultimo_id_cambiado = $row_usu_domain['ultimo_id_cambiado'];
			$fecha_registro = $row_usu_domain['fecha_registro'];
		}
		
		//echo "fecha_registro: ".$fecha_registro." fecha_actual: ".$fecha3;
		if ($fecha_registro < $fecha3) {
			//Se actualizan las palabras
			$id_palabras_array = explode(",", $id_palabras);
			//print_r($id_palabras_array);
			$ultimo_id = $id_palabras_array[count($id_palabras_array) - 1];
			$primer_id = $id_palabras_array[0];
			
			if (count($id_palabras_array) < 25) { //25 ########################################
				//Se agregan otras 5			
				for ($i = 1; $i <= 5; $i++) { //5 ########################################
					$ultimo_id = $ultimo_id + 1;
					$id_palabras .= ",".$ultimo_id;
				}
				$sql_update = "UPDATE tbl_usuarios_domain_i SET id_palabras = '$id_palabras', ultimo_id_cambiado = ".$ultimo_id.",
				fecha_registro = '$fecha2' WHERE usuario = '$usu_domain'";
				$res_update = $mysqli1->query($sql_update);
			}
			else {
				$registrosactivos = 25; //25 ########################################
				$registrosacambiar = 5;
				$id_palabras_n = "";
				
				//Se consulta el maxidgeneral
				$query1 = "SELECT MAX(id) maxidgeneral FROM tbl_metodo_domain_i";
				//echo $query1;					
				$resultado = $mysqli1->query($query1);
				while($row = $resultado->fetch_assoc()) {
					$maxidgeneral = $row['maxidgeneral'];
				}	

				//Se consulta el total de registros por usuario
				$query2 = "SELECT COUNT(1) ct FROM tbl_usuarios_domain_palabras_i WHERE usuario = '$usu_domain'";
				$resultado2 = $mysqli1->query($query2);
				while($row2 = $resultado2->fetch_assoc()) {
					$totalregistros = $row2['ct'];
				}
				
				for ($i = 1; $i <= $registrosacambiar; $i++) {
					$nuevos_ids_palabras = array($registrosactivos); //25 ########################################
					$id_palabras_final = "";
					
					if ($i > 1) {
						$sql_usu_domain = "SELECT id_palabras, ultimo_id_cambiado 
						FROM tbl_usuarios_domain_i WHERE usuario = '$usu_domain'";
						//echo "<br>sql_usu_domain: ".$sql_usu_domain;
						$res_usu_domain = $mysqli1->query($sql_usu_domain);
						while($row_usu_domain = $res_usu_domain->fetch_assoc()) {
							$id_palabras = $row_usu_domain['id_palabras'];
							$ultimo_id_cambiado = $row_usu_domain['ultimo_id_cambiado'];
						}
						$id_palabras_array = explode(",", $id_palabras);
						//print_r($id_palabras_array);
						$ultimo_id = $id_palabras_array[count($id_palabras_array) - 1];
						$primer_id = $id_palabras_array[0];
					}				
					
					$maxidactivo = $ultimo_id;
					$minidinactivo = $primer_id;
					//echo "<br>maxidactivo: ".$maxidactivo;
					//echo "<br>maxidgeneral: ".$maxidgeneral;
					//echo "<br>totalregisstros: ".$totalregistros;
					//echo "<br>minidinactivo: ".$minidinactivo;
					
					if ($maxidactivo == $maxidgeneral) {
						$nuevos_ids_palabras = $id_palabras_array;
						//print_r($nuevos_ids_palabras);
						if ($totalregistros == $maxidgeneral) {
							//No hace nada
						}
						else {
							if ($primer_id == 1) {
								//Se busca el índice del último id cambiado
								$indice = array_search($ultimo_id_cambiado,$nuevos_ids_palabras);
								$nuevos_ids_palabras[$indice + 1] = $ultimo_id_cambiado + 1;
								$ultimo_id_cambiado = $ultimo_id_cambiado + 1;
							}
							else {
								$nuevos_ids_palabras[0] = 1;
								$ultimo_id_cambiado = 1;
							}
							//print_r($nuevos_ids_palabras);
							for ($n = 0; $n < count($nuevos_ids_palabras); $n++) {
								$id_palabras_final .= $nuevos_ids_palabras[$n].',';
							}
							$id_palabras_final =  substr($id_palabras_final, 0, strlen($id_palabras_final) - 1);
							
							$sql_update = "UPDATE tbl_usuarios_domain_i SET id_palabras = '$id_palabras_final', ultimo_id_cambiado = ".$ultimo_id_cambiado.", 
							fecha_registro = '$fecha2' WHERE usuario = '$usu_domain'";
							$res_update = $mysqli1->query($sql_update);
							//echo "<br>sql_update maxidactivo: ".$sql_update;
						}
						
					}
					else {
						$ultimo_id = $ultimo_id + 1;
						$id_palabras .= ",".$ultimo_id;
						$id_palabras =  substr($id_palabras,2);
						
						$sql_update = "UPDATE tbl_usuarios_domain_i SET id_palabras = '$id_palabras', ultimo_id_cambiado = ".$ultimo_id.", 
						fecha_registro = '$fecha2' WHERE usuario = '$usu_domain'";
						$res_update = $mysqli1->query($sql_update);
						//echo "<br>sql_update: ".$sql_update;
					}
				}
			}
		}
		
	}
	
	echo "<script>location.href='domain_final_i.php';</script>";
	
?>