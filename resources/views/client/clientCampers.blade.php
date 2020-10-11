@extends('layout', ['activePage' => 'client', 'titlePage' => __('backend.client_management.lbl')])
@section('content')
{{ Breadcrumbs::render('clients_campers',$client) }}
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
                                    <th>{{ __('backend.image.lbl') }}</th>
                                    <th>{{ __('backend.camper_name.lbl') }}</th>
                                    <th>{{ __('backend.category.lbl') }}</th>
                                    <th>{{ __('backend.availability.lbl') }}</th>
                                    <th>{{ __('backend.status.lbl') }}</th>
                                    <th>{{ __('backend.confirmed.lbl') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                <tr>
                                    <td style="vertical-align: middle;text-align:center"><img style="width:100px" src="/assets/images/gallery/{{$item->image}}"/></td>
                                    <td style="vertical-align: middle;">{{$item->camper_name}}</td>
                                    <td style="vertical-align: middle;">{{App\Http\Controllers\CamperController::getLabel('licence_categories',$item->id_licence_categories)}}</td>
                                    <td style="vertical-align: middle;text-align:center">
                                        @if($item->availability==0)
                                        <i class="btn waves-effect waves-light btn-danger">Blocked</i>
                                        @elseif($item->availability==1)
                                        <i class="btn waves-effect waves-light btn-warning">Reserved</i>
                                        @else
                                        <i class="btn waves-effect waves-light btn-success">Available</i>
                                        @endif
                                    <td style="vertical-align: middle;">
                                        @if($item->availability==0)
                                            Blocked by Owner {{App\Http\Controllers\CamperController::getName('clients',$item->id_clients)}}
                                        @elseif($item->availability==1)
                                            Reserved by {{App\Http\Controllers\CamperController::getName('clients',$item->id_clients)}}
                                            <br />From : {{App\Http\Controllers\CamperController::getBookingCamperStart($item->id)}}
                                            <br />To  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp{{App\Http\Controllers\CamperController::getBookingCamperEnd($item->id)}}
                                        @else
                                            Available
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle;text-align:center">
                                        @if($item->is_confirmed==1)
                                            <i class="btn waves-effect waves-light btn-outline-success">&nbsp&nbsp&nbspConfirmed &nbsp&nbsp&nbsp</i></br>
                                            by {{App\Http\Controllers\CamperController::getUserName($item->updated_by)}}
                                        @else
                                            <i class="btn waves-effect waves-light btn-outline-danger">Not Confirmed</i></br>
                                            by {{App\Http\Controllers\CamperController::getUserName($item->updated_by)}}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <th>{{ __('backend.image.lbl') }}</th>
                                    <th>{{ __('backend.camper_name.lbl') }}</th>
                                    <th>{{ __('backend.category.lbl') }}</th>
                                    <th>{{ __('backend.availability.lbl') }}</th>
                                    <th>{{ __('backend.status.lbl') }}</th>
                                    <th>{{ __('backend.confirmed.lbl') }}</th>
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