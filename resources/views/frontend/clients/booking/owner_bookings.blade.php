<ul>
    @if($ownerBookings != null)
        @foreach($ownerBookings as $booking)
            <li class="booking-{{$booking->booking_status_id}}">
                <div class="list-box-listing bookings">
                    <div class="list-box-listing-img"><img style="max-width:175% !important;" src="{{asset('images/camper')}}/{{$booking->camper_image}}" alt=""></div>
                    <div class="list-box-listing-content">
                        <div class="inner">
                            <h3>{{$booking->camper_name}}
                                <span class="booking-status s-{{$booking->booking_status_id}}">{{$booking->booking_status_en}}</span>
                            </h3>
                            <div class="inner-booking-list">
                                <h5>{{trans('front.booking_date')}}:</h5>
                                <ul class="booking-list">
                                    <li class="highlighted">{{date('j F Y', strtotime($booking->start_date))}} - {{date('j F Y', strtotime($booking->end_date))}}</li>
                                </ul>
                            </div>

                            <div class="inner-booking-list">
                                <h5>{{trans('front.price')}}:</h5>
                                <ul class="booking-list">
                                    <li class="highlighted">{{App\Http\Controllers\frontend\FC_CamperController::getCamperPriceCurrentSaison($booking->id_campers)}} CHF</li>
                                </ul>
                            </div>

                            <div class="inner-booking-list">
                                <h5>{{trans('front.client')}}:</h5>
                                <ul class="booking-list">
                                    <li>{{$booking->client_last_name}}</li>
                                </ul>
                            </div>
                            @if($booking->booking_status_id==5 || $booking->booking_status_id==4)
                                <a href="/message_client/detail/{{$booking->id_renters}}"
                                    class="rate-review ">
                                    <i class="far fa-envelope-open"></i> {{trans('front.send_message')}}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="buttons-to-right">
                @if($booking->booking_status_id==1)
                    <a href="{{ route('booking.owner_booking.reject',$booking->id)}}" class="button gray reject"><i class="far fa-times-circle"></i> {{trans('front.reject')}}</a>
                    <a href="{{ route('booking.owner_booking.confirm',$booking->id)}}" class="button gray approve"><i class="far fa-check-circle"></i> {{trans('front.approve')}}</a>
                @endif
                <a href="{{ route('booking.owner_booking.detail',$booking->id)}}" class="button green approve"><i class="fas fa-list-ul"></i> {{trans('front.details')}}</a>
                </div>
            </li>

        @endforeach
    @endif
</ul>
