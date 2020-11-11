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
                    {{__('front.sleeping spots')}}
                </div>
                <div class="col-md-5">
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.Power supply')}}
                </div>
            </div>
            <div class="row" >
                <div class="col-md-5">
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.burner stove')}}
                </div>
                <div class="col-md-5">
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.Fridge')}}
                </div>
            </div>
            <div class="row" >
                <div class="col-md-5">
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.Sink')}}
                </div>
               
            </div>
            <div class="row" >
                <div class="col-md-5">
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.Indoor table')}}
                </div>
                <div class="col-md-5">
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.CD Player')}}
                </div>
            </div>
            <div class="row" >
                <div class="col-md-5">
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.Dishes')}}
                </div>
                <div class="col-md-5">
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.Camping table')}}
                </div>
            </div>
            <div class="row" >
                <div class="col-md-5">
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.Camping chairs')}}
                </div>
                <div class="col-md-5">
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.Trailer hitch')}}
                </div>
            </div>
            <div class="row" >
                <div class="col-md-5">
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front.Waste water tank, Fresh water tank')}}
                </div>
                <div class="col-md-5">
                    <i class="fa fa-check" aria-hidden="true" style="color:#4cbed2 !important;"></i>
                    {{__('front. Gas cooker for outside, Awning, Fire extinguisher, Cable reel')}}
                </div>
            </div>
        </div>
    </div>
    <hr >
    <div class="row" >
        <div class="col-md-3">
            <h5>{{__('front.Terms')}}</h5>
        </div> 
        <div class="col-md-9">
            <p class="normal-text" >
                Terms
            </p>
        </div>
    </div>
    <hr >
    <div class="row" >
        <div class="col-md-3">
            <h5>{{__('front.Rental Terms')}}</h5>
        </div> 
        <div class="col-md-9">
            <p class="normal-text" >
                Rental Terms
            </p>
        </div>
    </div>
    <hr >
    <div class="row" >
        <div class="col-md-3">
            <h5>{{__('front.Insurance')}}</h5>
        </div> 
        <div class="col-md-9">
            <p class="normal-text" >
                Insurance
            </p>
        </div>
    </div>
</p>
</div>