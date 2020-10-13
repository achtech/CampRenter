@extends('layout', ['activePage' => 'user', 'titlePage' => __('backend.user')])
@section('content')
{{ Breadcrumbs::render('add_user') }}
<div class="container-fluid">
    <!--'action'=>'InsuranceController@store',-->
    {{ Form::open(['action'=>'App\Http\Controllers\UserController@store','enctype'=>'multipart/form-data' ,'autocomplete'=>'off','method'=>'POST']) }}
    <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.user_name') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('name','',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.tel') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('telephone','',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.role') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{ Form::radio('role','super-admin',['class'=>'form-control','id'=>'role-0'])}}
                                {{ Form::label('role-0', 'Super admin') }} &nbsp;&nbsp;&nbsp;
                                {{ Form::radio('role','admin',['class'=>'form-control','id'=>'role-1'])}}
                                {{ Form::label('role-1', 'Admin') }} 
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.picture') }}</h4>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="picture" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">{{ __('backend.choose_file') }} </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.email') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('email','',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.adress') }} </h4>
                        <div class="mt-4">
                            <div class="form-group">
                                 {{Form::textarea('adress','',['class'=>'form-control','required'])}} 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
               
            <div class="col-sm-12">
                {{Form::submit('Create',['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}
 
                <a href="{{ route('user.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.cancel') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection