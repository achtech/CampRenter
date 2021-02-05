
@extends('frontend.layout.layout',['activePage' => 'camper','footerPage' => 'true'])
@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Booking</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
					{{ Breadcrumbs::render('bookings_detail', $booking->id) }}
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->

<!-- Container -->
<div class="container">
	<div class="row">

		<!-- Content
		================================================== -->
		<div class="col-lg-8 col-md-8 padding-right-30">

			<div class="row">
			<input type="hidden" value="{{$booking->id}}" id="bookingId">
				<div class="col-md-6">
					<label>Start Date</label>
					<input type="text" value="{{date('j F Y', strtotime($booking->start_date))}}"  disabled>
				</div>
				<div class="col-md-6">
					<label>End date</label>
					<input type="text" value="{{date('j F Y', strtotime($booking->end_date))}}"  disabled>
				</div>
				<div class="col-md-6">
					<label>Price per day</label>
					<input type="text" value="{{App\Http\Controllers\frontend\FC_CamperController::getCamperPriceCurrentSaison($booking->id_campers)}} CHF"  disabled>
				</div>
				<div class="col-md-6">
					<label>Booking status</label>
					<input type="text" value="{{$booking->booking_status_en}}"  disabled>
				</div>
			</div>
			<a href="javascript:history.back()" class="button booking-confirmation-btn margin-top-40 margin-bottom-65">Return</a>
		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-0 margin-bottom-60">
			<!-- Booking Summary -->
			<div class="listing-item-container compact order-summary-widget">
				<div class="listing-item">
					<img src="{{asset('images')}}/camper/{{$booking->camper_image}}" alt="">

					<div class="listing-item-content">
						<div class="numerical-rating" data-rating="{{App\Http\Controllers\frontend\FC_reviewController::rateCamper($booking->id_campers)}}"></div>
						<h3>{{App\Http\Controllers\Controller::getCamperCategorie($booking->id_campers)->label_en}}</h3>
						<span>{{$booking->camper_name}}</span>
					</div>
				</div>
			</div>
			<div class="boxed-widget opening-hours summary margin-top-0">
				<h3><i class="fa fa-calendar-check-o"></i> Booking Summary</h3>
				<ul id="side_bar_prices">
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- Container / End -->

<script type="text/javascript">

	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var id_booking=$("#bookingId").val()
	$(function() {
		$.ajax({
			type: "get",
			url: '/bookingpaiment/'+id_booking,
			cache: false,
			dataType: 'html',
			data: {id:id_booking},

			success: function(res){
			r=res.trim();
			$("#side_bar_prices").show() ;
			$("#side_bar_prices").html(r);
				}
		});
	});
</script>
@endsection
