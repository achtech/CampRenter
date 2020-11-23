@extends('frontend.layout.layout_panel',['activePage'=>'FC_camper'])
@section('content')
<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>{{trans('front.my_campers')}}</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>My Campers</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">

			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>{{trans('front.list_campers')}}</h4>
					<ul>
					@if($campers != null)
						@foreach($campers as $camper)
						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="{{asset('images/listing-item-01.jpg')}}" alt=""></a></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3><a href="#">{{$camper->camper_name}}</a></h3>
										<span>{{Illuminate\Support\Str::limit($camper->description_camper, 120)}}...</span>
										<div class="star-rating" data-rating="{{App\Http\Controllers\frontend\FC_reviewController::rateCamper($camper->id)}}">
											<div class="rating-counter">({{App\Http\Controllers\frontend\FC_reviewController::reviewCamperCount($camper->id)}} {{trans('front.menu_panel_review')}})</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								<a href="#" class="button gray"><i class="fas fa-list-ul"></i> {{trans('front.client_camper_detail')}}</a>
								<a href="#" class="button gray"><i class="far fa-edit"></i> {{trans('front.client_camper_edit')}}</a>
								<a href="#" class="button gray"><i class="far fa-times-circle"></i> {{trans('front.client_camper_delete')}}</a>
							</div>
						</li>
						@endforeach
					@else
						<p>{{trans('front.no_results')}}</p>
					@endif
					</ul>
				</div>
			</div>
			<!-- Copyrights -->
			@include('frontend.layout.footer_panel')
		</div>

	</div>
	<!-- Content / End -->
@endsection
