@extends('admin.layout', ['activePage' => 'profile', 'titlePage' => trans('backend.Profile managment')])
@section('content')
{{ Breadcrumbs::render('profile') }}
<div class="container-fluid">
    <!--'action'=>'App\Http\Controllers\admin\InsuranceController@update',-->
    @csrf
     <div class="row">
         @if(session('_client'))
         {{session('_client')}}
         @else
         nn session
         @endif
     <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.user_name') }}</h4>
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
                    <h4 class="card-title">{{ __('backend.Email') }}</h4>
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
                        <h4 class="card-title">{{ __('backend.Phone') }}</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                <label class='form-control'>{{$data->telephone ?? ''}}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.role') }}</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                <label class='form-control'>{{$data->role ?? ''}}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.Photo') }}</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                <img src="{{ asset('/assets/admin/images/users') }}/{{$data->picture ?? '1.jpg'}}" style="width:254px" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.adress') }}</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                <label class='form-control' style="height:250px">{{$data->adress ?? ''}}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
            <a href="{{ route('user.updateProfile') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.Edit') }}</a>
            <a href="{{ route('user.changePassword') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.Change password') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection
