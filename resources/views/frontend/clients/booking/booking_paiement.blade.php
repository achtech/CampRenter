
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

			<h3 class="margin-top-0 margin-bottom-30">{{trans('front.booking')}}</h3>

			<div class="row">

				<div class="col-md-6">
					<label>{{trans('front.first_name')}}</label>
					<input type="text" value="{{$booking->client_name}}" name="client_name">
				</div>

				<div class="col-md-6">
					<label>{{trans('front.last_name')}}</label>
					<input type="text" value="{{$booking->client_last_name}}" name="client_last_name">
				</div>

				<div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label>{{trans('front.email_add')}}</label>
						<input type="text" value="{{$booking->email}}" name="email">
						<i class="im im-icon-Mail"></i>
					</div>
				</div>

				<div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label>{{trans('front.profil_phone')}}</label>
						<input type="text" value="{{$booking->telephone}}" name="telephone">
						<i class="im im-icon-Phone-2"></i>
					</div>
				</div>

			</div>


			<h3 class="margin-top-55 margin-bottom-30">{{trans('front.footer_paiement_methods')}}</h3>

			<!-- Payment Methods Accordion -->
			<div class="payment">

				<div class="payment-tab payment-tab-active">
					<div class="payment-tab-trigger">
						<input checked id="paypal" name="cardType" type="radio" value="paypal">
						<label for="paypal">PayPal</label>
						<img class="payment-logo paypal" src="{{asset('images/paiement-methods/ApBxkXU.png')}}" alt="">
					</div>

					<div class="payment-tab-content">
						<p>{{trans('front.redirected_to_paypal')}}</p>
					</div>
				</div>


				<div class="payment-tab">
					<div class="payment-tab-trigger">
						<input type="radio" name="cardType" id="creditCart" value="creditCard">
						<label for="creditCart">{{trans('front.credit_card')}}</label>
						<img class="payment-logo" src="{{asset('images/paiement-methods/IHEKLgm.png')}}" alt="">
					</div>

					<div class="payment-tab-content">
						<div class="row">
							<form role="form" action="{{ route('stripe.payment') }}" method="post" class="validation"
										data-cc-on-file="false"
										data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
										id="payment-form">
                        		@csrf
								<div class="col-md-6">
									<div class="card-label">
										<label for="nameOnCard">{{trans('front.name_on_card')}}</label>
										<input id="nameOnCard" name="nameOnCard" required type="text">
									</div>
								</div>

								<div class="col-md-6">
									<div class="card-label">
										<label for="card-num">{{trans('front.card_number')}}</label>
										<input id="card-num" name="cardNumber" placeholder="1234  5678  9876  5432" required type="text">
									</div>
								</div>

								<div class="col-md-4">
									<div class="card-label">
										<label for="card-expiry-month">{{trans('front.expiry_month')}}</label>
										<input id="card-expiry-month" placeholder="MM" required type="text">
									</div>
								</div>

								<div class="col-md-4">
									<div class="card-label">
										<label for="card-expiry-year">{{trans('front.expiry_year')}}</label>
										<input id="card-expiry-year" placeholder="YY" required type="text">
									</div>
								</div>

								<div class="col-md-4">
									<div class="card-label">
										<label for="card-cvc">CVC</label>
										<input id="card-cvc" required type="text">
									</div>
								</div>
								<button type="submit" class="button booking-confirmation-btn margin-top-40 margin-bottom-65">{{trans('front.confirm_and_pay')}}</button>
							</form>
						</div>
					</div>
				</div>

			</div>
			<!-- Payment Methods Accordion / End -->

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
				<h3><i class="fa fa-calendar-check-o"></i> {{trans('front.booking_summary')}}</h3>
				<ul>
					<li>{{trans('front.date')}} <span>{{date('j F Y', strtotime($booking->created_date))}}</span></li>
					<li>{{trans('front.hour')}} <span>{{$booking->created_hour}}</span></li>
					<li>{{trans('front.n_nights')}} <span>{{$booking->nbr_days}} days</span></li>
					<li class="total-costs">Total Cost <span>${{$booking->nbr_days*$booking->price}}</span></li>
				</ul>

			</div>
			<!-- Booking Summary / End -->

		</div>

	</div>
</div>
<!-- Container / End -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
$(function() {
    var $form         = $(".validation");
  $('form.validation').bind('submit', function(e) {
    var $form         = $(".validation"),
        inputVal = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputVal),
        $errorStatus = $form.find('div.error'),
        valid         = true;
        $errorStatus.addClass('hide');

        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorStatus.removeClass('hide');
        e.preventDefault();
      }
    });

    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('#card-num').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val()
      }, stripeHandleResponse);
    }

  });

  function stripeHandleResponse(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }

});
</script>
@endsection
