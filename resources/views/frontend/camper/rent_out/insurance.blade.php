
@extends('frontend.layout.layout_panel',['activePage'=>'insurance_front'])

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
		@include('frontend.camper.rent_out.sub_menu', ['active_page' => 'insurance_front'])
		<form  action="{{route('frontend.camper.storeRental_terms')}}" method="POST">
			@csrf
			<div class="col-lg-7 col-md-12">
				<h3><strong>{{trans('front.insurance')}}</strong></h3>
				<div class="payment-tab-trigger">
					<input id="vehicleowner" name="cardType" type="radio" value="" onclick="show1();">
					<label for="vehicleowner"><strong>{{trans('front.comprehensive_cover')}}</strong></label>
					<p>{{trans('front.comprehensive_cover_info')}}</p>
				</div>
				<div class="payment-tab-trigger">
					<input id="noinsurance" name="cardType" type="radio" value="" onclick="show2();">
					<label for="noinsurance"><strong>{{trans('front.no_insurance')}}</strong></label>
					<p>{{trans('front.no_insurance_info')}}</p>
				</div>
				<div id="div1" class="payment-tab-trigger" style="display: none;">
					<div class="row">
						<div class="col-md-6">
							<div class="card-label">
								<label for="allowed_total_weight">{{trans('front.allowed_tons')}}</label>
								<input disabled type="text" name="allowed_total_weight" value="{{$camper->allowed_total_weight}}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="card-label">
								<label for="price_per_day">Price/day</label>
								<input disabled type="text" name="price_per_day" value="{{$price_per_day}}€">
							</div>
						</div>
					</div>
				</div>

				<div class="row" style="margin-top: 4%;">
					<div class="col-md-12">
					<div style="float: right;">
						<button type="submit" class="button">{{trans('front.apply')}} <i class="fa fa-check-circle"></i></a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<script>
function show1(){
  document.getElementById('div1').style.display ='none';
}
function show2(){
  document.getElementById('div1').style.display = 'block';
}
</script>
@endsection
