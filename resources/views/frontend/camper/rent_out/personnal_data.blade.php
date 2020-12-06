
@extends('frontend.layout.layout_panel',['activePage'=>'rent_out_details','footerPage' => 'true'])
@section('content')
<!-- Content
================================================== -->

<div class="dashboard-content">
	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2><strong>{{trans('front.camper_name')}}</strong></h2>
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						{{ Breadcrumbs::render('rentOut') }}
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- sub_menu -->
		@include('frontend.camper.rent_out.sub_menu', ['active_page'=>'rent_out_details'])

		<div class="col-lg-7 col-md-12">
			<h2 style="padding: 10px;"><strong>{{trans('front.complete_personnal_data')}}</strong></h2>
			{{ Form::open(['action'=>'App\Http\Controllers\frontend\FC_rentOutController@store2', 'enctype'=>'multipart/form-data','autocomplete'=>'off','method'=>'POST']) }}
				<meta name="csrf-token" content="{{ csrf_token() }}">
				<input type="hidden" name="id_campers" value="{{$camper->id}}" />
 				<div class="margin-top-0">
					<ul style="list-style-type:none; padding-left: 0px;">
						<li>
							<div class="row">
								<!-- Phone -->
								<div class="col-md-6">
									<input type="text" placeholder="{{trans('front.first_name')}}" name="client_name" value="{{$client->client_name ?? ''}}">
								</div>

								<!-- Website -->
								<div class="col-md-6">
									<input type="text" placeholder="{{trans('front.last_name')}}" name="client_last_name" value="{{$client->client_last_name ?? ''}}">
								</div>
							</div>
						</li>
						<li>
							<div class="row opening-day">
								<div class="col-md-12">
									<select name="sex" class="chosen-select" data-placeholder="{{trans('front.sex')}}">
										<option label="Opening Time"></option>
										<option value="female" @if($client->sex=="female") selected @endif>{{trans('front.female')}}</option>
										<option value="male" @if($client->sex=="male") selected @endif>{{trans('front.male')}}</option>
									</select>
								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<!-- Phone -->
								<div class="col-md-8">
									<input type="text" placeholder="{{trans('front.street')}}" name="street" value="{{$client->street ?? ''}}"> 
								</div>

								<!-- Website -->
								<div class="col-md-4">
									<input type="text" placeholder="{{trans('front.street_um')}}"  name="street_number" value="{{$client->street_number ?? ''}}">
								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<!-- Phone -->
								<div class="col-md-8">
									<input type="text" placeholder="{{trans('front.location')}}" name="location" value="{{$client->location ?? ''}}">
								</div>

								<!-- Website -->
								<div class="col-md-4">
									<input type="text" placeholder="{{trans('front.postal_code')}}" name="postal_code" value="{{$client->postal_code ?? ''}}">
								</div>
							</div>
						</li>
						<li>
							<!-- Phone -->
							<div class="row opening-day">
								<div class="col-md-4">
									<select class="chosen-select" data-placeholder="{{trans('front.country')}}" name="country" >
										<option label="Opening Time"></option>
										<option value="suisse" @if($client->country=="suisse") selected @endif >Switezland</option>
										<option value="germany" @if($client->country=="germany") selected @endif >Germany</option>
										<option value="italy" @if($client->country=="italy") selected @endif >Italy</option>
										<option value="spain" @if($client->country=="spain") selected @endif >Spain</option>
									</select>
								</div>

								<!-- Website -->
								<div class="col-md-4">
									<input type="text" placeholder="+41"  name="telephone_code" value="{{$client->telephone_code ?? ''}}">
								</div>
								<div class="col-md-4">
									<input type="text" placeholder="{{trans('front.mobile_number')}}" name="telephone" value="{{$client->telephone ?? ''}}">
									<h6><i class="im im-icon-Danger"></i> {{trans('front.format_num')}}</h6>
								</div>
							</div>
						</li>

						<li>
							<!-- Phone -->
							<h3>{{trans('front.date_birth')}}</h3>
							<div class="row opening-day">
								<div class="col-md-4">
									<select name="day_of_birth" id="day_of_birth" class="chosen-select" data-placeholder="Day">
										@for($i=1;$i<=31;$i++)
											<option value="{{$i}}" @if($client->day_of_birth==$i) selected @endif>{{$i}}</option>
										@endfor
									</select>
								</div>
								<div class="col-md-4">
									<select name="month_of_birth" id="month_of_birth" class="chosen-select" data-placeholder="Month">
										@for($i=1;$i<=12;$i++)
											<option value="{{$i}}" @if($client->month_of_birth==$i) selected @endif>{{$i}}</option>
										@endfor
									</select>
								</div>
								<div class="col-md-4">
									<select name="year_of_birth" id="year_of_birth" class="chosen-select" data-placeholder="Year">
										@for($i=1920;$i<=2100;$i++)
											<option value="{{$i}}" @if($client->year_of_birth==$i) selected @endif>{{$i}}</option>
										@endfor
									</select>
								</div>

							</div>
						</li>

						<li>
							<!-- Phone -->
							<h3>{{trans('front.profile_pic')}}</h3>
							
							<div class="submit-section" style="margin-top:40px;">
								<div>
									<input type="file" id="photo" name="photo" class="button medium border upload custom-file-input" />
								</div>
								<div class="user-profile-avatar"  style="float:right;"><img src="" alt=""></div>
							</div>
						</li>
					</ul>
					<ul style="list-style-type:none; margin-top:30px; padding-left: 0px;">
						<li>
						{{trans('front.additional_info')}}
						</li>
						<li>
							<div class="checkboxes in-row margin-bottom-20">
								<input id="check-x" type="checkbox" name="professional_rental_company"  value="1" @if($client->professional_rental_company) checked @endif >
								<label for="check-x">{{trans('front.pro_rental_campany')}}</label>
								<h6>{{trans('front.renting_income')}}</h6>
							</div>
						</li>
						<li>
						{{trans('front.banking_date')}}
						</li>
						<li>
							<h3>{{trans('front.account_holder')}}</h3>

						</li>
						<li>
							<div class="row">
								<div class="col-md-12">
									<input type="text" placeholder="{{trans('front.Name')}}" name="account_holder_name" value="{{$client->account_holder_name ?? ''}}">
								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<!-- Phone -->
								<div class="col-md-8">
									<input type="text" placeholder="{{trans('front.street')}}" name="account_holder_location" value="{{$client->account_holder_location ?? ''}}">
								</div>

								<!-- Website -->
								<div class="col-md-4">
									<input type="text" placeholder="{{trans('front.building_number')}}" name="account_holder_street" value="{{$client->account_holder_street ?? ''}}">
								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<!-- Website -->
								<div class="col-md-4">
									<input type="text" placeholder="{{trans('front.postal_code')}}" name="account_holder_building_number" value="{{$client->account_holder_building_number ?? ''}}">
								</div>
								<div class="col-md-8">
									<select class="chosen-select" data-placeholder="{{trans('front.country')}}" value="account_holder_country">
										<option ></option>
										<option value="suisse" @if($client->account_holder_country=="suisse") selected @endif >Switezland</option>
										<option value="germany" @if($client->account_holder_country=="germany") selected @endif >Germany</option>
										<option value="italy" @if($client->account_holder_country=="italy") selected @endif >Italy</option>
										<option value="spain" @if($client->account_holder_country=="spain") selected @endif >Spain</option>
									</select>
								</div>
							</div>

						</li>
						<li>
							<h3>{{trans('front.bank_data')}}</h3>
						</li>
						<li>
							<div class="form">
								<h5>{{trans('front.adress')}}</h5>
								<textarea class="WYSIWYG"  cols="20" rows="4"  name="bank_data_adress">{{$client->bank_data_adress ?? ''}}</textarea>
							</div>
						</li>
						<li>
							<div class="row">
								<div class="col-md-12">
									<input type="text" placeholder="IBAN"  name="bank_data_iban" value="{{$client->bank_data_iban ?? ''}}">
								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<div class="col-md-12">
									<input type="text" placeholder="BIC" name="bank_data_bic" value="{{$client->bank_data_bic ?? ''}}">
									<h6>{{trans('front.bic_require')}}</h6>
								</div>
							</div>
						</li>
						<li>
							<h3>{{trans('front.languages')}}</h3>
						</li>
						<li>

								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="language[]"  value="DE" @if(isset($languages) && is_array($languages) && in_array("DE",$languages)) checked @endif>
									<label for="check-a">{{trans('front.german')}}</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-b" type="checkbox" name="language[]"  value="EN" @if(isset($languages) && is_array($languages) && in_array("EN",$languages)) checked @endif>
									<label for="check-b">{{trans('front.english')}}</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-c" type="checkbox" name="language[]"  value="IT" @if(isset($languages) && is_array($languages) && in_array("IT",$languages)) checked @endif>
									<label for="check-c">{{trans('front.italian')}}</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-d" type="checkbox" name="language[]"  value="FR" @if(isset($languages) && is_array($languages) && in_array("FR",$languages)) checked @endif>
									<label for="check-d">{{trans('front.french')}}</label>
								</div>
						</li>
						<li>
							<h3>{{trans('front.where_see_us')}}</h3>
						</li>
						<li>
								<div class="checkboxes in-row">
								<input id="check-e" type="checkbox" name="where_you_see_us[]" value="Facebook" @if(isset($useUs) && is_array($useUs) && in_array("Facebook",$useUs)) checked @endif>
									<label for="check-e">Facebook</label>
								</div>
								<div class="checkboxes in-row">
								<input id="check-f" type="checkbox" name="where_you_see_us[]" value="Billboard" @if(isset($useUs) && is_array($useUs) && in_array("Billboard",$useUs)) checked @endif>
									<label for="check-f">{{trans('front.billboard')}}</label>
								</div>
								<div class="checkboxes in-row">
								<input type="checkbox" name="where_you_see_us[]" id="check-g" value="Print"  @if(isset($useUs) && is_array($useUs) && in_array("Print",$useUs)) checked @endif> 
									<label for="check-g">{{trans('front.print_advertisement')}}</label>
								</div>
								<div class="checkboxes in-row">
								<input type="checkbox" name="where_you_see_us[]" id="check-h" value="TV" @if(isset($useUs) && is_array($useUs) && in_array("TV",$useUs)) checked @endif>
									<label for="check-h">TV</label>
								</div>
								<div class="checkboxes in-row">
								<input type="checkbox" name="where_you_see_us[]" id="check-i" value="Newsletter" @if(isset($useUs) && is_array($useUs) && in_array("Newsletter",$useUs)) checked @endif>
									<label for="check-i">Newsletter</label>
								</div>
								<div class="checkboxes in-row">
								<input type="checkbox" name="where_you_see_us[]" id="check-j" value="Google" @if(isset($useUs) && is_array($useUs) && in_array("Google",$useUs)) checked @endif>
									<label for="check-j">Google</label>
								</div>
								<div class="checkboxes in-row ">
								<input type="checkbox" name="where_you_see_us[]" id="check-k" value="YouTube" @if(isset($useUs) && is_array($useUs) && in_array("YouTube",$useUs)) checked @endif>
									<label for="check-k">YouTube</label>
								</div>
								<div class="checkboxes in-row ">
								<input type="checkbox" name="where_you_see_us[]" id="check-l" value="Flyer" @if(isset($useUs) && is_array($useUs) && in_array("Flyer",$useUs)) checked @endif>
									<label for="check-l">Flyer</label>
									<h6>{{trans('front.where_you_came')}}</h6>
								</div>
						</li>
						<li>
							<div class="row">
								<div class="col-md-12">
									<input type="text" placeholder="Instagram user name"  name="instagram_user_name" value="{{$client->instagram_user_name ?? ''}}">	
								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<h3 class="col-md-12">{{trans('front.who_are_you')}}</h3>
							</div>
						</li>
						<li>
							<div class="row">
								<div class="col-md-12">
									<textarea class="WYSIWYG" cols="20" rows="4"  name="who_are_you">{{$client->who_are_you}}</textarea>
								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<div class="col-md-12">
									<div style="float: right;">
									{{Form::submit(trans('front.apply'),['style' => 'width:200px','class'=>'button border','name' => 'action'])}}
									{{Form::submit(trans('front.cancel'),['onclick'=>'window.history.go(-1); return false;', 'style' => 'width:200px','class'=>'button border','name' => 'action'])}}
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@endsection
