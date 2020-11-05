
@extends('frontend.layout.layout_panel',['activePage'=>'rental_terms'])

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
		<!-- sub_menu -->
		@include('frontend.camper.rent_out.sub_menu')

		<div class="col-lg-7 col-md-12">
			<h3><strong>Rental terms</strong></h3>
			<div class="col-md-12">
				<div class="col-md-6">
					<h5>Minimum of hirer</h5>
					<select class="chosen-select-no-single" >
						<option label="blank">Select Category</option>
						<option>Eat & Drink</option>
						<option>Shops</option>
						<option>Hotels</option>
						<option>Restaurants</option>
						<option>Fitness</option>
						<option>Events</option>
					</select>
				</div>
				<div class="col-md-6">
					<h5>Minimum length of driver's licence</h5>
					<select class="chosen-select-no-single" >
						<option label="blank">Select Category</option>
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
						<strong>Animals allowed</strong>
					</div>
					<div class="col-md-6" style="padding-top: 12px;">
						<label class="containerRadio">Yes
							<input type="radio" checked="checked" name="radio">
							<span class="checkmarkRadio"></span>
						</label>
						<label class="containerRadio">No
							<input type="radio" checked="checked" name="radio">
							<span class="checkmarkRadio"></span>
						</label>
					</div>
					<div class="col-md-6" style="padding-top: 12px;">
						<label class="containerRadio">By-Agreement
							<input type="radio" checked="checked" name="radio">
							<span class="checkmarkRadio"></span>
						</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="col-md-12">
						<strong>Animals allowed</strong>
					</div>
					<div class="col-md-4" style="padding-top: 12px;">
						<label class="containerRadio">Yes
							<input type="radio" checked="checked" name="radio">
							<span class="checkmarkRadio"></span>
						</label>
					</div>
					<div class="col-md-8" style="padding-top: 12px;">
						<label class="containerRadio">No
							<input type="radio" checked="checked" name="radio">
							<span class="checkmarkRadio"></span>
						</label>
					</div>

				</div>
			</div>
			<div class="col-md-12" >
				<strong>Kilometres included per night</strong>
			</div>
			<div class="col-md-12" style="padding-top: 12px;">
				<select class="chosen-select-no-single" >
					<option label="blank">Select Category</option>
					<option>Eat & Drink</option>
					<option>Shops</option>
					<option>Hotels</option>
					<option>Restaurants</option>
					<option>Fitness</option>
					<option>Events</option>
				</select>
				<h5>The higher the number of kilometres included, the more attractive your vehicle will be to renters.</h5>
			</div>
			<div class="col-md-6" style="padding-top: 12px;">
				<div class="col-md-12" >
					<strong>Instant booking</strong>
				</div>
				<div class="col-md-4" style="padding-top: 12px;">
					<label class="containerRadio">Yes
						<input type="radio" checked="checked" name="radio">
						<span class="checkmarkRadio"></span>
					</label>
				</div>
				<div class="col-md-8" style="padding-top: 12px;">
					<label class="containerRadio">No
						<input type="radio" checked="checked" name="radio">
						<span class="checkmarkRadio"></span>
					</label>
				</div>
			</div>
			<div class="col-md-12">
				<h5>With activated instant booking, renters can book your vehicle directly and bindingly. Your calendar and delivery times must be kept up to date at all times.</h5>
			</div>
			<div class="col-md-12" style="padding-top: 12px;">

					<strong>Parking space</strong>
				<div class="col-md-12" style="padding-top: 12px;">
					<div class="checkboxes in-row margin-bottom-20">
						<input id="check-a" type="checkbox" name="check">
						<label for="check-a">Parking space for hirer available for duration of rental</label>
					</div>
				</div>
			</div>
			<div class="col-md-12">
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
					<h5>Please note that the additional rental conditions must not conflict with MyCamper's terms and conditions.</h5>
				</div>

			<div class="row" >
				<div class="col-md-12" style="padding-top: 20px;">
				<div style="float: right;">
				<a href="" class="button">{{trans('front.apply')}} <i class="fa fa-check-circle"></i></a>
				<a href="{{route('accessories')}}" class="button border">{{trans('front.cancel')}}</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
