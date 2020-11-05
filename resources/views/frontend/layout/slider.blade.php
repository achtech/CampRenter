<div class="main-search-container" data-background-image="{{asset('frontend/asset/images/Campunite-Bild-Start-desktop.png')}}">
	<div class="main-search-inner">

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 style="text-align: center;">
					{{trans('front.slider_title')}}
						<!-- Typed words can be configured in script settings at the bottom of this HTML file -->
					</h2>
					<div class="main-search-input">
						<div class="main-search-input-item location">
							<div id="autocomplete-container">
								<input id="autocomplete-input" type="text" placeholder="{{trans('front.slider_location')}}">
							</div>
							<a href="#"><i class="fa fa-map-marker"></i></a>
						</div>

						<!-- Date Range -->
						<div id="booking-date-range">
						    <span></span>
						</div>

						<button class="button" onclick="window.location.href='/search_camper_client'">{{trans('front.slider_search')}}</button>

					</div>
				</div>
			</div>

			<!-- Featured Categories - End -->

		</div>

	</div>
</div>