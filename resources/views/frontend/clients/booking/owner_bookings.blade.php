<ul>
@foreach($ownerBookings as $booking)
    <li class="booking-{{$booking->booking_status_id}}">
        <div class="list-box-listing bookings">
            <div class="list-box-listing-img"><img src="/images/avatar/{{$booking->image}}" alt=""></div>
            <div class="list-box-listing-content">
                <div class="inner">
                    <h3>{{$booking->camper_name}} 
                        <span class="booking-status s-{{$booking->booking_status_id}}">{{$booking->booking_status_en}}</span>
                    </h3>
                    <div class="inner-booking-list">
                        <h5>Booking Date:</h5>
                        <ul class="booking-list">
                            <li class="highlighted">{{$booking->start_date}} - {{$booking->end_date}}</li>
                        </ul>
                    </div>

                    <div class="inner-booking-list">
                        <h5>Price:</h5>
                        <ul class="booking-list">
                            <li class="highlighted">{{$booking->price}} CHF</li>
                        </ul>
                    </div>

                    <div class="inner-booking-list">
                        <h5>Client:</h5>
                        <ul class="booking-list">
                            <li>{{$booking->client_last_name." ".$booking->client_name}}</li>
                            <li>{{$booking->email ?? 'no Email is specified'}}</li>
                            <li>{{$booking->telephone ?? 'no phone number is specified'}}</li>
                        </ul>
                    </div>
                    @if($booking->booking_status_id==5 || $booking->booking_status_id==4)
                        <a href="#small-dialog" class="rate-review popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i> Send Message</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="buttons-to-right">
        @if($booking->booking_status_id==1)
            <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> Reject</a>
            <a href="#" class="button gray approve"><i class="sl sl-icon-check"></i> Approve</a>
        @endif
        <a href="{{ route('booking.owner_booking.detail',$booking->id)}}" class="button green approve"><i class="sl sl-icon-screen-tablet"></i> Details</a>
        </div>
    </li>
@endforeach
    <li class="approved-booking">
        <div class="list-box-listing bookings">
            <div class="list-box-listing-img"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=120" alt=""></div>
            <div class="list-box-listing-content">
                <div class="inner">
                    <h3>Burger House <span class="booking-status">Approved</span></h3>

                    <div class="inner-booking-list">
                        <h5>Booking Date:</h5>
                        <ul class="booking-list">
                            <li class="highlighted">10.12.2019 at 12:30 pm - 13:30 pm</li>
                        </ul>
                    </div>

                    <div class="inner-booking-list">
                        <h5>Booking Details:</h5>
                        <ul class="booking-list">
                            <li class="highlighted">2 Adults, 2 Children</li>
                        </ul>
                    </div>

                    <div class="inner-booking-list">
                        <h5>Client:</h5>
                        <ul class="booking-list">
                            <li>Kathy Brown</li>
                            <li>kathy@example.com</li>
                            <li>123-456-789</li>
                        </ul>
                    </div>

                    <a href="#small-dialog" class="rate-review popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i> Send Message</a>

                </div>
            </div>
        </div>
        <div class="buttons-to-right">
            <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> Cancel</a>
        </div>
    </li>

    <li class="canceled-booking">
        <div class="list-box-listing bookings">
            <div class="list-box-listing-img"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=120" alt=""></div>
            <div class="list-box-listing-content">
                <div class="inner">
                    <h3>Tom's Restaurant <span class="booking-status">Canceled</span></h3>

                    <div class="inner-booking-list">
                        <h5>Booking Date:</h5>
                        <ul class="booking-list">
                            <li class="highlighted">21.10.2019 at 9:30 am - 10:30 am</li>
                        </ul>
                    </div>

                    <div class="inner-booking-list">
                        <h5>Booking Details:</h5>
                        <ul class="booking-list">
                            <li class="highlighted">2 Adults</li>
                        </ul>
                    </div>

                    <div class="inner-booking-list">
                        <h5>Client:</h5>
                        <ul class="booking-list">
                            <li>Kathy Brown</li>
                            <li>kathy@example.com</li>
                            <li>123-456-789</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </li>

</ul>
