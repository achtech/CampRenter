
@extends('frontend.layout2',['activePage'=>'slide_camper'])

@section('content')
<!-- Content
================================================== -->

<div class="dashboard-content">
	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2><strong>{{trans('front.gallery')}}</strong></h2>
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
		<!-- Section -->
		<div class="add-listing-section margin-top-45" style="padding-bottom: 0px;">
			<!-- Dropzone -->
			<div class="submit-section margin-top-45">
				<form action="/file-upload" class="dropzone dz-clickable">
					<div class="dz-default dz-message">
							<span><i class="sl sl-icon-plus"></i> {{trans('front.drop_photos')}}</span>
					</div>
				</form>
			</div>
			<!-- Section / End -->
		</div>
</div>
@endsection
