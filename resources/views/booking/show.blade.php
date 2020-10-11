@extends('layout', ['activePage' => 'booking', 'titlePage' => __('backend.booking_management.lbl')])
@section('content')
{{ Breadcrumbs::render('detail_booking',$data) }}
<div class="container-fluid">
<div class="row">
        <div class="col-6">
            <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                         <div class="row">
                                <div class="col-md-12">
                            <div class="row">
                                <label class="col-md-4">{{ __('backend.booking_owner.lbl') }}</label>
                                <div class="col-md-8">
                                            <div class="form-group">
                                                <label>{{$data->owner_name}} {{$data->owner_last_name}}
                                                </label>
                                            </div>
                                        </div>    
                                    </div>
                            <div class="form-group row">
                                <label class="col-md-4">{{ __('backend.booking_camper.lbl') }} </label>
                                <div class="col-md-8">
                                            <div class="form-group">
                                                <label>{{$data->renter_name}} {{$data->renter_last_name}}
                                            </label>
                                            </div>
                                        </div>     
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">{{ __('backend.booking_from.lbl') }} </label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>{{$data->start_date}}</label>
                                </div>
                            </div>
                                    </div>
                            <div class="form-group row">
                                        <label class="col-md-4">{{ __('backend.booking_to.lbl') }} </label>
                                <div class="col-md-8">
                                            <div class="form-group">
                                                <label>{{$data->end_date}}</label>
                                            </div>
                                        </div>    
                                    </div>
                            <div class="form-group row">
                                        <label class="col-md-4">{{ __('backend.status_booking.lbl') }} </label>
                                <div class="col-md-8">
                                            <div class="form-group">
                                                <label>{{ app()->getLocale() =='de' ? $data->status_booking_de : $data->status_booking_en }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                            </div>     
        <div class="col-6">
                                    <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="col-md-4">{{ __('backend.booking_camper.lbl') }} </label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>
                                                    {{$data->camper_name}}
                                                </label>
                                            </div>
                                        </div>     
                                    </div>
                            <div class="form-group row">
                                        <div  class="col-md-4"><label>{{ __('backend.booking_price_per_day.lbl') }}</label></div>
                                <div class="col-md-8">
                                            <div class="form-group">
                                                <label>{{$data->price_per_day }}</label>
                                            </div>
                                        </div>     
                                    </div>
                            <div class="form-group row">
                                        <label class="col-md-4">{{ __('backend.booking_total_price.lbl') }} </label>
                                <div class="col-md-8">
                                            <div class="form-group">
                                                <label>{{$data->total }}</label>
                                            </div>
                                        </div>     
                                    </div>
                            <div class="form-group row">
                                <label class="col-md-4">{{ __('backend.status_billing.lbl') }} </label>
                                <div class="col-md-8">
                                            <div class="form-group">
                                                <label>{{$data->status_billings}}</label>
                                            </div>
                                        </div>     
                                    </div>
                                </div>
                            </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
