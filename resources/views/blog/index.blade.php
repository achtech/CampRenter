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
                                <img style="width:64px;height:64px;" src="{{ asset('assets/images') }}/blog/{{$item->photo}}" ></td>
                                    <td>{{$item->title}}</td>
                                    <td>{{App\Http\Controllers\CamperController::getUserName($item->created_by)}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->article}}</td>
                                    <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <a href="{{ route('blog.edit',$item->id)}}" class="btn btn-success btn-sm rounded-0"><i class="far fa-edit"></i></a>
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
                                                                <p>{{ __('backend.message_delete_blog') }}</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="{{ route('blog.index').'/'.$item->id.'/delete' }}" class="btn btn-danger btn-sm rounded-0">Delete</a>
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
@endsection
