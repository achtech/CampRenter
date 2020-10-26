@extends('admin.layout', ['activePage' => 'message', 'titlePage' => trans('backend.message_managment')])
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
                                    <th>{{ __('backend.Email') }}</th>
                                    <th>{{ __('backend.Phone') }}</th>
                                    <th>{{ __('backend.Subject') }}</th>
                                    <th>{{ __('backend.send_date') }}</th>
                                    <th>{{ __('backend.Status') }}</th>
                                    <th>{{ __('backend.Operations') }}</th>
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
                                                    <button
                                                        class="btn btn-danger btn-sm rounded-0"
                                                        id="deletePrgButton"
                                                        data-id="{{$item->id}}" data-toggle="modal" data-target="#delete"data-placement="top" title="Delete"><i class="far fa-trash-alt"></i>
                                                    </button>          
                                              </div>                                             </li>
                                          </li>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('backend.contact') }}</th>
                                    <th>{{ __('backend.Email') }}</th>
                                    <th>{{ __('backend.Phone') }}</th>
                                    <th>{{ __('backend.Subject') }}</th>
                                    <th>{{ __('backend.send_date') }}</th>
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
</div>
<!-- Modal -->
<div class="modal modal-danger fade" id="deletePrgModal" tabindex="-1"
  role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center" id="myModalLabel"> {{__('backend.delete_confirmation')}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form  action="{{route('message.delete','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
          <div class="modal-body">
                    {{__('backend.message_delete_message')}}
                <input type="hidden" name="id" id="id" value="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal"> {{__('backend.Cancel')}}</button>
            <button type="submit" class="btn btn-info">{{__('backend.Delete')}}</button>
          </div>
      </form>
    </div>
  </div>
</div>                                            
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).on("click", "#deletePrgButton", function () {
        var prg = $(this).data('id');
        $(".modal-body #id").val( prg );
        $('#deletePrgModal').modal('show');
    });
</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection
