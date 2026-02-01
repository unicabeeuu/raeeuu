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
    
    $idgra = $_REQUEST['grado_permitido'];
    $idgra_solicitado = strtoupper($_REQUEST['register_grado_acudiente']);
    $documento = $_REQUEST['register_documento'];
    $nombres = $_REQUEST['register_nombres'];
    $apellidos = $_REQUEST['register_apellidos'];
    //echo $idgra;
    
    if ($idgra_solicitado == 0 || $idgra_solicitado < $idgra) {
        $idgra_solicitado = $idgra;
    }
    
    $nombre_completo = $apellidos." ".$nombres;
    
    $acudiente = $_REQUEST['register_nombresA'];
    $celA = $_REQUEST['register_celularA'];
    $emailA = $_REQUEST['register_correoA'];
    
    $respuesta = $_REQUEST['register_pregunta'];
    if ($respuesta == "") {
        $respuesta = "Sin respuesta";
    }
    
    //Se buscan los grados
    $sql_grados = "SELECT a.grado grado_sistema, b.grado grado_solicitado 
    FROM (SELECT grado, '1' codigo FROM grados WHERE id = $idgra) a, (SELECT grado, '1' codigo FROM grados WHERE id = $idgra_solicitado) b 
    WHERE a.codigo = b.codigo";
    $res_grados = $mysqli1->query($sql_grados);
    while($row_grados = $res_grados->fetch_assoc()){
        $gra_sistema = $row_grados['grado_sistema'];
        $gra_solicitado = $row_grados['grado_solicitado'];
    }
    
    date_default_timezone_set('America/Bogota');
    $dia=date("d");
    $mes=date("m");
    $mesLetra=date("M");
    $fanio=date("Y");
    //$faniop=date("Y");
    $espaniol="";
    //echo $fanio;
    $fecha2 = $fanio."/".$mes."/". $dia;
    
    $sql_insert0 = "INSERT INTO tbl_cupos (n_documento, apellidos, nombres, acudiente, telefono_acudiente, email_acudiente, id_grado_sistema, id_grado_solicitado, 
	    respuesta_pregunta, año, fecha_solicitud) 
	    VALUES 
        ('$documento', '$apellidos', '$nombres', '$acudiente', '$celA', '$emailA', $idgra, $idgra_solicitado, '$respuesta', 2023, '$fecha2')";
    //echo $sql_insert0;
    $res_insert0=$mysqli1->query($sql_insert0);
    
    //Se valida el insert
    $sql_valida_insert = "SELECT COUNT(1) ct FROM tbl_cupos WHERE n_documento = '$documento'";
    $res_valida_insert = $mysqli1->query($sql_valida_insert);
    while($row_insert = $res_valida_insert->fetch_assoc()){
        $ct = $row_insert['ct'];
    }
    if ($ct > 0) {
        $msg_insert = "OK";
    }
    else {
        $msg_insert = "NO";
    }
    
    //Se busca el correo institucional del estudiante
    $sql_correo = "SELECT email_institucional FROM estudiantes WHERE n_documento = '$documento'";
    $res_correo = $mysqli1->query($sql_correo);
    while($row_correo = $res_correo->fetch_assoc()){
        $email_est = $row_correo['email_institucional'];
    }
    
    // ###################### INICIO ENVIO DE CORREO ###################
    $mail = new PHPMailer(true);
    
    try {
        //echo $email;
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        //$mail->isSMTP();                                            // Send using SMTP
        //$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->Host       = 'smtp.hostinger.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = false;
        //$mail->Username   = 'numericopensamientoclei2@gmail.com';                     // SMTP username
        $mail->Username   = 'webmasterunicab@unicab.org';
        $mail->Password   = 'Web.mas2022';
        //$mail->Username   = 'sistemasunicab@gmail.com';
        //$mail->Password   = 'psfa0301';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 25;
    
        //Recipients
        $mail->setFrom('webmasterunicab@unicab.org');
        //$mail->addAddress('liliasda19@gmail.com');     // Add a recipient
        //$mail->addAddress('unicabfinanciera@gmail.com');     // Add a recipient
        $mail->addAddress($emailA);     // Add a recipient
        //$mail->addReplyTo('numericopensamientoclei2@gmail.com', 'FYI');
        $mail->addCC('matriculas@unicab.org');
        $mail->addCC('psico01@unicab.org');
        $mail->addCC('rectoria@unicab.org');
        $mail->addBCC('numericopensamientoclei2@gmail.com');
    
        // Attachments
        //$mail->addAttachment('../docenteunicab/dhonor/2020/prueba.pdf', 'prueba.pdf');
        //$mail->addAttachment($folder_correo.$nom_pdf, $nom_pdf);         // Add attachments
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'CONFIRMACION CUPO APARTADO PARA EL AÑO 2023';
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
            
        $mail->Body    = '<p>Señor(a): '.strtoupper($acudiente).'</p>
            <br><p>Este es un envío de correo automático de UNICAB COLEGIO VIRTUAL.</p>
            <p>Su solicitud de cupo apartado para el año 2023 del estudiante '.strtoupper($nombre_completo).' fue exitoso.</p>
            <p>Solicitud ingresada con los siguientes datos:</p>
            <p><ul>
            <li>Documento estudiante: '.$documento.'</li>
            <li>Grado según sistema: '.$gra_sistema.'</li>
            <li>Grado solicitado por el acudiente: '.$gra_solicitado.'</li>
            <li>Acudiente: '.strtoupper($acudiente).'</li>
            <li>Celular Acudiente: '.$celA.'</li>
            </ul></p>
            <p>Las matrículas las estaremos anunciando para el mes de diciembre.</p>
            <br><p>--</p>
            <p>Áreas de Admisiones</p>
            <p>UNICAB COLEGIO VIRTUAL</p>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        //<br><p>Este es un envío de correo automático de UNICAB COLEGIO VIRTUAL. <strong>Por favor tener en cuenta éste último correo.</strong></p>
    
        $mail->send();
        //echo 'Message has been sent';
        $msg_correo = "CorreoOK";
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        $msg_correo = "CorreoError";
        //$msg_correo = $mail->ErrorInfo;
    }
    
    // ###################### FIN ENVIO DE CORREO ###################
    
    //$resultado = $msg_correo1."_".$msg_estudiante."_".$msg_matricula;
    $resultado = $msg_correo."_".$emailA."_".$msg_insert."_".$documento."_".$email_est;
    echo "<br>".$resultado;
    
    
    //redireccionamos a la misma url conforme se ha enviado correctamente con la variable si
	header('Location: resultado_pre_cupo.php?s='.$resultado);
    	
?>

