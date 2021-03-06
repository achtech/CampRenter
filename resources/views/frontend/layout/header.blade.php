<header id="header-container">

	<!-- Header -->
	<div id="header">
		<div class="container">

			<!-- Left Side Content -->
			<div class="left-side">

				<!-- Logo -->
				<div id="logo">
					<a href="{{route('home.index')}}"><img src="{{asset('images/logo-icon.png')}}"
						data-sticky-logo="{{asset('images/logo-icon.png')}}" alt=""></a>
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
					<ul id="responsive" style="width: 190%;">

						<li><a class="{{ $activePage == 'home' ? ' current' : '' }}" href="{{route('home.index')}}">{{trans('front.menu_home')}}</a></li>
						<li><a  class="{{ $activePage == 'camperSearch' || $activePage == 'camper_details' ? ' current' : '' }}" href="{{route('frontend.camper.search')}}">
								{{trans('front.menu_rent')}}</a>
							<ul>
								<li><a href="{{route('frontend.camper.search')}}">All</a></li>
								@foreach(App\Http\Controllers\Controller::getCamperCategories() as $cat)
									<li><a href="{{route('frontend.camper.searchByCategory',$cat->id)}}">{{App\Http\Controllers\Controller::getLabelFromObject($cat)}}</a></li>
								@endforeach
							</ul>
						</li>
						<li>
							<a class="{{ $activePage == 'camper' ? ' current' : '' }}" href="{{route('frontend.camper')}}">
								{{trans('front.menu_insert_vehicule')}}
							</a>
						</li>
						<li><a class="{{ $activePage == 'blog' ? ' current' : '' }}" href="{{route('frontend.blog')}}">{{trans('front.menu_blog')}}</a></li>

						@if(!session('_client'))

						<li ><a href="{{route('frontend.client.show_register')}}">{{trans('front.menu_register')}}</a></li>
                        <li><a href="{{ route('frontend.client.show_login') }}"> {{trans('front.menu_login')}}</a></li>
                        @else

					   <li style="float: right">
						<a  href="#" style="margin-left: 120px;" class="user-name">
							<span style="white-space: nowrap;margin-top: 6px;">
								<img src="{{asset('/images')}}/clients/{{App\Http\Controllers\Controller::getConnectedClientAvatarOrPicture()}}" alt="">
								{{ __('hi') }} {{App\Http\Controllers\Controller::getConnectedClientLastName()}}
							</span>
						</a>
						  <ul>
							  <li><a href="{{ route('clients.user.profile') }}" ><i class="far fa-user"></i>{{ __('front.my_profile') }} </a></li>
							  <li><a href="{{ route('frontend.clients.message') }}"><i class="far fa-envelope"></i> {{ __('front.my_message') }}</a></li>
							  <li><a href="{{ route('frontend.clients.booking') }}"><i class="far fa-folder-open"></i>{{ __('front.my_bookings') }}</a></li>
							  <li><a href="{{ route('frontend.clients.camper') }}"><i class="fas fa-caravan"></i>{{ __('front.my_campers') }}</a></li>

								  <li><a class="dropdown-item" href="{{ route('client.logout') }}"
								  		onclick="event.preventDefault();
										  document.getElementById('frm-logout').submit();"
									>
								  <i class="fas fa-power-off"></i>
								  {{ __('Logout') }}
									</a>
								</li>

							</ul>

				</li>

                        @endif


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
	<!-- Header / End --></header>
	<form id="frm-logout" action="{{ route('client.logout') }}" method="POST" style="display: none;">
    	{{ csrf_field() }}
	</form>
