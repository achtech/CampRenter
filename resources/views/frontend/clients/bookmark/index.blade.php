@extends('frontend.layout.layout_panel',['activePage'=>'FC_bookmark'])
@section('content')
	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>{{trans('front.favoris')}}</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Bookmarks</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">

			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>{{trans('front.bookmarked.listings')}}</h4>
					<ul>
					@if($datas != null)
						@foreach($datas as $data)
						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img">
									<img src="{{asset('images')}}/campers/{{$data->image}}" alt="">
								</div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3>{{$data->name}}</h3>
										<span>{{Illuminate\Support\Str::limit($data->description, 120)}}...</span>
										<div class="star-rating" data-rating="{{App\Http\Controllers\frontend\FC_reviewController::rateCamper($data->id_campers)}}">
											<div class="rating-counter">({{App\Http\Controllers\frontend\FC_reviewController::reviewCamperCount($data->id_campers)}} {{trans('front.menu_panel_review')}})</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								<a href="{{ route('frontend.camper.detail',$data->id_campers)}}" class="button gray"><i class="fas fa-list-ul"></i> {{trans('front.details')}}</a>
								<a href="{{ route('frontend.bookmark.delete', $data->id) }}" class="button gray"><i class="far fa-times-circle"></i> {{trans('front.client_camper_delete')}}</a>
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
