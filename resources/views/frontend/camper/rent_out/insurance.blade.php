
@extends('frontend.layout.layout_panel',['activePage'=>'insurance_front'])

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
{{ Breadcrumbs::render('rentOut') }}
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- sub_menu -->
		@include('frontend.camper.rent_out.sub_menu', ['active_page' => 'insurance_front'])

		<div class="col-lg-7 col-md-12">
			<h3><strong>Insurance</strong></h3>
			<div class="payment-tab-trigger">
				<input id="vehicleowner" name="cardType" type="radio" value="">
				<label for="vehicleowner"><strong>Comprehensive cover of the vehicle owner</strong></label>
				<p>Select this option if your insurance includes comprehensive cover.</p>
			</div>
			<div class="payment-tab-trigger">
				<input id="noinsurance" name="cardType" type="radio" value="">
				<label for="noinsurance"><strong>No insurance</strong></label>
				<p>Don't you have insurance, which also applies to rentals? You are welcome to get in touch with us. Together we will certainly find a solution.</p>
			</div>
			<div class="checkboxes in-row margin-bottom-20">
				<input id="check-a" type="checkbox" name="check">
				<label for="check-a">Roadside assistance included and also covering rent out of camper. </label>
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
