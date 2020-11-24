<form method="GET" action="{{ route('frontend.camper.search') }}" name="frm1">
<!-- Search -->
<section class="search">

    <div class="row">
        <div class="col-md-12">
                <!-- Row With Forms -->
                <div class="row with-forms">
                    <!-- Main Search Input -->
                    <div class="col-fs-6">
                        <div class="input-with-icon location">
                            <div id="autocomplete-container" data-autocomplete-tip="{{trans('front.type_and_hit_enter')}}">
                                <input id="autocomplete-input" type="text" placeholder="{{trans('front.location')}}" name="searchedLocation" value="{{$searchedLocation ?? ''}}" onchange="document.forms['frm1'].submit()" >
                            </div>
                            <a href="#"><i class="fa fa-map-marker"></i></a>
                        </div>
                    </div>

                    <!-- Main Search Input -->
                    <div class="col-fs-6">
                        <div class="input-with-icon date_range_search">
                            <input type="text" id="booking-date-range" name="searchedDate" placeholder="{{trans('front.check_in_out')}}" value="{{$searchedDate ?? ''}}"  onchange="document.forms['frm1'].submit()" />
                            <i class="fa fa-calendar calendar-position"></i>
                        </div>
                    </div>

                    <!-- Filters -->
                    <div class="col-fs-12">

                        <!-- Panel Dropdown / End -->
                        <div class="panel-dropdown">
                            <a href="#">{{trans('front.categories')}}</a>
                            <div class="panel-dropdown-content checkboxes categories">

                                <!-- Checkboxes -->
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach($categories as $category)
                                        <input id="check-{{$category->id}}" type="checkbox" value="{{$category->id}}" name="searchedCategories[]"
                                            @if((isset($searchedCategory) && $category->id==$searchedCategory) || (isset($searchedCategories) && is_array($searchedCategories)
                                                 && in_array($category->id, $searchedCategories))) checked @endif>
                                        <label for="check-{{$category->id}}">{{App\Http\Controllers\Controller::getLabel("camper_categories", $category->id)}}</label>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="panel-buttons">
                                    <button class="panel-cancel">{{trans('front.cancel')}}</button>
                                    <button type="submit" class="panel-apply">{{trans('front.apply')}}</button>
                                </div>

                            </div>
                        </div>
                        <!-- Panel Dropdown / End -->

                        <!-- Panel Dropdown -->
                        <div class="panel-dropdown wide">
                            <a href="#">{{trans('front.more_filters')}}</a>
                            <div class="panel-dropdown-content checkboxes">
                                <!-- Checkboxes -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <input id="check-a" type="checkbox" name="is_burner_stove_exist">
                                        <label for="check-a">{{trans('front.burner stove')}}</label>

                                        <input id="check-b" type="checkbox" name="is_sink_exist">
                                        <label for="check-b">{{trans('front.Sink')}}</label>

                                        <input id="check-c" type="checkbox" name="is_indoor_table_exist">
                                        <label for="check-c">{{trans('front.Indoor table')}}</label>

                                        <input id="check-d" type="checkbox" name="is_dishes_exist">
                                        <label for="check-d">{{trans('front.Dishes')}}</label>

                                        <input id="check-i" type="checkbox" name="is_camping_chairs_exist">
                                        <label for="check-i">{{trans('front.Camping chairs')}}</label>

                                        <input id="check-j" type="checkbox" name="is_water_tank_exist">
                                        <label for="check-j">{{trans('front.water_tank')}}</label>
                                    </div>

                                    <div class="col-md-6">
                                        <input id="check-e" type="checkbox" name="is_power_supply_exist" >
                                        <label for="check-e">{{trans('front.Power supply')}}</label>

                                        <input id="check-f" type="checkbox" name="is_fridge_exist" >
                                        <label for="check-f">{{trans('front.Fridge')}}</label>

                                        <input id="check-g" type="checkbox" name="is_cd_player_exist">
                                        <label for="check-g">{{trans('front.CD Player')}}</label>

                                        <input id="check-h" type="checkbox" name="is_camping_table_exist">
                                        <label for="check-h">{{trans('front.Camping table')}}</label>

                                        <input id="check-k" type="checkbox" name="is_trailer_hitch_exist">
                                        <label for="check-k">{{trans('front.Trailer hitch')}}</label>

                                        <input id="check-l" type="checkbox" name="is_gas_cooker_exist">
                                        <label for="check-l">{{trans('front.cooker_fire')}}</label>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="panel-buttons">
                                    <button class="panel-cancel">Cancel</button>
                                    <button type = "submit" class="panel-apply">{{trans('front.apply')}}</button>
                                </div>

                            </div>
                        </div>
                        <!-- Panel Dropdown / End -->
                        <!-- Panel Dropdown -->
                        <div class="panel-dropdown">
                            <a href="#">{{trans('front.distance_radius')}}</a>
                            <div class="panel-dropdown-content">
                                <input class="distance-radius" type="range" min="1" max="100" step="1" value="50" data-title="Radius around selected destination" name="searchedRadius">
                                <div class="panel-buttons">
                                    <button class="panel-cancel">{{trans('front.cancel')}}</button>
                                    <button class="panel-apply">{{trans('front.apply')}}</button>
                                </div>
                            </div>
                        </div>
                        <!-- Panel Dropdown / End -->
                    </div>
                    <!-- Filters / End -->
                </div>
                <!-- Row With Forms / End -->
        </div>
    </div>
</section>
<!-- Search / End -->
</form>
