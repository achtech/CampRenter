<div class="main-search-container" data-background-image="{{asset('images/Campunite-Bild-Start-desktop.png')}}">
	<div class="main-search-inner">
		{{ Form::open(['route'=>'frontend.camper.search','method'=>'GET']) }}
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
									<input id="autocomplete-input" type="text" placeholder="{{trans('front.slider_location')}}" name="searchedLocation">
								</div>
								<a href="#"><i class="fa fa-map-marker"></i></a>
							</div>

							<!-- Date Range -->

							<div class="main-search-input-item">
									<input type="text" id="booking-date-range" name="searchedDate"  placeholder="Check-In - Check-Out" />
							</div>
							<button type="submit" class="button">Search</button>
						</div>
					</div>
				</div>
			</div>
		{{ Form::close() }}
	</div>
</div>
