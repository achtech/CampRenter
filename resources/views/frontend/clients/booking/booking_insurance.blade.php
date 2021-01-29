
@extends('frontend.layout.layout',['activePage' => 'camper','footerPage' => 'true'])
@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>{{trans('front.booking')}}</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						{{ Breadcrumbs::render('bookings_process', $booking->id) }}
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
			<h3 class="margin-bottom-50">{{trans('front.Insurances')}}</h3>
			<div class="row">
				<div class="pricing-list-container">

						<!-- Insurance List -->
						<h4>{{trans('front.main_insurance')}}</h4>
						<ul>
							<li>
								@if($insurance->initial_price!=0)
									<p><span>Fixprämie </span>{{$insurance->initial_price}} CHF</p>
								@endif
								<p><span> Pro Nacht </span> {{$insurance->price_per_day}} CHF</p>
								<p><span>Total: </span>{{$insurance_total}} CHF </p>
								@if(!$camper->has_insurance)
									<div id="insurance">

											<a id="add_insurance" data-booking-id="{{$booking->id}}" class="button medium border">Add</a>
											<button id="remove_insurance" data-booking-id="{{$booking->id}}" class="button medium border">Remove</button>

									</div>
								@else
									<a class="button medium" style="pointer-events: none">Included</a>
								@endif
							</li>
						</ul>

						<!-- Extra List -->
						<h4>{{trans('front.extras_insurance')}}</h4>
						<ul>
						@foreach($extras as $extra)
							<li>
								<h5>{{$extra->name}}</h5>
								@foreach(App\Http\Controllers\Controller::getExtraData($extra->name,$booking->nbr_days) as $item)
									@if($item->initial_price!=0)
										<p><span>Fixprämie </span>{{$item->initial_price}} CHF</p>
									@endif
									<p><span> Pro Nacht </span> {{$item->price_per_day}} CHF</p>
								@endforeach
								<p><span>Total: </span>{{App\Http\Controllers\Controller::getExtraInsurance($extra->name,$booking->nbr_days)}} CHF </p>
								@if(!in_array($extra->name,$extraIds))
									<div class="extras">

									@if(App\Http\Controllers\Controller::isExtraByOwner($extra->name,$booking->id))
										<a id="remove_extra" data-booking-id="{{$booking->id}}" data-extra-name="{{$extra->name}}" class="button medium border">Remove</a>
									@else
										<a id="add_extra" data-booking-id="{{$booking->id}}" data-extra-name="{{$extra->name}}" class="button medium border">Add</a>
									@endif
									</div>
								@else
									<a href="" class="button medium" style="pointer-events: none">Included</a>
								@endif
							</li>
						@endforeach
						</ul>

					</div>
			</div>
		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-0 margin-bottom-60">
			<!-- Booking Summary -->
			<div class="listing-item-container compact order-summary-widget">
				<div class="listing-item">
					<img src="{{asset('images')}}/campers/{{$booking->camper_image}}" alt="">

					<div class="listing-item-content">
						<div class="numerical-rating" data-rating="{{App\Http\Controllers\frontend\FC_reviewController::rateCamper($booking->id_campers)}}"></div>
						<h3>{{App\Http\Controllers\Controller::getCamperCategorie($booking->id_campers)->label_en}}</h3>
						<span>{{$booking->camper_name}}</span>
					</div>
				</div>
			</div>
			<div class="boxed-widget opening-hours summary margin-top-0" id="invoice_insurance">
				<h3><i class="fa fa-calendar-check-o"></i> {{trans('front.booking_summary')}}</h3>
				<ul>
					<li>{{trans('front.date')}} <span>{{date('j F Y', strtotime($booking->created_date))}}</span></li>
					<li>{{trans('front.hour')}} <span>{{$booking->created_hour}}</span></li>
					<li>{{trans('front.n_nights')}} <span>{{$booking->nbr_days}} {{trans('front.days')}}</span></li>
					<li>Price <span>{{$total_without_insurance}} CHF</span></li>
					@if($booking->insurance_price != 0)
					<li>Insurance  <span>{{$booking->insurance_price}} CHF</span></li>
					@endif
					@php($totalExtra = 0)
					@foreach(App\Http\Controllers\frontend\FC_bookingController::getExtraBooking($booking->id) as $be)
						<li>{{$be->name}} <span>{{$be->price}} CHF</span></li>
						@php($totalExtra += $be->price)
					@endforeach
					<li class="total-costs">{{trans('front.total_cost')}} <span>{{$total_without_insurance+$booking->insurance_price+$totalExtra}} CHF</span></li>
				</ul>

			</div>
			<!-- Booking Summary / End -->

		</div>

	</div>
</div>
<!-- Container / End -->

<script type="text/javascript">


var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$("#add_insurance").click( function(e){
	//Set the value of the hidden input field
	var id_booking = $(this).data('booking-id');

	$.ajax({
			url: '/booking/add_insurance/'+id_booking,
			type: 'get',
			data: {_token: CSRF_TOKEN},
			success: function(response){
				$('#insurance').load(' #insurance');
				$('#invoice_insurance').load(' #invoice_insurance');
			}
		});
});


$("#remove_insurance").click( function(e){
	//Set the value of the hidden input field
	var id_booking = $(this).data('booking-id');

	$.ajax({
			url: '/booking/remove_insurance/'+id_booking,
			type: 'get',
			data: {_token: CSRF_TOKEN},
			success: function(response){
				$('#insurance').load(' #insurance');
				$('#invoice_insurance').load(' #invoice_insurance');
			}
		});
});


$("#add_extra").click( function(e){
	//Set the value of the hidden input field
	var id_booking = $(this).data('booking-id');
	var extra_name = $(this).data('extra-name');

	$.ajax({
		url: '/booking/add_extra/'+id_booking+'/'+extra_name,
		type: 'get',
		data: {_token: CSRF_TOKEN},
		success: function(response){
			//$('.extras').load(location.href+(' .extras'));
			document.getElementById('add_extra').style.display ='none';
			document.getElementById('remove_extra').style.display ='block';
			//$('#invoice_insurance').load(location.href+(' #invoice_insurance'));
			}
		});
});


$("#remove_extra").click( function(e){
	//Set the value of the hidden input field
	var id_booking = $(this).data('booking-id');
	var extra_name = $(this).data('extra-name');

	$.ajax({
		url: '/booking/remove_extra/'+id_booking+'/'+extra_name,
		type: 'get',
		data: {_token: CSRF_TOKEN},
		success: function(response){
			$('.extras').load(location.href+(' .extras'));
			//document.getElementById('remove_extra').style.display ='none';
			//document.getElementById('add_extra').style.display ='block';
			$('#invoice_insurance').load(location.href+(' #invoice_insurance'));
			}
		});
});
</script>
@endsection
