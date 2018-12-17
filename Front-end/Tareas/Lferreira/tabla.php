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
				<th> 1 <th>
				<th> 2 <th>
				<th> 3 <th>
			</tr>
			<tr>
				<th> 4 <th>
				<th> 5 <th>
				<th> 6 <th>
			</tr>
		</table>
		<div class="card" style="width: 10rem; position: relative;">
		  <img class="card-img-top" src="img/img1.jpg" alt="Card image cap">
		  	<div class="card-body">
		    	<h5 class="card-title">Nombre:</h5>
		    	<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  	</div>
 		</div>
    </div>
<script type="text/javascript">
	$(document).ready(function() {
		$(".card").hide();
		$("table").mousemove(function(event){
			// Posiciones del mouse
   			var x = event.pageX - 60;
    		var y = event.pageY - 100;
    		//alert(event.pageX);
			$("th").mouseenter(function() {
				$(".card").show();
				$(".card").css("transform","translate3d("+x+"px,"+y+"px,0px)");
			});
			$("th").mouseout(function(){
				$(".card").hide();
			});
		});
	});

</script>
</body>
</html>