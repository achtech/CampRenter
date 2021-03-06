@extends('admin.layout', ['activePage' => 'camper', 'titlePage' => trans('backend.camper_managment')])
@section('content')
{{ Breadcrumbs::render('camper') }}
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
                                    <th>{{ __('backend.Image') }}</th>
                                    <th>{{ __('backend.camper_name') }}</th>
                                    <th>{{ __('backend.Client') }}</th>
                                    <th>{{ __('backend.category') }}</th>
                                    <th>{{ __('backend.availability') }}</th>
                                    <th>{{ __('backend.Status') }}</th>
                                    <th>{{ __('backend.confirmed') }}</th>
                                    <th>{{ __('backend.Operations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                <tr>
                                    <td style="vertical-align: middle;text-align:center"><img style="width:100px" src="{{ asset('images/gallery') }}/{{$item->image}}"/></td>
                                    <td style="vertical-align: middle;">{{$item->camper_name}}</td>
                                    <td style="vertical-align: middle;">{{App\Http\Controllers\admin\CamperController::getName('clients',$item->id_clients)}}</td>
                                    <td style="vertical-align: middle;">{{App\Http\Controllers\admin\CamperController::getLabel('camper_categories',$item->id_camper_categories)}}</td>
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
                                            Blocked by Owner {{App\Http\Controllers\admin\CamperController::getName('clients',$item->id_clients)}}
                                        @elseif($item->availability==1)
                                            Reserved by {{App\Http\Controllers\admin\CamperController::getName('clients',$item->id_clients)}}
                                            <br />From : {{App\Http\Controllers\admin\CamperController::getBookingCamperStart($item->id)}}
                                            <br />To  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp{{App\Http\Controllers\admin\CamperController::getBookingCamperEnd($item->id)}}
                                        @else
                                            Available
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle;text-align:center">
                                        @if($item->is_confirmed==1)
                                            <i class="btn waves-effect waves-light btn-outline-success">&nbsp&nbsp&nbspConfirmed &nbsp&nbsp&nbsp</i></br>
                                            by {{App\Http\Controllers\Controller::getUser($item->updated_by)}}
                                        @else
                                            <i class="btn waves-effect waves-light btn-outline-danger">Not Confirmed</i></br>
                                            by {{App\Http\Controllers\Controller::getUser($item->updated_by)}}
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <a href="{{ route('camper.detail',$item->id)}}" class="btn btn-primary btn-sm rounded-0"  data-toggle="tooltip" title="Details"><i class="fa fa-list"></i></a>
                                            </li>
                                            @if($item->is_confirmed==1)
                                            <li class="list-inline-item" >
                                                <a href="" class="btn btn-danger btn-sm rounded-0" data-toggle="modal" data-target="#block"  title="Block"><i class="fas fa-ban"></i></a>
                                            <!-- Modal -->
                                                <div class="modal fade" id="block" role="dialog">
                                                    <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>{{ __('backend.block_camper_message') }}</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="{{ route('camper.blockActivateCamper', $item->id)}}" class="btn btn-danger btn-sm rounded-0"> {{ __('backend.block') }}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                            </li>
                                            @else
                                            <li class="list-inline-item">
                                                <a href="" class="btn btn-info btn-sm rounded-0" data-toggle="modal" data-target="#activate"  title="Confirm"><i class="fas fa-check"></i></a>
                                                                              <!-- Modal -->
                                                <div class="modal fade" id="activate" role="dialog">
                                                    <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                            </div>
                                                            <div class="modal-body">
                                                                <p>{{ __('backend.confirm_camper_message') }}</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="{{ route('camper.blockActivateCamper', $item->id) }}" class="btn btn-danger btn-sm rounded-0"> {{ __('backend.activate') }}</a>
                                                                <!--<button type="button" class="btn btn-default" data-dismiss="modal" class="btn btn-primary btn-sm rounded-0">Close</button>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endif
                                            <li class="list-inline-item">
                                                <a href="{{ route('camper.reviews',$item->id)}}" class="btn btn-primary btn-sm rounded-0"  data-toggle="tooltip" title="Details"><i class="far fa-star"></i></a>
                                            </li>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <th>{{ __('backend.Image') }}</th>
                                    <th>{{ __('backend.camper_name') }}</th>
                                    <th>{{ __('backend.Client') }}</th>
                                    <th>{{ __('backend.category') }}</th>
                                    <th>{{ __('backend.availability') }}</th>
                                    <th>{{ __('backend.Status') }}</th>
                                    <th>{{ __('backend.confirmed') }}</th>
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
