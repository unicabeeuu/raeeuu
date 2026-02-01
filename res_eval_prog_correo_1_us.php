<?php
    include "admin-unicab/php/conexion.php";
    require "registro/docenteunicab/updreg/1cc3s4db.php";
    header("Cache-Control: no-store");
    //https://unicab.org/res_eval_val_correo_1.php?n_documento=1111&idgra=3
    //https://unicab.org/res_eval_prog_correo_1_us.php?n_documento=1013269543&idgra=6
    
    require_once 'registro/docenteunicab/updreg/dompdf/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    
    class PDF {
        public static function stream($nom_pdf, $html) {
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait'); // (Opcional) Configurar papel y orientación landscape | portrait
            $dompdf->render(); // Generar el PDF desde contenido HTML
            $pdf = $dompdf->output(); // Obtener el PDF generado
            $dompdf->stream($nom_pdf); // Enviar el PDF generado al navegador
        }
        
        public static function saveDisk($nom_pdf, $html, $folder) {
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait'); // (Opcional) Configurar papel y orientación landscape | portrait
            $dompdf->render(); // Generar el PDF desde contenido HTML
            $pdf = $dompdf->output(); // Obtener el PDF generado
            
            $pdf_guardar = $folder.$nom_pdf;
            //echo $pdf_guardar;
            
            if(!file_exists($folder)) {
                if(mkdir($folder, 0755, true)) {
                    file_put_contents($pdf_guardar, $pdf);
                }
            }
            else {
                file_put_contents($pdf_guardar, $pdf);
            }
        }
    }
    
    require('registro/financieraunicab/PHPMailer_master/src/Exception.php');
    require('registro/financieraunicab/PHPMailer_master/src/PHPMailer.php');
    require('registro/financieraunicab/PHPMailer_master/src/SMTP.php');
    use  PHPMailer\PHPMailer\PHPMailer ;
    use  PHPMailer\PHPMailer\SMTP ;
    use  PHPMailer\PHPMailer\Exception ;
    
    $documento = $_REQUEST['n_documento'];
    $idgra = $_REQUEST['idgra'];
    //echo $documento;
    
    date_default_timezone_set('America/Bogota');
    $dia=date("d");
    $mes=date("m");
    $mesLetra=date("M");
    $fanio=date("Y");
    
    //$array_materiasf = array(1, 4, 5, 6, 7, 9, 11);
	$array_materias = array(348, 349, 350, 351, 352);
	//$array_materias_1011 = array(10, 12, 5, 15, 7, 9);
	//$array_materias_1011f = array(10, 12, 5, 15, 7, 9, 11);
    
    //Se consulta nombres y apellidos del documento
    $sql_n = "SELECT * FROM tbl_eval_cargos WHERE documento = '$documento'";
	//echo $sql_n;
	$exe_n = mysqli_query($conexion,$sql_n);
	while ($row_n = mysqli_fetch_array($exe_n)) {
	    $nombre_completo = $row_n['nombre_completo'];
	    $email = $row_n['email'];
	    //$acudiente = $row_n['nombre_a'];
	}
	//echo $nombre_completo;
	
	//********************* SE FINAIZAN LAS RESPUESTAS ***************************
	$sql_updfin = "UPDATE tbl_respuestas_val SET estado = 'FINALIZADA' WHERE identificacion = '$documento' AND a = $fanio AND resultado != 'NA' AND id_grado = $idgra";
	$exe_updfin = mysqli_query($conexion,$sql_updfin);
	//***************************************************************************
	
	//Se consulta el nombre del grado
	$sql_grado = "SELECT * FROM grados WHERE id = $idgra";
	//echo $sql_grado;
	$exe_grado = mysqli_query($conexion,$sql_grado);
	while ($row_grado = mysqli_fetch_array($exe_grado)) {
	    $grado_ra = str_replace(" ", "_", $row_grado['grado']);
	}	
	//echo $grado_ra;
	$array_materias_final = $array_materias;
    
    //Se consulta el resultado de las preguntas
    $sql = "SELECT m.tema, p.pregunta, r.respuesta, r.resultado, 
    case r.resultado when 'OK' then 'MUY BIEN' else p.retroalimentacion end comentarios
    FROM tbl_respuestas_val r, tbl_preguntas p, tbl_temas_preguntas m 
    WHERE r.id_pregunta = p.id AND r.id_materia = m.id 
    AND r.a = $fanio AND r.identificacion = '$documento' AND r.id_grado = $idgra";
	//echo $sql;
	
	//Se hacen los conteos generales
    $conteos = array(ctok=>0, ctno=>0, ctna=>0);
    $resumen = new stdClass();
    $resumen->html = $conteos;
    $resumen->css = $conteos;
    $resumen->js = $conteos;
    $resumen->htmlcss = $conteos;
	$resumen->jq = $conteos;
    $obj_json = json_encode($resumen, JSON_UNESCAPED_UNICODE);
    $obj_json_decode = json_decode($obj_json, true);
    //echo $obj_json;
    
    //Totales por tema
    $tothtml = 0;
    $totcss = 0;
    $totjs = 0;
    $tothtmlcss = 0;
	$totjq = 0;
    $total_todos = 0;
    $total_todos_ok = 0;
    
    //Nivel por tema
    $nivhtml = "";
    $nivcss = "";
    $nivjs = "";
    $nivhtmlcss = "";
	$nivjq = "";
    $nivglo = "";
    
    $colhtml = "";
    $colcss = "";
    $coljs = "";
    $colhtmlcss = "";
	$coljq = "";
    $colglo = "";
    
    $tot_ok = 0;
    $tot_gen = 0;
    $sql_ctok = "SELECT COUNT(1) ct_ok, identificacion, id_materia FROM tbl_respuestas_val WHERE resultado = 'OK' AND identificacion = '$documento' 
    AND a = $fanio AND id_grado = $idgra GROUP BY identificacion, id_materia";
    //echo $sql_ctok;
    $exe_ctok = $mysqli1->query($sql_ctok);
    while($row_ctok = $exe_ctok->fetch_assoc()) {
        //echo "control";
        if($row_ctok['id_materia'] == 348) {
            $obj_json_decode['html']['ctok'] = $row_ctok['ct_ok'];
            $tothtml += $row_ctok['ct_ok'];
            $total_todos_ok += $row_ctok['ct_ok'];
        }
        else if($row_ctok['id_materia'] == 349) {
            $obj_json_decode['css']['ctok'] = $row_ctok['ct_ok'];
            $totcss += $row_ctok['ct_ok'];
            $total_todos_ok += $row_ctok['ct_ok'];
        }
        else if($row_ctok['id_materia'] == 350) {
            $obj_json_decode['js']['ctok'] = $row_ctok['ct_ok'];
            $totjs += $row_ctok['ct_ok'];
            $total_todos_ok += $row_ctok['ct_ok'];
        }
        else if($row_ctok['id_materia'] == 351) {
            $obj_json_decode['htmlcss']['ctok'] = $row_ctok['ct_ok'];
            $tothtmlcss += $row_ctok['ct_ok'];
            $total_todos_ok += $row_ctok['ct_ok'];
        }
		else if($row_ctok['id_materia'] == 352) {
            $obj_json_decode['jq']['ctok'] = $row_ctok['ct_ok'];
            $totjq += $row_ctok['ct_ok'];
            $total_todos_ok += $row_ctok['ct_ok'];
        }
        //echo "control1";
        $tot_ok += $row_ctok['ct_ok'];
        $tot_gen += $row_ctok['ct_ok'];
    }
    //echo $tot_ok;
    //echo $tot_gen;
    
    $sql_ctno = "SELECT COUNT(1) ct_no, identificacion, id_materia FROM tbl_respuestas_val WHERE resultado = 'NO' AND identificacion = '$documento' 
    AND a = $fanio AND id_grado = $idgra GROUP BY identificacion, id_materia";
    //echo $sql_ctno;
    $exe_ctno = $mysqli1->query($sql_ctno);
    while($row_ctno = $exe_ctno->fetch_assoc()) {
        if($row_ctno['id_materia'] == 348) {
            $obj_json_decode['html']['ctno'] = $row_ctno['ct_no'];
            $tothtml += $row_ctno['ct_no'];
        }
        else if($row_ctno['id_materia'] == 349) {
            $obj_json_decode['css']['ctno'] = $row_ctno['ct_no'];
            $totcss += $row_ctno['ct_no'];
        }
        else if($row_ctno['id_materia'] == 350) {
            $obj_json_decode['js']['ctno'] = $row_ctno['ct_no'];
            $totjs += $row_ctno['ct_no'];
        }
        else if($row_ctno['id_materia'] == 351) {
            $obj_json_decode['htmlcss']['ctno'] = $row_ctno['ct_no'];
            $tothtmlcss += $row_ctno['ct_no'];
        }
        else if($row_ctno['id_materia'] == 352) {
            $obj_json_decode['jq']['ctno'] = $row_ctno['ct_no'];
            $totjq += $row_ctno['ct_no'];
        }
        $tot_gen += $row_ctno['ct_no'];
    }
    //echo $tot_ok;
    //echo $tot_gen;
    
    $sql_ctna = "SELECT COUNT(1) ct_na, identificacion, id_materia FROM tbl_respuestas_val WHERE resultado = 'NA' AND identificacion = '$documento' 
    AND a = $fanio AND id_grado = $idgra GROUP BY identificacion, id_materia";
    $exe_ctna = $mysqli1->query($sql_ctna);
    while($row_ctna = $exe_ctna->fetch_assoc()) {
        if($row_ctna['id_materia'] == 348) {
            $obj_json_decode['html']['ctna'] = $row_ctna['ct_na'];
            $tothtml += $row_ctna['ct_na'];
        }
        else if($row_ctna['id_materia'] == 349) {
            $obj_json_decode['css']['ctna'] = $row_ctna['ct_na'];
            $totcss += $row_ctna['ct_na'];
        }
        else if($row_ctna['id_materia'] == 350) {
            $obj_json_decode['js']['ctna'] = $row_ctna['ct_na'];
            $totjs += $row_ctna['ct_na'];
        }
        else if($row_ctna['id_materia'] == 351) {
            $obj_json_decode['htmlcss']['ctna'] = $row_ctna['ct_na'];
            $tothtmlcss += $row_ctna['ct_na'];
        }
        else if($row_ctna['id_materia'] == 352) {
            $obj_json_decode['jq']['ctna'] = $row_ctna['ct_na'];
            $totjq += $row_ctna['ct_na'];
        }
        $tot_gen += $row_ctna['ct_na'];
    }
    //echo $tot_gen;
    
    //echo $obj_json_decode['num']['ctok'] + $obj_json_decode['num']['ctno'] + $obj_json_decode['num']['ctna'];
    
    $obj_json_decode['html']['ctpen'] = $tothtml;
    $obj_json_decode['css']['ctpen'] = $totcss;
    $obj_json_decode['js']['ctpen'] = $totjs;
    $obj_json_decode['htmlcss']['ctpen'] = $tothtmlcss;
	$obj_json_decode['jq']['ctpen'] = $totjq;
    
    $total_todos = $tothtml + $totcss + $totjs + $tothtmlcss + $totjq;
    
    if($obj_json_decode['html']['ctok'] / $tothtml > 0.75) {
        $nivhtml = "SUPER ALTO";
        $colhtml = "#138726";
    }
    else if($obj_json_decode['html']['ctok'] / $tothtml > 0.5) {
        $nivhtml = "ALTO";
        $colhtml = "#4b9db9";
    }
    else if($obj_json_decode['html']['ctok'] / $tothtml > 0.25) {
        $nivhtml = "MEDIO";
        $colhtml = "#FFC300";
    }
    else {
        if($tothtml > 0) {
            $nivhtml = "BAJO";
            $colhtml = "#e8222e";
        }
        else {
            $nivhtml = "NO APLICA";
            $colhtml = "#000";
        }
    }
    
    if($obj_json_decode['css']['ctok'] / $totcss > 0.75) {
        $nivcss = "SUPER ALTO";
        $colcss = "#138726";
    }
    else if($obj_json_decode['css']['ctok'] / $totcss > 0.5) {
        $nivcss = "ALTO";
        $colcss = "#4b9db9";
    }
    else if($obj_json_decode['css']['ctok'] / $totcss > 0.25) {
        $nivcss = "MEDIO";
        $colcss = "#FFC300";
    }
    else {
        if($totcss > 0) {
            $nivcss = "BAJO";
            $colcss = "#e8222e";
        }
        else {
            $nivcss = "NO APLICA";
            $colcss = "#000";
        }
    }
    
    if($obj_json_decode['js']['ctok'] / $totjs > 0.75) {
        $nivjs = "SUPER ALTO";
        $coljs = "#138726";
    }
    else if($obj_json_decode['js']['ctok'] / $totjs > 0.5) {
        $nivjs = "ALTO";
        $coljs = "#4b9db9";
    }
    else if($obj_json_decode['js']['ctok'] / $totjs > 0.25) {
        $nivjs = "MEDIO";
        $coljs = "#FFC300";
    }
    else {
        if($totjs > 0) {
            $nivjs = "BAJO";
            $coljs = "#e8222e";
        }
        else {
            $nivjs = "NO APLICA";
            $coljs = "#000";
        }
    }
    
    if($obj_json_decode['htmlcss']['ctok'] / $tothtmlcss > 0.75) {
        $nivhtmlcss = "SUPER ALTO";
        $colhtmlcss = "#138726";
    }
    else if($obj_json_decode['htmlcss']['ctok'] / $tothtmlcss > 0.5) {
        $nivhtmlcss = "ALTO";
        $colhtmlcss = "#4b9db9";
    }
    else if($obj_json_decode['htmlcss']['ctok'] / $tothtmlcss > 0.25) {
        $nivhtmlcss = "MEDIO";
        $colhtmlcss = "#FFC300";
    }
    else {
        if($tothtmlcss > 0) {
            $nivhtmlcss = "BAJO";
            $colhtmlcss = "#e8222e";
        }
        else {
            $nivhtmlcss = "NO APLICA";
            $colhtmlcss = "#000";
        }
    }
	
	if($obj_json_decode['jq']['ctok'] / $totjq > 0.75) {
        $nivjq = "SUPER ALTO";
        $coljq = "#138726";
    }
    else if($obj_json_decode['jq']['ctok'] / $totjq > 0.5) {
        $nivjq = "ALTO";
        $coljq = "#4b9db9";
    }
    else if($obj_json_decode['jq']['ctok'] / $totjq > 0.25) {
        $nivjq = "MEDIO";
        $coljq = "#FFC300";
    }
    else {
        if($totjq > 0) {
            $nivjq = "BAJO";
            $coljq = "#e8222e";
        }
        else {
            $nivjq = "NO APLICA";
            $coljq = "#000";
        }
    }
    
    if($total_todos_ok / $total_todos > 0.75) {
        $nivglo = "SUPER ALTO";
        $colglo = "#138726";
    }
    else if($total_todos_ok / $total_todos > 0.5) {
        $nivglo = "ALTO";
        $colglo = "#4b9db9";
    }
    else if($total_todos_ok / $total_todos > 0.25) {
        $nivglo = "MEDIO";
        $colglo = "#FFC300";
    }
    else {
        $nivglo = "BAJO";
        $colglo = "#e8222e";
    }
    
    $porc = round(($tot_ok / $tot_gen),2) * 100;
    //echo $porc;
    
    //Se actualiza el resultado en la tabla tbl_eval_cargos
    if($porc >= 80) {
        $sql_updval = "UPDATE tbl_eval_cargos SET resultado = 'APROBADO' WHERE documento = '$documento' AND id_grado = $idgra";
    }
    else {
        $sql_updval = "UPDATE tbl_eval_cargos SET resultado = 'NO APROBADO' WHERE documento = '$documento' AND id_grado = $idgra";
    }
    $exe_updval = $mysqli1->query($sql_updval);
    
    
    //***************************************************************************************************************************
    
    $content = '<html>';
    $content .= '<head>';
    $content .= '<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
                 <link rel="stylesheet" href="assets/vendor/fontawesome/css/font-awesome.min.css">';
    $content .= '<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
                 <script type="text/javascript" src="registro/docenteunicab/updreg/js/Chart.bundle.min.js"></script>';
    $content .= '<style>';
    $content .= '.fa-chevron-right {color: blue;}';
    $content .= '#divnum {background: #CEF6F5;}
                 #divtec {background: #F5A9A9;}
                 #diving {background: #F3F781;}
                 #divesp {background: #F7BE81;}
                 #divbio {background: #F6CECE;}
                 #divfis {background: #A9F5A9;}
                 #divsoc {background: #D8D8D8;}';
    $content .= '#tblres .tdcorto {width: 80px; text-align: center;}
                 #tblres .tdmedio {width: 150px;}';
    //$content .= 'thead {padding: 5px; font-weight: bold; background-color: #CCCCCC; color: #000000;}';
    //$content .= 'td {font-size: 10px;}';
    $content .= 'ul {margin: 0; padding: 0; list-style: none; text-indent: -1;}';
    $content .= 'li {background: white; border-bottom: 1px solid black; font-size: 12px; list-style: none;}';
    $content .= '.txtct {width: 20px; border: 0; color: black; font-weight: bold; font-size: 14px;}';
    $content .= '.txtct1 {width: 100px; border: 0; color: black; font-weight: bold; font-size: 14px;}';
    $content .= '#al {color: white;}';
    $content .= '#divenc2_1 {border: 3px solid #093A5F; width: 60%; padding-left: 10px; font-size: 14px;}';
    $content .= '#divenc2_2 {background: #54CF8C; width: 30%; text-align: center;}';
    $content .= ' @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap");';
    $content .= ' @import url("https://fonts.googleapis.com/css2?family=Poppins-medium:wght@500&display=swap");';
    $content .= ' @import url("https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap");';
    $content .= '#divglobal {display: flex; justify-content: center; text-align: center; background: #F1F1F2;}';
    $content .= '#tblglobal, thead {border: 2px solid black;}';
    
    $content .= '</style>';
    $content .= '</head><body>';
    
    $content1 = '';
    $content1 .= '<div">';
        $content1 .= '<div">';
            $content1 .= '<div id="divenc1">
					        <div>
					            <img src="registro/images/encabezado_informes1.jpg" width="100%"/>
					        </div>
					    </div><br>';
					    
			$content1 .= '<div id="divenc2">
			                <table>
			                    <tbody>
			                        <tr>
			                            <td id="divenc2_1">
			                                <p>Evaluación de Cargo</p>
            						        <p>Nombres y Apellidos: <strong>'.$nombre_completo.'</strong></p>
            						        <p>Documento: <strong>'.$documento.'</strong></p>
            						        <p>Cargo: <strong>'.$grado_ra.'</strong></p>
			                            </td>
			                            <td width="10px"></td>
			                            <td id="divenc2_2">
			                                <p style="font-size: 24px; font-style: italic; color: #093A5F; font-weight: bold;">GLOBAL</p>
						                    <p style="font-size: 18px; color: #093A5F; padding: 0 5px;">De '.$tot_gen.' puntos posibles, su puntaje global es de '.$tot_ok.'.</p>
			                            </td>
			                        </tr>
			                    </tbody>
			                </table>
						</div><br></br>';
						
            //$content1 .= '<h5><span class="badge badge-success">Hola </span> '.$nombre_completo.'</h5>';
            $content1 .= '<div>';
                /*$content1 .= '<div>';
                    $content1 .= '<p><i class="fa fa-chevron-right"></i> <strong>Este es el resultado de tu evaluación de validación para grado '.$grado_ra.'.</strong></p>';
                    $content1 .= '<p><i class="fa fa-chevron-right"></i> <strong>Resumen:</strong> (cantidad de preguntas bien contestadas, mal contestadas y no contestadas por pensamiento)</p>';
                $content1 .= '</div>';*/
                
                $content1 .= '<div style="width: 100%; background: #093A5F; color: #F1F1F2; text-align: center; font-size: 20px; font-weight: bold;">Informe Global</div>';
                $content1 .= '<div style="width: 100%; background: #F1F1F2; text-align: center; font-size: 20px;">
                                    <br><p>A continuación se relacionan los puntajes obtenidos en cada uno de los temas evaluados en la evaluación de cargo:</p><br>
                                </div>';
                
                $content1 .= '<div class="row" id="divglobal">';
                    $content1 .= '<table id="tblglobal" style="text-align: center; padding: 0 10px;">';
                        $content1 .= '<thead style="font-size: 16px; font-weight: bold; color: #064C86;">';
                            $content1 .= '<tr style="background: #45A872; color: #F1F1F2; font-size: 20px; font-weight: bold; border: 2px;"><td colspan="5">Temas</td></tr>';
                            $content1 .= '<tr>';
                                //$content1 .= '<td width="150px"></td>';
                                $content1 .= '<td colspan="2" width="280px" style="background: #FA4D59; color: #F1F1F2; font-size: 20px; font-weight: bold; border: 2px solid black;">Global</td>';
                                $content1 .= '<td width="140px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">HTML5</td>';
                                $content1 .= '<td width="140px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">CSS3</td>';
                                $content1 .= '<td width="140px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">JS</td>';
                            $content1 .= '</tr>';
                        $content1 .= '</thead>';
                        $content1 .= '<tbody>';
                            
                        
                            $content1 .= '<tr>';
                            $content1 .= '<td style="color: #064C86; border: 2px solid black;">Puntaje</td>';
                            $content1 .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$tot_ok.' / '.$tot_gen.'</td>';
                            $content1 .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['html']['ctok'].' / '.$obj_json_decode['html']['ctpen'].'</td>';
                            $content1 .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['css']['ctok'].' / '.$obj_json_decode['css']['ctpen'].'</td>';
                            $content1 .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['js']['ctok'].' / '.$obj_json_decode['js']['ctpen'].'</td>';
                            $content1 .= '</tr>';
                            //echo $linea;
                            
                            $content1 .= '<tr>';
                            $content1 .= '<td style="color: #064C86; border: 2px solid black;">Desempeño</td>';
                            $content1 .= '<td style="color: '.$colglo.'; border: 2px solid black; font-weight: bold;">'.$nivglo.'</td>';
                            $content1 .= '<td style="color: '.$colhtml.'; border: 2px solid black; font-weight: bold;">'.$nivhtml.'</td>';
                            $content1 .= '<td style="color: '.$colcss.'; border: 2px solid black; font-weight: bold;">'.$nivcss.'</td>';
                            $content1 .= '<td style="color: '.$coljs.'; border: 2px solid black; font-weight: bold;">'.$nivjs.'</td>';
                            $content1 .= '</tr><tr><td colspan="5"></td></tr>';
                            //echo $linea;
                            
                            $content1 .= '<tr style="font-size: 16px; font-weight: bold; color: #064C86;">';
                                $content1 .= '<td width="140px"></td>';
                                $content1 .= '<td width="140px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">HTML5CSS3</td>';
                                $content1 .= '<td width="140px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;">JQUERY</td>';
                                $content1 .= '<td width="140px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;"></td>';
                                $content1 .= '<td width="140px" style="background: #093A5F; color: #F1F1F2; font-weight: bold; border: 2px solid black;"></td>';
								//$content1 .= '<td></td><td></td><td></td>';
                            $content1 .= '</tr>';
                            
                            $content1 .= '<tr>';
                            $content1 .= '<td style="color: #064C86; border: 2px solid black;">Puntaje</td>';
                            $content1 .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['htmlcss']['ctok'].' / '.$obj_json_decode['htmlcss']['ctpen'].'</td>';
                            $content1 .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;">'.$obj_json_decode['jq']['ctok'].' / '.$obj_json_decode['jq']['ctpen'].'</td>';
                            $content1 .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;"></td>';
                            $content1 .= '<td style="border: 2px solid black; color: #093A5F; font-weight: bold;"></td>';
                            $content1 .= '</tr>';
                            //echo $linea;
                            
                            $content1 .= '<tr>';
                            $content1 .= '<td style="color: #064C86; border: 2px solid black;">Desempeño</td>';
                            $content1 .= '<td style="color: '.$colhtmlcss.'; border: 2px solid black; font-weight: bold;">'.$nivhtmlcss.'</td>';
                            $content1 .= '<td style="color: '.$coljq.'; border: 2px solid black; font-weight: bold;">'.$nivjq.'</td>';
                            $content1 .= '<td style="color: '.$coltec.'; border: 2px solid black; font-weight: bold;"></td>';
                            $content1 .= '<td style="color: '.$colfis.'; border: 2px solid black; font-weight: bold;"></td>';
                            $content1 .= '</tr>';
                            //$content1 .= '</tr><tr><td colspan="5" style="border: 2px solid #F1F1F2; color: #F1F1F2">Fila vacía</td></tr>';
                            //echo $linea;
                        
                        
                        $content1 .= '</tbody>';
                    $content1 .= '</table>';
                $content1 .= '</div><br><br>';
                
                //$content1 .= '<div><br><p><i class="fa fa-hand-o-right "></i> <strong>Detalle:</strong></p>';
                $content1 .= '<div class="row">';
                    $content1 .= '<p><strong style="color: #064C86; padding-left: 20px;">Convenciones:</strong> Contestadas bien <img src="registro/images/checked_1.jpg" height="25px"/>,'; 
                    $content1 .= ' Contestadas incorrectas <img src="registro/images/unchecked_1.jpg" width="25px"/>, No contestadas <img src="registro/images/na_1.jpg" width="25px"/></p>';
                $content1 .= '</div>';
                
                $content1 .= '<div style="width: 100%; background: #093A5F; color: #F1F1F2; text-align: center; font-size: 20px; font-weight: bold;">Informe por Tema</div>';
                    $content1 .= '<table id="tblres" border="1px" class="table" style="width:100%">';
                        $content1 .= '<thead>';
                            $content1 .= '<tr>';
                                $content1 .= '<th class="tdmedio">Tema</th>
    						                  <th>Pregunta</th>
    						                  <th class="tdcorto">Resultado</th>';
                            $content1 .= '</tr>';
                        $content1 .= '</thead>';
                        $content1 .= '<tbody>';
                        $peticion = mysqli_query($conexion,$sql);
                        while ($fila = mysqli_fetch_array($peticion)){
                            if($fila['resultado'] == "NO") {
                                $content1 .= '<tr class="GridviewScrollItem">';
                                $content1 .= '<td>'.$fila['tema'].'</td>';
                                $content1 .= '<td>'.$fila['pregunta'].'</td>';
                                $content1 .= '<td class="tdcorto"><img src="registro/images/unchecked_1.jpg" width="25px"/></td></tr>';
			        		}
			        		else if($fila['resultado'] == "OK") {
			        		    $content1 .= '<tr class="GridviewScrollItem">';
                                $content1 .= '<td>'.$fila['tema'].'</td>';
                                $content1 .= '<td>'.$fila['pregunta'].'</td>';
                                $content1 .= '<td class="tdcorto"><img src="registro/images/checked_1.jpg" height="25px"/></td></tr>';
			        		}
			        		else if($fila['resultado'] == "NA") {
			        		    $content1 .= '<tr class="GridviewScrollItem">';
                                $content1 .= '<td>'.$fila['tema'].'</td>';
                                $content1 .= '<td>'.$fila['pregunta'].'</td>';
                                $content1 .= '<td class="tdcorto"><img src="registro/images/na_1.jpg" width="25px"/></td></tr>';
			        		}
                        }
                        $content1 .= '</tbody>';
                    $content1 .= '</table>';
                $content1 .= '</div>';
            $content1 .= '</div><br>';
            
            if($porc >= 80) {
                $content1 .= '<h5><span class="badge badge-success">El resultado de la evaluación de cargo es: '.$porc.'%. Validación aprobada.</span></h5>';
                //$content1 .= '<h5><span class="badge badge-secondary">Puedes empezar proceso de matrícula <a href="https://unicab.org/pre_admisiones.php" id="al">AQUI</a></span></h5>';
            }
            else {
                $content1 .= '<h5><span class="badge badge-danger">El resultado de la evaluación de cargo es: '.$porc.'%. Validación no aprobada.</span></h5>';
                //$content1 .= '<h5><span class="badge badge-warning">Por favor ponte en contacto con el Coordinador Académico al número 318 400 4412</span></h5>';
            }
            
            
        $content1 .= '</div>';
    $content1 .= '</div>';
    
    $content1 .= '</body></html>';
    
    $nom_pdf = "ecargo_".$grado_ra."_".str_replace(" ","_",$nombre_completo)."_".$fanio.".pdf";
    
    //$mpdf->WriteHTML($content.$content1);
    echo $content;
    echo $content1;
    
    //Se crea la carpeta
    $path = 'eval_cargo/'.$fanio.'/'.str_replace(" ","_",$grado_ra).'/';
    //echo $path;
    if (!file_exists($path)) {
        mkdir($path, 0755, true);
    }
    
    $folder0 = '/eval_cargo/'.$fanio.'/'.str_replace(" ","_",$grado_ra).'/';
    $folder = __DIR__.$folder0;
    PDF::saveDisk($nom_pdf,$content.$content1,$folder);
    
    $folder_correo = 'eval_cargo/'.$fanio.'/'.str_replace(" ","_",$grado_ra).'/';
    //echo $nom_pdf;
    //echo "<br>".$folder;
    $ruta = "https://unicab.org".$folder0.$nom_pdf;
    echo "<br>".$ruta;
    //echo "hasta aquí OK";
    
    // ###################### INICIO ENVIO DE CORREO ###################
    //redireccionamos a url para enviar el correo desde unicab.solutions
    //echo $msg_correo; 
    header('location: https://unicab.solutions/res_eval_prog_correo_1_us.php?n_documento='.$documento.'&idgra='.$idgra.'&cargo='.$grado_ra.'&pdf='.$ruta);
    echo "<script>location.href='https://unicab.solutions/res_eval_prog_correo_1_us.php?n_documento=".$documento."&idgra=".$idgra."&cargo=".$grado_ra."&pdf=".$ruta."';</script>";
    // ###################### FIN ENVIO DE CORREO ###################
    
    
    
?>

