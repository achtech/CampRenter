@extends('layout', ['activePage' => 'avatar', 'titlePage' => __('backend.avatar_managment')])
@section('content')
{{ Breadcrumbs::render('avatar') }}
<div class="container-fluid">
<script>
$(document).ready(function() {
    var table = $('#default_order').DataTable();
    // Hide two columns
    table.columns( [0] ).visible( false );
} );
</script>
 <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <a href="{{ route('avatar.create') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class" 
                    style="width:200px;margin-left:5px">{{ __('backend.New avatar') }}</a>
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>{{ __('backend.Avatar') }}</th>
                                    <th>{{ __('backend.label') }}</th>
                                    <th>{{ __('backend.Operations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($datas)==0)
                            <tr>
                                <td colspan="3">{{__('backend.No data found')}}</td>
                            </tr>
                            @endif
                            @foreach($datas as $item)
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                <img style="width:64px;height:64px;" src="/assets/images/avatar/{{$item->image}}" ></td>
                                    <td>{{$item->label}}</td>
                                   <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <a href="{{ route('avatar.edit',$item->id)}}" class="btn btn-success btn-sm rounded-0"><i class="far fa-edit"></i></a>
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
                                                                <p>{{ __('backend.message_delete_avatar') }}</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="{{ route('avatar.destroy',$item->id) }}" class="btn btn-danger btn-sm rounded-0">Delete</a>
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
                                    <th>&nbsp;</th>
                                    <th>{{ __('backend.Avatar') }}</th>
                                    <th>{{ __('backend.label') }}</th>
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