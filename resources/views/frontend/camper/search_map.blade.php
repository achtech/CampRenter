<!-- Map -->
<div id="map-container">
    <script type="text/javascript">
        let marefreshp;
        let icontype;
        let sqh=7 ;

        var markers = <?php echo json_encode($campers); ?>;
        window.onload = function () {
            <?php if (count($campers) > 1) {?>
                LoadMap();
            <?php } elseif (count($campers) == 0) {?>
                    NoItemToShowMap();
                <?php } elseif (count($campers) == 1) {?>
                    LoadOneItemMap();
                <?php }?>
        }

        function NoItemToShowMap() {
            var map;
            var latlng = new google.maps.LatLng('47.679293','8.625207');
            var mapOptions = {
                center: latlng,
                zoom: 3,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var el=document.getElementById("map_search");
            map = new google.maps.Map(el, mapOptions);

            var marker = new google.maps.Marker({
                map: map,
                position: latlng,
                visible: false
            });

            var sunCircle = {
                    strokeColor: "#c3fc49",
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: "#c3fc49",
                    fillOpacity: 0.35,
                    map: map,
                    center: latlng,
                    radius: 400 // in meters
                };
                cityCircle = new google.maps.Circle(sunCircle);
                cityCircle.bindTo('center', marker, 'position');

        }

        function LoadOneItemMap() {
            var map;
            for (var i = 0; i < markers.length; i++) {
                var data = markers[i]
                var latlng = new google.maps.LatLng(data.position_x, data.position_y);
                var mapOptions = {
                    center: latlng,
                    zoom: 15,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var el=document.getElementById("map_search");
                map = new google.maps.Map(el, mapOptions);

                var marker = new google.maps.Marker({
                    map: map,
                    position: latlng,
                    visible: false
                });

                var sunCircle = {
                    strokeColor: "#c3fc49",
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: "#c3fc49",
                    fillOpacity: 0.35,
                    map: map,
                    center: latlng,
                    radius: 400 // in meters
                };
                cityCircle = new google.maps.Circle(sunCircle);
                cityCircle.bindTo('center', marker, 'position');
            }

        }
        function LoadMap() {
            var mapOptions = {
                center: new google.maps.LatLng('47.679293','8.625207'),
                zoom: 7,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("map_search"), mapOptions);
            marefreshp=map ;
            var iconLocation =  '{{asset('images/camper_icon.png')}}'

            var idData  ;
            icontype=""

            if (sqh==7){

                icontype="camper_icon.png"

            }else if(sqh == 0){

                icontype="camper_icon2.png"


            }else{
                icontype="camper_icon.png"

            }
            for (var i = 0; i < markers.length; i++) {
                var data = markers[i]
                var myLatlng = new google.maps.LatLng(data.position_x, data.position_y);
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: data.camper_name,
                    icon: '{{asset('images')}}'+"/"+icontype
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



<script type="text/javascript">

 google.maps.event.addDomListener(window, 'load', initialize1212);


function initialize1212() {

var cityBounds = new google.maps.LatLngBounds(
  new google.maps.LatLng(47.679293,8.625207),
  new google.maps.LatLng(47.679293, 8.625207));

var options = {
  bounds: cityBounds,
  types: ['geocode']
};

 var input = document.getElementById('searchTextField');

 var autocomplete = new google.maps.places.Autocomplete(input, options);
}
</script>



    <div id="map_search" class="markers-on-the-map"></div>
</div>
