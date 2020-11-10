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
						<li><a class="{{ $activePage == 'blog' ? ' current' : '' }}" href="{{route('frontend.blog')}}">{{trans('front.menu_blog')}}</a></li>
                        @if(!Auth::guard('client')->check())
						<li>
							<a  id="myBtn">{{trans('front.menu_login')}}</a>
							@include('frontend.connexion.login');
						</li>
						<li ><a href="/register/client">{{trans('front.menu_register')}}</a></li>
                        <li><a href="/login/client">New {{trans('front.menu_login')}}</a></li>
                        @else
                       <li>
                          

                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                               @csrf
                           </form>
					   </li>
					   
					   <li style="margin-left: 159px;">
						<a style="margin-left: 130px;" href="#" class="user-name"><span style="white-space: nowrap;"><img src="images/clients/default.jpg" alt="">{{ __('hi') }} {{Auth::guard('client')->user()->client_name}} {{Auth::guard('client')->user()->client_last_name}}</span></a>	
						  <ul>
							  <li><a href="{{ route('clients.user.profile') }}" ><i class="sl sl-icon-settings"></i>{{ __('front.my_profile') }} </a></li>
							  <li><a ><i class="sl sl-icon-envelope-open"></i> {{ __('front.my_message') }}</a></li>
							  <li><a ><i class="fa fa-calendar-check-o"></i>{{ __('front.my_bookings') }}</a></li> 
							  <li><a ><i class="fa fa-calendar-check-o"></i>{{ __('front.my_campers') }}</a></li>
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
