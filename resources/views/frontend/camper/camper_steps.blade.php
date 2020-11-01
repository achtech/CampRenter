
@extends('frontend.layout2',['activePage'=>'campersteps'])

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

			<div class="margin-top-0">
				<div class="steps">
					<div class="step">
						<div class="step-header">
							<div class="header"><h3>Step 1 - Fill in details about your vehicle</h3></div>
							<div class="subheader">Advice: Some of the required information can be found in the driver's licence or in the car's manual</div>
						</div>
						<div class="step-content one">
							<a href="{{route('fill_in_vehicle')}}" class="next-btn">Fill in</a>
						</div>
					</div>
					<div class="step minimized">
						<div class="step-header">
							<div class="header"><h3>Step 2 - Present your vehicle in the best way</h3></div>
							<div class="subheader">Now you're photo skills are required
								Advice: Upload many pictures of your vehicle. We recommend to upload at least 10 high quality pictures.
							</div>
						</div>
						<div class="step-content two">
							<a class="next-btn">Upload</a>
						</div>
					</div>
					<div class="step minimized">
						<div class="step-header">
							<div class="header"><h3>Step 3 - Determine the price and the rental terms</h3></div>
							<div class="subheader">Advice: The price is the most important factor in determining how many booking requests you'll receive
							</div>
						</div>
						<div class="step-content two">
							<a class="next-btn">Fill in</a>
						</div>
					</div>
					<div class="step minimized">
						<div class="step-header">
							<div class="header"><h3>Let's go - rent out your vehicle</h3></div>
							<div class="subheader">When the profile is completed you can publish it. We'll also quickly check it from our side to make sure everything is fine.</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	:root {
  --background-color: #FFFFFF;
  --primary-color: #E66A53;
}

*{
  box-sizing: border-box;
}

body {
  margin: 0;
  height: 100%;
  width: 100vw;
  background-color: rgba(0, 0, 0, 0.08);
  font-family: Arial;
  display: flex;
}

.steps {
  width: 100%;
  box-shadow: 0px 10px 15px -5px rgba(0, 0, 0, 0.3);
  background-color: #FFF;
  padding: 24px 0;
  position: relative;
  margin: auto;
}

.steps::before {
  content: '';
  position: absolute;
  top: 0;
  height: 24px;
  width: 1px;
  background-color: rgba(0, 0, 0, 0.2);
  left: calc(50px / 2);
  z-index: 1;
}

.steps::after {
  content: '';
  position: absolute;
  height: 13px;
  width: 13px;
  background-color: var(--primary-color);
  box-shadow: 0px 0px 5px 0px var(--primary-color);
  border-radius: 15px;
  left: calc(50px / 2);
  bottom: 24px;
  transform: translateX(-45%);
  z-index: 2;
}

.step {
  padding: 0 20px 24px 50px;
  position: relative;
  transition: all 0.4s ease-in-out;
  background-color: #FFF;
}

.step::before {
  content: '';
  position: absolute;
  height: 13px;
  width: 13px;
  background-color: rgb(198, 198, 198);
  border-radius: 15px;
  left: calc(50px / 2);
  transform: translateX(-45%);
  z-index: 2;
}

.step::after {
  content: '';
  position: absolute;
  height: 100%;
  width: 1px;
  background-color: rgb(198, 198, 198);
  left: calc(50px / 2);
  top: 0;
  z-index: 1;
}

.step.minimized {
  background-color: #FFF;
  transition: background-color 0.3s ease-in-out;
  cursor: pointer;
}

.header {
  user-select: none;
  font-size: 16px;
  color: rgba(0, 0, 0, 0.6);
}

.subheader {
  user-select: none;
  font-size: 14px;
  color: rgba(0, 0, 0, 0.4);
}

.step-content {
  transition: all 0.3s ease-in-out;
  overflow: hidden;
  position: relative;
}

.step.minimized > .step-content {
  height: 0px;
}

.step-content.one {
  height: 146px;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.05);
  border-radius: 4px;
  margin-top: 10px;
}

.step-content.two {
  height: 146px;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.05);
  border-radius: 4px;
  margin-top: 10px;
}

.step-content.three {
  height: 146px;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.05);
  border-radius: 4px;
  margin-top: 10px;
}

.next-btn {
  position: absolute;
  top: 50%;
  left: 50%;
  border: 0;
  padding: 10px 20px;
  border-radius: 4px;
  background-color: #39b7cd;
  box-shadow: 0 5px 10px -3px rgba(0, 0, 0, 0.3);
  color: #FFF;
  transition: background-color 0.3s ease-in-out;
  cursor: pointer;
  transform: translate(-50%, -50%);
}

.close-btn {
  position: absolute;
  top: 50%;
  left: 50%;
  border: 0;
  padding: 10px 20px;
  border-radius: 4px;
  background-color: rgb(255, 0, 255);
  box-shadow: 0 5px 10px -3px rgba(0, 0, 0, 0.3);
  color: #FFF;
  transition: background-color 0.3s ease-in-out;
  cursor: pointer;
  transform: translate(-50%, -50%);
}

/* Irrelevant styling things */
.close-btn:hover {
  background-color: rgba(255, 0, 255, 0.6);
}

.close-btn:focus {
  outline: 0;
}

.next-btn:hover {
  background-color: rgba(255, 0, 0, 0.6);
}

.next-btn:focus {
  outline: 0;
}

.step.minimized:hover {
  background-color: rgba(0, 0, 0, 0.06);
}
</style>


@endsection
