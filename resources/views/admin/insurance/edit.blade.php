@extends('admin.layout', ['activePage' => 'insurance', 'titlePage' => trans('backend.insurance_managment')]) 
@section('content') 
{{ Breadcrumbs::render('edit_insurance', $data->id) }}
<div class="container-fluid">
    <!--'action'=>'App\Http\Controllers\admin\InsuranceController@update',-->
    {{ Form::open(array('method'=>'PUT','route' => ['insurance.update', $data->id])) }} 
    @csrf
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">category</h4>
                    <div class="mt-5">
                        <div class="form-group">
                            <select name="id_camper_categories" id="id_camper_categories" class="form-control" data-placeholder="Insurance Company">
                                <option> </option>
                                @foreach($camperCategories as $camperCategories)
                                <option value="{{$camperCategories->id}}" @if($data->id_camper_categories==$camperCategories->id) selected @endif> {{App\Http\Controllers\admin\InsuranceController::getLabel('camper_categories',$camperCategories->id)}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Days from</h4>
                    <div class="mt-5">
                        <div class="form-group">
                            {{Form::text('nbr_days_from',$data->nbr_days_from,['class'=>'form-control','required'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Days to</h4>
                    <div class="mt-5">
                        <div class="form-group">
                            {{ Form::text('nbr_days_to',$data->nbr_days_to,['class'=>'form-control','required'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.tons') }}</h4>
                    <div class="mt-5">
                        <div class="form-group">
                            {{Form::text('tonage',$data->tonage,['class'=>'form-control','required'])}}
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
                            {{Form::text('initial_price',$data->initial_price,['class'=>'form-control','required'])}}
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
                            {{Form::text('price_per_day',$data->price_per_day,['class'=>'form-control','required'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-12">
            {{Form::submit(__('backend.Update'),['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}

            <a href="{{ route('insurance.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width: 200px;">{{ __('backend.Cancel') }}</a>
        </div>
    </div>
    {{ Form::close() }}
</div>

@endsection
