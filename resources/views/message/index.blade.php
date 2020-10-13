@extends('layout', ['activePage' => 'message', 'titlePage' => __('backend.message_managment')])
@section('content')
{{ Breadcrumbs::render('message') }}
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
                                    <th>{{ __('backend.contact') }}</th>
                                    <th>{{ __('backend.email') }}</th>
                                    <th>{{ __('backend.telephone') }}</th>
                                    <th>{{ __('backend.subject') }}</th>
                                    <th>{{ __('backend.send_date') }}</th>
                                    <th>{{ __('backend.status') }}</th>
                                    <th>{{ __('backend.operations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $item)
                                <tr class="{{$item->status== 1 ? 'css-status-read' : 'css-status-not-read'}}">
                                    <td>{{$item->full_name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->telephone}}</td>
                                    <td>{{$item->subject}}</td>
                                    <td>{{$item->send_date}}</td>
                                    <td>{{ __('backend.message_status_'.$item->status.'') }}</td>
                                   <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <a href="{{ route('message.show',$item->id)}}" class="btn btn-success btn-sm rounded-0" data-toggle="tooltip" title="Detail Message"><i class="fa fa-newspaper"></i></a>
                                            </li> 
                                            <li class="list-inline-item">
                                                <div class="container">
                                                <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-target="#myModal" data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal" role="dialog">
                                                    <div class="modal-dialog">
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <p>{{ __('backend.message_delete_message') }}</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="{{ route('message.index').'/'.$item->id.'/delete' }}" class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" title="Delete">Delete</a>
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
                                    <th>{{ __('backend.contact') }}</th>
                                    <th>{{ __('backend.email') }}</th>
                                    <th>{{ __('backend.telephone') }}</th>
                                    <th>{{ __('backend.subject') }}</th>
                                    <th>{{ __('backend.send_date') }}</th>
                                    <th>{{ __('backend.status') }}</th>
                                    <th>{{ __('backend.operations') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
@endsection