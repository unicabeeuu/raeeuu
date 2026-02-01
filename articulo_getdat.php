<?php  
    include "admin-unicab/php/conexion.php";
    
    $ide = $_REQUEST['ide'];
    $idb = $_REQUEST['idb'];
    
?>
<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Blog | Unicab | Colegio Virtual</title>

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


<meta property="og:site_name" content="Unicab.org">
<!--meta property="fb:admins" content="" /-->  <!-- use this if you have  -->
<meta property="og:type" content="website"> <!-- 'article' for single page  -->
 <!-- when you post this page url in facebook , this image will be shown -->
<!-- facebook open graph ends here -->

<!-- desktop bookmark -->
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="assets/img/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!-- icons & favicons -->
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">  <!-- this icon shows in browser toolbar -->
<link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico"> <!-- this icon shows in browser toolbar -->
<link rel="apple-touch-icon" sizes="57x57" href="favicon.ico">
<link rel="apple-touch-icon" sizes="60x60" href="favicon.ico">

<link rel="icon" type="image/png" sizes="192x192" href="favicon.ico">
<link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
<link rel="icon" type="image/png" sizes="96x96" href="favicon.ico">
<link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">
<link rel="manifest" href="assets/img/favicon/manifest.json">

    <link rel="shortcut icon" type="favicon.ico">
<link rel="icon" type="image/x-icon" href="favicon.ico">

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

<!-- Jquery JS  -->
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<!--<script src="admin-unicab/js/jquery-1.11.1.min.js"></script>-->

<!-- MODERNIZER  -->
<script src="assets/vendor/modernizr/modernizr-custom.js"></script>

<!-- Main Master Style  CSS  -->
<link id="cbx-style" data-layout="1" rel="stylesheet" href="assets/css/style-default.min.css" media="all">

<?php
	function dameURL(){
	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	return $url;
	}
?> 
<!-- COMPARTIR FACEBOOK-->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v5.0"></script>
	<!--SEGUIMIENTO GOOGLE-->
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-158598632-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-158598632-1');
  
    $(function() {
        var est_rev_texto = $("#est_rev_texto").val();
        var est_rev_dis = $("#est_rev_dis").val();
        
        if(est_rev_texto > 0) {
            $('#checkTexto').attr('checked', true);
            $("#checkTexto").prop('disabled', true);
            $("#btnedittxt").hide();
        }
        else {
            $('#checkTexto').attr('checked', false);
            $("#checkTexto").prop('disabled', false);
            $("#btnedittxt").show();
        }
        
        if(est_rev_dis > 0) {
            $('#checkDiseno').attr('checked', true);
            $("#checkDiseno").prop('disabled', true);
            $("#btneditdis").hide();
        }
        else {
            $('#checkDiseno').attr('checked', false);
            $("#checkDiseno").prop('disabled', false);
            $("#btneditdis").show();
        }
    });
  
    function mayus(e, id, desc) {
        //e.value = e.value.toUpperCase();
        
        if(id == "txtpreg") {
            validar_texto(id, desc);
        }
        else {
            validar_texto(id, desc);
        }
    }
    
    function consultar_datos() {
        var idb = $("#idb").val();
        $("#txtidpost").val(idb);
        //alert("control");
        
        $.ajax({
            type:"POST",
            url:"articulo_getdat1.php",
            data:"idb=" + idb,
            success:function(r) {
                var res = JSON.parse(r);
                //alert(res.titulo);
                $("#txttit").val(res.titulo);
                var long = $("#txttit").val().length;
                $("#lbltxttit").html(long);
                
                $("#txtdes").val(res.des);
                long = $("#txtdes").val().length;
                $("#lbltxtdes").html(long);
            }
        });
        
        $('#modal_updtexto').modal('toggle');
        $('#modal_updtexto').modal('show');
    }
    
    function consultar_datos1() {
        var idb = $("#idb").val();
        $("#txtidpost1").val(idb);
        //alert("control");
        
        $.ajax({
            type:"POST",
            url:"articulo_getdat1.php",
            data:"idb=" + idb,
            success:function(r) {
                var res = JSON.parse(r);
                //alert(res.titulo);
                $("#txttit1").val(res.titulo);
                var long = $("#txttit1").val().length;
                $("#lbltxttit1").html(long);
            }
        });
        
        $('#modal_comdiseno').modal('toggle');
        $('#modal_comdiseno').modal('show');
    }
    
    function validar_texto(id, desc) {
        var control = 0;
        var id_obj = "#" + id;
        var ctr_obj = "#ctr_" + id;
        var v_input = document.getElementById(id);
        var v_val = /[-_'"\<\>\~\^\*\$\#\%\&\=\+\|\{\}\[\]\\]{1,}/;
        //var v_val = /[-_'"\<\>\~\^\*\$\!\¡\#\%\&\¿\?\/\=\+\|,;:\(\)\{\}\[\]\\]{1,}/;
        var val = String($(id_obj).val()).match(v_val);
        
        if(val == null) {
            v_input.setCustomValidity("");
            $("#lblmsg").html("");
            $("#lblmsg1").html("");
            $("#btnmodtext").show();
            $("#btncomdis").show();
        }
        else {
            v_input.setCustomValidity("Ha ingresado caracteres inválidos");
            var texto = "Ha ingresado caracteres no permitidos para " + desc + ": ";
            texto += "- _ \' \" < > ~ ^ * $ # & = + | { } [ ] \\";
            //alert(texto);
            $("#lblmsg").html(texto).css("color","red");
            $("#lblmsg1").html(texto).css("color","red");
            $("#btnmodtext").hide();
            $("#btncomdis").hide();
            control = 1;
        }
		
		if(control == 0) {
		    if($(id_obj).val() == "") {
		        var texto = "El campo " + desc + " se debe llenar";
				$("#lblmsg").html(texto).css("color","red");
				$("#lblmsg1").html(texto).css("color","red");
				$("#btnmodtext").hide();
				$("#btncomdis").hide();
		    }
		}
		
		var long = $(id_obj).val().length;
        //Se controla la longitud máxima
        if(id == "txtdes") {
            $("#lbltxtdes").html(long);
            if(long > 1000) {
                var texto = "El número máximo de caracteres es 1000.";
				$("#lblmsg").html(texto).css("color","red");
				$("#btnmodtext").hide();
            }
        }
        else if(id == "txtdes1") {
            $("#lbltxtdes1").html(long);
            if(long > 500) {
                var texto = "El número máximo de caracteres es 500.";
				$("#lblmsg1").html(texto).css("color","red");
				$("#btncomdis").hide();
            }
        }
    }
    
    function guardar_rev_redaccion() {
        var des = $("#txtdes").val();
        var idb = $("#txtidpost").val();
        var ide = $("#ide").val();
        //alert(idb);
        
        var codigo = "";
    	var sa1 = ["q","a","1","z","x","2","s","w","3","p","l","4","m","k","5","o","e","6",
                "d","c","7","i","j","8","n","r","9","f","v","0","u","h","b","t","g"];
        var len = sa1.length;
    	
    	for(var i = 1; i <=10; i++) {
    		ale = Math.floor((Math.random() * (len - 0 + 1)) + 0);
    		codigo = codigo + sa1[ale-1];
    	}
        
        $.ajax({
            type:"POST",
            url:"articulo_upddat.php",
            data:"idb=" + idb + "&des=" + des,
            success:function(r) {
                alert(r);
                $('#modal_updtexto').modal('hide');
                
                var url = "articulo_getdat.php?idb=" + idb + "&ide=" + ide + "&cod=" + codigo;
                $(location).attr('href',url);
            }
        });
    }
    
    function guardar_com_dis() {
        var des = $("#txtdes1").val();
        var idb = $("#txtidpost1").val();
        var ide = $("#ide").val();
        //alert(idb);
        
        var codigo = "";
    	var sa1 = ["q","a","1","z","x","2","s","w","3","p","l","4","m","k","5","o","e","6",
                "d","c","7","i","j","8","n","r","9","f","v","0","u","h","b","t","g"];
        var len = sa1.length;
    	
    	for(var i = 1; i <=10; i++) {
    		ale = Math.floor((Math.random() * (len - 0 + 1)) + 0);
    		codigo = codigo + sa1[ale-1];
    	}
        
        $.ajax({
            type:"POST",
            url:"articulo_upddat3.php",
            data:"idb=" + idb + "&des=" + des,
            success:function(r) {
                alert(r);
                $('#modal_comdiseno').modal('hide');
                
                var url = "articulo_getdat.php?idb=" + idb + "&ide=" + ide + "&cod=" + codigo;
                $(location).attr('href',url);
            }
        });
    }
    
    function upd_estado_rev_texto() {
        var idb = $("#idb").val();
        var ide = $("#ide").val();
        //alert(idb);
        
        var codigo = "";
    	var sa1 = ["q","a","1","z","x","2","s","w","3","p","l","4","m","k","5","o","e","6",
                "d","c","7","i","j","8","n","r","9","f","v","0","u","h","b","t","g"];
        var len = sa1.length;
    	
    	for(var i = 1; i <=10; i++) {
    		ale = Math.floor((Math.random() * (len - 0 + 1)) + 0);
    		codigo = codigo + sa1[ale-1];
    	}
        
        $.ajax({
            type:"POST",
            url:"articulo_upddat1.php",
            data:"idb=" + idb + "&ide=" + ide,
            success:function(r) {
                alert(r);
                
                var url = "articulo_getdat.php?idb=" + idb + "&ide=" + ide + "&cod=" + codigo;
                $(location).attr('href',url);
            }
        });
    }
    
    function upd_estado_rev_dis() {
        var idb = $("#idb").val();
        var ide = $("#ide").val();
        //alert(idb);
        
        var codigo = "";
    	var sa1 = ["q","a","1","z","x","2","s","w","3","p","l","4","m","k","5","o","e","6",
                "d","c","7","i","j","8","n","r","9","f","v","0","u","h","b","t","g"];
        var len = sa1.length;
    	
    	for(var i = 1; i <=10; i++) {
    		ale = Math.floor((Math.random() * (len - 0 + 1)) + 0);
    		codigo = codigo + sa1[ale-1];
    	}
        
        $.ajax({
            type:"POST",
            url:"articulo_upddat2.php",
            data:"idb=" + idb + "&ide=" + ide,
            success:function(r) {
                alert(r);
                
                var url = "articulo_getdat.php?idb=" + idb + "&ide=" + ide + "&cod=" + codigo;
                $(location).attr('href',url);
            }
        });
    }
    
    function mostrar_btn_rev_texto() {
        check = document.getElementById("checkTexto");
        if (check.checked) {
            $("#btnrevtext").show();
        }
        else {
            $("#btnrevtext").hide();
        }
    }
    
    function mostrar_btn_rev_dis() {
        check = document.getElementById("checkDiseno");
        if (check.checked) {
            $("#btnrevdis").show();
        }
        else {
            $("#btnrevdis").hide();
        }
    }
  
</script>

<style>
    .controlcampo {
        border: none;
        color: white;
    }
    .grisclaro {
        background: lightgray;
        border: none;
        padding-left: 10px;
    }
    .ghf {
        font-size: 16px;
    }
    #lbltxtdes, #lbltxttit, #lbltxtdes1, #lbltxttit1 {
        color: blue;
    }
            
    button {
        font-size: 18px !Important;    
    }
    
    input[type=checkbox] {
    	visibility: hidden;
    }
    
    .checkbox-GHF, .checkbox-GHF1 {
    	display: inline-block;
    	position: relative;
        width: 70px;
    	height: 30px;
    	background: #F3F781;
    	border-radius: 15px;
    	box-shadow: inset 0px 1px 1px rgba(0,0,0,0.6), 0px 1px 0px rgba(255,255,255,0.3);   
    }
    
    .checkbox-GHF label {
    
        /* aspecto */
        display: block;
        width: 34px;
    	height: 20px;
    	border-radius: 17px;
    	box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.35);
    	background: #fcfff4;
    	background: linear-gradient(to top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
        cursor: pointer;
        
        /* Posicionamiento */
        position: absolute;
        top: 5px;
    	left: 5px;
        z-index: 1;
        
    	/* Comportamiento */
        transition: all .4s ease;
        
        /* ocultar el posible texto que tenga */
        overflow: hidden;
        text-indent: 35px;  
        transition: text-indent 0s;
    }
    
    /* estado activado */
    .checkbox-GHF input[type=checkbox]:checked + label {
    	left: auto;
        right: 5px;
    }
    
    .checkbox-GHF:after {
    	content: 'NO';
    	font: 12px/30px Arial, sans-serif;
    	color: red;
    	position: absolute;
    	right: 10px;
        z-index: 0;
    	font-weight: bold;
    	
    }
    
    .checkbox-GHF:before {
    	content: 'SI';
    	font: 12px/30px Arial, sans-serif;
    	color: green;
    	position: absolute;
    	left: 10px;
    	z-index: 0;
    	font-weight: bold;
    }
    
    /* ########################################################### */
    .checkbox-GHF1 label {
    
        /* aspecto */
        display: block;
        width: 34px;
    	height: 20px;
    	border-radius: 17px;
    	box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.35);
    	background: #fcfff4;
    	background: linear-gradient(to top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
        cursor: pointer;
        
        /* Posicionamiento */
        position: absolute;
        top: 5px;
    	left: 5px;
        z-index: 1;
        
    	/* Comportamiento */
        transition: all .4s ease;
        
        /* ocultar el posible texto que tenga */
        overflow: hidden;
        text-indent: 35px;  
        transition: text-indent 0s;
    }
    
    /* estado activado */
    .checkbox-GHF1 input[type=checkbox]:checked + label {
    	left: auto;
        right: 5px;
    }
    
    .checkbox-GHF1:after {
    	content: 'NO';
    	font: 12px/30px Arial, sans-serif;
    	color: red;
    	position: absolute;
    	right: 10px;
        z-index: 0;
    	font-weight: bold;
    	
    }
    
    .checkbox-GHF1:before {
    	content: 'SI';
    	font: 12px/30px Arial, sans-serif;
    	color: green;
    	position: absolute;
    	left: 10px;
    	z-index: 0;
    	font-weight: bold;
    }
</style>

</head>
<body>

<?php
		$peticion = "SELECT *, DATE_FORMAT(FechaPublicacionB, '%d de %M de %Y') AS fecha 
		FROM blog WHERE IdBlog =".$_REQUEST['idb']." LIMIT 1";
		$resultado = mysqli_query($conexion, $peticion);
			while ($fila = mysqli_fetch_array($resultado)){ 
				$id=$fila['IdBlog'];
				$titulo=$fila['TituloB'];
				$fecha=$fila['fecha'];
				//$categoria=$fila['CategoriaB'];
				$descripcionA=$fila['DescripcionA'];
				$descripcion=$fila['DescripcionB'];
				$imagen=$fila['ImagenB'];
				$rev_texto=$fila['estado_rev_texto'];
				$rev_dis=$fila['estado_rev_mult'];
			};
			
?>

<!--== Blog Page Content Start ==-->
<div id="page-content-wrap">
    <div class="blog-page-content-wrap section-padding">
        <div class="container">
            <div class="row">
                <!-- Blog content Area Start -->
                <div class="col-lg-8">
                    <article class="single-blog-content-wrap">
                    
                        <header class="article-head">
                            
                            <div class="single-blog-meta">
                                <h2><?php echo $titulo; ?></h2><hr>
                                <div class="posting-info">
                                    <?php echo $fecha; ?>
                                     
                                </div>
                            </div>
                            
                            <section class="blog-details">
                                <p><?php echo nl2br($descripcionA);?></p>
                            </section>
                        
                            <div class="single-blog-thumb">
                                <img src="<?php echo $imagen; ?>" class="img-fluid" alt="">
                            </div>
                            <footer class="post-share">
                            <div class="row no-gutters ">
                                <div class="col-8">
                                    <div class="shareonsocial">
                                        <span>Comparte:</span>
                                       
                                        <a href="http://www.facebook.com/sharer.php?u=<?php echo dameURL()?>">
                                        <i class="fa fa-facebook"></i></a>
                                        <a href="https://twitter.com/intent/tweet?button_hashtag=<?php echo dameURL()?>&ref_src=twsrc%5Etfw"><i class="fa fa-twitter"></i></a>
                                        <a href="whatsapp://send?text=texto%20con%20URL"><i class="fa fa-whatsapp"></i></a>
                                    </div>
                                </div>
                                <!--<div class="col-4 text-right">
                                    <div class="post-like-comm">
                                        <a href="#"><i class="fa fa-thumbs-o-up"></i>20</a>
                                        <a href="#"><i class="fa fa-comment-o"></i>15</a>
                                    </div>
                                </div>-->
                            </div>
                            </footer>
                            
                        </header><br>
                        
                        <section class="blog-details">
                           
                            <p>
                                <?php if($descripcion == "NA") {
                                    
                                    }
                                    else {
                                        echo nl2br($descripcion);
                                    }
                                ?>
                            </p>
                            
                            <!--<blockquote class="blockquote">
                                UNICAB - Actualidad Educativa
                            </blockquote>-->
                            <input type="hidden" id="ide" value="<?php echo $ide; ?>"/>
                            <input type="hidden" id="idb" value="<?php echo $idb; ?>"/>
                            <input type="hidden" id="est_rev_texto" value="<?php echo $rev_texto; ?>"/>
                            <input type="hidden" id="est_rev_dis" value="<?php echo $rev_dis; ?>"/>
                            
                            <hr style="background: green;">
                            <!-- Se valida el id empleado para mostrar las opciones de revisión -->
                            <table>
                                <tbody></tbody>
                                    <?php
                                        if($ide == 9 || $ide == 15 || $ide == 17) {
                                            echo '<tr>
                                                <td><button id="btnedittxt" class="btn btn-primary" onclick="consultar_datos();">Editar texto</button>
                                                </td>
                                                <td width="20"></td>
                                                <td><label style="color: blue; font-weight: bold;">Redacción y ortografía revisada:</label></td>
                                                <td><div class="checkbox-GHF">
    									                <input type="checkbox" id="checkTexto" name="checkTexto" value="0" onchange="mostrar_btn_rev_texto();"/>
    									                <label for="checkTexto">...</label>
                                                    </div>
                                                </td>
                                                <td width="20"></td>
                                                 <td><button id="btnrevtext" class="btn btn-success" style="display: none;" onclick="upd_estado_rev_texto();">Guardar</button>
                                                </td>
                                            </tr>';
                                        }
                                        else if($ide == 10 || $ide == 12) {
                                            echo '<tr>
                                                <td><button id="btneditdis" class="btn btn-primary" onclick="consultar_datos1();">Comentarios diseño</button>
                                                </td>
                                                <td width="20"></td>
                                                <td><label style="color: blue; font-weight: bold;">Diseño revisado:</label></td>
                                                <td><div class="checkbox-GHF1">
    									                <input type="checkbox" id="checkDiseno" name="checkDiseno" value="0" onchange="mostrar_btn_rev_dis();"/>
    									                <label for="checkDiseno">...</label>
                                                    </div>
                                                </td>
                                                <td width="20"></td>
                                                <td><button id="btnrevdis" class="btn btn-success" style="display: none;" onclick="upd_estado_rev_dis();">Guardar</button>
                                                </td>
                                            </tr>';
                                        }
                                        else if($ide == 18) {
                                            echo '<tr>
                                                <td><button id="btnedittxt" class="btn btn-primary" onclick="consultar_datos();">Editar texto</button>
                                                </td>
                                                <td width="20"></td>
                                                <td><label style="color: blue; font-weight: bold;">Redacción y ortografía revisada:</label></td>
                                                <td><div class="checkbox-GHF">
    									                <input type="checkbox" id="checkTexto" name="checkTexto" value="0" onchange="mostrar_btn_rev_texto();"/>
    									                <label for="checkTexto">...</label>
                                                    </div>
                                                </td>
                                                <td width="20"></td>
                                                 <td><button id="btnrevtext" class="btn btn-success" style="display: none;" onclick="upd_estado_rev_texto();">Guardar</button>
                                                </td>
                                            </tr>';
                                            echo '<tr>
                                                <td><button id="btneditdis" class="btn btn-primary" onclick="consultar_datos1();">Comentarios diseño</button>
                                                </td>
                                                <td width="20"></td>
                                                <td><label style="color: blue; font-weight: bold;">Diseño revisado:</label></td>
                                                <td><div class="checkbox-GHF1">
    									                <input type="checkbox" id="checkDiseno" name="checkDiseno" value="0" onchange="mostrar_btn_rev_dis();"/>
    									                <label for="checkDiseno">...</label>
                                                    </div>
                                                </td>
                                                <td width="20"></td>
                                                <td><button id="btnrevdis" class="btn btn-success" style="display: none;" onclick="upd_estado_rev_dis();">Guardar</button>
                                                </td>
                                            </tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <hr style="background: green;">
                        </section>
                        
                    </article>
                </div>
                <!-- Blog content Area End -->

                <!-- Sidebar Area Start -->
                <div class="col-lg-4 order-first order-lg-last">
                    
<div class="sidebar-area-wrap">

 <!-- Single Sidebar Start -->
    <div class="single-sidebar-wrap d-none d-lg-block">
       <h4 class="sidebar-title">Síguenos en Facebook</h4>
        <div class="sidebar-body">
           <div class="fb-page" data-href="https://www.facebook.com/unicabvir/" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/unicabvir/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/unicabvir/">Colegio  Virtual Unicab</a></blockquote></div>
        </div>
    </div>
    <!-- Single Sidebar End -->
 

    <!-- Single Sidebar Start -->
    <div class="single-sidebar-wrap">
       <h4 class="sidebar-title">Últimos Artículos</h4>
        <div class="sidebar-body">
            <ul class="brand-unorderlist">
            <?php
		$peticion = "SELECT *, DATE_FORMAT(FechaPublicacionB, '%d de %M de %Y') AS fecha 
		FROM blog WHERE IdBlog !=".$_REQUEST['idb']." AND estado_rev_texto != 0 AND estado_rev_mult != 0 ORDER BY IdBlog DESC LIMIT 3";
		$resultado = mysqli_query($conexion, $peticion);
			while ($fila = mysqli_fetch_array($resultado)){ 
				$id2=$fila['IdBlog'];
				$titulo2=$fila['TituloB'];
				$fecha2=$fila['fecha'];
				//$categoria2=$fila['CategoriaB'];
				$descripcion2A=$fila['DescripcionA'];
				$descripcion2=$fila['DescripcionB'];
				$imagen2=$fila['ImagenB'];
				
				echo" <li><a href='articulo.php?id=".$id2."#page-content-wrap'><span class='badge badge-primary'>".$fecha2."</span><img src=".$imagen2." class='img-fluid' alt='Noticia'>".$titulo2."</a></li>";
			};
?>
               
            </ul>
        </div>
    </div>
    <!-- Single Sidebar End -->
    
</div>
                </div>
                <!-- Sidebar Area End -->
            </div>
        </div>
    </div>
</div>
<!--== Blog Page Content End ==-->

<!--== Scroll Top ==-->
<a href="#" class="scroll-top">
    <i class="fa fa-angle-up"></i>
</a>
<!--== Scroll Top ==-->

<!-- BOOTSTRAP JS -->
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- custom js: custom js file is added for easy custom js code  -->
<script src="assets/js/custom.js"></script>

    <!-- Modal editar texto -->
    <div class="modal fade" id="modal_updtexto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EDITAR REDACCION Y ORTOGRAFIA</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <label>Id Blog</label>
            <input type="text" id="txtidpost" class="grisclaro" readonly/><br><br>
            
            <label>Título <input type="text" class="controlcampo" id="ctr_txttit" value="1" style="width: 20px;"/> (400 | </label>
            <label id="lbltxttit">0</label><label>)</label>
            <input type="text" id="txttit" name="txttit" class="form-control ghf" required readonly/><br>
            
            <label>* Descripción <input type="text" class="controlcampo" id="ctr_txtdes" value="1" style="width: 20px;"/> (1000 | </label>
            <label id="lbltxtdes">0</label><label>)</label>
            <textarea id="txtdes" name="txtdes" class="form-control ghf" rows="8" onkeyup="mayus(this, 'txtdes', 'Descripción');" required></textarea>
            
          </div>
          <div class="modal-footer">
            <label id="lblmsg"></label>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-warning" id="btnmodtext" data-dismiss="modal" onclick="guardar_rev_redaccion();">Modificar</button>
            
          </div>
        </div>
      </div>
    </div>
    
    <!-- Modal comentarios diseño -->
    <div class="modal fade" id="modal_comdiseno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">COMENTARIOS AL DISEÑO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              
            <label>Id Blog</label>
            <input type="text" id="txtidpost1" class="grisclaro" readonly/><br><br>
            
            <label>Título <input type="text" class="controlcampo" style="width: 20px" id="ctr_txttit" value="1"/> (400 | </label>
            <label id="lbltxttit1">0</label><label>)</label>
            <input type="text" id="txttit1" name="txttit1" class="form-control ghf" onkeyup="mayus(this, 'txttit1', 'Título');" required readonly/>
            
            <label>* Comentarios al diseño <input type="text" class="controlcampo" style="width: 20px" id="ctr_txtdes" value="1"/> (500 | </label>
            <label id="lbltxtdes1">0</label><label>)</label>
            <textarea id="txtdes1" name="txtdes1" class="form-control ghf" onkeyup="mayus(this, 'txtdes1', 'Comentarios al diseño');" required></textarea>
            
          </div>
          <div class="modal-footer">
            <label id="lblmsg1"></label>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-warning" id="btncomdis" data-dismiss="modal" style="display: none;" onclick="guardar_com_dis();">Guardar</button>
            
          </div>
        </div>
      </div>
    </div>


</body>
<!--<head>
 <meta property="og:title" content= "<?php echo $titulo; ?>" />
 <meta property="og:image" content="<?php echo $imagen;?>"/>
 
 <meta property="og:description" content= "<?php echo $descripcion ;?>" />
 <meta property="og:url" content="<?php echo dameURL()?>"/>
 <meta property="og:site_name" content="Unicab.org" />
 <title><?php echo $titulo;?></title>
 <meta name="<?php echo $descripcion;?>" />



 </head>-->
</html>
