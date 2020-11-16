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
					@if(Session::has('danger'))
		<div class="danger">
			{{ Session::get('danger') }}
</div>
@endif

@if(Session::has('warning'))
		<div class="warning">
			{{ Session::get('warning') }}
</div>
@endif

@if(Session::has('success'))
		<div class="success">
			{{ Session::get('success') }}
</div>
@endif
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
						{{ Form::open(['action'=>'App\Http\Controllers\frontend\FClientController@completeRegistrationProfile','method'=>'POST']) }}

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
				<input type="password" id="password" name="password" >

				<label>{{ __('front.new_password') }}</label>
				<input type="password" id="new_password" name="new_password">

				<label>{{ __('front.confirm_new_password') }}</label>
				<input type="password" id="confirmed_password" name="confirmed_password">

			</div>

		</div>
	</div>
</div>
<div style="visibility: hidden;">s</div>

<!-- Change Password -->
<div class="col-lg-6 col-md-12">
	<div class="dashboard-list-box margin-top-0">
		<h4 class="gray">{{ __('front.save_profile_changes') }}</h4>
		<div class="dashboard-list-box-static">
			{{Form::submit(__('front.save_profile_changes'),['style'=>'width: 100%;','class'=>'button margin-top-15','name' => 'action'])}}
			{{ Form::close() }}
		</div>
	</div>
</div>
			<!-- Copyrights -->
			@include('frontend.layout.footer_panel')

		</div>

	</div>
	<!-- Content / End -->

@endsection
