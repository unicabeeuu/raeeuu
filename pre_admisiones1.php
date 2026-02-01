<?php
    include "admin-unicab/php/conexion.php";
    require("registro/docenteunicab/updreg/1cc3s4db.php");
    header("Cache-Control: no-store");
    
    require('registro/financieraunicab/PHPMailer_master/src/Exception.php');
    require('registro/financieraunicab/PHPMailer_master/src/PHPMailer.php');
    require('registro/financieraunicab/PHPMailer_master/src/SMTP.php');
    use  PHPMailer\PHPMailer\PHPMailer ;
    use  PHPMailer\PHPMailer\SMTP ;
    use  PHPMailer\PHPMailer\Exception ;
    
    $idgra = strtoupper($_REQUEST['register_grado']);
    $documento = $_REQUEST['register_documento'];
    $nombres = $_REQUEST['register_nombres'];
    $apellidos = $_REQUEST['register_apellidos'];
    $tdoc = $_REQUEST['register_tipo_documento'];
    $cel = $_REQUEST['register_telefono'];
    $email = $_REQUEST['register_email'];
    $estnuevo = $_REQUEST['estnuevo'];
    $td_text = $_REQUEST['td_text'];
    $rh = $_REQUEST['register_rh'];
    //echo $documento;
    
    $nombre_completo = $apellidos." ".$nombres;
    
    $documentoA = $_REQUEST['register_documentoA'];
    $nombresA = $_REQUEST['register_nombresA'];
    $apellidosA = $_REQUEST['register_apellidosA'];
    $dirA = $_REQUEST['register_direccionA'];
    $celA = $_REQUEST['register_celularA'];
    $emailA = $_REQUEST['register_correoA'];
    
    $nombre_completoA = $nombresA." ".$apellidosA;
    //echo $nombre_completoA;
    //echo $estnuevo;
    
    //Se busca el id del est
    if($estnuevo == "NO") {
        $sql_id = "SELECT id FROM estudiantes WHERE n_documento = '$documento'";
        echo $sql_id;
        $res_id=$mysqli1->query($sql_id);
        while($row_id = $res_id->fetch_assoc()){
            $idest = $row_id['id'];
        }
    }
    //echo "control";
    //echo $idest;
    
    date_default_timezone_set('America/Bogota');
    $dia=date("d");
    $mes=date("m");
    $mesLetra=date("M");
    $fanio=date("Y");
    //$faniop=date("Y");
    $espaniol="";
    //echo $fanio;
    $fecha2 = $fanio."/".$mes."/". $dia;
    
    if($mes == 12) {
	    $fanio++;
	}
    
    $fecha3 = $fanio."/".$mes."/". $dia;
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
    $per = "1";
	if(date($fecha2) >= date('2021/12/01') && date($fecha2) < date('2022/04/08')) {
	    $per = "1";
	}
	else if(date($fecha2) >= date('2022/04/09') && date($fecha2) < date('2022/07/01')) {
	    $per = "2";
	}
	else if(date($fecha2) >= date('2022/07/02') && date($fecha2) < date('2022/09/09')) {
	    $per = "3";
	}
	else if(date($fecha2) >= date('2022/09/10')) {
	    $per = "4";
	}
	//beca = 0 -> sin beca; = 1 media beca; = 2 beca completa
	//pension_a -> es la nueva pensión de promoción anticipada
	$beca = 0;
    $descuento = 0;
    $ct_pagos = 0;
        
	$sql_beca = "SELECT * FROM tbl_becas WHERE identificacion = $documento AND periodo_lectivo = 2022";
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
        }
        else {
            $pagos_anuales_de = 5;
        }
    }
    else {
        if($per == 2) {
            $pagos_anuales_de = 7.5;
        }
        else if($per == 3) {
            $pagos_anuales_de = 5;
        }
        else {
            $pagos_anuales_de = 10;
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
        estado = '$rh'
        WHERE n_documento = '$documento'";
    }
    else if($estnuevo == "SI") {
        $sql_updins_est = "INSERT INTO estudiantes 
        (apellidos, nombres, genero, tipo_documento, n_documento, fecha_nacimiento, expedicion, ciudad, direccion, direccion_estudiante, telefono_estudiante, email_institucional, 
        actividad_extra, email_acudiente_1, email_acudiente_2, acudiente_1, acudiente_2, telefono_acudiente_1, telefono_acudiente_2, estado, password, mensaje, fecha_datos, 
        documento_responsable, periodo_ing, descuento, beca, acuerdo_ct_pagos, pension_de, pension_a, pagos_anuales_de, pagos_anuales_a, pagos_anuales_f, tot_anual_de, 
        descuento1, tot_anual_sd, beca1, tot_anual_sb, pension_final) 
        VALUES 
        ('$apellidos', '$nombres', 'NA', '$tdoc', '$documento', '1900/01/01', 'NA', 'NA', '$dirA', 'NA', '$cel', 'NA', 
        'NA', '$emailA', 'NA', '$nombre_completoA', 'NA', '$celA', 'NA', '$rh', 'NA', 'NA', '$fecha2', 
        '$documentoA', $per, $descuento, $beca, $ct_pagos, $pension, 0, $pagos_anuales_de, 0, $pagos_anuales_de, $total_anual_de, 
        $descuento1, $total_anual_sd, $beca1, $total_anual_sb, $pension_final)";
    }
    //echo "<br>".$sql_updins_est;
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
        $sql_mat = "SELECT MAX(idMatricula) maxid FROM matricula WHERE date_format(fecha_ingreso, '%Y') = $fanio OR fecha_ingreso >= '2021-12-01'";
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
    WHERE idMatricula = (SELECT MAX(idMatricula) maxid FROM matricula WHERE date_format(fecha_ingreso, '%Y') = $fanio OR fecha_ingreso >= '2021-12-01')";
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
	    $sql_valm = "SELECT COUNT(1) ct FROM matricula WHERE n_matricula = '$n_matricula' AND id_estudiante = $idest AND estado = 'pre_solicitud'";
	    $msg_estudiante = "EstudianteOK";
	    $exe_valm = mysqli_query($conexion,$sql_valm);
        while ($row_valm = mysqli_fetch_array($exe_valm)) {
            $ct_matric = $row_valm['ct'];
        }
        //echo $ct_matric;
        if($ct_matric == 0) {
            if($mes >= 11) {
        	    $sql_insert1 = "INSERT INTO matricula (n_matricula, fecha_ingreso, estado, id_estudiante, id_grado, EstadoGrado) 
                VALUES ('$n_matricula', '$fecha2', 'pre_solicitud', $idest, $idgra, 'NA')";
        	}
        	else {
        	    $sql_insert1 = "INSERT INTO matricula (n_matricula, fecha_ingreso, estado, id_estudiante, id_grado, EstadoGrado) 
                VALUES ('$n_matricula', '$fecha3', 'pre_solicitud', $idest, $idgra, 'NA')";
        	}
            
            //echo "<br/>".$sql_insert1;
            $exe_insert1=mysqli_query($conexion,$sql_insert1);
        }
	}
	
    //************FIN ACTUALIZACION TABLAS ESTUDIANTES Y MATRICULA **************************************************************
    
    
    // ###################### INICIO ENVIO DE CORREO ###################
    $mail = new PHPMailer(true);
    
    try {
        //echo $email;
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        //$mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = false;
        //$mail->Username   = 'numericopensamientoclei2@gmail.com';                     // SMTP username
        $mail->Username   = 'unicabfinanciera@gmail.com';
        $mail->Password   = 'Financiera2020#';
        //$mail->Username   = 'sistemasunicab@gmail.com';
        //$mail->Password   = 'psfa0301';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 25;
    
        //Recipients
        $mail->setFrom('unicabfinanciera@gmail.com');
        //$mail->addAddress('liliasda19@gmail.com');     // Add a recipient
        //$mail->addAddress('unicabfinanciera@gmail.com');     // Add a recipient
        $mail->addAddress($emailA);     // Add a recipient
        //$mail->addReplyTo('numericopensamientoclei2@gmail.com', 'FYI');
        $mail->addCC('matriculas@unicab.org');
        $mail->addBCC('numericopensamientoclei2@gmail.com');
    
        // Attachments
        //$mail->addAttachment('../docenteunicab/dhonor/2020/prueba.pdf', 'prueba.pdf');
        //$mail->addAttachment($folder_correo.$nom_pdf, $nom_pdf);         // Add attachments
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'CONFIRMACION CORREO PROCESO DE MATRICULA UNICAB '.$fanio;
        //$mail->Subject = 'REENVIO CORREO PROCESO DE MATRICULA UNICAB '.$fanio;
        /*$mail->Body    = '<p>Señor(a): '.strtoupper($nombre_completoA).'</p>
            <br><p>Este es un envío de correo automático de UNICAB COLEGIO VIRTUAL.</p>
            <p>A continuación encontrará un documento pdf con la órden de pago del primer pago.</p>
            <p>Para proceder con el pago diríjase a una de las entidades bancarias o a uno de los diferentes canales de pago virtual que UNICAB ofrece en nuestra página:  
            <a href="https://unicab.org/pagos_payservices.php">PAGOS VIRTUALES</a>.</p>
            <p>Utilice el número de orden de pago como referencia de pago.</p>
            <p>Haga clic <a download style="color:#0C0; display:inline-block;" href="https://unicab.org/assets/descargas/matricula/CONTRATO_DE_MATRICULA_UNICAB_2021.pdf">AQUI</a> para descargar el Contrato de Matrícula. Diligéncielo y escanéelo en un sólo archivo pdf.</p><hr>
            <p>Haga clic <a href="https://unicab.org/admisiones_final.php?c='.$codigo.'">AQUI</a> para que termine el proceso de matrícula.</p>
            <br><p>--</p>
            <p>Áreas de Admisiones y Financiera</p>
            <p>UNICAB COLEGIO VIRTUAL</p>';*/
            
        $mail->Body    = '<p>Señor(a): '.strtoupper($nombre_completoA).'</p>
            <br><p>Este es un envío de correo automático de UNICAB COLEGIO VIRTUAL.</p>
            <p>Haga clic <a download style="color:#0C0; display:inline-block;" href="https://unicab.org/assets/descargas/matricula/CONTRATO_DE_MATRICULA_UNICAB_2022.pdf">AQUI</a> para descargar el Contrato de Matrícula. Diligéncielo y escanéelo en un sólo archivo pdf que se debe anexar cuando termine el proceso en el link de abajo.</p><hr>
            <p>Haga clic <a download style="color:#0C0; display:inline-block;" href="https://unicab.org/assets/descargas/matricula/CONSENTIMIENTO_INFORMADO_2022_MEDIOS.pdf">AQUI</a> para descargar el Consentimiento Informado. Diligéncielo y escanéelo en un archivo pdf que se debe anexar cuando termine el proceso en el link de abajo.</p><hr>
            <p>Haga clic <a href="https://unicab.org/admisiones_final.php?c='.$codigo.'">AQUI</a> para que termine el proceso de matrícula del documento '.$documento.'.</p>
            <br><p>--</p>
            <p>Áreas de Admisiones y Financiera</p>
            <p>UNICAB COLEGIO VIRTUAL</p>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        //<br><p>Este es un envío de correo automático de UNICAB COLEGIO VIRTUAL. <strong>Por favor tener en cuenta éste último correo.</strong></p>
    
        $mail->send();
        //echo 'Message has been sent';
        $msg_correo = "CorreoOK";
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        $msg_correo = "CorreoError";
    }
    
    // ###################### FIN ENVIO DE CORREO ###################
    
    //$resultado = $msg_correo1."_".$msg_estudiante."_".$msg_matricula;
    $resultado = $msg_correo."_".$msg_estudiante."_".$emailA;
    echo "<br>".$resultado;
    
    //Se hace el insert en la tabla de solicitudes
	$sql_log = 'INSERT INTO solicitudes_matricula (msg, id_est, sentencia) VALUES ("'.$resultado.'", '.$idest.', "'.$sql_insert1.'")';
	//echo "<br>".$sql_log;
	$exe_log=mysqli_query($conexion,$sql_log);
	
    //redireccionamos a la misma url conforme se ha enviado correctamente con la variable si
	header('Location: resultado_pre_admisiones_f.php?s='.$resultado);
    	
?>

