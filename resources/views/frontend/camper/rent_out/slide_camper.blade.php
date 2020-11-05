
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
		@include('frontend.camper.rent_out.sub_menu')

		<div class="col-lg-7 col-md-12">
			<h3><strong>Photos</strong></h3>
			<p>Add photos to each category (or more if necessary). With the help of the instructions and requirements, we'll help you to show your camper in its best perspective.</p>

			<div class="row">
				<div class="col-md-12">
				<div style="float: right;">
				<a href="{{route('insurance_front')}}" class="button">{{trans('front.apply')}} <i class="fa fa-check-circle"></i></a>
				<a href="{{route('description')}}" class="button border">{{trans('front.cancel')}}</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
