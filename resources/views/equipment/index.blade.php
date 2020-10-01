@extends('layout', ['activePage' => 'equipment', 'titlePage' => __('backend.equipment.lbl')])
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('equipment.index')}}">{{ __('backend.equipment.lbl') }}</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card-body">
            <a href="{{ route('equipment.create') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class" 
                style="width:200px">{{ __('backend.new_equipment.btn') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.equipment_list.lbl') }}</h4>
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
                                    <td>{{$item->availability}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>{{$item->confirmed}}</td>
                                    <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <a href="{{ route('equipment.detail',$item->id)}}" class="btn btn-primary btn-sm rounded-0"><i class="fa fa-list"></i></a>
                                            </li>  
                                            <li class="list-inline-item">
                                                <a href="{{ route('equipment.edit',$item->id)}}" class="btn btn-success btn-sm rounded-0"><i class="far fa-edit"></i></a>
                                            </li>  
                                            <li class="list-inline-item">
                                                <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="modal" data-target="#myModal" data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal" role="dialog">
                                                    <div class="modal-dialog">
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <p>{{ __('backend.message_delete_equipment.lbl') }}</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="{{ route('equipment.index').'/'.$item->id.'/delete' }}" class="btn btn-danger btn-sm rounded-0">Delete</a>
                                                                    <!--<button type="button" class="btn btn-default" data-dismiss="modal" class="btn btn-primary btn-sm rounded-0">Close</button>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </li> 
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