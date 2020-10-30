
@extends('frontend.layout3',['activePage' => 'blog'])

@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Blog</h2><span>Latest News</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Blog</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">

	<!-- Blog Posts -->
	<div class="blog-page">
	<div class="row">
	<div class="col-lg-9 col-md-8 padding-right-30">

<!-- Sorting / Layout Switcher -->
<div class="row margin-bottom-25">
	<div class="col-md-6 col-xs-6">
		<!-- Layout Switcher -->
		<div class="layout-switcher"></div>
	</div>

	<div class="col-md-6 col-xs-6">
		<!-- Sort by -->
		<div class="sort-by">
			<div class="sort-by-select">
				<select data-placeholder="Default order" class="chosen-select-no-single">
					<option>Default Order</option>
					<option>Highest Rated</option>
					<option>Most Reviewed</option>
					<option>Newest Listings</option>
					<option>Oldest Listings</option>
				</select>
			</div>
		</div>
	</div>
</div>
<!-- Sorting / Layout Switcher / End -->


<div class="row">

	<!-- Listing Item -->
	<div class="col-lg-12 col-md-12">
		<div class="listing-item-container list-layout">
			<a href="{{route('frontend.blog.detail')}}" class="listing-item">

				<!-- Image -->
				<div class="listing-item-image">
					<img src="{{asset('frontend/asset/images/listing-item-01.jpg')}}" alt="">
					<span class="tag">Eat & Drink</span>
				</div>

				<!-- Content -->
				<div class="listing-item-content">
					<div class="listing-badge now-open">Now Open</div>

					<div class="listing-item-inner">
						<h3>Tom's Restaurant <i class="verified-icon"></i></h3>
						<span>964 School Street, New York</span>
						<div class="star-rating" data-rating="3.5">
							<div class="rating-counter">(12 reviews)</div>
						</div>
					</div>
					<span class="like-icon"></span>
				</div>
			</a>
		</div>
	</div>
	<!-- Listing Item / End -->

	<!-- Listing Item -->
	<div class="col-lg-12 col-md-12">
		<div class="listing-item-container list-layout">
			<a href="{{route('frontend.blog.detail')}}" class="listing-item">

				<!-- Image -->
				<div class="listing-item-image">
					<img src="{{asset('frontend/asset/images/listing-item-02.jpg')}}" alt="">
					<span class="tag">Events</span>
				</div>

				<!-- Content -->
				<div class="listing-item-content">

					<div class="listing-item-inner">
					<h3>Sticky Band</h3>
					<span>Bishop Avenue, New York</span>
						<div class="star-rating" data-rating="5.0">
							<div class="rating-counter">(23 reviews)</div>
						</div>
					</div>

					<span class="like-icon"></span>

					<div class="listing-item-details">Friday, August 10</div>
				</div>
			</a>
		</div>
	</div>
	<!-- Listing Item / End -->

	<!-- Listing Item -->
	<div class="col-lg-12 col-md-12">
		<div class="listing-item-container list-layout">
			<a href="{{route('frontend.blog.detail')}}" class="listing-item">

				<!-- Image -->
				<div class="listing-item-image">
					<img src="{{asset('frontend/asset/images/listing-item-03.jpg')}}" alt="">
					<span class="tag">Hotels</span>
				</div>

				<!-- Content -->
				<div class="listing-item-content">

					<div class="listing-item-inner">
					<h3>Hotel Govendor</h3>
					<span>778 Country Street, New York</span>
						<div class="star-rating" data-rating="2.0">
							<div class="rating-counter">(17 reviews)</div>
						</div>
					</div>

					<span class="like-icon"></span>

					<div class="listing-item-details">Starting from $59 per night</div>
				</div>
			</a>
		</div>
	</div>
	<!-- Listing Item / End -->

	<!-- Listing Item -->
	<div class="col-lg-12 col-md-12">
		<div class="listing-item-container list-layout">
			<a href="{{route('frontend.blog.detail')}}" class="listing-item">

				<!-- Image -->
				<div class="listing-item-image">
					<img src="{{asset('frontend/asset/images/listing-item-04.jpg')}}" alt="">
					<span class="tag">Eat & Drink</span>
				</div>

				<!-- Content -->
				<div class="listing-item-content">
					<div class="listing-badge now-open">Now Open</div>

					<div class="listing-item-inner">
					<h3>Burger House <i class="verified-icon"></i></h3>
					<span>2726 Shinn Street, New York</span>
						<div class="star-rating" data-rating="5.0">
							<div class="rating-counter">(31 reviews)</div>
						</div>
					</div>

					<span class="like-icon"></span>
				</div>
			</a>
		</div>
	</div>
	<!-- Listing Item / End -->

	<!-- Listing Item -->
	<div class="col-lg-12 col-md-12">
		<div class="listing-item-container list-layout">
			<a href="{{route('frontend.blog.detail')}}" class="listing-item">

				<!-- Image -->
				<div class="listing-item-image">
					<img src="{{asset('frontend/asset/images/listing-item-05.jpg')}}" alt="">
					<span class="tag">Other</span>
				</div>

				<!-- Content -->
				<div class="listing-item-content">

					<div class="listing-item-inner">
					<h3>Airport</h3>
					<span>1512 Duncan Avenue, New York</span>
						<div class="star-rating" data-rating="3.5">
							<div class="rating-counter">(46 reviews)</div>
						</div>
					</div>

					<span class="like-icon"></span>
				</div>
			</a>
		</div>
	</div>
	<!-- Listing Item / End -->

	<!-- Listing Item -->
	<div class="col-lg-12 col-md-12">
		<div class="listing-item-container list-layout">
			<a href="{{route('frontend.blog.detail')}}" class="listing-item">

				<!-- Image -->
				<div class="listing-item-image">
					<img src="{{asset('frontend/asset/images/listing-item-06.jpg')}}" alt="">
					<span class="tag">Eat & Drink</span>
				</div>

				<!-- Content -->
				<div class="listing-item-content">
					<div class="listing-badge now-closed">Now Closed</div>

					<div class="listing-item-inner">
					<h3>Think Coffee</h3>
					<span>215 Terry Lane, New York</span>
						<div class="star-rating" data-rating="5.0">
							<div class="rating-counter">(31 reviews)</div>
						</div>
					</div>

					<span class="like-icon"></span>
				</div>
			</a>
		</div>
	</div>
	<!-- Listing Item / End -->

</div>

<!-- Pagination -->
<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12">
		<!-- Pagination -->
		<div class="pagination-container margin-top-20 margin-bottom-40">
			<nav class="pagination">
				<ul>
					<li><a href="#" class="current-page">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>
<!-- Pagination / End -->

</div>

	<!-- Blog Posts / End -->


	<!-- Widgets -->
	<div class="col-lg-3 col-md-4">
		<div class="sidebar right">

			<!-- Widget -->
			<div class="widget">
				<h3 class="margin-top-0 margin-bottom-25">Search Blog</h3>
				<div class="search-blog-input">
					<div class="input"><input class="search-field" type="text" placeholder="Type and hit enter" value=""/></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- Widget / End -->


			<!-- Widget -->
			<div class="widget margin-top-40">
				<h3>Got any questions?</h3>
				<div class="info-box margin-bottom-10">
					<p>Having any questions? Feel free to ask!</p>
					<a href="pages-contact.html" class="button fullwidth margin-top-20"><i class="fa fa-envelope-o"></i> Drop Us a Line</a>
				</div>
			</div>
			<!-- Widget / End -->


			<!-- Widget -->
			<div class="widget margin-top-40">

				<h3>Popular Posts</h3>
				<ul class="widget-tabs">

					<!-- Post #1 -->
					<li>
						<div class="widget-content">
								<div class="widget-thumb">
								<a href="pages-blog-post.html"><img src="{{asset('frontend/asset/images/blog-widget-03.jpg')}}" alt=""></a>
							</div>

							<div class="widget-text">
								<h5><a href="pages-blog-post.html">Hotels for All Budgets </a></h5>
								<span>October 26, 2016</span>
							</div>
							<div class="clearfix"></div>
						</div>
					</li>

					<!-- Post #2 -->
					<li>
						<div class="widget-content">
							<div class="widget-thumb">
								<a href="pages-blog-post.html"><img src="{{asset('frontend/asset/images/blog-widget-02.jpg')}}" alt=""></a>
							</div>

							<div class="widget-text">
								<h5><a href="pages-blog-post.html">The 50 Greatest Street Arts In London</a></h5>
								<span>November 9, 2016</span>
							</div>
							<div class="clearfix"></div>
						</div>
					</li>

					<!-- Post #3 -->
					<li>
						<div class="widget-content">
							<div class="widget-thumb">
								<a href="pages-blog-post.html"><img src="{{asset('frontend/asset/images/blog-widget-01.jpg')}}" alt=""></a>
							</div>

							<div class="widget-text">
								<h5><a href="pages-blog-post.html">The Best Cofee Shops In Sydney Neighborhoods</a></h5>
								<span>November 12, 2016</span>
							</div>
							<div class="clearfix"></div>
						</div>
					</li>

				</ul>

			</div>
			<!-- Widget / End-->


			<!-- Widget -->
			<div class="widget margin-top-40">
				<h3 class="margin-bottom-25">Social</h3>
				<ul class="social-icons rounded">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
				</ul>

			</div>
			<!-- Widget / End-->

			<div class="clearfix"></div>
			<div class="margin-bottom-40"></div>
		</div>
	</div>
	</div>
	<!-- Sidebar / End -->


</div>
</div>
@endsection
