
@extends('frontend.layout.layout',['activePage'=>'rent_out_details','footerPage' => 'true'])
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
		@include('frontend.camper.rent_out.sub_menu')

		<div class="col-lg-7 col-md-12">
		<h2 style="padding: 10px;"><strong>Complete your personnel data</strong></h2>
			<div class="margin-top-0">
				<ul style="list-style-type:none; padding-left: 0px;">
					<li>
						<div class="row opening-day">
							<div class="col-md-10">
								<select class="chosen-select" data-placeholder="Sex">
									<option label="Opening Time"></option>
									<option>{{trans('front.female')}}</option>
									<option>{{trans('front.male')}}</option>
								</select>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<input type="text" placeholder="{{trans('front.first_name')}}">
							</div>

							<!-- Website -->
							<div class="col-md-6">
								<input type="text" placeholder="{{trans('front.last_name')}}">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-8">
								<input type="text" placeholder="{{trans('front.street')}}">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<input type="text" placeholder="{{trans('front.street_um')}}">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-8">
								<input type="text" placeholder="{{trans('front.location')}}">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<input type="text" placeholder="{{trans('front.postal_code')}}">
							</div>
						</div>
					</li>
					<li>
						<!-- Phone -->
						<div class="row opening-day">
							<div class="col-md-5">
								<select class="chosen-select" data-placeholder="{{trans('front.country')}}">
									<option label="Opening Time"></option>
									<option>Switezland</option>
									<option>Germany</option>
									<option>Italy</option>
								</select>
							</div>

							<!-- Website -->
							<div class="col-md-3">
								<input type="text" placeholder="+41">
							</div>
							<div class="col-md-4">
								<input type="text" placeholder="{{trans('front.mobile_number')}}">
								<h6><i class="im im-icon-Danger"></i> {{trans('front.format_num')}}</h6>
							</div>
						</div>
					</li>

					<li>
						<!-- Phone -->
						<h3>{{trans('front.date_birth')}}</h3>
						<div class="row opening-day">
							<div class="col-md-5">
								<input type="text" placeholder="{{trans('front.day')}}">
							</div>

							<!-- Website -->
							<div class="col-md-3">
								<input type="text" placeholder="{{trans('front.month')}}">
							</div>
							<div class="col-md-4">
								<input type="text" placeholder="{{trans('front.year')}}">
							</div>
						</div>
					</li>

					<li>
						<!-- Phone -->
						<h3>{{trans('front.profile_pic')}}</h3>
						<div class="submit-section" style="margin-top:40px;">
							<div>
								<a href="" class="button medium border">{{trans('front.upload')}}</a>
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

							<input id="check-a" type="checkbox" name="check">
							<label for="check-a">{{trans('front.pro_rental_campany')}}</label>
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

							<!-- Website -->
							<div class="col-md-4">
								<input type="text" placeholder="Postal Code">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Website -->
							<div class="col-md-4">
								<input type="text" placeholder="Postal Code">
							</div>
							<!-- Phone -->
							<div class="col-md-8">
								<input type="text" placeholder="Location">
							</div>
						</div>

					</li>
					<li>
						<div class="row">
							<div class="col-md-12">
							<select class="chosen-select" data-placeholder="Country">
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
							<textarea class="WYSIWYG" name="summary" cols="20" rows="1" id="summary" spellcheck="true"></textarea>
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
							<div class="col-md-12">
								<input type="text" placeholder="BIC">
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
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
