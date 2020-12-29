<!-- Map -->
<div id="map-container">
    <script type="text/javascript">
let marefreshp;
let icontype;
let sqh=7 ;

      var markers = <?php echo json_encode($campers); ?>;
        window.onload = function () {
            LoadMap();
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
  types: ['geocode'],
  componentRestrictions: {country: 'CH'}
};

 var input = document.getElementById('searchTextField');

 var autocomplete = new google.maps.places.Autocomplete(input, options);
}
</script>



    <div id="map_search" class="markers-on-the-map"></div>
</div>
