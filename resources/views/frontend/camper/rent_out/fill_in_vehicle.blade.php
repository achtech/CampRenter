
@extends('frontend.layout.layout_panel',['activePage'=>'fill_in_vehicle','footerPage' => 'true'])

@section('content')
<!-- Content
================================================== -->

<div class="dashboard-content">
	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2><strong>{{isset($camper) ? $camper->camper_name : ''}}</strong></h2>
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

		<div class="col-lg-7 col-md-12" style="padding-left: 37px;">
			<div class="row">
				<h6>{{trans('front.vehicle_data')}}</h6>
				<h3><strong>{{trans('front.vehicle_data')}}</strong></h3>
			</div>
			<form  action="{{route('frontend.camper.storeEquipment')}}" method="POST">
				@csrf
				<input type="hidden" name="id_campers" value="{{$camper->id}}" />

				<div class="margin-top-0">
					<ul style="list-style-type:none; padding-left: 0px;">
						<li>
							<div class="row">
								<!-- Phone -->
								<div class="col-md-6">
									<div class="card-label">
										<label for="camper_name">{{trans('front.name_vehicle')}}</label>
										<input type="text" name="camper_name" value="{{$camper->camper_name}}">
									</div>
								</div>

								<!-- Website -->
								<div class="col-md-6">
									<div class="card-label">
										<label for="brand">{{trans('front.camper_brand')}}</label>
										<input type="text" name="brand" value="{{$camper->brand}}">
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<!-- Phone -->
								<div class="col-md-6">
									<div class="card-label">
										<label for="model">{{trans('front.model')}}</label>
										<input type="text" name="model" value="{{$camper->model}}">
									</div>
								</div>

								<!-- Website -->
								<div class="col-md-6" style="margin-top: 20px;">
									<div class="card-label">
										<select name="id_licence_categories" id="id_licence_categories" class="chosen-select" data-placeholder="Licence">
										<option> </option>
										@foreach($licenceCategories as $cat)
											<option value="{{$cat->id}}" @if($camper->id_licence_categories==$cat->id) selected @endif>{{$cat->label_en}}</option>
										@endforeach
									</select>
									</div>

								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<!-- Phone -->
								<div class="col-md-6" style="margin-top: 20px;">
									<Label> {{trans('front.converted_vehicle')}} </label>
								</div>

								<!-- Website -->
								<div class="col-md-6">
									<div class="card-label">
										<label for="license_plate_number">{{trans('front.licence_number')}}</label>
										<input type="text" name="license_plate_number" value="{{$camper->license_plate_number}}">
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<!-- Phone -->
								<div class="col-md-6">
									<div class="card-label">
										<label for="vehicle_licence">{{trans('front.vehicle_registration')}}</label>
										<input type="text" name="vehicle_licence" value="{{$camper->vehicle_licence}}">
									</div>
								</div>

								<!-- Website -->
								<div class="col-md-6" style="margin-top: 20px;">
									<select name="country" id="country" class="chosen-select" data-placeholder="country">
										<option> </option>
										@foreach($countries as $cat)
											<option value="{{$cat->label}}" @if($camper->country==$cat->label) selected @endif>{{$cat->label}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<!-- Phone -->
								<div class="col-md-6">
									<div class="card-label">
										<label for="seat_number">{{trans('front.number_seats')}}</label>
										<input type="text" name="seat_number" value="{{$camper->seat_number}}">
									</div>
								</div>

								<!-- Website -->
								<div class="col-md-6">
									<div class="card-label">
										<label for="gear_number">{{trans('front.number_gears')}}</label>
										<input type="text" name="gear_number" value="{{$camper->gear_number}}">
									</div>
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
									<div class="col-md-12">
										@foreach($transmissions as $t)
										<label class="containerRadio">{{$t->label_en}}
											<input type="radio"  name="id_transmissions" value="{{$t->id}}" @if($t->id==$camper->id_transmissions) checked="checked" @endif>
											<span class="checkmarkRadio"></span>
										</label>
										@endforeach
									</div>

									<div class="col-md-12">
										<strong>{{trans('front.Fuel')}}</strong>
									</div>
									<div class="col-md-12">
										@foreach($fuels as $f)
										<label class="containerRadio">{{$f->label_en}}
											<input type="radio" name="id_fuels" value="{{$f->id}}" @if($f->id==$camper->id_fuels) checked="checked" @endif>
											<span class="checkmarkRadio"></span>
										</label>
										@endforeach
									</div>
									<div class="col-md-12" style="margin-bottom:10px">
										<strong>{{trans('front.leasing_vehicle')}}</strong>
										<div class="row" style="margin-top: 3%;">
											<div class="col-md-6" style="padding-left: 0px;">
												<label class="containerRadio">{{trans('front.yes')}}
													<input type="radio"  name="leasing_vehicle" value="1" @if($camper->leasing_vehicle==1) checked="checked" @endif>
													<span class="checkmarkRadio"></span>
												</label>
											</div>
											<div class="col-md-6" style="padding-left: 0px;">
												<label class="containerRadio">{{trans('front.no')}}
													<input type="radio"  name="leasing_vehicle" value="0" @if($camper->leasing_vehicle==0) checked="checked" @endif>
													<span class="checkmarkRadio"></span>
												</label>
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
												<input type="radio"  name="included_kilometres"  value="0 - 50'000 km" @if($camper->included_kilometre=="0 - 50'000 km") checked="checked" @endif  >
												<span class="checkmarkRadio"></span>
											</label>
											<label class="containerRadio">50'000 - 100'000 km
												<input type="radio"  name="included_kilometres"  value="50'000 - 100'000 km" @if($camper->included_kilometres=="50'000 - 100'000 km") checked="checked" @endif>
												<span class="checkmarkRadio"></span>
											</label>
											<label class="containerRadio">100'000 - 150'000 km
												<input type="radio"  name="included_kilometres"  value="100'000 - 150'000 km" @if($camper->included_kilometres=="100'000 - 150'000 km") checked="checked" @endif>
												<span class="checkmarkRadio"></span>
											</label>
											<label class="containerRadio">150'000 - 200'000 km
												<input type="radio"  name="included_kilometres"  value="150'000 - 200'000 km" @if($camper->included_kilometres=="150'000 - 200'000 km") checked="checked" @endif>
												<span class="checkmarkRadio"></span>
											</label>
											<label class="containerRadio">200'000 - 250'000 km
												<input type="radio"  name="included_kilometres"  value="200'000 - 250'000 km" @if($camper->included_kilometres=="200'000 - 250'000 km") checked="checked" @endif>
												<span class="checkmarkRadio"></span>
											</label>
											<label class="containerRadio">250'000 - 300'000 km
												<input type="radio"  name="included_kilometres"  value="250'000 - 300'000 km" @if($camper->included_kilometres=="250'000 - 300'000 km") checked="checked" @endif>
												<span class="checkmarkRadio"></span>
											</label>
											<label class="containerRadio">{{trans('front.more_than')}} 300'000 km
												<input type="radio"  name="included_kilometres"  value="300'000 km" @if($camper->included_kilometres=="300'000 km") checked="checked" @endif>
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
									<div class="card-label">
										<label for="fuel_capacity">{{trans('front.fuel_capacity')}}</label>
										<input type="text" name="fuel_capacity" value="{{$camper->fuel_capacity}}">
									</div>
								</div>

								<!-- Website -->
								<div class="col-md-6">
									<div class="card-label">
										<label for="fuel_consumation">{{trans('front.fuel_consumation')}}</label>
										<input type="text" name="fuel_consumation" value="{{$camper->fuel_consumation}}">
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<!-- Phone -->

								<div class="col-md-6">
									<div class="card-label">
										<label for="allowed_total_weight">{{trans('front.allowed_tons')}}</label>
										<input type="text" name="allowed_total_weight" value="{{$camper->allowed_total_weight}}">
									</div>
								</div>
								<!-- Website -->
								<div class="col-md-6">
									<div class="card-label">
										<label for="length">{{trans('front.length_in_metres')}}</label>
										<input type="text" name="length" value="{{$camper->length}}">
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<!-- Phone -->
								<div class="col-md-6">
									<div class="card-label">
										<label for="horse_power">{{trans('front.horse_power')}}</label>
										<input type="text" name="horse_power" value="{{$camper->horse_power}}">
									</div>
								</div>

								<!-- Website -->
								<div class="col-md-6">
									<div class="card-label">
										<label for="cylinder_capacity">{{trans('front.cylinder_capacity')}}</label>
										<input type="text" name="cylinder_capacity" value="{{$camper->cylinder_capacity}}">
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<div class="col-md-12">
									<strong>{{trans('front.Additional attributes')}}</strong>
								</div>
								<div class="col-md-6">
									<div class="checkboxes in-row">
										<input id="check-a" type="checkbox" name="additional_attribute[]"  value="Aircon" @if(isset($additionals) && is_array($additionals) && in_array("Aircon",$additionals)) checked @endif>
										<label for="check-a">Aircon in the driver's cabin</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-b" type="checkbox" name="additional_attribute[]"  value="Rear" @if(isset($additionals) && is_array($additionals) && in_array("Rear",$additionals)) checked @endif>
										<label for="check-b">Rear view camera</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-c" type="checkbox" name="additional_attribute[]"  value="Power" @if(isset($additionals) && is_array($additionals) && in_array("Power",$additionals)) checked @endif>
										<label for="check-c">Power steering</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-d" type="checkbox" name="additional_attribute[]"  value="Four" @if(isset($additionals) && is_array($additionals) && in_array("Four",$additionals)) checked @endif>
										<label for="check-d">Four wheel drive</label>
									</div>
								</div>

								<!-- Website -->
								<div class="col-md-6">
									<div class="checkboxes in-row">
										<input id="check-f" type="checkbox" name="additional_attribute[]"  value="Auxiliary" @if(isset($additionals) && is_array($additionals) && in_array("Auxiliary",$additionals)) checked @endif>
										<label for="check-f">Auxiliary heating</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-g" type="checkbox" name="additional_attribute[]"  value="Reverse" @if(isset($additionals) && is_array($additionals) && in_array("Reverse",$additionals)) checked @endif>
										<label for="check-g">Reverse parking system</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-h" type="checkbox" name="additional_attribute[]"  value="Anti" @if(isset($additionals) && is_array($additionals) && in_array("Anti",$additionals)) checked @endif>
										<label for="check-h">Anti-skid-system</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-i" type="checkbox" name="additional_attribute[]"  value="Central" @if(isset($additionals) && is_array($additionals) && in_array("Central",$additionals)) checked @endif>
										<label for="check-i">Central locking</label>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="row" style="margin-bottom:20px; margin-top:30px;">
								<div class="col-md-12">
									<strong>{{trans('front.location')}}</strong>
									<div class="markers-on-the-map" style="margin-top: 23px;">
									<p>{{trans('front.move')}} <img style="margin-bottom: 3px;" src="{{ asset('images/general/position.png')}}"> {{trans('front.text_map_1')}} <img style="margin-bottom: 3px;" src="{{ asset('images/general/cursor.png')}}"> {{trans('front.text_map_2')}}</p>
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
									{{Form::submit(trans('front.apply'),['style' => 'width:200px','class'=>'button border','name' => 'action'])}}
									{{Form::submit(trans('front.cancel'),['onclick'=>'window.history.go(-1); return false;', 'style' => 'width:200px','class'=>'button border','name' => 'action'])}}
								</div>
							</div>
						</li>
					</ul>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
