@extends('layout', ['activePage' => 'insurance', 'titlePage' => trans('backend.insurance_managment')])
@section('content')
{{ Breadcrumbs::render('edit_insurance') }}
<div class="container-fluid">
    <!--'action'=>'App\Http\Controllers\InsuranceController@update',-->
    {{ Form::open(array('method'=>'PUT','route' => ['insurance.update', $data->id])) }}

    @csrf
     <div class="row">
     <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.Description') }} DE</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                {{Form::text('description_de',$data->description_de,['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.Description') }} EN</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                {{Form::text('description_en',$data->description_en,['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.Description') }} FR</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                {{ Form::text('description_fr',$data->description_fr,['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">{{ __('backend.Price per day') }}</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                {{Form::text('price_per_day',$data->price_per_day,['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.insurance_company') }} </h4>
                        <div class="mt-5">
                            <div class="form-group">
                                {{ Form::select('id_inssurance_company', $insuranceCompanies, $data->id_inssurance_company, ['class' => 'form-control','required']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-12">
                {{Form::submit('Update',['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}
                <a href="{{ route('insurance.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.Cancel') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection
