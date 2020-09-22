@extends('layout', ['activePage' => 'Owner', 'titlePage' => __('backend.owner.lbl')])
@section('content')

<div class="container-fluid">
    <!--'action'=>'App\Http\Controllers\ClientController@update',-->
    {{ Form::open(['autocomplete'=>'off','method'=>'POST']) }}
    @csrf
    {{Form::hidden('_method','PUT')}}
     <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.client_name.lbl') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('client_name',$data->client_name,['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.client_last_name.lbl') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('client_last_name',$data->client_last_name,['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.client_email.lbl') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('email',$data->email,['class'=>'form-control','required'])}}
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
                                    <input type="file" name="id_avatars" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">{{ __('backend.choose_file.lbl') }} </label>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.client_password.lbl') }} </h4>
                        <div class="mt-5">
                            <div class="form-group">
                                {{ Form::password('password',array('class' => 'form-control','placeholder' => 'password','required')) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> {{ __('backend.client_national_image.lbl') }}</h4>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image_national_id" class="custom-file-input" id="inputGroupFile01">

                                    <label class="custom-file-label" for="inputGroupFile01">{{ __('backend.choose_file.lbl') }} </label>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.driving_licence.lbl') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('driving_licence',$data->driving_licence,['class'=>'form-control','required'])}}
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> {{ __('backend.driving_licence.lbl') }}</h4>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="driving_licence_image" class="custom-file-input" id="inputGroupFile02">

                                    <label class="custom-file-label" for="inputGroupFile02">{{ __('backend.choose_file.lbl') }} </label>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.national.lbl') }} </h4>
                        <div class="mt-5">
                            <div class="form-group">
                                {{Form::text('national_id',$data->national_id,['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
            <div class="col-sm-12 col-md-6">
                {{Form::submit('Update',['class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}
 
                <a href="{{ route('owners.create') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.cancel.btn') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection