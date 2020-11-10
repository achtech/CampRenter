@extends('frontend.layout.layout_panel',['activePage'=>'FC_profile'])
@section('content')
	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>{{ __('front.my_profile') }}</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">{{ __('front.home') }}</a></li>
							<li><a href="#">{{ __('front.dashboard') }}</a></li>
							<li>{{ __('front.my_profile') }}</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">

			<!-- Profile -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">{{ __('front.profile_details') }}</h4>
					<div class="dashboard-list-box-static">
						{{ Form::open(['route'=>'frontend.client.completeRegistration', 'enctype'=>'multipart/form-data','autocomplete'=>'off','method'=>'POST']) }}

						<!-- Avatar -->
						<div class="edit-profile-photo">
							<img src="images/clients/default.jpg" alt="">
							<div class="change-photo-btn">
								<div class="photoUpload">
								    <span><i class="fa fa-upload"></i> {{ __('front.upload_photos') }}</span>
								    <input type="file" id="id_avatars" name="id_avatars" class="upload" />
								</div>
							</div>
						</div>
	
						<!-- Details -->
						<div class="my-profile">

							<label>{{ __('front.profil_name') }}</label>
							<input id="client_name" name="client_name" class="form-control" value="{{Auth::guard('client')->user()->client_name}}" type="text">
							<label>{{ __('front.profil_last_name') }}</label>
							<input  id="client_last_name" name="client_last_name" class="form-control" value="{{Auth::guard('client')->user()->client_last_name}}" type="text">

							<label>{{ __('front.profil_phone') }}</label>
							<input id="phone" name="phone" class="form-control" type="tel">

							<label>{{ __('front.profil_email') }}</label>
							<input  id="email" name="email" class="form-control" value="{{Auth::guard('client')->user()->email}}" type="text">

							<label>{{ __('front.profil_notes') }}</label>
							<textarea name="review" id="review" cols="30" rows="10"></textarea>

							<label><i class="fa fa-twitter"></i> {{ __('front.profil_twitter') }}</label>
							<input placeholder="https://www.twitter.com/" type="text">

							<label><i class="fa fa-facebook-square"></i> {{ __('front.profil_facebook') }}</label>
							<input placeholder="https://www.facebook.com/" type="text">

							<label><i class="fa fa-google-plus"></i> {{ __('front.profil_google') }}</label>
							<input placeholder="https://www.google.com/" type="text">
						</div>
	
						<button type="submit" class="button margin-top-15"> {{ __('front.save_profile_changes') }}</button>
						{{ Form::close() }}
					</div>
				</div>
			</div>

			<!-- Change Password -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">{{ __('front.changes_password') }}</h4>
					<div class="dashboard-list-box-static">

						<!-- Change Password -->
						<div class="my-profile">
							<label class="margin-top-0">{{ __('front.current_password') }}</label>
							<input type="password">

							<label>{{ __('front.new_password') }}</label>
							<input type="password">

							<label>{{ __('front.confirm_new_password') }}</label>
							<input type="password">

							<button class="button margin-top-15">{{ __('front.change_password') }}</button>
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