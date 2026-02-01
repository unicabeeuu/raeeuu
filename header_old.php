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


<div class="preheader-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-0 col-sm-0 col-xs-0" id="ColumnaFecha">
                    <div class="preheader-left">
                        <a href="mailto:matriculas.academica@unicab.org"><strong><i class="fa fa-envelope-square"></i></strong>  matriculas.academica@unicab.org</a>
                        <!--<a><strong><i class="fa fa-phone-square"></i></strong> (+57) 7752309</a>-->
                        <a><strong> <i class="fa fa-clock-o" aria-hidden="true"></i></strong> <?php echo $fechaActual; ?> </a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 text-right">
                    <div class="preheader-right">
                        <a title="Ingresar al Aula virtual" class="btn-auth btn-auth btn-arriba" href="https://aulavirtual.unicab.org/login" target="_blank"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Aula Virtual</a>
                        <a title="Ingresar a registro académico" class="btn-auth btn-auth btn-arriba" href="https://unicab.org/registro/"><i class="fa fa-list-alt" aria-hidden="true"></i> Registro Académico</a>
                        <a title="Correo Institucional" class="btn-auth btn-auth btn-arriba btn_g" href="http://correo.unicab.org/"><i class="fa fa-google" aria-hidden="true"></i> Correo</a>
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
                                <li class="nav-item" id="itemInicio"><a class="nav-link" href="/"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
                                 <li class="nav-item dropdown" id="itemNosotros">
                                    <a class="nav-link dropdown-toggle" href="nosotros.php" data-toggle="dropdown" role="button"><i class="fa fa-users" aria-hidden="true"></i> Nosotros</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="quienes-somos.php"><i class="fa fa-users" aria-hidden="true"></i> ¿Quiénes somos?</a></li>
                                        <li class="nav-item"><a class="nav-link" href="historia.php"><i class="fa fa-history" aria-hidden="true"></i> Historia</a></li>
                                        <li class="nav-item"><a class="nav-link" href="mediadores.php"><i class="fa fa-user" aria-hidden="true"></i> Mediadores</a></li>
                                        <li class="nav-item"><a class="nav-link" href="institucion.php"><i class="fa fa-university" aria-hidden="true"></i> La Institución</a></li>
                                        <li class="nav-item"><a class="nav-link" href="modelo-pedagogico.php"><i class="fa fa-line-chart" aria-hidden="true"></i> Modelo Pedagógico e Investigación</a></li>
                                        <li class="nav-item"><a class="nav-link" href="comunicados.php"><i class="fa fa-pencil-square" aria-hidden="true"></i> Comunicados</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item" id="itemEventos"><a class="nav-link" href="eventos.php"><i class="fa fa-calendar" aria-hidden="true"></i> Eventos</a></li>
                                <li class="nav-item" id="itemDirectorio"><a class="nav-link" href="directorio.php"><i class="fa fa-phone" aria-hidden="true"></i> Directorio</a></li>
                               
                                <li class="nav-item dropdown" id="itemServicios">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"><i class="fa fa-check-square-o" aria-hidden="true"></i> Admisiones</a>
                                    <ul class="dropdown-menu">
                                        <!--<li class="nav-item"><a class="nav-link" href="admisiones-antiguos.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Antiguos</a></li>
                                        <li class="nav-item"><a class="nav-link" href="admisiones-nuevos.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Nuevos</a></li>-->
                                        <li class="nav-item"><a class="nav-link" href="admisiones-nuevos1.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Solicitud matrícula</a></li>
                                        <li class="nav-item"><a class="nav-link" href="costos.php"><i class="fa fa-usd" aria-hidden="true"></i> Costos 2020</a></li>
                                        <li class="nav-item"><a class="nav-link" href="pagos_payservices.php"><i class="fa fa-money" aria-hidden="true"></i> Pagos</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown" id="itemDiplomados">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"><i class="fa fa-star" aria-hidden="true"></i> Diplomados</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="d_elearning.php"><i class="fa fa-check-circle" aria-hidden="true"></i> E-learning</a></li>
                                        <!--<li class="nav-item"><a class="nav-link" href="admisiones-nuevos.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Nuevos</a></li>
                                        <li class="nav-item"><a class="nav-link" href="costos.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Costos 2020</a></li>
                                        <li class="nav-item"><a class="nav-link" href="pagos.php"><i class="fa fa-money" aria-hidden="true"></i> Pagos</a></li>-->
                                    </ul>
                                </li>
                                <li class="nav-item" id="itemContacto"><a class="nav-link" href="contacto.php"><i class="fa fa-envelope-o" aria-hidden="true"></i> Contacto</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>