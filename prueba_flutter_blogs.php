<?php
	require("registro/docenteunicab/updreg/1cc3s4db.php");
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
	//header("Refresh: 30; URL='pen_gra_upddat.php'");
	set_time_limit(300);
	//https://unicab.org/prueba_flutter_blogs.php
	
	$datos = new stdClass();
	$registros = array();
	$keys = ['TituloB','ImagenB','FechaPublicacionB','Id_categoria','Categoria'];
	$i = 0;
	
	//Se hace la consulta
	$query0 = "SELECT UPPER(b.TituloB) TituloB, REPLACE(b.ImagenB, '../../../', 'https://unicab.org/') ImagenB, b.FechaPublicacionB, b.Id_categoria, cb.categoria 
	FROM blog b, tbl_categorias_blog cb 
	WHERE b.Id_categoria = cb.id 
	ORDER BY FechaPublicacionB DESC LIMIT 5";
	$resultado0 = $mysqli1->query($query0);
	while($row0 = $resultado0->fetch_assoc()) {
	    /*$datos->titulo = $row0['TituloB'];
		$datos->imagen = $row0['ImagenB'];
		$datos->fechaPublicacion = $row0['FechaPublicacionB'];
		$datos->idCategoria = $row0['Id_categoria'];
		$datos->categoria = $row0['categoria'];*/
		$valores = [$row0['TituloB'],$row0['ImagenB'],$row0['FechaPublicacionB'],$row0['Id_categoria'],$row0['categoria']];
		$registros_temp = array_combine($keys,$valores);
		$registros[$i] = $registros_temp;
		$i++;
	}
	$datos->registros = $registros;
	
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);
	
?>