@extends('frontend.layout3',['activePage' => 'imprint'])

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
					<strong class="headline">Imprint</strong>
                </h2>
                <p> Web gorilla  GmbH</p>
                <p>Victor Von Bruns-Strasse 20</p>
                <p>8212 Neuhausen am Rheinfall</p>
                <p>Switzerland</p>
                <p>VAT number: CHE-325.799.740</p>
                <p>The place of jurisdiction is the canton of Schaffhausen.</p>
                <p>Last updated on January 7th, 2020</p>
            </div>
            <div class="col-md-6">
                <!-- Google Maps -->
                <div id="singleListingMap-container">
                    <div id="singleListingMap" data-latitude="47.679293" data-longitude="8.625207" data-map-icon="im im-icon-Map2"></div>
                    <a href="#" id="streetView">Street View</a>
                </div>
                <!-- Google Maps / End -->
            </div>
        </div>
    </div>
</section>
@endsection
