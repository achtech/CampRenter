
@extends('frontend.layout2',['activePage'=>'rent_out_details'])

@section('content')
<!-- Content
================================================== -->


<!-- Titlebar -->
<div id="titlebar">
	<div class="row">
		<div class="col-md-12">
			<h2>Camper name</h2>
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
	<div class="col-lg-5 col-md-12">

		<div class="dashboard-list-box margin-top-0">
			<ul>
				<li>
					<img class="headline right" src="{{ asset('images/rent-out-camper/camper_rent.png') }}"/>

				</li>

				<li>

				</li>

				<li>

				</li>
			</ul>
		</div>
	</div>

	<div class="col-lg-7 col-md-12">

		<div class="dashboard-list-box margin-top-0">
			<ul>
				<li>
					<img class="headline right" src="{{ asset('images/rent-out-camper/camper_rent.png') }}"/>

				</li>

				<li>

				</li>

				<li>

				</li>
			</ul>
		</div>
	</div>
</div>
@endsection
