@extends('layout', ['activePage' => 'transmission', 'titlePage' => __('backend.transmission_managment.lbl')])
@section('content')
{{ Breadcrumbs::render('create_transmission') }}
<div class="container-fluid">
    <!--'action'=>'TransmissionController@store',-->
    {{ Form::open(['action'=>'App\Http\Controllers\TransmissionController@store','autocomplete'=>'off','method'=>'POST']) }}
    <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
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
            <div class="col-sm-12 col-md-6 col-lg-6">
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
            <div class="col-sm-12 col-md-6 col-lg-6">
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
 
                <a href="{{ route('transmission.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.cancel.btn') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection