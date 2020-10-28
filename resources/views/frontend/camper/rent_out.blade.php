
@extends('frontend.layout2',['activePage'=>'rent_out'])

@section('content')
<!-- Content
================================================== -->

<div class="dashboard-content">
	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2>{{trans('front.create_camper')}}</h2>
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
		<div class="col-lg-12">
			<div id="add-listing">

				<!-- Section -->
				<div class="add-listing-section">

					<!-- Headline -->
					<div class="col-md-12">
						<div class="row">
							<div class="add-listing-headline">
								<h3>1. {{trans('front.witch_camper_type')}}</h3>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							@foreach($categories as $category)
								<!-- Box -->
								<div class="col-md-3 alternative-imagebox">
									<a href="listings-list-with-sidebar.html" >
									<img src="{{asset('images')}}/camper_categories/{{$category->image}}" alt="">
										<h4>{{App\Http\Controllers\Controller::getLabelFromObject($category)}}</h4>

									</a>
								</div>
							@endforeach
						</div>
					</div>


					<!-- Headline -->
					<div class="col-md-12">
						<div class="row">
							<div class="add-listing-headline" style="margin-top: 65px;">
								<h3>2. {{trans('front.give_name')}}</h3>
							</div>
						</div>
					</div>

					<!-- Title -->
					<div class="col-md-12">
						<div class="row">
								<div class="col-md-12">
									<input type="text" placeholder="My sweet Camper">
									<h6>{{trans('front.still_can_change')}}</h6>
								</div>
						</div>
					</div>
					<!-- Title -->
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-12">
								<input type="text" placeholder="e.g. 964 School Street">
								<h6>{{trans('front.recommandation')}}</h6>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
						<div style="float: right;">
							<a href="/rentoutdetails" class="button">{{trans('front.apply')}} <i class="fa fa-check-circle"></i></a>
							<a href="{{route('frontend.camper')}}" class="button border">{{trans('front.cancel')}}</a>
						</div>
					</div>
				</div>
				<!-- Section / End -->
			</div>
		</div>
	</div>
</div>
@endsection
