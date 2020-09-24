@extends('layout', ['activePage' => 'commission', 'titlePage' => __('backend.commission.lbl')])
@section('content')
<div class="container-fluid">
<div class="row">
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('commission.index')}}">{{ __('backend.commission.lbl') }}</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card-body">
            <a href="{{ route('commission.create') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class" 
                style="width:200px">{{ __('backend.new_commission.btn') }}</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.commission_list.lbl') }}</h4>
                    <div class="table-responsive">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.commission_createdBy.lbl') }}</th>
                                    <th>{{ __('backend.commission_createdAt.lbl') }}</th>
                                    <th>{{ __('backend.commission_rate.lbl') }}</th>
                                    <th>{{ __('backend.commission_updatedBy.lbl') }}</th>
                                    <th>{{ __('backend.commission_updatedAt.lbl') }}</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                    <tr>
                                        <td>{{$item->created_by}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->rate}}</td>
                                        <td>{{$item->updated_by}}</td>
                                        <td>{{$item->updated_at}}</td>
                                        <td>
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <a href="{{ route('commission.edit',$item->id)}}" class="btn btn-success btn-sm rounded-0"><i class="far fa-edit"></i></a>
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
                                    <th>{{ __('backend.commission_updatedBy.lbl') }}</th>
                                    <th>{{ __('backend.commission_updatedAt.lbl') }}</th>
                                    <th>Operation</th>
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