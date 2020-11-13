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
                            <div id="autocomplete-container" data-autocomplete-tip="type and hit enter">
                                <input id="autocomplete-input" type="text" placeholder="Location" name="searchedLocation" value="{{$searchedLocation ?? ''}}" onchange="document.forms['frm1'].submit()" >
                            </div>
                            <a href="#"><i class="fa fa-map-marker"></i></a>
                        </div>
                    </div>

                    <!-- Main Search Input -->
                    <div class="col-fs-6">
                        <div class="input-with-icon date_range_search">
                            <i class="fa fa-calendar calendar-position"></i>
                            <input type="text" id="booking-date-range" name="searchedDate" placeholder="Check-In - Check-Out" value="{{$searchedDate ?? ''}}"/>
                        </div>
                    </div>

                    <!-- Filters -->
                    <div class="col-fs-12">

                        <!-- Panel Dropdown / End -->
                        <div class="panel-dropdown">
                            <a href="#">Categories</a>
                            <div class="panel-dropdown-content checkboxes categories">

                                <!-- Checkboxes -->
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach($categories as $category)
                                        <input id="check-{{$category->id}}" type="checkbox" value="{{$category->id}}" name="searchedCategories[]" @if(isset($searchedCategory) && $category->id==$searchedCategory) checked @endif>
                                        <label for="check-{{$category->id}}">{{App\Http\Controllers\Controller::getLabel("camper_categories", $category->id)}}</label>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="panel-buttons">
                                    <button class="panel-cancel">Cancel</button>
                                    <button type="submit" class="panel-apply">Apply</button>
                                </div>

                            </div>
                        </div>
                        <!-- Panel Dropdown / End -->

                        <!-- Panel Dropdown -->
                        <div class="panel-dropdown wide">
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
                        <!-- Panel Dropdown -->
                        <div class="panel-dropdown">
                            <a href="#">Distance Radius</a>
                            <div class="panel-dropdown-content">
                                <input class="distance-radius" type="range" min="1" max="100" step="1" value="50" data-title="Radius around selected destination" name="searchedRadius">
                                <div class="panel-buttons">
                                    <button class="panel-cancel">Disable</button>
                                    <button class="panel-apply">Apply</button>
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