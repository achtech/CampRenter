@extends('layout', ['activePage' => 'billing', 'titlePage' => __('backend.billing_managment.lbl')])
@section('content')
{{ Breadcrumbs::render('billing') }}
<div class="container-fluid">
    {{ Form::open(['action'=>'App\Http\Controllers\BillingController@filter','autocomplete'=>'off','method'=>'GET']) }}
        <div class="card">
            <div class="card-body">
                <fieldset class="border p-2">
                    <legend  class="w-auto">{{ __('backend.billing_date_filter.lbl') }}</legend>
                    <div class="form-group row">
                        <div class="col-3">
                            <label style="white-space: nowrap;" for="example-date-input" class="col-2 col-form-label">{{ __('backend.billing_date_from.lbl') }}</label>
                            {{ Form::date('start_date', $startDate?? $todayDate,['class'=>'form-control','required','id'=>'example-date-input'])}}
                        </div>
                
                        <div class="col-3">
                            <label style="white-space: nowrap;"  for="example-date-input" class="col-2 col-form-label">{{ __('backend.billing_date_to.lbl') }}</label>
                            {{ Form::date('end_date', $endDate?? $todayDate,['class'=>'form-control','required','id'=>'example-date-input'])}}
                        </div>
                        <div class="col-3">
                            {{Form::submit('Apply',['style' => 'width:200px;bottom: 3px;position: absolute;','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class','name' => 'action'])}}
                        </div>
                        
                
                        <div class="col-1"></div>
                        <div class="col-2">
                        <a href="{{ route('excel-export') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class" 
                                style="width:200px;bottom: 3px;position: absolute;"><i class="far fa-file-excel"></i>
                                {{ __('backend.export.btn') }}</a>
                    </div>
                    </div>
                </fieldset>
            </div>
        </div>
    {{ Form::close() }}
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.owner_name.lbl') }} </th>
                                    <th>{{ __('backend.amount.lbl') }} </th>
                                    <th>{{ __('backend.date.lbl') }}</th>
                                    <th>{{ __('backend.status.lbl') }}</th>
                                    <th>{{ __('backend.last_booking.lbl') }} </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                <tr>
                                    <td>{{$item->client_name}} {{$item->client_last_name}}</td>
                                    <td>{{$item->current_amount}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                    <a href="{{ route('billing.bookings',$item->id) }}" class="btn btn-info btn-sm rounded-0">{{ __('backend.dashboard_last_booking.lbl') }}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection