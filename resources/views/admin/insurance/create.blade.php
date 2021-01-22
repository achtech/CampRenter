@extends('admin.layout', ['activePage' => 'insurance', 'titlePage' => trans('backend.insurance_managment')]) @section('content') {{ Breadcrumbs::render('edit_insurance') }}
<div class="container-fluid">
    <!--'action'=>'App\Http\Controllers\admin\InsuranceController@update',-->
    {{ Form::open(['action'=>'App\Http\Controllers\admin\InsuranceController@store','autocomplete'=>'off','method'=>'POST']) }}
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
                                <option value="{{$camperCategories->id}}" @if($data->
                                {{ Form::select('id_camper_categories', $camperCategories, null, ['class' => 'form-control','required']) }}
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
                            {{Form::text('nbr_days_from',['class'=>'form-control','required'])}}
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
                            {{ Form::text('nbr_days_to',['class'=>'form-control','required'])}}
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
                            {{Form::text('tonage',['class'=>'form-control','required'])}}
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
                            {{Form::text('initial_price',['class'=>'form-control','required'])}}
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
                            {{Form::text('price_per_day',['class'=>'form-control','required'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-12">
            {{Form::submit('Create',['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}

            <a href="{{ route('insurance.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width: 200px;">{{ __('backend.Cancel') }}</a>
        </div>
    </div>
    {{ Form::close() }}
</div>

@endsection
