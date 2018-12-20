//------------------------
// Cargar Xml 
//------------------------
/*function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
   		myFunction(this);
    }
  };
  xhttp.open("GET", "xml/diputados.xml", true);
  xhttp.send();
}
function myFunction(xml) {
  var i;
  var nombre , rut , fecha;
  var xmlDoc = xml.responseXML;
  var x = xmlDoc.getElementsByTagName("DiputadoPeriodo");
  for (i = 0; i <x.length; i++) { 
   nombre =  x[i].getElementsByTagName("Nombre")[0].childNodes[0].nodeValue.toLowerCase();
   alert(nombre);
   }	
}*/

