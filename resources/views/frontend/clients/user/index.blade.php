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
						{{ Breadcrumbs::render('profil') }}
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
						{{ Form::open(['action'=>'App\Http\Controllers\frontend\FClientController@completeRegistrationProfile','enctype'=>'multipart/form-data','autocomplete'=>'off','method'=>'POST']) }}

						<!-- Avatar -->
					<div class="row">
						<div class="col-md-6">
							<div class="edit-profile-photo">
							<img src="{{asset('images/clients')}}/{{$client['photo']}}" alt="" id="client_image">
								<div class="change-photo-btn">
									<div class="photoUpload custom-file">
								    	<span><i class="fa fa-upload"></i> {{ __('front.upload_photos') }}</span>
								    	<input type="file" id="photo" name="photo" class="upload custom-file-input" onchange="readProfileImage(this);" />
									</div>
								</div>
							</div>
						</div>
					<div class="col-md-6">
						<div class="edit-profile-photo">

							<div class="row" style="height: 62px;">
								<div class="row" style="height: 62px;">
									@foreach($avatars as $elem)
									<div class="col-md-2">
										<label>
											<input type="radio" class="avatar-design {{$elem->id==$client['id_avatars'] ? 'checked-avatars':''}}" name="id_avatars" id="id_avatars" value="{{$elem->image}}">
											<img src="images/clients/{{$elem->image}}" alt="" class="avatar">
										</label>
									</div>
									<div class="col-md-2"></div>
									@endforeach
								</div>

								<div class="row" style="height: 62px;">
									@foreach($avatars_second as $elem)
									<div class="col-md-2">
										<label>
											<input type="radio" class="avatar-design {{$elem->id==$client['id_avatars'] ? 'checked-avatars':''}}" name="id_avatars" id="id_avatars" value="{{$elem->image}}">
											<img src="images/clients/{{$elem->image}}" alt="" class="avatar">
										</label>
									</div>
									<div class="col-md-2"></div>
									@endforeach
								</div>
								<div class="row" style="height: 62px;">
									@foreach($avatars_third as $elem)
									<div class="col-md-2">
										<label>
										<input type="radio" class="avatar-design {{$elem->id==$client['id_avatars'] ? 'checked-avatars':''}}" name="id_avatars" id="id_avatars" value="{{$elem->image}}" >
											<img src="images/clients/{{$elem->image}}" alt="" class="avatar">
										</label>
									</div>
									<div class="col-md-2"></div>
									@endforeach
								</div>
							</div>

							</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="edit-profile-photo">
							<img src="images/clients/{{$client['image_national_id']}}" alt="" id="client_cin">
							<div class="change-photo-btn">
								<div class="photoUpload custom-file">
									<span><i class="fa fa-upload"></i> {{ __('front.upload_image_national') }}</span>
									<input type="file" id="image_national_id" name="image_national_id" class="upload custom-file-input" onchange="readProfileCin(this);" />
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="edit-profile-photo">
						<img src="images/clients/{{$client['driving_licence_image']}}" alt="" id="client_driving_licence">
						<div class="change-photo-btn">
							<div class="photoUpload custom-file">
								<span><i class="fa fa-upload"></i> {{ __('front.driving_licence') }}</span>
								<input type="file" id="driving_licence_image" name="driving_licence_image" class="upload custom-file-input" onchange="readProfileDrivingLicence(this);" />
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
							<input  id="email" name="email" class="form-control" value="{{$client['email']}}" type="text" disabled>
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
							<input id="telephone" name="telephone" class="form-control" value="{{$client['telephone']}}" type="text">
							<label>{{ __('front.profil_phone_code') }}</label>
							<input id="telephone_code" name="telephone_code" class="form-control" value="{{$client['telephone_code']}}" type="text">
							<label>{{ __('front.profil_review') }}</label>
							<input id="review" name="review" class="form-control" value="{{$client['review']}}" type="text">
							<label>{{ __('front.profile_driving_licence') }}</label>
							<input id="driving_licence" name="driving_licence" class="form-control" value="{{$client['driving_licence']}}" type="tel">
							<label>{{ __('front.profile_status') }}</label>
							<input id="status" name="status" class="form-control" value="{{$client_status}}" type="text" disabled>
							<label>{{ __('front.national_code') }}</label>
							<input id="national_id" name="national_id" class="form-control" value="{{$client['national_id']}}" type="text" >
							<label>{{ __('front.day_of_birth') }}</label>
							<input id="day_of_birth" name="day_of_birth" class="form-control" value="{{$client['day_of_birth']}}" maxlength="2" type="text">
							<label>{{ __('front.month_of_birth') }}</label>
							<input id="month_of_birth" name="month_of_birth" class="form-control"  value="{{$client['month_of_birth']}}" maxlength="2" type="text">
							<label>{{ __('front.year_of_birth') }}</label>
							<input id="year_of_birth" name="year_of_birth" class="form-control"   value="{{$client['year_of_birth']}}" maxlength="4" type="text">

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
			  <label class="language-design">{{ __('front.german_language') }}
				<input type="checkbox" class="{{$client['language']=='German' ? 'checked-language':''}}">
				<span class="checkmark"></span>
			  </label>
			  <label class="language-design">{{ __('front.english_language') }}
				<input type="checkbox" class="{{$client['language']=='English' ? 'checked-language':''}}">
				<span class="checkmark"></span>
			  </label>
			  <label class="language-design">{{ __('front.italian_language') }}
				<input type="checkbox" class="{{$client['language']=='Italian' ? 'checked-language':''}}">
				<span class="checkmark"></span>
			  </label>
			  <label class="language-design">{{ __('front.frensh_language') }}
				<input type="checkbox" class="{{$client['language']=='French' ? 'checked-language':''}}">
				<span class="checkmark"></span>
			  </label>
		</div>
	</div>
</div>

<div class="col-lg-6 col-md-12" style="margin-top: 9px;">
	<div class="dashboard-list-box margin-top-0">
		<h4 class="gray">{{ __('front.where_did_you_see_us') }}</h4>
		<div class="dashboard-list-box-static">
			  <label class="language-design">{{ __('front.Facebook') }}
				<input type="checkbox" class="{{$client['where_you_see_us']=='Facebook' ? 'checked-language':''}}">
				<span class="checkmark"></span>
			  </label>
			  <label class="language-design">{{ __('front.Billboard') }}
				<input type="checkbox" class="{{$client['where_you_see_us']=='Billboard' ? 'checked-language':''}}">
				<span class="checkmark"></span>
			  </label>
			  <label class="language-design">{{ __('front.Print advertisement') }}
				<input type="checkbox" class="{{$client['where_you_see_us']=='Print advertisement' ? 'checked-language':''}}">
				<span class="checkmark"></span>
			  </label>
			  <label class="language-design">{{ __('front.TV') }}
				<input type="checkbox" class="{{$client['where_you_see_us']=='TV' ? 'checked-language':''}}">
				<span class="checkmark"></span>
			  </label>
			  <label class="language-design">{{ __('front.Newsletter') }}
				<input type="checkbox" class="{{$client['where_you_see_us']=='Newsletter' ? 'checked-language':''}}">
				<span class="checkmark"></span>
			  </label>
			  <label class="language-design">{{ __('front.Google') }}
				<input type="checkbox" class="{{$client['where_you_see_us']=='Google' ? 'checked-language':''}}">
				<span class="checkmark"></span>
			  </label>
			  <label class="language-design">{{ __('front.YouTube') }}
				<input type="checkbox" class="{{$client['where_you_see_us']=='YouTube' ? 'checked-language':''}}">
				<span class="checkmark"></span>
			  </label>
			  <label class="language-design">{{ __('front.Flyer') }}
				<input type="checkbox" class="{{$client['where_you_see_us']=='Flyer' ? 'checked-language':''}}">
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
			<textarea id="who_are_you" name="who_are_you"  class="form-control"  rows="9" cols="33" >{{$client['who_are_you']}}</textarea>
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
				{{ Form::open(['route'=>'frontend.client.change_password','method'=>'POST']) }}
					@csrf
					<div class="my-profile2">
						<div class="row" >
								<div class="col-md-4">
									<label class="margin-top-0">{{ __('front.current_password') }}</label>
									<input type="password" id="password" name="password" >
								</div>
								<div class="col-md-4">
									<label>{{ __('front.new_password') }}</label>
									<input type="password" id="new_password" name="new_password">
								</div>
								<div class="col-md-4">		
									<label>{{ __('front.confirm_new_password') }}</label>
									<input type="password" id="confirmed_password" name="confirmed_password">
								</div>
						</div>
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
		$(".checked-avatars" ).prop("checked", true );
		$(".checked-language" ).prop("checked", true );
</script>
@endsection
