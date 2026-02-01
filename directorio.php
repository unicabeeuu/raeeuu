<?php
	include "admin-unicab/php/conexion.php";
    require("registro/docenteunicab/updreg/1cc3s4db.php");
	
	//Se valida si se deben actualizar las direcciones de grado3
	$sql_param = "SELECT v1 FROM tbl_parametros WHERE parametro = 'actualizar_direcciones_grado'";
	$res_param = $mysqli1->query($sql_param);
	while($row_param = $res_param->fetch_assoc()){
		$v1 = $row_param['v1'];
	}
	
	if ($v1 == 1) {
		//Se borra la tabla de direcciones grado
		$sql_delete = "Delete From tbl_direcciones_grado";
		$res_delete = $mysqli1->query($sql_delete);
		
		//Se cargan las direcciones principales (grupos A)
		$sql_direccionesA = "SELECT dg.id_empleado, g.grado, g.id FROM tbl_direccion_grado dg, grados g WHERE dg.id_grado = g.id AND dg.id_empleado > 0";
		$res_direccionesA = $mysqli1->query($sql_direccionesA);
		while($row_direccionesA = $res_direccionesA->fetch_assoc()){
			$id_empleado = $row_direccionesA['id_empleado'];
			$id_grado = $row_direccionesA['id'];
			
			$sql_ct = "SELECT COUNT(1) ct FROM tbl_direcciones_grado WHERE id_empleado = '$id_empleado'";
			//echo "<br>".$sql_ct;
			$res_ct = $mysqli1->query($sql_ct);
			while($row_ct = $res_ct->fetch_assoc()){
				$ct = $row_ct['ct'];
			}
			
			if ($ct == 0) {
				if ($id_grado < 13) {
					$sql_inupd = "INSERT INTO tbl_direcciones_grado (id_empleado, direcciones_grado) 
					VALUES ('".$row_direccionesA['id_empleado']."', '".$row_direccionesA['grado']." A"."')";
				}
				else {
					$sql_inupd = "INSERT INTO tbl_direcciones_grado (id_empleado, direcciones_grado) 
					VALUES ('".$row_direccionesA['id_empleado']."', '".$row_direccionesA['grado']."')";
				}
			}
			else {
				if ($id_grado < 13) {
					$sql_inupd = "UPDATE tbl_direcciones_grado SET direcciones_grado = CONCAT(direcciones_grado, ', ".$row_direccionesA['grado']." A'".") 
					WHERE id_empleado = '$id_empleado'";
				}
				else {
					$sql_inupd = "UPDATE tbl_direcciones_grado SET direcciones_grado = CONCAT(direcciones_grado, ', ".$row_direccionesA['grado']."') 
					WHERE id_empleado = '$id_empleado'";
				}
				
			}
			//echo "<br>".$sql_inupd;
			$res_inupd = $mysqli1->query($sql_inupd);
		}
		
		//Se cargan las direcciones principales (grupos B)
		$sql_direccionesB = "SELECT dg.id_empleado, g.grado, g.id FROM tbl_dir_b dg, grados g WHERE dg.id_grado = g.id AND dg.id_empleado > 0";
		$res_direccionesB = $mysqli1->query($sql_direccionesB);
		while($row_direccionesB = $res_direccionesB->fetch_assoc()){
			$id_empleado = $row_direccionesB['id_empleado'];
			
			$sql_ct = "SELECT COUNT(1) ct FROM tbl_direcciones_grado WHERE id_empleado = '$id_empleado'";
			//echo "<br>".$sql_ct;
			$res_ct = $mysqli1->query($sql_ct);
			while($row_ct = $res_ct->fetch_assoc()){
				$ct = $row_ct['ct'];
			}
			
			if ($ct == 0) {
				$sql_inupd = "INSERT INTO tbl_direcciones_grado (id_empleado, direcciones_grado) 
				VALUES ('".$row_direccionesB['id_empleado']."', '".$row_direccionesB['grado']." B"."')";
			}
			else {
				$sql_inupd = "UPDATE tbl_direcciones_grado SET direcciones_grado = CONCAT(direcciones_grado, ', ".$row_direccionesB['grado']." B'".") 
				WHERE id_empleado = '$id_empleado'";
			}
			//echo "<br>".$sql_inupd;
			$res_inupd = $mysqli1->query($sql_inupd);
		}
		
		//Se cargan las direcciones principales (grupos C)
		$sql_direccionesC = "SELECT dg.id_empleado, g.grado, g.id FROM tbl_dir_c dg, grados g WHERE dg.id_grado = g.id AND dg.id_empleado > 0";
		$res_direccionesC = $mysqli1->query($sql_direccionesC);
		while($row_direccionesC = $res_direccionesC->fetch_assoc()){
			$id_empleado = $row_direccionesC['id_empleado'];
			
			$sql_ct = "SELECT COUNT(1) ct FROM tbl_direcciones_grado WHERE id_empleado = '$id_empleado'";
			//echo "<br>".$sql_ct;
			$res_ct = $mysqli1->query($sql_ct);
			while($row_ct = $res_ct->fetch_assoc()){
				$ct = $row_ct['ct'];
			}
			
			if ($ct == 0) {
				$sql_inupd = "INSERT INTO tbl_direcciones_grado (id_empleado, direcciones_grado) 
				VALUES ('".$row_direccionesC['id_empleado']."', '".$row_direccionesC['grado']." C"."')";
			}
			else {
				$sql_inupd = "UPDATE tbl_direcciones_grado SET direcciones_grado = CONCAT(direcciones_grado, ', ".$row_direccionesC['grado']." C'".") 
				WHERE id_empleado = '$id_empleado'";
			}
			//echo "<br>".$sql_inupd;
			$res_inupd = $mysqli1->query($sql_inupd);
		}
		
		//Se cargan las direcciones principales (grupos D)
		$sql_direccionesD = "SELECT dg.id_empleado, g.grado, g.id FROM tbl_dir_d dg, grados g WHERE dg.id_grado = g.id AND dg.id_empleado > 0";
		$res_direccionesD = $mysqli1->query($sql_direccionesD);
		while($row_direccionesD = $res_direccionesD->fetch_assoc()){
			$id_empleado = $row_direccionesD['id_empleado'];
			
			$sql_ct = "SELECT COUNT(1) ct FROM tbl_direcciones_grado WHERE id_empleado = '$id_empleado'";
			//echo "<br>".$sql_ct;
			$res_ct = $mysqli1->query($sql_ct);
			while($row_ct = $res_ct->fetch_assoc()){
				$ct = $row_ct['ct'];
			}
			
			if ($ct == 0) {
				$sql_inupd = "INSERT INTO tbl_direcciones_grado (id_empleado, direcciones_grado) 
				VALUES ('".$row_direccionesD['id_empleado']."', '".$row_direccionesD['grado']." D"."')";
			}
			else {
				$sql_inupd = "UPDATE tbl_direcciones_grado SET direcciones_grado = CONCAT(direcciones_grado, ', ".$row_direccionesD['grado']." D'".") 
				WHERE id_empleado = '$id_empleado'";
			}
			//echo "<br>".$sql_inupd;
			$res_inupd = $mysqli1->query($sql_inupd);
		}
	}
	
?>

<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Directorio | Unicab | Colegio Virtual</title>

    <meta name="description" content="simple description for your site">
	<meta name="keywords" content="keyword1, keyword2">
	<meta name="author" content="Jobz">
	 
	<!-- twitter card starts from here, if you don't need remove this section -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@yourtwitterusername">
	<meta name="twitter:creator" content="@yourtwitterusername">
	<meta name="twitter:url" content="http://twitter.com">
	<meta name="twitter:title" content="Your home page title, max 140 char"> <!-- maximum 140 char -->
	<meta name="twitter:description" content="Your site description, maximum 140 char "> <!-- maximum 140 char -->
	<meta name="twitter:image" content="assets/img/twittercardimg/twittercard-144-144.png">  <!-- when you post this page url in twitter , this image will be shown -->
	<!-- twitter card ends here -->

	<!-- facebook open graph starts from here, if you don't need then delete open graph related  -->
	<meta property="og:title" content="Your home page title">
	<meta property="og:url" content="http://your domain here.com">
	<meta property="og:locale" content="en_US">
	<meta property="og:site_name" content="Your site name here">
	<!--meta property="fb:admins" content="" /-->  <!-- use this if you have  -->
	<meta property="og:type" content="website"> <!-- 'article' for single page  -->
	<meta property="og:image" content="assets/img/opengraph/fbphoto-476-476.png"> <!-- when you post this page url in facebook , this image will be shown -->
	<!-- facebook open graph ends here -->

	<!-- desktop bookmark -->
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="assets/img/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<!-- icons & favicons -->
	<link rel="shortcut icon" type="image/x-icon" href="favicon2025.ico">  <!-- this icon shows in browser toolbar -->
	<link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon2025.ico"> <!-- this icon shows in browser toolbar -->
	<link rel="apple-touch-icon" sizes="57x57" href="favicon2025.ico">
	<link rel="apple-touch-icon" sizes="60x60" href="favicon2025.ico">

	<link rel="icon" type="image/png" sizes="192x192" href="favicon2025.ico">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon2025.ico">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon2025.ico">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon2025.ico">
	<link rel="manifest" href="assets/img/favicon/manifest.json">

    <link rel="shortcut icon" type="favicon2025.ico">
	<link rel="icon" type="image/x-icon" href="favicon2025.ico">


	<!-- Fallback For IE 9 [ Media Query and html5 Shim] -->
	<!--[if lt IE 9]>
	<script src="assets/vendor/css3-mediaqueries-js/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- GOOGLE FONT -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

	<!-- BOOTSTRAP CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/navbar/bootstrap-4-navbar.css">

	<!--Animate css -->
	<link rel="stylesheet" href="assets/vendor/animate/animate.css" media="all">

	<!-- FONT AWESOME CSS -->
	<link rel="stylesheet" href="assets/vendor/fontawesome/css/font-awesome.min.css">

	<!--owl carousel css -->
	<link rel="stylesheet" href="assets/vendor/owl-carousel/owl.carousel.css" media="all">

	<!--Magnific Popup css -->
	<link rel="stylesheet" href="assets/vendor/magnific/magnific-popup.css" media="all">

	<!--Nice Select css -->
	<link rel="stylesheet" href="assets/vendor/nice-select/nice-select.css" media="all">

	<!--Offcanvas css -->
	<link rel="stylesheet" href="assets/vendor/js-offcanvas/css/js-offcanvas.css" media="all">

	<!-- MODERNIZER  -->
	<script src="assets/vendor/modernizr/modernizr-custom.js"></script>

	<!-- Main Master Style  CSS  -->
	<link id="cbx-style" data-layout="1" rel="stylesheet" href="assets/css/style-default.min.css" media="all">
	<!--SEGUIMIENTO GOOGLE-->
		<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-158598632-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-158598632-1');
	</script>
	
	<style>
		#tablaDirectorio thead {
			background: #253668;
		}
	</style>

</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
// Write on keyup event of keyword input element
$(document).ready(function(){
    $("#search").keyup(function(){
    _this = this;
    // Show only matching TR, hide rest of them
    $.each($("#tablaDirectorio tbody tr"), function() {
        if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
            $(this).hide();
        else
            $(this).show();
        });
    });
});

function verinf(imagen) {
    html_modal = '<img src="' + imagen + '" width="600px">';
    //alert(html_modal);
    
    $("#divmodalimg").empty();
    $("#divmodalimg").html(html_modal);
    
    $('#modal_img').modal('toggle');
    $('#modal_img').modal('show');
}
</script>


    <!--== Header Area Start ==-->
	<header id="header-area">
		<?php include "header.php"; ?>
		<script>
		var elemento = document.getElementById("itemDirectorio");
		elemento.className += " active";	
		</script>
	</header>
	<!--== Header Area End ==-->

    <!--== Page Title Area Start ==-->
    <!--<section id="page-title-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="page-title-content">
                        <h1 class="h2">Directorio</h1>
                        <p>Comunícate con nosotros</p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!--== Page Title Area End ==-->

    <!--== Directory Page Content Start ==-->
    <section id="page-content-wrap">
        <div class="directory-page-content-warp section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="directory-text-wrap">
                            <h3><i><strong>Escríbenos o Llámanos</strong></i></h3>
                            <div class="table-search-area">
                            
                            <div class="">
                                  <div class="container">
                                    <!--<h1 class="display-4"><i class="fa fa-search" aria-hidden="true"></i> Utiliza el buscador</h1>-->
                                    <form id="formulario1">
										<div class="row" style="align-items: center;">
											<div class="col-lg-2 col-md-2 col-sm-2">
												<label style="color: transparent">...</label>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6" style="border: 2px solid #42C3AE; border-radius: 15px; background: white;">
												<input type="search" class="icono-placeholder" placeholder="Buscar por nombre" id="search" name="search" style="width: 300px; border: none;"/>
												<img src="assets/img/equipo/lupa.jpg" width="8%" class="img-fluid"/>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-2">
												<img src="assets/img/equipo/Contactos.png" width="100%" class="img-fluid"/>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-2">
												<label style="color: transparent">...</label>
											</div>
										</div>
                                    </form>
									
                                  </div>
                                </div>
                            </div>

                              <div class="directory-table table-responsive">
                                  <table class="table table-bordered" id="tablaDirectorio">
                                      <thead>
                                          <tr>
                                              <th scope="col"><img src="assets/img/equipo/nombre.png"/> Nombre</th>
                                              <th scope="col"><img src="assets/img/equipo/departamentos.png"/> Dep.</th>
                                              <th scope="col"><img src="assets/img/equipo/correo.png"/> Correo</th>
                                              <!--<th scope="col"><i class="fa fa-skype" aria-hidden="true"></i> Skype</th>-->
                                              <!--<th scope="col"><i class="fa fa-phone-square" aria-hidden="true"></i> Celular</th>-->
                                              <!--<th scope="col"><i class="fa fa-whatsapp" aria-hidden="true"></i></th>-->
                                              <th scope="col"><img src="assets/img/equipo/cargo.png"/> Cargo</th>
                                              <!--<th scope="col"><img src="assets/img/equipo/nombre.png"/> Director de</th>-->
                                              <th scope="col"><img src="assets/img/equipo/informacion.png"/> Información</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php 
                                          /*$sql_directorio = "SELECT e.id, e.nombres, e.apellidos, e.dependencia, e.email, e.celular, e.cargo, e.infografia, 
                                            CASE e.perfil WHEN 'TU' THEN 'SI' WHEN 'SU' THEN 'SI' WHEN 'TU_AW' THEN 'SI' WHEN 'ST_PU' THEN 'SI' ELSE 'NO' END perfil, 
                                            CASE WHEN dga.id < 13 THEN CONCAT(UPPER(dga.grado), ' A') ELSE dga.grado END gradoA, 
                                            CONCAT(UPPER(dgb.grado), ' B') gradoB, CONCAT(UPPER(dgc.grado), ' C') gradoC, CONCAT(UPPER(dgd.grado), ' D') gradoD 
                                            FROM tbl_empleados e LEFT JOIN 
                                            (SELECT dg.id_empleado, g.grado, g.id FROM tbl_direccion_grado dg, grados g WHERE dg.id_grado = g.id AND g.id < 13 
                                            UNION ALL 
                                            SELECT DISTINCT dg.id_empleado, 'CICLOS I, II, III, IV, V, VI', 20 FROM tbl_direccion_grado dg, grados g WHERE dg.id_grado = g.id AND g.id >= 13) dga
                                            ON e.id = dga.id_empleado LEFT JOIN 
                                            (SELECT db.id_empleado, g.grado FROM tbl_dir_b db, grados g WHERE db.id_grado = g.id) dgb 
                                            ON e.id = dgb.id_empleado LEFT JOIN 
                                            (SELECT dc.id_empleado, g.grado FROM tbl_dir_c dc, grados g WHERE dc.id_grado = g.id) dgc 
                                            ON e.id = dgc.id_empleado LEFT JOIN 
                                            (SELECT dd.id_empleado, g.grado FROM tbl_dir_d dd, grados g WHERE dd.id_grado = g.id) dgd 
                                            ON e.id = dgd.id_empleado
                                            WHERE e.estado = 'activo' AND e.id != 18 ORDER BY e.id ASC";*/
										  $sql_directorio = "SELECT e.id, e.nombres, e.apellidos, e.dependencia, e.email, e.celular, e.cargo, e.infografia, 
                                            CASE e.perfil WHEN 'TU' THEN 'SI' WHEN 'SU' THEN 'SI' WHEN 'TU_AW' THEN 'SI' WHEN 'ST_PU' THEN 'SI' 
											WHEN 'AR' THEN 'SI' WHEN 'FI' THEN 'SI' WHEN 'PS' THEN 'SI' ELSE 'NO' END perfil, 
                                            dg.direcciones_grado 
                                            FROM tbl_empleados e LEFT JOIN 
                                            tbl_direcciones_grado dg 
                                            ON e.id = dg.id_empleado
                                            WHERE e.estado = 'activo' AND e.id != 18 ORDER BY e.id ASC";	
                                          $exe_directorio=mysqli_query($conexion,$sql_directorio);
										  //echo $sql_directorio;
                                          while ($rowDirectorio = mysqli_fetch_array($exe_directorio)) {
                                            //$numeroEspacios=str_replace(' ', '', $rowDirectorio['telefono']);
                                            /*$numeroEspacios=str_replace(' ', '', $rowDirectorio['celular_what']);
                                            $director = "";
                                            if($rowDirectorio['gradoA'] != "") {
                                                $director .= $rowDirectorio['gradoA']." ";
                                            }
                                            if($rowDirectorio['gradoB'] != "") {
                                                $director .= $rowDirectorio['gradoB']." ";
                                            }
                                            if($rowDirectorio['gradoC'] != "") {
                                                $director .= $rowDirectorio['gradoC'];
                                            }
                                            if($rowDirectorio['gradoD'] != "") {
                                                $director .= $rowDirectorio['gradoD'];
                                            }*/
                                            //$director = $rowDirectorio['gradoA'].", ".$rowDirectorio['gradoB'].", ".$rowDirectorio['gradoC'];
                                            $imagen = substr($rowDirectorio['infografia'], 9);
                                            //echo $imagen;
                                            if($rowDirectorio['perfil'] == "SI") {
                                                echo "
                                                  <tr>
                                                      <td>".$rowDirectorio['nombres']." ".$rowDirectorio['apellidos']."</td>
                                                      <td>".$rowDirectorio['dependencia']."</td>
                                                      <td>".$rowDirectorio['email']."</td>
                                                      <td>".$rowDirectorio['cargo']."</td>
                                                      <td><button class='btn btn-info btn-lg' onclick='verinf(\"".$imagen."\")'>VER</button></td>
                                                  </tr>";
                                            }
                                            else {
                                                echo "
                                                  <tr>
                                                      <td>".$rowDirectorio['nombres']." ".$rowDirectorio['apellidos']."</td>
                                                      <td>".$rowDirectorio['dependencia']."</td>
                                                      <td>".$rowDirectorio['email']."</td>
                                                      <td>".$rowDirectorio['cargo']."</td>
                                                      <td>".$rowDirectorio['celular']."</td>
                                                  </tr>";
                                            }
                                            
                                            //<td>".$rowDirectorio['skype']."</td>
                                            //<td><a href='tel:+".$numeroEspacios."' title='Toca para llamar'><span id='ntel'>(+57) </span>".$rowDirectorio['celular_what']."</a></td>
                                            //<td><a href='https://wa.me/57".$numeroEspacios."' title='Toca para enviar un mensaje'>Escribir</a></td>
                                          }
                                        ?>  
                                      </tbody>
                                  </table>
                              </div><br>
                                <!--<div class="alert alert-info" role="alert">
                                  <strong>¡Importante!</strong> Toca el número de teléfono para llamar o "Escribir" para contactar por whatsapp
                                </div>-->
                             
                          </div>
                    </div>
                </div>

                
            </div>
        </div>
    </section>
    <!--== Directory Page Content End ==-->
    
    <!-- Modal imagen grande -->
    <div class="modal fade" id="modal_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">INFOGRAFIA</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="divmodalimg">
                
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <!--<button type="button" class="btn btn-warning" id="btnupdpor" data-dismiss="modal" onclick="updpor()">Guardar</button>-->
          </div>
        </div>
      </div>
    </div>
    

    <!--== Footer Area Start ==-->
	<footer id="footer-area">
	   <?php include "footer.php" ?>
	</footer>
	<!--== Footer Area End ==-->

	<!--== Scroll Top ==-->
	<a href="#" class="scroll-top">
		<i class="fa fa-angle-up"></i>
	</a>
	<!--== Scroll Top ==-->

		<!-- SITE SCRIPT  -->

	<!-- Jquery JS  -->
	<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>

	<!-- POPPER JS -->
	<script src="assets/vendor/bootstrap/js/popper.min.js"></script>

	<!-- BOOTSTRAP JS -->
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/navbar/bootstrap-4-navbar.js"></script>

	<!--owl-->
	<script src="assets/vendor/owl-carousel/owl.carousel.min.js"></script>

	<!--Waypoint-->
	<script src="assets/vendor/waypoint/waypoints.min.js"></script>

	<!--CounterUp-->
	<script src="assets/vendor/counterup/jquery.counterup.min.js"></script>

	<!--isotope-->
	<script src="assets/vendor/isotope/isotope.pkgd.min.js"></script>

	<!--magnific-->
	<script src="assets/vendor/magnific/jquery.magnific-popup.min.js"></script>

	<!--Smooth Scroll-->
	<script src="assets/vendor/smooth-scroll/jquery.smooth-scroll.min.js"></script>

	<!--Jquery Easing-->
	<script src="assets/vendor/jquery-easing/jquery.easing.1.3.min.js"></script>

	<!--Nice Select -->
	<script src="assets/vendor/nice-select/jquery.nice-select.js"></script>

	<!--Jquery Valadation -->
	<script src="assets/vendor/validation/jquery.validate.min.js"></script>
	<script src="assets/vendor/validation/additional-methods.min.js"></script>

	<!--off-canvas js -->
	<script src="assets/vendor/js-offcanvas/js/js-offcanvas.pkgd.min.js"></script>

	<!-- Countdown -->
	<script src="assets/vendor/jquery.countdown/jquery.countdown.min.js"></script>

	<!-- custom js: main custom theme js file  -->
	<script src="assets/js/theme.min.js"></script>

	<!-- custom js: custom js file is added for easy custom js code  -->
	<script src="assets/js/custom.js"></script>

	<!-- custom js: custom scripts for theme style switcher for demo purpose  -->

</body>
</html>
