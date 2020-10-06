@extends('layout', ['activePage' => 'commission', 'titlePage' => __('backend.commission_managment.lbl')])
@section('content')
{{ Breadcrumbs::render('commission') }}
<div class="container-fluid">
    <!--'action'=>'  CommissionController@store',-->
    {{ Form::open(['action'=>'App\Http\Controllers\CommissionController@store','autocomplete'=>'off','method'=>'POST']) }}
        <div class="row space-top">
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('backend.commission_rate.lbl') }}</h4>
                                <div class="form-group">
                                    {{Form::number('rate','',['class'=>'form-control','max'=>'100','required'])}}
                                </div>
                        </div>
                    </div>
                </div>  
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">&nbsp;</h4>
                                <div class="form-group">
                                 {{Form::submit('Create',['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary','name' => 'action'])}}
                                </div>   
                        </div>
                    </div>
                </div> 
        </div>
    
        {{ Form::close() }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.commission_createdBy.lbl') }}</th>
                                    <th>{{ __('backend.commission_createdAt.lbl') }}</th>
                                    <th>{{ __('backend.commission_rate.lbl') }}</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                    <tr>
                                        <td>{{$item->created_by}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->rate}}</td>
                                        <td>
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <a href="{{ route('commission.index').'/'.$item->id.'/delete' }}" class="btn btn-danger btn-sm rounded-0">Delete</a>
                                                </li>  
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach   
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('backend.commission_createdBy.lbl') }}</th>
                                    <th>{{ __('backend.commission_createdAt.lbl') }}</th>
                                    <th>{{ __('backend.commission_rate.lbl') }}</th>
                                    <th>Operation</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---------------start promotion -------------------->
    {{ Form::open(['action'=>'App\Http\Controllers\PromotionController@store','autocomplete'=>'off','method'=>'POST']) }}
        <div class="row space-top">
                <div class="col-sm-12 col-md-2 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('backend.promotion_rate.lbl') }}</h4>
                                <div class="form-group">
                                    {{Form::number('rate','',['class'=>'form-control','max'=>'100','required'])}}
                                </div>
                        </div>
                    </div>
                </div>  
                <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('backend.promotion_start_date.lbl') }}</h4>
                                    <div class="form-group">
                                        {{Form::date('date_from','',['class'=>'form-control','required'])}}
                                    </div>
                            </div>
                        </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('backend.promotion_end_date.lbl') }}</h4>
                                    <div class="form-group">
                                        {{Form::date('date_to','',['class'=>'form-control','required'])}}
                                    </div>
                            </div>
                        </div>
                </div> 
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4"></div>
            <div class="col-sm-12 col-md-4 col-lg-4"></div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                 {{Form::submit('Create',['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}
                </div>
                    
            </div>
        </div>
        {{ Form::close() }}
    <div class="row space-top">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.promotion_list.lbl') }}</h4>
                    <div class="table-responsive">
                        <table id="multi_col_order" class="table table-striped table-bordered display no-wrap dataTable no-footer"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.promotion_start_date.lbl') }}</th>
                                    <th>{{ __('backend.promotion_end_date.lbl') }}</th>
                                    <th>{{ __('backend.promotion_createdBy.lbl') }}</th>
                                    <th>{{ __('backend.promotion_createdAt.lbl') }}</th>
                                    <th>{{ __('backend.promotion_rate.lbl') }}</th>
                                    <th>{{ __('backend.operation.lbl') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datasPromo as $item)
                                    <tr>
                                        <td>{{$item->date_from}}</td>
                                        <td>{{$item->date_to}}</td>
                                        <td>{{$item->created_by}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->rate}}</td>
                                        <td>
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <a href="{{ route('promotion.index').'/'.$item->id.'/delete' }}" class="btn btn-danger btn-sm rounded-0">Delete</a>
                                                </li>  
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach   
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('backend.promotion_start_date.lbl') }}</th>
                                    <th>{{ __('backend.promotion_end_date.lbl') }}</th>
                                    <th>{{ __('backend.promotion_createdBy.lbl') }}</th>
                                    <th>{{ __('backend.promotion_createdAt.lbl') }}</th>
                                    <th>{{ __('backend.promotion_rate.lbl') }}</th>
                                    <th>{{ __('backend.operation.lbl') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---- end promotion -------------->
</div>
@endsection