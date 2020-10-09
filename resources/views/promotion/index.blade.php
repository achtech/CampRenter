@extends('layout', ['activePage' => 'promotion', 'titlePage' => __('backend.promotion_managment.lbl')])
@section('content')
{{ Breadcrumbs::render('promotion') }}
<div class="container-fluid">
    <!--'action'=>'  CommissionController@store',-->
        <div class="row space-top">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">   
                            <div class="form-group row">
                                <label class="col-md-3">{{ __('backend.current_commission.lbl') }} </label>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{$dataPromoActivate->commission}} %"
                                            placeholder="" readonly>
                                    </div>            
                                </div>  
                            </div>  
                        </div>
                    </div>
                </div>  
                 
        </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <a href="{{ route('promotion.create') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class" 
                    style="width:200px;margin:0px 10px" >{{ __('backend.new_promotion.btn') }}</a>
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.commission_label.lbl') }}</th>
                                    <th>{{ __('backend.commission_description.lbl') }}</th>
                                    <th>{{ __('backend.commission_createdBy.lbl') }}</th>
                                    <th>{{ __('backend.commission_createdAt.lbl') }}</th>
                                    <th>{{ __('backend.commission_Status.lbl') }}</th>
                                    <th>{{ __('backend.action.lbl') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                    <tr>
                                        <td>{{$item->commission}} %</td>
                                        <td>{{$item->details}}</td>
                                        <td>{{App\Http\Controllers\Controller::getUser($item->created_by)}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            @if($item->status == 1)
                                            <i class="fa fa-circle text-success font-12" data-toggle="tooltip"
                                                        data-placement="top" title="Active"></i>
                                            @else
                                            <i class="fa fa-circle text-danger font-12" data-toggle="tooltip"
                                                        data-placement="top" title="Desactivate"></i>                     
                                            @endif

                                        </td>
                                        <td>
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <a href="{{ route('promotion.edit',$item->id)}}" class="btn btn-success btn-sm rounded-0"><i class="far fa-edit"></i></a>
                                                </li> 
                                                @if($item->status == 1)
                                                <li class="list-inline-item">
                                                    <span style="width:90px"
                                                        class="btn rounded-0 btn-sm btn-success">{{ __('backend.promotion_status_active.lbl') }}</span>
                                                </li>
                                                @else
                                                <li class="list-inline-item">
                                                        <a href="{{ route('promotion.activate',$item->id)}}" class="btn btn-danger rounded-0 btn-sm ">{{ __('backend.promotion_status_disactivate.lbl') }}</a>
                                                </li>
                                                @endif
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach   
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>{{ __('backend.commission_label.lbl') }}</th>
                                <th>{{ __('backend.commission_description.lbl') }}</th>
                                <th>{{ __('backend.commission_createdBy.lbl') }}</th>
                                <th>{{ __('backend.commission_createdAt.lbl') }}</th>
                                <th>{{ __('backend.commission_Status.lbl') }}</th>
                                <th>{{ __('backend.action.lbl') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div>
@endsection