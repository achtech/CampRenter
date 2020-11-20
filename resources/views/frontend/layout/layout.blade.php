<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->

<title>Campunite</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">

<!-- CSS
================================================== -->
<script src="https://kit.fontawesome.com/b90fcd0862.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/main-color.css')}}" id="colors">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
	#map_search {
		width: 100%;
		height: 100%;
	}
</style>
</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
@include('frontend.layout.header')
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Banner
================================================== -->
@yield('banner')
@yield('content')
<!-- Footer
================================================== -->
@if(isset($footerPage) && !empty($footerPage) && $footerPage && $footerPage== 'true')
@include('frontend.layout.footer')
@endif
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-migrate-3.1.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/mmenu.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/chosen.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/rangeslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/tooltips.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>


<!-- Leaflet // Docs: https://leafletjs.com/ -->
<script src="{{asset('js/leaflet.min.js')}}"></script>

<!-- Maps -->
{{--<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>--}}
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfCVL7v7EJXFy70y3vF9mb_AusJlhg0H4&callback=initAutocomplete&libraries=places&v=weekly"
></script>
<script type="text/javascript" src="{{asset('js/infobox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/markerclusterer.js')}}"></script>
<script type="text/javascript" src="{{asset('js/maps-search.js')}}"></script>

<!-- Leaflet Geocoder + Search Autocomplete // Docs: https://github.com/perliedman/leaflet-control-geocoder -->
<script src="{{asset('js/leaflet-autocomplete.js')}}"></script>
<script src="{{asset('js/leaflet-control-geocoder.js')}}"></script>

<!-- Google Autocomplete -->

<!-- Maps -->
<script>
	$.ajaxSetup({
  		headers: {
    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
	});

	function showDiv() {
		if(document.getElementById('client_name').value != ""){
			document.getElementById('signUpRequirments').style.display = "block";
		}
	}
	</script>
		<!-- Typed Script -->
	<script type="text/javascript" src="{{asset('js/typed.js')}}"></script>
	<script>
	var typed = new Typed('.typed-words', {
	strings: [""," "," "],
		typeSpeed: 80,
		backSpeed: 80,
		backDelay: 4000,
		startDelay: 1000,
		loop: true,
		showCursor: true
	});
	</script>


<!-- Style Switcher
================================================== -->
<script src="{{asset('js/switcher.js')}}"></script>

<!-- Style Switcher / End -->
<!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/daterangepicker.js')}}"></script>

<script>
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#booking-date-range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		$('#booking-date-range').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

	}
    //cb(start, end);
    $('#booking-date-range').daterangepicker({
    	"opens": "left",
	    "autoUpdateInput": false,
	    "alwaysShowCalendars": true,
//        startDate: start,
  //      endDate: end,
    }, cb);

    //cb(start, end);

});

// Calendar animation and visual settings
$('#booking-date-range').on('show.daterangepicker', function(ev, picker) {
	$('.daterangepicker').addClass('calendar-visible calendar-animated bordered-style');
	$('.daterangepicker').removeClass('calendar-hidden');
});
$('#booking-date-range').on('hide.daterangepicker', function(ev, picker) {
	$('.daterangepicker').removeClass('calendar-visible');
	$('.daterangepicker').addClass('calendar-hidden');
});
</script>

</body>
</html>
