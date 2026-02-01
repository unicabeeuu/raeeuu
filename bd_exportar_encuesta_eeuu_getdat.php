<?php
    require("registro/docenteunicab/updreg/1cc3s4db.php");
	//include "adminunicab/php/conexion.php";
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
	//header("Refresh: 30; URL='pen_gra_upddat.php'");
	set_time_limit(300);
	
	header("Content-type:application/xls; charset=iso-8859-1");
	header("Content-Disposition: attachment; filename=encuesta_unicab_usa.xls");
	
	date_default_timezone_set('America/Bogota');
    $dia=date("d");
    $mes=date("m");
    $mesLetra=date("M");
    $fanio=date("Y");
	
	$query = "SELECT p.nombre, p.email, p.celular, p.profesion, q.tipo, q.pregunta, r.resultado 
	FROM tbl_encuesta_eeuu_resultados r, tbl_encuesta_eeuu_participantes p, tbl_encuesta_eeuu_preguntas q 
	WHERE r.id_participante = p.id AND r.id_pregunta = q.id AND r.id_encuesta = 2";
		
	$resultado=$mysqli1->query($query);
	$sel = $mysqli1->affected_rows;

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<center>
			<fieldset>
				<legend>Encusta UNICAB USA
				</legend>
				<?php
					echo '<label>Total Registros &#9658; '.$sel.'</label>';
				?>
				<table border="1px" class="table" id="tblest">
					<thead>
					<tr>
						<td class="tdlargo"><b>NOMBRE</b></td>
						<td class="tdcorto"><b>EMAIL</b></td>
						<td class="tdmedia"><b>CELULAR</b></td>
						<td class="tdnormal"><b>PROFESIÓN</b></td>
						<td class="tdnormal"><b>TIPO PREGUNTA</b></td>
						<td class="tdmediol"><b>PREGUNTA</b></td>
						<td class="tdnormal"><b>RESULTADO</b></td>
					</tr>
					</thead>
					<tbody>
					<?php
					    while($row = $resultado->fetch_assoc()){
					?>
					<tr>
						<td class="tdlargo"><?php echo $row['nombre'];?></td>
						<td class="tdcorto"><?php echo $row['email'];?></td>
						<td class="tdmedia"><?php echo $row['celular'];?></td>
						<td class="tdnormal"><?php echo $row['profesion'];?></td>
						<td class="tdnormal"><?php echo $row['tipo'];?></td>
						<td class="tdmediol"><?php echo $row['pregunta'];?></td>
						<td class="tdnormal"><?php echo $row['resultado'];?></td>
					</tr>
					<?php 
					        $fila++;
					    }
						$resultado->close();
						$mysqli1->close();
					?>
					</tbody>
				</table>
			</fieldset>
		</center>
	</body>
</html>