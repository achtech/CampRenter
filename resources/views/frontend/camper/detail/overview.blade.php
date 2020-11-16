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
                        <h6 class="head-design">{{__('front.drivers_licence')}}</h6>
                        <div style="margin-top: -12px;">{{$camper->vehicle_licence}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.Gearbox')}}</h6>
                        <div style="margin-top: -12px;">{{$camper->gearbox}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.Fuel')}}</h6>
                        <div style="margin-top: -12px;">{{$camper->gearbox}}</div>
                    </div>
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.Fuel Consumption')}}</h6>
                        <div style="margin-top: -12px;">{{$camper->fuel_consumption}} {{__('front.per_100km')}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.capacity_fuel_tank')}}</h6>
                        <div style="margin-top: -12px;">{{$camper->capacity_fuel_tank}}</div>
                    </div>
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.Mileage')}}</h6>
                        <div style="margin-top: -12px;">{{$camper->included_kilometres}} {{__('front.km')}}</div>
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
                        <div style="margin-top: -12px;">{{$camper->performance_horse_power}} {{__('front.ps')}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.Cylinder capacity in litres')}}</h6>
                        <div style="margin-top: -12px;">{{$camper->cylinder_capacity}}{{__('front.per_litres')}}</div>
                    </div>
                    <div class="col-md-5">
                        <h6 class="head-design">{{__('front.Additional attributes')}}</h6>
                        <div style="margin-top: -12px;white-space: nowrap;">{{$camper->additional_attributes}} {{__('front.ps')}}</div>
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
                    @if($camper_equipment && $camper_equipment->is_power_supply_exist==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    @else
                    <i class="fa fa-close" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;"></i>
                    @endif
                    {{__('front.Power supply')}}
                </div>
            </div>
            <div class="row" >
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->is_burner_stove_exist==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    @else
                    <i class="fa fa-close" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;"></i>
                    @endif
                    {{__('front.burner stove')}}
                </div>
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->is_fridge_exist==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    @else
                    <i class="fa fa-close" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;"></i>
                    @endif
                    {{__('front.Fridge')}}
                </div>
            </div>
            <div class="row" >
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->is_sink_exist==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    @else
                    <i class="fa fa-close" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;"></i>
                    @endif
                    {{__('front.Sink')}}
                </div>
               
            </div>
            <div class="row" >
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->is_indoor_table_exist==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    @else
                    <i class="fa fa-close" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;"></i>
                    @endif
                    {{__('front.Indoor table')}}
                </div>
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->is_cd_player_exist==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    @else
                    <i class="fa fa-close" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;"></i>
                    @endif
                    {{__('front.CD Player')}}
                </div>
            </div>
            <div class="row" >
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->is_dishes_exist==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    @else
                    <i class="fa fa-close" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;"></i>
                    @endif 
                    {{__('front.Dishes')}}
                </div>
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->is_camping_table_exist==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    @else
                    <i class="fa fa-close" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;"></i>
                    @endif 
                    {{__('front.Camping table')}}
                </div>
            </div>
            <div class="row" >
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->is_camping_chairs_exist==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    @else
                    <i class="fa fa-close" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;"></i>
                    @endif
                    {{__('front.Camping chairs')}}
                </div>
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->is_trailer_hitch_exist==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    @else
                    <i class="fa fa-close" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;"></i>
                    @endif
                    {{__('front.Trailer hitch')}}
                </div>
            </div>
            <div class="row" >
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->is_water_tank_exist==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    @else
                    <i class="fa fa-close" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;"></i>
                    @endif
                    {{__('front.water_tank')}}
                </div>
                <div class="col-md-5">
                    @if($camper_equipment && $camper_equipment->is_gas_cooker_exist==1)
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    @else
                    <i class="fa fa-close" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;" aria-hidden="true"  style="color: red;"></i>
                    
                    @endif
                    {{__('front.cooker_fire')}}
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
                    <h6 class="head-design"> {{count($camper_terms)>0 ? $camper_terms[0]->season : ''}} {{__('front.main_season')}}</h6>
                    <div style="margin-top: -12px;">
                        
                        {{count($camper_terms)>0 ? $camper_terms[0]->price_per_night : ''}} {{__('front.CHF')}} {{__('front.per_night')}}
                        <div style="margin-top: -8px;">{{__('front.minimum_night_main_season')}} {{count($camper_terms)>0 ? $camper_terms[0]->minimum_night : ''}} {{__('front.nights')}}
                      
                    </div> 
                </div>
                    
                </div>
                <div class="col-md-5">
                    <h6 class="head-design"> {{count($camper_terms)>1 ? $camper_terms[1]->season : ''}} {{__('front.off_season')}}</h6>
                    <div style="margin-top: -12px;">
                        {{count($camper_terms)>1 ? $camper_terms[1]->price_per_night : 0}} {{__('front.CHF')}} {{__('front.per_night')}}
                        <div style="margin-top: -8px;">{{__('front.minimum_night_main_season')}} {{count($camper_terms)>1 ? $camper_terms[1]->minimum_night : ''}} {{__('front.nights')}}
                    </div> 
                </div>                </div>
            </div>
            <div class="row" >
                <div class="col-md-5">
                    <h6 class="head-design"> {{count($camper_terms)>2 ? $camper_terms[2]->season : ''}} {{__('front.winter_season')}}</h6>
                    <div style="margin-top: -12px;">
                        {{count($camper_terms)>2 ? $camper_terms[2]->price_per_night : 0}} {{__('front.CHF')}} {{__('front.per_night')}}
                        <div style="margin-top: -8px;">{{__('front.minimum_night_main_season')}} {{count($camper_terms)>2 ? $camper_terms[2]->minimum_night : ''}} {{__('front.nights')}}
                    </div> 
                </div>
                    
                </div>
                <div class="col-md-5">
                    <h6 class="head-design">{{__('front.Discounts')}}</h6>
                                    
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
                    <h6 class="head-design">{{__('front.Kilometres included')}}</h6>
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
                        {{$camper_rental_terms ? $camper_rental_terms->minimum_age_renter : ''}} {{__('front.years')}}
                        
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
    <div class="row" >
        <div class="col-md-2">
            <h5>{{__('front.Insurance')}}</h5>
        </div> 
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-5">
                    <h6 class="head-design">{{__('front.Insurance')}}</h6>
                <div style="margin-top: -12px;line-height: normal;">{{$camper_inssurance ? $camper_inssurance->description : ''}}</div>
                </div>
                <div class="col-md-5">
                    <h6 class="head-design">{{__('front.Roadside assistance')}}</h6>
                    <div style="margin-top: -12px;line-height: normal;">{{$camper_inssurance ? $camper_inssurance->roadside_assistance : ''}}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <h6 class="head-design">{{__('front.Deposit')}}</h6>
                    <div style="margin-top: -12px;line-height: normal;">{{$camper_inssurance ? $camper_inssurance->deposit : ''}}</div>
                </div>
                <div class="col-md-5">
                    <h6 class="head-design">{{__('front.Deductible')}}</h6>
                    <div style="margin-top: -12px;line-height: normal;">{{$camper_inssurance ? $camper_inssurance->deductible : ''}}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <h6 class="head-design">{{__('front.Interior insurance')}}</h6>
                    <div style="margin-top: -12px;line-height: normal;">{{$camper_inssurance ? $camper_inssurance->interior_insurance : ''}}</div>
                </div>
               
            </div>
        </div>
    </div>
</p>
</div>