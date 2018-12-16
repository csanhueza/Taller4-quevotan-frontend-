<?php
	require 'vendor/autoload.php';
	
	$conn = new MongoDB\Client("mongodb://localhost:27017");
	$col = $conn->quevotan->parlamentario;
	$data = $col -> find()->toArray();
	
	print_r($data[0]['nombre']);
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
