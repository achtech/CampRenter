
@extends('frontend.layout.layout_panel',['activePage'=>'insurance_front'])

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
		@include('frontend.camper.rent_out.sub_menu', ['active_page' => 'insurance_front'])

		<div class="col-lg-7 col-md-12">
			<h3><strong>{{trans('front.insurance')}}</strong></h3>
			<div class="payment-tab-trigger">
				<input id="vehicleowner" name="cardType" type="radio" value="">
				<label for="vehicleowner"><strong>{{trans('front.comprehensive_cover')}}</strong></label>
				<p>{{trans('front.comprehensive_cover_info')}}</p>
			</div>
			<div class="payment-tab-trigger">
				<input id="noinsurance" name="cardType" type="radio" value="">
				<label for="noinsurance"><strong>{{trans('front.no_insurance')}}</strong></label>
				<p>{{trans('front.no_insurance_info')}}</p>
			</div>
			<div class="checkboxes in-row margin-bottom-20">
				<input id="check-a" type="checkbox" name="check">
				<label for="check-a"> {{trans('front.roadside_assistance')}}</label>
			</div>

			<div class="row">
				<div class="col-md-12">
				<div style="float: right;">
				<a href="{{route('rental_terms')}}" class="button">{{trans('front.apply')}} <i class="fa fa-check-circle"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
