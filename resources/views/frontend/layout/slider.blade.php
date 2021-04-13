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
							<div id="autocomplete-containeroff" data-autocomplete-tip="{{trans('front.type_and_hit_enter')}}">
                                <input id="searchTextFieldHome" autocomplete="off" type="text" placeholder="{{trans('front.location')}}" name="searchedLocation" value="{{$searchedLocation ?? ''}}" onchange="document.forms['frm1'].submit()" >
                            </div>
								<a href="#"><i class="fa fa-map-marker"></i></a>
							</div>

							<!-- Date Range -->

							<div class="main-search-input-item">
								<input type="text" readonly="readonly"  id="booking-date-range1" name="searchedDate" placeholder="{{trans('front.check_in_out')}}"  />
							</div>
							<button type="submit" class="button">{{trans('front.slider_search')}}</button>
						</div>
					</div>
				</div>
			</div>
		{{ Form::close() }}
	</div>
</div>
<script type="text/javascript">

 google.maps.event.addDomListener(window, 'load', initialize12);


function initialize12() {

var cityBounds = new google.maps.LatLngBounds(
  new google.maps.LatLng(47.679293,8.625207),
  new google.maps.LatLng(47.679293, 8.625207));

var options = {
  bounds: cityBounds,
  types: ['geocode']
};

 var input = document.getElementById('searchTextFieldHome');

 var autocomplete = new google.maps.places.Autocomplete(input, options);
}
</script>
