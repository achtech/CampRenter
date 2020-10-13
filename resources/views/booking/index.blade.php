@extends('layout', ['activePage' => 'booking', 'titlePage' => __('backend.booking_management')])
@section('content')
{{ Breadcrumbs::render('booking') }}
<div class="container-fluid ">
    <form method="GET" action="{{ route('booking.search') }}">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.Renter') }}</h4>
                        <div class="form-group mb-4">
                            <select class="custom-select mr-sm-2" id="renterId" name="renterId">
                                <option selected>{{ __('backend.Choose') }}</option>
                                @foreach($datasClients as $item)
                                    <option value="{{$item->id}}" @if($item->id==$renter) selected @endif>{{$item->client_name}} {{$item->client_last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.From') }}</h4>
                        <div class="form-group">
                            <input type="date" class="form-control"  id="start_date"  name="start_date" value="{{ $start_date ?? '' }}"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.To') }}</h4>
                        <div class="form-group">             
                            <input type="date" class="form-control"  id="end_date" name="end_date"  value="{{ $end_date ?? '' }}" />
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
    </form>
    <div class="row space-top">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.booking_list') }}</h4>
                    <div class="table-responsive">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.Renter') }}</th>
                                    <th>{{ __('backend.Camper') }}</th>
                                    <th>{{ __('backend.From') }}</th>
                                    <th>{{ __('backend.To') }}</th>
                                    <th>{{ __('backend.Price per day') }}</th>
                                    <th>{{ __('backend.booking_status_booking') }}</th>
                                    <th>{{ __('backend.status_billing') }}</th>
                                    <th>{{ __('backend.Operations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                    <tr>
                                        <td>{{$item->renter_name }} {{$item->renter_last_name }}</td>
                                        <td>{{$item->camper_name}}</td>        
                                        <td>{{$item->start_date}}</td>
                                        <td>{{$item->end_date}}</td>
                                        <td>{{$item->price_per_day}}</td>
                                        <td>{{ app()->getLocale() == 'de' ? $item->status_booking_de : $item->status_booking_en }}</td>
                                        <td>{{ $item->status_billings }}</td>
                                        <td>
                                            <li class="list-inline-item">
                                                <a href="{{ route('booking.detail',$item->id)}}" class="btn btn-primary btn-sm rounded-0"><i class="fa fa-list"></i></a>
                                            </li>  
                                            <li class="list-inline-item">
                                                <a href="{{ route('booking.chat',$item->id)}}" class="btn btn-success btn-sm rounded-0"><i class="fa fa-newspaper"></i></a>
                                            </li> 
                                        </td>
                                    </tr>
                                @endforeach     
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('backend.Renter') }}</th>
                                    <th>{{ __('backend.Camper') }}</th>
                                    <th>{{ __('backend.From') }}</th>
                                    <th>{{ __('backend.To') }}</th>
                                    <th>{{ __('backend.Price per day') }}</th>
                                    <th>{{ __('backend.booking_status_booking') }}</th>
                                    <th>{{ __('backend.status_billing') }}</th>
                                    <th>{{ __('backend.Operations') }}</th>
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