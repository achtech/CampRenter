
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

			<h3 class="margin-top-0 margin-bottom-30">Personal Details</h3>

			<div class="row">
				<div class="col-md-6">
					<label>First Name</label>
					<input type="text" value="{{$booking->client_name}}" name="client_name" disabled>
				</div>
				<div class="col-md-6">
					<label>Last Name</label>
					<input type="text" value="{{$booking->client_last_name}}" name="client_last_name"  disabled>
				</div>
				<div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label>E-Mail Address</label>
						<input type="text" value="{{$booking->email}}" name="email"  disabled>
						<i class="im im-icon-Mail"></i>
					</div>
				</div>
				<div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label>Phone</label>
						<input type="text" value="{{$booking->telephone}}" name="telephone"  disabled>
						<i class="im im-icon-Phone-2"></i>
					</div>
				</div>
			</div>


			<h3 class="margin-top-0 margin-bottom-30">Booking Details</h3>

			<div class="row">
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
					<input type="text" value="{{$booking->price}} CHF"  disabled>
				</div>
				<div class="col-md-6">
					<label>Booking status</label>
					<input type="text" value="{{$booking->booking_status_en}}"  disabled>
				</div>
			</div>
			<a href="/booking_client" class="button booking-confirmation-btn margin-top-40 margin-bottom-65">Return</a>
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
			<div class="boxed-widget opening-hours summary margin-top-0">
				<h3><i class="fa fa-calendar-check-o"></i> Booking Summary</h3>
				<ul>
					<li>Date <span>{{date('j F Y', strtotime($booking->created_date))}}</span></li>
					<li>Hour <span>{{$booking->created_hour}}</span></li>
					<li>N. nights <span>{{$booking->nbr_days}} days</span></li>
					<li class="total-costs">Total Cost <span>${{$booking->nbr_days*$booking->price}}</span></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- Container / End -->
@endsection
