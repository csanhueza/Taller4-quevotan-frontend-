var express    = require('express');        // Utilizaremos express, aqui lo mandamos llamar

var app        = express();                 // definimos la app usando express
var bodyParser = require('body-parser'); //

// configuramos la app para que use bodyParser(), esto nos dejara usar la informacion de los POST
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

var port = process.env.PORT || 8080;        // seteamos el puerto

var router = express.Router();   //Creamos el router de express

// Le decimos a la aplicación que utilize las rutas que agregamos
app.use('/api', router);

// Iniciamos el servidor
app.listen(port);
console.log('Aplicación creada en el puerto: ' + port);



var mongoose = require('mongoose'); // Utilizamos la librería de mongoose
//Creamos la conexión con mongo
mongoose.connect('mongodb://localhost:27017/quevotan');