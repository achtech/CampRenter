<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>Campunit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{asset('frontend/asset/css/style.css')}}">
<link rel="stylesheet" href="{{asset('frontend/asset/css/main-color.css')}}" id="colors">
<link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
    <style>
        #map {
            width: 95%;
            height: 450px;
            background: grey;
        }
    </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#showSub").click(function(){
    $("#sub_cat").show("slow");
  });
  $("#category").click(function(){
    $("#sub_cat").hide("slow");
  });
});
</script>


</head>

<body>

<!-- Wrapper -->
<div id="wrapper">
<!-- Header Container
================================================== -->
@include('frontend.layout.header')

<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Dashboard -->
<div id="dashboard">

	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> {{trans('front.menu_panel_dashboard_navigator')}}</a>

	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">
			<ul data-submenu-title="Main">
				<li class="{{ $activePage == 'FC_camper' ? 'active' : '' }}"><a href="{{route('frontend.clients.camper')}}"><i class="sl sl-icon-settings"></i> {{trans('front.menu_panel_camper')}}</a></li>
				<li><a href=""><i class="sl sl-icon-star"></i> {{trans('front.favoris')}}</a></li>
				<li class="{{ $activePage == 'FC_message' ? 'active' : '' }}"><a href="{{route('frontend.clients.message')}}"><i class="sl sl-icon-envelope-open"></i> {{trans('front.menu_panel_message')}} <span class="nav-tag messages">2</span></a></li>
				<li class="{{ $activePage == 'FC_notification' ? 'active' : '' }}"><a href="{{route('frontend.clients.notification')}}"><i class="fa fa-calendar-check-o"></i> {{trans('front.menu_panel_notification')}}</a></li>
				<li class="{{ $activePage == 'FC_booking' ? 'active' : '' }}"><a href="{{route('frontend.clients.booking')}}"><i class="sl sl-icon-wallet"></i> {{trans('front.menu_panel_booking')}}</a></li>
				<li class="{{ $activePage == 'FC_wallet' ? 'active' : '' }}"><a href="{{route('frontend.clients.wallet')}}"><i class="sl sl-icon-wallet"></i> {{trans('front.menu_panel_wallet')}}</a></li>
				<li class="{{ $activePage == 'FC_review' ? 'active' : '' }}"><a href="{{route('frontend.clients.review')}}"><i class="sl sl-icon-wallet"></i> {{trans('front.menu_panel_review')}}</a></li>
				<li class="{{ $activePage == 'rent_out' || $activePage == 'personnalData' ? 'active' : '' }}"><a href="{{route('rent_out')}}"><i class="sl sl-icon-plus"></i>{{trans('front.menu_panel_rentout')}}</a></li>
			</ul>
			<ul data-submenu-title="Account">
				<li class="{{ $activePage == 'FC_profile' ? 'active' : '' }}"><a href="{{route('clients.user.profile')}}"><i class="sl sl-icon-user"></i> {{trans('front.menu_panel_profil')}}</a></li>
				<li><a href=""><i class="sl sl-icon-power"></i> {{trans('front.menu_panel_logout')}}</a></li>
			</ul>

		</div>
	</div>
	<!-- Navigation / End -->
	<!-- Main Navigation -->
		@yield('content')
</div>
<!-- Dashboard / End -->


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

<!-- Maps -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/infobox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/markerclusterer.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/maps.js')}}"></script>

<!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
<script src="{{asset('frontend/asset/scripts/moment.min.js')}}"></script>
<script src="{{asset('frontend/asset/scripts/daterangepicker.js')}}"></script>

<!-- DropZone | Documentation: http://dropzonejs.com -->
<script type="text/javascript" src="{{asset('frontend/asset/scripts/dropzone.js')}}"></script>

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
<script>
	let curOpen;

$(document).ready(function() {
  curOpen = $('.step')[0];

  $('.next-btn').on('click', function() {
    let cur = $(this).closest('.step');
    let next = $(cur).next();
    $(cur).addClass('minimized');
    setTimeout(function() {
      $(next).removeClass('minimized');
      curOpen = $(next);
    }, 400);
  });

  $('.close-btn').on('click', function() {
    let cur = $(this).closest('.step');
    $(cur).addClass('minimized');
    curOpen = null;
  });

  $('.step .step-content').on('click' ,function(e) {
    e.stopPropagation();
  });

  $('.step').on('click', function() {
    if (!$(this).hasClass("minimized")) {
      curOpen = null;
      $(this).addClass('minimized');
    }
    else {
      let next = $(this);
      if (curOpen === null) {
        curOpen = next;
        $(curOpen).removeClass('minimized');
      }
      else {
        $(curOpen).addClass('minimized');
        setTimeout(function() {
          $(next).removeClass('minimized');
          curOpen = $(next);
        }, 300);
      }
    }
  });
})
</script>
</body>
</html>
