<ul>
    @foreach($renterBookings as $booking)
        <li class="booking-{{$booking->booking_status_id}}">
            <div class="list-box-listing bookings">
                <div class="list-box-listing-img"><img src="/images/avatar/{{$booking->image}}" alt=""></div>
                <div class="list-box-listing-content">
                    <div class="inner">
                        <h3>{{$booking->camper_name}}
                            <span class="booking-status s-{{$booking->booking_status_id}}">{{$booking->booking_status_en}}</span>
                        </h3>
                        <div class="inner-booking-list">
                            <h5>{{trans('front.booking_date')}}:</h5>
                            <ul class="booking-list">
                                <li class="highlighted">{{$booking->start_date}} - {{$booking->end_date}}</li>
                            </ul>
                        </div>

                        <div class="inner-booking-list">
                            <h5>{{trans('front.price')}}:</h5>
                            <ul class="booking-list">
                                <li class="highlighted">{{$booking->price}} CHF</li>
                            </ul>
                        </div>

                        @if($booking->booking_status_id==5 || $booking->booking_status_id==4)
                            <a href="#small-dialog" class="rate-review popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i> {{trans('front.send_message')}}</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="buttons-to-right">
            @if($booking->booking_status_id==2)
                <a href="{{ route('booking.renter_booking.process',$booking->id)}}" class="button gray approve"><i class="sl sl-icon-check"></i> {{trans('front.complete_booking')}}</a>
            @endif
            <a href="{{ route('booking.owner_booking.detail',$booking->id)}}" class="button green approve"><i class="sl sl-icon-screen-tablet"></i> {{trans('front.details')}}</a>
            </div>
        </li>

        @endforeach
</ul>
