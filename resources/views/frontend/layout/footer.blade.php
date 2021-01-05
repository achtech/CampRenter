<!-- Footer
================================================== -->
<div id="footer" class="sticky-footer">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<h4>{{trans('front.footer_title_presentation')}}</h4>
				<p>{{trans('front.footer_presentation')}}</p>
			</div>
			<div class="col-md-3  col-sm-6">
				<h4>{{trans('front.footer_social')}}</h4>
				<ul class="social-icons margin-top-20">
					<li><a class="fa fa-facebook" href="https://www.facebook.com/Campunite-357655531438672"></i></a></li>
					<li><a class="fa fa-twitter" href="https://twitter.com/campunite"></a></li>
					<li><a class="fa fa-instagram" href="https://www.instagram.com/campunite.official"></a></li>
				</ul>

			</div>
			<div class="col-md-3  col-sm-6">
				<h4>{{trans('front.footer_paiement_methods')}}</h4>
				<ul class="social-icons margin-top-20">
					<li><img width="50" height="180" style="max-width: 100%;height: auto;"  src="{{asset('images/paiement-methods/Paypal-Icon.png')}}" /></li>
					<li><img width="50" height="180" style="max-width: 100%;height: auto;"  src="{{asset('images/paiement-methods/Mastercard-Icon.png')}}" /></li>
					<li><img width="50" height="180" style="max-width: 100%;height: auto;"  src="{{asset('images/paiement-methods/Visa-Icon.png')}}" /></li>
					<li><img width="50" height="180" style="max-width: 100%;height: auto;"  src="{{asset('images/paiement-methods/Maestro-Icon.png')}}" /></li>
				</ul>

			</div>
			<div class="col-md-3 col-sm-6 ">
				<h4>{{trans('front.footer_helpful_links')}}</h4>
				<ul class="footer-links">
					<li><a href="{{route('help')}}">{{trans('front.footer_Help')}}</a></li>
					<li><a href="{{route('contact')}}">{{trans('front.footer_Contact')}}</a></li>
					<li><a href="{{route('terms')}}">{{trans('front.footer_Conditions')}}</a></li>
					<li><a href="{{route('disclaimer')}}">{{trans('front.footer_Disclaimer')}}</a></li>
					<li><a href="{{route('imprint')}}">{{trans('front.footer_imprint')}}</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>

		</div>

		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© 2020 Campunite - {{trans('front.made_with')}} <img style="margin-bottom: 3px;" src="{{ asset('images/general/heart.png')}}"> {{trans('front.in_switzerland')}} <img style="margin-bottom: 2px;" src="{{ asset('images/general/suiss1.png')}}"></div>
			</div>
		</div>

	</div>

</div>
<!-- Footer / End -->
