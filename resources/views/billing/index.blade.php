@extends('layout', ['activePage' => 'billing', 'titlePage' => __('backend.billing_managment.lbl')])
@section('content')
{{ Breadcrumbs::render('billing') }}
<div class="container-fluid">
    <div class="row">
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('insurance.index')}}">
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        
    </div>
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
            {{ Form::date('end_date', $end_date?? $todayDate,['class'=>'form-control','required','id'=>'example-date-input'])}}
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
</div></div>{{ Form::close() }}
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
                                    <th>{{ __('backend.last_booking.lbl') }} </th>
                                    <th>{{ __('backend.current_amount.lbl') }} </th>
                                    <th>{{ __('backend.confirmed_amount.lbl') }}</th>
                                    <th>{{ __('backend.status.lbl') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                <tr>
                                    <td>{{$item->client_name}} {{$item->client_last_name}}</td>
                                    <td><a href="#"> {{ __('backend.detail.lbl') }}</a></td>
                                    <td>{{$item->current_amount}}</td>
                                    <td>{{$item->confirmed_amount}}</td>
                                    <td>{{$item->billing_status}}</td>
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