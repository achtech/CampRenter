
@extends('frontend.layout2',['activePage'=>'accessories'])

@section('content')
<!-- Content
================================================== -->

<div class="dashboard-content">
	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2><strong>Camper name</strong></h2>
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Add Listing</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- Listings -->
		<div class="col-lg-5 col-md-12" style="margin-bottom:20px;">

			<div class="dashboard-list-box margin-top-0">
				<ul>
					<li>
						<img class="headline right" src="{{ asset('images/rent-out-camper/camper_rent.png') }}"/>
					</li>
					<li>
					<div class="row">
							<h6>Campervan</h6>
							<h3><strong>Camp Name</strong></h3>
						</div>
						<div class="row">
							<h6>{{trans('front.state')}}:</h6>
							<p>Camp Name</p>
						</div>
					</li>
					<li>
						<div class="row">
							<h5 style="margin-top: 0px; color:#39b7cd;">{{trans('front.complete_details')}}</h5>
							<div>
								<h3 style="margin-top: 20px;"><strong>{{trans('front.the_vehicle')}}</strong></h3>
								<div class="payment-tab-trigger">
									<input name="cardType" type="radio" value="">
									<label style="padding: 0px;" for="vehicle">{{trans('front.vehicle_data')}}</label>

									<input name="cardType" type="radio" value="">
									<label style="padding: 0px;" for="vehicle">{{trans('front.equipment')}}</label>

									<input name="cardType" type="radio" value="">
									<label style="padding: 0px;" for="vehicle">{{trans('front.extras')}}</label>

									<input name="cardType" type="radio" value="">
									<label style="padding: 0px;" for="vehicle">{{trans('front.description')}}</label>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-10" style="margin-top: 0px;">
								<h3><strong>{{trans('front.photos')}}</strong></h3>
							</div>
							<div class="col-md-2" style="margin-top: 0px;">
								<a href="{{route('slide_camper')}}"><h3><i class="sl sl-icon-plus"></i></h3></a>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<h3 style="margin-top: 0px;"><strong>{{trans('front.menu_panel_rentout')}}</strong></h3>
							<div class="payment-tab-trigger">
								<input name="cardType" type="radio" value="">
								<label style="padding: 0px;" for="vehicle">{{trans('front.insurance')}}</label>

								<input name="cardType" type="radio" value="">
								<label style="padding: 0px;" for="vehicle">{{trans('front.rental_terms')}}</label>

								<input name="cardType" type="radio" value="">
								<label style="padding: 0px;" for="vehicle">{{trans('front.terms')}}</label>

								<input name="cardType" type="radio" value="">
								<label style="padding: 0px;" for="vehicle">{{trans('front.Calendar')}}</label>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>

		<div class="col-lg-7 col-md-12">
			<h3><strong>Accessories</strong></h3>
			<div class="row">
				<p>Here you can add bookable extras. If you want to offer interior cleaning, activate the field by checking the box in front of the field. CHF 150 is a recommended price and can be adjusted individually. Please don't add any extra service fees or handover fees but include them in your rental price.</p>
				<div class="col-md-12">
					<table id="pricing-list-container">
						<tr class="pricing-list-item pattern">
							<td>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
								</div>
								<div class="fm-input pricing-name"><input type="text" placeholder="Paid accessories" /></div>
								<div class="fm-input pricing-ingredients"><input type="text" placeholder="Booking per" /></div>
								<div class="fm-input pricing-price"><input type="text" placeholder="Price" data-unit="CHF" /></div>
								<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
							</td>
						</tr>
					</table>
					<a href="#" class="button add-pricing-list-item">Add Item</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
				<div style="float: right;">
					<a href="" class="button">{{trans('front.apply')}} <i class="fa fa-check-circle"></i></a>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection
