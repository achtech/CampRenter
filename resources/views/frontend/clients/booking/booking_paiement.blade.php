
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
								<input type="hidden" value="{{$booking->id}}" id="bookingId">
								@if(!$camper->has_insurance)
									<div class="insurance">

										@if($booking->insurance_price == 0)
											<a id="add_insurance" onclick="AddInsurance()" data-booking-id="{{$booking->id}}" class="button medium border">Add</a>
											<div class="addsrc"></div>
										@else
											<a id="remove_insurance"  onclick="removeInsurance()" data-booking-id="{{$booking->id}}" class="button medium border">Remove</a>
											<div class="removesrc"></div>

										@endif

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
							@if(App\Http\Controllers\Controller::hasSubExtra($extra->name))
								@foreach(App\Http\Controllers\Controller::getSubExtra($extra->name) as $subExtra)
									<li>
										<h5>{{$extra->name}} : {{$subExtra->sub_extra}}</h5>
										@foreach(App\Http\Controllers\Controller::getSubExtraData($extra->name,$subExtra->sub_extra, $booking->nbr_days) as $element)
											@if($element->initial_price!=0)
												<p><span>Fixprämie </span>{{$element->initial_price}} CHF</p>
											@endif
											<p><span> Pro Nacht </span> {{$element->price_per_day}} CHF</p>
										@endforeach
										<p><span>Total: </span>{{App\Http\Controllers\Controller::getSubExtraInsurance($extra->name,$subExtra->sub_extra, $booking->nbr_days)}} CHF </p>
										@if(!App\Http\Controllers\Controller::isSubExtraBooking($extra->name, $booking->id))
											<div class="extras">

											@if(App\Http\Controllers\Controller::isSubExtraByOwner($extra->name, $subExtra->sub_extra, $booking->id))
												<a id="remove_sub_extra_{{$extra->name}}_{{$subExtra->sub_extra}}"  onclick="removeExtra('{{$extra->name}}','{{$subExtra->sub_extra}}')" class="button medium border">Remove</a>
												<div class="remove_sub_extra_{{$extra->name}}_{{$subExtra->sub_extra}}"></div>
											@else
												<a id="add_sub_extra_{{$extra->name}}_{{$subExtra->sub_extra}}" onclick="addSubExtra('{{$extra->name}}','{{$subExtra->sub_extra}}')" class="button medium border">Add</a>
												<div class="add_sub_extra_{{$extra->name}}_{{$subExtra->sub_extra}}"></div>
											@endif

											</div>
										@else
											@if(App\Http\Controllers\Controller::isSubExtraIncluded($extra->name, $subExtra->sub_extra, $booking->id_campers))
												<a href="" class="button medium" style="pointer-events: none">Included</a>
											@endif
										@endif
									</li>
								@endforeach
							@else
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
										<a id="remove_extra_{{$extra->name}}"  onclick="removeExtra('{{$extra->name}}')" class="button medium border">Remove</a>
										<div class="removeExtra{{$extra->name}}"></div>
									@else
										<a id="add_extra_{{$extra->name}}" onclick="addExtra('{{$extra->name}}')" class="button medium border">Add</a>
										<div class="addextra{{$extra->name}}"></div>
									@endif
									</div>
								@else
									<a href="" class="button medium" style="pointer-events: none">Included</a>
								@endif
							</li>
							@endif
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
			<!-- Payment Methods Accordion / End
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
			</div>-->

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
			<div class="boxed-widget opening-hours summary margin-top-0" id="invoice_insurance">
				<h3><i class="fa fa-calendar-check-o"></i> {{trans('front.booking_summary')}}</h3>
				<ul id="side_bar_prices">
				</ul>

			</div>
			<!-- Booking Summary / End -->

		</div>

	</div>
</div>
<!-- Container / End -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

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


function AddInsurance(){
	$.ajax({
			url: '/booking/add_insurance/'+id_booking,
			type: 'get',
			data: {_token: CSRF_TOKEN},
			success: function(response){
				$("#remove_insurance").show()
				$("#add_insurance").hide()
				//addsrc : bloc
				$(".addsrc").html('<a id="remove_insurance" onclick="removeInsurance()" class="button medium border">Remove</a>');
				r=response.trim();
				$("#side_bar_prices").show() ;
				$("#side_bar_prices").html(r);
			}
		});
}

function removeInsurance(){
	$.ajax({
			url: '/booking/remove_insurance/'+id_booking,
			type: 'get',
			data: {_token: CSRF_TOKEN},
			success: function(response){
				$("#add_insurance").show()
				$("#remove_insurance").hide()
				$(".removesrc").html('<a id="add_insurance" onclick="AddInsurance()" class="button medium border">Add</a>');
				r=response.trim();
				$("#side_bar_prices").show() ;
				$("#side_bar_prices").html(r);
			}
		});
}

function addExtra(extra_name){
	//Set the value of the hidden input field
	//var extra_name2=$("#extraName2").val()
	var id_booking=$("#bookingId").val();
	var url_extra = '/booking/add_extra/'+id_booking+'/'+extra_name;

	$.ajax({
		url: url_extra,
		type: 'get',
		data: {_token: CSRF_TOKEN},
		success: function(response){
			$("#remove_extra_"+extra_name).show()
			$("#add_extra_"+extra_name).hide()
			//addextra : bloc
			$(".addextra"+extra_name).html('<a id="remove_extra_'+extra_name+'" onclick="removeExtra(\''+extra_name+'\')" class="button medium border">Remove</a>');
			r=response.trim();
			$("#side_bar_prices").show() ;
			$("#side_bar_prices").html(r);
		}
	});
}

function addSubExtra(extra_name, sub_extra){
	//Set the value of the hidden input field
	//var extra_name2=$("#extraName2").val()
	var id_booking=$("#bookingId").val();
	var url_extra = '/booking/add_sub_extra/'+id_booking+'/'+extra_name+'/'+sub_extra ;


	$.ajax({
		url: url_extra,
		type: 'get',
		data: {_token: CSRF_TOKEN},
		success: function(response){
			location.reload();
		}
	});
}


function removeExtra(extra_name, sub_extra){
	//Set the value of the hidden input field
	//var extra_name1=$("#extraName1").val()
	var id_booking=$("#bookingId").val();
	var url_extra = '/booking/remove_extra/'+id_booking+'/'+extra_name;
	if(sub_extra!= undefined)
	{
		url_extra = '/booking/remove_sub_extra/'+id_booking+'/'+extra_name+'/'+sub_extra ;
	}
	$.ajax({
			url: url_extra,
			type: 'get',
			data: {_token: CSRF_TOKEN},
			success: function(response){
				if(sub_extra==undefined){
					$("#add_extra_"+extra_name).show()
					$("#remove_extra_"+extra_name).hide()
					//removeExtra : bloc
					$(".removeExtra"+extra_name).html('<a id="add_extra_'+extra_name+'" onclick="addExtra(\''+extra_name+'\')" class="button medium border">Add</a>');
					r=response.trim();
					$("#side_bar_prices").show() ;
					$("#side_bar_prices").html(r);
				}else{
					location.reload();
				}
			}
		});
}

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
