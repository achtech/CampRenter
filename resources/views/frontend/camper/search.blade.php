
@extends('frontend.layout.layout',['activePage' => 'camperSearch', 'footerPage' => 'false'])
@section('content')
<!-- Content ================================================== -->
<div class="fs-container">

	<div class="fs-inner-container content fs-container-padding" >
		<div class="fs-content">

		@include('frontend.camper.filter');

		<section class="listings-container margin-top-30">
			<!-- Sorting / Layout Switcher -->
			<div class="row fs-switcher">

				<div class="col-md-6">
					<!-- Showing Results -->
					<p class="showing-results">{{isset($campers) ? count($campers) : 0}} Results Found </p>
				</div>

			</div>


			<!-- Listings -->
			<div class="row fs-listings">
				@foreach($campers as $camper)
				<!-- Listing Item -->
				<div class="col-lg-6 col-md-12">
					<a href="{{route('frontend.camper.detail',$camper->id)}}" class="listing-item-container" data-marker-id="{{$camper->id}}">
						<div class="listing-item">
							<img src="{{asset('images/listing-item-01.jpg')}}" alt="">
							@if($camper->availability==0)
								<div class="listing-badge now-close">Blocked</div>
							@elseif($camper->availability==1)
								<div class="listing-badge now-closed">Reserved</div>
							@else
								<div class="listing-badge now-open">Available</div>
							@endif
							<div class="listing-item-content">
								<span class="tag">{{App\Http\Controllers\Controller::getLabel("camper_categories", $camper->id_camper_categories)}}</span>
								<h3>{{$camper->camper_name}} <i class="verified-icon"></i></h3>
								<span>{{Illuminate\Support\Str::limit($camper->description_camper, 80)}}...</span>
							</div>
							<span class="like-icon"></span>
						</div>
						<div class="star-rating" data-rating="{{App\Http\Controllers\frontend\FC_reviewController::rateCamper($camper->id)}}">
							<div class="rating-counter">({{App\Http\Controllers\frontend\FC_reviewController::reviewCamperCount($camper->id)}} reviews)</div>
						</div>
					</a>
				</div>
				<!-- Listing Item / End -->
				@endforeach
			</div>
			<!-- Listings Container / End -->


		</section>

		</div>
	</div>
	<div class="fs-inner-container map-fixed">
		<!-- Map -->
		<div id="map-container">
			<div id="map" class="markers-on-the-map"></div>

				<input style="display: none" type="text" name="position_x" id="currentLatitude">
				<input style="display: none" type="text" name="position_y" id="currentLongitude">
		</div>

	</div>

</div>
@endsection
