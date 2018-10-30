// See post: http://asmaloney.com/2014/01/code/creating-an-interactive-map-with-leaflet-and-openstreetmap/

var map = L.map( 'map', {
    center: [-40.0, -70.0],
    minZoom: 5,
    
    zoom: 5
});

L.tileLayer( 'http://a.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'OpenStreetMap'
}).addTo( map );

var geojsonMarkerOptions = {
    radius: 50,
    fillColor: "black",
    color: "#000",
    weight: 10,
    opacity: 1,
    fillOpacity: 0.8
};

L.geoJson(geodata, {
    pointToLayer: function (feature, latlng) {
        return L.circleMarker(latlng, geojsonMarkerOptions);
    }
}).addTo(map);