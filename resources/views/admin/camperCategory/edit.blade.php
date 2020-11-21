@extends('admin.layout', ['activePage' => 'camperCategory', 'titlePage' => trans('backend.camperCategory_managment')])
@section('content')
{{ Breadcrumbs::render('edit_camperCategory') }}
<div class="container-fluid">
    <!--'action'=>'App\Http\Controllers\admin\CamperCategoryController@update',-->
    {{ Form::open(array('method'=>'PUT','enctype'=>'multipart/form-data','route' => ['camperCategory.update', $data->id])) }}

    @csrf
     <div class="row">
     <div class="col-sm-12 col-md-6 col-lg-6">
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
            <div class="col-sm-12 col-md-6 col-lg-6">
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
            <div class="col-sm-12 col-md-6 col-lg-6">
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

            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> {{ __('backend.Image') }}</h4>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">{{ __('backend.Choose file') }} </label>
                                </div>
                            </div>
                                <img style="max-width:100%" src="{{asset('/images')}}/camper_categories/{{$data->image}}"  style="with:200px"/>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">


                {{Form::submit(__('backend.Update'),['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}

                <a href="{{ route('camperCategory.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.Cancel') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection
