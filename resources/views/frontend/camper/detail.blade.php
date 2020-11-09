
@extends('frontend.layout.layout',['activePage' => 'camper','footerPage' => 'true'])

@section('content')
<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">
		<div class="col-lg-8 col-md-8 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2>{{$camper->camper_name}}<span class="listing-tag">{{App\Http\Controllers\Controller::getLabel('camper_categories',$category->id)}}</span></h2>
					<span>
						<a href="#listing-location" class="listing-address">
							<i class="fa fa-money"></i>
							Price per day : {{$camper->price_per_day}}
						</a>
					</span>
					<div class="star-rating" data-rating="{{$rateCamper}}">
						<div class="rating-counter"><a href="#listing-reviews">({{count($reviews)}} reviews)</a></div>
					</div>
				</div>
			</div>

			<!-- Listing Nav -->
			<div id="listing-nav" class="listing-nav-container">
				<ul class="listing-nav">
					<li><a href="#listing-overview" class="active">Overview</a></li>
					<li><a href="#listing-gallery">Gallery</a></li>
					<li><a href="#listing-location">Location</a></li>
					<li><a href="#listing-reviews">Reviews</a></li>
					<li><a href="#add-review">Add Review</a></li>
				</ul>
			</div>
			
			<!-- Overview -->
			<div id="listing-overview" class="listing-section">				
			@include('frontend.camper.detail.overview')
			</div>


			<!-- Slider -->
			<div id="listing-gallery" class="listing-section">
			@include('frontend.camper.detail.gallery')
			</div>

			<!-- Location -->
			<div id="listing-location" class="listing-section">
			@include('frontend.camper.detail.location')
			</div>
				
			<!-- Reviews -->
			<div id="listing-reviews" class="listing-section">
				@include('frontend.camper.detail.reviews')
			</div>


			<!-- Add Review Box -->
			<div id="add-review" class="add-review-box">
				@include('frontend.camper.detail.add_review')					
			</div>
			<!-- Add Review Box / End -->


		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-75 sticky">
			@include('frontend.camper.detail.sidebar')	
		</div>
		<!-- Sidebar / End -->

	</div>
</div>

@endsection

