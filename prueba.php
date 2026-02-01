<?php
    include "admin-unicab/php/conexion.php";
    
    $sql = "INSERT INTO tbl_prueba (texto) VALUES ('ghf')";
    $petecion=mysqli_query($conexion,$sql);
    
	$fecha = "20120914";
	//$fecha1 = new Date(substr(fecha,0,4)."-".substr(fecha,4,2)."-".substr(fecha,6,2));
	$fecha1 = substr($fecha,0,4)."-".substr($fecha,4,2)."-".substr($fecha,6,2);
	//$fecha2 = date_create_from_format('Y-m-d', $fecha1);
	
	$x = 5;
	echo $x+++$x++;
	echo "<br>";
	echo $x;
	echo "<br>";
	echo $x---$x--;
	echo "<br>";
	echo $x;
	
	$a = '1';
	$b = &$a;
	$b = "2$b";
	echo "<br>".$a." ".$b;
	
	var_dump(0123 == 123);
	var_dump('0123' == 123);
	var_dump('0123' === 123);
	
	echo "<br>";
	$array1    = array("color" => "red", 2, 4);
	$array2    = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
	$resultado = array_merge($array1, $array2);
	print_r($resultado);
	
	echo "<br>";
	$data = array("Correos"=>array("hernando.figueredo@dolphining.com", "g.h.fig.1073@gmail.com"), 
			"TextoPlano"=>false, "Asunto"=>"Asunto Prueba", "Mensaje"=>"<p><strong>This is test html</strong></p>");
	$data_string = json_encode($data);
	print_r($data_string);
	
	$num1 = 10;
	$num2 = "5";
	$sum = $num1+$num2;
	echo $sum;
	
	$nombre = "a";
	$apellido = "b";
	echo "El nombre completo es $nombre $apellido";
	
	$numeros = array(1,2,3,4,5,);
	foreach ($numeros as $numero) {
		echo "<br>".$numero;
	}
	$x = 5;
	$y = 10;
	$resultado = $x * $y;
	echo "<br>El resultado es:".resultado;
?>
<!DOCTYPE html>
    <head>
		<!-- Bootstrap Core CSS -->
        <link href="registro/docenteunicab/updreg/css/bootstrap.css" rel='stylesheet' type='text/css' />
        
        <script>
            var fecha = "2019-08-21";
            var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
            var fecha1 = new Date(fecha);
            //alert(fecha1.getDay());
            //alert(diasSemana[fecha1.getDay()]);
            //document.write(diasSemana[fecha1.getDay()] + ", " + fecha1.getDate() + " de " + meses[fecha1.getMonth()] + " de " + fecha1.getFullYear());
            
            var parts ='2021-01-31'.split('-');
            // Please pay attention to the month (parts[1]); JavaScript counts months from 0:
            // January - 0, February - 1, etc.
            var mydate = new Date(parts[0], parts[1] - 1, parts[2]); 
			//alert(mydate);
            //alert(mydate.toDateString());
            //alert(diasSemana[mydate.getDay()]);

        </script>
		
		<script type="text/javascript" src="registro/docenteunicab/updreg/js/jquery.min.js"></script>
		<script type="text/javascript" src="registro/docenteunicab/updreg/js/moment.min.js"></script>
		<script type="text/javascript" src="registro/docenteunicab/updreg/js/daterangepicker.min.js"></script>
		<link rel="stylesheet" type="text/css" href="registro/docenteunicab/updreg/css/daterangepicker.css" />
		
		<!-- Bootstrap Core JavaScript -->
       <script src="registro/docenteunicab/updreg/js/bootstrap.js"> </script>
    	<!-- //Bootstrap Core JavaScript -->
		
		<script>
		$(function() {
			generarCB();
			
		  $('input[name="birthday"]').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			minYear: 2020,
			maxYear: parseInt(moment().format('YYYY'),10),
			autoApply: true,
			locale: {
				format: "YYYY-MM-DD"
			}
		  });
		  
		  $('input[name="drpghf"]').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			minYear: 2020,
			maxYear: parseInt(moment().format('YYYY'),10),
			autoApply: true,
			locale: {
				format: "YYYY-MM-DD"
			}
		  });
		});
		
		function abrirModal() {
			$('#modal_new').modal('toggle');
            $('#modal_new').modal('show');
			var fecha = $("#ghf").val();
			console.log(fecha);
		}
		function asignar() {
			$("#ghf").val("2023-10-15");
		}
		function generarCB() {
			var data = "60168006532557";
			$("#imCB").html('<img src="barcode/barcode.php?text='+data+'&size=90&codetype=code128&print=true"/>');
			$("#imCB1").html('<img src="barcodegen/example/code/test_code128.php?text='+data+'"/>');
		}
		</script>
		
		<style>
			/* Removes the clear button from date inputs */
			input[type="date"]::-webkit-clear-button {
				display: none;
			}

			/* Removes the spin button */
			input[type="date"]::-webkit-inner-spin-button { 
				display: none;
			}

			/* A few custom styles for date inputs */
			input[type="date"] {
				appearance: none;
				-webkit-appearance: none;
				color: black !important;
				font-family: "Helvetica", arial, sans-serif;
				font-size: 1.2em;
				border:1px solid gray;
				background:lightgray;
				padding:5px;
				display: inline-block !important;
				visibility: visible !important;
			}
			input[type="date"]::-webkit-calendar-picker-indicator{
				background-color: #fe921c;
				padding: 5px;
				cursor: pointer;
				border-radius: 3px;
			}

			input[type="date"], focus {
				color: black;
				box-shadow: none;
				-webkit-box-shadow: none;
				-moz-box-shadow: none;
			}
		</style>
        
    </head>
    <body>
        <label><?php echo "<br>".$fecha1."<br>".$fecha2; ?></label><br>
		
		<input type="text" name="birthday" value="" class="form-control"/><br>
		
		<input type="date" id="ghf" name="ghf" class="form-control" min="2020-01-01" max="2040-12-31" required/>
		
		<button id="btncontinuar" class="btn btn-primary" onclick="abrirModal()">Continuar</button>
		<button id="btncontinuar" class="btn btn-primary" onclick="asignar()">Asignar</button>
		
		<div id="imCB">
		</div>
		<div id="imCB1">
		</div>
		
		<!-- Modal de nueva pregunta respusta corta -->
        <div class="modal fade" id="modal_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">NUEVA PREGUNTA DE RESPUESTA CORTA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input type="text" name="drpghf" value="" />
              </div>
              <div class="modal-footer">
                  <label id="lblmsg"></label><img id="imgnp" src="../../images/caract_no_perm.png" style="display: none;" width="361" height="40">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-warning" id="btnguardar" data-dismiss="modal" style="display: none;" onclick="guardar()">Guardar</button>
                
              </div>
            </div>
          </div>
        </div>
        

    </body>
</html>