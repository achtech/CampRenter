@extends('frontend.layout.layout',['activePage' => 'imprint','footerPage' => 'true'])

@section('content')
<!-- Content
================================================== -->
<div class="container">
	<div class="row">

	</div>
</div>
<!-- Content
================================================== -->

<!-- Fullwidth Section -->
<section class="fullwidth margin-top-65  padding-bottom-70" data-background-color="#fff">

	<div class="container">
		<div class="row">
            <div class="col-md-6">
                <h2 class="margin-bottom-45">
					<strong class="headline">{{trans('front.imprint_title')}}</strong>
                </h2>
                <p>{{trans('front.imprint_p_1')}}</p>
                <p>{{trans('front.imprint_p_2')}}</p>
                <p>{{trans('front.imprint_p_3')}}</p>
                <p>{{trans('front.imprint_p_4')}}</p>
            </div>
            <div class="col-md-6">
                <!-- Google Maps -->

                <!-- Google Maps / End -->
            </div>
        </div>
    </div>
</section>

@endsection
