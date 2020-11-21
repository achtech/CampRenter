@extends('admin.layout', ['activePage' => 'blog', 'titlePage' => __('backend.blog_managment')])
@section('content')
{{ Breadcrumbs::render('edit_blog',$data) }}
<div class="container-fluid">
    <!--'action'=>'InsuranceController@store',-->
    {{ Form::open(array('method'=>'PUT', 'enctype'=>'multipart/form-data' ,'route' => ['admin.blog.update', $data->id ?? 1])) }}
    <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.Title') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('title',$data->title,['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.Article') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::textarea('article',$data->article,['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> {{ __('backend.Photo') }}</h4>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="photo" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">{{ __('backend.Choose file') }} </label>
                                </div>
                            </div>
                            <div>
                                <img src="asset('/images')}}/blog/{{$data->photo}}"  style="width:80%; height: 80%;"/>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">

                {{Form::submit(__('backend.Update'),['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}

                <a href="{{ route('admin.blog.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.Cancel') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection
