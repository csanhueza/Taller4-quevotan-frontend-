var search = null;
function get_data() {
	search = document.getElementById('search').value.toLowerCase();
	loadDoc();
}
//------------------------
// Cargar Xml 
//------------------------
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
   		myFunction(this,search);
    }
  };
  xhttp.open("GET", "xml/diputados.xml", true);
  xhttp.send();
}
function myFunction(xml, cadena) {
  var i;
  var nombre , rut , fecha;
  var existe = new Boolean(false);
  var xmlDoc = xml.responseXML;
  var x = xmlDoc.getElementsByTagName("DiputadoPeriodo");
  for (i = 0; i <x.length; i++) { 
   nombre =  x[i].getElementsByTagName("Nombre")[0].childNodes[0].nodeValue.toLowerCase();
   if(nombre === search ){
      existe = true;
      rut = x[i].getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;
      apellido = x[i].getElementsByTagName("ApellidoPaterno")[0].childNodes[0].nodeValue;
   }
   //x[i].getElementsByTagName("ApellidoPaterno")[0].childNodes[0].nodeValue 
  }
  if (existe == true){
    document.getElementById("data").innerHTML = '<p>'+rut+'</p>'+
    '<p>'+apellido+'</p>';  
  }else{
    document.getElementById("data").innerHTML = "No se Encuentra";
  }
}


