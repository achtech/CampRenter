
@extends('frontend.layout.layout',['activePage' => 'contact','footerPage' => 'true'])

@section('content')
<!-- Content
================================================== -->
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Content
================================================== -->

<!-- Map Container -->
<div class="contact-map margin-bottom-60">

	<!-- Google Maps -->
	<div id="singleListingMap-container">
		<div id="singleListingMap" data-latitude="47.679293" data-longitude="8.625207" data-map-icon="im im-icon-Map2"></div>
		<a href="#" id="streetView"> {{trans('front.street_view')}} </a>
	</div>
	<!-- Google Maps / End -->

	<!-- Office -->
	<div class="address-box-container">
		<div class="address-container" data-background-image="images/our-office.jpg">
			<div class="office-address">
				<h3>{{trans('front.our_office')}}</h3>
				<ul>
					<li>Victor Von Bruns-Strasse 20</li>
					<li>8212 Neuhausen am Rheinfall</li>
					<li>Switzerland</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Office / End -->

</div>
<div class="clearfix"></div>
<!-- Map Container / End -->


<!-- Container / Start -->
<div class="container">

	<div class="row">

		<!-- Contact Details -->
		<div class="col-md-4">

			<h4 class="headline margin-bottom-30">{{trans('front.find_us')}}</h4>

			<!-- Contact Details -->
			<div class="sidebar-textbox">
			<p>{{trans('front.platform_description')}}</p>
				<ul class="contact-details">
					<li><i class="im im-icon-Phone-2"></i> <strong>{{trans('front.platform_phone')}}</strong> <span>(123) 123-456 </span></li>
					<li><i class="im im-icon-Fax"></i> <strong>{{trans('front.platform_fax')}}</strong> <span>(123) 123-456 </span></li>
					<li><i class="im im-icon-Globe"></i> <strong>{{trans('front.platform_web')}}</strong> <span><a href="">www.campunite.com</a></span></li>
					<li><i class="im im-icon-Envelope"></i> <strong>{{trans('front.platform_email')}}</strong> <span><a href="mailto:support@campunite.com">support@campunite.com</a></span></li>
				</ul>
			</div>

		</div>

		<!-- Contact Form -->
		<div class="col-md-8">

			<section id="contact">
				<h4 class="headline margin-bottom-35">{{trans('front.contact_form')}}</h4>

				<div id="contact-message"></div>

				{{ Form::open(['action'=>'App\Http\Controllers\admin\MessageController@sendEmailToClient', 'enctype'=>'multipart/form-data','autocomplete'=>'off','method'=>'POST']) }}
					<div class="row">
						<div class="col-md-6">
							<div>
								<input name="full_name" type="text" id="full_name" placeholder="Your Name" required="required" />
							</div>
						</div>

						<div class="col-md-6">
							<div>
								<input name="email" type="email" id="email" placeholder="Email Address" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<input name="subject" type="text" id="subject" placeholder="Subject" required="required" />
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<textarea name="message" cols="40" rows="3" placeholder="Message" spellcheck="true" required="required" ></textarea>
						</div>
					</div>
					<input type="submit" class="submit button" id="submit" value="{{trans('front.submit_message')}}" />

					{{ Form::close() }}
			</section>
		</div>
		<!-- Contact Form / End -->

	</div>

</div>
<!-- Container / End -->
<!-- Recent Blog Posts / End -->
@endsection
