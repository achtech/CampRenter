
@extends('frontend.layout.layout_panel',['activePage'=>'description'])

@section('content')
<!-- Content
================================================== -->

<div class="dashboard-content">
	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2><strong>{{trans('front.camper_name')}</strong></h2>
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
		@include('frontend.camper.rent_out.sub_menu', ['active_page' => 'description'])

		<div class="col-lg-7 col-md-12">
			<h3><strong>{{trans('front.description')}</strong></h3>
			<p>{{trans('front.description_camper')}</p>
			<div class="col-md-12">
				<textarea cols="40" rows="5" name=""></textarea>
			</div>
			<div class="row">
				<div class="col-md-12">
				<div style="float: right;">
				<a href="{{route('slide_camper')}}" class="button">{{trans('front.apply')}} <i class="fa fa-check-circle"></i></a>
				<a href="{{route('accessories')}}" class="button border">{{trans('front.cancel')}}</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
