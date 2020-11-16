@extends('frontend.layout.layout_panel',['activePage'=>'FC_bookmark'])
@section('content')
	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Bookmarks</h2>
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
					<h4>Bookmarked Listings</h4>
					<ul>

						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="{{asset('images/listing-item-02.jpg')}}" alt=""></a></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3>Sticky Band</h3>
										<span>Bishop Avenue, New York</span>
										<div class="star-rating" data-rating="5.0">
											<div class="rating-counter">(23 reviews)</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								<a href="#" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
							</div>
						</li>

						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="{{asset('images/listing-item-04.jpg')}}" alt=""></a></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3>Burger House</h3>
										<span>2726 Shinn Street, New York</span>
										<div class="star-rating" data-rating="5.0">
											<div class="rating-counter">(31 reviews)</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								<a href="#" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
							</div>
						</li>

						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="{{asset('images/listing-item-06.jpg')}}" alt=""></a></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3>Think Coffee</h3>
										<span>215 Terry Lane, New York</span>
										<div class="star-rating" data-rating="5.0">
											<div class="rating-counter">(31 reviews)</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								<a href="#" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
							</div>
						</li>

					</ul>
				</div>
			</div>
			<!-- Copyrights -->
			@include('frontend.layout.footer_panel')
		</div>

	</div>
	<!-- Content / End -->
@endsection
