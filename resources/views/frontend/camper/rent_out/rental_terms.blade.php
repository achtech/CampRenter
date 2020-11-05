
@extends('frontend.layout2',['activePage'=>'rental_terms'])

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
			<div class="col-md-12">
				<div class="col-md-6">
					<div class="col-md-12">
						<strong>Animals allowed</strong>
					</div>
					<div class="col-md-6">
						<label class="container">Yes
							<input type="radio" checked="checked" name="radio">
							<span class="checkmark"></span>
						</label>
						<label class="container">No
							<input type="radio" checked="checked" name="radio">
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="col-md-4">
						<label class="container">By-Agreement
							<input type="radio" checked="checked" name="radio">
							<span class="checkmark"></span>
						</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="col-md-12">
						<strong>Animals allowed</strong>
					</div>
					<div class="col-md-4">
						<label class="container">Yes
							<input type="radio" checked="checked" name="radio">
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="col-md-4">
						<label class="container">No
							<input type="radio" checked="checked" name="radio">
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="col-md-4">

					</div>
				</div>
			</div>
			<div class="col-md-12">
				<strong>Kilometres included per night</strong>
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
			<div class="col-md-6">
				<div class="col-md-12">
					<strong>Instant booking</strong>
				</div>
				<div class="col-md-4">
					<label class="container">Yes
						<input type="radio" checked="checked" name="radio">
						<span class="checkmark"></span>
					</label>
				</div>
				<div class="col-md-4">
					<label class="container">No
						<input type="radio" checked="checked" name="radio">
						<span class="checkmark"></span>
					</label>
				</div>
				<div class="col-md-4">

				</div>
			</div>
			<div class="col-md-12">
				<h5>With activated instant booking, renters can book your vehicle directly and bindingly. Your calendar and delivery times must be kept up to date at all times.</h5>
			</div>
			<div class="col-md-6">
				<div class="col-md-12">
					<strong>Parking space</strong>
				</div>
				<div class="col-md-12">
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

			<div class="row">
				<div class="col-md-12">
				<div style="float: right;">
				<a href="" class="button">{{trans('front.apply')}} <i class="fa fa-check-circle"></i></a>
				<a href="{{route('accessories')}}" class="button border">{{trans('front.cancel')}}</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!DOCTYPE html>
<html>
<style>
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size:18px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  width:50px;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
</style>
@endsection
