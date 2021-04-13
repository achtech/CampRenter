
<form method="GET" action="{{ route('frontend.camper.search') }}" name="frm1" id="frm1">
<!-- Search -->
<section class="search">

    <div class="row">
        <div class="col-md-12">
                <!-- Row With Forms -->
                <div class="row with-forms">
                    <!-- Main Search Input -->
                    <div class="col-fs-6">
                        <div class="input-with-icon location">
                            <div id="autocomplete-containeroff" data-autocomplete-tip="{{trans('front.type_and_hit_enter')}}">
                                <input id="searchTextField" autocomplete="off" type="text" placeholder="{{trans('front.location')}}" name="searchedLocation" value="{{$searchedLocation ?? ''}}" onchange="document.forms['frm1'].submit()" >
                            </div>
                            <a href="#"><i class="fa fa-map-marker"></i></a>
                        </div>
                    </div>

                    <!-- Main Search Input -->
                    <div class="col-fs-6">

                        <div class="input-with-icon date_range_search">
                            <input type="text" readonly="readonly"  id="booking-date-range1" name="searchedDate" placeholder="{{trans('front.check_in_out')}}"  />
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
                                        <input id="check-a" type="checkbox" name="cooking_possibility" @if(isset($equipments) && is_array($equipments) && in_array("cooking_possibility",$equipments)) checked @endif>
                                        <label for="check-a">{{trans('front.burner stove')}}</label>

                                        <input id="check-b" type="checkbox" name="sink"  @if(isset($equipments) && is_array($equipments) && in_array("sink",$equipments)) checked @endif>
                                        <label for="check-b">{{trans('front.Sink')}}</label>

                                        <input id="check-c" type="checkbox" name="indoor_table"  @if(isset($equipments) && is_array($equipments) && in_array("indoor_table",$equipments)) checked @endif>
                                        <label for="check-c">{{trans('front.Indoor table')}}</label>

                                        <input id="check-d" type="checkbox" name="dishes"  @if(isset($equipments) && is_array($equipments) && in_array("dishes",$equipments)) checked @endif>
                                        <label for="check-d">{{trans('front.Dishes')}}</label>

                                        <input id="check-i" type="checkbox" name="camping_chairs"  @if(isset($equipments) && is_array($equipments) && in_array("camping_chairs",$equipments)) checked @endif>
                                        <label for="check-i">{{trans('front.Camping chairs')}}</label>

                                        <input id="check-j" type="checkbox" name="water"  @if(isset($equipments) && is_array($equipments) && in_array("water",$equipments)) checked @endif>
                                        <label for="check-j">{{trans('front.water_tank')}}</label>
                                    </div>

                                    <div class="col-md-6">
                                        <input id="check-e" type="checkbox" name="power"  @if(isset($equipments) && is_array($equipments) && in_array("power",$equipments)) checked @endif>
                                        <label for="check-e">{{trans('front.Power supply')}}</label>

                                        <input id="check-f" type="checkbox" name="cooling_possibility"  @if(isset($equipments) && is_array($equipments) && in_array("cooling_possibility",$equipments)) checked @endif>
                                        <label for="check-f">{{trans('front.Fridge')}}</label>

                                        <input id="check-g" type="checkbox" name="electronics"  @if(isset($equipments) && is_array($equipments) && in_array("electronics",$equipments)) checked @endif>
                                        <label for="check-g">{{trans('front.CD Player')}}</label>

                                        <input id="check-h" type="checkbox" name="camping_table"  @if(isset($equipments) && is_array($equipments) && in_array("camping_table",$equipments)) checked @endif>
                                        <label for="check-h">{{trans('front.Camping table')}}</label>

                                        <input id="check-k" type="checkbox" name="transport"  @if(isset($equipments) && is_array($equipments) && in_array("transport",$equipments)) checked @endif>
                                        <label for="check-k">{{trans('front.Trailer hitch')}}</label>

                                        <input id="check-l" type="checkbox" name="additional_equipment_outside"  @if(isset($equipments) && is_array($equipments) && in_array("additional_equipment_outside",$equipments)) checked @endif>
                                        <label for="check-l">{{trans('front.cooker_fire')}}</label>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="panel-buttons">
                                    <button class="panel-cancel">{{trans('front.cancel')}}</button>
                                    <button type = "submit" class="panel-apply">{{trans('front.apply')}}</button>
                                </div>

                            </div>
                        </div>
                        <!-- Panel Dropdown / End -->
                        <!-- Panel Dropdown
                        <div class="panel-dropdown">
                            <a href="#">{{trans('front.distance_radius')}}</a>
                            <div class="panel-dropdown-content">
                                <input class="distance-radius" type="range" min="1" max="100" step="1" value="50" data-title="Radius around selected destination" name="searchedRadius">
                                <div class="panel-buttons">
                                    <button class="panel-cancel">{{trans('front.cancel')}}</button>
                                    <button class="panel-apply">{{trans('front.apply')}}</button>
                                </div>
                            </div>
                        </div>-->
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
