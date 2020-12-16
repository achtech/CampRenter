
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
								<h3>1. {{trans('front.outside')}}</h3>
							</div>
							<div class="row opening-day">
								<div class="col-md-6">
									<h3>{{trans('front.camping_table')}}</h3>
									<div class="checkboxes in-row margin-bottom-18">
										<input id="camping_table" name="camping_table" type="checkbox" value="1"  >
										<label for="camping_table">{{trans('front.camping_table')}}</label>
									</div>
								</div>
								<div class="col-md-6">
									<h3>{{trans('front.camping_chairs')}}</h3>
									<div class="checkboxes in-row margin-bottom-18">
										<input id="camping_chairs" name ="camping_chairs" type="checkbox" value="1"  >
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
										<input id="check-a" type="checkbox" value="cargo"  name="transport[]" >
										<label for="check-a">Cargo carrier</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-b" type="checkbox" value="trailer"  name="transport[]" >
										<label for="check-b">Trailer hitch</label>
									</div>
								</div>

								<div class="col-md-6">
									<h3>{{trans('front.water')}}</h3>
									<div class="checkboxes in-row">
										<input id="check-c" type="checkbox" value="fresh"  name="water[]" >
										<label for="check-c">{{trans('front.fresh_water_tan')}}</label>
									</div>
									<div class="checkboxes in-row ">
										<input id="check-d" type="checkbox" value="warm"  name="water[]">
										<label for="check-d">{{trans('front.warm_water')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-e" type="checkbox" value="waste"  name="water[]">
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
										<input id="check-f" type="checkbox" value="ready"  name="winter[]">
										<label for="check-f">{{trans('front.winter_ready')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-g" type="checkbox" value="double"   name="winter[]">
										<label for="check-g">{{trans('front.double_bottom')}}</label>
									</div>
									<div class="checkboxes in-row margin-bottom-18">
										<input id="check-h" type="checkbox" value="heat"   name="winter[]">
										<label for="check-h">{{trans('front.Heat_absorbing_glass')}}</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="checkboxes in-row">
										<input id="check-i" type="checkbox" value="tires"   name="winter[]">
										<label for="check-i">{{trans('front.winter_tires')}}</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-j" type="checkbox" value="snow"   name="winter[]">
										<label for="check-j">{{trans('front.snow_chains')}}</label>
									</div>
									<div class="checkboxes in-row margin-bottom-18">
										<input id="check-k" type="checkbox" value="heatable"   name="winter[]">
										<label for="check-k">Heatable water- and waste water tank</label>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="row opening-day">
								<h3>{{trans('front.further_equipment')}}</h3>
								<div class="col-md-6">
									<div class="checkboxes in-row">
										<input id="check-l" type="checkbox" value="canister"   name="additional_equipment_outside[]">
										<label for="check-l">Water canister</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-m" type="checkbox" value="grill"  name="additional_equipment_outside[]">
										<label for="check-m">Grill</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-n" type="checkbox" value="levelling"  name="additional_equipment_outside[]">
										<label for="check-n">Levelling ramp</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-o" type="checkbox" value="tent"  name="additional_equipment_outside[]">
										<label for="check-o">Tent</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-p" type="checkbox" value="fire"  name="additional_equipment_outside[]">
										<label for="check-p">Fire extinguisher</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-q" type="checkbox" value="mosquito"  name="additional_equipment_outside[]">
										<label for="check-q">Mosquito net</label>
									</div>
									<div class="checkboxes in-row margin-bottom-18">
										<input id="check-r" type="checkbox" value="hammock"  name="additional_equipment_outside[]">
										<label for="check-r">Hammock</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="checkboxes in-row">
										<input id="check-s" type="checkbox" value="bottle"  name="additional_equipment_outside[]">
										<label for="check-s">Gas bottle</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-t" type="checkbox" value="cooker"   name="additional_equipment_outside[]">
										<label for="check-t">Gas cooker for outside</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-u" type="checkbox" value="awing"   name="additional_equipment_outside[]">
										<label for="check-u">Awning</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-v" type="checkbox" value="light"   name="additional_equipment_outside[]">
										<label for="check-v">Camping light</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-w" type="checkbox" value="cable"   name="additional_equipment_outside[]">
										<label for="check-w">Cable reel</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-x" type="checkbox" value="deck"   name="additional_equipment_outside[]">
										<label for="check-x">Deck chair</label>
									</div>
									<div class="checkboxes in-row margin-bottom-18">
										<input id="check-y" type="checkbox" value="carpet"   name="additional_equipment_outside[]">
										<label for="check-y">Carpet for tent</label>
									</div>
								</div>
							</div>
						</li>
						<li>
							<h3>{{trans('front.add_additional_equipment')}}</h3>
							<div class="switcher-content">
								<div class="row">
									<div class="col-md-10">
													<textarea name="other_additional_equipment"></textarea>
									</div>
								</div>

							</div>
						</li>
						<li>
							<div class="row">
									<h3>2. Inside</h3>
							</div>
							<div class="row opening-day">
								<div class="col-md-6">
									<input type="number" placeholder="Number of single beds" name="single_beds"/>
								</div>
								<div class="col-md-6">
									<input type="number" placeholder="Number of double beds" name="double_beds"/>
								</div>
							</div>
						</li>
						<li>
							<div class="row opening-day">
								<div class="col-md-6">
									<h3>Air conditioner</h3>
									<div class="checkboxes in-row">
										<input id="check-z" type="checkbox" value="1"  name="air_conditioner" >
										<label for="check-z">Air conditioner</label>
									</div>
								</div>
								<div class="col-md-6">
									<h3>Heating</h3>
									<div class="checkboxes in-row">
										<input id="check-1" type="checkbox" value="1"  name="heating" >
										<label for="check-1">Heating</label>
									</div>

								</div>
							</div>
						</li>
						<li>
							<div class="row opening-day">
								<div class="col-md-6">
								<h3>Power</h3>
									<div class="checkboxes in-row">
										<input id="check-2" type="checkbox" value="supply"  name="power[]">
										<label for="check-2">Power supply</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-3" type="checkbox" value="cable"   name="power[]">
										<label for="check-3">Cable reel</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-4" type="checkbox" value="heavy"   name="power[]">
										<label for="check-4">Heavy current connection</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-5" type="checkbox" value="extra"   name="power[]">
										<label for="check-5">Extra battery</label>
									</div>
								</div>
								<div class="col-md-6">
									<h3>Dimming</h3>
									<div class="checkboxes in-row">
										<input id="check-6" type="checkbox" value="tinted"   name="dimming[]">
										<label for="check-6">Tinted windows</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-7" type="checkbox" value="curtains"    name="dimming[]">
										<label for="check-7">Curtains</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-8" type="checkbox" value="cable"    name="dimming[]">
										<label for="check-8">Cable reel</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-9" type="checkbox" value="roller"    name="dimming[]">
										<label for="check-9">Roller blinds</label>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="row opening-day">
								<div class="col-md-6">
									<h3>Indoor table</h3>
									<div class="checkboxes in-row">
										<input id="check-10" type="checkbox" value="1"    name="indoor_table">
										<label for="check-10">Indoor table</label>
									</div>
								</div>
								<div class="col-md-6">
									<h3>Rotatable seats</h3>
									<div class="checkboxes in-row">
										<input id="check-11" type="checkbox" value="1"  name="rotatable_seats">
										<label for="check-11">Rotatable seats</label>
									</div>

								</div>
							</div>
						</li>
						<li>
							<div class="row opening-day">
								<div class="col-md-6">
									<h3>Baby seat</h3>
									<div class="checkboxes in-row">
										<input id="check-12" type="checkbox" value="baby_seat"  name="baby_seat[]">
										<label for="check-12">Baby seat</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="checkboxes in-row">
										<input id="check-13" type="checkbox" value="baby_seat_latch"   name="baby_seat[]">
										<label for="check-13">Baby seat latch</label>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="row opening-day">
								<div class="col-md-6">
									<h3>Electronics</h3>
									<div class="checkboxes in-row">
										<input id="check-14" type="checkbox" value="gps"   name="electronics[]">
										<label for="check-14">GPS</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-15" type="checkbox" value="usb"  name="electronics[]" >
										<label for="check-15">USB</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-16" type="checkbox" value="aux"  name="electronics[]" >
										<label for="check-16">AUX</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-17" type="checkbox" value="iphone"  name="electronics[]" >
										<label for="check-17">iPhone Connection</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-18" type="checkbox" value="dvd"  name="electronics[]" >
										<label for="check-18">DVD Player</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-19" type="checkbox" value="radio"  name="electronics[]" >
										<label for="check-19">Radio</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-20" type="checkbox" value="cd"  name="electronics[]" >
										<label for="check-20">CD Player</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-21" type="checkbox" value="mp3"  name="electronics[]" >
										<label for="check-21">MP3</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-22" type="checkbox" value="tv"  name="electronics[]" >
										<label for="check-22">TV</label>
									</div>
								</div>
								<div class="col-md-6">
									<h3>Cooking possibility</h3>
									<div class="checkboxes in-row">
										<input id="check-23" type="checkbox" value="burner"  name="cooking_possibility[]" >
										<label for="check-23">Burner stove</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-24" type="checkbox" value="single"  name="cooking_possibility[]"  >
										<label for="check-24">Single electric cooker</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-25" type="checkbox" value="triple"  name="cooking_possibility[]"  >
										<label for="check-25">Triple electric cooker</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-26" type="checkbox" value="double"   name="cooking_possibility[]" >
										<label for="check-26">Double electric cooker</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-27" type="checkbox" value="oven"  name="cooking_possibility[]" >
										<label for="check-27">Oven</label>
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
										<input id="check-28" type="checkbox" value="fridge"  name="cooling_possibility[]" >
										<label for="check-28">Fridge</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-29" type="checkbox" value="freezer"   name="cooling_possibility[]">
										<label for="check-29">Freezer</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-30" type="checkbox" value="cool"   name="cooling_possibility[]">
										<label for="check-30">Cool box</label>
									</div>
								</div>
								<div class="col-md-6">
									<h3>Bathroom</h3>
									<div class="checkboxes in-row">
										<input id="check-31" type="checkbox" value="toilet"   name="bathroom[]">
										<label for="check-31">Toilet</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-32" type="checkbox" value="basin"  name="bathroom[]" >
										<label for="check-32">Basin</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-33" type="checkbox" value="mobile"  name="bathroom[]" >
										<label for="check-33">Mobile camping toilet</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-34" type="checkbox" value="shower"  name="bathroom[]" >
										<label for="check-34">Shower</label>
									</div>
									<div class="checkboxes in-row">
										<input id="check-35" type="checkbox" value="outdoor"  name="bathroom[]" >
										<label for="check-35">Outdoor shower</label>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="row opening-day">
								<div class="col-md-6">
									<h3>Sink</h3>
									<div class="checkboxes in-row">
										<input id="check-36" type="checkbox" value="1"  name="sink" >
										<label for="check-36">Sink</label>
									</div>
								</div>
								<div class="col-md-6">
									<h3>Dishes</h3>
									<div class="checkboxes in-row">
										<input id="check-37" type="checkbox" value="1"  name="dishes"  >
										<label for="check-37">Dishes</label>
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
										<textarea name="additional_equipment_inside"></textarea>
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
