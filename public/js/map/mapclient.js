
var latitud = document.getElementsByName("latitud[]");
var longitud = document.getElementsByName("longitud[]");

 var data = [];

for (var i = 0; i <latitud.length; i++) {
    var lat=latitud[i];
    var long=longitud[i];

    data.push({ id:i, cord:[] });
    data[data.length-1].cord.push( {id: i, lat: lat.value, long:long.value });

}


        var map = L.map('map').setView([3.4280904863872483, -76.53076171875001], 8);
        mapLink =
            '<a href="http://openstreetmap.org">OpenStreetMap</a>';
        L.tileLayer(
            'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; ' + mapLink + ' Contributors',
            maxZoom: 18,
            }).addTo(map);

            for (var i = 0; i <data.length; i++) {

                for (let variable of data[i].cord) {
                    marker = new L.marker([variable['lat'],variable['long']])
                    .bindPopup(variable['id'])
                    .addTo(map);
                }
            }
