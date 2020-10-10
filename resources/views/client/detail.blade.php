@extends('layout',['activePage' => 'client', 'titlePage' => __('backend.client_management.lbl').':
'.strtoupper($client->client_last_name) . " " . $client->client_name])
@section('content')
{{ Breadcrumbs::render('detail_client',$client) }}
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mt-4">
                                        <div class="form-group">
                                            
                                            <img style="height: 107px;" src="/assets/images/avatar/{{$avatar}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                        <div class="col-4">    
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">{{ __('backend.client_name.lbl') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <label>{{$data->client_name}} {{$data->client_last_name}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                            <div class="col-4">
                                <div class="card">
                            <div class="card-body">
                                    <h4 class="card-title">{{ __('backend.client_email.lbl') }}</h4>
                                <div class="mt-4">
                                    <div class="form-group">
                                            <label>{{$data->email}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                            <div class="col-3"></div>
                            <div class="col-4">
                                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.status.lbl') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                                <label for="">{{ __('backend.client_status_'.$data->status.'.lbl') }}</label>
                            </div>
                    </div>
                </div>
        </div>
                    </div>
                            <div class="col-4">
                                <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('backend.driving_licence.lbl') }}</h4>
                                <div class="mt-4">
                                    <div class="form-group">
                                                <label for="">{{$data->driving_licence}}</label>
                                    </div>
                            </div>
                        </div>
                </div>
                            </div>  
                            <div class="col-3"></div>
                            <div class="col-4">
                                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.driving_licence_image.lbl') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                                <a data-fancybox="gallery" class="primary-btn"
                                                    href="/assets/images/clients/{{$data->driving_licence_image}}"><img
                                                        style="height: 107px;width: 158px;"
                                                        src="/assets/images/clients/{{$data->driving_licence_image}}" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
                            <div class="col-4">
                                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.image_national.lbl') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                                <a data-fancybox="gallery" class="primary-btn"
                                                    href="/assets/images/clients/{{$data->image_national_id}}"><img
                                                        style="height: 107px;width: 158px;"
                                                        src="/assets/images/clients/{{$data->image_national_id}}" /></a>
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
</div>
@endsection