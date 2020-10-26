
@extends('frontend.layout2',['activePage'=>'rent_out'])

@section('content')
<!-- Content
================================================== -->


<!-- Titlebar -->
<div id="titlebar">
	<div class="row">
		<div class="col-md-12">
			<h2>Create your camper profile</h2>
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
	<div class="col-lg-12">
		<div id="add-listing">

			<!-- Section -->
			<div class="add-listing-section">

				<!-- Headline -->
				<div class="add-listing-headline">
					<h3>1. Which type of vehicle do you want to rent out?</h3>
				</div>


				<!-- Headline -->
				<div class="add-listing-headline">
					<h3>2. Give your camper a lovely name</h3>
				</div>

				<!-- Title -->
				<div class="row with-forms">
					<div class="col-md-12">
						<div class="col-md-12">
							<input type="text" placeholder="e.g. 964 School Street">
						</div>
					</div>
				</div>
				<!-- Title -->
				<div class="row with-forms">
					<div class="col-md-12">
						<div class="col-md-12">
							<input type="text" placeholder="e.g. 964 School Street">
						</div>
					</div>
				</div>
			</div>
			<!-- Section / End -->
			<a href="#" class="button preview">Apply <i class="fa fa-check-circle"></i></a>
		</div>
	</div>
</div>
@endsection
