
@extends('frontend.layout.layout',['activePage' => 'help','footerPage' => 'true'])

@section('content')
<!-- Content
================================================== -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="headline margin-top-45" style="font-weight:normal;text-align:left;">
				<strong class="headline-with-separator">Help</strong>
			</h3>
		</div>
	</div>
	<!-- Toggles Container -->
	<div class="style-2 margin-bottom-30">

		<!-- Toggle 1 -->
		<div class="toggle-wrap">
			<span class="trigger "><a href="#"><i class="fas fa-plus"></i>Welcome to the help section!</a></span>
			<div class="toggle-container">
				<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Vivamus justo arcu, elementum a sollicitudin pellentesque, tincidunt ac enim. Proin id arcu ut ipsum vestibulum elementum.</p>
				<button class="button margin-top-10" value="Zum Formular"> Zum Formular </button>
			</div>
		</div>

		<!-- Toggle 2 -->
		<div class="toggle-wrap">
			<span class="trigger"><a href="#">Abschnitt 2 <i class="fas fa-plus"></i> </a></span>
			<div class="toggle-container">
			</div>
		</div>

		<!-- Toggle 3 -->
		<div class="toggle-wrap">
			<span class="trigger"><a href="#">Abschnitt 3 <i class="fas fa-plus"></i> </a></span>
			<div class="toggle-container">
			</div>
		</div>

		<!-- Toggle 4 -->
		<div class="toggle-wrap">
			<span class="trigger"><a href="#">Abschnitt 4 <i class="fas fa-plus"></i> </a></span>
			<div class="toggle-container">
			</div>
		</div>

		<!-- Toggle 5 -->
		<div class="toggle-wrap">
			<span class="trigger"><a href="#">Abschnitt 5 <i class="fas fa-plus"></i> </a></span>
			<div class="toggle-container">
			</div>
		</div>

		<!-- Toggle 6 -->
		<div class="toggle-wrap">
			<span class="trigger"><a href="#">Section <i class="fas fa-plus"></i> </a></span>
			<div class="toggle-container">
				<p>Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.</p>
			</div>
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
