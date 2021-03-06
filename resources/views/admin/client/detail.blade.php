@extends('admin.layout',['activePage' => 'client', 'titlePage' => trans('backend.Clients Management').':
'.strtoupper($client->client_last_name) . " " . $client->client_name])
@section('content')
{{ Breadcrumbs::render('detail_client',$client) }}
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <img style="height: 100px;" src="{{ asset('/images/avatar') }}/{{$avatar}}"/>
                                        </div>
                                    </div>
                                    <h4 class="card-title">{{ __('backend.driving_licence_image') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <a data-fancybox="gallery" class="primary-btn"
                                                href="{{ asset('/images/clients') }}/{{$data->driving_licence_image}}"><img
                                                    style="height: 100px;"
                                                    src="{{ asset('/images/clients') }}/{{$data->driving_licence_image}}" /></a>
                                        </div>
                                    </div>
                                    <h4 class="card-title">{{ __('backend.image_national') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <a data-fancybox="gallery" class="primary-btn"
                                                href="{{ asset('/images/clients') }}/{{$data->image_national_id}}"><img
                                                    style="height: 100px;"
                                                    src="{{ asset('/images/clients') }}/{{$data->image_national_id}}" /></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">{{ __('backend.Name') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <label>{{$data->client_name}} {{$data->client_last_name}}</label>
                                        </div>
                                    </div>
                                    <h4 class="card-title">{{ __('backend.Email') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <label>{{$data->email}}</label>
                                        </div>
                                    </div>
                                    <h4 class="card-title">{{ __('backend.Language') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <label>{{$data->language}}</label>
                                        </div>
                                    </div>
                                    <h4 class="card-title">{{ __('backend.driving_licence') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <label for="">{{$data->driving_licence}}</label>
                                        </div>
                                    </div>
                                    <h4 class="card-title">{{ __('backend.Status') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <label for="">{{ __('backend.status_'.$data->status.'') }}</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">{{ __('backend.Review') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <label for="">{{$data->review}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
                        <a href="{{ route('admin.client.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.Back') }}</a>
</div>
@endsection
