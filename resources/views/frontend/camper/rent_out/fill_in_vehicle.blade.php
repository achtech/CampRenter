
@extends('frontend.layout.layout_panel',['activePage'=>'fill_in_vehicle','footerPage' => 'true'])

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
		@include('frontend.camper.rent_out.sub_menu', ['active_page' => 'fill_in_vehicle'])

		<div class="col-lg-7 col-md-12">
			<div class="row">
				<h6>{{trans('front.vehicle_data')}}</h6>
				<h3><strong>{{trans('front.vehicle_data')}}</strong></h3>
			</div>
			<div class="margin-top-0">
				<ul style="list-style-type:none; padding-left: 0px;">
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<input type="text" name="camper_name" placeholder="{{trans('front.name_vehicle')}}">
							</div>

							<!-- Website -->
							<div class="col-md-6">
								<input type="text" name="brand" placeholder="{{trans('front.camper_brand')}}">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<input type="text" name="model" placeholder="{{trans('front.model')}}">
							</div>

							<!-- Website -->
							<div class="col-md-6">
								<input type="text" name="id_licence_categories" placeholder="{{trans('front.licence_category')}}">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<Label> {{trans('front.converted_vehicle')}} </label>
							</div>

							<!-- Website -->
							<div class="col-md-6">
								<input type="text" name="license_plate_number" placeholder="{{trans('front.licence_number')}}">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<input type="text" name="vehicle_licence" placeholder="{{trans('front.vehicle_registration')}}">
							</div>

							<!-- Website -->
							<div class="col-md-6">
								<input type="text" name="country" placeholder="{{trans('front.country_registration')}}">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<input type="text" name="seat_number" placeholder="{{trans('front.number_seats')}}">
							</div>

							<!-- Website -->
							<div class="col-md-6">
								<input type="text" name="gear_number" placeholder="{{trans('front.number_gears')}}">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<div class="col-md-12">
									<strong>{{trans('front.Gearbox')}}</strong>
								</div>
								<div class="col-md-6">
									<label class="containerRadio">{{trans('front.automatic')}}
										<input type="radio" checked="checked" name="radio">
										<span class="checkmarkRadio"></span>
									</label>
									<label class="containerRadio">{{trans('front.manual')}}
										<input type="radio" checked="checked" name="radio">
										<span class="checkmarkRadio"></span>
									</label>
								</div>
								<div class="col-md-6">
									<label class="containerRadio">{{trans('front.semi_automatic')}}
										<input type="radio" checked="checked" name="radio">
										<span class="checkmarkRadio"></span>
									</label>
								</div>

								<div class="col-md-12">
									<strong>{{trans('front.Fuel')}}</strong>
								</div>
								<div class="col-md-6">
									<label class="containerRadio">Diesel
										<input type="radio" checked="checked" name="radio">
										<span class="checkmarkRadio"></span>
									</label>
									<label class="containerRadio">Gas
										<input type="radio" checked="checked" name="radio">
										<span class="checkmarkRadio"></span>
									</label>
								</div>
								<div class="col-md-6">
									<label class="containerRadio">Petrol
										<input type="radio" checked="checked" name="radio">
										<span class="checkmarkRadio"></span>
									</label>
									<label class="containerRadio">Petroleum gas
										<input type="radio" checked="checked" name="radio">
										<span class="checkmarkRadio"></span>
									</label>
								</div>
								<div class="col-md-12">
									<strong>{{trans('front.leasing_vehicle')}}</strong>
									<div class="row" style="margin-top: 3%;">
										<div class="col-md-6" style="padding-left: 0px;">
											<div class="payment-tab-trigger">
												<input name="cardType" type="radio" value="">
												<label style="padding: 0px;" for="vehicle">{{trans('front.yes')}}</label>
											</div>
										</div>
										<div class="col-md-6" style="padding-left: 0px;">
											<div class="payment-tab-trigger">
												<input name="cardType" type="radio" value="">
												<label style="padding: 0px;" for="vehicle">{{trans('front.no')}}</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Website -->
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<strong>{{trans('front.Mileage')}}</strong>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label class="containerRadio">0 - 50'000 km
											<input type="radio" checked="checked" name="radio">
											<span class="checkmarkRadio"></span>
										</label>
										<label class="containerRadio">50'000 - 100'000 km
											<input type="radio" checked="checked" name="radio">
											<span class="checkmarkRadio"></span>
										</label>
										<label class="containerRadio">100'000 - 150'000 km
											<input type="radio" checked="checked" name="radio">
											<span class="checkmarkRadio"></span>
										</label>
										<label class="containerRadio">150'000 - 200'000 km
											<input type="radio" checked="checked" name="radio">
											<span class="checkmarkRadio"></span>
										</label>
										<label class="containerRadio">200'000 - 250'000 km
											<input type="radio" checked="checked" name="radio">
											<span class="checkmarkRadio"></span>
										</label>
										<label class="containerRadio">250'000 - 300'000 km
											<input type="radio" checked="checked" name="radio">
											<span class="checkmarkRadio"></span>
										</label>
										<label class="containerRadio">{{trans('front.more_than')}} 300'000 km
											<input type="radio" checked="checked" name="radio">
											<span class="checkmarkRadio"></span>
										</label>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<input type="text" name="fuel_capacity" placeholder="{{trans('front.fuel_capacity')}}">
							</div>

							<!-- Website -->
							<div class="col-md-6">
								<input type="text" name="fuel_consumation" placeholder="{{trans('front.fuel_consumation')}}">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->

							<div class="col-md-6">
								<input type="text" name="allowed_total_weight" placeholder="{{trans('front.allowed_tons')}}">
							</div>
							<!-- Website -->
							<div class="col-md-6">
								<input type="text" name="length" placeholder="{{trans('front.length_in_metres')}}">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<input type="text" name="horse_power" placeholder="{{trans('front.horse_power')}}">
							</div>

							<!-- Website -->
							<div class="col-md-6">
								<input type="text" name="cylinder_capacity" placeholder="{{trans('front.cylinder_capacity')}}">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-12">
								<strong>{{trans('front.Additional attributes')}}</strong>
							</div>
							<div class="col-md-6">
								<div class="checkboxes in-row margin-bottom-20">

									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Aircon in the driver's cabin</label>

									<input id="check-b" type="checkbox" name="check">
									<label for="check-b">Rear view camera</label>

									<input id="check-c" type="checkbox" name="check">
									<label for="check-c">Power steering</label>

									<input id="check-d" type="checkbox" name="check">
									<label for="check-d">Four wheel drive</label>

								</div>
							</div>

							<!-- Website -->
							<div class="col-md-6">
								<div class="checkboxes in-row margin-bottom-20">

									<input id="check-f" type="checkbox" name="check">
									<label for="check-f">Auxiliary heating</label>

									<input id="check-g" type="checkbox" name="check">
									<label for="check-g">Reverse parking system</label>

									<input id="check-h" type="checkbox" name="check">
									<label for="check-h">Anti-skid-system</label>

									<input id="check-i" type="checkbox" name="check">
									<label for="check-i">Central locking</label>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="row" style="margin-bottom:20px;">
							<div class="col-md-12">
								<strong>{{trans('front.location')}}</strong>
								<div class="markers-on-the-map" style="margin-top: 16px;">
									<!-- Map -->
                                        <input
                                            id="pac-input"
                                            class="controls"
                                            type="text"
											placeholder="Search Box"
											name="location"
                                        />
									<div id="map"></div>
								</div>
                                    <input style="display: none" type="text" name="position_x" id="currentLatitude">
                                    <input style="display: none" type="text" name="position_y" id="currentLongitude">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-12">
							<div style="float: right;">
                                        <a href="{{route('equipment')}}" class="button">{{trans('front.apply')}} <i
                                                class="fa fa-check-circle"></i></a>
                                        <a href="{{route('personnalData')}}"
                                           class="button border">{{trans('front.cancel')}}</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
