@extends('frontend.layout2',['activePage'=>'FC_camper'])
@section('content')
<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>My Campers</h2>
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
					<h4>Active Listings</h4>
					<ul>

						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="{{asset('frontend/asset/images/listing-item-01.jpg')}}" alt=""></a></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3><a href="#">Tom's Restaurant</a></h3>
										<span>964 School Street, New York</span>
										<div class="star-rating" data-rating="3.5">
											<div class="rating-counter">(12 reviews)</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								<a href="#" class="button gray"><i class="sl sl-icon-list"></i> {{trans('front.client_camper_detail')}}</a>
								<a href="#" class="button gray"><i class="sl sl-icon-note"></i> {{trans('front.client_camper_edit')}}</a>
								<a href="#" class="button gray"><i class="sl sl-icon-close"></i> {{trans('front.client_camper_delete')}}</a>
							</div>
						</li>

						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="{{asset('frontend/asset/images/listing-item-02.jpg')}}" alt=""></a></div>
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
								<a href="#" class="button gray"><i class="sl sl-icon-list"></i> Detail</a>
								<a href="#" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
								<a href="#" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
							</div>
						</li>
						
						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="{{asset('frontend/asset/images/listing-item-03.jpg')}}" alt=""></a></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3>Hotel Govendor</h3>
										<span>778 Country Street, New York</span>
										<div class="star-rating" data-rating="2.0">
											<div class="rating-counter">(17 reviews)</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								<a href="#" class="button gray"><i class="sl sl-icon-list"></i> Detail</a>
								<a href="#" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
								<a href="#" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
							</div>
						</li>

						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="{{asset('frontend/asset/images/listing-item-04.jpg')}}" alt=""></a></div>
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
								<a href="#" class="button gray"><i class="sl sl-icon-list"></i> Detail</a>
								<a href="#" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
								<a href="#" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
							</div>
						</li>

						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="{{asset('frontend/asset/images/listing-item-05.jpg')}}" alt=""></a></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3>Airport</h3>
										<span>1512 Duncan Avenue, New York</span>
										<div class="star-rating" data-rating="3.5">
											<div class="rating-counter">(46 reviews)</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								<a href="#" class="button gray"><i class="sl sl-icon-list"></i> Detail</a>
								<a href="#" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
								<a href="#" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
							</div>
						</li>

						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="{{asset('frontend/asset/images/listing-item-06.jpg')}}" alt=""></a></div>
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
								<a href="#" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
								<a href="#" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
							</div>
						</li>

					</ul>
				</div>
			</div>
			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© 2019 Listeo. All Rights Reserved.</div>
			</div>
		</div>

	</div>
	<!-- Content / End -->
@endsection