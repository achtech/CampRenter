
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
									<a href="#" class="button medium border">Add</a>
								@else
									<a href="#" class="button medium">Included</a>
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
									<a href="#" class="button medium border">Add</a>
								@else
									<a href="#" class="button medium">Included</a>
								@endif
							</li>
						@endforeach
						</ul>

					</div>
			</div>
			<h3 class="margin-bottom-50">{{trans('front.footer_paiement_methods')}}</h3>
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
			<h3 class="margin-top-50 margin-bottom-30" >Or send Invoice</h3>
			<div class="row">
				<form action="{{route('frontend.clients.send.invoice')}}" method="POST">
					@csrf
					<input style="display:none;" type="text" value="{{$booking->id}}" name="id">
					<input style="display:none;" type="text" value="{{$booking->created_date}}-{{$booking->id}}" name="reservation_num">
					<div class="col-md-6">
						<label>{{trans('front.first_name')}}</label>
						<input type="text" value="{{$booking->client_name}}" name="client_name">
					</div>

					<div class="col-md-6">
						<label>{{trans('front.last_name')}}</label>
						<input type="text" value="{{$booking->client_last_name}}" name="client_last_name">
					</div>

					<div class="col-md-6">
						<label>{{trans('front.email_add')}}</label>
						<input type="text" value="{{$booking->email}}" name="email">
					</div>

					<div class="col-md-6">
						<label>{{trans('front.camper_name')}}</label>
						<input type="text" value="{{$booking->camper_name}}" name="camper_name">
					</div>
					<div class="col-md-6">
						<label>{{trans('front.date_start')}}</label>
						<input type="text" value="{{date('j F Y', strtotime($booking->start_date))}}" name="start_date">
					</div>
					<div class="col-md-6">
						<label>{{trans('front.date_end')}}</label>
						<input type="text" value="{{date('j F Y', strtotime($booking->end_date))}}" name="end_date">
					</div>

					<div class="col-md-6">
						<label>{{trans('front.total_cost')}}</label>
						<input type="text" value="{{$booking->nbr_days*$booking->price}}" name="total">
					</div>

					<div class="col-md-6">
						<label>Date</label>
						<input type="text" value="{{$booking->created_date}}" name="created_date">
					</div>
					<div class="col-md-12">
						<button type="submit" class="button booking-confirmation-btn margin-top-40 margin-bottom-65">Send Invoice</button>
					</div>
				</form>
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
			<div class="boxed-widget opening-hours summary margin-top-0">
				<h3><i class="fa fa-calendar-check-o"></i> {{trans('front.booking_summary')}}</h3>
				<ul>
					<li>{{trans('front.date')}} <span>{{date('j F Y', strtotime($booking->created_date))}}</span></li>
					<li>{{trans('front.hour')}} <span>{{$booking->created_hour}}</span></li>
					<li>{{trans('front.n_nights')}} <span>{{$booking->nbr_days}} {{trans('front.days')}}</span></li>
					<li>price <span>{{$total_without_insurance}} CHF</span></li>
					<li>Insurance  <span>{{$insurance_total}} CHF</span></li>
					@foreach($extraIds as $extra)
						<li>{{$extra}} <span>{{App\Http\Controllers\Controller::getExtraInsurance($extra,$booking->nbr_days)}} CHF</span></li>
					@endforeach
					<li class="total-costs">{{trans('front.total_cost')}} <span>{{$totalBooking}} CHF</span></li>
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
