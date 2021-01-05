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
                  <li>
                     <a  class="{{ $activePage == 'camperSearch' || $activePage == 'camper_details' ? ' current' : '' }}" href="{{route('frontend.camper.search')}}">
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
                  <!-- @if(!session('_client'))
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

                                       @endif -->
               </ul>
            </nav>
            <div class="clearfix"></div>
            <!-- Main Navigation / End -->
         </div>
         <!-- Left Side Content / End -->
         <!-- Right Side Content / End -->
         <div class="right-side">
		 	@if(!session('_client'))
				<div class="user-menu not-connected">
					<div class="user-name"><span><i class="far fa-user"></i></div>
					<ul>
						<li><a href="{{route('frontend.client.show_register')}}">{{trans('front.menu_register')}}</a></li>
						<li><a href="{{ route('frontend.client.show_login') }}">{{trans('front.menu_login')}}</a></li>
					</ul>
				</div>
			@else
				<div class="user-menu">
					<div class="user-name"><span><img src="{{asset('/images')}}/clients/{{App\Http\Controllers\Controller::getConnectedClientAvatarOrPicture()}}" alt=""></div>
					<ul>
                     	  <li><a href="{{ route('clients.user.profile') }}" style="width: 100%;"><i class="far fa-user" style="margin-right: 6%;"></i>{{ __('front.my_profile') }} </a></li>
                     	  <li><a href="{{ route('frontend.clients.message') }}" style="width: 100%;"><i class="far fa-envelope" style="margin-right: 6%;"></i> {{ __('front.my_message') }}</a></li>
                     	  <li><a href="{{ route('frontend.clients.booking') }}" style="width: 100%;"><i class="far fa-folder-open" style="margin-right: 6%;"></i>{{ __('front.my_bookings') }}</a></li>
                     	  <li><a href="{{ route('frontend.clients.camper') }}" style="width: 100%;"><i class="fas fa-caravan" style="margin-right: 6%;"></i>{{ __('front.my_campers') }}</a></li>

                     		  <li><a class="dropdown-item" href="{{ route('client.logout') }}"
                     		  		onclick="event.preventDefault();
                                   document.getElementById('frm-logout').submit();"
                                   style="width: 100%;"
                     			>
                     		  <i class="fas fa-power-off" style="margin-right: 6%;"></i>
                     		  {{ __('Logout') }}
                     			</a>
                     		</li>

                     	</ul>
				</div>
			@endif
				<div class="user-menu lang-menu">
					<div class="user-name"><span><i class="fas fa-globe"></i></span></div>
					<ul>
						<li><a href="{{ url('lang/en') }}">English @if (app()->getLocale()== 'en') <i class="fas fa-check"></i> @endif</a></li>
						<li><a href="{{ url('lang/de') }}">Deutsch @if (app()->getLocale()== 'de') <i class="fas fa-check"></i> @endif</a></li>
						<li><a href="{{ url('lang/fr') }}">Français @if (app()->getLocale()== 'fr') <i class="fas fa-check"></i> @endif</a></li>
					</ul>
				</div>

            <!-- <a href="{{ url('lang/en') }}" class="button border with-icon min-width_lang {{app()->getLocale()== 'en' ? 'current' : ''}}">EN</a>
            <a href="{{ url('lang/de') }}" class="button border with-icon min-width_lang {{app()->getLocale()== 'de' ? 'current' : ''}}">DE</a>
            <a href="{{ url('lang/fr') }}" class="button border with-icon min-width_lang {{app()->getLocale()== 'fr' ? 'current' : ''}}">FR</a> -->
         </div>
         <!-- Right Side Content / End -->
      </div>
   </div>
   <!-- Header / End -->
</header>
<form id="frm-logout" action="{{ route('client.logout') }}" method="POST" style="display: none;">
   {{ csrf_field() }}
</form>
