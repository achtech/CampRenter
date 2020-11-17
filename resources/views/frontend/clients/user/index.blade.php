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
					<div class="row">
						<div class="col-md-6">
							<div class="edit-profile-photo">
								<img src="images/clients/default.jpg" alt="" id="client_image">
								<div class="change-photo-btn">
									<div class="photoUpload">
								    	<span><i class="fa fa-upload"></i> {{ __('front.upload_photos') }}</span>
								    	<input type="file" id="photo" name="photo" class="upload" onchange="readURL(this);" />
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="edit-profile-photo">
							<div class="row" style="height: 62px;">
								@foreach($avatars as $elem)
								<div class="col-md-4" >
									<label>
										<input type="radio" name="id_avatars" id="id_avatars" value="{{$elem->image}}" checked>
										<img src="images/clients/{{$elem->image}}" alt="" class="avatar">
									</label>
								</div>
								@endforeach
							</div>
							
							</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="edit-profile-photo">
							<img src="images/clients/default.jpg" alt="" id="client_image">
							<div class="change-photo-btn">
								<div class="photoUpload">
									<span><i class="fa fa-upload"></i> {{ __('front.upload_image_national') }}</span>
									<input type="file" id="photo" name="photo" class="upload" onchange="readURL(this);" />
							</div>
						</div>
					</div>
				</div></div>
						<div class="my-profile dashboard-list-box-static" style="padding-left: 1px;">
							<label>{{ __('front.profil_name') }}</label>
							<input id="client_name" name="client_name" class="form-control" value="{{$client['client_name']}}" type="text">
							<label>{{ __('front.profil_last_name') }}</label>
							<input  id="client_last_name" name="client_last_name" class="form-control" value="{{$client['client_last_name']}}" type="text">
							<label>{{ __('front.profil_phone') }}</label>
							<input id="phone" name="phone" class="form-control" type="tel">
							<label>{{ __('front.profil_email') }}</label>
							<input  id="email" name="email" class="form-control" value="{{$client['email']}}" type="text" disabled>
						</div>
						{{Form::submit(__('front.save_profile_changes'),['style'=>'width: 100%;','class'=>'button margin-top-15','name' => 'action'])}}
						{{ Form::close() }}
					</div>
				</div>
			</div>
<!-- Change Password -->

<!--<div style="visibility: hidden;">s</div> -->
<div class="col-lg-6 col-md-12" >
	<div class="dashboard-list-box margin-top-0">
		<h4 class="gray">{{ __('front.profile_details') }}</h4>
		<div class="dashboard-list-box-static">
			{{ Form::open(['action'=>'App\Http\Controllers\frontend\FClientController@completeRegistrationProfile','method'=>'POST']) }}

			<!-- Change Password -->
			<div class="my-profile">
				<label>{{ __('front.profil_name') }}</label>
							<input id="client_name" name="client_name" class="form-control" value="{{$client['client_name']}}" type="text">
							<label>{{ __('front.profil_last_name') }}</label>
							<input  id="client_last_name" name="client_last_name" class="form-control" value="{{$client['client_last_name']}}" type="text">
							<label>{{ __('front.profil_phone') }}</label>
							<input id="phone" name="phone" class="form-control" type="tel">
							<label>{{ __('front.profil_email') }}</label>
							<input  id="email" name="email" class="form-control" value="{{$client['email']}}" type="text" disabled>
						
			</div>
			{{Form::submit(__('front.change_password'),['style'=>'width: 100%;','class'=>'button margin-top-15','name' => 'action'])}}
			{{ Form::close() }}
		</div>
	</div>
</div>

			<!-- Copyrights -->
			@include('frontend.layout.footer_panel')

		</div>

	</div>
	<!-- Content / End -->
<script>
	 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#client_image')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
@endsection
