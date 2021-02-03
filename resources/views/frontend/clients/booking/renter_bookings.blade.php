<ul>
    @foreach($renterBookings as $booking)
        <li class="booking-{{$booking->booking_status_id}}">
            <div class="list-box-listing bookings">
                <div class="list-box-listing-img"><img src="{{asset('images')}}/camper/{{$booking->camper_image}}" alt=""></div>
                <div class="list-box-listing-content">
                    <div class="inner">
                        <h3>{{$booking->camper_name}}
                            <span class="booking-status s-{{$booking->booking_status_id}}">{{$booking->booking_status_en}}</span>
                        </h3>
                        <div class="inner-booking-list">
                            <h5>{{trans('front.booking_date')}}:</h5>
                            <ul class="booking-list">
                                <li class="highlighted">From: {{date('j F Y', strtotime($booking->start_date))}} To: {{date('j F Y', strtotime($booking->end_date))}}</li>
                            </ul>
                        </div>

                        <div class="inner-booking-list">
                            <h5>{{trans('front.total_price')}}:</h5>
                            <ul class="booking-list">
                                <li class="highlighted">{{$booking->total}} CHF</li>
                            </ul>
                        </div>

                        @if($booking->booking_status_id==5 || $booking->booking_status_id==4)
                            <a href="#small-dialog" class="rate-review popup-with-zoom-anim"><i class="far fa-envelope-open"></i> {{trans('front.send_message')}}</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="buttons-to-right">
            @if($booking->booking_status_id==2)
                <a href="{{ route('booking.renter_booking.process',$booking->id)}}" class="button gray approve"><i class="far fa-edit"></i> {{trans('front.complete_booking')}}</a>
            @endif
            <a href="{{ route('booking.owner_booking.detail',$booking->id)}}" class="button green approve"><i class="fas fa-list-ul"></i> {{trans('front.details')}}</a>
            </div>
        </li>

        @endforeach
</ul>
