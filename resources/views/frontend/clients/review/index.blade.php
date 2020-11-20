@extends('frontend.layout.layout_panel',['activePage'=>'FC_review'])
@section('content')
	<!-- Content
	================================================== -->
	<div class="dashboard-content">
		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>{{trans('front.menu_panel_review')}}</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Reviews</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">

			<!-- Listings -->
			<div class="col-lg-6 col-md-12">

				<div class="dashboard-list-box margin-top-0">

					<h4>{{trans('front.visitor_reviews')}}</h4>

					<!-- Reply to review popup -->
					<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
						<div class="small-dialog-header">
							<h3>{{trans('front.reply_review')}}</h3>
						</div>
						<div class="message-reply margin-top-0">
							<textarea cols="40" rows="3"></textarea>
							<button class="button">Reply</button>
						</div>
					</div>

					<ul>
					@if($datas != null)
						@foreach($datas as $data)
						<li>
							<div class="comments listing-reviews">
								<ul>
									<li>
										<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
										<div class="comment-content"><div class="arrow-comment"></div>
											<div class="comment-by">{{ $data->name}} {{ $data->last_name}}<div class="comment-by-listing">on <a href="#">{{$data->camper_name}}</a></div> <span class="date">{{$data->created_at}}</span>
												<div class="star-rating" data-rating="5"></div>
											</div>
											<p>{{$data->comment}}</p>

											<div class="review-images mfp-gallery-container">
												<a href="images/review-image-01.jpg" class="mfp-gallery"><img src="images/review-image-01.jpg" alt=""></a>
											</div>
											<a href="#small-dialog" class="rate-review popup-with-zoom-anim"><i class="fas fa-undo"></i> Reply to this review</a>
										</div>
									</li>
								</ul>
							</div>
						</li>
						@endforeach
						@else
						<li>
							<div class="comments listing-reviews">
								<ul>
									<li>
										<p>{{trans('front.no_results')}}</p>
									</li>
								</ul>
							</div>
						</li>
					@endif
					</ul>
				</div>

				<!-- Pagination -->
				<div class="clearfix"></div>
				<div class="pagination-container margin-top-30 margin-bottom-0">
					<nav class="pagination">
						<ul>
							<li><a href="#" class="current-page">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#"><i class="fas fa-chevron-right"></i></a></li>
						</ul>
					</nav>
				</div>
				<!-- Pagination / End -->

			</div>

			<!-- Listings -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>Your Reviews</h4>
					<ul>
					@if($own_reviews != null)
						@foreach($own_reviews as $own_review)
						<li>
							<div class="comments listing-reviews">
								<ul>
									<li>
										<div class="avatar"><img src="images/reviews-avatar.jpg" alt="" /> </div>
										<div class="comment-content"><div class="arrow-comment"></div>
											<div class="comment-by">Your review <div class="comment-by-listing own-comment">on <a href="#">{{ $own_review->last_name}}'s Camper</a></div> <span class="date">{{$own_review->created_at}}</span>
												<div class="star-rating" data-rating="4.5"></div>
											</div>
											<p>{{$own_review->comment}}</p>
											<a href="#" class="rate-review"><i class="far fa-edit"></i> Edit</a>
										</div>

									</li>
								</ul>
							</div>
						</li>
						@endforeach
						@else
						<li>
							<div class="comments listing-reviews">
								<ul>
									<li>
										<p>{{trans('front.no_results')}}</p>
									</li>
								</ul>
							</div>
						</li>
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
