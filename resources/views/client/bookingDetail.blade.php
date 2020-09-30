@extends('layout',['activePage' => 'client', 'titlePage' => __('backend.client.lbl')]))
@section('content')
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item">
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.equipment_booking_list.lbl') }}</h4>
                    <div class="table-responsive">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.owner_name.lbl') }}</th>
                                    <th>{{ __('backend.equipment_name.lbl') }}</th>
                                    <th>{{ __('backend.booking_from.lbl') }}</th>
                                    <th>{{ __('backend.booking_to.lbl') }}</th>
                                    <th>{{ __('backend.remaining_days_number.lbl') }}</th>
                                    <th>{{ __('backend.dashboard_action.lbl') }}</th>    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                <tr>
                                    <td>{{$item->client_name}} {{$item->client_last_name}}</td>
                                    <td>{{$item->equipment_name}}</td>
                                    <td >{{$item->dateFrom}}</td>
                                    <td>{{$item->dateTo}}</td>
                                    <td>{{$remaining_days}}</td>
                                    <td><a href="{{ route('billing.index') }}" class="btn btn-info btn-sm rounded-0" style="height: 28px;width: 67px;" title="Confirm"><span style="color: white;vertical-align:top;">{{ __('backend.detail.btn') }}</span></a></td>
                                   
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