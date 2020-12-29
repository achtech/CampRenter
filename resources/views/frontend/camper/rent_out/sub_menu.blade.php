<div class="col-lg-4 col-md-12" style="margin-bottom:20px;">

	<div class="dashboard-list-box margin-top-0">
		<ul>
			<li>
				<div style="text-align: center;">
					<img style="max-width: 70% !important;" class="headline right" src="{{ asset('images')}}/campers/{{$camper->image }}"/>
				</div>
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
								<li style="padding: 8px 5px !important;{{ $active_page == 'fill_in_vehicle' ? ' background-color: aliceblue;' : '' }}">
									@if($camper && $camper->id)
										<a href="{{route('frontend.camper.showVehicleData',$camper->id)}}">{{trans('front.vehicle_data')}}</a>
									@else
										<a href="#">{{trans('front.vehicle_data')}}</a>
									@endif
								</li>
								<li style="padding: 8px 5px !important;{{ $active_page == 'equipment' ? ' background-color: aliceblue;' : '' }}">
									@if($camper && $camper->id)
										<a href="{{route('frontend.camper.showEquipement',$camper->id)}}">{{trans('front.Equipment')}}</a>
									@else
										<a href="#">{{trans('front.Equipment')}}</a>
									@endif
								</li>
								<li style="padding: 8px 5px !important;{{ $active_page == 'accessories' ? ' background-color: aliceblue;' : '' }}">
									@if($camper && $camper->id)
										<a href="{{route('frontend.camper.showExtra',$camper->id)}}">{{trans('front.extras')}}</a>
									@else
										<a href="#">{{trans('front.extras')}}</a>
									@endif

								</li>
								<li style="padding: 8px 5px !important;{{ $active_page == 'description' ? ' background-color: aliceblue;' : '' }}">
									@if($camper && $camper->id)
										<a href="{{route('frontend.camper.showDescription',$camper->id)}}">{{trans('front.description')}}</a>
									@else
										<a href="#">{{trans('front.description')}}</a>
									@endif

								</li>
							</ol>
						</div>
					</div>
				</div>
			</li>
			<li style="{{ $active_page == 'slide_camper' ? ' background-color: aliceblue;' : '' }}">
				<div class="row">
					<div class="col-md-12" style="margin-top: -26px;margin-bottom: -15px;">
						@if($camper && $camper->id)
							<a href="{{route('frontend.camper.showPhoto',$camper->id)}}"><h3><strong>{{trans('front.photos')}}</strong></h3></a>
						@else
							<a href="#"><h3><strong>{{trans('front.photos')}}</strong></h3></a>
						@endif
					</div>
				</div>
			</li>
			<li>
				<h3 style="margin-top: 0px;"><strong>{{trans('front.menu_panel_rentout')}}</strong></h3>
				<div class="numbered color filled">
					<ol>
					<li style="padding: 8px 5px !important;{{ $active_page == 'insurance_front' ? ' background-color: aliceblue;' : '' }}"><a href="{{route('goToInsurance', $camper->id)}}">{{trans('front.insurance')}}</a></li>
					<li style="padding: 8px 5px !important;{{ $active_page == 'rental_terms' ? ' background-color: aliceblue;' : '' }}"><a href="{{route('goTorental_terms', $camper->id)}}">{{trans('front.rental_terms')}}</a></li>
					<li style="padding: 8px 5px !important;{{ $active_page == 'conditions' ? ' background-color: aliceblue;' : '' }}"><a href="{{route('goToTerms', $camper->id)}}">{{trans('front.terms')}}</a></li>
					<li style="padding: 8px 5px !important;{{ $active_page == 'calendar' ? ' background-color: aliceblue;' : '' }}"><a href="{{route('goToCalendar', $camper->id)}}">{{trans('front.calendar')}}</a></li>
					</ol>
				</div>
			</li>
		</ul>
	</div>
</div>
