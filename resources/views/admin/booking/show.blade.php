@extends('admin.layout', ['activePage' => 'booking', 'titlePage' => trans('backend.booking_management')])
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
                                <label class="col-md-4">{{ __('backend.Owner') }}</label>
                                <div class="col-md-8">
                                            <div class="form-group">
                                                <label>{{$data->owner_name}} {{$data->owner_last_name}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                            <div class="form-group row">
                                <label class="col-md-4">{{ __('backend.Camper') }} </label>
                                <div class="col-md-8">
                                            <div class="form-group">
                                                <label>{{$data->renter_name}} {{$data->renter_last_name}}
                                            </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">{{ __('backend.From') }} </label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>{{$data->start_date}}</label>
                                </div>
                            </div>
                                    </div>
                            <div class="form-group row">
                                        <label class="col-md-4">{{ __('backend.To') }} </label>
                                <div class="col-md-8">
                                            <div class="form-group">
                                                <label>{{$data->end_date}}</label>
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
                                        <label class="col-md-4">{{ __('backend.Camper') }} </label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>
                                                    {{$data->camper_name}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                            <div class="form-group row">
                                        <label class="col-md-4">{{ __('backend.booking_total_price') }} </label>
                                <div class="col-md-8">
                                            <div class="form-group">
                                                <label>{{$data->total }}</label>
                                            </div>
                                        </div>
                                    </div>
                            <div class="form-group row">
                                <label class="col-md-4">{{ __('backend.status_billing') }} </label>
                                <div class="col-md-8">
                                            <div class="form-group">
                                                <label>{{$data->status_billings}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                <label class="col-md-4">{{ __('backend.status_booking') }} </label>
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
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-4">

                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">

                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="card-body">
                                        <a href="{{ route('booking.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.Return') }}</a>
                                    </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
