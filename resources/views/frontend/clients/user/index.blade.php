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
								    	<input type="file" id="photo" name="photo" class="upload" onchange="readProfileImage(this);" />
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="edit-profile-photo">
							<div class="row" style="height: 62px;">
								@foreach($avatars as $elem)
								<div class="col-md-3" >
									<label>
										<input type="radio" name="id_avatars" id="id_avatars" value="{{$elem->image}}">
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
							<img src="images/clients/{{$client['image_national_id']}}" alt="" id="client_cin">
							<div class="change-photo-btn">
								<div class="photoUpload">
									<span><i class="fa fa-upload"></i> {{ __('front.upload_image_national') }}</span>
									<input type="file" id="image_national_id" name="image_national_id" class="upload" onchange="readProfileCin(this);" />
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="edit-profile-photo">
						<img src="images/clients/{{$client['driving_licence_image']}}" alt="" id="client_driving_licence">
						<div class="change-photo-btn">
							<div class="photoUpload">
								<span><i class="fa fa-upload"></i> {{ __('front.driving_licence') }}</span>
								<input type="file" id="driving_licence_image" name="driving_licence_image" class="upload" onchange="readProfileDrivingLicence(this);" />
						</div>
					</div>
				</div>
			</div>
			</div>
						<div class="my-profile dashboard-list-box-static" style="padding-left: 1px;">
							<label>{{ __('front.profil_name') }}</label>
							<input id="client_name" name="client_name" class="form-control" value="{{$client['client_name']}}" type="text">
							<label>{{ __('front.profil_last_name') }}</label>
							<input  id="client_last_name" name="client_last_name" class="form-control" value="{{$client['client_last_name']}}" type="text">
							<label>{{ __('front.profil_sex') }}</label>
							<input  id="sex" name="sex" class="form-control" value="{{$client['sex']}}" type="text" >
							<label>{{ __('front.profil_email') }}</label>
							<input  id="email" name="email" class="form-control" value="{{$client['email']}}" type="text" >
							<label>{{ __('front.street') }}</label>
							<input  id="street" name="street" class="form-control" value="{{$client['street']}}" type="text" >
							<label>{{ __('front.street_number') }}</label>
							<input  id="street_number" name="street_number" class="form-control" value="{{$client['street_number']}}" type="text" >
							<label>{{ __('front.location') }}</label>
							<input  id="location" name="location" class="form-control" value="{{$client['location']}}" type="text" >
							<label>{{ __('front.postal_code') }}</label>
							<input  id="postal_code" name="postal_code" class="form-control" value="{{$client['postal_code']}}" type="text" >
							<label>{{ __('front.country') }}</label>
							<input  id="country" name="country" class="form-control" value="{{$client['country']}}" type="text" >
							<label>{{ __('front.profil_phone') }}</label>
							<input id="phone" name="phone" class="form-control" value="{{$client['telephone']}}" type="text">
							<label>{{ __('front.profil_phone_code') }}</label>
							<input id="telephone_code" name="telephone_code" class="form-control" value="{{$client['telephone_code']}}" type="text">
							<label>{{ __('front.profil_birth_date') }}</label>
							<input id="profil_birth_date" name="profil_birth_date" class="form-control" value="{{$profil_birth_date}}"  type="date">
							<label>{{ __('front.profil_review') }}</label>
							<input id="review" name="review" class="form-control" value="{{$client['review']}}" type="text">
							<label>{{ __('front.profile_driving_licence') }}</label>
							<input id="driving_licence" name="driving_licence" class="form-control" value="{{$client['driving_licence']}}" type="tel">
							<label>{{ __('front.profile_status') }}</label>
							<input id="status" name="status" class="form-control" value="{{$client_status}}" type="text" >
							<label>{{ __('front.national_code') }}</label>
							<input id="national_id" name="national_id" class="form-control" value="{{$client['national_id']}}" type="text" >
							<div style="height: 70px;"></div>
						</div>
						
					</div>
				</div>
			</div>

<div class="col-lg-6 col-md-12" >
	<div class="dashboard-list-box margin-top-0">
		<h4 class="gray">{{ __('front.account_holder') }}</h4>
		<div class="dashboard-list-box-static my-profile">
			
							<label>{{ __('front.account_holder_name') }}</label>
							<input id="account_holder_name" name="account_holder_name" value="{{$client['account_holder_name']}}" class="form-control" type="tel">
							<label>{{ __('front.street') }}</label>
							<input  id="account_holder_street" name="account_holder_street" class="form-control" value="{{$client['account_holder_street']}}" type="text" >
							<label>{{ __('front.account_holder_building_number') }}</label>
							<input  id="account_holder_building_number" name="account_holder_building_number" class="form-control" value="{{$client['account_holder_building_number']}}" type="text" >
							<label>{{ __('front.postal_code') }}</label>
							<input  id="account_holder_postal_code" name="account_holder_postal_code" class="form-control" value="{{$client['account_holder_postal_code']}}" type="text" >
							<label>{{ __('front.location') }}</label>
							<input  id="account_holder_location" name="account_holder_location" class="form-control" value="{{$client['account_holder_location']}}" type="text" >
							<label>{{ __('front.country') }}</label>
							<input  id="account_holder_country" name="account_holder_country" class="form-control" value="{{$client['account_holder_country']}}" type="text" >
			
		</div>
	</div>
</div>
<div class="col-lg-6 col-md-12" style="margin-top: 9px;">
	<div class="dashboard-list-box margin-top-0">
		<h4 class="gray">{{ __('front.bank_data') }}</h4>
		<div class="dashboard-list-box-static my-profile">
			
							<label>{{ __('front.bank_data_adress') }}</label>
							<input id="bank_data_adress" name="bank_data_adress" value="{{$client['bank_data_adress']}}" class="form-control" type="tel">
							<label>{{ __('front.bank_data_iban') }}</label>
							<input  id="bank_data_iban" name="bank_data_iban" class="form-control" value="{{$client['bank_data_iban']}}" type="text" >
							<label>{{ __('front.bank_data_bic') }}</label>
							<input  id="bank_data_bic" name="bank_data_bic" class="form-control" value="{{$client['bank_data_bic']}}" type="text" >
							
		</div>
	</div>
</div>

<div class="col-lg-6 col-md-12" style="margin-top: 9px;">
	<div class="dashboard-list-box margin-top-0">
		<h4 class="gray">{{ __('front.languages') }}</h4>
		<div class="dashboard-list-box-static">
			  <label class="container">{{ __('front.german_language') }}
				<input type="checkbox" checked="checked">
				<span class="checkmark"></span>
			  </label>		
			  <label class="container">{{ __('front.english_language') }}
				<input type="checkbox" >
				<span class="checkmark"></span>
			  </label>
			  <label class="container">{{ __('front.italian_language') }}
				<input type="checkbox" >
				<span class="checkmark"></span>
			  </label>
			  <label class="container">{{ __('front.frensh_language') }}
				<input type="checkbox" >
				<span class="checkmark"></span>
			  </label>				
		</div>
	</div>
</div>

<div class="col-lg-6 col-md-12" style="margin-top: 9px;">
	<div class="dashboard-list-box margin-top-0">
		<h4 class="gray">{{ __('front.where_did_you_see_us') }}</h4>
		<div class="dashboard-list-box-static">
			  <label class="container">{{ __('front.Facebook') }}
				<input type="checkbox" checked="checked">
				<span class="checkmark"></span>
			  </label>		
			  <label class="container">{{ __('front.Billboard') }}
				<input type="checkbox" >
				<span class="checkmark"></span>
			  </label>
			  <label class="container">{{ __('front.Print advertisement') }}
				<input type="checkbox" >
				<span class="checkmark"></span>
			  </label>
			  <label class="container">{{ __('front.TV') }}
				<input type="checkbox" >
				<span class="checkmark"></span>
			  </label>
			  <label class="container">{{ __('front.Newsletter') }}
				<input type="checkbox" >
				<span class="checkmark"></span>
			  </label>
			  <label class="container">{{ __('front.Google') }}
				<input type="checkbox" >
				<span class="checkmark"></span>
			  </label>				
			  <label class="container">{{ __('front.YouTube') }}
				<input type="checkbox" >
				<span class="checkmark"></span>
			  </label>
			  <label class="container">{{ __('front.Flyer') }}
				<input type="checkbox" >
				<span class="checkmark"></span>
			  </label>
			   
		</div>
	</div>
</div>

<div class="col-lg-6 col-md-12" style="margin-top: 9px;">
	<div class="dashboard-list-box margin-top-0">
		<h4 class="gray">{{ __('front.instagram_user_name') }}</h4>
		<div class="dashboard-list-box-static">
			<label>{{ __('front.name') }}</label>
			<input id="instagram_user_name" name="instagram_user_name" value="{{$client['instagram_user_name']}}" class="form-control" type="tel">
						
		</div>
	</div>
</div>
<div class="col-lg-6 col-md-12" style="margin-top: 9px;">
	<div class="dashboard-list-box margin-top-0">
		<h4 class="gray">{{ __('front.who_are_you') }}</h4>
		<div class="dashboard-list-box-static">
			<textarea id="who_are_you" name="who_are_you"  class="form-control" >{{$client['who_are_you']}}</textarea>
		</div>
	</div>
</div>
{{Form::submit(__('front.save_profile_changes'),['style'=>'width: 100%;','class'=>'button margin-top-15','name' => 'action'])}}
{{ Form::close() }}
<div class="row" >
	<div class="col-md-12" style="margin-top: 12px;" >
		<div class="dashboard-list-box margin-top-0">
			<h4 class="gray">{{ __('front.login_credentials') }}</h4>
			<div class="dashboard-list-box-static">
				{{ Form::open(['action'=>'App\Http\Controllers\frontend\FClientController@completeRegistrationProfile','method'=>'POST']) }}
	
				<!-- Change Password -->
				<div class="my-profile">
					<label class="margin-top-0">{{ __('front.current_password') }}</label>
					<input type="password" id="password" name="password" >
	
					<label>{{ __('front.new_password') }}</label>
					<input type="password" id="new_password" name="new_password">
	
					<label>{{ __('front.confirm_new_password') }}</label>
					<input type="password" id="confirmed_password" name="confirmed_password">
	
				</div>
				{{Form::submit(__('front.change_password'),['style'=>'width: 100%;','class'=>'button margin-top-15','name' => 'action'])}}
				{{ Form::close() }}
			</div>
		</div>
	</div>

</div>
			<!-- Copyrights -->
			@include('frontend.layout.footer_panel')

		</div>

	</div>
	<!-- Content / End -->
<script>
	 function readProfileImage(input) {
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
		function readProfileCin(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#client_cin')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
		function readProfileDrivingLicence(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#client_driving_licence')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
@endsection
