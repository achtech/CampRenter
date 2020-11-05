
@extends('frontend.layout.layout',['activePage' => 'help','footerPage' => 'true'])

@section('content')
<!-- Content
================================================== -->
<div class="container" style="width=100%;">
	<div class="row">
		<div class="col-md-12">
			<h3 class="headline margin-top-45" style="font-weight:normal;text-align:left;">
				<strong class="headline-with-separator">Help</strong>
			</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<section id="contact">
				<h4 class="headline margin-bottom-35">Contact Us</h4>

				<div id="contact-message"></div>

				<form method="post" action="contact.php" name="contactform" id="contactform" autocomplete="on">
					<div class="row">
						<div class="col-md-6">
							<div>
								<input name="name" type="text" id="name" placeholder="Your Name" required="required" />
							</div>
						</div>

						<div class="col-md-6">
							<div>
								<input name="email" type="email" id="email" placeholder="Email Address" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" />
							</div>
						</div>
					</div>

					<div>
						<input name="subject" type="text" id="subject" placeholder="Subject" required="required" />
					</div>

					<div>
						<textarea name="comments" cols="40" rows="3" id="comments" placeholder="Message" spellcheck="true" required="required"></textarea>
					</div>

					<input type="submit" class="submit button" id="submit" value="Submit Message" />

				</form>
			</section>
		</div>
		<div class="col-md-6">
			<div>
				<img class="headline right margin-top-45" src="{{ asset('images/rent-out-camper/help.png') }}"/>
			</div>
		</div>
	</div>
</div>
@endsection
