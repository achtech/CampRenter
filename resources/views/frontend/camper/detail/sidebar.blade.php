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
            <input type="text" id="booking-date-range" placeholder="Check-In - Check-Out" value=""/>
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
        <h4><span>Hosted by</span> <a href="pages-user-profile.html">Tom Perrin</a></h4>
        <a href="pages-user-profile.html" class="hosted-by-avatar"><img src="images/dashboard-avatar.jpg" alt=""></a>
    </div>
    <ul class="listing-details-sidebar">
        <li><i class="sl sl-icon-phone"></i> (123) 123-456</li>
        <!-- <li><i class="sl sl-icon-globe"></i> <a href="#">http://example.com</a></li> -->
        <li><i class="fa fa-envelope-o"></i> <a href="#">tom@example.com</a></li>
    </ul>

    <ul class="listing-details-sidebar social-profiles">
        <li><a href="#" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>
        <li><a href="#" class="twitter-profile"><i class="fa fa-twitter"></i> Twitter</a></li>
        <!-- <li><a href="#" class="gplus-profile"><i class="fa fa-google-plus"></i> Google Plus</a></li> -->
    </ul>

    <!-- Reply to review popup -->
    <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
        <div class="small-dialog-header">
            <h3>Send Message</h3>
        </div>
        <div class="message-reply margin-top-0">
            <textarea cols="40" rows="3" placeholder="Your message to Tom"></textarea>
            <button class="button">Send Message</button>
        </div>
    </div>

    <a href="#small-dialog" class="send-message-to-owner button popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i> Send Message</a>
</div>
<!-- Contact / End-->


<!-- Share / Like -->
<div class="listing-share margin-top-40 margin-bottom-40 no-border">
    <button class="like-button"><span class="like-icon"></span> Bookmark this listing</button> 
    <span>159 people bookmarked this place</span>

        <!-- Share Buttons -->
        <ul class="share-buttons margin-top-40 margin-bottom-0">
            <li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
            <li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
            <li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>
            <!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
        </ul>
        <div class="clearfix"></div>
</div>
