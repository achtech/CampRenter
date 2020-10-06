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
                                    <td>{{$item->availability}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>{{$item->confirmed}}</td>
                                    <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <a href="{{ route('equipment.confirm',$item->id) }}" class="btn btn-primary btn-sm rounded-0"><i class="fas fa-check"></i></a>
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