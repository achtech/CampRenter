// Default infoBox Rating Type
var infoBox_ratingType = 'star-rating';

(function($) {
    "use strict";
    let marker;
    let map

    // Initialize and add the map
    function initMapPosition() {
        // The location of pos_default
        const pos_default = { lat: 46.8095941, lng: 7.1030541 };
        $("#currentLatitude").val(pos_default.lat);
        $("#currentLongitude").val(pos_default.lng);
        // The map, centered at Uluru
        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 14,
            center: pos_default,
            draggable: true
        });

        // START Create the search box and link it to the UI element.
        const input = document.getElementById("pac-input");
        const searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener("bounds_changed", () => {
            searchBox.setBounds(map.getBounds());
        });
        let markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener("places_changed", () => {
            const places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }
            // Clear out the old markers.
            markers.forEach((marker) => {
                marker.setMap(null);
            });
            markers = [];
            // For each place, get the icon, name and location.
            const bounds = new google.maps.LatLngBounds();
            places.forEach((place) => {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                const icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25),
                };
                // Create a marker for each place.
                markers.push(
                    new google.maps.Marker({
                        map,
                        icon,
                        title: place.name,
                        position: place.geometry.location,
                    })
                );

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
        // FIN Create the search box and link it to the UI element.

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                marker = new google.maps.Marker({
                    position: pos,
                    map: map,
                    title: 'Your position',
                    draggable: true,
                });
                map.setCenter(pos);
                $("#currentLatitude").val(pos.lat);
                $("#currentLongitude").val(pos.lng);
                getpostion(marker);
            }, function() {
                // The marker, positioned at Uluru
                marker = new google.maps.Marker({
                    position: pos_default,
                    map: map,
                    draggable: true,
                });
                getpostion(marker);
            });

        } else {
            // The marker, positioned at pos_default
            marker = new google.maps.Marker({
                position: pos_default,
                map: map,
                draggable: true,
            });
            getpostion(marker);
        }


    }

    function getpostion(marker) {
        google.maps.event.addListener(marker, 'dragend', function(marker) {
            var latLng = marker.latLng;
            const currentLatitude = latLng.lat();
            const currentLongitude = latLng.lng();
            $("#currentLatitude").val(currentLatitude);
            $("#currentLongitude").val(currentLongitude);
        });
    }

    initMapPosition();


})(this.jQuery);