@extends('layout', ['activePage' => 'fuel', 'titlePage' => __('backend.fuel_managment')])
@section('content')
{{ Breadcrumbs::render('edit_fuel') }}
<div class="container-fluid">
    <!--'action'=>'App\Http\Controllers\FuelController@update',-->
    {{ Form::open(array('method'=>'PUT','route' => ['fuel.update', $data->id])) }}
    
    @csrf
     <div class="row">
     <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.label') }} DE</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                {{Form::text('label_de',$data->label_de,['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.label') }} EN</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                {{Form::text('label_en',$data->label_en,['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.label') }} FR</h4>
                        <div class="mt-5">
                            <div class="form-group">
                                {{ Form::text('label_fr',$data->label_fr,['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-12">
                {{Form::submit('Update',['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}
                <a href="{{ route('fuel.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.Cancel') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection