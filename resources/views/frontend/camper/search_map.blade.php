<!-- Map -->
<div id="map-container">
    <script type="text/javascript">
      var markers = <?php echo json_encode($campers); ?>

        console.log(markers);
        var markersoff = [
            {
                "title": 'Aksa Beach',
                "lat": '19.1759668',
                "lng": '72.79504659999998',
                "description": 'Aksa Beach is a popular beach and a vacation spot in Aksa village at Malad, Mumbai.'
            },
            {
                "title": 'Juhu Beach',
                "lat": '19.0883595',
                "lng": '72.82652380000002',
                "description": 'Juhu Beach is one of favourite tourist attractions situated in Mumbai.'
            },
            {
                "title": 'Girgaum Beach',
                "lat": '18.9542149',
                "lng": '72.81203529999993',
                "description": 'Girgaum Beach commonly known as just Chaupati is one of the most famous public beaches in Mumbai.'
            },
            {
                "title": 'Jijamata Udyan',
                "lat": '18.979006',
                "lng": '72.83388300000001',
                "description": 'Jijamata Udyan is situated near Byculla station is famous as Mumbai (Bombay) Zoo.'
            },
            {
                "title": 'Sanjay Gandhi National Park',
                "lat": '19.2147067',
                "lng": '72.91062020000004',
                "description": 'Sanjay Gandhi National Park is a large protected area in the northern part of Mumbai city.'
            }
        ];
        window.onload = function () {
            LoadMap();
        }
        function LoadMap() {
            var mapOptions = {
                center: new google.maps.LatLng('46.8095941', '7.1030541'),
                zoom: 20,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("map_search"), mapOptions);
            console.log(markers.length)

            for (var i = 0; i < markers.length; i++) {
                var data = markers[i]
                var myLatlng = new google.maps.LatLng(data.position_x, data.position_y);
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    zoom: 20,
                    title: data.camper_name
                });
                (function (marker, data) {
                    google.maps.event.addListener(marker, "click", function (e) {
                        infoWindow.setContent("<div style = 'width:200px;min-height:40px'>" + data.description_camper + "</div>");
                        infoWindow.open(map, marker);
                    });
                })(marker, data);
                latlngbounds.extend(marker.position);
            }
            var bounds = new google.maps.LatLngBounds();
            map.setCenter(latlngbounds.getCenter());
            map.fitBounds(latlngbounds);
        }
    </script>
    <div id="map_search" class="markers-on-the-map"></div>
</div>
