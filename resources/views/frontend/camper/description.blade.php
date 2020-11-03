
@extends('frontend.layout2',['activePage'=>'description'])

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
							<h6>{{trans('front.state')}}:</h6>
							  <p>Draft</p>
						</div>
					</li>
					<li>
						<div class="row">
              <div class="col-md-12">
                <h3 style="margin-top: 0px;"><strong>{{trans('front.the_vehicle')}}</strong></h3>
                <div class="numbered color filled">
                  <ol>
                    <li style="padding: 8px 5px !important;">{{trans('front.vehicle_data')}}</li>
                    <li style="padding: 8px 5px !important;">{{trans('front.equipment')}}</li>
                    <li style="padding: 8px 5px !important;">{{trans('front.extras')}}</li>
                    <li style="padding: 8px 5px !important;">{{trans('front.description')}}</li>
                  </ol>
                </div>
              </div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-10" style="margin-top: -26px;margin-bottom: -15px;">
								<h3><strong>{{trans('front.photos')}}</strong></h3>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
              <h3 style="margin-top: 0px;"><strong>{{trans('front.menu_panel_rentout')}}</strong></h3>
              <div class="numbered color">
                <ol>
                  <li style="padding: 8px 5px !important;">{{trans('front.insurance')}}</li>
                  <li style="padding: 8px 5px !important;">{{trans('front.rental_terms')}}</li>
                  <li style="padding: 8px 5px !important;">{{trans('front.terms')}}</li>
                  <li style="padding: 8px 5px !important;">{{trans('front.Calendar')}}</li>
                </ol>
              </div>
						</div>
					</li>
				</ul>
			</div>
		</div>

		<div class="col-lg-7 col-md-12">
			<h3><strong>Description</strong></h3>
			<p>Describe the vehicle, the equipment, what you experienced with and who it's most suitable for.</p>
      <div class="col-md-12">
        <textarea cols="40" rows="5" name=""></textarea>
      </div>
      <div class="row">
        <div class="col-md-12">
        <div style="float: right;">
          <a href="" class="button">{{trans('front.apply')}} <i class="fa fa-check-circle"></i></a>
          </div>
      </div>
		</div>
	</div>
</div>
@endsection
