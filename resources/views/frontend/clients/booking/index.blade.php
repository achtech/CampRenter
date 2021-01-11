@extends('frontend.layout.layout_panel',['activePage' => 'FC_booking'])
@section('content')
		<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>{{trans('front.menu_panel_booking')}}</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							{{ Breadcrumbs::render('bookings') }}
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
							<h3>{{trans('front.send_message')}}</h3>
						</div>
						<div class="message-reply margin-top-0">
							<textarea cols="40" rows="3" placeholder="Your Message to Kathy"></textarea>
							<button class="button">{{trans('front.send')}}</button>
						</div>
					</div>
					<h4>{{trans('front.booking_requests')}}</h4>
					<!-- Tabs Navigation -->
					<ul class="tabs-nav">
						<li class="active"><a href="#tab1b">{{trans('front.tab_renter')}}</a></li>
						<li><a href="#tab2b">{{trans('front.tab_owner')}}</a></li>
					</ul>
					<!-- Tabs Content -->
					<div class="tabs-container">
						<div class="tab-content" id="tab1b">
							@include('frontend.clients.booking.renter_bookings')
						</div>
						<div class="tab-content" id="tab2b">
							@include('frontend.clients.booking.owner_bookings')
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
