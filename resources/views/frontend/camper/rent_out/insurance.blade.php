
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
			<input type="hidden" name="id_campers" value="{{$camper->id}}" />
			<div class="col-lg-7 col-md-12">
				<h3><strong>{{trans('front.insurance')}}</strong></h3>
				<div class="payment-tab-trigger">
					<input id="vehicleowner" name="has_insurance" type="radio" value="0" onclick="show1();">
					<label for="vehicleowner"><strong>{{trans('front.comprehensive_cover')}}</strong></label>
					<p>{{trans('front.comprehensive_cover_info')}}</p>
				</div>
				<div class="payment-tab-trigger">
					<input id="noinsurance" name="has_insurance" type="radio" value="1" onclick="show2();">
					<label for="noinsurance"><strong>{{trans('front.our_proposition')}}</strong></label>
					<p>{{trans('front.no_insurance_info')}}</p>
				</div>
				<div id="div1" class="payment-tab-trigger" style="display: none; margin-top: 5%;">
					<div class="row">
						<div class="col-md-6">
							<p style="margin-bottom: 0px;"><strong>{{trans('front.allowed_tons')}} : </strong>{{$camper->allowed_total_weight}}</p>
							<p><strong>Price Insurance/day : </strong>{{$camper->insurance_price}}€</p>
							<input type="hidden" name="insurance_price" value="{{$camper->insurance_price}}" />
						</div>
					</div>
				</div>

				<div class="row" style="margin-top: 4%;">
					<div class="col-md-12">
					<div style="float: right;">
						{{Form::submit(trans('front.apply'),['style' => 'width:200px','class'=>'button border','name' => 'action'])}}
						{{Form::submit(trans('front.cancel'),['onclick'=>'window.history.go(-1); return false;', 'style' => 'width:200px','class'=>'button border','name' => 'action'])}}
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
