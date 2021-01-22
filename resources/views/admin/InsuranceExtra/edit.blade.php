@extends('admin.layout', ['activePage' => 'insurance_extra', 'titlePage' => trans('backend.insurance_extra_managment')])
@section('content')
{{ Breadcrumbs::render('create_insurance_extra') }}
<div class="container-fluid">
    <!--'action'=>'InsuranceExtraController@store',-->
    {{ Form::open(array('method'=>'PUT','route' => ['insuranceExtra.update', $data->id])) }} 
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.Name') }}</h4>
                    <div class="mt-5">
                        <div class="form-group">
                            {{Form::text('name',$data->name,['class'=>'form-control','required'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.day_from') }}</h4>
                    <div class="mt-5">
                        <div class="form-group">
                            {{ Form::text('nbr_days_from',$data->nbr_days_from,['class'=>'form-control','required'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.day_to') }}</h4>
                    <div class="mt-5">
                        <div class="form-group">
                            {{ Form::text('nbr_days_to',$data->nbr_days_to,['class'=>'form-control'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">{{ __('backend.initial_price') }}</h4>
                    <div class="mt-5">
                        <div class="form-group">
                            {{Form::text('initial_price',$data->initial_price,['class'=>'form-control'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">{{ __('backend.Price per day') }}</h4>
                    <div class="mt-5">
                        <div class="form-group">
                            {{Form::text('price_per_day',$data->price_per_day,['class'=>'form-control'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="col-sm-12">
                {{Form::submit(__('backend.Update'),['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}

                <a href="{{ route('insuranceExtra.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.Cancel') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection