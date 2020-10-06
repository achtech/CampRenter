@extends('layout', ['activePage' => 'profile', 'titlePage' => __('backend.profile_managment.lbl')])
@section('content')
{{ Breadcrumbs::render('change_password') }}
<div class="container-fluid">
    {{ Form::open(array('method'=>'PUT','route' => ['user.updatePassword'])) }}
    
    @csrf
     <div class="row">
     <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.current_password.lbl') }}</h4>
                    <div class="mt-5">
                        <div class="form-group">
                            {{ Form::password('old_password',array('class' => 'form-control','placeholder' => 'password','required')) }}
          
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.new_password.lbl') }}</h4>
                    <div class="mt-5">
                        <div class="form-group">
                            {{ Form::password('password',array('class' => 'form-control','placeholder' => 'password','required','confirmed')) }}
          
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">{{ __('backend.confirm_password.lbl') }}</h4>
                    <div class="mt-5">
                        <div class="form-group">
                          {{ Form::password('password_confirmation',array('class' => 'form-control','placeholder' => 'password','required')) }}
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