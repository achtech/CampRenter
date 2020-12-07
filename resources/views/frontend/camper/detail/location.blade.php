<h3 class="listing-desc-headline margin-top-60 margin-bottom-30">{{trans('front.location')}}</h3>

<div id="singleListingMap-container">
    <div class="markers-on-the-map">
        <!-- Map -->
        <div id="map_canvas"></div>
    </div>
    <input style="display: none" type="text" name="position_x" id="currentLatitude">
    <input style="display: none" type="text" name="position_y" id="currentLongitude">
</div>
<script type="text/javascript">
	var mapD;
    function initialize() {
        var mapOptionsD = {
            center: new google.maps.LatLng('{{$camper->position_x}}', '{{$camper->position_y}}'),
            zoom: 9,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var el=document.getElementById("map_canvas");
        mapD = new google.maps.Map(el, mapOptionsD);
        var markerD
        // var marker = new google.maps.Marker({
        //     map: map,
        //     position: latlng
        // });

        var sunCircle = {
            strokeColor: "#c3fc49",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#c3fc49",
            fillOpacity: 0.35,
            map: mapD,
            center: new google.maps.LatLng('{{$camper->position_x}}', '{{$camper->position_y}}'),
            radius: 15000 // in meters
        };
        cityCircle = new google.maps.Circle(sunCircle);
        cityCircle.bindTo('center', markerD, 'position');
    }
    initialize();
</script>
