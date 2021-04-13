<div class="col-lg-4 col-md-12" style="margin-bottom:20px;">

	<div class="dashboard-list-box margin-top-0" id="submenu">
		<ul>
			<li>
				<div style="text-align: center;">
					<img style="max-width: 275px; max-height: 210px;" class="headline right" src="{{ asset('images')}}/camper_categories/{{App\Http\Controllers\frontend\FC_rentOutController::getCategoriePhoto($camper->id_camper_categories) }}"/>
				</div>
			</li>
			@php($isReady = App\Http\Controllers\frontend\FC_rentOutController::isReadyToVerify($camper->id))
			<li style="padding-bottom:0px;">
					<h6>{{App\Http\Controllers\Controller::getLabel('camper_categories', $camper->id_camper_categories)}}</h6>
					<h3><strong>{{isset($camper) ? $camper->camper_name : ''}}</strong></h3>
					<h6>{{trans('front.state')}}:</h6>
					@if($isReady)
					<p>{{trans('front.completed')}}</p>
					@else
					<p>{{trans('front.draft')}}</p>
					@endif
			</li>
			<li>
				<div class="row">
					<div class="col-md-12">
						<h3 style="margin-top: 0px;"><strong>{{trans('front.the_vehicle')}}</strong></h3>
						<div class="numbered color filled">
							<ol>
								<li
									class="@if(App\Http\Controllers\frontend\FC_rentOutController::isVehicleDataReady($camper)) valid @endif"
									style="padding: 8px 5px !important;{{ $active_page == 'fill_in_vehicle' ? ' background-color: aliceblue;' : '' }}">
									@if($camper && $camper->id)
									<a class="valid" href="{{route('frontend.camper.showVehicleData',$camper->id)}}">{{trans('front.vehicle_data')}}</a>
									@else
									<a  class="valid" href="#">{{trans('front.vehicle_data')}}</a>
									@endif
								</li>
								<li
									style="padding: 8px 5px !important;{{ $active_page == 'equipment' ? ' background-color: aliceblue;' : '' }}">
									@if($camper && $camper->id)
										<a href="{{route('frontend.camper.showEquipement',$camper->id)}}">{{trans('front.Equipment')}}</a>
									@else
										<a href="#">{{trans('front.Equipment')}}</a>
									@endif
								</li>
								<li
									style="padding: 8px 5px !important;{{ $active_page == 'accessories' ? ' background-color: aliceblue;' : '' }}">
									@if($camper && $camper->id)
										<a href="{{route('frontend.camper.showExtra',$camper->id)}}">{{trans('front.extras')}}</a>
									@else
										<a href="#">{{trans('front.extras')}}</a>
									@endif
								</li>
								<li
									class="@if($camper && $camper->description_camper!=null) valid @endif"
									style="padding: 8px 5px !important;{{ $active_page == 'description' ? ' background-color: aliceblue;' : '' }}">
									@if($camper && $camper->id)
										<a href="{{route('frontend.camper.showDescription',$camper->id)}}">{{trans('front.description')}}</a>
									@else
										<a href="#">{{trans('front.description')}}</a>
									@endif
								</li>
								<li
									style="padding: 8px 5px !important;{{ $active_page == 'slide_camper' ? ' background-color: aliceblue;' : '' }}">
										@if($camper && $camper->id)
											<a href="{{route('frontend.camper.showPhoto',$camper->id)}}">{{trans('front.photos')}}</a>
										@else
											<a href="#">{{trans('front.photos')}}</a>
										@endif
								</li>
							</ol>
						</div>
					</div>
				</div>
			</li>
			<li>
				<h3 style="margin-top: 0px;"><strong>{{trans('front.menu_panel_rentout')}}</strong></h3>
				<div class="numbered color filled valid">
					<ol>
						<li
						class="@if(App\Http\Controllers\frontend\FC_rentOutController::isInsuranceReady($camper)) valid @endif"
						style="padding: 8px 5px !important;{{ $active_page == 'insurance_front' ? ' background-color: aliceblue;' : '' }}"><a href="{{route('goToInsurance', $camper->id)}}">{{trans('front.insurance')}}</a></li>

						<li
						class="@if(App\Http\Controllers\frontend\FC_rentOutController::isRentalTermsReady($camper)) valid @endif"
						style="padding: 8px 5px !important;{{ $active_page == 'rental_terms' ? ' background-color: aliceblue;' : '' }}"><a href="{{route('goTorental_terms', $camper->id)}}">{{trans('front.rental_terms')}}</a></li>

						<li
						class="@if(App\Http\Controllers\frontend\FC_rentOutController::isTermsReady($camper)) valid @endif"
						style="padding: 8px 5px !important;{{ $active_page == 'conditions' ? ' background-color: aliceblue;' : '' }}"><a href="{{route('goToTerms', $camper->id)}}">{{trans('front.terms')}}</a></li>

						<li
						style="padding: 8px 5px !important;{{ $active_page == 'calendar' ? ' background-color: aliceblue;' : '' }}"><a href="{{route('goToCalendar', $camper->id)}}">{{trans('front.calendar')}}</a></li>
					</ol>
				</div>
			</li>
			@php($toBeFilled = App\Http\Controllers\frontend\FC_rentOutController::toBeFilled($camper->id))
			<li>
				<div class="row">
					<div class="col-md-12" style="text-align: center;">
					@if($isReady)
					<h2 ><a href="{{route('frontend.camper.tobeConfirmed',$camper->id)}}" ><strong style="color:#39b7cd">{{trans('front.publier_camper')}}</strong></a></h2>
						@else
							<h2 style="color:gray"><strong>{{trans('front.verified')}}</strong></h2>
							<h4 style="color:red; background: none;border-bottom: none;">{{$toBeFilled??''}}</h4>
						@endif
					</div>
				</div>
			</li>

		</ul>
	</div>
</div>
<style>
	.numbered.color.filled ol>li.valid::before {
		background : #64bc36 !important;
	}
</style>
