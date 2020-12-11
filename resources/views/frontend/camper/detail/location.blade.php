<h3 class="listing-desc-headline margin-top-60 margin-bottom-30">{{trans('front.location')}}</h3>


<div id="map_canvas" style="width: 100%; height: 400px;"></div>

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfCVL7v7EJXFy70y3vF9mb_AusJlhg0H4"
></script>
<script type="text/javascript">
	var map;
var latlng = new google.maps.LatLng('{{$camper->position_x}}','{{$camper->position_y}}');
function initialize() {
    var mapOptions = {
        center: latlng,
        zoom: 9,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var el=document.getElementById("map_canvas");
    map = new google.maps.Map(el, mapOptions);

    /**var marker = new google.maps.Marker({
        map: map,
        position: latlng
    });*/

    var sunCircle = {
        strokeColor: "#c3fc49",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "#c3fc49",
        fillOpacity: 0.35,
        map: map,
        center: latlng,
        radius: 15000 // in meters
    };
    cityCircle = new google.maps.Circle(sunCircle);
    cityCircle.bindTo('center', marker, 'position');
}

$ = jQuery.noConflict();
$(function( $ ) {
initialize();

});
</script>
