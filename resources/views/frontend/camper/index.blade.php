
@extends('frontend.layout3',['activePage' => 'camper'])

@section('content')
<!-- Content
================================================== -->
<div class="container" style="width=100%;">
	<div class="row">
		<div class="col-md-6">
			<h3 class="headline margin-top-45" style="font-weight:normal;text-align:left;">
				<strong class="headline-with-separator">{{trans('front.title_1')}}</strong>
			</h3>
			<p>
				{{trans('front.text_content_1_1')}}
			<P>
				{{trans('front.text_content_1_2')}}
			</p>
			<a class="button" href="/rentout">{{trans('front.rent_out_camper')}}</a>
		</div>
		<div class="col-md-6">
			<div>
				<img class="headline right margin-top-45" src="{{ asset('images/rent-out-camper/Rent-Out.png') }}"/>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div>
				<img class="headline right margin-top-65" src="{{ asset('images/rent-out-camper/Rent-Out-2.png') }}"/>
			</div>
		</div>
		<div class="col-md-6">
			<h3 class="headline margin-top-65" style="font-weight:normal;text-align:left;">
				<strong class="headline-with-separator">1. {{trans('front.title_2')}}</strong>
			</h3>
			<p>
				{{trans('front.text_content_2_1')}}
			<P>
				{{trans('front.text_content_2_2')}}
			</p>
			<a class="button" href="/rentout"><i class="sl sl-icon-login"></i> {{trans('front.register')}}</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<h3 class="headline margin-top-45" style="font-weight:normal;text-align:left;">
				<strong class="headline-with-separator">2. {{trans('front.title_3')}}</strong>
			</h3>
			<p>
			{{trans('front.text_content_3')}}
			</p>
			<a class="button" href="">{{trans('front.rent_out_camper')}}</a>

		</div>
		<div class="col-md-6">
			<div>
				<img class="headline right margin-top-45" src="{{ asset('images/rent-out-camper/Rent-Out-3.png') }}"/>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h3 class="headline margin-top-45" style="font-weight:normal;text-align:left;">
				<strong class="headline-with-separator">3. {{trans('front.title_4')}}</strong>
			</h3>
			<p>
			{{trans('front.text_content_4')}}
			</p>
			<a class="button" href="/rentout">{{trans('front.rent_out_camper')}}</a>

		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div>
				<img class="headline right margin-top-45" src="{{ asset('images/rent-out-camper/Rent-Out-4.png') }}"/>
			</div>
		</div>
	</div>
</div>
@endsection
