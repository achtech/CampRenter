
@extends('frontend.layout2',['activePage'=>'equipment'])

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
		<h2 style="padding: 10px;"><strong>Equipment</strong></h2>
			<div class="margin-top-0">
				<ul style="list-style-type:none; padding-left: 10px;">
					<li>
						<div class="row">
							<h3>1. Outside</h3>
						</div>
						<div class="row opening-day">
							<div class="col-md-6">
								<h3>Camping table</h3>
								<div class="checkboxes in-row margin-bottom-20">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Camping table</label>
								</div>
							</div>
							<div class="col-md-6">
								<h3>Camping chairs</h3>
								<div class="checkboxes in-row margin-bottom-20">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Camping chairs</label>
								</div>

							</div>
						</div>
					</li>
					<li>
						<div class="row opening-day">
							<h3>Transport</h3>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Camping table</label>
								</div>
								<div class="checkboxes in-row margin-bottom-20">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Camping table</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">test</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">test</label>
								</div>

							</div>
						</div>
					</li>
					<li>
						<div class="row opening-day">
							<h3>Water</h3>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Fresh water tank</label>
								</div>
								<div class="checkboxes in-row margin-bottom-20">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Warm water</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Waste water tank</label>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="row opening-day">
							<h3>Winter</h3>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Winter ready</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Double bottom</label>
								</div>
								<div class="checkboxes in-row margin-bottom-20">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Heat-absorbing glass</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Winter tires</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Snow chains</label>
								</div>
								<div class="checkboxes in-row margin-bottom-20">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Heatable water- and waste water tank</label>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="row opening-day">
							<h3>Further equipment for outside</h3>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Water canister</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Grill</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Levelling ramp</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Tent</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Fire extinguisher</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Mosquito net</label>
								</div>
								<div class="checkboxes in-row margin-bottom-20">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Hammock</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Gas bottle</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Gas cooker for outside</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Awning</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Camping light</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Cable reel</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Deck chair</label>
								</div>
								<div class="checkboxes in-row margin-bottom-20">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Carpet for tent</label>
								</div>
							</div>
						</div>
					</li>
					<li>
						<h3>Additional equipment for outside</h3>
						<div class="switcher-content">

							<div class="row">
								<div class="col-md-10">
									<a href="#" class="button add-pricing-submenu">Add additional equipment</a>
									<table id="pricing-list-container">
										<tr class="pricing-list-item pattern">
											<td>
												<input type="text"/>
												<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
											</td>
										</tr>
									</table>
								</div>
							</div>

						</div>
					</li>
					<li>
						<div class="row">
								<h3>1. Inside</h3>
						</div>
						<div class="row opening-day">
							<div class="col-md-6">
								<input type="text" placeholder="Number of single beds"/>
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Number of double beds"/>
							</div>
						</div>
					</li>
					<li>
						<div class="row opening-day">
							<div class="col-md-6">
								<h3>Air conditioner</h3>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Air conditioner</label>
								</div>
							</div>
							<div class="col-md-6">
								<h3>Heating</h3>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Heating</label>
								</div>

							</div>
						</div>
					</li>
					<li>
						<div class="row opening-day">
							<h3>Power</h3>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Power supply</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Power supply</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Cable reel</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Heavy current connection</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Extra battery</label>
								</div>

							</div>
						</div>
					</li>
					<li>
						<div class="row opening-day">
							<h3>Dimming</h3>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Tinted windows</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Curtains</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Cable reel</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Roller blinds</label>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="row opening-day">
							<div class="col-md-6">
								<h3>Indoor table</h3>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Indoor table</label>
								</div>
							</div>
							<div class="col-md-6">
								<h3>Rotatable seats</h3>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Rotatable seats</label>
								</div>

							</div>
						</div>
					</li>
					<li>
						<div class="row opening-day">
							<div class="col-md-6">
								<h3>Baby seat</h3>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Baby seat</label>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="row opening-day">
							<h3>Electronics</h3>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">GPS</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">USB</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">AUX</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">iPhone Connection</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">DVD Player</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Rdio</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">CD Player</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">MP3</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">TV</label>
								</div>

							</div>
						</div>
					</li>
					<li>
						<div class="row opening-day">
							<h3>Cooking possibility</h3>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">1-burner stove</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">2-burner stove</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Single electric cooker</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Triple electric cooker</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">3-burner stove</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">4-burner stove</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Double electric cooker</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Oven</label>
								</div>

							</div>
						</div>
					</li>
					<li>
						<div class="row opening-day">
							<h3>Cooling possibility</h3>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Fridge</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Freezer</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Cool box</label>
								</div>

							</div>
						</div>
					</li>
					<li>
						<div class="row opening-day">
							<div class="col-md-6">
								<h3>Sink</h3>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Sink</label>
								</div>
							</div>
							<div class="col-md-6">
								<h3>Dishes</h3>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Dishes</label>
								</div>

							</div>
						</div>
					</li>
					<li>
						<div class="row opening-day">
							<h3>Bathroom</h3>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Toilet</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Basin</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Mobile camping toilet</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Shower</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Outdoor shower</label>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="row opening-day">
							<div class="col-md-6">
								<h3>Further equipment for inside</h3>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Baby seat latch</label>
								</div>
							</div>
						</div>
					</li>
					<li>
						<h3>Additional equipment for intside</h3>
						<div class="switcher-content">

							<div class="row">
								<div class="col-md-12">
									<a href="#" class="button add-pricing-submenu">Add additional equipment</a>
									<table id="pricing-list-container">
										<tr class="pricing-list-item pattern">
											<td>
												<input type="text"/>
												<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-12">
								<div style="float: right;">
									<a href="{{route('camper_steps')}}" class="button">{{trans('front.apply')}} <i class="fa fa-check-circle"></i></a>
									<a href="{{route('rent_out')}}" class="button border">{{trans('front.cancel')}}</a>
								</div>
							</div>
						</div>
					</li>

				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
