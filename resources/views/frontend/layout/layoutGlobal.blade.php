<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">

<title>Campunit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{asset('frontend/asset/css/style.css')}}">
<link rel="stylesheet" href="{{asset('frontend/asset/css/main-color.css')}}" id="colors">
<link rel="stylesheet" href="{{asset('frontend/asset/css/font-awesome.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="transparent-header">

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
@yield('header')
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Banner
================================================== -->
@yield('banner')
@yield('content')
<!-- Footer
================================================== -->
@yield('footer')
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{asset('frontend/asset/scripts/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/jquery-migrate-3.1.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/mmenu.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/chosen.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/rangeslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/tooltips.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/custom.js')}}"></script>


<!-- Leaflet // Docs: https://leafletjs.com/ -->
<script src="{{asset('frontend/asset/scripts/leaflet.min.js')}}"></script>

<!-- Leaflet Maps Scripts -->
<script src="{{asset('frontend/asset/scripts/leaflet-markercluster.min.js')}}"></script>
<script src="{{asset('frontend/asset/scripts/leaflet-gesture-handling.min.js')}}"></script>
<script src="{{asset('frontend/asset/scripts/leaflet-listeo.js')}}"></script>

<!-- Maps -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/infobox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/markerclusterer.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/maps.js')}}"></script>

<!-- Leaflet Geocoder + Search Autocomplete // Docs: https://github.com/perliedman/leaflet-control-geocoder -->
<script src="{{asset('frontend/asset/scripts/leaflet-autocomplete.js')}}"></script>
<script src="{{asset('frontend/asset/scripts/leaflet-control-geocoder.js')}}"></script>

<script>
	var modal = document.getElementById("myModal");
	var btn = document.getElementById("myBtn");
	var span = document.getElementsByClassName("close")[0];
	btn.onclick = function() {
	  modal.style.display = "block";
	}
	span.onclick = function() {
	  modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	  if (event.target == modal) {
		modal.style.display = "none";
	  }
	}
	</script>
	<script>
		var registerModel = document.getElementById("registerModel");
		var registerBtn = document.getElementById("register");
		var registerAfterForgotPassword = document.getElementById("registerAfterForgotPassword");
		registerAfterForgotPassword.onclick = function() {
		  registerModel.style.display = "block";
		}
		var spanClose = document.getElementsByClassName("close-second-model")[0];
		registerBtn.onclick = function() {
		  registerModel.style.display = "block";
		}
		spanClose.onclick = function() {
		  registerModel.style.display = "none";
		}
		window.onclick = function(event) {
		  if (event.target == registerModel) {
			registerModel.style.display = "none";
		  }
		}
	</script>
	<script>
		var emailModel = document.getElementById("registerWithEmail");
		var emailBtn = document.getElementById("registrationEmail");
		var span = document.getElementsByClassName("close-third-model")[0];
		var back=document.getElementsByClassName("go-back")[0];
		emailBtn.onclick = function() {
		  emailModel.style.display = "block";
		}
		span.onclick = function() {
		  emailModel.style.display = "none";
		}
		back.onclick = function() {
		  emailModel.style.display = "none";
		}
		window.onclick = function(event) {
		  if (event.target == emailModel) {
			emailModel.style.display = "none";
		  }
		}
	</script>
	<script>
		var paswwordModel = document.getElementById("passwordModel");
		var passwordBtn = document.getElementById("forget-password");
		var span = document.getElementsByClassName("close-forget-password-model")[0];
		var closePopup = document.getElementById("log_in");
		passwordBtn.onclick = function() {
		  paswwordModel.style.display = "block";
		}
		closePopup.onclick= function() {
		  paswwordModel.style.display = "none";
		}
		span.onclick = function() {
		  paswwordModel.style.display = "none";
		}
		window.onclick = function(event) {
		  if (event.target == paswwordModel) {
			paswwordModel.style.display = "none";
		  }
		}
	</script>
	<script>
		$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
	});
	function showDiv() {
		if(document.getElementById('client_name').value == "ouma"){
			document.getElementById('signUpRequirments').style.display = "block";
		}

	}
	</script>
		<!-- Typed Script -->
	<script type="text/javascript" src="{{asset('frontend/asset/scripts/typed.js')}}"></script>
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
<script src="{{asset('frontend/asset/scripts/switcher.js')}}"></script>

<div id="style-switcher">
	<h2>Color Switcher <a href="#"><i class="sl sl-icon-settings"></i></a></h2>

	<div>
		<ul class="colors" id="color1">
			<li><a href="#" class="main" title="Main"></a></li>
			<li><a href="#" class="blue" title="Blue"></a></li>
			<li><a href="#" class="green" title="Green"></a></li>
			<li><a href="#" class="orange" title="Orange"></a></li>
			<li><a href="#" class="navy" title="Navy"></a></li>
			<li><a href="#" class="yellow" title="Yellow"></a></li>
			<li><a href="#" class="peach" title="Peach"></a></li>
			<li><a href="#" class="beige" title="Beige"></a></li>
			<li><a href="#" class="purple" title="Purple"></a></li>
			<li><a href="#" class="celadon" title="Celadon"></a></li>
			<li><a href="#" class="red" title="Red"></a></li>
			<li><a href="#" class="brown" title="Brown"></a></li>
			<li><a href="#" class="cherry" title="Cherry"></a></li>
			<li><a href="#" class="cyan" title="Cyan"></a></li>
			<li><a href="#" class="gray" title="Gray"></a></li>
			<li><a href="#" class="olive" title="Olive"></a></li>
		</ul>
	</div>

</div>
<!-- Style Switcher / End -->
<!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
<script src="{{asset('frontend/asset/scripts/moment.min.js')}}"></script>
<script src="{{asset('frontend/asset/scripts/daterangepicker.js')}}"></script>

<script>
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#booking-date-range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    cb(start, end);
    $('#booking-date-range').daterangepicker({
    	"opens": "left",
	    "autoUpdateInput": false,
	    "alwaysShowCalendars": true,
        startDate: start,
        endDate: end,
    }, cb);

    cb(start, end);

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
