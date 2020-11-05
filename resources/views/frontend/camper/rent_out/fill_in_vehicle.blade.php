
@extends('frontend.layout.layout_panel',['activePage'=>'fill_in_vehicle','footerPage' => 'true'])

@section('content')
<!-- Content
================================================== -->

<div class="dashboard-content">
	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2><strong>Camper name</strong></h2>
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Add Listing</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- sub_menu -->
		@include('frontend.camper.rent_out.sub_menu')

		<div class="col-lg-7 col-md-12">
			<div class="row">
				<h6>The vehicle</h6>
				<h3><strong>Vehicle Data</strong></h3>
			</div>
			<div class="margin-top-0">
				<ul style="list-style-type:none; padding-left: 0px;">
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<input type="text" placeholder="Name of the vehicle">
							</div>

							<!-- Website -->
							<div class="col-md-6">
								<input type="text" placeholder="Camper brand">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<input type="text" placeholder="Model">
							</div>

							<!-- Website -->
							<div class="col-md-6">
								<input type="text" placeholder="Licence category">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<Label> Converted vehicle </label>
							</div>

							<!-- Website -->
							<div class="col-md-6">
								<input type="text" placeholder="Licence number">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<input type="text" placeholder="Vehicle registration certificate">
							</div>

							<!-- Website -->
							<div class="col-md-6">
								<input type="text" placeholder="Country of registration">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<input type="text" placeholder="Number of seats">
							</div>

							<!-- Website -->
							<div class="col-md-6">
								<input type="text" placeholder="Number of gears">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<div class="col-md-12">
									<strong>Gearbox</strong>
								</div>
								<div class="col-md-6">
									<label class="containerRadio">Automatic
										<input type="radio" checked="checked" name="radio">
										<span class="checkmarkRadio"></span>
									</label>
									<label class="containerRadio">Manual
										<input type="radio" checked="checked" name="radio">
										<span class="checkmarkRadio"></span>
									</label>
								</div>
								<div class="col-md-6">
									<label class="containerRadio">Semi-automatic
										<input type="radio" checked="checked" name="radio">
										<span class="checkmarkRadio"></span>
									</label>
								</div>
							</div>


							<!-- Website -->
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<strong>Mileage</strong>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label class="containerRadio">0 - 50'000 km
											<input type="radio" checked="checked" name="radio">
											<span class="checkmarkRadio"></span>
										</label>
										<label class="containerRadio">50'000 - 100'000 km
											<input type="radio" checked="checked" name="radio">
											<span class="checkmarkRadio"></span>
										</label>
										<label class="containerRadio">100'000 - 150'000 km
											<input type="radio" checked="checked" name="radio">
											<span class="checkmarkRadio"></span>
										</label>
										<label class="containerRadio">150'000 - 200'000 km
											<input type="radio" checked="checked" name="radio">
											<span class="checkmarkRadio"></span>
										</label>
										<label class="containerRadio">200'000 - 250'000 km
											<input type="radio" checked="checked" name="radio">
											<span class="checkmarkRadio"></span>
										</label>
										<label class="containerRadio">250'000 - 300'000 km
											<input type="radio" checked="checked" name="radio">
											<span class="checkmarkRadio"></span>
										</label>
										<label class="containerRadio">More than 300'000 km
											<input type="radio" checked="checked" name="radio">
											<span class="checkmarkRadio"></span>
										</label>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<div class="col-md-12">
									<strong>Fuel</strong>
								</div>
								<div class="col-md-6">
									<label class="containerRadio">Diesel
										<input type="radio" checked="checked" name="radio">
										<span class="checkmarkRadio"></span>
									</label>
									<label class="containerRadio">Gas
										<input type="radio" checked="checked" name="radio">
										<span class="checkmarkRadio"></span>
									</label>
								</div>
								<div class="col-md-6">
									<label class="containerRadio">Petrol
										<input type="radio" checked="checked" name="radio">
										<span class="checkmarkRadio"></span>
									</label>
									<label class="containerRadio">Petroleum gas
										<input type="radio" checked="checked" name="radio">
										<span class="checkmarkRadio"></span>
									</label>
								</div>
							</div>

							<!-- Website -->
							<div class="col-md-6">
								<input type="text" placeholder="Fuel consumation per 100 Km">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<input type="text" placeholder="Fuel capacity">
							</div>

							<!-- Website -->
							<div class="col-md-6">
								<input type="text" placeholder="Length in metres">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<input type="text" placeholder="Allowed total weight in tons">
							</div>

							<!-- Website -->
							<div class="col-md-6">
								<strong>Leasing vehicle</strong>
								<div class="row">
									<div class="col-md-5">
										<div class="payment-tab-trigger">
											<input name="cardType" type="radio" value="">
											<label style="padding: 0px;" for="vehicle">Yes</label>
										</div>
									</div>
									<div class="col-md-7">
										<div class="payment-tab-trigger">
											<input name="cardType" type="radio" value="">
											<label style="padding: 0px;" for="vehicle">No</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<input type="text" placeholder="Horse power">
							</div>

							<!-- Website -->
							<div class="col-md-6">
								<input type="text" placeholder="Cylinder capacity">
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-12">
								<strong>Additional attributes</strong>
							</div>
							<div class="col-md-6">
								<div class="checkboxes in-row margin-bottom-20">

									<input id="check-a" type="checkbox" name="check">
									<label for="check-a">Aircon in the driver's cabin</label>

									<input id="check-b" type="checkbox" name="check">
									<label for="check-b">Rear view camera</label>

									<input id="check-c" type="checkbox" name="check">
									<label for="check-c">Power steering</label>

									<input id="check-d" type="checkbox" name="check">
									<label for="check-d">Four wheel drive</label>

								</div>
							</div>

							<!-- Website -->
							<div class="col-md-6">
								<div class="checkboxes in-row margin-bottom-20">

									<input id="check-f" type="checkbox" name="check">
									<label for="check-f">Auxiliary heating</label>

									<input id="check-g" type="checkbox" name="check">
									<label for="check-g">Reverse parking system</label>

									<input id="check-h" type="checkbox" name="check">
									<label for="check-h">Anti-skid-system</label>

									<input id="check-i" type="checkbox" name="check">
									<label for="check-i">Central locking</label>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="row" style="margin-bottom:20px;">
							<div class="col-md-12">
								<strong>Location</strong>
								<div class="markers-on-the-map" style="margin-top: 16px;">
									<div id="map"></div>

									<script>
										var api_key = "zdsQGxoHAnWQjAz094c1SW7jS8jmpqU9j2B5O09EWkE";
										var latitude = 0;
										var longitude = 0;
										/**
										* Adds a  draggable marker to the map..
										*
										* @param {H.Map} map                      A HERE Map instance within the
										*                                         application
										* @param {H.mapevents.Behavior} behavior  Behavior implements
										*                                         default interactions for pan/zoom
										*/
										function addDraggableMarker(map, behavior) {

											var marker = new H.map.Marker({
												lat: window.latitude,
												lng: window.longitude
											}, {
												// mark the object as volatile for the smooth dragging
												volatility: true
											});
											// Ensure that the marker can receive drag events
											marker.draggable = true;
											map.addObject(marker);

											// disable the default draggability of the underlying map
											// and calculate the offset between mouse and target's position
											// when starting to drag a marker object:
											map.addEventListener('dragstart', function (ev) {
												var target = ev.target,
													pointer = ev.currentPointer;
												if (target instanceof H.map.Marker) {
													var targetPosition = map.geoToScreen(target.getGeometry());
													target['offset'] = new H.math.Point(pointer.viewportX - targetPosition.x, pointer
														.viewportY - targetPosition.y);
													behavior.disable();
												}
											}, false);


											// re-enable the default draggability of the underlying map
											// when dragging has completed
											map.addEventListener('dragend', function (ev) {
												var target = ev.target;
												if (target instanceof H.map.Marker) {
													behavior.enable();
												}
											}, false);

											// Listen to the drag event and move the position of the marker
											// as necessary
											map.addEventListener('drag', function (ev) {
												var target = ev.target,
													pointer = ev.currentPointer;
												if (target instanceof H.map.Marker) {
													target.setGeometry(map.screenToGeo(pointer.viewportX - target['offset'].x, pointer
														.viewportY - target['offset'].y));
												}
											}, false);
										}

										function initHereMap() {

											//console.log("initmap");
											/**
											* Boilerplate map initialization code starts below:
											*/

											//Step 1: initialize communication with the platform
											// In your own code, replace variable window.apikey with your own apikey

											//console.log(api_key);
											var platform = new H.service.Platform({
												apikey: api_key
											});
											var defaultLayers = platform.createDefaultLayers();

											//console.log(H.service);
											//Step 2: initialize a map - this map is centered over Boston
											var map = new H.Map(document.getElementById('map'),
												defaultLayers.vector.normal.map, {
													center: {
														lat: window.latitude,
														lng: window.longitude
													},
													zoom: 12,
													pixelRatio: window.devicePixelRatio || 1
												});
											// add a resize listener to make sure that the map occupies the whole container
											window.addEventListener('resize', () => map.getViewPort().resize());

											//Step 3: make the map interactive
											// MapEvents enables the event system
											// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
											var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

											// Step 4: Create the default UI:
											var ui = H.ui.UI.createDefault(map, defaultLayers, 'en-US');

											// Add the click event listener.
											addDraggableMarker(map, behavior);

										}


										// DETECT BROWSER COORDINATES
										function showLocation(position) {
											window.latitude = position.coords.latitude;
											window.longitude = position.coords.longitude;
											initHereMap()
										}

										function errorHandler(err) {
											if(err.code == 1) {
											alert("Error: Access is denied!");
											} else if( err.code == 2) {
											alert("Error: Position is unavailable!");
											}
										}

										function getLocation() {

											if(navigator.geolocation) {

											// timeout at 60000 milliseconds (60 seconds)
											var options = {timeout:60000};
											navigator.geolocation.getCurrentPosition(showLocation, errorHandler, options);
											} else {
											alert("Sorry, browser does not support geolocation!");
											}
										}

										getLocation();
									</script>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-12">
							<div style="float: right;">
								<a href="{{route('equipment')}}" class="button">{{trans('front.apply')}} <i class="fa fa-check-circle"></i></a>
								<a href="{{route('personnalData')}}" class="button border">{{trans('front.cancel')}}</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
