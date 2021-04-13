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
<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
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
	</script>-->


<!-- Style Switcher
================================================== -->
<script src="{{asset('js/switcher.js')}}"></script>

<!-- Style Switcher / End -->
<!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/daterangepicker.js')}}"></script>

<script>
function incDay(date,n) {
    var fudate = new Date(new Date(date).setDate(new Date(date).getDate()+n));
	var m = fudate.getMonth() + 1;
	var d = fudate.toDateString().substring(8, 10);
    fudate =  (m<10?'0'+m:m) + '/' + (d<10?'0'+d:d) +'/'+fudate.getFullYear();
    return fudate;
}
var getDaysArray = function(start, end) {
    for(var arr=[],i=0,dt=new Date(start),s=start; dt<=new Date(end); dt.setDate(dt.getDate()+1),i++ ){
		s=incDay(start,i);
        arr.push(s);
    }
    return arr;
};
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();
	var bookedCampers = <?php echo json_encode($booked_campers); ?>;
	var disabledArr = [];

	if(bookedCampers != undefined){
		for (var i = 0; i < bookedCampers.length; i++) {
            var bookedCamper = bookedCampers[i]
            var start_booked = bookedCamper.start_date;
			var end_booked =  bookedCamper.end_date;

			var startD = start_booked.split("-")[1]+"-"+start_booked.split("-")[0]+"-"+start_booked.split("-")[2];
			var endD = end_booked.split("-")[1]+"-"+end_booked.split("-")[0]+"-"+end_booked.split("-")[2];
			//amend in table
			disabledArr = disabledArr.concat(getDaysArray(startD,endD));
		}

	}

    function cb(start, end) {
        $('#booking-date-range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		$('#booking-date-range').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

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
    $('#booking-date-range').daterangepicker({
		isInvalidDate: function(arg){

        // Prepare the date comparision
        var thisMonth = arg._d.getMonth()+1;   // Months are 0 based
        if (thisMonth<10){
            thisMonth = "0"+thisMonth; // Leading 0
        }
        var thisDate = arg._d.getDate();
        if (thisDate<10){
            thisDate = "0"+thisDate; // Leading 0
        }
        var thisYear = arg._d.getYear()+1900;   // Years are 1900 based

        var thisCompare = thisMonth +"/"+ thisDate +"/"+ thisYear;

        if($.inArray(thisCompare,disabledArr)!=-1){
            return true; //arg._pf = {userInvalidated: true};
        }
    },
		"locale": locale,
    	"opens": "left",
	    "autoUpdateInput": false,
	    "alwaysShowCalendars": true

    }, cb);
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
