
@extends('frontend.layout.layout_panel',['activePage'=>'conditions'])

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
		@include('frontend.camper.rent_out.sub_menu', ['active_page' => 'conditions'])

		<div class="col-lg-7 col-md-12">
			<h3><strong>{{trans('front.terms')}</strong></h3>
			<div class="col-md-12">
				<h4><strong>1. {{trans('front.minimal_rental_duration_prices')}</strong></h4>
			</div>
			<div class="col-md-12" style="margin-top:20px;">
				<p><strong>{{trans('front.main_season')}:</strong>Jul. - Aug.</p>
			</div>
			<div class="col-md-12">
				<div class="col-md-7">
					<h5>{{trans('front.minimal_rental_duration')}</h5>
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
			<div class="col-md-12" style="margin-top:10px;">
				<div class="col-md-7" >
					<input type="text" placeholder="{{trans('front.price_per_night')}">
				</div>
			</div>

			<div class="col-md-12" style="margin-top:20px;">
				<p><strong>{{trans('front.off_season')}:</strong>May - Jun. / Sep. - Oct.</p>
			</div>
			<div class="col-md-12">
				<div class="col-md-7">
					<h5>{{trans('front.minimal_rental_duration')}</h5>
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
			<div class="col-md-12" style="margin-top:10px;">
				<div class="col-md-7">
					<input type="text" placeholder="{{trans('front.price_per_night')}">
				</div>
			</div>

			<div class="col-md-12" style="margin-top:20px;">
				<p><strong>{{trans('front.winter_season')}:</strong>Nov. - Apr.</p>
			</div>
			<div class="col-md-12">
				<div class="col-md-7">
					<h5>{{trans('front.minimal_rental_duration')}</h5>
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
			<div class="col-md-12" style="margin-top:10px;">
				<div class="col-md-7">
					<input type="text" placeholder="{{trans('front.price_per_night')}">
				</div>
			</div>
			<div class="col-md-12" style="margin-top:20px;">
				<h4><strong>1. {{trans('front.set_discounts')}</strong></h4>
			</div>
			<div class="col-md-12" style="margin-top:20px;">
				<div class="col-md-3">
					<label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
				</div>
				<div class="col-md-5">
					<p><strong>Last-minute discount</strong></p>
					<p style="font-size: 15px;line-height: 26px;">For bookings on short notice maximum 7 days before start of rental</p>
				</div>
				<div class="col-md-4">
					<p><strong>Last-minute discount</strong></p>
				</div>

			</div>
			<div class="col-md-12">
				<div class="col-md-3">
					<label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
				</div>
				<div class="col-md-5">
					<p><strong>Long-trip discount</strong></p>
					<p style="font-size: 15px;line-height: 26px;">For bookings of 14 nights or more</p>
				</div>
				<div class="col-md-4">
					<p><strong>Long-trip discount</strong></p>
				</div>

			</div>
			<div class="row">
				<div class="col-md-12">
				<div style="float: right;">
				<a href="{{route('calendar')}}" class="button">{{trans('front.apply')}} <i class="fa fa-check-circle"></i></a>
				<a href="{{route('accessories')}}" class="button border">{{trans('front.cancel')}}</a>
				</div>
			</div>
		</div>
		<!-- Copyrights -->
		@include('frontend.layout.footer_panel')
	</div>
</div>
@endsection
