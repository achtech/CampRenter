
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
						<li><a href="#">Home</a></li>
						<li>Booking</li>
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
					<input type="text" value="{{$booking->client_name}}" name="client_name">
				</div>

				<div class="col-md-6">
					<label>Last Name</label>
					<input type="text" value="{{$booking->client_last_name}}" name="client_last_name">
				</div>

				<div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label>E-Mail Address</label>
						<input type="text" value="{{$booking->email}}" name="email">
						<i class="im im-icon-Mail"></i>
					</div>
				</div>

				<div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label>Phone</label>
						<input type="text" value="{{$booking->telephone}}" name="telephone">
						<i class="im im-icon-Phone-2"></i>
					</div>
				</div>

			</div>


			<h3 class="margin-top-55 margin-bottom-30">Payment Method</h3>

			<!-- Payment Methods Accordion -->
			<div class="payment">

				<div class="payment-tab payment-tab-active">
					<div class="payment-tab-trigger">
						<input checked id="paypal" name="cardType" type="radio" value="paypal">
						<label for="paypal">PayPal</label>
						<img class="payment-logo paypal" src="{{asset('images/paiement-methods/ApBxkXU.png')}}" alt="">
					</div>

					<div class="payment-tab-content">
						<p>You will be redirected to PayPal to complete payment.</p>
					</div>
				</div>


				<div class="payment-tab">
					<div class="payment-tab-trigger">
						<input type="radio" name="cardType" id="creditCart" value="creditCard">
						<label for="creditCart">Credit / Debit Card</label>
						<img class="payment-logo" src="{{asset('images/paiement-methods/IHEKLgm.png')}}" alt="">
					</div>

					<div class="payment-tab-content">
						<div class="row">

							<div class="col-md-6">
								<div class="card-label">
									<label for="nameOnCard">Name on Card</label>
									<input id="nameOnCard" name="nameOnCard" required type="text">
								</div>
							</div>

							<div class="col-md-6">
								<div class="card-label">
									<label for="cardNumber">Card Number</label>
									<input id="cardNumber" name="cardNumber" placeholder="1234  5678  9876  5432" required type="text">
								</div>
							</div>

							<div class="col-md-4">
								<div class="card-label">
									<label for="expirynDate">Expiry Month</label>
									<input id="expiryDate" placeholder="MM" required type="text">
								</div>
							</div>

							<div class="col-md-4">
								<div class="card-label">
									<label for="expiryDate">Expiry Year</label>
									<input id="expirynDate" placeholder="YY" required type="text">
								</div>
							</div>

							<div class="col-md-4">
								<div class="card-label">
									<label for="cvv">CVV</label>
									<input id="cvv" required type="text">
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>
			<!-- Payment Methods Accordion / End -->

			<a href="pages-booking-confirmation.html" class="button booking-confirmation-btn margin-top-40 margin-bottom-65">Confirm and Pay</a>
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
					<li>Date <span>{{$booking->created_date}}</span></li>
					<li>Hour <span>{{$booking->created_hour}}</span></li>
					<li>N. nights <span>{{$booking->nbr_days}} days</span></li>
					<li class="total-costs">Total Cost <span>${{$booking->nbr_days*$booking->price}}</span></li>
				</ul>

			</div>
			<!-- Booking Summary / End -->

		</div>

	</div>
</div>
<!-- Container / End -->
@endsection
