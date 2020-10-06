@extends('layout', ['activePage' => 'equipment', 'titlePage' => __('backend.equipment_managment.lbl')])
@section('content')
{{ Breadcrumbs::render('equipment') }}
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
                                    <th>{{ __('backend.equipment_name.lbl') }}</th>
                                    <th>{{ __('backend.client.lbl') }}</th>
                                    <th>{{ __('backend.category.lbl') }}</th>
                                    <th>{{ __('backend.availability.lbl') }}</th>
                                    <th>{{ __('backend.status.lbl') }}</th>
                                    <th>{{ __('backend.confirmed.lbl') }}</th>
                                    <th>{{ __('backend.action.btn') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                <tr>
                                    <td><img src="/assets/images/gallery/{{$item->image}}"/></td>
                                    <td>{{App\Http\Controllers\EquipmentController::getCamperName('camper_names',$item->id_campers_name)}}</td>
                                    <td>{{App\Http\Controllers\EquipmentController::getName('clients',$item->id_client)}}</td>
                                    <td>{{App\Http\Controllers\EquipmentController::getLabel('licence_categories',$item->id_licence_categories)}}</td>
                                    <td>
                                        @if($item->availability==1)
                                        <i class="fa fa-circle text-success mr-2"></i>
                                        @else
                                        <i class="fa fa-circle text-danger mr-2"></i>
                                        @endif
                                    <td>{{App\Http\Controllers\EquipmentController::getCamperName('camper_status',$item->id_camper_status)}}</td>
                                    <td>
                                        @if($item->is_confirmed==1)
                                        <i class="fa fa-circle text-success mr-2"></i>
                                        @else
                                        <i class="fa fa-circle text-danger mr-2"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <a href="{{ route('equipment.detail',$item->id)}}" class="btn btn-primary btn-sm rounded-0"><i class="fa fa-list"></i></a>
                                            </li>
                                            @if($item->is_confirmed==1)
                                            <li class="list-inline-item" >
                                                <a href="{{ route('client.edit',$item->id)}}" class="btn btn-danger btn-sm rounded-0" data-toggle="modal" data-target="#block" title="Block"><i class="fas fa-ban"></i></a>
                                            <!-- Modal -->
                                                <div class="modal fade" id="block" role="dialog">
                                                    <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                            </div>
                                                            <div class="modal-body">
                                                                <p>{{ __('backend.block_equipment_message.lbl') }}</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="{{ route('equipment.index').'/'.$item->id.'/block' }}" class="btn btn-danger btn-sm rounded-0"> {{ __('backend.client_block.btn') }}</a>
                                                                <!--<button type="button" class="btn btn-default" data-dismiss="modal" class="btn btn-primary btn-sm rounded-0">Close</button>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                            </li>
                                            @else
                                            <li class="list-inline-item">
                                                <a href="{{ route('equipment.edit',$item->id)}}" class="btn btn-info btn-sm rounded-0" data-toggle="modal" data-target="#activate" title="Activate"><i class="fas fa-check"></i></a>
                                                                              <!-- Modal -->
                                                <div class="modal fade" id="activate" role="dialog">
                                                    <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                            </div>
                                                            <div class="modal-body">
                                                                <p>{{ __('backend.confirm_equipment_message.lbl') }}</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="{{ route('equipment.index').'/'.$item->id.'/active' }}" class="btn btn-danger btn-sm rounded-0"> {{ __('backend.client_activate.btn') }}</a>
                                                                <!--<button type="button" class="btn btn-default" data-dismiss="modal" class="btn btn-primary btn-sm rounded-0">Close</button>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <th>{{ __('backend.image.lbl') }}</th>
                                    <th>{{ __('backend.equipment_name.lbl') }}</th>
                                    <th>{{ __('backend.client.lbl') }}</th>
                                    <th>{{ __('backend.category.lbl') }}</th>
                                    <th>{{ __('backend.availability.lbl') }}</th>
                                    <th>{{ __('backend.status.lbl') }}</th>
                                    <th>{{ __('backend.confirmed.lbl') }}</th>
                                    <th>{{ __('backend.action.btn') }}</th>
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
