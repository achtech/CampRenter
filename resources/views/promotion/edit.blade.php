@extends('layout', ['activePage' => 'promotion', 'titlePage' => __('backend.promotion_managment')])
@section('content')
{{ Breadcrumbs::render('edit_promotion',$data) }}
<div class="container-fluid">
{{ Form::open(array('method'=>'PUT','route' => ['promotion.update', $data->id])) }}
            <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.commission') }} </h4>
                        <div class="mt-8">
                            <div class="form-group">
                            {{Form::number('commission', $data->commission,['class'=>'form-control','required', 'min'=>0,'max'=>100])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.detail') }} </h4>
                        <div class="mt-8">
                            <div class="form-group">
                                {{Form::text('details',$data->details,['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-12">
            {{Form::submit('Update',['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}
 
                <a href="{{ route('promotion.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.cancel') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection