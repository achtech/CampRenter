
@extends('frontend.layout.layout_panel',['activePage'=>'accessories'])

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
{{ Breadcrumbs::render('rentOut') }}
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- sub_menu -->
		@include('frontend.camper.rent_out.sub_menu', ['active_page' => 'accessories'])

		<div class="col-lg-7 col-md-12">
			<h3><strong>Accessories</strong></h3>
			<div class="row">
				<p>{{trans('front.accessories_header_text')}}</p>
				<div class="col-md-12">
					<table id="pricing-list-container">
						<tr class="pricing-list-item pattern">
							<td>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
								</div>
								<div class="fm-input pricing-name"><input type="text" placeholder="{{trans('front.paid_accessories')}}" /></div>
								<div class="fm-input pricing-ingredients"><input type="text" placeholder="{{trans('front.booking_per')}}" /></div>
								<div class="fm-input pricing-price"><input type="text" placeholder="{{trans('front.price')}}" data-unit="CHF" /></div>
								<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
							</td>
						</tr>
					</table>
					<a href="#" class="button add-pricing-list-item">{{trans('front.add_item')}}</a>
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
