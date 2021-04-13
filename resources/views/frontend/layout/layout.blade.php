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
<!--<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"> -->
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/icons.css')}}">
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
<!--<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="6812b27b-30cd-42e2-8ae4-64ff247819cb" data-blockingmode="auto" type="text/javascript"></script>-->
<!-- Facebook Pixel Code -->
<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script', 'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '2818080024915225');
	fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=2818080024915225&ev=PageView&noscript=1"/></noscript>
<!-- End Facebook Pixel Code -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-191495896-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-191495896-1');
</script>

<!-- Global site tag (gtag.js) - Google Ads: 387696381 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-387696381"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'AW-387696381');
</script>

@if (Session::has('successregistration'))
	<!-- Event snippet for Registrierung conversion page -->
	<script>
	gtag('event', 'conversion', {'send_to': 'AW-387696381/WbMcCMfcsYACEP2N77gB'});
	</script>
@endif

</head>

<body>

<!-- Maps -->
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjaNhwjWA-cyChAjLnGiIe44NbHMZ_s7c&libraries=places"
></script>

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


<script type="text/javascript" src="{{asset('js/infobox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/markerclusterer.js')}}"></script>

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
	<!--<script type="text/javascript" src="{{asset('js/typed.js')}}"></script>
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
	</script> -->


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
		$('#booking-date-range1').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

	}
    var lang = <?php echo json_encode(app()->getLocale()); ?>;
	var locale
	if(lang == 'en'){
		locale = {
			"format": "MM/DD/YYYY",
			"separator": " - ",
			"applyLabel": "Apply",
			"cancelLabel": "Cancel",
			"fromLabel": "From",
			"toLabel": "To",
			"customRangeLabel": "Custom",
			"daysOfWeek": [
				"Su",
				"Mo",
				"Tu",
				"We",
				"Th",
				"Fr",
				"Sa"
			],
			"monthNames": [
				"January",
				"February",
				"March",
				"April",
				"May",
				"June",
				"July",
				"August",
				"September",
				"October",
				"November",
				"December"
			],
			"firstDay": 1
    	}
	}else if(lang == 'fr'){
		locale = {
			"format": "MM/DD/YYYY",
			"separator": " - ",
			"applyLabel": "Appliquer",
			"cancelLabel": "Annuler",
			"fromLabel": "De",
			"toLabel": "A",
			"customRangeLabel": "Custom",
			"daysOfWeek": [
				"Dim",
				"Lun",
				"Mar",
				"Mer",
				"Jeu",
				"Ven",
				"Sam"
			],
			"monthNames": [
				"Janvier",
				"Février",
				"Mars",
				"Avrile",
				"Mai",
				"Juin",
				"Juillet",
				"Août",
				"Septembre",
				"Octobre",
				"Novembre",
				"Décembre"
			],
			"firstDay": 1
    	}
	}else {
		locale = {
			"format": "MM/DD/YYYY",
			"separator": " - ",
			"applyLabel": "Anwenden",
			"cancelLabel": "Stornieren",
			"fromLabel": "From",
			"toLabel": "To",
			"customRangeLabel": "Custom",
			"daysOfWeek": [
				"So",
				"Mo",
				"Di",
				"Mi",
				"Do",
				"Fr",
				"Sa"
			],
			"monthNames": [
				"Januar",
				"Februar",
				"März",
				"April",
				"Mai",
				"Juni",
				"Juli",
				"August",
				"September",
				"Oktober",
				"November",
				"Dezember"
			],
			"firstDay": 1
    	}
	};
    //cb(start, end);
    $('#booking-date-range1').daterangepicker({
		"locale": locale,
    	"opens": "left",
	    "autoUpdateInput": false,
		"alwaysShowCalendars": true
	}, cb);



    //cb(start, end);

});

// Calendar animation and visual settings
$('#booking-date-range1').on('show.daterangepicker', function(ev, picker) {
	$('.daterangepicker').addClass('calendar-visible calendar-animated bordered-style');
	$('.daterangepicker').removeClass('calendar-hidden');

});
$('#booking-date-range1').on('hide.daterangepicker', function(ev, picker) {
	$('.daterangepicker').removeClass('calendar-visible');
	$('.daterangepicker').addClass('calendar-hidden');

});
</script>
</body>
</html>
