@extends('layout', ['activePage' => 'profile', 'titlePage' => __('backend.settings_profil.lbl')])
@section('content')
{{ Breadcrumbs::render('profile') }}
<div class="container-fluid">
    <!--'action'=>'App\Http\Controllers\InsuranceController@update',-->
    {{ Form::open(array('method'=>'PUT','route' => ['user.update', $data->id ?? 1])) }}
    
    @csrf
     <div class="row">
     <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.user_name.lbl') }}</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                {{Form::text('user_name',$data->user_name ?? '',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">{{ __('backend.client_email.lbl') }}</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                {{Form::text('email',$data->email ?? '',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.tel.lbl') }}</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                {{Form::text('telephone',$data->telephone ?? '',['class'=>'form-control','required'])}}
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
                                {{Form::text('adress',$data->adress ?? '', ['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                {{Form::submit('Update',['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}
                <a href="{{ route('user.profile') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.cancel.btn') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection