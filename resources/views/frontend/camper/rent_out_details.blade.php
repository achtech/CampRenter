
@extends('frontend.layout2',['activePage'=>'rent_out_details'])

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
	<!-- Listings -->
	<div class="col-lg-5 col-md-12" style="margin-bottom:20px;">

		<div class="dashboard-list-box margin-top-0">
			<ul>
				<li>
					<img class="headline right" src="{{ asset('images/rent-out-camper/camper_rent.png') }}"/>
				</li>
				<li>
				<div class="row">
						<h6>Campervan</h6>
						<h3><strong>Camp Name</strong></h3>
					</div>
					<div class="row">
						<h6>State:</h6>
						<p>Camp Name</p>
					</div>
				</li>
				<li>
					<div class="row">
						<h5 style="margin-top: 0px; color:#39b7cd;">Complete the details about your vehicle now.</h5>
						<div>
							<h3 style="margin-top: 20px;"><strong>The vehicle</strong></h3>
							<div class="payment-tab-trigger">
								<input name="cardType" type="radio" value="">
								<label style="padding: 0px;" for="vehicle">Vehicle data</label>

								<input name="cardType" type="radio" value="">
								<label style="padding: 0px;" for="vehicle">Equipment</label>

								<input name="cardType" type="radio" value="">
								<label style="padding: 0px;" for="vehicle">Extras</label>

								<input name="cardType" type="radio" value="">
								<label style="padding: 0px;" for="vehicle">Description</label>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="row">
						<h3 style="margin-top: 0px;"><strong>Photos</strong></h3>
					</div>
				</li>
				<li>
					<div class="row">
						<h3 style="margin-top: 0px;"><strong>Rent out</strong></h3>
						<div class="payment-tab-trigger">
							<input name="cardType" type="radio" value="">
							<label style="padding: 0px;" for="vehicle">Insurance</label>

							<input name="cardType" type="radio" value="">
							<label style="padding: 0px;" for="vehicle">Rental terms</label>

							<input name="cardType" type="radio" value="">
							<label style="padding: 0px;" for="vehicle">Terms</label>

							<input name="cardType" type="radio" value="">
							<label style="padding: 0px;" for="vehicle">Calendar</label>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>

	<div class="col-lg-7 col-md-12">

		<div class="margin-top-0">
			<ul style="list-style-type:none; padding-left: 0px;">
				<li>
					<div class="row opening-day">
						<div class="col-md-10">
							<select class="chosen-select" data-placeholder="Sex">
								<option label="Opening Time"></option>
								<option>Female</option>
								<option>Male</option>
							</select>
						</div>
					</div>
				</li>
				<li>
					<div class="row">
						<!-- Phone -->
						<div class="col-md-6">
							<input type="text" placeholder="First name">
						</div>

						<!-- Website -->
						<div class="col-md-6">
							<input type="text" placeholder="Last name">
						</div>
					</div>
				</li>
				<li>
					<div class="row">
						<!-- Phone -->
						<div class="col-md-8">
							<input type="text" placeholder="Street">
						</div>

						<!-- Website -->
						<div class="col-md-4">
							<input type="text" placeholder="Street Num">
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
					<!-- Phone -->
					<div class="row opening-day">
						<div class="col-md-5">
							<select class="chosen-select" data-placeholder="Country">
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
							<input type="text" placeholder="Mobile Number">
							<h6> Format: 79 123 45 67; Communicated only after booking request is accepted</h6>
						</div>
					</div>
				</li>

				<li>
					<!-- Phone -->
					<h3>Date of birth</h3>
					<div class="row opening-day">
						<div class="col-md-5">
							<input type="text" placeholder="Day">
						</div>

						<!-- Website -->
						<div class="col-md-3">
							<input type="text" placeholder="Month">
						</div>
						<div class="col-md-4">
							<input type="text" placeholder="Year">
						</div>
					</div>
				</li>

				<li>
					<!-- Phone -->
					<h3>Your profile picture</h3>
					<div class="submit-section" style="margin-top:40px;">
						<div>
							<a href="" class="button medium border">Upload</a>
						</div>
						<div class="user-profile-avatar"  style="float:right;"><img src="" alt=""></div>
					</div>
				</li>
			</ul>
			<ul style="list-style-type:none; margin-top:30px; padding-left: 0px;">
				<li>
				Additonal information about the vehicle owner
				</li>
				<li>
					<div class="checkboxes in-row margin-bottom-20">

						<input id="check-a" type="checkbox" name="check">
						<label for="check-a">Professional Rental Company</label>
						<h6> Is the renting out of campers your main source of income?</h6>
					</div>
				</li>
				<li>
				Banking date vehicle owner
				</li>
				<li>
					<h3>Account Holder</h3>

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
					<h3>Bank data</h3>
				</li>
				<li>
					<div class="form">
						<h5>Adress</h5>
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
							<h6>Required for international transfers.</h6>
						</div>
					</div>
				</li>
				<li>
					<h3>Languages</h3>
				</li>
				<li>

						<div class="checkboxes in-row">
							<input id="check-a" type="checkbox" name="check">
							<label for="check-a">German</label>
						</div>
						<div class="checkboxes in-row">
							<input id="check-a" type="checkbox" name="check">
							<label for="check-a">English</label>
						</div>
						<div class="checkboxes in-row">
							<input id="check-a" type="checkbox" name="check">
							<label for="check-a">Italian</label>
						</div>
						<div class="checkboxes in-row">
							<input id="check-a" type="checkbox" name="check">
							<label for="check-a">French</label>
						</div>
				</li>
				<li>
					<h3>Where did you see us last?</h3>
				</li>
				<li>
						<div class="checkboxes in-row">
							<input id="check-a" type="checkbox" name="check">
							<label for="check-a">Facebook</label>
						</div>
						<div class="checkboxes in-row">
							<input id="check-a" type="checkbox" name="check">
							<label for="check-a">Billboard</label>
						</div>
						<div class="checkboxes in-row">
							<input id="check-a" type="checkbox" name="check">
							<label for="check-a">Print advertisement</label>
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
							<h6>Please let us know where you came across us the last time.</h6>
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
						<h3 class="col-md-12">Who are you?</h3>
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
							<a href="" class="button">Apply <i class="fa fa-check-circle"></i></a>
							<a href="/rentout" class="button border">Cancel</a>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
</div>
@endsection
