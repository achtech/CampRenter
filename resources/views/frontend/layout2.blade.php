<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>Campunit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{asset('frontend/asset/css/style.css')}}">
<link rel="stylesheet" href="{{asset('frontend/asset/css/main-color.css')}}" id="colors">

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container" class="fixed fullwidth dashboard">

	<!-- Header -->
	<div id="header" class="not-sticky">
		<div class="container">

			<!-- Left Side Content -->
			<div class="left-side">

				<!-- Logo -->
				<div id="logo" style="padding-left: 75px;">
					<a href="index.html"><img src="{{asset('frontend/asset/images/logo-icon.png')}}" alt=""></a>
					<a href="index.html" class="dashboard-logo"><img src="{{asset('frontend/asset/images/logo-icon.png')}}" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">

					<li><a class="{{ $activePage == 'home' ? ' current' : '' }}" href="/">{{trans('front.menu_home')}}</a></li>
					<li><a  href="#">{{trans('front.menu_rent')}}</a>
							<ul>
								@foreach($categories as $cat)
									<li><a href="index-3.html">{{App\Http\Controllers\Controller::getLabelFromObject($cat)}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a class="{{ $activePage == 'camper' ? ' current' : '' }}" href="{{route('frontend.camper')}}">{{trans('front.menu_insert_vehicule')}}</a></li>

						<li><a href="#">{{trans('front.menu_user_panel')}}</a>
							<ul>
								<li><a href="dashboard-my-listings.html">{{trans('front.menu_panel_camper')}}</a></li>
								<li><a href="dashboard-messages.html">{{trans('front.menu_panel_message')}}</a></li>
								<li><a href="dashboard-messages.html">{{trans('front.menu_panel_notification')}}</a></li>
								<li><a href="dashboard-bookings.html">{{trans('front.menu_panel_booking')}}</a></li>
								<li><a href="dashboard-wallet.html">{{trans('front.menu_panel_wallet')}}</a></li>
								<li><a href="dashboard-reviews.html">{{trans('front.menu_panel_review')}}</a></li>
								<li><a href="{{route('clients.user.profile')}}">{{trans('front.menu_panel_profil')}}</a></li>
								<li><a href="dashboard-my-profile.html">{{trans('front.menu_panel_logout')}}</a></li>
								<li><a href="dashboard-invoice.html">{{trans('front.menu_panel_invoice')}}</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->

			</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
			<div class="right-side">
				<!-- Header Widget -->
				<div class="header-widget">

					<!-- User Menu -->
					<div class="user-menu">
						<div class="user-name"><span><img src="{{asset('frontend/asset/images/dashboard-avatar.jpg')}}" alt=""></span>Hi, Tom!</div>
						<ul>
							<li><a href="dashboard.html"><i class="sl sl-icon-settings"></i> {{trans('front.menu_panel_profil')}}</a></li>
							<li><a href="dashboard-messages.html"><i class="sl sl-icon-envelope-open"></i> {{trans('front.menu_panel_message')}}</a></li>
							<li><a href="dashboard-bookings.html"><i class="fa fa-calendar-check-o"></i> {{trans('front.menu_panel_booking')}}</a></li>
							<li><a href="index.html"><i class="sl sl-icon-power"></i> {{trans('front.menu_panel_logout')}}</a></li>
						</ul>
					</div>
					<a href="dashboard-add-listing.html" class="button border with-icon min-width_lang current">EN</a>
					<a href="dashboard-add-listing.html" class="button border with-icon min-width_lang">DE</a>
					<a href="dashboard-add-listing.html" class="button border with-icon min-width_lang">FR</a>
				</div>
				<!-- Header Widget / End -->
			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Dashboard -->
<div id="dashboard">

	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">

			<ul data-submenu-title="Main">
				<li><a href="dashboard.html"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
				<li><a href="dashboard-messages.html"><i class="sl sl-icon-envelope-open"></i> Messages <span class="nav-tag messages">2</span></a></li>
				<li><a href="dashboard-bookings.html"><i class="fa fa-calendar-check-o"></i> Bookings</a></li>
				<li><a href="dashboard-wallet.html"><i class="sl sl-icon-wallet"></i> Wallet</a></li>
			</ul>

			<ul data-submenu-title="Listings">
				<li><a><i class="sl sl-icon-layers"></i> My Listings</a>
					<ul>
						<li><a href="dashboard-my-listings.html">Active <span class="nav-tag green">6</span></a></li>
						<li><a href="dashboard-my-listings.html">Pending <span class="nav-tag yellow">1</span></a></li>
						<li><a href="dashboard-my-listings.html">Expired <span class="nav-tag red">2</span></a></li>
					</ul>
				</li>
				<li><a href="dashboard-reviews.html"><i class="sl sl-icon-star"></i> Reviews</a></li>
				<li><a href="dashboard-bookmarks.html"><i class="sl sl-icon-heart"></i> Bookmarks</a></li>
				<li><a href="dashboard-add-listing.html"><i class="sl sl-icon-plus"></i> Add Listing</a></li>
			</ul>

			<ul data-submenu-title="Account">
				<li class="active"><a href="dashboard-my-profile.html"><i class="sl sl-icon-user"></i> My Profile</a></li>
				<li><a href="index.html"><i class="sl sl-icon-power"></i> Logout</a></li>
			</ul>

	</div>
	</div>
	<!-- Navigation / End -->
	<!-- Main Navigation -->
	<div class="dashboard-content">
		@yield('content')
	</div>


</div>
<!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{asset('frontend/asset/scripts/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/jquery-migrate-3.1.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/mmenu.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/chosen.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/rangeslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/tooltips.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/asset/scripts/custom.js')}}"></script>


</body>
</html>
