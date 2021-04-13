<!-- Listing Contacts -->
<div class="listing-links-container">
<p>
    <div class="row" >
        <div class="col-md-2">
        <h5>{{__('front.Description')}}</h5>
        </div>
        <div class="col-md-10">
            <p class="normal-text" >
                {{$camper->description_camper}}
            </p>
        </div>
    </div>
    <hr >
    <div class="row" >
        <div class="col-md-2">
            <h5>{{__('front.Vehicle')}}</h5>
        </div>
        <div class="col-md-10">
                <div class="row" >
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.brand_type')}}</h6>
                        <div style="margin-top: -12px;">{{$camper->brand}} {{$camper->type}}</div>

                    </div>
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.model')}}</h6>
                        <div style="margin-top: -12px;">{{$camper->model}}</div>
                    </div>
                </div>
                <!--<div class="row">
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.Gearbox')}}</h6>
                        <div style="margin-top: -12px;">{{$camper->gearbox}}</div>
                    </div>
                </div>-->
                <div class="row">
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.Fuel')}}</h6>
                        <div style="margin-top: -12px;">{{App\Http\Controllers\Controller::getLabel('fuels', $fuel->id)}}</div>
                    </div>
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.Fuel Consumption')}}</h6>
                        <div style="margin-top: -12px;">{{$camper->fuel_consumation}} {{__('front.per_100km')}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.capacity_fuel_tank')}}</h6>
                        <div style="margin-top: -12px;">{{$camper->fuel_capacity}}</div>
                    </div>
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.Mileage')}}</h6>
                        <div style="margin-top: -12px;">{{$camper->included_kilometres}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.Lenght in metres')}}</h6>
                        <div style="margin-top: -12px;">{{$camper->length}}{{__('front.per_metres')}}</div>
                    </div>
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.Width in metres')}}</h6>
                        <div style="margin-top: -12px;">{{$camper->width}} {{__('front.per_metres')}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.Allowed total weight in tons')}}</h6>
                        <div style="margin-top: -12px;">{{$camper->allowed_total_weight}}{{__('front.per_tons')}}</div>
                    </div>
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.Performance in horse power')}}</h6>
                        <div style="margin-top: -12px;">{{$camper->horse_power}} {{__('front.ps')}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.Cylinder capacity in litres')}}</h6>
                        <div style="margin-top: -12px;">{{$camper->cylinder_capacity}}{{__('front.per_litres')}}</div>
                    </div>
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.Additional attributes')}}</h6>
                        <div style="margin-top: -12px">{{$additionalAttribute}} {{__('front.ps')}}</div>
                    </div>
                </div>
        </div>
    </div>
    <hr >
    <div class="row" >
        <div class="col-md-2">
            <h5>{{__('front.Equipment')}}</h5>
        </div>
        <div class="col-md-10">
            <div class="row" >
                <div class="col-md-5">
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{$camper_equipment ? $camper_equipment->sleeping_spots : 0}} {{__('front.sleeping spots')}}
                </div>
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->power==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.Power supply')}}
                    @endif
                </div>
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->cooking_possibility==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.burner stove')}}
                    @endif
                </div>
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->cooling_possibility==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.Fridge')}}
                    @endif
                </div>
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->sink==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.Sink')}}
                    @endif
                </div>

                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->indoor_table==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.Indoor table')}}
                    @endif
                </div>
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->electronics==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.CD Player')}}
                    @endif
                </div>
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->dishes==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.Dishes')}}
                    @endif
                </div>
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->camping_table==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.Camping table')}}
                    @endif
                </div>
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->camping_chairs==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.Camping chairs')}}
                    @endif
                </div>
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->transport==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.Trailer hitch')}}
                    @endif
                </div>
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->water==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.water_tank')}}
                    @endif
                </div>
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->additional_equipment_outside==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.cooker_fire')}}
                    @endif
                </div>
            </div>
        </div>
    </div>
    <hr >
    <div class="row" >
        <div class="col-md-2">
            <h5>{{__('front.Terms')}}</h5>
        </div>
        <div class="col-md-10">
            <div class="row" >
                <div class="col-md-5">
                    <h6 class="head-design">{{__('front.main_season')}}</h6>
                    <div style="margin-top: -12px;">
                        {{count($camper_terms)>0 ? $camper_terms[0]->price_per_night : ''}} {{__('front.CHF')}} {{__('front.per_night')}}
                        <div style="margin-top: -8px;">{{__('front.minimum_night_main_season')}} {{count($camper_terms)>0 ? $camper_terms[0]->minimum_night : ''}} {{__('front.nights')}}
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <h6 class="head-design">{{__('front.off_season')}}</h6>
                    <div style="margin-top: -12px;">
                        {{count($camper_terms)>1 ? $camper_terms[1]->price_per_night : 0}} {{__('front.CHF')}} {{__('front.per_night')}}
                        <div style="margin-top: -8px;">{{__('front.minimum_night_main_season')}} {{count($camper_terms)>1 ? $camper_terms[1]->minimum_night : ''}} {{__('front.nights')}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-5">
                    <h6 class="head-design">{{__('front.winter_season')}}</h6>
                    <div style="margin-top: -12px;">
                        {{count($camper_terms)>2 ? $camper_terms[2]->price_per_night : 0}} {{__('front.CHF')}} {{__('front.per_night')}}
                        <div style="margin-top: -8px;">{{__('front.minimum_night_main_season')}} {{count($camper_terms)>2 ? $camper_terms[2]->minimum_night : ''}} {{__('front.nights')}}
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
    <hr >
    <div class="row" >
        <div class="col-md-2">
            <h5>{{__('front.Rental Terms')}}</h5>
        </div>
        <div class="col-md-10">
            <div class="row" >
                <div class="col-md-5">
                    <h6 class="head-design">{{__('front.kilometres_per_night')}}</h6>
                    <div style="margin-top: -12px;">
                        {{$camper_rental_terms ? $camper_rental_terms->included_kilometres : ''}}
                    </div>
                </div>
                <div class="col-md-5">
                    <h6 class="head-design">{{__('front.Animals allowed')}}</h6>
                    <div style="margin-top: -12px;">
                        @if($camper_rental_terms && $camper_rental_terms->is_animal_allowed==1)
                        {{__('front.yes')}}
                        @else
                        {{__('front.no')}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-5">
                    <h6 class="head-design">{{__('front.Smoking allowed')}}</h6>
                    <div style="margin-top: -12px;">
                        @if($camper_rental_terms && $camper_rental_terms->is_smooking_allowed==1)
                        {{__('front.yes')}}
                        @else
                        {{__('front.no')}}
                        @endif
                    </div>
                </div>
                <div class="col-md-5">
                    <h6 class="head-design">{{__('front.minimum_renter_age')}}</h6>
                    <div style="margin-top: -12px;">
                        {{$camper_rental_terms ? $camper_rental_terms->minimum_age : ''}} {{__('front.years')}}

                    </div>
                </div>
            </div>

            <div class="row" >
                <div class="col-md-5">
                    <h6 class="head-design">{{__('front.minimum_length_driver_prosession')}}</h6>
                    <div style="margin-top: -12px;">
                        {{$camper_rental_terms ? $camper_rental_terms->minimum_length_driver_licence :''}} {{__('front.years')}}

                    </div>
                </div>
                <div class="col-md-5">
                    <h6 class="head-design">{{__('front.parking_available')}}</h6>
                    <div style="margin-top: -12px;">
                        @if($camper_rental_terms && $camper_rental_terms->is_parking_available==1)
                        {{__('front.yes')}}
                        @else
                        {{__('front.no')}}
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>
    <hr >
</p>
</div>
