<?php
	require 'vendor/autoload.php';
	
	$conn = new MongoDB\Client("mongodb://localhost:27017");
    $col = $conn->quevotan->Legislatura;
    $data = $col->find()->toArray();
   
   	$data2 = $data[0]['50']['sesiones'];

   	print_r($data2[0]);
	// Enviar datos a Js 
	#$resultado = $_POST['array'];

	#echo ("resultado :".$resultado);
	#$aDatos = $col->find()->toArray();
	#print_r($aDatos[0]);
	#Variables 

	#foreach ($data as $dato) {
	#	echo "<img src='data:image/png;base64,",$dato['imagen'],"' onclick=retorna(",$dato['_id'],") />";
	#}
	
?>
