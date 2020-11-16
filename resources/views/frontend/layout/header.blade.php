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
						<li><a  class="{{ $activePage == 'camperSearch' ? ' current' : '' }}" href="#">{{trans('front.menu_rent')}}</a>
							<ul>
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
                       <li>


                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                               @csrf
                           </form>
					   </li>

					   <li style="float: right">
						<a  href="#" style="margin-left: 128px;" class="user-name"><span style="white-space: nowrap;margin-top: 6px;"><img src="{{asset('images/clients/default.jpg')}}" alt="">{{ __('hi') }} {{App\Http\Controllers\Controller::getConnectedClient()}}</span></a>
						  <ul>
							  <li><a href="{{ route('clients.user.profile') }}" ><i class="sl sl-icon-settings"></i>{{ __('front.my_profile') }} </a></li>
							  <li><a href="{{ route('frontend.clients.message') }}"><i class="sl sl-icon-envelope-open"></i> {{ __('front.my_message') }}</a></li>
							  <li><a href="{{ route('frontend.clients.booking') }}"><i class="fa fa-calendar-check-o"></i>{{ __('front.my_bookings') }}</a></li>
							  <li><a href="{{ route('frontend.clients.camper') }}"><i class="fa fa-calendar-check-o"></i>{{ __('front.my_campers') }}</a></li>
							  <li><a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
													   document.getElementById('logout-form').submit();"><i class="sl sl-icon-power"></i> {{ __('Logout') }}</a></li>
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
