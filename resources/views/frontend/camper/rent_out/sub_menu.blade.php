<div class="col-lg-4 col-md-12" style="margin-bottom:20px;">

	<div class="dashboard-list-box margin-top-0">
		<ul>
			<li>
				<img class="headline right" src="{{ asset('images/rent-out-camper/camper_rent.png') }}"/>
			</li>
			<li style="padding-bottom:0px;">
					<h6>{{$camperCategory?? ''}}</h6>
					<h3><strong>{{isset($camper) ? $camper->camper_name : ''}}</strong></h3>
					<h6>{{trans('front.state')}}:</h6>
					<p>Draft</p>
			</li>
			<li>
				<div class="row">
					<div class="col-md-12">
						<h3 style="margin-top: 0px;"><strong>{{trans('front.the_vehicle')}}</strong></h3>
						<div class="numbered color filled">
							<ol>
								<li style="padding: 8px 5px !important;{{ $active_page == 'fill_in_vehicle' ? ' background-color: aliceblue;' : '' }}"><a href="{{route('frontend.camper.fillInVehicle')}}">{{trans('front.vehicle_data')}}</a></li>
								<li style="padding: 8px 5px !important;{{ $active_page == 'equipment' ? ' background-color: aliceblue;' : '' }}"><a href="#">{{trans('front.Equipment')}}</a></li>
								<li style="padding: 8px 5px !important;{{ $active_page == 'accessories' ? ' background-color: aliceblue;' : '' }}"><a href="{{route('frontend.camper.storeExtraData')}}">{{trans('front.extras')}}</a></li>
								<li style="padding: 8px 5px !important;{{ $active_page == 'description' ? ' background-color: aliceblue;' : '' }}"><a href="{{route('frontend.camper.storeDescription')}}">{{trans('front.description')}}</a></li>
							</ol>
						</div>
					</div>
				</div>
			</li>
			<li style="{{ $active_page == 'slide_camper' ? ' background-color: aliceblue;' : '' }}">
				<div class="row">
					<div class="col-md-12" style="margin-top: -26px;margin-bottom: -15px;">
					<a href="{{route('slide_camper')}}"><h3><strong>{{trans('front.photos')}}</strong></h3></a>
					</div>
				</div>
			</li>
			<li>
				<h3 style="margin-top: 0px;"><strong>{{trans('front.menu_panel_rentout')}}</strong></h3>
				<div class="numbered color filled">
					<ol>
					<li style="padding: 8px 5px !important;{{ $active_page == 'insurance_front' ? ' background-color: aliceblue;' : '' }}"><a href="{{route('goToInsurance')}}">{{trans('front.insurance')}}</a></li>
					<li style="padding: 8px 5px !important;{{ $active_page == 'rental_terms' ? ' background-color: aliceblue;' : '' }}"><a href="{{route('rental_terms')}}">{{trans('front.rental_terms')}}</a></li>
					<li style="padding: 8px 5px !important;{{ $active_page == 'conditions' ? ' background-color: aliceblue;' : '' }}"><a href="{{route('conditions')}}">{{trans('front.terms')}}</a></li>
					<li style="padding: 8px 5px !important;{{ $active_page == 'calendar' ? ' background-color: aliceblue;' : '' }}"><a href="{{route('calendar')}}">{{trans('front.calendar')}}</a></li>
					</ol>
				</div>
			</li>
		</ul>
	</div>
</div>
