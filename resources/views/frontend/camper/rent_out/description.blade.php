
@extends('frontend.layout.layout_panel',['activePage'=>'description'])

@section('content')
<!-- Content
================================================== -->

<div class="dashboard-content">
	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2><strong>{{trans('front.camper_name')}}</strong></h2>
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
		<form  action="{{route('frontend.camper.storePhotos')}}" method="POST">
			@csrf
			<input type="hidden" name="id_campers" value="{{$camper->id}}" />
			<div class="col-lg-7 col-md-12">
				<h3><strong>{{trans('front.description')}}</strong></h3>
				<p>{{trans('front.description_camper')}}</p>
				<div class="col-md-12">
					<textarea cols="40" rows="5" maxlength="5000" minlength="100" name="description_camper" placeholder="At least 20 words ...">{{$camper->description_camper ?? ''}}</textarea>
				</div>
				<div class="row">
					<div class="col-md-12">
					<div style="float: right;">
						{{Form::submit(trans('front.apply'),['style' => 'width:200px','class'=>'button border','name' => 'action'])}}
						{{Form::submit(trans('front.cancel'),['onclick'=>'window.history.go(-1); return false;', 'style' => 'width:200px','class'=>'button border','name' => 'action'])}}
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
