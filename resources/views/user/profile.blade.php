@extends('layout', ['activePage' => 'profile', 'titlePage' => __('backend.profile_managment.lbl')])
@section('content')
{{ Breadcrumbs::render('profile') }}

<div class="container-fluid">
    <!--'action'=>'App\Http\Controllers\InsuranceController@update',-->    
    @csrf
     <div class="row">
     <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.user_name.lbl') }}</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                <label class='form-control'>{{$data->name ?? ''}}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">{{ __('backend.client_email.lbl') }}</h4>
                        <div class="mt-5">
                            <div class="form-group">
                            <label class='form-control'>{{$data->email ?? ''}}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.tel.lbl') }}</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                <label class='form-control'>{{$data->telephone ?? ''}}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.picture.lbl') }}</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                <img src="/assets/images/users/{{$data->picture ?? '1.jpg'}}" style="width:254px" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.adress.lbl') }}</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                <label class='form-control' style="height:250px">{{$data->adress ?? ''}}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
            <a href="{{ route('user.updateProfile') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.update.btn') }}</a>
            <a href="{{ route('user.changePassword') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.change_password.btn') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection