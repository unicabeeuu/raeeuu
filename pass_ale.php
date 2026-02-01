<?php
	$mayus = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
	$minus = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
	$numeros = array(0,1,2,3,4,5,6,7,8,9);
	$caractEspeciales = array("#","$","%","&","*","_","!","¡","@","+");
	$posiciones = array("0","1","2","3","4","5","6","7","8");
	$pass = array("","","","","","","","","");
	print_r($pass);
	echo "<br>";
	print_r($posiciones);
	
	$pos = mt_rand(1, sizeof($posiciones)) - 1;
	//echo $pos;
	$pos_M = $posiciones[$pos];
	echo $pos." ".$pos_M;
	//unset($posiciones[$pos]);
	array_splice($posiciones, $pos, 1);
	echo "<br>";
	print_r($posiciones);
	$pos = mt_rand(1, sizeof($mayus)) - 1;
	$M = $mayus[$pos];
	$pass[$pos_M] = $M;	
	
	$pos = mt_rand(1, sizeof($posiciones)) - 1;
	//echo $pos;
	$pos_m = $posiciones[$pos];
	echo $pos." ".$pos_m;
	//unset($posiciones[$pos]);
	array_splice($posiciones, $pos, 1);
	echo "<br>";
	print_r($posiciones);
	$pos = mt_rand(1, sizeof($minus)) - 1;
	$m = $minus[$pos];
	$pass[$pos_m] = $m;
	
	$pos = mt_rand(1, sizeof($posiciones)) - 1;
	//echo $pos;
	$pos_ce = $posiciones[$pos];
	echo $pos." ".$pos_ce;
	//unset($posiciones[$pos]);
	array_splice($posiciones, $pos, 1);
	echo "<br>";
	print_r($posiciones);
	$pos = mt_rand(1, sizeof($caractEspeciales)) - 1;
	$ce = $caractEspeciales[$pos];
	$pass[$pos_ce] = $ce;
	
	$pos = mt_rand(1, sizeof($posiciones)) - 1;
	//echo $pos;
	$pos_ce1 = $posiciones[$pos];
	echo $pos." ".$pos_ce1;
	//unset($posiciones[$pos]);
	array_splice($posiciones, $pos, 1);
	echo "<br>";
	print_r($posiciones);
	$pos = mt_rand(1, sizeof($caractEspeciales)) - 1;
	$ce1 = $caractEspeciales[$pos];
	$pass[$pos_ce1] = $ce1;
	
	$pos = mt_rand(1, sizeof($posiciones)) - 1;
	//echo $pos;
	$pos_n1 = $posiciones[$pos];
	echo $pos." ".$pos_n1;
	//unset($posiciones[$pos]);
	array_splice($posiciones, $pos, 1);
	echo "<br>";
	print_r($posiciones);
	$pos = mt_rand(1, sizeof($numeros)) - 1;
	$n1 = $numeros[$pos];
	$pass[$pos_n1] = $n1;
	
	$pos = mt_rand(1, sizeof($posiciones)) - 1;
	//echo $pos;
	$pos_n2 = $posiciones[$pos];
	echo $pos." ".$pos_n2;
	//unset($posiciones[$pos]);
	array_splice($posiciones, $pos, 1);
	echo "<br>";
	print_r($posiciones);
	$pos = mt_rand(1, sizeof($numeros)) - 1;
	$n2 = $numeros[$pos];
	$pass[$pos_n2] = $n2;
	
	$pos = mt_rand(1, sizeof($posiciones)) - 1;
	$pos_n3 = $posiciones[$pos];
	echo $pos." ".$pos_n3;
	//unset($posiciones[$pos]);
	array_splice($posiciones, $pos, 1);
	echo "<br>";
	print_r($posiciones);
	$pos = mt_rand(1, sizeof($numeros)) - 1;
	$n3 = $numeros[$pos];
	$pass[$pos_n3] = $n3;
	
	$pos = mt_rand(1, sizeof($posiciones)) - 1;
	$pos_n4 = $posiciones[$pos];
	echo $pos." ".$pos_n4;
	//unset($posiciones[$pos]);
	array_splice($posiciones, $pos, 1);
	echo "<br>";
	print_r($posiciones);
	$pos = mt_rand(1, sizeof($numeros)) - 1;
	$n4 = $numeros[$pos];
	$pass[$pos_n4] = $n4;
	
	//$pos = mt_rand(1, sizeof($posiciones)) - 1;
	$pos_n5 = $posiciones[0];
	//echo $pos." ".$pos_n5;
	//unset($posiciones[$pos];
	echo "<br>";
	$pos = mt_rand(1, sizeof($numeros)) - 1;
	$n5 = $numeros[$pos];
	$pass[$pos_n5] = $n5;
	
	echo "<br>".$pos_M.$pos_m.$pos_ce.$pos_ce1.$pos_n1.$pos_n2.$pos_n3.$pos_n4.$pos_n5;
	echo "<br>".$M.$m.$ce.$ce1.$n1.$n2.$n3.$n4.$n5;
	
	echo "<br>";
	$con = "";
	for ($i = 0; $i < count($pass); $i++) {
		$con .= $pass[$i];
	}
	//print_r($pass);
	//$con .= " ";
	echo $con;
	
	
	if (preg_match('/[A-Z]/',$con)){
      echo "<br>Hay conincidencia";
   }
   else {
	   echo "<br>No hay conincidencia";
   }
   
   if (preg_match('/[a-z]/',$con)){
      echo "<br>Hay conincidencia";
   }
   else {
	   echo "<br>No hay conincidencia";
   }
   
   if (preg_match('/[#$%&*_!¡]/',$con)){
      echo "<br>Hay conincidencia";
   }
   else {
	   echo "<br>No hay conincidencia";
   }
   
   if (preg_match('/[0-9]/',$con)){
      echo "<br>Hay conincidencia";
   }
   else {
	   echo "<br>No hay conincidencia";
   }
   
   if (preg_match('/[ ]/',$con)){
      echo "<br>Hay conincidencia";
   }
   else {
	   echo "<br>No hay conincidencia";
   }
   
?>