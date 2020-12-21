
@extends('frontend.layout.layout_panel',['activePage'=>'rental_terms'])

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
		@include('frontend.camper.rent_out.sub_menu', ['active_page' => 'rental_terms'])
		<form  action="{{route('frontend.camper.storeterms')}}" method="POST">
		@csrf
			<div class="col-lg-7 col-md-12">
				<h3><strong>{{trans('front.rental_terms')}}</strong></h3>
				<div class="col-md-12">
					<div class="col-md-6">
						<h5>{{trans('front.minimum_hirer')}} {{$camper->minimum_age}}</h5>
						<select name="minimum_age" id="minimum_age" class="chosen-select-no-single" >
						<option value="0">Choose</option>
						<?php for ($i = 18; $i <= 30; $i++) {?>
						<option <?php echo $camper->minimum_age == $i ? "selected='selected'" : null; ?> value="<?php echo $i; ?>"> <?php echo $i; ?> {{trans('front.years')}}</option>
						<?php }?>
						</select>
					</div>
					<div class="col-md-6">
						<h5>{{trans('front.minimum_length_licence')}}</h5>
						<select name="license_age" id="license_age" class="chosen-select-no-single" >
						<option value="0">Choose</option>
						<?php for ($k = 1; $k <= 5; $k++) {?>
						<option <?php echo $camper->license_age == $k ? "selected='selected'" : null; ?> value="<?php echo $k; ?>"> <?php echo $k; ?> {{trans('front.years')}}</option>
						<?php }?>
						</select>
					</div>
				</div>
				<div class="col-md-12" style="padding-top: 20px;">
					<div class="col-md-6">
						<div class="col-md-12">
							<strong>{{trans('front.Animals allowed')}}</strong>
						</div>
						<div class="col-md-5" style="padding-top: 12px;">
							<label class="containerRadio">{{trans('front.yes')}}
								<input type="radio" name="animals_allowed" value="yes" @if($camper->animals_allowed=="yes") checked="checked" @endif>
								<span class="checkmarkRadio"></span>
							</label>
							<label class="containerRadio">{{trans('front.no')}}
								<input type="radio" name="animals_allowed" value="no" @if($camper->animals_allowed=="no") checked="checked" @endif>
								<span class="checkmarkRadio"></span>
							</label>
						</div>
						<div class="col-md-7" style="padding-top: 12px;">
							<label class="containerRadio">{{trans('front.by_agreement')}}
								<input type="radio" name="animals_allowed" value="agreement" @if($camper->animals_allowed=="agreement") checked="checked" @endif>
								<span class="checkmarkRadio"></span>
							</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="col-md-12">
							<strong>{{trans('front.Smoking allowed')}}</strong>
						</div>
						<div class="col-md-4" style="padding-top: 12px;">
							<label class="containerRadio">{{trans('front.yes')}}
								<input type="radio" name="smoking_allowed" value="1" @if($camper->smoking_allowed==1) checked="checked" @endif>
								<span class="checkmarkRadio"></span>
							</label>
						</div>
						<div class="col-md-8" style="padding-top: 12px;">
							<label class="containerRadio">{{trans('front.no')}}
								<input type="radio" name="smoking_allowed" value="0" @if($camper->smoking_allowed==0) checked="checked" @endif>
								<span class="checkmarkRadio"></span>
							</label>
						</div>

					</div>
				</div>
				<div class="col-md-12" >
					<strong>{{trans('front.kilometres_per_night')}}</strong>
				</div>
				<div class="col-md-12" style="padding-top: 12px;">
					<select name="kilometres_per_night" class="chosen-select-no-single" >
						<?php for ($j = 100; $j <= 300; $j = $j + 50) {?>
							<option <?php echo $camper->kilometres_per_night == $j ? "selected='selected'" : null; ?> value="<?php echo $j; ?>"> <?php echo $j; ?> {{trans('front.years')}}</option>
						<?php }?>
						<option value="400" <?php echo $camper->kilometres_per_night == 400 ? "selected='selected'" : null; ?>>{{trans('front.unlimited')}}</option>
					</select>
					<h5>{{trans('front.kilometres_per_night_info')}}</h5>
				</div>
				<!--<div class="col-md-6" style="padding-top: 12px;">
					<div class="col-md-12" >
						<strong>{{trans('front.instant_booking')}}</strong>
					</div>
					<div class="col-md-4" style="padding-top: 12px;">
						<label class="containerRadio">{{trans('front.yes')}}
							<input type="radio" checked="checked" name="radio">
							<span class="checkmarkRadio"></span>
						</label>
					</div>
					<div class="col-md-8" style="padding-top: 12px;">
						<label class="containerRadio">{{trans('front.no')}}
							<input type="radio" checked="checked" name="radio">
							<span class="checkmarkRadio"></span>
						</label>
					</div>
				</div>
				<div class="col-md-12">
					<h5>{{trans('front.instant_booking_info')}}</h5>
				</div>-->
				<!--<div class="col-md-12" style="padding-top: 12px;">

						<strong>{{trans('front.parking_space')}}</strong>
					<div class="col-md-12" style="padding-top: 12px;">
						<div class="checkboxes in-row margin-bottom-20">
							<input id="check-a" type="checkbox" name="check">
							<label for="check-a">{{trans('front.parking_space_duration')}}</label>
						</div>
					</div>
				</div>-->
				<div class="col-md-12">
						<h3>{{trans('front.additional_equipment')}}</h3>
							<div class="switcher-content">
								<div class="row">
									<div class="col-md-12">
										<textarea name="additional_equipment_out" value="{{$camper->additional_equipment_out}}"></textarea>
									</div>
								</div>
							</div>
						<h5>{{trans('front.note_additional_rental')}}</h5>
					</div>
				<div class="row" >
					<div class="col-md-12" style="padding-top: 20px;">
						<div style="float: right;">
							<button type="submit" class="button">{{trans('front.apply')}} <i class="fa fa-check-circle"></i></button>
							<button class="button border">{{trans('front.cancel')}}</button>
						</div>
					</div>
				</div>
		</form>
	</div>
</div>



@endsection
