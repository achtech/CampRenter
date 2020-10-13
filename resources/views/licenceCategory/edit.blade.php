@extends('layout', ['activePage' => 'licenceCategory', 'titlePage' => __('backend.licence_category_managment')])
@section('content')
{{ Breadcrumbs::render('edit_licenceCategory') }}
<div class="container-fluid">
    <!--'action'=>'App\Http\Controllers\LicenceCategoryController@update',-->
    {{ Form::open(array('method'=>'PUT','route' => ['licenceCategory.update', $data->id])) }}
    
    @csrf
     <div class="row">
     <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.label') }} DE</h4>
                        <div class="mt-4">
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
                        <div class="mt-4">
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
                        <div class="mt-4">
                            <div class="form-group">
                            {{Form::text('label_fr',$data->label_fr,['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                {{Form::submit('Update',['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}
                <a href="{{ route('licenceCategory.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.cancel') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection