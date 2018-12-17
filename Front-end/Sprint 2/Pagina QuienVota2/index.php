<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Que Votan</title>
    <link rel="shortcut icon" href="imagenes/Chile.ico" /> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Style -->
    <style media="screen">
      @media (min-width: 576px) {
        body {
          background: #F7F9F9;
        }
      }
      @media (min-width: 768px) {
        body {
          background:  #F7F9F9;
        }
      }
      @media (min-width: 992px) {
        body {
          background:  #F7F9F9;
        }
      }
      @media (min-width: 1200px) {
        body {
          background:  #F7F9F9;
        }
      }
    </style>
  </head>
  <body>
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="css/main.css">

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #2CB1C5;">
      <!--- Navegador/menu -->
      <div class="container">
        <a href="#" class="navbar-brand">
          <img src="imagenes/logo350.png" width="80" height="80" alt="">
          QueVotan
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
          <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse" id="menu">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link"  href="index.php">Inicio</a></li>
            <li class="nav-item"><a class="nav-link"  href="Diputados.php">Diputados</a></li>
            <li class="nav-item"><a class="nav-link"  href="Acercade.html">Acerca de</a></li>
            <li class="nav-item"><a class="nav-link"  href="contacto.html">Contacto</a></li>
          </ul>
        </div>
      </div>
    </nav>
<header>
      <!-- carrusel -->
      <div class="container">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="imagenes/image1.jpg" alt="First slide" >
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="imagenes/image2.jpg" alt="Second slide" >
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="imagenes/image3.jpg"  alt="Third slide" >
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
</header>
    <section>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="container">
    <br/>
	<div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">
      <form class="card card-sm">
        <div class="card-body row no-gutters align-items-center">
          <div class="col-auto">
            <i class="fas fa-search h4 text-body"></i>
              </div>
                <!--end of col-->
                  <div class="col">
                    <input id='datos' class="form-control form-control-lg form-control-borderless" type="search" placeholder="Buscar Votaciones o Diputados...">
                  </div>
                  <!--end of col-->
                  <div class="col-auto">
         <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></button>
            <ul class="dropdown-menu">
               <li>
                   <label class="dropdown-menu-item checkbox" style="margin-left: 10%;">
                       <input id='dipu' type="checkbox" />
                       <span class="glyphicon glyphicon-unchecked"></span>
                        Diputados
                   </label>
               </li>
               <li>
                   <label class="dropdown-menu-item checkbox" style="margin-left: 10%;">
                       <input id='proy'type="checkbox" />
                       <span class="glyphicon glyphicon-unchecked"></span>
                       Proyecto
                   </label>
               </li>
            </ul>
         </div>
                    
                  </div>
                  <!--end of col-->
          </div>
        </form>
      </div>
      <!--end of col-->
    </div>
    <br> 
    <div id="lista">
<?php       
  require 'vendor/autoload.php';
  
  $conn = new MongoDB\Client("mongodb://localhost:27017");
  $col = $conn->quevotan->proyecto;
  $data = $col -> find()->toArray();
  
  $i = 0;
  while( $i < count($data))
  {
    echo "<a style='text-decoration:none;color:black;' href='Detalle.php?id=".$data[$i]['id_votacion']."'><div class='card'>";
    echo "<div class='card-header bg-success text-white'>ID : ".$data[$i]['id_votacion'].", Materia: ". $data[$i]['materia']."</div>";
    echo "<div class='card-body'>Detalle : ".$data[$i]['nombre']."</div>"; 
    echo "</div></a>";
    echo "<br>";
    $i+=1;
  }     
?>
    </div>
    </div>
    
    </section>

    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">

          <!-- Grid row -->
          <div class="row">

            <!-- Grid column -->
            <div class="container mt-5 mb-4 text-center text-md-left">

              <!-- Content -->
            <h3> Informacion del Contacto</h3>
            <br>
            <address>
                <span>CAMPUS SAN JUAN PABLO II</span><br>
                <span><strong>Direc:</strong> Rudecindo Ortega 02950</span><br>
                <span><strong>Fono:</strong> (45) 2 553978</span><br>
                <span><strong>Email:</strong><a href="mailto:quevotan@inf.uct.cl"> quevotan@inf.uct.cl</a></span><br>
                <span><strong>Web:</strong><a href="#"> http://www.inf.uct.cl</a></span><br>
            </address>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->


          </div>
          <!-- Grid row -->

        </div>


        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2018 Copyright:
          <a href="#"> ...</a>
        </div>
        <!-- Copyright -->

      </footer>
      <!-- Footer -->

    <!-- BOOTSTRAP 4 -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
  var dipu = false;
  var proy = false;
  var d_i=0; var p_i = 0;
  $(document).ready(function(){
    $('input[type="submit"]').attr('disabled','disabled');

    $("#proy").on('click',function(){
      if($(this).is(':checked')){
        proy = true;
        if(dipu) alert("Solo una casilla Selecciona");
        else buscar();
      }else proy =false
    });
    $("#dipu").on('click',function(){
      if($(this).is(':checked')){
            dipu=true;
            if(proy)alert("Solo una casilla Selecciona");
            else alert("diputado");
      }else dipu = false;
      });
  });

  function buscar(){
      $("#datos").keyup(function(){ 
        var value = $(this).val().toLowerCase();
        $("#lista .card").filter(function(){
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });   
        if($(this).val() != ''){
           $('input[type="submit"]').removeAttr('disabled');
        }
      });
  }
</script>

</html>