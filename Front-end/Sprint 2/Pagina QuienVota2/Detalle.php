<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/Chile.ico" />
    <title>Grafico</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>
<style type="text/css">
.axis path,
.axis line {
    fill: none;
    stroke: black;
    shape-rendering: crispEdges;
        }

.axis text {
    font-family: sans-serif;
    font-size: 11px;
}

</style>
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
                    
                <h1>Boletin</h1>
                <hr>
                <p>Graficos</p>
                <br>
                    <div id="chart"></div>
                    <div class="col-10">
                        <H1> Diputados Que Votaron</H1>
                        <hr>
                    <?php
                     $id = $_GET['id'];
                      error_reporting(0);
                      require 'vendor/autoload.php';

                      $conn = new MongoDB\Client("mongodb://localhost:27017");
                      $col = $conn->quevotan->votacion;
                      $col2 = $conn->quevotan->parlamentario;

                      $data = $col -> find(['Id'=> $id])->toArray();
                      $i = 1;
                      $aDiputados = array();
                      foreach ($data as $d) {
                         $par  = $col2-> find(['_id'=>$d['Id_Diputado']])->toArray();
                         $nombre = $par[0]['nombre']." ".$par[0]['apellido_paterno'];
                         array_push($aDiputados,$nombre); #echo     
                      }
                      $aDiputados = array_unique($aDiputados);
                      $y =0;
                      echo "<table>";
                      while($y < count($aDiputados)){
                        if( $i == 1)echo "<tr>";
                        if($i <=4)
                         {
                            echo "<td>".$aDiputados[$y]."</td>";
                            $i +=1;   
                         }else {
                            echo "</tr>";
                            $i =1;
                         }
                        $y +=1;    
                      }
                      echo "</table>";
                    ?>
                </div>
                            <!-- /#page-content-wrapper -->
                        
                        <!-- /#wrapper -->

                        <!-- Bootstrap core JavaScript -->
                        <script src="vendor/jquery/jquery.min.js"></script>
                        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                        <!-- Menu Toggle Script -->
                        <script src="http://d3js.org/d3.v3.min.js"></script>
                        <script src="js/fisheye.js" type="text/javascript"></script>
                    <script>
                        $("#menu-toggle").click(function(e) {
                            e.preventDefault();
                            $("#wrapper").toggleClass("toggled");
                        });
                        d3.json("json/data.json",function(error,json){
                        if(error)
                        {   
                            return console.warn(error);
                        }
                        renderData(json);
                    });
                    function renderData(json){  

                        var data = get_data(json); 
                        var padding = 30, w = 800 , h = 600;

                        //Crear Svg
                        var svg = d3.select("#chart").append("svg")
                            .attr("width", w )
                            .attr("height", w )
                            .append("g")

                        var max_x = d3.max(data,function(d,i) {return d.x;});
                        var min_x = d3.min(data,function(d,i) {return d.x;});

                        var max_y = d3.max(data,function(d,i) {return d.y;});
                        var min_y = d3.min(data,function(d,i) {return d.y;});

                        // Ojo de Pez
                        var fisheye = d3.fisheye.circular()
                            .radius(120);


                        // Color
                        var color = d3.scale.category20();

                        //Escalas para eje x,y
                        var x = d3.scale.linear()
                            .domain([-1,1])
                            .range([padding,w-padding]);
                        var y = d3.scale.linear()
                            .domain([-1,1])
                            .range([h-padding,padding]);
                        // Ejes
                        var xAxis = d3.svg.axis()
                            .scale(x)
                            .orient("bottom");
                        var yAxis = d3.svg.axis()
                            .scale(y)
                            .orient("left")
                            .ticks(5);

                        svg.append("g")
                            .attr("class", "axis")
                            .attr("transform", "translate(0,"+(320-padding)+ ")")
                            .call(xAxis);
                        svg.append("g")
                            .attr("class", "axis")
                            .attr("transform", "translate(" + 400 + ",0)")
                            .call(yAxis);
                        // add Circulos

                        var circulos = svg.selectAll(".Circulos")
                           .data(data)
                           .enter()
                           .append("circle")
                           .attr("class","circulos")
                           .attr("cx",function(d){return x(d.x);})
                           .attr("cy",function(d){return y(d.y);})
                           .attr("r",function(d){return 7})
                           .attr("fill",function(d){return color(d.Partido);})
                           .on("click", function(d){
                                seleccion
                                    .attr('cx',x(d.x))
                                    .attr('cy',y(d.y))
                                    .attr('r',10)
                                    .style('stroke',color(d.Partido))
                                    .transition()
                                    .duration(500)
                                    .attr('r',10)
                                    .style('opacity',1);
                                seleccionTexto
                                    .attr('x',x(d.x)+20)
                                    .attr('y',y(d.y)+10)
                                    .attr('fill','black')
                                    .style('opacity',1)
                                    .text(d.Nombre);
                            });
                        //Círculo de selección
                        var seleccion = svg.append('circle')
                            .attr("class", "seleccion")
                            .attr('cx',0)
                            .attr('cy',0)
                            .attr('r',30)
                            .style('fill','none')
                            .style('opacity',0)
                            .style('stroke','black')
                            .style('stroke-width',2);

                        //Text de selección
                        var seleccionTexto = svg.append('text')
                            .attr("class", "seleccionTexto")
                            .attr('x',0)
                            .attr('y',0)
                            .attr('text-anchor',"middle");
                        // Leyenda 

                        svg2 = d3.select("#ley").append("svg")
                            .attr("width", w )
                            .attr("height", w )
                            .append("g")


                        var legend = svg.selectAll(".legend")
                            .data(color.domain())
                            .enter().append("g")
                            .attr("class","legend")
                            .attr("transform",function(d,i){ return "translate(680,"+12*i+")";});
                        legend.append("rect")
                            .attr("x",100)
                            .attr("width",80)
                            .attr("height",10)
                            .style("fill",color)
                            .on("click",function(d){
                                var a = color(d)
                                circulos
                                 .attr("opacity",function(d){
                                    if(a != color(d.Partido)){
                                        return 0;
                                    }
                                })
                            })
                            .on("mouseover",function(d){
                                circulos
                                .attr("opacity",100);

                            });
                        legend.append("text")
                            .attr("x",50)
                            .attr("y",10)
                            .text(function(d){return d;});
                    }
                    function get_data(json ){
                        var data = new Array(json.Legislatura.length);
                        for(var i=0 ; i < json.Legislatura.length;i++){
                            data[i]=json.Legislatura[i]
                        }
                        return data;
                    }



        
            </script>
    
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

</body>

</html>
