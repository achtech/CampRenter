@extends('layout', ['activePage' => 'user', 'titlePage' => __('backend.user.lbl')])
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('user.index')}}">{{ __('backend.user.lbl') }}</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card-body">
            <a href="{{ route('user.create') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class" 
                style="width:200px">{{ __('backend.new_user.btn') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.user_list.lbl') }}</h4>
                    <div class="table-responsive">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.avatar.lbl') }}</th>
                                    <th>{{ __('backend.user_name.lbl') }}</th>
                                    <th>{{ __('backend.tel.lbl') }}</th>
                                    <th>{{ __('backend.email.lbl') }}</th>
                                    <th>{{ __('backend.role.lbl') }}</th>
                                    <th>{{ __('backend.adress.lbl') }}</th>
                                    <th>{{ __('backend.operations.lbl') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $item)
                                <tr>
                                    <td>
                                <img style="width:64px;height:64px;" src="{{$item->picture}}" ></td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->telephone}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->role}}</td>
                                    <td>{{$item->adress}}</td>
                                   <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <a href="{{ route('user.edit',$item->id)}}" class="btn btn-success btn-sm rounded-0"><i class="far fa-edit"></i></a>
                                            </li>  
                                            <li class="list-inline-item">
                                                <div class="container">
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
                                                                <p>{{ __('backend.message_delete_user.lbl') }}</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="{{ route('user.index').'/'.$item->id.'/delete' }}" class="btn btn-danger btn-sm rounded-0">Delete</a>
                                                                    <!--<button type="button" class="btn btn-default" data-dismiss="modal" class="btn btn-primary btn-sm rounded-0">Close</button>-->
                                                                </div>
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
                                <tr>
                                <th>{{ __('backend.avatar.lbl') }}</th>
                                    <th>{{ __('backend.user_name.lbl') }}</th>
                                    <th>{{ __('backend.tel.lbl') }}</th>
                                    <th>{{ __('backend.email.lbl') }}</th>
                                    <th>{{ __('backend.role.lbl') }}</th>
                                    <th>{{ __('backend.adress.lbl') }}</th>
                                    <th>{{ __('backend.operations.lbl') }}</th>

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