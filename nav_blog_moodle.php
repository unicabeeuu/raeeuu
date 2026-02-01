<?php 
    include "admin-unicab/php/conexion.php";
	$idcat = $_REQUEST['idcat'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
    #btn_active{
        background-color: red;
    }
	#b_encabezado {
		background-color: #fff2a3;
		color: #2C3F50; 
	}

	#b_grupoinvestigacion:hover {
		background-color: #5eea8e;
	}
	#b_talentos:hover {
		background-color: #5eea8e;		
	}
	#b_condecoraciones:hover {
		background-color: #5eea8e;
	}
	#b_experiencias:hover {
		background-color: #5eea8e;
	}	
	#b_maestros:hover {
		background-color: #5eea8e;
	}

	#b_grupoinvestigacion a {
		color: #2C3F50;
		font-size: 17px;
		font-family: 'Roboto', sans-serif;
	}

	#b_talentos a {
		color: #2C3F50;
		font-size: 17px;
		font-family: 'Roboto', sans-serif;
	}

	#b_condecoraciones a {
		color: #2C3F50;
		font-size: 17px;
		font-family: 'Roboto', sans-serif;
	}

	#b_experiencias a {
		color: #2C3F50;
		font-size: 17px;
		font-family: 'Roboto', sans-serif;
	}
	
	#b_maestros a {
		color: #2C3F50;
		font-size: 17px;
		font-family: 'Roboto', sans-serif;
	}
	.contenedor{
		position: relative;
		display: inline-block;
		text-align: center;
	}

	.centrado{
		position: absolute;
		top: 85%;
		left: 50%;
		transform: translate(-50%);
		color: #FFE742;
	}
	#btn_success{
		font-size: 15px; font-weight:bold; background:#38C961;
	}
	.activeblog {
		background-color: #5eea8e;
	}
</style>

            <div class="container">
                <div class="row text-center" id="b_encabezado">
                    <?php
                        $sqlcat = "SELECT * FROM tbl_categorias_blog";
                        $rescat = mysqli_query($conexion, $sqlcat);
                        while ($fila = mysqli_fetch_array($rescat)){
                            if($fila['categoria'] == "CONDECORACIONES") {
								if($idcat == 1 ) {
									echo '<div class="col-sm pt-4 pb-4 activeblog" id="b_condecoraciones">
                                            <a href="categorias_blog.php?c=cond"> '.$fila['categoria'].'</a>
                                        </div>';
								}
								else {
									echo '<div class="col-sm pt-4 pb-4" id="b_condecoraciones">
                                            <a href="categorias_blog.php?c=cond"> '.$fila['categoria'].'</a>
                                        </div>';
								}
                                
                            }
                            else if($fila['categoria'] == "EXPERIENCIAS EXITOSAS") {
								if($idcat == 2 ) {
									echo '<div class="col-sm pt-4 pb-4 activeblog" id="b_experiencias">
                                            <a href="categorias_blog.php?c=exp"> '.$fila['categoria'].'</a>
                                        </div>';
								}
								else {
									echo '<div class="col-sm pt-4 pb-4" id="b_experiencias">
                                            <a href="categorias_blog.php?c=exp"> '.$fila['categoria'].'</a>
                                        </div>';
								}
                                
                            }
                            else if($fila['categoria'] == "INVESTIGACIÓN GIU") {
								if($idcat == 3 ) {
									echo '<div class="col-sm pt-4 pb-4 activeblog" id="b_grupoinvestigacion">
                                            <a href="categorias_blog.php?c=giu"> '.$fila['categoria'].'</a>
                                        </div>';
								}
								else {
									echo '<div class="col-sm pt-4 pb-4" id="b_grupoinvestigacion">
                                            <a href="categorias_blog.php?c=giu"> '.$fila['categoria'].'</a>
                                        </div>';
								}
                                
                            }
                            /*else if($fila['categoria'] == "RESULTADOS ESTUDIANTES") {
                                echo '<div class="col-sm pt-4 pb-4" id="b_talentos">
                                            <a href="categorias_blog.php?c=tal"> '.$fila['categoria'].'</a>
                                        </div>';
                            }*/
							else if($fila['categoria'] == "MAESTRO INVESTIGADOR") {
								if($idcat == 5 ) {
									echo '<div class="col-sm pt-4 pb-4 activeblog" id="b_maestros">
                                            <a href="categorias_blog.php?c=mi"> '.$fila['categoria'].'</a>
                                        </div>';
								}
								else {
									echo '<div class="col-sm pt-4 pb-4" id="b_maestros">
                                            <a href="categorias_blog.php?c=mi"> '.$fila['categoria'].'</a>
                                        </div>';
								}
                                
                            }
                        }
                    ?>
                </div>
            </div>
</body>
</html>