
@extends('frontend.layout.layout',['activePage' => 'owner_detail','footerPage' => 'true'])

@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="user-profile-titlebar">
					<div class="user-profile-avatar"><img src="{{asset('/images')}}/clients/{{$owner_photo}}" alt=""></div>
					<div class="user-profile-name">
						<h2>{{$owner->client_name}} {{$owner->client_last_name}}</h2>
						<div class="star-rating" data-rating="5">
							<div class="rating-counter"><a href="#listing-reviews">(60 reviews)</a></div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>



<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">



		<!-- Content
		================================================== -->
		<div class="col-lg-12 col-md-12 padding-left-30">

			<h3 class="margin-top-0 margin-bottom-40 margin-top-30">{{$owner->client_name}} Listings</h3>

			<!-- Listings Container -->
			<div class="row">

				<!-- Listing Item -->
				@if (!empty($campers_owner))
				@foreach($campers_owner as $camper)
				<div class="col-lg-8 col-md-12">
					<div class="listing-item-container list-layout">
						<a href="{{route('frontend.camper.detail',$camper->id)}}" class="listing-item">
							<!-- Image -->
							<div class="listing-item-image">
								<img src="{{asset('images')}}/camper/{{$camper->image}}" alt="">
								<span class="tag">{{App\Http\Controllers\Controller::getLabel("camper_categories", $camper->id_camper_categories)}}</span>
							</div>

							<!-- Content -->
							<div class="listing-item-content">
								@if($camper->availability==0)
									<div class="listing-badge now-close">{{trans('front.blocked')}}</div>
								@elseif($camper->availability==1)
									<div class="listing-badge now-closed">{{trans('front.reserved')}}</div>
								@else
									<div class="listing-badge now-open">{{trans('front.available')}}</div>
								@endif

								<div class="listing-item-inner">
									<h3>{{$camper->camper_name}}</h3>
									<span>{{$camper->city}}, {{$camper->country}}</span>
									<div class="star-rating" data-rating="{{App\Http\Controllers\frontend\FC_reviewController::rateCamper($camper->id)}}">
										<div class="rating-counter">({{App\Http\Controllers\frontend\FC_reviewController::reviewCamperCount($camper->id)}} reviews)</div>
									</div>
								</div>

								<div id="book_fav">
									@if(!session('_client'))
										<span onclick="event.preventDefault();" class="like-icon"></span>
									@else
										<span onclick="event.preventDefault(); AddOrRemoveBookmarkSearch({{$camper->id}})"
											class="like-icon {{App\Http\Controllers\frontend\FC_bookmarkController::isBookmarked($camper->id)>0 ? 'liked' : ''}}">
										</span>
									@endif
								</div>
							</div>
						</a>
					</div>
				</div>
				@endforeach
				@endif
				<!-- Listing Item / End -->

				<div class="col-md-12 browse-all-user-listings">
					<a href="#">Browse All Listings <i class="fa fa-angle-right"></i> </a>
				</div>

			</div>
			<!-- Listings Container / End -->


			<!-- Reviews -->
			<div id="listing-reviews" class="listing-section">
				<h3 class="margin-top-60 margin-bottom-20">Reviews</h3>

				<div class="clearfix"></div>

				<!-- Reviews -->
				<section class="comments listing-reviews">

					<ul>
					@if($reviews_client != null)
					@foreach($reviews_client as $review)
						<li>
							<div class="avatar"><img src="{{asset('/images/avatar/default.jpg')}}" alt="" /></div>
							<div class="comment-content"><div class="arrow-comment"></div>
								<div class="comment-by">{{$review->name}} <span class="date">{{date('j F Y', strtotime($review->created_at))}}</span>
									<div class="star-rating" data-rating="{{number_format(($review->rate_service+$review->rate_managing+$review->rate_cleanliness)/3),1}}"></div>
								</div>
								<p>{{$review->comment}}</p>
								<a href="{{route('frontend.clients.review.helpfulReview',$review->id)}}" class="rate-review"><i class="far fa-thumbs-up"></i> {{trans('front.helpful_review')}} <span>{{$review->helpfulReview}}</span></a>
							</div>
						</li>
					@endforeach
					@else
						<li>
							<p class="margin-bottom-20">{{trans('front.no_results')}}</p>
						</li>
					@endif
					 </ul>
				</section>

				<!-- Pagination -->
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<!-- Pagination
						<div class="pagination-container margin-top-30">
							<nav class="pagination">
								<ul>
									<li><a href="#" class="current-page">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				Pagination / End -->
			</div>


		</div>

	</div>
</div>

<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

	function AddOrRemoveBookmarkSearch(camper_id) {
		$.ajax({
                url: '/ajax/addBookmarks',
                type: 'post',
                data: {_token: CSRF_TOKEN,camperid: camper_id},
                success: function(response){
					$('#book_fav').load(location.href+(' #book_fav'));
                }
            });
	};

</script>
@endsection
