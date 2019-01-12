

var tileLayer = new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

var rememberLat = document.getElementById('latitud').value;
var rememberLong = document.getElementById('longitud').value;
    if( !rememberLat || !rememberLong ) { rememberLat = 3.42294984623391; rememberLong = -76.53075945605052;}
        var map = new L.Map('map', {
        'center': [rememberLat, rememberLong],
        'zoom': 12,
        'layers': [tileLayer]
        });

    var marker = L.marker([rememberLat, rememberLong],{
    draggable: true
    }).addTo(map);

    marker.on('dragend', function (e) {
        updateLatLng(marker.getLatLng().lat, marker.getLatLng().lng);
    });
    map.on('click', function (e) {
        marker.setLatLng(e.latlng);
        updateLatLng(marker.getLatLng().lat, marker.getLatLng().lng);
    });

    function updateLatLng(lat,lng,reverse) {
        console.log(reverse);
        if(reverse) {
            marker.setLatLng([lat,lng]);
            map.panTo([lat,lng]);
            console.log("como estas");
        } else {
            document.getElementById('latitud').value = marker.getLatLng().lat;
            document.getElementById('longitud').value = marker.getLatLng().lng;
            map.panTo([lat,lng]);
            console.log("hola");

            /* Se envia coordenadas por ajax para guardar la informacion en session */
                $.ajaxSetup({
                    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
                });
                jQuery.ajax({
                    url: " map/post",
                    method: 'post',
                    data: {
                    'latitud':marker.getLatLng().lat,
                    'longitud': marker.getLatLng().lng,
                    },
                    success: function(result){
                        $("#resultado").html(result)
                    }});
            /* Fin del ajax*/
        }
    }




