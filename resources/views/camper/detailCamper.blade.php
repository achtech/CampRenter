@extends('layout',['activePage' => 'client', 'titlePage' => __('backend.client_management.lbl')])
@section('content')
{{ Breadcrumbs::render('client') }}
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
                                    <th>{{ __('backend.camper_name.lbl') }}</th>
                                    <th>{{ __('backend.camper_description.lbl') }}</th>
                                    <th>{{ __('backend.camper_location.lbl') }}</th>
                                    <th>{{ __('backend.camper_price_per_day.lbl') }}</th>
                                    <th>{{ __('backend.camper_availability.lbl') }}</th>
                                    <th>{{ __('backend.camper_kilometres.lbl') }}</th>
                                    <th>{{ __('backend.camper_model.lbl') }}</th>
                                    <th>{{ __('backend.vehicle_licence.lbl') }}</th>
                                    <th>{{ __('backend.client_action.lbl') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                <tr>
                                    <td>
                                        @if(app()->getLocale()=='en')
                                            {{$item->label_en}}
                                        @endif
                                        @if(app()->getLocale()=='de')
                                            {{$item->label_de}}
                                        @endif
                                        @if(app()->getLocale()=='fr')
                                            {{$item->label_fr}}
                                        @endif
                                    </td>
                                    <td >{{$item->description_equipment}}</td>
                                    <td>{{$item->location}}</td>
                                    <td>{{$item->price_per_day}}</td>
                                    <td>{{$item->availability}}</td>
                                    <td>{{$item->included_kilometres}}</td>
                                    <td>{{$item->model}}</td>
                                    <td>{{$item->vehicle_licence}}</td>
                                    <td>
                                        <a href="{{ route('equipment.detail',$item->id ) }}" class="btn btn-info btn-sm rounded-0">{{ __('backend.check_equipment_detail.btn') }}</a>
                                    </td>
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
