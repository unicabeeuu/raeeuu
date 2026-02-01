<?php include "admin-unicab/php/conexion.php"?>

<?php
    $peticion2="SET lc_time_names = 'es_CO'";
    $resultado2 = mysqli_query($conexion, $peticion2);
    
    $peticion = "SELECT DATE_FORMAT(NOW(),'%W %d de %M de %Y') fecha";
    $resultado = mysqli_query($conexion, $peticion);
    while ($fila = mysqli_fetch_array($resultado))
	{
		$fechaActual=$fila['fecha'];
    }  ;

?>

<html>
<head>
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function() {
            //alert ("hola");
            setTimeout("rotar_frente()",3000);
        });
        
        function rotar_frente() {
        	//alert("hola");
        	document.getElementById("frente").style.transform = "rotateY(180deg)";
        	document.getElementById("atras").style.transform = "rotateY(0deg)";
        	setTimeout("rotar_atras()",3000);
        }
        function rotar_atras() {
        	document.getElementById("frente").style.transform = "rotateY(0deg)";
        	document.getElementById("atras").style.transform = "rotateY(180deg)";
        	setTimeout("rotar_frente()",3000);
        }
    </script>
    <style>
        .tarjeta {
        	position: absolute;
        	left: 35%;
        	top: 0;
        	width: 150px;
        	height: 100px;
        	color: blue;
        	font-weight: bold;
        }
        .tarjeta img{
        	width: 100%;
        	height: 100%;
        }
        .tarjeta div{
        	height: 100%;
        	/*border: 2px solid;*/
        	border-radius: 15px;
        	overflow: hidden;
        	/*La parte de atrás no se ve*/
        	backface-visibility: hidden;
        	/*Animación... en este caso cualquier cambio de estado*/
        	transition: all 1s;
        }
        .frente {
        	position: relative;
        }
        .atras {
        	position: absolute;
        	/*Esta línea voltea el texto o la imagen 180° y queda al reves*/
        	transform: rotateY(180deg);
        	/*background-color: #F3F781;
        	border: 2px solid;*/
        }
        .atras p {
            color: white;
            text-align: center !Important;
        }
        /*Estos son los estilos para hacer rotar los div
        .tarjeta:hover .frente{
        	transform: rotateY(180deg);
        }
        .tarjeta:hover .atras {
        	transform: rotateY(0deg);
        }*/
        .btnghf {
            /*margin-top: 10px;*/
        }
        /*.modal-body {
            background-image: url(images/admisiones1.png);
            background-repeat: no-repeat;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            opacity: 0.9;
        }*/
        .text{
            width: 104%;
            margin-left: -10px;
            margin-top: 30px;
            margin-bottom: 30px;  
            /*padding: 10px 0px;
            background: rgba(0,0,0,0.5);*/
            text-align: justify;
            /*color: yellow;*/
            color: #2c3e50;
            font-size: 2rem;
        }
        .text a {
            font-size: 2.2rem;
            font-weight: bold;
        }
        #cerrar {
            background: #ffe156 !Important;
            color: #2c3e50 !Important;
            font-weight: bold !Important;
            opacity: 1 !Important;
            margin-right: -10px !Important;
        }
        #divlinea {
            background: #2980b9;
            color: transparent;
            width: 15%;
            font-size: 6px;
            height: 5px;
            margin-left: 25px;
        }
        #btnadmisiones:hover {
            background: #f9d73a !Important;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="preheader-area">
        <div class="container">
            <div class="row">
                <!--<div class="col-lg-6 col-md-0 col-sm-0 col-xs-0" id="ColumnaFecha">-->
                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6 text-right">
                    <div class="preheader-right">
                        <!--<a title="Asesoría Admisiones" class="btn-auth btn-auth btn-arriba" href="#" data-toggle="modal" data-target="#modalAdmisiones"><i class="fa fa-handshake-o" aria-hidden="true"></i> Asesoría Admisiones</a>-->
                        <a id="btnadmisiones" title="Asesoría Admisiones" class="btn-auth btn-arriba" href="#" data-toggle="modal" data-target="#modalAdmisiones" style="background: #ffe156; color: #2c3e50"><img src="images/Logo_asesor_fon.png" alt="Logo_asesor" width="26" height="26" /> Asesoría Admisiones</a>
                        <a title="Ingresar al Aula virtual" class="btn-auth btn-auth btn-arriba" href="https://aulavirtual.unicab.org/login" target="_blank"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Aula Virtual</a>
                        <a title="Ingresar a registro académico" class="btn-auth btn-auth btn-arriba" href="https://unicab.org/registro/"><i class="fa fa-list-alt" aria-hidden="true"></i> Registro Académico</a>
                        <a title="Correo Institucional" class="btn-auth btn-auth btn-arriba btn_g" href="https://mail.google.com/a/unicab.org/" target="_blank"><i class="fa fa-google" aria-hidden="true"></i> Correo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom-area" id="fixheader">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="main-menu navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="/">
                            <img src="assets/img/logo.png" alt="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menucontent" aria-controls="menucontent" aria-expanded="false">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="menucontent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item" id="itemInicio">
                                    <a class="nav-link dropdown-toggle" href="nosotros.php" data-toggle="dropdown" role="button">Inicio</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="/#blog-area">Blog Conectados</a></li>
                                    </ul>
                                </li>
                                 <li class="nav-item dropdown" id="itemNosotros">
                                    <a class="nav-link dropdown-toggle" href="nosotros.php" data-toggle="dropdown" role="button"><!--<i class="fa fa-users" aria-hidden="true"></i>--> Nosotros</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="quienes-somos.php"><i class="fa fa-users" aria-hidden="true"></i> ¿Quiénes somos?</a></li>
                                        <li class="nav-item"><a class="nav-link" href="historia.php"><i class="fa fa-history" aria-hidden="true"></i> Historia</a></li>
                                        <li class="nav-item"><a class="nav-link" href="mediadores.php"><i class="fa fa-user" aria-hidden="true"></i> Mediadores</a></li>
                                        <li class="nav-item"><a class="nav-link" href="institucion.php"><i class="fa fa-university" aria-hidden="true"></i> La Institución</a></li>
                                        <li class="nav-item"><a class="nav-link" href="modelo-pedagogico.php"><i class="fa fa-line-chart" aria-hidden="true"></i> Modelo Pedagógico e Investigación</a></li>
                                        <li class="nav-item"><a class="nav-link" href="comunicados.php"><i class="fa fa-pencil-square" aria-hidden="true"></i> Comunicados</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown" id="itemServicios">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"><!--<i class="fa fa-check-square-o" aria-hidden="true"></i>--> Admisiones</a>
                                    <ul class="dropdown-menu"><!-- fa-file-text | fa-list-alt  esto podría ser también el icono de eval_pres.php -->
                                        <!--<li class="nav-item"><a class="nav-link" href="admisiones-antiguos.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Antiguos</a></li>
                                        <li class="nav-item"><a class="nav-link" href="admisiones-nuevos.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Nuevos</a></li>
                                        <li class="nav-item"><a class="nav-link" href="admisiones-nuevos1.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Solicitud matrícula</a></li>
                                        <li class="nav-item"><a class="nav-link" href="pre_admisiones.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Solicitud matrícula</a></li>-->
                                        <li class="nav-item"><a class="nav-link" href="eval_adm.php"><i class="fa fa-check-circle" aria-hidden="true"></i> Evaluación admisión</a></li>
                                        <li class="nav-item"><a class="nav-link" href="costos.php"><i class="fa fa-usd" aria-hidden="true"></i> Costos 2021</a></li>
                                        <li class="nav-item"><a class="nav-link" href="pagos_payservices.php"><i class="fa fa-money" aria-hidden="true"></i> Pagos</a></li>
                                    </ul>
                                </li>
                                <!--<li class="nav-item" id="itemEventos"><a class="nav-link" href="eventos.php"> Eventos</a></li>-->
                                <li class="nav-item" id="itemEventos"><a class="nav-link" href="revista.php"> Revista</a></li>
                                <li class="nav-item" id="itemDirectorio"><a class="nav-link" href="directorio.php"><!--<i class="fa fa-phone" aria-hidden="true"></i>--> Directorio</a></li>
                                <li class="nav-item dropdown" id="itemDiplomados">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"><!--<i class="fa fa-star" aria-hidden="true"></i>--> Diplomados</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="d_elearning.php"><i class="fa fa-check-circle" aria-hidden="true"></i> E-learning</a></li>
                                        <!--<li class="nav-item"><a class="nav-link" href="admisiones-nuevos.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Nuevos</a></li>
                                        <li class="nav-item"><a class="nav-link" href="costos.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Costos 2020</a></li>
                                        <li class="nav-item"><a class="nav-link" href="pagos.php"><i class="fa fa-money" aria-hidden="true"></i> Pagos</a></li>-->
                                    </ul>
                                </li>
                                <li class="nav-item" id="itemContacto"><a class="nav-link" href="contacto.php"><!--<i class="fa fa-envelope-o" aria-hidden="true"></i>--> Contacto</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
    <!--<div class="tarjeta" >
		<div id="atras" class="atras">
			<p>
				<a title="Asesoría Admisiones" class="btn-auth btnghf" href="#" data-toggle="modal" data-target="#modalAdmisiones"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Asesoría Admisiones</a>
			</p>
		</div>
		<div id="frente" class="frente">
			<a title="Asesoría Admisiones" href="#" data-toggle="modal" data-target="#modalAdmisiones"><img src="images/admisiones.png" alt="admisiones" width="150" height="100" /></a>
		</div>
	</div>-->
    
    <div id="modalAdmisiones" class="modal fade" role="dialog">
       <div class="modal-dialog">
           <!-- Modal content-->
           <div class="modal-content">
               <div class="modal-header">
                   <button id="cerrar" type="button" class="close" data-dismiss="modal" style="margin-right: 0;"><img src="images/Logo_cerrar.png" alt="Logo_cerrar" width="14" height="14" /></button><br/>
                   <!--<h4 class="modal-title" style="text-align-last: center">Asesoría Admisiones</h4>-->
               </div>
               <div class="modal-body">
                   <div style="margin-left: 40%">
                       <img src="images/Logo_atencio2.png" alt="Logo_atencio2" width="94" height="94" />
                       <br/><br/>
                       <div id="divlinea">.....</div>
                   </div>
                   <div class="text">
                        <div style="width: 100%; background: #ffe156;">
                            <center>
                                <p style="width: 70%;">Para nosotros es un placer asesorarte en el proceso de admisiones y matrículas. Por favor escríbenos al siguiente correo: </p>
                            </center>
                        </div>
                        <center>
                            <a href="mailto:matriculas.academica@unicab.org" style="color: #2c3e50;"><strong><img src="images/Logo_email2.png" alt="Logo_email2" width="28" height="28" /></strong>  matriculas.academica@unicab.org</a>
                            <!--<a href="mailto:matriculas.academica@unicab.org" style="color: #2c3e50;"><strong><i class="fa fa-envelope-square"></i></strong>  matriculas.academica@unicab.org</a>-->
                            <br/><br/>
                            <p>O si lo prefieres, comunícate al siguiente número: </p>
                            <a><strong><img src="images/Logo_whatsapp2.png" alt="Logo_whatsapp2" width="28" height="28" /></strong> 310 753 7532 </a>
                            <br/><br/><p>En el siguiente horario: </p>
                            <p>Lunes a Viernes de:</p>
                            <p>8:00 am a 12:30 pm y de 2:00 pm a 6:00 pm</p>
                            <p>Sábados de 8:00 am a 1:00 pm</p>
                            <!--<a><strong><img src="images/Logo_whatsapp2.png" alt="Logo_whatsapp2" width="28" height="28" /></strong> 300 815 6531 </a>-->
                            <!--<a><strong> <i class="fa fa-phone-square" aria-hidden="true"></i></strong> 310 753 7532 </a>-->
                            <!--<hr><br/>
                            <a><strong> <i class="fa fa-whatsapp" aria-hidden="true"></i></strong> 310 753 7532 </a>-->
                        </center>
                    </div>
               </div>
               <!--<div class="modal-footer">
                   <button type="button" class="btn btn-auth" data-dismiss="modal">Cerrar</button>
               </div>-->
           </div>
       </div>
    </div>
</body>
</html>