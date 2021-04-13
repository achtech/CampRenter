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

<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/icons.css')}}">
<link rel="stylesheet" href="{{asset('css/main-color.css')}}" id="colors">
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    @yield('style')

    <style>
        #map {
            width: 100%;
            height: 450px;
            background: grey;
        }
    </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
				<li class="{{ $activePage == 'FC_camper' ? 'active' : '' }}"><a href="{{route('frontend.clients.camper')}}"><i class="fas fa-caravan"></i> {{trans('front.menu_panel_camper')}}</a></li>
				<li class="{{ $activePage == 'FC_bookmark' ? 'active' : '' }}"><a href="{{route('frontend.clients.bookmark')}}"><i class="fas fa-heart"></i> {{trans('front.favoris')}}</a></li>
				<li class="{{ $activePage == 'FC_message' ? 'active' : '' }}"><a href="{{route('frontend.clients.message')}}"><i class="fa fa-envelope"></i> {{trans('front.menu_panel_message')}} <span class="nav-tag messages">
            {{App\Http\Controllers\frontend\FC_messageController::notReadedMessageCount()}}
        </span></a></li>
				<li class="{{ $activePage == 'FC_notification' ? 'active' : '' }}"><a href="{{route('frontend.clients.notification')}}"><i class="fas fa-bell"></i> {{trans('front.menu_panel_notification')}} <span class="nav-tag messages">
            {{App\Http\Controllers\Controller::getNotificationCountByType('Booking')}}
        </span></a></li>
				<li class="{{ $activePage == 'FC_booking' ? 'active' : '' }}"><a href="{{route('frontend.clients.booking')}}"><i class="fa fa-folder-open"></i> {{trans('front.menu_panel_booking')}}</a></li>
				<li class="{{ $activePage == 'FC_wallet' ? 'active' : '' }}"><a href="{{route('frontend.clients.wallet')}}"><i class="fas fa-wallet"></i> {{trans('front.menu_panel_wallet')}}</a></li>
				<li class="{{ $activePage == 'FC_review' ? 'active' : '' }}"><a href="{{route('frontend.clients.review')}}"><i class="fas fa-smile"></i> {{trans('front.menu_panel_review')}}</a></li>
				<li class="{{ $activePage == 'rent_out' || $activePage == 'personnalData' ? 'active' : '' }}"><a href="{{route('rent_out')}}"><i class="fas fa-plus-circle"></i>{{trans('front.menu_panel_rentout')}}</a></li>
			</ul>
			<ul data-submenu-title="Account">
				<li class="{{ $activePage == 'FC_profile' ? 'active' : '' }}"><a href="{{route('clients.user.profile')}}"><i class="fas fa-user"></i> {{trans('front.menu_panel_profil')}}</a></li>
				<li><a href="{{ route('client.logout') }}"><i class="fas fa-power-off"></i> {{trans('front.menu_panel_logout')}}</a></li>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>

<!--
<script type="text/javascript" src="{{asset('js/infobox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/markerclusterer.js')}}"></script>
<script type="text/javascript" src="{{asset('js/maps-mypostion.js')}}"></script>-->


<!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/daterangepicker.js')}}"></script>
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
<!--<script>
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
</script>-->
@yield('script')

</body>
</html>
