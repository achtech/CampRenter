
@extends('frontend.layout2',['activePage'=>'accessories'])

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
			<h3><strong>Accessories</strong></h3>
			<div class="row">
				<p>Here you can add bookable extras. If you want to offer interior cleaning, activate the field by checking the box in front of the field. CHF 150 is a recommended price and can be adjusted individually. Please don't add any extra service fees or handover fees but include them in your rental price.</p>
				<div class="col-md-12">
					<table id="pricing-list-container">
						<tr class="pricing-list-item pattern">
							<td>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
								</div>
								<div class="fm-input pricing-name"><input type="text" placeholder="Paid accessories" /></div>
								<div class="fm-input pricing-ingredients"><input type="text" placeholder="Booking per" /></div>
								<div class="fm-input pricing-price"><input type="text" placeholder="Price" data-unit="CHF" /></div>
								<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
							</td>
						</tr>
					</table>
					<a href="#" class="button add-pricing-list-item">Add Item</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
				<div style="float: right;">
					<a href="{{route('description')}}" class="button">{{trans('front.apply')}} <i class="fa fa-check-circle"></i></a>
					<a href="{{route('equipment')}}" class="button border">{{trans('front.cancel')}}</a>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection
