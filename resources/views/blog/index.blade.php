@extends('layout', ['activePage' => 'blog', 'titlePage' => trans('backend.blog_managment')])
@section('content')
{{ Breadcrumbs::render('blog') }}
<div class="container-fluid">
<script>
</script>
 <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <a href="{{ route('blog.create') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class"
                    style="width:200px;margin-left:5px">{{ __('backend.New Blog') }}</a>
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.Photo') }}</th>
                                    <th>{{ __('backend.Title') }}</th>
                                    <th>{{ __('backend.Author') }}</th>
                                    <th>{{ __('backend.Date creation') }}</th>
                                    <th>{{ __('backend.Article') }}</th>
                                    <th>{{ __('backend.Operations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($datas)==0)
                            <tr>
                                <td colspan="6">{{__('backend.No data found')}}</td>
                            </tr>
                            @endif
                            @foreach($datas as $item)
                                <tr>
                                    <td>
                                    @if(!empty($item->photo))
                                        <img style="width:64px;height:64px;" src="{{ asset('assets/images') }}/blog/{{$item->photo}}" >
                                    @endif
                                    </td>
                                    <td>{{$item->title}}</td>
                                    <td>{{App\Http\Controllers\Controller::getUser($item->created_by)}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{ Illuminate\Support\Str::limit($item->article, 50)}}...</td>
                                    <td>
                                        <ul class="list-inline m-0">
                                           <li class="list-inline-item">
                                                <a href="{{ route('blog.show',$item->id)}}" class="btn btn-success btn-sm rounded-0"><i class="fa fa-list"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="{{ route('blog.edit',$item->id)}}" class="btn btn-success btn-sm rounded-0"><i class="far fa-edit"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                    <button
                                                        class="btn btn-danger btn-sm rounded-0"
                                                        id="deletePrgButton"
                                                        data-id="{{$item->id}}" data-toggle="modal" data-target="#delete"data-placement="top" title="Delete"><i class="far fa-trash-alt"></i>
                                                        </button>          
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('backend.Photo') }}</th>
                                    <th>{{ __('backend.Title') }}</th>
                                    <th>{{ __('backend.Author') }}</th>
                                    <th>{{ __('backend.Date creation') }}</th>
                                    <th>{{ __('backend.Article') }}</th>
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
      <form  action="{{route('blog.delete','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
          <div class="modal-body">
                    {{__('backend.message_delete_blog')}}
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
