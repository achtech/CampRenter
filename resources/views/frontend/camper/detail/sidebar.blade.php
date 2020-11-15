<!-- Verified Badge -->
<div class="verified-badge with-tip" data-tip-content="Listing has been verified and belongs the business owner or manager.">
    <i class="sl sl-icon-check"></i> Verified Listing
</div>

<!-- Book Now -->
<div id="booking-widget-anchor" class="boxed-widget booking-widget margin-top-35">
    <h3><i class="fa fa-calendar-check-o "></i> Booking</h3>
    <div class="row with-forms  margin-top-0">

        <!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
        <div class="col-lg-12 booking_date">
            <input type="text" id="booking-date-range" name="searchedDate"  placeholder="Check-In - Check-Out" value=""/>
        </div>

        <!-- Panel Dropdown -->
        <div class="col-lg-12">
            <div class="panel-dropdown">
                <a href="#">Guests <span class="qtyTotal" name="qtyTotal">1</span></a>
                <div class="panel-dropdown-content">

                    <!-- Quantity Buttons -->
                    <div class="qtyButtons">
                        <div class="qtyTitle">Adults</div>
                        <input type="text" name="qtyInput" value="1">
                    </div>

                    <div class="qtyButtons">
                        <div class="qtyTitle">Childrens</div>
                        <input type="text" name="qtyInput" value="0">
                    </div>

                </div>
            </div>
        </div>
        <!-- Panel Dropdown / End -->

    </div>
    
    <!-- Book Now -->
    <a href="{{route('frontend.camper.booking_paiement')}}" class="button book-now fullwidth margin-top-5">Request To Book</a>
    
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
