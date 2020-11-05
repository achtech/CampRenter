<div class="col-lg-5 col-md-12" style="margin-bottom:20px;">

	<div class="dashboard-list-box margin-top-0">
		<ul>
			<li>
				<img class="headline right" src="{{ asset('images/rent-out-camper/camper_rent.png') }}"/>
			</li>
			<li style="padding-bottom:0px;">
				<div class="row">
					<h6>Campervan</h6>
					<h3><strong>Camp Name</strong></h3>
					<h6>{{trans('front.state')}}:</h6>
					<p>Draft</p>
				</div>
			</li>
			<li>
				<div class="row">
					<div class="col-md-12">
						<h3 style="margin-top: 0px;"><strong>{{trans('front.the_vehicle')}}</strong></h3>
						<div class="numbered color filled">
						<ol>
							<li style="padding: 8px 5px !important; background-color: aliceblue;"><a href="{{route('fill_in_vehicle')}}">{{trans('front.vehicle_data')}}</a></li>
							<li style="padding: 8px 5px !important;"><a href="{{route('equipment')}}">{{trans('front.equipment')}}</a></li>
							<li style="padding: 8px 5px !important;"><a href="{{route('accessories')}}">{{trans('front.extras')}}</a></li>
							<li style="padding: 8px 5px !important;"><a href="{{route('description')}}">{{trans('front.description')}}</a></li>
						</ol>
						</div>
					</div>
				</div>
			</li>
			<li>
				<div class="row">
					<div class="col-md-12" style="margin-top: -26px;margin-bottom: -15px; background-color: aliceblue;">
						<h3><strong>{{trans('front.photos')}}</strong></h3>
					</div>
				</div>
			</li>
			<li>
				<div class="row">
					<h3 style="margin-top: 0px;"><strong>{{trans('front.menu_panel_rentout')}}</strong></h3>
					<div class="numbered color filled">
						<ol>
						<li style="padding: 8px 5px !important;">{{trans('front.insurance')}}</li>
						<li style="padding: 8px 5px !important;">{{trans('front.rental_terms')}}</li>
						<li style="padding: 8px 5px !important;">{{trans('front.terms')}}</li>
						<li style="padding: 8px 5px !important;">{{trans('front.calendar')}}</li>
						</ol>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>
