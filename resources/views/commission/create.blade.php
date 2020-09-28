@extends('layout', ['activePage' => 'commission', 'titlePage' => __('backend.commission.lbl')])
@section('content')
<div class="container-fluid">
    <!--'action'=>'ComissionController@store',-->
    {{ Form::open(['action'=>'App\Http\Controllers\ComissionController@store','autocomplete'=>'off','method'=>'POST']) }}
    <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.commission_rate.lbl') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('rate','',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-2 col-lg-2">
        </div>
        <div class="col-sm-12 col-md-2 col-lg-2">
            {{Form::submit('Create',['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}
        </div>
        <div class="col-sm-12 col-md-2 col-lg-2">
            <a href="{{ route('commission.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.cancel.btn') }}</a>
        </div>
    </div>
    {{ Form::close() }}
</div>

@endsection