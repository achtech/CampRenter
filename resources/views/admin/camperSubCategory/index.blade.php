@extends('admin.layout', ['activePage' => 'camperSubCategory', 'titlePage' => trans('backend.camperSubCategory_managment')])
@section('content')
{{ Breadcrumbs::render('camperSubCategory') }}
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="{{ route('camperSubCategory.create') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class"
                            style="width:200px;margin:0px 10px">{{ __('backend.new_camperSubCategory') }}</a>
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.Image') }}</th>
                                    <th>{{ __('backend.category') }}</th>
                                    <th>{{ __('backend.label') }} DE</th>
                                    <th>{{ __('backend.label') }} EN</th>
                                    <th>{{ __('backend.label') }} FR</th>
                                     <th>{{ __('backend.Operations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                <tr>
                                    <td>
                                        <img style="width:64px;height:64px;" src="{{ asset('images') }}/camper_categories/{{$item->image}}" >
                                    </td>
                                    <td>{{App\Http\Controllers\Controller::getLabel('camper_categories',$item->id_camper_categories)}}</td>
                                    <td>{{$item->label_de}}</td>
                                    <td>{{$item->label_en}}</td>
                                    <td>{{$item->label_fr}}</td>
                                   <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <a href="{{ route('camperSubCategory.edit',$item->id)}}" class="btn btn-success btn-sm rounded-0"><i class="far fa-edit"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                            <div class="container">
                                                <button
                                                    class="btn btn-danger btn-sm rounded-0"
                                                    id="deletePrgButton"
                                                    data-id="{{$item->id}}" data-toggle="modal" data-target="#delete"data-placement="top" title="Delete"><i class="far fa-trash-alt"></i>
                                                </button>
                                            </div>                                             </li>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('backend.Image') }}</th>
                                    <th>{{ __('backend.Category') }}</th>
                                    <th>{{ __('backend.label') }} DE</th>
                                    <th>{{ __('backend.label') }} EN</th>
                                    <th>{{ __('backend.label') }} FR</th>
                                     <th>{{ __('backend.Operations') }}</th>                                </tr>
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
      <form  action="{{route('camperSubCategory.delete','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
          <div class="modal-body">
                    {{__('backend.message_delete_camperSubCategory')}}
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
