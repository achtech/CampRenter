@extends('layout', ['activePage' => 'booking', 'titlePage' => __('backend.booking_management.lbl')])
@section('content')
{{ Breadcrumbs::render('detail_booking',$data) }}
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   
                    <div class="row">
                        <div class="col-4">  
                            <div class="card">
                                <div class="card-body">
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <img style="height: 120px;" src="/assets/images/campers/{{$data->img_equipment}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">    
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">{{ __('backend.renter_first_name.lbl') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            {{Form::text('renterName',$data->client_name,['class'=>'form-control','required','disabled'])}}                                </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                      
                        <div class="col-4">    
                            <div class="card" >
                                <div class="card-body">
                                    <h4 class="card-title">{{ __('backend.renter_last_name.lbl') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                        {{Form::text('renterLastName',$data->client_last_name,['class'=>'form-control','required','disabled'])}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">    
                            <div class="card" >
                                <div class="card-body">
                                    <h4 class="card-title">{{ __('backend.booking_from.lbl') }}</h4>
                                        <div class="mt-4">
                                            <div class="form-group">
                                                {{Form::text('start_date',$data->start_date,['class'=>'form-control','required','disabled'])}}
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                
                        <div class="col-2">    
                            <div class="card" >
                                <div class="card-body">
                                    <h4 class="card-title">{{ __('backend.booking_to.lbl') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            {{Form::text('start_date',$data->end_date,['class'=>'form-control','required','disabled'])}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">    
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">{{ __('backend.booking_equipement.lbl') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            {{Form::text('equipment_name_en',$data->equipment_name_en,['class'=>'form-control','required','disabled'])}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">    
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">{{ __('backend.booking_price_per_day.lbl') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            {{Form::text('price_per_day',$data->price_per_day,['class'=>'form-control','required','disabled'])}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">    
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">{{ __('backend.booking_total_days.lbl') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            {{Form::text('bookingDay',$data->bookingDay,['class'=>'form-control','required','disabled'])}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <div class="col-3">    
                            <div class="card" >
                                <div class="card-body">
                                    <h4 class="card-title">{{ __('backend.booking_total_price.lbl') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            {{Form::text('totalPrice',$totalPrice,['class'=>'form-control','required','disabled'])}}
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