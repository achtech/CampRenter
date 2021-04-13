@extends('frontend.layout.layout',['activePage' => 'home','footerPage' => 'true'])
@section('content')
    <!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Welcome</h2>
			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->


<!-- Container -->
<div class="container">

	<div class="row">
		<div class="col-md-12">

			<section id="not-found" class="center">
				<h2>{{trans('front.thank_you')}}!</h2>
				<p>{{trans('front.email_message')}}</p>
			</section>
		</div>
	</div>
</div>
<!-- Container / End -->
@endsection
