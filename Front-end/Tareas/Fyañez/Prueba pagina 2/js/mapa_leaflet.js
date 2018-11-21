var coord = [-38.702581, -72.548314];
var mymap = L.map('map').setView(coord, 17);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
maxZoom:20
}).addTo(mymap);
L.marker(coord).addTo(mymap).bindPopup('Universidad Catolica').openPopup();