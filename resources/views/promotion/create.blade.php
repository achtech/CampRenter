@extends('layout', ['activePage' => 'promotion', 'titlePage' => __('backend.promotion_managment')])
@section('content')
{{ Breadcrumbs::render('create_promotion') }}
<div class="container-fluid">
            {{ Form::open(['action'=>'App\Http\Controllers\PromotionController@store','autocomplete'=>'off','method'=>'POST']) }}
            <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.Commission') }} </h4>
                        <div class="mt-4">
                            <div class="form-group">
                            {{Form::number('commission', '',['class'=>'form-control','required', 'min'=>0,'max'=>100])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.Detail') }} </h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('details','',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-12">
                {{Form::submit('Create',['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}} 
                <a href="{{ route('promotion.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.Cancel') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection