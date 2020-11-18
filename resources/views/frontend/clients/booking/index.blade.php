@extends('frontend.layout.layout_panel',['activePage' => 'FC_booking'])
@section('content')
		<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Bookings</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Bookings</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">

			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<!-- Reply to review popup -->
					<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
						<div class="small-dialog-header">
							<h3>Send Message</h3>
						</div>
						<div class="message-reply margin-top-0">
							<textarea cols="40" rows="3" placeholder="Your Message to Kathy"></textarea>
							<button class="button">Send</button>
						</div>
					</div>
					<h4>Booking Requests</h4>
					<!-- Tabs Navigation -->
					<ul class="tabs-nav">
						<li class="active"><a href="#tab1b">{{trans('front.tab_owner')}}</a></li>
						<li><a href="#tab2b">{{trans('front.tab_renter')}}</a></li>
					</ul>
					<!-- Tabs Content -->
					<div class="tabs-container">
						<div class="tab-content" id="tab1b">
							<ul>

								<li class="pending-booking">
									<div class="list-box-listing bookings">
										<div class="list-box-listing-img"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=120" alt=""></div>
										<div class="list-box-listing-content">
											<div class="inner">
												<h3>Sunny and Modern Apartment <span class="booking-status pending">Pending</span><span class="booking-status unpaid">Unpaid</span></h3>

												<div class="inner-booking-list">
													<h5>Booking Date:</h5>
													<ul class="booking-list">
														<li class="highlighted">20.08.2018 - 24.08.2018</li>
													</ul>
												</div>

												<div class="inner-booking-list">
													<h5>Booking Details:</h5>
													<ul class="booking-list">
														<li class="highlighted">2 Adults</li>
													</ul>
												</div>

												<div class="inner-booking-list">
													<h5>Price:</h5>
													<ul class="booking-list">
														<li class="highlighted">$147</li>
													</ul>
												</div>

												<div class="inner-booking-list">
													<h5>Client:</h5>
													<ul class="booking-list">
														<li>John Smith</li>
														<li>john@example.com</li>
														<li>123-456-789</li>
													</ul>
												</div>

												<a href="#small-dialog" class="rate-review popup-with-zoom-anim"><i class="far fa-envelope-open"></i> Send Message</a>

											</div>
										</div>
									</div>
									<div class="buttons-to-right">
										<a href="#" class="button gray reject"><i class="far fa-times-circle"></i> Reject</a>
										<a href="#" class="button gray approve"><i class="far fa-check-circle"></i> Approve</a>
									</div>
								</li>

								<li class="approved-booking">
									<div class="list-box-listing bookings">
										<div class="list-box-listing-img"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=120" alt=""></div>
										<div class="list-box-listing-content">
											<div class="inner">
												<h3>Burger House <span class="booking-status">Approved</span></h3>

												<div class="inner-booking-list">
													<h5>Booking Date:</h5>
													<ul class="booking-list">
														<li class="highlighted">10.12.2019 at 12:30 pm - 13:30 pm</li>
													</ul>
												</div>

												<div class="inner-booking-list">
													<h5>Booking Details:</h5>
													<ul class="booking-list">
														<li class="highlighted">2 Adults, 2 Children</li>
													</ul>
												</div>

												<div class="inner-booking-list">
													<h5>Client:</h5>
													<ul class="booking-list">
														<li>Kathy Brown</li>
														<li>kathy@example.com</li>
														<li>123-456-789</li>
													</ul>
												</div>

												<a href="#small-dialog" class="rate-review popup-with-zoom-anim"><i class="far fa-envelope-open"></i> Send Message</a>

											</div>
										</div>
									</div>
									<div class="buttons-to-right">
										<a href="#" class="button gray reject"><i class="far fa-times-circle"></i> Cancel</a>
									</div>
								</li>

								<li class="canceled-booking">
									<div class="list-box-listing bookings">
										<div class="list-box-listing-img"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=120" alt=""></div>
										<div class="list-box-listing-content">
											<div class="inner">
												<h3>Tom's Restaurant <span class="booking-status">Canceled</span></h3>

												<div class="inner-booking-list">
													<h5>Booking Date:</h5>
													<ul class="booking-list">
														<li class="highlighted">21.10.2019 at 9:30 am - 10:30 am</li>
													</ul>
												</div>

												<div class="inner-booking-list">
													<h5>Booking Details:</h5>
													<ul class="booking-list">
														<li class="highlighted">2 Adults</li>
													</ul>
												</div>

												<div class="inner-booking-list">
													<h5>Client:</h5>
													<ul class="booking-list">
														<li>Kathy Brown</li>
														<li>kathy@example.com</li>
														<li>123-456-789</li>
													</ul>
												</div>

											</div>
										</div>
									</div>
								</li>

							</ul>
						</div>
						<div class="tab-content" id="tab2b">
						<ul>
							<li class="pending-booking">
								<div class="list-box-listing bookings">
									<div class="list-box-listing-img"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=120" alt=""></div>
									<div class="list-box-listing-content">
										<div class="inner">
											<h3>Sunny and Modern Apartment <span class="booking-status pending">Pending</span><span class="booking-status unpaid">Unpaid</span></h3>

											<div class="inner-booking-list">
												<h5>Booking Date:</h5>
												<ul class="booking-list">
													<li class="highlighted">20.08.2018 - 24.08.2018</li>
												</ul>
											</div>

											<div class="inner-booking-list">
												<h5>Booking Details:</h5>
												<ul class="booking-list">
													<li class="highlighted">2 Adults</li>
												</ul>
											</div>

											<div class="inner-booking-list">
												<h5>Price:</h5>
												<ul class="booking-list">
													<li class="highlighted">$147</li>
												</ul>
											</div>

											<div class="inner-booking-list">
												<h5>Client:</h5>
												<ul class="booking-list">
													<li>John Smith</li>
													<li>john@example.com</li>
													<li>123-456-789</li>
												</ul>
											</div>

											<a href="#small-dialog" class="rate-review popup-with-zoom-anim"><i class="far fa-envelope-open"></i> Send Message</a>

										</div>
									</div>
								</div>
								<div class="buttons-to-right">
									<a href="#" class="button gray reject"><i class="far fa-times-circle"></i> Reject</a>
									<a href="#" class="button gray approve"><i class="far fa-check-circle"></i> Approve</a>
								</div>
							</li>

							<li class="approved-booking">
								<div class="list-box-listing bookings">
									<div class="list-box-listing-img"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=120" alt=""></div>
									<div class="list-box-listing-content">
										<div class="inner">
											<h3>Burger House <span class="booking-status">Approved</span></h3>

											<div class="inner-booking-list">
												<h5>Booking Date:</h5>
												<ul class="booking-list">
													<li class="highlighted">10.12.2019 at 12:30 pm - 13:30 pm</li>
												</ul>
											</div>

											<div class="inner-booking-list">
												<h5>Booking Details:</h5>
												<ul class="booking-list">
													<li class="highlighted">2 Adults, 2 Children</li>
												</ul>
											</div>

											<div class="inner-booking-list">
												<h5>Client:</h5>
												<ul class="booking-list">
													<li>Kathy Brown</li>
													<li>kathy@example.com</li>
													<li>123-456-789</li>
												</ul>
											</div>

											<a href="#small-dialog" class="rate-review popup-with-zoom-anim"><i class="far fa-envelope-open"></i> Send Message</a>

										</div>
									</div>
								</div>
								<div class="buttons-to-right">
									<a href="#" class="button gray reject"><i class="far fa-times-circle"></i> Cancel</a>
								</div>
							</li>

						</ul>
						</div>
					</div>

				</div>
			</div>


			<!-- Copyrights -->
			@include('frontend.layout.footer_panel')
		</div>

	</div>
	<!-- Content / End -->
@endsection
