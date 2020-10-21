@extends('layout', ['activePage' => 'insurance_company', 'titlePage' => trans('backend.insurance_company_managment')])
@section('content')
{{ Breadcrumbs::render('edit_insurance_company',$data) }}
<div class="container-fluid">
    <!--'action'=>'App\Http\Controllers\FuelController@update',-->
    {{ Form::open(array('method'=>'PUT', 'enctype'=>'multipart/form-data', 'route' => ['insuranceCompany.update', $data->id])) }}

    @csrf
     <div class="row">
     <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.label') }} DE</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                {{Form::text('name',$data->name,['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> {{ __('backend.Logo') }}</h4>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="logo" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">{{ __('backend.Choose file') }} </label>
                                </div>
                            </div>
                                <img style="max-width:100%" src="/assets/images/insuranceCompany/{{$data->logo}}"  style="with:200px"/>
                    </div>
                </div>
            </div>  

            <div class="col-sm-12">
                
                {{Form::submit(__('backend.Update'),['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}
               
                <a href="{{ route('insuranceCompany.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.Cancel') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection
