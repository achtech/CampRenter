@extends('layout', ['activePage' => 'camperStatus', 'titlePage' => __('backend.camperStatus_managment.lbl')])
@section('content')
{{ Breadcrumbs::render('create_camperStatus') }}
<div class="container-fluid">
    <!--'action'=>'CamperStatusController@store',-->
    {{ Form::open(['action'=>'App\Http\Controllers\CamperStatusController@store','autocomplete'=>'off','method'=>'POST']) }}
    <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.label.lbl') }} DE</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('label_de','',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.label.lbl') }} EN</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('label_en','',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.label.lbl') }} FR</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{ Form::text('label_fr','',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                {{Form::submit('Create',['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}
                <a href="{{ route('camperStatus.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.cancel.btn') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection