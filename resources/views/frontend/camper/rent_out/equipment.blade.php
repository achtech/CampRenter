
@extends('frontend.layout.layout_panel',['activePage'=>'equipment'])

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
		@include('frontend.camper.rent_out.sub_menu', ['active_page' => 'equipment'])
		<form  action="{{route('frontend.camper.storeExtraData')}}" method="POST">
			@csrf
			<input type="hidden" name="id_campers" value="{{$camper->id}}" />

			<div class="col-lg-7 col-md-12">
				<h2 style="padding: 10px;"><strong>{{trans('front.Equipment')}}</strong></h2>
				<div class="margin-top-0">
					<ul style="list-style-type:none; padding-left: 10px;">
						<li>
							<div class="row">
								<h3>1. </h3>
							</div>
							<div class="row opening-day">
								<div class="col-md-6">
									<h3>{{trans('front.camping_table')}}</h3>
									<div class="checkboxes in-row margin-bottom-18">
										<input id="camping_table" name="camping_table" type="checkbox" value="1"  @if($equipement && $equipement->camping_table) checked @endif >
										<label for="camping_table">{{trans('front.camping_table')}}</label>
									</div>
								</div>
								<div class="col-md-6">
									<h3>{{trans('front.camping_chairs')}}</h3>
									<div class="checkboxes in-row margin-bottom-18">
										<input id="camping_chairs" name ="camping_chairs" type="checkbox" value="1" @if($equipement && $equipement->camping_chairs) checked @endif >
										<label for="camping_chairs">{{trans('front.camping_chairs')}}</label>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="row opening-day">
								<div class="col-md-6">
								<h3>{{trans('front.transport')}}</h3>
									<div class="checkboxes in-row">
										<input id="check-a" type="checkbox" value="cargo"  name="transport[]"
											@if(isset($transport) && is_array($transport) && in_array("cargo",$transport)) checked @endif >
										<label for="check-a">{{trans('front.Cargo carrier')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-b" type="checkbox" value="trailer"  name="transport[]"
											@if(isset($transport) && is_array($transport) && in_array("trailer",$transport)) checked @endif>
										<label for="check-b">{{trans('front.Trailer hitch')}}</label>
									</div>
								</div>

								<div class="col-md-6">
									<h3>{{trans('front.water')}}</h3>
									<div class="checkboxes in-row">
										<input id="check-c" type="checkbox" value="fresh"  name="water[]"
											@if(isset($water) && is_array($water) && in_array("fresh",$water)) checked @endif>
										<label for="check-c">{{trans('front.fresh_water_tan')}}</label>
									</div>

									<div class="checkboxes in-row ">
										<input id="check-d" type="checkbox" value="warm"  name="water[]"
											@if(isset($water) && is_array($water) && in_array("warm",$water)) checked @endif>
										<label for="check-d">{{trans('front.warm_water')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-e" type="checkbox" value="waste"  name="water[]"
											@if(isset($water) && is_array($water) && in_array("waste",$water)) checked @endif>
										<label for="check-e">{{trans('front.waste_water_tank')}}</label>
									</div>
								</div>

							</div>
						</li>
						<li>
							<div class="row opening-day">
								<h3>{{trans('front.winter')}}</h3>
								<div class="col-md-6">
									<div class="checkboxes in-row">
										<input id="check-f" type="checkbox" value="ready"  name="winter[]"
											@if(isset($winter) && is_array($winter) && in_array("ready",$winter)) checked @endif>
										<label for="check-f">{{trans('front.winter_ready')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-g" type="checkbox" value="double"   name="winter[]"
											@if(isset($winter) && is_array($winter) && in_array("double",$winter)) checked @endif>
										<label for="check-g">{{trans('front.double_bottom')}}</label>
									</div>
									<div class="checkboxes in-row margin-bottom-18">
										<input id="check-h" type="checkbox" value="heat"   name="winter[]"
										@if(isset($winter) && is_array($winter) && in_array("heat",$winter)) checked @endif>
										<label for="check-h">{{trans('front.Heat_absorbing_glass')}}</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="checkboxes in-row">
										<input id="check-i" type="checkbox" value="tires"   name="winter[]"
											@if(isset($winter) && is_array($winter) && in_array("tires",$winter)) checked @endif>
										<label for="check-i">{{trans('front.winter_tires')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-j" type="checkbox" value="snow"   name="winter[]"
											@if(isset($winter) && is_array($winter) && in_array("snow",$winter)) checked @endif>
										<label for="check-j">{{trans('front.snow_chains')}}</label>
									</div>
									<div class="checkboxes in-row margin-bottom-18">
										<input id="check-k" type="checkbox" value="heatable"   name="winter[]"
											@if(isset($winter) && is_array($winter) && in_array("heatable",$winter)) checked @endif>
										<label for="check-k">{{trans('front.Heatable')}}</label>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="row opening-day">
								<h3>{{trans('front.further_equipment')}}</h3>
								<div class="col-md-6">
									<div class="checkboxes in-row">
										<input id="check-l" type="checkbox" value="canister"   name="additional_equipment_outside[]"
											@if(isset($additional_equipment_outside) && is_array($additional_equipment_outside) && in_array("canister",$additional_equipment_outside)) checked @endif>
										<label for="check-l">{{trans('front.water_canister')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-m" type="checkbox" value="grill"  name="additional_equipment_outside[]"
										@if(isset($additional_equipment_outside) && is_array($additional_equipment_outside) && in_array("grill",$additional_equipment_outside)) checked @endif>
										<label for="check-m">{{trans('front.grill')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-n" type="checkbox" value="levelling"  name="additional_equipment_outside[]"
										@if(isset($additional_equipment_outside) && is_array($additional_equipment_outside) && in_array("levelling",$additional_equipment_outside)) checked @endif>
										<label for="check-n">{{trans('front.levelling_ramp')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-o" type="checkbox" value="tent"  name="additional_equipment_outside[]"
										@if(isset($additional_equipment_outside) && is_array($additional_equipment_outside) && in_array("tent",$additional_equipment_outside)) checked @endif>
										<label for="check-o">{{trans('front.tent')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-p" type="checkbox" value="fire"  name="additional_equipment_outside[]"
										@if(isset($additional_equipment_outside) && is_array($additional_equipment_outside) && in_array("fire",$additional_equipment_outside)) checked @endif>
										<label for="check-p">{{trans('front.fire_extinguisher')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-q" type="checkbox" value="mosquito"  name="additional_equipment_outside[]"
										@if(isset($additional_equipment_outside) && is_array($additional_equipment_outside) && in_array("mosquito",$additional_equipment_outside)) checked @endif>
										<label for="check-q">{{trans('front.mosquito_net')}}</label>
									</div>
									<div class="checkboxes in-row margin-bottom-18">
										<input id="check-r" type="checkbox" value="hammock"  name="additional_equipment_outside[]"
										@if(isset($additional_equipment_outside) && is_array($additional_equipment_outside) && in_array("hammock",$additional_equipment_outside)) checked @endif>
										<label for="check-r">{{trans('front.hammock')}}</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="checkboxes in-row">
										<input id="check-s" type="checkbox" value="bottle"  name="additional_equipment_outside[]"
										@if(isset($additional_equipment_outside) && is_array($additional_equipment_outside) && in_array("bottle",$additional_equipment_outside)) checked @endif>
										<label for="check-s">{{trans('front.gas_bottle')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-t" type="checkbox" value="cooker"   name="additional_equipment_outside[]"
										@if(isset($additional_equipment_outside) && is_array($additional_equipment_outside) && in_array("cooker",$additional_equipment_outside)) checked @endif>
										<label for="check-t">{{trans('front.gas_cooker')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-u" type="checkbox" value="awing"   name="additional_equipment_outside[]"
										@if(isset($additional_equipment_outside) && is_array($additional_equipment_outside) && in_array("awing",$additional_equipment_outside)) checked @endif>
										<label for="check-u">{{trans('front.awning')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-v" type="checkbox" value="light"   name="additional_equipment_outside[]"
										@if(isset($additional_equipment_outside) && is_array($additional_equipment_outside) && in_array("light",$additional_equipment_outside)) checked @endif>
										<label for="check-v">{{trans('front.camping_light')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-w" type="checkbox" value="cable"   name="additional_equipment_outside[]"
										@if(isset($additional_equipment_outside) && is_array($additional_equipment_outside) && in_array("cable",$additional_equipment_outside)) checked @endif>
										<label for="check-w">{{trans('front.cable_reel')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-x" type="checkbox" value="deck"   name="additional_equipment_outside[]"
										@if(isset($additional_equipment_outside) && is_array($additional_equipment_outside) && in_array("deck",$additional_equipment_outside)) checked @endif>
										<label for="check-x">{{trans('front.deck_chair')}}</label>
									</div>
									<div class="checkboxes in-row margin-bottom-18">
										<input id="check-y" type="checkbox" value="carpet"   name="additional_equipment_outside[]"
										@if(isset($additional_equipment_outside) && is_array($additional_equipment_outside) && in_array("carpet",$additional_equipment_outside)) checked @endif>
										<label for="check-y">{{trans('front.carpet_for_tent')}}</label>
									</div>
								</div>
							</div>
						</li>
						<li>
							<h3>{{trans('front.add_additional_equipment')}}</h3>
							<div class="switcher-content">
								<div class="row">
									<div class="col-md-10">
										<textarea name="other_additional_equipment">{{$equipement->other_additional_equipment ?? ''}}</textarea>
									</div>
								</div>

							</div>
						</li>
						<li>
							<div class="row">
									<h3>2. {{trans('front.inside')}}</h3>
							</div>
							<div class="row opening-day">
								<div class="col-md-6">
									<div class="card-label">
										<label for="single_beds">{{trans('front.number_of_single_beds')}}</label>
										<input type="number" min="0" name="single_beds" value="{{$equipement->single_beds ??0}}">
									</div>
								</div>
								<div class="col-md-6">
									<div class="card-label">
										<label for="double_beds">{{trans('front.number_of_double_beds')}}</label>
										<input type="number" min="0" name="double_beds" value="{{$equipement->double_beds ??0}}">
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="row opening-day">
								<div class="col-md-6">
									<h3>{{trans('front.air_conditioner')}}</h3>
									<div class="checkboxes in-row">
										<input id="check-z" type="checkbox" value="1"  name="air_conditioner" @if($equipement && $equipement->air_conditioner) checked @endif>
										<label for="check-z">{{trans('front.air_conditioner')}}</label>
									</div>
								</div>
								<div class="col-md-6">
									<h3>{{trans('front.heating')}}</h3>
									<div class="checkboxes in-row">
										<input id="check-1" type="checkbox" value="1" @if($equipement && $equipement->heating) checked @endif  name="heating" >
										<label for="check-1">{{trans('front.heating')}}</label>
									</div>

								</div>
							</div>
						</li>
						<li>
							<div class="row opening-day">
								<div class="col-md-6">
								<h3>{{trans('front.power')}}</h3>
									<div class="checkboxes in-row">
										<input id="check-2" type="checkbox" value="supply"  name="power[]"
										@if(isset($power) && is_array($power) && in_array("supply",$power)) checked @endif>
										<label for="check-2">{{trans('front.power_supply')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-3" type="checkbox" value="cable"   name="power[]"
										@if(isset($power) && is_array($power) && in_array("cable",$power)) checked @endif>
										<label for="check-3">{{trans('front.cable_reel')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-4" type="checkbox" value="heavy"   name="power[]"
										@if(isset($power) && is_array($power) && in_array("heavy",$power)) checked @endif>
										<label for="check-4">{{trans('front.heavy_current_connection')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-5" type="checkbox" value="extra"   name="power[]"
										@if(isset($power) && is_array($power) && in_array("extra",$power)) checked @endif>
										<label for="check-5">{{trans('front.extra_battery')}}</label>
									</div>
								</div>
								<div class="col-md-6">
									<h3>{{trans('front.dimming')}}</h3>
									<div class="checkboxes in-row">
										<input id="check-6" type="checkbox" value="tinted"   name="dimming[]"
										@if(isset($dimming) && is_array($dimming) && in_array("tinted",$dimming)) checked @endif>
										<label for="check-6">{{trans('front.tinted_windows')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-7" type="checkbox" value="curtains"    name="dimming[]"
										@if(isset($dimming) && is_array($dimming) && in_array("curtains",$dimming)) checked @endif>
										<label for="check-7">{{trans('front.curtains')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-8" type="checkbox" value="cable"    name="dimming[]"
										@if(isset($dimming) && is_array($dimming) && in_array("cable",$dimming)) checked @endif>
										<label for="check-8">{{trans('front.cable_reel')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-9" type="checkbox" value="roller"    name="dimming[]"
										@if(isset($dimming) && is_array($dimming) && in_array("roller",$dimming)) checked @endif>
										<label for="check-9">{{trans('front.roller_blinds')}}</label>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="row opening-day">
								<div class="col-md-6">
									<h3>{{trans('front.Indoor table')}}</h3>
									<div class="checkboxes in-row">
										<input id="check-10" type="checkbox" value="1" @if($equipement && $equipement->indoor_table) checked @endif    name="indoor_table">
										<label for="check-10">{{trans('front.Indoor table')}}</label>
									</div>
								</div>
								<div class="col-md-6">
									<h3>{{trans('front.rotatable_seats')}}</h3>
									<div class="checkboxes in-row">
										<input id="check-11" type="checkbox" value="1" @if($equipement && $equipement->rotatable_seats) checked @endif  name="rotatable_seats">
										<label for="check-11">{{trans('front.rotatable_seats')}}</label>
									</div>

								</div>
							</div>
						</li>
						<li>
							<div class="row opening-day">
								<div class="col-md-6">
									<h3>{{trans('front.baby_seat')}}</h3>
									<div class="checkboxes in-row">
										<input id="check-12" type="checkbox" value="baby_seat"  name="baby_seat[]"
										@if(isset($baby_seat) && is_array($baby_seat) && in_array("baby_seat",$baby_seat)) checked @endif>
										<label for="check-12">{{trans('front.baby_seat')}}</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="checkboxes in-row">
										<input id="check-13" type="checkbox" value="baby_seat_latch"   name="baby_seat[]"
										@if(isset($baby_seat) && is_array($baby_seat) && in_array("baby_seat_latch",$baby_seat)) checked @endif>
										<label for="check-13">{{trans('front.baby_seat_latch')}}</label>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="row opening-day">
								<div class="col-md-6">
									<h3>{{trans('front.electronics')}}</h3>
									<div class="checkboxes in-row">
										<input id="check-14" type="checkbox" value="gps"   name="electronics[]"
										@if(isset($electronics) && is_array($electronics) && in_array("gps",$electronics)) checked @endif>
										<label for="check-14">GPS</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-15" type="checkbox" value="usb"  name="electronics[]"
										@if(isset($electronics) && is_array($electronics) && in_array("usb",$electronics)) checked @endif>
										<label for="check-15">USB</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-16" type="checkbox" value="aux"  name="electronics[]"
										@if(isset($electronics) && is_array($electronics) && in_array("aux",$electronics)) checked @endif>
										<label for="check-16">AUX</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-17" type="checkbox" value="iphone"  name="electronics[]"
										@if(isset($electronics) && is_array($electronics) && in_array("iphone",$electronics)) checked @endif>
										<label for="check-17">{{trans('front.iPhone Connection')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-18" type="checkbox" value="dvd"  name="electronics[]"
										@if(isset($electronics) && is_array($electronics) && in_array("dvd",$electronics)) checked @endif>
										<label for="check-18">DVD Player</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-19" type="checkbox" value="radio"  name="electronics[]"
										@if(isset($electronics) && is_array($electronics) && in_array("radio",$electronics)) checked @endif>
										<label for="check-19">Radio</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-20" type="checkbox" value="cd"  name="electronics[]"
										@if(isset($electronics) && is_array($electronics) && in_array("cd",$electronics)) checked @endif>
										<label for="check-20">CD Player</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-21" type="checkbox" value="mp3"  name="electronics[]"
										@if(isset($electronics) && is_array($electronics) && in_array("mp3",$electronics)) checked @endif>
										<label for="check-21">MP3</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-22" type="checkbox" value="tv"  name="electronics[]"
										@if(isset($electronics) && is_array($electronics) && in_array("tv",$electronics)) checked @endif>
										<label for="check-22">TV</label>
									</div>
								</div>
								<div class="col-md-6">
									<h3>{{trans('front.cooking_possibility')}}</h3>
									<div class="checkboxes in-row">
										<input id="check-23" type="checkbox" value="burner"  name="cooking_possibility[]"
										@if(isset($cooking_possibility) && is_array($cooking_possibility) && in_array("burner",$cooking_possibility)) checked @endif>
										<label for="check-23">{{trans('front.burner_stove')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-24" type="checkbox" value="single"  name="cooking_possibility[]"
										@if(isset($cooking_possibility) && is_array($cooking_possibility) && in_array("single",$cooking_possibility)) checked @endif>
										<label for="check-24">{{trans('front.single_electric_cooker')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-25" type="checkbox" value="triple"  name="cooking_possibility[]"
										@if(isset($cooking_possibility) && is_array($cooking_possibility) && in_array("triple",$cooking_possibility)) checked @endif>
										<label for="check-25">{{trans('front.Triple_electric_cooker')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-26" type="checkbox" value="double"   name="cooking_possibility[]"
										@if(isset($cooking_possibility) && is_array($cooking_possibility) && in_array("double",$cooking_possibility)) checked @endif>
										<label for="check-26">{{trans('front.double_electric_cooker')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-27" type="checkbox" value="oven"  name="cooking_possibility[]"
										@if(isset($cooking_possibility) && is_array($cooking_possibility) && in_array("oven",$cooking_possibility)) checked @endif>
										<label for="check-27">{{trans('front.oven')}}</label>
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
									<h3>{{trans('front.cooling_possibility')}}</h3>
									<div class="checkboxes in-row">
										<input id="check-28" type="checkbox" value="fridge"  name="cooling_possibility[]"
										@if(isset($cooling_possibility) && is_array($cooling_possibility) && in_array("fridge",$cooling_possibility)) checked @endif>
										<label for="check-28">{{trans('front.fridge')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-29" type="checkbox" value="freezer"   name="cooling_possibility[]"
										@if(isset($cooling_possibility) && is_array($cooling_possibility) && in_array("freezer",$cooling_possibility)) checked @endif>
										<label for="check-29">{{trans('front.freezer')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-30" type="checkbox" value="cool"   name="cooling_possibility[]"
										@if(isset($cooling_possibility) && is_array($cooling_possibility) && in_array("cool",$cooling_possibility)) checked @endif>
										<label for="check-30">{{trans('front.cool_box')}}</label>
									</div>
								</div>
								<div class="col-md-6">
									<h3>{{trans('front.bathroom')}}</h3>
									<div class="checkboxes in-row">
										<input id="check-31" type="checkbox" value="toilet"   name="bathroom[]"
										@if(isset($bathroom) && is_array($bathroom) && in_array("toilet",$bathroom)) checked @endif>
										<label for="check-31">{{trans('front.toilet')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-32" type="checkbox" value="basin"  name="bathroom[]"
										@if(isset($bathroom) && is_array($bathroom) && in_array("basin",$bathroom)) checked @endif>
										<label for="check-32">{{trans('front.basin')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-33" type="checkbox" value="mobile"  name="bathroom[]"
										@if(isset($bathroom) && is_array($bathroom) && in_array("mobile",$bathroom)) checked @endif>
										<label for="check-33">{{trans('front.mobile_toilet')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-34" type="checkbox" value="shower"  name="bathroom[]"
										@if(isset($bathroom) && is_array($bathroom) && in_array("shower",$bathroom)) checked @endif>
										<label for="check-34">{{trans('front.shower')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-35" type="checkbox" value="outdoor"  name="bathroom[]"
										@if(isset($bathroom) && is_array($bathroom) && in_array("outdoor",$bathroom)) checked @endif>
										<label for="check-35">{{trans('front.outdoor_shower')}}</label>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="row opening-day">
								<div class="col-md-6">
									<h3>{{trans('front.sink')}}</h3>
									<div class="checkboxes in-row">
										<input id="check-36" type="checkbox" value="1" @if($equipement && $equipement->sink) checked @endif  name="sink" >
										<label for="check-36">{{trans('front.sink')}}</label>
									</div>
								</div>
								<div class="col-md-6">
									<h3>{{trans('front.dishes')}}</h3>
									<div class="checkboxes in-row">
										<input id="check-37" type="checkbox" value="1" @if($equipement && $equipement->dishes) checked @endif  name="dishes"  >
										<label for="check-37">{{trans('front.dishes')}}</label>
									</div>

								</div>
							</div>
						</li>
						<li>
							<div class="row opening-day">

							</div>
						</li>
						<li>
							<h3>{{trans('front.additional_equipment_intside')}}</h3>
							<div class="switcher-content">
								<div class="row">
									<div class="col-md-12">
										<textarea name="additional_equipment_inside"> {{$equipement->additional_equipment_inside ?? ""}} </textarea>
									</div>
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
							</div>
						</li>
					</ul>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
