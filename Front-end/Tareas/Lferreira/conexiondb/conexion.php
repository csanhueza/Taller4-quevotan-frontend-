<?php
	require 'vendor/autoload.php';
	
	$conn = new MongoDB\Client("mongodb://localhost:27017");
    $col = $conn->quevotan->Legislatura;
    $col2 = $conn->quevotan->parlamentario;
    $data = $col->find()->toArray();
   
   	$data2 = $col2->find()->toArray();

   	foreach ($data2 as $dato) {
   		    echo "<a style='text-decoration:none;color:black;visibility: hidden;' href='perfil.php?id=".$dato['_id']."'><div class='card'>";
    echo "<div class='card-header bg-success text-white'>id : ".$dato['_id'].", Nombre: ". $dato['nombre']." ".$dato['apellido_paterno']."</div>";
    echo "</div></a>";
    echo "<br>";
   	}



	#}
	
?>
