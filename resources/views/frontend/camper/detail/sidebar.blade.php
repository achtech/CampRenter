<!-- Verified Badge -->
<div class="verified-badge with-tip">
<i class="far fa-check-circle"></i> Verified Listing
</div>

<!-- Book Now -->
<div id="booking-widget-anchor" class="boxed-widget booking-widget margin-top-35">
    <form method="POST"  action="{{route('frontend.add_request_booking',$camper->id)}}" >
    @csrf
        <h3><i class="fa fa-calendar-check-o "></i> Booking</h3>
        <div class="row with-forms  margin-top-0">

            <!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
            <div class="col-lg-12 booking_date">
                <input type="text" id="booking-date-range"
                        name="searchedDate"  placeholder="Check-In - Check-Out"
                        />
            </div>
            <!--
            <div class="col-lg-12 booking_date" id="booking_devis">
                <div class="col-lg-8 booking_date">
                    <label>Number of night</label>
                </div>

                <div class="col-lg-4 booking_date">
                    <span id="numberdays">10</span>
                </div>
                <div class="col-lg-8 booking_date">
                    <label>Total</label>
                </div>

                <div class="col-lg-4 booking_date">
                    <span id="priceBooking">100 CHF</span>
                </div>
            </div>-->
        </div>

        <!-- Book Now -->
        @if(!session('_client'))
        <a href="/showlogin/client" class="button book-now fullwidth margin-top-5">Request To Book</a>
        @else
        <button type="submit" class="button book-now fullwidth margin-top-5">Request To Book</button>
        @endif
    </form>
    <!-- Estimated Cost -->
</div>
<!-- Book Now / End -->

<!-- Contact -->
<div class="boxed-widget margin-top-35">
    <div class="hosted-by-title">
        <h4><span>Hosted by</span> <a href="pages-user-profile.html">{{$owner->client_name}} {{$owner->client_last_name}}</a></h4>
    </div>
</div>
<!-- Contact / End-->


<!-- Share / Like -->
<div class="listing-share margin-top-40 margin-bottom-40 no-border">

    <div id="bookmarkCount">
        <button class="like-button " onclick="AddOrRemoveBookmark()">
            <span  class="like-icon {{App\Http\Controllers\frontend\FC_bookmarkController::isBookmarked($camper->id)>0 ? 'liked' : ''}}"></span>
            Bookmark this listing</button>
            <span>{{App\Http\Controllers\frontend\FC_bookmarkController::getBookmarkCamperCount($camper->id)}} people bookmarked this place</span>
        </div>
        <!-- Share Buttons -->
        <ul class="share-buttons margin-top-40 margin-bottom-0">
            <li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
            <li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
            <li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>
            <!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
        </ul>
        <div class="clearfix"></div>
</div>
