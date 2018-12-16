<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/Chile.ico" />
    <title>menu lateral</title>

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
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                  <!-- titulo menu-->
                    <a href="#">
                        QueVotan
                    </a>
                </li>
                <!-- menu lateral interno-->
                <li>
                    <a href="index.html">Inicio</a>
                </li>
                <li>
                    <a href="#">Boletin</a>
                </li>
                <li>
                    <a href="Diputados.html">Diputados</a>
                </li>
                <li>
                    <a href="Contacto.html">Contacto</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
              <!-- texto adicional -->

                <h1>Boletin</h1>
                <hr>
                <p>Graficos</p>
                <br>
                <!-- boton menu-->
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Menu</a>
                <section>
                    <div id="chart"></div>
                </section>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
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

</body>

</html>
