<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="imagenes/Chile.ico" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Que Votan</title>
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
    <section class="cols-sm-auto">
          <div class="container" id="Cargar_diputados"> 
            <div class="row">
              <div class="col-10 text-center">
                <br>
                <h1> Diputados Actuales</h1>
                <hr> 
                <br>
              </div>
              <div class="col-10">
                <ul class="list-inline" id="lista">
<?php
  require 'vendor/autoload.php';
  
  $conn = new MongoDB\Client("mongodb://localhost:27017");
  $col = $conn->quevotan->parlamentario;
  $data = $col -> find()->toArray();

  $i = 0;
  while( $i < count($data))
  {
    $nombres = $data[$i]['nombre']." ".$data[$i]['apellido_paterno'];
    echo "<li class='list-group-item'><a href='perfil.php?id=".$data[$i]['_id']."'>".$nombres."</a></li>";
    $i+=1;
  }  
?>

                </ul>
              </div>
            </div> 
            </div>
    <br>
    </section>
    <!-- BOOTSTRAP 4 -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script type="text/javascript" src="js/jquery.js"></script>
  </body>
</html>