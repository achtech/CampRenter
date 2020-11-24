
@extends('frontend.layout.layout_panel',['activePage'=>'equipment'])

@section('content')
<!-- Content
================================================== -->

<div class="dashboard-content">
	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2><strong>{{trans('front.camper_name')}}</strong></h2>
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
{{ Breadcrumbs::render('rentOut') }}
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- sub_menu -->
		@include('frontend.camper.rent_out.sub_menu', ['active_page' => 'equipment'])

		<div class="col-lg-7 col-md-12">
		<h2 style="padding: 10px;"><strong>{{trans('front.equipment')}}</strong></h2>
			<div class="margin-top-0">
				<ul style="list-style-type:none; padding-left: 10px;">
					<li>
						<div class="row">
							<h3>1. {{trans('front.outside')}}</h3>
						</div>
						<div class="row opening-day">
							<div class="col-md-6">
								<h3>{{trans('front.camping_table')}}</h3>
								<div class="checkboxes in-row margin-bottom-18">
									<input id="is_camping_table_exist" name="is_camping_table_exist" type="checkbox" name="check">
									<label for="check-a">{{trans('front.camping_table')}}</label>
								</div>
							</div>
							<div class="col-md-6">
								<h3>{{trans('front.camping_chairs')}}</h3>
								<div class="checkboxes in-row margin-bottom-18">
									<input id="is_camping_chairs_exist" name ="is_camping_chairs_exist" type="checkbox" name="check">
									<label for="check-a">{{trans('front.camping_chairs')}}</label>
								</div>

							</div>
						</div>
					</li>
					<li>
						<div class="row opening-day">
							<div class="col-md-6">
							<h3>{{trans('front.transport')}}</h3>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Camping table</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Camping table</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Cargo carrier</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Trailer hitch</label>
								</div>
							</div>

							<div class="col-md-6">
								<h3>{{trans('front.water')}}</h3>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">{{trans('front.fresh_water_tan')}}</label>
								</div>
								<div class="checkboxes in-row ">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">{{trans('front.warm_water')}}</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">{{trans('front.waste_water_tank')}}</label>
								</div>
							</div>

						</div>
					</li>
					<li>
						<div class="row opening-day">
							<h3>{{trans('front.winter')}}</h3>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">{{trans('front.winter_ready')}}</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">{{trans('front.double_bottom')}}</label>
								</div>
								<div class="checkboxes in-row margin-bottom-18">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">{{trans('front.Heat_absorbing_glass')}}</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">{{trans('front.winter_tires')}}</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">{{trans('front.snow_chains')}}</label>
								</div>
								<div class="checkboxes in-row margin-bottom-18">
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
								<div class="checkboxes in-row margin-bottom-18">
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
								<div class="checkboxes in-row margin-bottom-18">
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
							<div class="col-md-6">
							<h3>Power</h3>
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
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Heavy current connection</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Extra battery</label>
								</div>
							</div>
							<div class="col-md-6">
								<h3>Dimming</h3>
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
						<div class="row opening-day">
							<div class="col-md-6">
								<h3>Electronics</h3>
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
							<div class="col-md-6">
								<h3>Cooking possibility</h3>
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

						</div>
					</li>
					<li>
						<div class="row opening-day">
							<div class="col-md-6">
								<h3>Cooling possibility</h3>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Fridge</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Freezer</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Cool box</label>
								</div>
							</div>
							<div class="col-md-6">
								<h3>Bathroom</h3>
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
								<a href="{{route('accessories')}}" class="button border">{{trans('front.apply')}}</a>
								<a href="{{route('personnalData')}}" class="button border">{{trans('front.cancel')}}</a>
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
