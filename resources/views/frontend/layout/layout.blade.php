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
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/main-color.css')}}" id="colors">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/b90fcd0862.js" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
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

<!-- Leaflet Maps Scripts -->
<script src="{{asset('js/leaflet-markercluster.min.js')}}"></script>
<script src="{{asset('js/leaflet-gesture-handling.min.js')}}"></script>
<script src="{{asset('js/leaflet-listeo.js')}}"></script>

<!-- Maps -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script type="text/javascript" src="{{asset('js/infobox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/markerclusterer.js')}}"></script>
<script type="text/javascript" src="{{asset('js/maps.js')}}"></script>

<!-- Leaflet Geocoder + Search Autocomplete // Docs: https://github.com/perliedman/leaflet-control-geocoder -->
<script src="{{asset('js/leaflet-autocomplete.js')}}"></script>
<script src="{{asset('js/leaflet-control-geocoder.js')}}"></script>

<!-- Google Autocomplete -->
<script>
	function initAutocomplete() {
    var input = document.getElementById('autocomplete-input');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        return;
      }
    });

	if ($('.main-search-input-item')[0]) {
	    setTimeout(function(){
	        $(".pac-container").prependTo("#autocomplete-container");
	    }, 300);
	}
}
</script>

<!-- Maps -->
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"></script>
<script>
	/*var modal = document.getElementById("myModal");
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
	}*/
	</script>
	<script>
	/*	var registerModel = document.getElementById("registerModel");
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
		}*/
	</script>
	<script>
	/*	var emailModel = document.getElementById("registerWithEmail");
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
		} */
	</script>
	<script>
	/*	var paswwordModel = document.getElementById("passwordModel");
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
		var log = document.getElementById("log");
		log.onclick= function() {
		  paswwordModel.style.display = "none";
		}*/
</script>
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
