
@extends('frontend.layout.layout',['activePage' => 'home','footerPage' => 'true'])
@section('banner')
@include('frontend.layout.slider')
@endsection
@section('content')
<!-- Content
================================================== -->

<!-- Fullwidth Section -->
<section class="fullwidth margin-top-65  padding-bottom-70" data-background-color="#fff">

	<div class="container">
		<div class="row">

			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-45">
					<strong class="headline-with-separator">{{trans('front.content_most_visited')}}</strong>
				</h3>
			</div>

			<div class="col-md-12">
				<div class="simple-slick-carousel dots-nav">
				<!-- Listing Item -->
				@foreach($campers as $camper)
					<div class="carousel-item">
						<a href="{{route('frontend.camper.detail',$camper->id)}}" class="listing-item-container">
							<div class="listing-item">
								<img src="{{asset('images')}}/campers/{{$camper->image}}" alt="">
								<div class="listing-item-content">
									<span class="tag">{{App\Http\Controllers\Controller::getLabel('camper_categories',$camper->id_camper_categories)}}</span>
									<h3>{{$camper->camper_name}} <i class="verified-icon"></i></h3>
									<span>{{$camper->description_camper}}</span>
								</div>
								<div class="star-rating" data-rating="{{App\Http\Controllers\frontend\FHomeController::getCamperRate($camper->id)}}">
								{{App\Http\Controllers\frontend\FHomeController::getCamperRate($camper->id)}}<div class="rating-counter">({{App\Http\Controllers\frontend\FHomeController::getReviewsCount($camper->id)}} {{__('front.Reviews')}})</div>
								</div>
							</div>
						</a>
					</div>
				@endforeach
			</div>

		</div>
	</div>

</section>

<div class="container">
	<div class="row">

		<div class="col-md-12">
			<h3 class="headline centered">
				<strong class="headline-with-separator">{{trans('front.title_categories')}}</strong>
			</h3>
		</div>

		<div class="col-md-12">
			<div class="row" style="max-width: 90%; margin-left:11%;">
				@if(count($categories)>0)
				@foreach($categories as $category)
					<!-- Box -->
					<div class="col-md-3 alternative-imagebox">
						<a href="{{route('frontend.camper.searchByCategory',$category->id)}}" >
							<img style="max-width:70%;" src="{{asset('images')}}/camper_categories/{{$category->image}}" alt="">
								<h4 style="margin-left:0px;">{{App\Http\Controllers\Controller::getLabelFromObject($category)}}</h4>
								<span style="left:20%;" class="blog-item-tag">{{App\Http\Controllers\frontend\FHomeController::getListings($category->id)}} Listings</span>
						</a>
					</div>
				@endforeach
				@endif
			</div>
		</div>
	</div>
</div>
<!-- Category Boxes / End -->
<!-- Info Section -->
<section class="fullwidth padding-bottom-70 margin-top-section" data-background-color="#fff">
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="headline centered headline-extra-spacing">
				<strong class="headline-with-separator">{{trans('front.content_user_review')}}</strong>
			</h3>
		</div>
	</div>

	<div class="row icons-container">
		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2 with-line">
				<i class="im im-icon-Map2"></i>
				<p>{{trans('front.content_text_find_place')}}</p>
			</div>
		</div>

		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2 with-line">
				<i class="im im-icon-Mail-withAtSign"></i>
				<p>{{trans('front.choose_data_request')}}</p>
			</div>
		</div>

		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2">
				<i class="im im-icon-Checked-User"></i>
				<p>{{trans('front.receive_request')}}</p>
			</div>
		</div>
	</div>
	<div class="col-md-12 centered-content">
		<a href="/camper/search" class="button border margin-top-10">{{trans('front.find_camper_now')}}</a>
	</div>
</div>
</section>
<!-- Info Section / End -->


<!-- Recent Blog Posts -->
<section class="fullwidth margin-top-0  padding-bottom-75" data-background-color="#fff">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-55">
					<strong class="headline-with-separator">{{trans('front.our_bloc')}}</strong>
				</h3>
			</div>
		</div>

		<div class="row">
			<!-- Blog Post Item -->
			@foreach($blogs as $blog)
			<div class="col-md-4">
				<a href="{{route('frontend.blog.fdetail',$blog->id)}}" class="blog-compact-item-container">
					<div class="blog-compact-item">
						<img src="{{asset('images')}}/blog/{{$blog->photo}}" alt="">
						<span class="blog-item-tag">Tips</span>
						<div class="blog-compact-item-content">
							<ul class="blog-post-tags">
								<li>{{date('j F Y', strtotime($blog->created_at))}}</li>
							</ul>
							<h3>{{$blog->title}}</h3>
							<p>{{ Illuminate\Support\Str::limit($blog->article, 80)}}</p>
						</div>
					</div>
				</a>
			</div>
			@endforeach

			<div class="col-md-12 centered-content">
				<a href="{{route('frontend.blog')}}" class="button border margin-top-10">{{trans('front.find_blog')}}</a>
			</div>

		</div>

	</div>
</section>
<!-- Recent Blog Posts / End -->
@endsection
