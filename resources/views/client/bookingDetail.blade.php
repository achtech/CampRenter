@extends('layout',['activePage' => 'client', 'titlePage' => trans('backend.rent_management').': '.strtoupper($client->client_last_name) . " " . $client->client_name])
@section('content')
{{ Breadcrumbs::render('rent_detail',$client) }}
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
                    <div class="table-responsive">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.owner_name') }}</th>
                                    <th>{{ __('backend.camper_name') }}</th>
                                    <th>{{ __('backend.From') }}</th>
                                    <th>{{ __('backend.To') }}</th>
                                    <th>{{ __('backend.remaining_days_number') }}</th>
                                    <th>{{ __('backend.dashboard_action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                <tr>
                                    <td>{{$item->client_name}} {{$item->client_last_name}}</td>
                                    <td>{{$item->camper_name}}</td>
                                    <td >{{$item->start_date}}</td>
                                    <td>{{$item->end_date}}</td>
                                    <td>{{$remaining_days}}</td>
                                    <td><a href="{{ route('billing.index') }}" class="btn btn-info btn-sm rounded-0" style="height: 28px;width: 67px;" title="Confirm"><span style="color: white;vertical-align:top;">{{ __('backend.Detail') }}</span></a></td>
                                </tr>
                                <br/>
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
