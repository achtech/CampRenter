
@extends('frontend.layout.layout_panel',['activePage'=>'campersteps','footerPage' => 'true'])

@section('content')
<!-- Content
================================================== -->

<div class="dashboard-content">
	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2><strong>{{trans('front.camper_name')}</strong></h2>
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
		@include('frontend.camper.rent_out.sub_menu',['active_page'=>'campersteps'])

		<div class="col-lg-7 col-md-12">

			<div class="margin-top-0">
				<div class="steps">
					<div class="step">
						<div class="step-header">
							<div class="header"><h3>{{trans('front.step')} 1 - {{trans('front.step_1_title')}</h3></div>
							<div class="subheader">Advice: Some of the required information can be found in the driver's licence or in the car's manual</div>
						</div>
						<div class="step-content one">
							<a href="{{route('frontend.camper.fillInVehicle')}}" class="next-btn">{{trans('front.fill_in')}</a>
						</div>
					</div>
					<div class="step minimized">
						<div class="step-header">
							<div class="header"><h3>{{trans('front.step')} 2 - {{trans('front.step_2_title')}</h3></div>
							<div class="subheader">Now you're photo skills are required
								Advice: Upload many pictures of your vehicle. We recommend to upload at least 10 high quality pictures.
							</div>
						</div>
						<div class="step-content two">
							<a class="next-btn">{{trans('front.upload')}</a>
						</div>
					</div>
					<div class="step minimized">
						<div class="step-header">
							<div class="header"><h3>{{trans('front.step')} 3 - {{trans('front.step_3_title')}</h3></div>
							<div class="subheader">Advice: The price is the most important factor in determining how many booking requests you'll receive
							</div>
						</div>
						<div class="step-content two">
							<a class="next-btn">{{trans('front.fill_in')}</a>
						</div>
					</div>
					<div class="step minimized">
						<div class="step-header">
							<div class="header"><h3>{{trans('front.lets_go')} - {{trans('front.rent_out_vehicle')}</h3></div>
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
