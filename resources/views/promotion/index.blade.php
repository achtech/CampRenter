@extends('layout', ['activePage' => 'promotion', 'titlePage' => trans('backend.promotion_managment')])
@section('content')
{{ Breadcrumbs::render('promotion') }}
<div class="container-fluid">
    <!--'action'=>'  CommissionController@store',-->
        <div class="row space-top">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3">{{ __('backend.current_commission') }} </label>
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
                    style="width:200px;margin:0px 10px" >{{ __('backend.new_promotion') }}</a>
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.Commission') }}</th>
                                    <th>{{ __('backend.Description') }}</th>
                                    <th>{{ __('backend.Created by') }}</th>
                                    <th>{{ __('backend.created at') }}</th>
                                    <th>{{ __('backend.Status') }}</th>
                                    <th>{{ __('backend.Operations') }}</th>
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
                                            <i class="btn waves-effect waves-light btn-outline-success">Current</i>

                                            @else
                                            <i class="btn waves-effect waves-light btn-outline-danger">Inactive</i>
                                            @endif

                                        </td>
                                        <td>
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <a href="{{ route('promotion.edit',$item->id)}}" class="btn btn-primary btn-sm rounded-0"><i class="far fa-edit"></i></a>
                                                </li>
                                                @if($item->status == 1)
                                                <li class="list-inline-item">
                                                 <span
                                                        class="btn btn-danger btn-circle"><i class="fa fa-times"></i></span>
                                                </li>
                                                @else
                                                <li class="list-inline-item">
                                                        <a href="{{ route('promotion.activate',$item->id)}}" class="btn btn-warning btn-circle"><i class="fa fa-check"></i></a>
                                                </li>
                                                @endif
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>{{ __('backend.Commission') }}</th>
                                <th>{{ __('backend.Description') }}</th>
                                <th>{{ __('backend.Created by') }}</th>
                                <th>{{ __('backend.created at') }}</th>
                                <th>{{ __('backend.Status') }}</th>
                                <th>{{ __('backend.Operations') }}</th>
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
