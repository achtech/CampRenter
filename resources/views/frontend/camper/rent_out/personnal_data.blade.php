
@extends('frontend.layout.layout_panel',['activePage'=>'rent_out_details','footerPage' => 'true'])
@section('content')
<!-- Content
================================================== -->

<div class="dashboard-content">
	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2><strong>Camper name</strong></h2>
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Add Listing</li>
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
			<div class="margin-top-0">
				<ul style="list-style-type:none; padding-left: 0px;">
					<li>
						<div class="row opening-day">
							<div class="col-md-12">
								<select class="chosen-select" data-placeholder="Sex" name="sex">
									<option label="Opening Time"></option>
									<option value="female">{{trans('front.female')}}</option>
									<option value="male">{{trans('front.male')}}</option>
								</select>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<input type="text" name="client_name" placeholder="{{trans('front.first_name')}}">
							</div>
							<div class="col-md-6">
								<input type="text" name="client_last_name" placeholder="{{trans('front.last_name')}}">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-8">
								<input type="text" name="street" placeholder="{{trans('front.street')}}">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<input type="text" name="street_number" placeholder="{{trans('front.street_um')}}">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-8">
								<input type="text" name="location" placeholder="{{trans('front.location')}}">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<input type="text" name="postal_code" placeholder="{{trans('front.postal_code')}}">
							</div>
						</div>
					</li>
					<li>
						<!-- Phone -->
						<div class="row opening-day">
							<div class="col-md-5">
								<select class="chosen-select" name="country" data-placeholder="{{trans('front.country')}}">
									<option label="Opening Time"></option>
									<option>Switezland</option>
									<option>Germany</option>
									<option>Italy</option>
								</select>
							</div>

							<!-- Website -->
							<div class="col-md-3">
								<input type="text" name="telephone_code" placeholder="+41">
							</div>
							<div class="col-md-4">
								<input type="text" name="telephone"  placeholder="{{trans('front.mobile_number')}}">
								<h6><i class="im im-icon-Danger"></i> {{trans('front.format_num')}}</h6>
							</div>
						</div>
					</li>

					<li>
						<!-- Phone -->
						<h3>{{trans('front.date_birth')}}</h3>
						<div class="row opening-day">
							<div class="col-md-4">
								<input type="text" name="day_of_birth" placeholder="{{trans('front.day')}}">
							</div>
							<!-- Website -->
							<div class="col-md-4">
								<input type="text" name="month_of_birth" placeholder="{{trans('front.month')}}">
							</div>
							<div class="col-md-4">
								<input type="text" name="year_of_birth" placeholder="{{trans('front.year')}}">
							</div>
						</div>
					</li>
				</ul>
				<ul style="list-style-type:none; margin-top:30px; padding-left: 0px;">
					<li>
						{{trans('front.additional_info')}}
					</li>
					<li>
						<div class="checkboxes in-row margin-bottom-20">

							
						</div>
					</li>

						<li>
							<div class="row">
								<div class="col-md-12">
									<input type="text" placeholder="Location">
								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<!-- Phone -->
								<div class="col-md-8">
									<input type="text" placeholder="Location">
								</div>

							<input id="professional_rental_company" type="checkbox" name="professional_rental_company">
							<label for="professional_rental_company">{{trans('front.pro_rental_campany')}}</label>
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
								<input type="text" name="account_holder_name" placeholder="{{trans('front.name')}}">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-8">
								<input type="text" name="account_holder_street" placeholder="{{trans('front.street')}}">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<input type="text" name="account_holder_building_number" placeholder="{{trans('front.building_number')}}">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Website -->
							<div class="col-md-4">
								<input type="text" name="account_holder_postal_code" placeholder="{{trans('front.postal_code')}}">
							</div>
							<!-- Phone -->
							<div class="col-md-8">
								<input type="text" name="account_holder_location" placeholder="Location">
							</div>
						</div>

					</li>
					<li>
						<div class="row">
							<div class="col-md-12">
							<select class="chosen-select" name="account_holder_country" data-placeholder="{{trans('front.country')}}">
									<option label="Opening Time"></option>
									<option>Switezland</option>
									<option>Germany</option>
									<option>Italy</option>
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
							<textarea class="WYSIWYG" name="bank_data_adress" cols="20" rows="1" id="bank_data_adress" spellcheck="true"></textarea>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-12">
								<input type="text" name="bank_data_iban" placeholder="IBAN">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-12">
								<input type="text" name="bank_data_bic" placeholder="BIC">
								<h6>{{trans('front.bic_require')}}</h6>
							</div>
						</div>
					</li>
					<li>
						<h3>{{trans('front.languages')}}</h3>
					</li>
					<li>

								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">{{trans('front.german')}}</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">{{trans('front.english')}}</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">{{trans('front.italian')}}</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">{{trans('front.french')}}</label>
								</div>
						</li>
						<li>
							<h3>{{trans('front.where_see_us')}}</h3>
						</li>
						<li>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Facebook</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">{{trans('front.billboard')}}</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">{{trans('front.print_advertisement')}}</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">TV</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Newsletter</label>
								</div>
								<div class="checkboxes in-row">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Google</label>
								</div>
								<div class="checkboxes in-row ">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">YouTube</label>
								</div>
								<div class="checkboxes in-row ">
									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Flyer</label>
									<h6>{{trans('front.where_you_came')}}</h6>
								</div>
						</li>
						<li>
							<div class="row">
								<div class="col-md-12">
									<input type="text" placeholder="IBAN">
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
									<textarea class="WYSIWYG" name="summary" cols="20" rows="1" id="summary" spellcheck="true"></textarea>
								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<div class="col-md-12">
								<div style="float: right;">
									<a href="{{route('camper_steps')}}" class="button">{{trans('front.apply')}} <i class="fa fa-check-circle"></i></a>
									<a href="{{route('rent_out')}}" class="button border">{{trans('front.cancel')}}</a>
								</div>
							</div>
					</li>
					<li>
						<h3>{{trans('front.where_see_us')}}</h3>
					</li>
					<li>
							<div class="checkboxes in-row">
								<input id="check-a" type="checkbox" name="check">
								<label for="check-a">Facebook</label>
							</div>
							<div class="checkboxes in-row">
								<input id="check-a" type="checkbox" name="check">
								<label for="check-a">{{trans('front.billboard')}}</label>
							</div>
							<div class="checkboxes in-row">
								<input id="check-a" type="checkbox" name="check">
								<label for="check-a">{{trans('front.print_advertisement')}}</label>
							</div>
							<div class="checkboxes in-row">
								<input id="check-a" type="checkbox" name="check">
								<label for="check-a">TV</label>
							</div>
							<div class="checkboxes in-row">
								<input id="check-a" type="checkbox" name="check">
								<label for="check-a">Newsletter</label>
							</div>
							<div class="checkboxes in-row">
								<input id="check-a" type="checkbox" name="check">
								<label for="check-a">Google</label>
							</div>
							<div class="checkboxes in-row ">
								<input id="check-a" type="checkbox" name="check">
								<label for="check-a">YouTube</label>
							</div>
							<div class="checkboxes in-row ">
								<input id="check-a" type="checkbox" name="check">
								<label for="check-a">Flyer</label>
								<h6>{{trans('front.where_you_came')}}</h6>
							</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-12">
								<input type="text" placeholder="{{trans('front.other')}}">
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
								<textarea class="WYSIWYG" name="who_are_you" cols="20" rows="1" id="who_are_you" spellcheck="true"></textarea>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-12">
							<div style="float: right;">
								<a href="{{route('camper_steps')}}" class="button">{{trans('front.apply')}} <i class="fa fa-check-circle"></i></a>
								<a href="{{route('rent_out')}}" class="button border">{{trans('front.cancel')}}</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
