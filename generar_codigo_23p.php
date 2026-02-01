<?php
	//Genera el select de los grados
	require("registro/docenteunicab/updreg/1cc3s4db.php");
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
	//header("Refresh: 30; URL='pen_gra_upddat.php'");
	set_time_limit(300);
	//https://unicab.org/generar_codigo_23p.php?documento=1000270950
	
	$documento = $_REQUEST["documento"];
	
	$datos = new stdClass();
		
	date_default_timezone_set('America/Bogota');
    $dia = date("d");
    $mes = date("m");
    $mesLetra = date("M");
    $fanio = date("Y");
	$fanio1 = date("Y");
    if($mes >= 10) {
        $fanio = $fanio + 1;
    }
	$fechaHoy = $fanio1."-".$mes."-".$dia;
	
	$codigo = "";
	$sa1 = ["q","a","1","z","x","2","s","w","3","p","l","4","m","k","5","o","e","6",
            "d","c","7","i","j","8","n","r","9","f","v","0","u","h","b","t","g"];
	$meses = ["", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
	
	for($i = 1; $i <=10; $i++) {
		$ale = mt_rand(1,sizeof($sa1));
		$codigo = $codigo.$sa1[$ale-1];
	}
	
	//Se valida si ya tiene un proceso de pre matrícula abierto
	$datos->procesoAbierto = "NO";
	$ct_pre = 0;
	$id_grado = 0;
	$sql_pre_matricula = "SELECT COUNT(1) ct, m.id_grado FROM estudiantes e, matricula m 
	WHERE e.id = m.id_estudiante AND e.n_documento = '$documento' AND m.n_matricula like '%".$fanio."%' 
	GROUP BY m.id_grado";
	$resultado_pre_matricula = $mysqli1->query($sql_pre_matricula);
	while($rowpm = $resultado_pre_matricula->fetch_assoc()) {
	    $ct_pre = $rowpm["ct"];
		$id_grado = $rowpm["id_grado"];
	}
	if ($ct_pre > 0 && $id_grado < 17) {
		$datos->procesoAbierto = "SI";
	}
	
	//Se valida si ya se le generó codigo para 2 y 3 periodo
	$datos->conCodigo23P = "NO";
	$ct_cod = 0;
	$codigo1 = "";
	$sql_codigo = "SELECT COUNT(1) ct, codigo FROM tbl_cod_pre_matricula_23periodos 
	WHERE identificacion = '$documento' AND periodo_lectivo = $fanio 
	GROUP BY codigo";
	//echo $sql_codigo."<br>";
	$resultado_codigo = $mysqli1->query($sql_codigo);
	while($rowC = $resultado_codigo->fetch_assoc()) {
	    $ct_cod = $rowC["ct"];
		$codigo1 = $rowC["codigo"];
	}
	if ($ct_cod > 0) {
		$datos->conCodigo23P = "SI";
		$link = "https://unicab.org/admisiones_2025_ucv23p.php?c=".$codigo1;
		$datos->enlace = $link;
	}
	
	if ($datos->procesoAbierto == "NO" && $datos->conCodigo23P == "NO") {
		$datos->codigo = $codigo;
		$link = "https://unicab.org/admisiones_2025_ucv23p.php?c=".$codigo;
		//Se genera el insert
		$sql_insert = "INSERT INTO tbl_cod_pre_matricula_23periodos (identificacion, periodo_lectivo, codigo, link) VALUES 
		('$documento', $fanio, '$codigo', '$link')";
		$res_insert=$mysqli1->query($sql_insert);
		$datos->enlace = $link;
	}	
	
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);
	
?>