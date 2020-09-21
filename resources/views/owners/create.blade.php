@extends('layout', ['activePage' => 'Owner', 'titlePage' => __('backend.owner.lbl')])
@section('content')

<div class="container-fluid">
    <!--'action'=>'ClientController@store',-->
    {{ Form::open(['action'=>'ClientController@store','autocomplete'=>'off','method'=>'POST']) }}
    <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.client_name.lbl') }}</h4>
                        <form class="mt-4">
                            <div class="form-group">
                                {{Form::text('client_name','',['class'=>'form-control','required'])}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.client_last_name.lbl') }}</h4>
                        <form class="mt-4">
                            <div class="form-group">
                                {{Form::text('client_last_name','',['class'=>'form-control','required'])}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.client_email.lbl') }}</h4>
                        <form class="mt-4">
                            <div class="form-group">
                                {{Form::text('email','',['class'=>'form-control','required'])}}
                            </div>
                        </form>
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
                                    {{Form::file('id_avatars')}}
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
                        <form class="mt-5">
                            <div class="form-group">
                                {{ Form::password('password',array('class' => 'form-control','placeholder' => 'password','required')) }}
                            </div>
                        </form>
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
                                    {{Form::file('image_national_id')}}
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
                        <form class="mt-4">
                            <div class="form-group">
                                {{Form::text('driving_licence','',['class'=>'form-control','required'])}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> {{ __('backend.driving_licence_image.lbl') }}</h4>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    {{Form::file('driving_licence_image')}}
                                    <label class="custom-file-label" for="inputGroupFile01">{{ __('backend.choose_file.lbl') }} </label>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.national.lbl') }} </h4>
                        <form class="mt-5">
                            <div class="form-group">
                                {{Form::text('national_id','',['class'=>'form-control','required'])}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>      
            <div class="col-sm-12 col-md-6">
                {{Form::submit('Create',['class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}
 
                <a href="{{ route('owners.create') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.cancel.btn') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection