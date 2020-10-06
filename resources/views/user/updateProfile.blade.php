@extends('layout', ['activePage' => 'profile', 'titlePage' => __('backend.profile_managment.lbl')])
@section('content')
{{ Breadcrumbs::render('edit_profile') }}
<div class="container-fluid">
    {{ Form::open(array('method'=>'PUT', 'enctype'=>'multipart/form-data' ,'route' => ['user.update', $data->id ?? 1])) }}
    
    @csrf
     <div class="row">
     <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.user_name.lbl') }}</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                {{Form::text('name',$data->name ?? '',['class'=>'form-control','required'])}}
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
                                {{Form::text('email',$data->email ?? '',['class'=>'form-control','required'])}}
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
                                {{Form::text('telephone',$data->telephone ?? '',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-5">
                            <div class="form-group">
                                <input type="file" name="picture" class="custom-file-input" id="inputGroupFile01" />
                                <label class="custom-file-label" for="inputGroupFile01">{{ __('backend.choose_file.lbl') }} </label>
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
                                {{Form::textarea('adress',$data->adress ?? '', ['class'=>'form-control','required'])}}
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