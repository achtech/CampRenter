<ul>
    @if($ownerBookings != null)
        @foreach($ownerBookings as $booking)
            <li class="booking-{{$booking->booking_status_id}}">
                <div class="list-box-listing bookings">
                    <div class="list-box-listing-img"><img style="padding-top: 13%;" src="{{asset('images/camper')}}/{{$booking->camper_image}}" alt=""></div>
                    <div class="list-box-listing-content">
                        <div class="inner">
                            <h3>{{$booking->camper_name}}
                                <span class="booking-status s-{{$booking->booking_status_id}}">{{App\Http\Controllers\Controller::getStatus('v_bookings_owner',$booking->id)}}</span>
                            </h3>
                            <div class="inner-booking-list">
                                <h5>{{trans('front.booking_date')}}:</h5>
                                <ul class="booking-list">
                                    <li class="highlighted">{{trans('front.from')}}: {{date('j m Y', strtotime($booking->start_date))}} {{trans('front.to')}}: {{date('j m Y', strtotime($booking->end_date))}}</li>
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
                                <a href="#owner-dialog"
                                    class="rate-review popup-with-zoom-anim">
                                    <i class="far fa-envelope-open"></i>
                                    {{trans('front.send_message')}}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Reply to review popup -->
                <div id="owner-dialog" class="zoom-anim-dialog mfp-hide">
                {{ Form::open(['action'=>'App\Http\Controllers\frontend\FC_messageController@store', 'method'=>'POST']) }}
                    <input type="hidden" name="id_renters" value="{{$booking->id_renters}}"/>
                    <input type="hidden" name="id_owners" value="{{$booking->id_owners}}"/>
                    <input type="hidden" name="id_bookings" value="{{$booking->id}}"/>

                    <div class="small-dialog-header">
                        <h3>{{trans('front.send_message')}}</h3>
                    </div>
                    <div class="message-reply margin-top-0">
                        <textarea cols="40" rows="3" name="message" placeholder="{{trans('front.your_message')}}"></textarea>
                    </div>
                {{Form::submit(trans('front.send'),['class'=>'button','name' => 'action'])}}
                {{Form::close()}}

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
