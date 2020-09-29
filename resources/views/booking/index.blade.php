@extends('layout', ['activePage' => 'booking', 'titlePage' => __('backend.booking.lbl')])
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html">{{ __('backend.booking_title.lbl') }}</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid space-top">
{{ Form::open(['action'=>'App\Http\Controllers\BookingController@search','autocomplete'=>'off','method'=>'GET']) }}
   <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.booking_owner.lbl') }}</h4>
                        <div class="form-group mb-4">
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>{{ __('backend.booking_select_choose.lbl') }}</option>
                                @foreach($datasClients as $item)
                                    <option value="{{$item->id}}">{{$item->client_name}} {{$item->client_last_name}}</option>
                                @endforeach
                                <option value="3">Three</option>
                            </select>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.booking_from.lbl') }}</h4>
                        <div class="form-group">
                            <input type="date" class="form-control" value="2018-05-13">
                        </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.booking_to.lbl') }}</h4>
                        <div class="form-group">
                            <input type="date" class="form-control" value="2018-05-13">
                        </div>
                </div>
            </div>
        </div>
   </div>
   <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6"></div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="text-right">
                <button type="submit" class="btn btn-info">Search</button>
            </div>
        </div>
    </div>
    {{ Form::close() }}
    <div class="row space-top">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.booking_list.lbl') }}</h4>
                    <div class="table-responsive">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.booking_renter.lbl') }}</th>
                                    <th>{{ __('backend.booking_equipement.lbl') }}</th>
                                    <th>{{ __('backend.booking_from.lbl') }}</th>
                                    <th>{{ __('backend.booking_to.lbl') }}</th>
                                    <th>{{ __('backend.booking_price_per_day.lbl') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                    <tr>
                                        <td>{{$item->client_name }} {{$item->client_last_name }}</td>
                                        <td>{{$item->equipment_name_en}}</td>        
                                        <td>{{$item->dateFrom}}</td>
                                        <td>{{$item->dateTo}}</td>
                                        <td>{{$item->price_per_day}}</td>
                                    </tr>
                                @endforeach     
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('backend.booking_renter.lbl') }}</th>
                                    <th>{{ __('backend.booking_equipement.lbl') }}</th>
                                    <th>{{ __('backend.booking_from.lbl') }}</th>
                                    <th>{{ __('backend.booking_to.lbl') }}</th>
                                    <th>{{ __('backend.booking_price_per_day.lbl') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection