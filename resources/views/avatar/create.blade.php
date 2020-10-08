@extends('layout', ['activePage' => 'avatar', 'titlePage' => __('backend.avatar_managment.lbl')])
@section('content')
{{ Breadcrumbs::render('add_avatar') }}
<div class="container-fluid">
    <!--'action'=>'InsuranceController@store',-->
    {{ Form::open(['action'=>'App\Http\Controllers\AvatarController@store', 'enctype'=>'multipart/form-data','autocomplete'=>'off','method'=>'POST']) }}
    <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.avatar.lbl') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('label','',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> {{ __('backend.avatar.lbl') }}</h4>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">{{ __('backend.choose_file.lbl') }} </label>
                                </div>
                            </div>
                    </div>
                </div>
            </div>  
            <div class="col-sm-12">
                {{Form::submit('Create',['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}
 
                <a href="{{ route('user.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.cancel.btn') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection