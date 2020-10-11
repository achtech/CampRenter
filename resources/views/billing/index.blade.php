@extends('layout', ['activePage' => 'billing', 'titlePage' => __('backend.billing_managment.lbl')])
@section('content')
{{ Breadcrumbs::render('billing') }}
<div class="container-fluid">
    {{ Form::open(['action'=>'App\Http\Controllers\BillingController@filter','autocomplete'=>'off','method'=>'GET']) }}
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.owner.lbl') }}</h4>
                        <div class="form-group mb-4">
                            <select class="custom-select mr-sm-2" id="ownerId" name="ownerId">
                                <option selected>{{ __('backend.booking_select_choose.lbl') }}</option>
                                @foreach($clients as $item)
                                    <option value="{{$item->id}}" @if($item->id==$renter) selected @endif>{{$item->client_name}} {{$item->client_last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.booking_from.lbl') }}</h4>
                        <div class="form-group">
                            <input type="date" class="form-control"  id="start_date"  name="start_date" value="{{ $start_date ?? '' }}"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.booking_to.lbl') }}</h4>
                        <div class="form-group">             
                            <input type="date" class="form-control"  id="end_date" name="end_date"  value="{{ $end_date ?? '' }}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.status.lbl') }}</h4>
                        <div class="form-group">           
                            {{ Form::radio('status','1', $status==1,['id'=>'status-0'])}}
                            {{ Form::label('status-0', 'Payed') }} 
                            {{ Form::radio('status','2',$status==2,['id'=>'status-1'])}}
                            {{ Form::label('status-1', 'Not payed') }} 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4"></div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="text-right">
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="text-right">
                    <button style="width:200px;" type="submit" class="btn btn-info">Search</button>
                    <a href="{{ route('excel-export') }}" 
                        class="btn btn-info" 
                        style="width:200px;">
                            <i class="far fa-file-excel"></i>
                            {{ __('backend.export.btn') }}
                    </a>
                </div>
            </div>
        </div>
            <br />
    {{ Form::close() }}
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
                                    <th>{{ __('backend.payment_date.lbl') }}</th>
                                    <th>{{ __('backend.status.lbl') }}</th>
                                    <th>{{ __('backend.last_booking.lbl') }} </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                <tr>
                                    <td>{{$item->client_name}} {{$item->client_last_name}}</td>
                                    <td>{{$item->total}}</td>
                                    <td>{{$item->payment_date}}</td>
                                    <td>@if($item->status==0) <span style="color:red">{{__('backend.not_payed.lbl')}}</span> @else <span style="color:green">{{__('backend.payed.lbl')}}</span> @endif</td> 
                                    <td><a href="{{ route('billing.bookings',$item->id) }}" class="btn btn-info btn-sm rounded-0">{{ __('backend.dashboard_last_booking.lbl') }}</a></td>
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