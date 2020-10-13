@extends('layout', ['activePage' => 'insurance_company', 'titlePage' => __('backend.insurance_company_managment')])
@section('content')
{{ Breadcrumbs::render('create_insurance_company') }}
<div class="container-fluid">
    <!--'action'=>'InsuranceCompanyController@store',-->
    {{ Form::open(['action'=>'App\Http\Controllers\InsuranceCompanyController@store','autocomplete'=>'off','method'=>'POST']) }}
    <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.label') }} DE</h4>
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
                        <h4 class="card-title">{{ __('backend.label') }} EN</h4>
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
                        <h4 class="card-title">{{ __('backend.label') }} FR</h4>
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
 
                <a href="{{ route('insuranceCompany.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.cancel') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection