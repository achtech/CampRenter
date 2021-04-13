@extends('admin.layout', ['activePage' => 'blog', 'titlePage' => trans('backend.blog_managment')])
@section('content')
{{ Breadcrumbs::render('add_blog') }}
<div class="container-fluid">
    <!--'action'=>'InsuranceController@store',-->
    {{ Form::open(['action'=>'App\Http\Controllers\admin\BlogController@store', 'enctype'=>'multipart/form-data','autocomplete'=>'off','method'=>'POST']) }}
    <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.Title') }} EN</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('title_en','',['class'=>'form-control','required'])}}
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
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.Title') }} DE</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('title_de','',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.Title') }} FR</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('title_fr','',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.Article') }} EN</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::textarea('article_en','',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.Article') }} FR</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::textarea('article_fr','',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.Article') }} DE</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::textarea('article_de','',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                {{Form::submit('Create',['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}

                <a href="{{ route('admin.blog.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.Cancel') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection
