
@extends('frontend.layout.layout_panel',['activePage'=>'rental_terms'])

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
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Add Listing</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- sub_menu -->
		@include('frontend.camper.rent_out.sub_menu', ['active_page' => 'rental_terms'])

		<div class="col-lg-7 col-md-12">
			<h3><strong>{{trans('front.rental_terms')}}</strong></h3>
			<div class="col-md-12">
				<div class="col-md-6">
					<h5>{{trans('front.minimum_hirer')}}</h5>
					<select class="chosen-select-no-single" >
						<option label="blank">{{trans('front.select_category')}}</option>
						<option>Eat & Drink</option>
						<option>Shops</option>
						<option>Hotels</option>
						<option>Restaurants</option>
						<option>Fitness</option>
						<option>Events</option>
					</select>
				</div>
				<div class="col-md-6">
					<h5>{{trans('front.minimum_length_licence')}}</h5>
					<select class="chosen-select-no-single" >
						<option label="blank">{{trans('front.select_category')}}</option>
						<option>Eat & Drink</option>
						<option>Shops</option>
						<option>Hotels</option>
						<option>Restaurants</option>
						<option>Fitness</option>
						<option>Events</option>
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
							<input type="radio" checked="checked" name="radio">
							<span class="checkmarkRadio"></span>
						</label>
						<label class="containerRadio">{{trans('front.no')}}
							<input type="radio" checked="checked" name="radio">
							<span class="checkmarkRadio"></span>
						</label>
					</div>
					<div class="col-md-7" style="padding-top: 12px;">
						<label class="containerRadio">{{trans('front.by_agreement')}}
							<input type="radio" checked="checked" name="radio">
							<span class="checkmarkRadio"></span>
						</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="col-md-12">
						<strong>{{trans('front.Animals allowed')}}</strong>
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
			</div>
			<div class="col-md-12" >
				<strong>{{trans('front.kilometres_per_night')}}</strong>
			</div>
			<div class="col-md-12" style="padding-top: 12px;">
				<select class="chosen-select-no-single" >
					<option label="blank">{{trans('front.select_category')}}</option>
					<option>Eat & Drink</option>
					<option>Shops</option>
					<option>Hotels</option>
					<option>Restaurants</option>
					<option>Fitness</option>
					<option>Events</option>
				</select>
				<h5>{{trans('front.kilometres_per_night_info')}}</h5>
			</div>
			<div class="col-md-6" style="padding-top: 12px;">
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
			</div>
			<div class="col-md-12" style="padding-top: 12px;">

					<strong>{{trans('front.parking_space')}}</strong>
				<div class="col-md-12" style="padding-top: 12px;">
					<div class="checkboxes in-row margin-bottom-20">
						<input id="check-a" type="checkbox" name="check">
						<label for="check-a">{{trans('front.parking_space_duration')}}</label>
					</div>
				</div>
			</div>
			<div class="col-md-12">
					<h3>{{trans('front.additional_equipment')}}</h3>
					<div class="switcher-content">
						<div class="row">
							<div class="col-md-10">
								<a href="#" class="button add-pricing-submenu">{{trans('front.add_additional_equipment')}}</a>
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
					<h5>{{trans('front.note_additional_rental')}}</h5>
				</div>

			<div class="row" >
				<div class="col-md-12" style="padding-top: 20px;">
				<div style="float: right;">
				<a href="{{route('calendar')}}" class="button">{{trans('front.apply')}} <i class="fa fa-check-circle"></i></a>
				<a href="" class="button border">{{trans('front.cancel')}}</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
