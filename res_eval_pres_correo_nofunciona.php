<?php
    include "admin-unicab/php/conexion.php";
    require "registro/docenteunicab/updreg/1cc3s4db.php";
    header("Cache-Control: no-store");
    //https://unicab.org/res_eval_pres_correo.php?n_documento=999999&idgra=10
    
    include 'registro/docenteunicab/updreg/mpdf8/vendor/autoload.php';
    
    require('registro/financieraunicab/PHPMailer_master/src/Exception.php');
    require('registro/financieraunicab/PHPMailer_master/src/PHPMailer.php');
    require('registro/financieraunicab/PHPMailer_master/src/SMTP.php');
    use  PHPMailer\PHPMailer\PHPMailer ;
    use  PHPMailer\PHPMailer\SMTP ;
    use  PHPMailer\PHPMailer\Exception ;
    
    //'A0'- 'A10', 'B0'- 'B10', 'C0'-'C10'
    //'4A0', '2A0', 'RA0'- 'RA4', 'SRA0'-'SRA4'
    //'Letter', 'Legal', 'Executive','Folio'
    //'Demy', 'Royal'
    //'A' (Tapa blanda tipo A 111x178mm)
    //'B' (Tapa blanda tipo B 128x198mm)
    //'Ledger'*, 'Tabloid'*
    //Todos los valores anteriores se pueden agregar como sufijo '-L'para forzar un documento de orientación de página horizontal, por ejemplo 'A4-L'.
    
    //$mpdf = new mPDF('c', 'Letter-L');
    $mpdf = new \Mpdf\Mpdf(["format" => "Letter", "margin_left" => 10, "margin_right" => 10, "margin_top" => 10, "margin_bottom" => 0]);
    $mpdf->SetDisplayMode('fullpage');
    
    $documento = $_REQUEST['n_documento'];
    $idgra = $_REQUEST['idgra'];
    //echo $documento;
    
    date_default_timezone_set('America/Bogota');
    $dia=date("d");
    $mes=date("m");
    $mesLetra=date("M");
    $fanio=date("Y");
    
    //Se consulta nombres y apellidos del documento
    $sql_n = "SELECT e.id, e.nombres, e.apellidos, e.email_acudiente_1, e.acudiente_1 
    FROM estudiantes e 
    WHERE e.n_documento = '$documento'";
	//echo $sql_n;
	$exe_n = mysqli_query($conexion,$sql_n);
	while ($row_n = mysqli_fetch_array($exe_n)) {
	    $nombre_completo = $row_n['nombres']." ".$row_n['apellidos'];
	    $email_a = $row_n['email_acudiente_1'];
	    $acudiente = $row_n['acudiente_1'];
	}
	//echo $nombre_completo;
	
	//Se consulta el nombre del grado
	$sql_grado = "SELECT * FROM equivalence_idgra WHERE id_grado_ra = $idgra";
	$exe_grado = mysqli_query($conexion,$sql_grado);
	while ($row_grado = mysqli_fetch_array($exe_grado)) {
	    $grado_ra = $row_grado['grado_ra'];
	}
    
    //Se consulta el resultado de las preguntas
    $sql = "SELECT m.materia, p.pregunta, r.respuesta, r.resultado, 
    case r.resultado when 'OK' then 'MUY BIEN' else p.retroalimentacion end comentarios
    FROM tbl_respuestas r, tbl_preguntas p, materias m 
    WHERE r.id_pregunta = p.id AND r.id_materia = m.id 
    AND r.a = $fanio AND r.identificacion = '$documento'";
	//echo $sql;
	
	//Se hace la consulta de las recomendaciones para numérico
	$sql_retro_num = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 5";
	
	//Se hace la consulta de las recomendaciones para bioético
    $sql_retro_bio = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 1";
    
    //Se hace la consulta de las recomendaciones para social
    $sql_retro_soc = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 4";
    
    //Se hace la consulta de las recomendaciones para español
    $sql_retro_esp = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 6";
    
    //Se hace la consulta de las recomendaciones para inglés
    $sql_retro_ing = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 7";
    
    //Se hace la consulta de las recomendaciones para tecnológico
    $sql_retro_tec = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 9";
    
    //Se hace la consulta de las recomendaciones para física
    $sql_retro_fis = "SELECT DISTINCT p.retroalimentacion 
    FROM tbl_respuestas r, tbl_preguntas p 
    WHERE r.id_pregunta = p.id 
    AND r.resultado = 'NO' AND r.identificacion ='$documento' AND r.a = $fanio AND r.id_materia = 11";
    
    //***************************************************************************************************************************
    
    $content = '<html>';
    $content .= '<head>';
    $content .= '<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
                 <link rel="stylesheet" href="assets/vendor/fontawesome/css/font-awesome.min.css">
                 <link id="cbx-style" data-layout="1" rel="stylesheet" href="assets/css/style-default.min.css" media="all">';
    $content .= '<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
                 <script type="text/javascript" src="registro/docenteunicab/updreg/js/gridviewscroll.js"></script>
            	 <script type="text/javascript" src="registro/docenteunicab/updreg/js/Chart.bundle.min.js"></script>';
    $content .= '<script>
                    var gridViewScroll = null;
                    $(function() {
                        var options = new GridViewScrollOptions();
                        options.elementID = "tblres";
                        options.width = 100%;
                        options.height = 300;
                        options.freezeColumn = true;
                        options.freezeColumnCssClass = "GridViewScrollItemFreeze";
                        options.freezeColumnCount = 2;
            
                        gridViewScroll = new GridViewScroll(options);
                        gridViewScroll.enhance();
                    });
                 </script>';
                 
    $content .= '<style>';
    $content .= '.fa-hand-o-right {color: red;}';
    $content .= '#divnum {background: #CEF6F5;}
                 #divtec {background: #F5A9A9;}
                 #diving {background: #F3F781;}
                 #divesp {background: #F7BE81;}
                 #divbio {background: #F6CECE;}
                 #divfis {background: #A9F5A9;}
                 #divsoc {background: #D8D8D8;}';
    $content .= '#tblres {table-layout: fixed;}
                 #tblres .tdcorto {width: 80px; text-align: center;}
                 #tblres .tdmedio {width: 200px;}';
    $content .= '.GridViewScrollHeader TH, .GridViewScrollHeader TD {padding: 5px; font-weight: bold; background-color: #CCCCCC; color: #000000;}';
    $content .= '.GridViewScrollItem TD {padding: 5px; color: #444444;}';
    $content .= '.GridViewScrollItemFreeze TD {padding: 5px; background-color: #CCCCCC; color: #444444;}';
    
    $content .= '</style>';
    $content .= '</head><body>';
    
    $content1 = '';
    $content1 .= '<div">';
        $content1 .= '<div">';
            $content1 .= '<h3><span class="badge badge-success">Hola </span> '.$nombre_completo.'</h3>';
            $content1 .= '<div>';
                $content1 .= '<div class="row">';
                    $content1 .= '<p><i class="fa fa-hand-o-right "></i> <strong>Este es el resultado de tu evaluación de presaberes.</strong></p>';
                $content1 .= '</div>';
                $content1 .= '<div>';
                    $content1 .= '<table id="tblres" border="1px" class="table" style="width:100%">';
                        $content1 .= '<thead>';
                            $content1 .= '<tr class="GridViewScrollHeader">';
                                $content1 .= '<td class="tdmedio">Materia</td>
    						                  <td>Pregunta</td>
    						                  <td class="tdcorto">Resultado</td>';
                            $content1 .= '</tr>';
                        $content1 .= '</thead>';
                        $content1 .= '<tbody>';
                        $peticion = mysqli_query($conexion,$sql);
                        while ($fila = mysqli_fetch_array($peticion)){
                            if($fila['resultado'] == "NO") {
                                $content1 .= '<tr class="GridviewScrollItem">';
                                $content1 .= '<td>'.$fila['materia'].'</td>';
                                $content1 .= '<td>'.$fila['pregunta'].'</td>';
                                $content1 .= '<td class="tdcorto"><img src="registro/images/denegado.png" width="25px"/></td></tr>';
			        		}
			        		else if($fila['resultado'] == "OK") {
			        		    $content1 .= '<tr class="GridviewScrollItem">';
                                $content1 .= '<td>'.$fila['materia'].'</td>';
                                $content1 .= '<td>'.$fila['pregunta'].'</td>';
                                $content1 .= '<td class="tdcorto"><img src="registro/images/verificado.png" width="25px"/></td></tr>';
			        		}
                        }
                        $content1 .= '</tbody>';
                    $content1 .= '</table>';
                $content1 .= '</div>';
            $content1 .= '</div><br>';
            
            $content1 .= '<h3><span class="badge badge-success">Hoja de ruta sugerida para reforzar conceptos </span></h3>';
            $content1 .= '<div class="row">';
                $content1 .= '<div id="divnum" class="col-6 col-sm-6">';
                    $content1 .= '<h4>Numérico</h4>';
                    $content1 .= '<ul class="list-group">';
                        $exe_retro_num = mysqli_query($conexion,$sql_retro_num);
                        while($row_retro_num = mysqli_fetch_array($exe_retro_num)) {
                            $content1 .= '<li class="list-group-item"><i class="fa fa-hand-o-right "></i> '.$row_retro_num['retroalimentacion'].'</li>';
                        }
                    $content1 .= '</ul><br>';
                $content1 .= '</div>';
                $content1 .= '<div id="divtec" class="col-6 col-sm-6">';
                    $content1 .= '<h4>Tecnológico</h4>';
                    $content1 .= '<ul class="list-group">';
                        $exe_retro_tec = mysqli_query($conexion,$sql_retro_tec);
                        while($row_retro_tec = mysqli_fetch_array($exe_retro_tec)) {
                            $content1 .= '<li class="list-group-item"><i class="fa fa-hand-o-right "></i> '.$row_retro_tec['retroalimentacion'].'</li>';
                        }
                    $content1 .= '</ul><br>';
                $content1 .= '</div>';
                $content1 .= '<div id="diving" class="col-6 col-sm-6">';
                    $content1 .= '<h4>Inglés</h4>';
                    $content1 .= '<ul class="list-group">';
                        $exe_retro_ing = mysqli_query($conexion,$sql_retro_ing);
                        while($row_retro_ing = mysqli_fetch_array($exe_retro_ing)) {
                            $content1 .= '<li class="list-group-item"><i class="fa fa-hand-o-right "></i> '.$row_retro_ing['retroalimentacion'].'</li>';
                        }
                    $content1 .= '</ul><br>';
                $content1 .= '</div>';
                $content1 .= '<div id="divesp" class="col-6 col-sm-6">';
                    $content1 .= '<h4>Español</h4>';
                    $content1 .= '<ul class="list-group">';
                        $exe_retro_esp = mysqli_query($conexion,$sql_retro_esp);
                        while($row_retro_esp = mysqli_fetch_array($exe_retro_esp)) {
                            $content1 .= '<li class="list-group-item"><i class="fa fa-hand-o-right "></i> '.$row_retro_esp['retroalimentacion'].'</li>';
                        }
                    $content1 .= '</ul><br>';
                $content1 .= '</div>';
                $content1 .= '<div id="divbio" class="col-6 col-sm-6">';
                    $content1 .= '<h4>Bioético</h4>';
                    $content1 .= '<ul class="list-group">';
                        $exe_retro_bio = mysqli_query($conexion,$sql_retro_bio);
                        while($row_retro_bio = mysqli_fetch_array($exe_retro_bio)) {
                            $content1 .= '<li class="list-group-item"><i class="fa fa-hand-o-right "></i> '.$row_retro_bio['retroalimentacion'].'</li>';
                        }
                    $content1 .= '</ul><br>';
                $content1 .= '</div>';
                $content1 .= '<div id="divfis" class="col-6 col-sm-6">';
                    $content1 .= '<h4>Física</h4>';
                    $content1 .= '<ul class="list-group">';
                        $exe_retro_fis = mysqli_query($conexion,$sql_retro_fis);
                        while($row_retro_fis = mysqli_fetch_array($exe_retro_fis)) {
                            $content1 .= '<li class="list-group-item"><i class="fa fa-hand-o-right "></i> '.$row_retro_fis['retroalimentacion'].'</li>';
                        }
                    $content1 .= '</ul><br>';
                $content1 .= '</div>';
                $content1 .= '<div id="divsoc" class="col-6 col-sm-6">';
                    $content1 .= '<h4>Social</h4>';
                    $content1 .= '<ul class="list-group">';
                        $exe_retro_soc = mysqli_query($conexion,$sql_retro_soc);
                        while($row_retro_soc = mysqli_fetch_array($exe_retro_soc)) {
                            $content1 .= '<li class="list-group-item"><i class="fa fa-hand-o-right "></i> '.$row_retro_soc['retroalimentacion'].'</li>';
                        }
                    $content1 .= '</ul><br>';
                $content1 .= '</div>';
            $content1 .= '</div>';
        $content1 .= '</div>';
    $content1 .= '</div>';
    
    $content1 .= '</body></html>';
    
    $nom_pdf = "ep_".$grado_ra."_".str_replace(" ","_",$nombre_completo)."_".$fanio.".pdf";
    
    $mpdf->WriteHTML($content.$content1);
    echo $content;
    echo $content1;
    
    //Se crea la carpeta
    $path = 'eval_pres/'.$fanio.'/'.str_replace(" ","_",$grado_ra).'/';
    //echo $path;
    if (!file_exists($path)) {
        mkdir($path, 0755, true);
    }
    
    $folder0 = '/eval_pres/'.$fanio.'/'.str_replace(" ","_",$grado_ra).'/';
    //echo $folder0;
    $folder_correo = 'eval_pres/'.$fanio.'/'.str_replace(" ","_",$grado_ra).'/';
    $folder = __DIR__.$folder0;
    //echo $nom_pdf;
    //echo "<br>".$folder;
    $ruta = "https://unicab.org".$folder0.$nom_pdf;
    //echo "<br>".$ruta;
    
    // I = Inline; D = Download; F = File; S = Cadena
    //$mpdf->Output($nom_pdf, 'I');
    $mpdf->Output($folder.$nom_pdf, 'F');
    //echo "hasta aquí OK";
    
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
        //$mail->Username   = 'unicabfinanciera@gmail.com';
        //$mail->Password   = 'Financiera2020#';
        $mail->Username   = 'sistemasunicab@gmail.com';
        $mail->Password   = 'psfa0301';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 25;
    
        //Recipients
        $mail->setFrom('sistemasunicab@gmail.com');     //Debe ser igual al Username
        //$mail->addAddress('liliasda19@gmail.com');     // Add a recipient
        //$mail->addAddress('unicabfinanciera@gmail.com');     // Add a recipient
        $mail->addAddress($email_a);     // Add a recipient
        //$mail->addReplyTo('numericopensamientoclei2@gmail.com', 'FYI');
        //$mail->addCC('cc@example.com');
        $mail->addBCC('numericopensamientoclei2@gmail.com');
    
        // Attachments
        //$mail->addAttachment('../docenteunicab/dhonor/2020/prueba.pdf', 'prueba.pdf');
        $mail->addAttachment($folder_correo.$nom_pdf, $nom_pdf);         // Add attachments
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'RESULTADOS EVALUACION DE PRESABERES '.$fanio;
        $mail->Body    = '<p>Señor(a): '.strtoupper($acudiente).'</p>
            <p>Este es un envío de correo automático de UNICAB COLEGIO VIRTUAL.</p>
            <p>A continuación encontrará un documento pdf con el resultado de la evaluación de presaberes de '.$nombre_completo.'.</p>
            <p>Al final encontrará una hoja de ruta sugerida para que investiguen esos conceptos, que son necesarios para desarrollar las actividades 
            de todos los pensamientos para el grado '.$grado_ra.'</p>
            <p>--</p>
            <p>Áreas de Admisiones y Sistemas</p>
            <p>UNICAB COLEGIO VIRTUAL</p>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        //$mail->send();
        //echo 'Message has been sent';
        $msg_correo = "CorreoOK";
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        $msg_correo = "CorreoError";
    }
    
    // ###################### FIN ENVIO DE CORREO ###################
    
    $mpdf = new \Mpdf\Mpdf(["format" => "Letter", "margin_left" => 10, "margin_right" => 10, "margin_top" => 10, "margin_bottom" => 0]);
    $mpdf->SetDisplayMode('fullpage');
    
    //***************************************************************************************************************************
    
    //redireccionamos a la misma url conforme se ha enviado correctamente con la variable si
	//header('location.href = "resultado_eval_pres.php?n_documento='.$documento.'"');
    	
?>

