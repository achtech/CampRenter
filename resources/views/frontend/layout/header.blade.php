<header id="header-container">

	<!-- Header -->
	<div id="header">
		<div class="container">

			<!-- Left Side Content -->
			<div class="left-side">

				<!-- Logo -->
				<div id="logo">
					<a href="{{route('home.index')}}"><img src="{{asset('frontend/asset/images/logo-icon.png')}}"
						data-sticky-logo="{{asset('frontend/asset/images/logo-icon.png')}}" alt=""></a>
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

						<li><a class="{{ $activePage == 'home' ? ' current' : '' }}" href="{{route('home.index')}}">{{trans('front.menu_home')}}</a></li>
						<li><a  href="#">{{trans('front.menu_rent')}}</a>
							<ul>
								@foreach($categories as $cat)
									<li><a href="{{route('frontend.camper.search')}}">{{App\Http\Controllers\Controller::getLabelFromObject($cat)}}</a></li>
								@endforeach
							</ul>
						</li>
						<li>
							<a class="{{ $activePage == 'camper' ? ' current' : '' }}" href="{{route('frontend.camper')}}">
								{{trans('front.menu_insert_vehicule')}}
							</a>
						</li>
						<li><a class="{{ $activePage == 'blog' ? ' current' : '' }}" href="{{route('frontend.blog')}}">{{trans('front.Blog')}}</a></li>

						<li><a href="#">{{trans('front.menu_user_panel')}}</a>
							<ul>
								<li><a href="{{route('frontend.clients.camper')}}">{{trans('front.menu_panel_camper')}}</a></li>
								<li><a href="{{route('frontend.clients.message')}}">{{trans('front.menu_panel_message')}}</a></li>
								<li><a href="{{route('frontend.clients.notification')}}">{{trans('front.menu_panel_notification')}}</a></li>
								<li><a href="{{route('frontend.clients.booking')}}">{{trans('front.menu_panel_booking')}}</a></li>
								<li><a href="{{route('frontend.clients.wallet')}}">{{trans('front.menu_panel_wallet')}}</a></li>
								<li><a href="{{route('frontend.clients.review')}}">{{trans('front.menu_panel_review')}}</a></li>
								<li><a href="{{route('clients.user.profile')}}">{{trans('front.menu_panel_profil')}}</a></li>
								<li><a href="{{route('logout')}}">{{trans('front.menu_panel_logout')}}</a></li>
							</ul>
						</li>

						<li>
							<a  id="myBtn">{{trans('front.menu_login')}}</a>
							@include('frontend.connexion.login');
						</li>
						<li><a>{{trans('front.menu_register')}}</a></li>

					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->

			</div>
			<!-- Left Side Content / End -->


						<!-- Right Side Content / End -->
			<div class="right-side">
				<div class="header-widget">
					<a href="{{ url('lang/en') }}" class="button border with-icon min-width_lang {{app()->getLocale()== 'en' ? 'current' : ''}}">EN</a>
					<a href="{{ url('lang/de') }}" class="button border with-icon min-width_lang {{app()->getLocale()== 'de' ? 'current' : ''}}">DE</a>
					<a href="{{ url('lang/fr') }}" class="button border with-icon min-width_lang {{app()->getLocale()== 'fr' ? 'current' : ''}}">FR</a>
				</div>
			</div>
			<!-- Right Side Content / End -->
		</div>
	</div>
	<!-- Header / End -->

</header>
