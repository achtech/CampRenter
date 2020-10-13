@extends('layout', ['activePage' => 'insurance', 'titlePage' => __('backend.insurance_managment')])
@section('content')
{{ Breadcrumbs::render('create_insurance') }}
<div class="container-fluid">
    <!--'action'=>'InsuranceController@store',-->
    {{ Form::open(['action'=>'App\Http\Controllers\InsuranceController@store','autocomplete'=>'off','method'=>'POST']) }}
    <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.description') }} DE</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('description_de','',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">{{ __('backend.price_per_day') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('price_per_day','',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.description') }} EN</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('description_en','',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.insurance_company') }} </h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{ Form::select('id_inssurance_company', $insuranceCompanies, null, ['class' => 'form-control','required']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.description') }} FR</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{ Form::text('description_fr','',['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">{{ __('backend.camper_name') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{ Form::select('id_camper_name', $camperNames, null, ['class' => 'form-control','required']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
               
            <div class="col-sm-12">
                {{Form::submit('Create',['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}
 
                <a href="{{ route('insurance.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.cancel') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection