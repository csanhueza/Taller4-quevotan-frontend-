<!DOCTYPE html>
<html>
<head>

<script type="text/javascript" src="Js/jquery.min.js"></script>
<script type="text/javascript" src="Js/popper.min.js"></script>
<script type="text/javascript" src="Js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="Css/bootstrap.min.css">



	<title> Prueba Tabla</title>
</head>
<body>
	<div class="container">
		<div class="col-10">
		<table style="width: 50%;position:absolute;">
			<tr>
				<td> 1 </td>
				<td> 2 </td>
				<td> 3 </td>
			</tr>
			<tr>
				<td> 4 </td>
				<td> 5 </td>
				<td> 6 </td>
			</tr>
		</table>
    </div>





<script type="text/javascript">
	var nombre ;
    $(document).ready(function() {
            $(".card").hide();
            $("td").mouseenter(function(ev) {
                nombre = $(this).html();
                window.location.href = window.location.href + "?n1=" + nombre;
                $(".card").css("left", ev.clientX + 5);
                $(".card").css("top", ev.clientY + 5);
                $(".card").show();
            });
            $("td ").mouseout(function(){
                $(".card").hide();
            });

    });
</script>
<?php
	$nombre = $_GET['n1'];
	echo"<div class='card' style='width: 10rem; position: fixed;'>";
	echo "<img class='card-img-top' src='img/img1.jpg' alt='Card image cap'>";
	echo "<div class='card-body'>";
	echo "<h5 class='card-title'><p>".$nombre."</p></h5>";
    echo "<p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>";
	echo"</div></div>";
	unset ($_GET["n1"]);

?>
</div>
</body>
</html>