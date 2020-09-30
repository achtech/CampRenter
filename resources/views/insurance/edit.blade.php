@extends('layout', ['activePage' => 'insurance', 'titlePage' => __('backend.owner.lbl')])
@section('content')

<div class="container-fluid">
    <!--'action'=>'App\Http\Controllers\InsuranceController@update',-->
    {{ Form::open(array('method'=>'PUT','route' => ['insurance.update', $data->id])) }}
    
    @csrf
     <div class="row">
     <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.description.lbl') }} DE</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                {{Form::text('description_de',$data->description_de,['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">{{ __('backend.price_per_day.lbl') }}</h4>
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
                        <h4 class="card-title">{{ __('backend.description.lbl') }} EN</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                {{Form::text('description_en',$data->description_en,['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.insurance_company.lbl') }} </h4>
                        <div class="mt-5">
                            <div class="form-group">
                                {{ Form::select('id_inssurance_company', $insuranceCompanies, $data->id_inssurance_company, ['class' => 'form-control','required']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.description.lbl') }} FR</h4>
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
                    <h4 class="card-title">{{ __('backend.camper_name.lbl') }}</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                {{ Form::select('id_camper_name', $camperNames, $data->id_camper_name, ['class' => 'form-control','required']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                {{Form::submit('Update',['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}
                <a href="{{ route('insurance.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.cancel.btn') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection