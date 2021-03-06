@extends('frontend.layout3',['activePage' => 'home'])
@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Listings</h2><span>Grid Layout With Sidebar</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Listings</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row">
		<div class="col-md-12">

			<!-- Sorting - Filtering Section -->
			<div class="row margin-bottom-25 margin-top-30">

				<div class="col-md-6">
					<!-- Layout Switcher -->
					<div class="layout-switcher">
						<a href="#" class="grid active"><i class="fa fa-th"></i></a>
						<a href="listings-list-full-width.html" class="list"><i class="fa fa-align-justify"></i></a>
					</div>
				</div>

				<div class="col-md-6">
					<div class="fullwidth-filters">

						<!-- Panel Dropdown -->
						<div class="panel-dropdown wide float-right">
							<a href="#">More Filters</a>
							<div class="panel-dropdown-content checkboxes">

								<!-- Checkboxes -->
								<div class="row">
									<div class="col-md-6">
										<input id="check-a" type="checkbox" name="check">
										<label for="check-a">Elevator in building</label>

										<input id="check-b" type="checkbox" name="check">
										<label for="check-b">Friendly workspace</label>

										<input id="check-c" type="checkbox" name="check">
										<label for="check-c">Instant Book</label>

										<input id="check-d" type="checkbox" name="check">
										<label for="check-d">Wireless Internet</label>
									</div>

									<div class="col-md-6">
										<input id="check-e" type="checkbox" name="check" >
										<label for="check-e">Free parking on premises</label>

										<input id="check-f" type="checkbox" name="check" >
										<label for="check-f">Free parking on street</label>

										<input id="check-g" type="checkbox" name="check">
										<label for="check-g">Smoking allowed</label>

										<input id="check-h" type="checkbox" name="check">
										<label for="check-h">Events</label>
									</div>
								</div>

								<!-- Buttons -->
								<div class="panel-buttons">
									<button class="panel-cancel">Cancel</button>
									<button class="panel-apply">Apply</button>
								</div>

							</div>
						</div>
						<!-- Panel Dropdown / End -->

						<!-- Panel Dropdown-->
						<div class="panel-dropdown float-right">
							<a href="#">Distance Radius</a>
							<div class="panel-dropdown-content">
								<input class="distance-radius" type="range" min="1" max="100" step="1" value="50" data-title="Radius around selected destination">
								<div class="panel-buttons">
									<button class="panel-cancel">Disable</button>
									<button class="panel-apply">Apply</button>
								</div>
							</div>
						</div>
						<!-- Panel Dropdown / End -->

						<!-- Sort by -->
						<div class="sort-by">
							<div class="sort-by-select">
								<select data-placeholder="Default order" class="chosen-select-no-single">
									<option>Default Order</option>
									<option>Highest Rated</option>
									<option>Most Reviewed</option>
									<option>Newest Listings</option>
									<option>Oldest Listings</option>
								</select>
							</div>
						</div>
						<!-- Sort by / End -->

					</div>
				</div>

			</div>
			<!-- Sorting - Filtering Section / End -->


			<div class="row">

				<!-- Listing Item -->
				<div class="col-lg-4 col-md-6">
					<a href="listings-single-page.html" class="listing-item-container compact">
						<div class="listing-item">
							<img src="{{asset('images/listing-item-01.jpg')}}" alt="">

							<div class="listing-badge now-open">Now Open</div>

							<div class="listing-item-content">
								<div class="numerical-rating" data-rating="3.5"></div>
								<h3>Tom's Restaurant <i class="verified-icon"></i></h3>
								<span>964 School Street, New York</span>
							</div>
							<span class="like-icon"></span>
						</div>
					</a>
				</div>
				<!-- Listing Item / End -->

				<!-- Listing Item -->
				<div class="col-lg-4 col-md-6">
					<a href="listings-single-page.html" class="listing-item-container compact">
						<div class="listing-item">
							<img src="{{asset('images/listing-item-02.jpg')}}" alt="">
							<div class="listing-item-details">
								<ul>
									<li>Friday, August 10</li>
								</ul>
							</div>
							<div class="listing-item-content">
								<div class="numerical-rating" data-rating="5.0"></div>
								<h3>Sticky Band</h3>
								<span>Bishop Avenue, New York</span>
							</div>
							<span class="like-icon"></span>
						</div>
					</a>
				</div>
				<!-- Listing Item / End -->

				<!-- Listing Item -->
				<div class="col-lg-4 col-md-6">
					<a href="listings-single-page.html" class="listing-item-container compact">
						<div class="listing-item">
							<img src="{{asset('images/listing-item-03.jpg')}}" alt="">
							<div class="listing-item-details">
								<ul>
									<li>Starting from $59 per night</li>
								</ul>
							</div>
							<div class="listing-item-content">
								<div class="numerical-rating" data-rating="2.0"></div>
								<h3>Hotel Govendor</h3>
								<span>778 Country Street, New York</span>
							</div>
							<span class="like-icon"></span>
						</div>

					</a>
				</div>
				<!-- Listing Item / End -->

				<!-- Listing Item -->
				<div class="col-lg-4 col-md-6">
					<a href="listings-single-page.html" class="listing-item-container compact">
						<div class="listing-item">
							<img src="imag{{asset('images/listing-item-04.jpg')}}" alt="">

							<div class="listing-badge now-open">Now Open</div>

							<div class="listing-item-content">
								<div class="numerical-rating" data-rating="5.0"></div>
								<h3>Burger House <i class="verified-icon"></i></h3>
								<span>2726 Shinn Street, New York</span>
							</div>
							<span class="like-icon"></span>
						</div>
					</a>
				</div>
				<!-- Listing Item / End -->

				<!-- Listing Item -->
				<div class="col-lg-4 col-md-6">
					<a href="listings-single-page.html" class="listing-item-container compact">
						<div class="listing-item">
							<img src="{{asset('images/listing-item-05.jpg')}}" alt="">
							<div class="listing-item-content">
								<div class="numerical-rating" data-rating="3.5"></div>
								<h3>Airport</h3>
								<span>1512 Duncan Avenue, New York</span>
							</div>
							<span class="like-icon"></span>
						</div>
					</a>
				</div>
				<!-- Listing Item / End -->

				<!-- Listing Item -->
				<div class="col-lg-4 col-md-6">
					<a href="listings-single-page.html" class="listing-item-container compact">
						<div class="listing-item">
							<img src="{{asset('images/listing-item-06.jpg')}}" alt="">

							<div class="listing-badge now-closed">Now Closed</div>

							<div class="listing-item-content">
								<div class="numerical-rating" data-rating="4.5"></div>
								<h3>Think Coffee</h3>
								<span>215 Terry Lane, New York</span>
							</div>
							<span class="like-icon"></span>
						</div>
					</a>
				</div>
				<!-- Listing Item / End -->

			</div>

			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<div class="pagination-container margin-top-20 margin-bottom-40">
						<nav class="pagination">
							<ul>
								<li><a href="#" class="current-page">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<!-- Pagination / End -->

		</div>

	</div>
</div>
@endsection
