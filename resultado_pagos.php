<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Admisiones | Unicab | Colegio Virtual</title>

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
    <style>
        .pendiente {
            color: orange;
        }
        .aceptada {
            color: green;
        }
        .rechazada {
            color: red;
        }
    </style>

</head>
<body>
    <!--== Header Area Start ==-->
    <header id="header-area">
        <?php include "header.php"; ?>
         <script>
        var elemento = document.getElementById("itemServicios");
        elemento.className += " active";
    	</script>
    </header>
    <!--== Header Area End ==-->
    
     <?php 
        $estado = $_REQUEST['estado'];
        $ref = $_REQUEST['ref'];
        $fact = $_REQUEST['fact'];
        $val = $_REQUEST['val'];
        $conc = str_replace("_", " ", $_REQUEST['conc']);
        //echo $mensaje;
        
        //$resultados = explode("_", $mensaje);
        //print_r($resultados);
     ?>

    <!--== Page Title Area Start ==-->
    <section id="page-title-areaxx">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="page-title-content">
                        <?php
							//https://secure.payco.co/restpagos/transaction/response.json?ref_payco=23611413&public_key=870fd53ee9274a76a62c34f434b09569
						?>
						<br/><h4 style="color: blue;">¡RESULTADO DE SU PAGO!</h4><hr>
						<h5>Estado de la transacción: <span id="respuesta"></span></h5><hr>
						<h4 style='color: blue;'>DETALLE DEL PAGO</h4><hr>
						<h5>Fecha: <span id="fecha"></span></h5>
						<h5>Referencia de pago: <span id="referencia"></span></h5>
						<h5>Valor: <span id="valor"></span></h5>
						<h5>Concepto: <span id="concepto"></span></h5>
						<h5>Factura: <span id="factura"></span></h5>
						<h5>Autorización: <span id="autorizacion"></span></h5>
						<h5>Recibo: <span id="recibo"></span></h5>
						<h5>Banco: <span id="banco"></span></h5><hr>
						<h5>PIN: <span id="ref_epayco"></span></h5>
						<h5>Código proyecto: <span id="cod_proyecto"></span></h5>
						<h5>Descripción respuesta: <span id="desc_res"></span></h5><hr>
						<h6 style="color: red;">NOTA: Si la transacción fue por Baloto, Efecty, Punto Red, Red Servi o Gana; 
						tiene 5 días a partir de la fecha actual para utilizar el PIN y Código proyecto.</h6><hr>
						<a href='pagos_payservices.php' class='btn btn-brand smooth-scroll'>Realizar otro pago</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Register Page Content Start ==-->
    <section id="page-content-wrap">
        <div class="register-page-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!--JUMBOTRÓN-->
                        <div class="jumbotron" align="center">
                          <h1 class="display-4">¿Necesitas ayuda?</h1>
                          <p class="lead">Sí necesitas ayuda o acompañamiento en el proceso, contáctate con nuestro equipo de trabajo</p>
                          <hr class="my-4">
                          <p>Llámanos o escríbenos</p>
                          <a class="btn btn-primary btn-lg" href="directorio.php" role="button">Contactar</a>
                        </div>
                        <!--JUMBOTRÓN-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle">Términos y Condiciones</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Unicab respeta la privacidad de sus usuarios, los datos de registro y demás información recibida a través de la página web, dominios, subdominios, landing pages, blogs, redes sociales oficiales, entre otros, serán preservados y protegidos. Está Política de Privacidad también se aplica a nuestra recopilación de datos, procesamiento y metodología de uso.  Al utilizar nuestro sitio web, aceptas la política de manejo de la información que se describe en la presente Política de Privacidad. En caso de que no estés de acuerdo con los métodos mencionados que aquí se describen, no deberás hacer uso de nuestros sitios web.<br><br>
    
    <b>Políticas de Privacidad y Uso de Datos</b><br><br>
    
    El propósito por el que recopilamos tus datos personales radica principalmente  en agilizar tu proceso de matrícula en nuestra organización, Es fundamental para nosotros hacer uso apropiado de la información de nuestros usuarios, así como garantizar la protección y confidencialidad de tus datos mediante el cumplimiento de la Ley 1581 de 2012 sobre la política de tratamiento y procedimiento de datos personales.
    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <!--modal-->
    
    <!--== Register Page Content End ==-->

    <!--== Footer Area Start ==-->

    <!-- Footer Bottom Start -->
    <footer id="footer-area">
       <?php include "footer.php" ?>
    </footer>
    <!-- Footer Bottom End -->


<!--== Scroll Top ==-->
<a href="#" class="scroll-top">
    <i class="fa fa-angle-up"></i>
</a>
<!--== Scroll Top ==-->

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

<script>
    function getQueryParam(param) {
      location.search.substr(1)
        .split("&")
        .some(function(item) { // returns first occurence and stops
          return item.split("=")[0] == param && (param = item.split("=")[1])
        })
      return param
    }
    $(document).ready(function() {
      //llave publica del comercio

      //Referencia de payco que viene por url
      var ref_payco = getQueryParam('ref_payco');
      //Url Rest Metodo get, se pasa la llave y la ref_payco como paremetro
      var urlapp = "https://secure.epayco.co/validation/v1/reference/" + ref_payco;

      $.get(urlapp, function(response) {
        
        if (response.success) {

          if (response.data.x_cod_response == 1) {
            //Codigo personalizado
            $("#respuesta").addClass("aceptada");
          }
          //Transaccion Rechazada
          if (response.data.x_cod_response == 2) {
            $("#respuesta").addClass("rechazada");
          }
          //Transaccion Pendiente
          if (response.data.x_cod_response == 3) {
            $("#respuesta").addClass("pendiente");
          }
          //Transaccion Fallida
          if (response.data.x_cod_response == 4) {
            
          }

          $('#fecha').html(response.data.x_transaction_date);
          $('#respuesta').html(response.data.x_response);
          $('#referencia').text(response.data.x_extra1);
          $('#motivo').text(response.data.x_response_reason_text);
          $('#recibo').text(response.data.x_transaction_id);
          $('#banco').text(response.data.x_bank_name);
          $('#autorizacion').text(response.data.x_approval_code);
          $('#factura').text(response.data.x_id_invoice);
          $('#concepto').text(response.data.x_description);
          $('#ref_epayco').text(response.data.x_ref_payco);
          if(response.data.x_bank_name == "GANA") {
              var cod_proyecto = 242;
          }
          else if(response.data.x_bank_name == "EFECTY") {
              var cod_proyecto = 111992;
          }
          else if(response.data.x_bank_name == "BALOTO") {
              var cod_proyecto = 950715;
          }
          else if(response.data.x_bank_name == "PUNTO RED") {
              var cod_proyecto = 110342;
          }
          else if(response.data.x_bank_name == "RED SERVI") {
              var cod_proyecto = 761;
          }
          else if(response.data.x_bank_name == "SURED") {
                  var cod_proyecto = 'MR0382';
              }
          else {
              var cod_proyecto = "";
          }
          $('#cod_proyecto').text(cod_proyecto);
          $('#desc_res').text(response.data.x_response_reason_text);
          $('#valor').text(response.data.x_amount + ' ' + response.data.x_currency_code);


        } else {
          alert("Error consultando la información");
        }
      });

    });
</script>

</body>
</html>
