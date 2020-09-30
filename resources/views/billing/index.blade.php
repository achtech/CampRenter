@extends('layout', ['activePage' => 'billing', 'titlePage' => __('backend.insurance.lbl')])
@section('content')
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
        <div class="card-body">
            <a href="{{ route('excel-export') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class" 
                style="width:200px"><i class="far fa-file-excel"></i>
                {{ __('backend.export.btn') }}</a>
        </div>
    </div>
    <fieldset class="border p-2">
        <legend  class="w-auto">{{ __('backend.billing_date_filter.lbl') }}</legend>
    <div class="form-group row">
       
        <div class="col-3">
            <label style="white-space: nowrap;" for="example-date-input" class="col-2 col-form-label">{{ __('backend.billing_date_from.lbl') }}</label>
          <input class="form-control" type="date" value="{{$todayDate}}" id="example-date-input">
        </div>
   
        <div class="col-3">
            <label style="white-space: nowrap;"  for="example-date-input" class="col-2 col-form-label">{{ __('backend.billing_date_to.lbl') }}</label>
          <input class="form-control" value="{{$todayDate}}" type="date"  id="example-date-input">
        </div>
        <div class="col-3">
          <a href="{{ route('applyFilter') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class" 
          style="width:200px;bottom: 3px;position: absolute;">{{ __('backend.apply.btn') }}</a>
        </div> 
      </div>
    
    </fieldset>
    <br><br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.billing_list.lbl') }}</h4>
                    <div class="table-responsive">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.renter_name.lbl') }} </th>
                                    <th>{{ __('backend.equipment_name.lbl') }} </th>
                                    <th>{{ __('backend.status_paiement.lbl') }} </th>
                                    <th>{{ __('backend.amount_paiement.lbl') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                <tr>
                                    <td>{{$item->client_name}} {{$item->client_last_name}}</td>
                                    <td>{{$item->equipment_name}}</td>
                                    <td>{{$item->billing_status}}</td>
                                    <td>{{$item->amount}}</td>
                                    
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