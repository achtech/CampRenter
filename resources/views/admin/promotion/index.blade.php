@extends('admin.layout', ['activePage' => 'promotion', 'titlePage' => trans('backend.promotion_managment')])
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
                                                @if($item->status != 1)
                                                        <a href="{{ route('promotion.activate',$item->id)}}" class="btn btn-warning"><i class="fa fa-check"></i></a>
                                                <li class="list-inline-item">
                                                        <button
                                                        class="btn btn-danger"
                                                        id="deletePrgButton"
                                                        data-id="{{$item->id}}" data-toggle="modal" data-target="#delete"data-placement="top" title="Delete"><i class="far fa-trash-alt"></i>
                                                        </button>          
                                              </li>
                                                <li class="list-inline-item">
                                                    <a href="{{ route('promotion.edit',$item->id)}}" class="btn btn-primary "><i class="far fa-edit"></i></a>
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
<!-- Modal -->
<div class="modal modal-danger fade" id="deletePrgModal" tabindex="-1"
  role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center" id="myModalLabel"> {{__('backend.delete_confirmation')}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form  action="{{route('promotion.delete','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
          <div class="modal-body">
                    {{__('backend.message_delete_promotion')}}
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

@endsection
