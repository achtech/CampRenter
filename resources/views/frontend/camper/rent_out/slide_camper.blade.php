
@extends('frontend.layout.layout_panel',['activePage'=>'slide_camper'])

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
		@include('frontend.camper.rent_out.sub_menu', ['active_page' => 'slide_camper'])

		<div class="col-lg-7 col-md-12">
			<h3><strong>Photos</strong></h3>
			<div class="input-group mb-3">
			<a type="file" name="image" class="button border" id="inputGroupFile01">{{trans('front.cancel')}}</a>
				<div class="custom-file">
					<label class="button border" for="inputGroupFile01">{{ __('backend.Choose file') }} </label>
				</div>
			</div>
			<div class="row">
				<div class="listing-slider-small mfp-gallery-container margin-bottom-0">

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
