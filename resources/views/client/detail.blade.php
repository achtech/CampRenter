@extends('layout',['activePage' => 'client', 'titlePage' => __('backend.client_management.lbl').': '.$client->client_last_name . " " . $client->client_name])
@section('content')
{{ Breadcrumbs::render('detail_client',$client) }}
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ route('client.index') }}">{{__('backend.clients.lbl') }}</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   
                    <div class="row">
                        <div class="col-2">  
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">{{ __('backend.client_name.lbl') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <img style="height: 107px;" src="/assets/images/avatar/{{$avatar}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                        <div class="col-4">    
                            <div class="card" style="HEIGHT: 220px;">
                                <div class="card-body">
                                    <h4 class="card-title">{{ __('backend.client_email.lbl') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            {{Form::text('email',$data->email,['class'=>'form-control','required','disabled'])}}                                </div>
                                    </div>
                                </div>
                            </div>
                    </div> 
                      
                        <div class="col-2">    
                            <div class="card" style="HEIGHT: 220px;">
                                <div class="card-body">
                                    <h4 class="card-title">{{ __('backend.client_name.lbl') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                        {{Form::text('client_name',$data->client_name,['class'=>'form-control','required','disabled'])}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-2">    
                        <div class="card" style="HEIGHT: 220px;">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('backend.client_last_name.lbl') }}</h4>
                                <div class="mt-4">
                                    <div class="form-group">
                                        {{Form::text('client_last_name',$data->client_last_name,['class'=>'form-control','required','disabled'])}}
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                
            <div class="col-2">    
                <div class="card" style="HEIGHT: 220px;">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.status.lbl') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                {{Form::text('status',$data->status,['class'=>'form-control','required','disabled'])}}
                            </div>
                    </div>
                </div>
        </div>
                    </div>
                    <div class="col-2">    
                        <div class="card" style="HEIGHT: 220px;">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('backend.driving_licence.lbl') }}</h4>
                                <div class="mt-4">
                                    <div class="form-group">
                                        {{Form::text('driving_licence',$data->driving_licence,['class'=>'form-control','required','disabled'])}}
                                    </div>
                            </div>
                        </div>
                </div>
                            </div>  
            <div class="col-2"> </div>
            <div class="col-3">    
                <div class="card" style="HEIGHT: 220px;">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.driving_licence_image.lbl') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                <a data-fancybox="gallery" class="primary-btn" href="/assets/images/clients/{{$data->driving_licence_image}}"><img style="height: 107px;width: 158px;" src="/assets/images/clients/{{$data->driving_licence_image}}"/></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="col-3">    
                <div class="card" style="HEIGHT: 220px;">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('backend.image_national.lbl') }}</h4>
                        <div class="mt-4">
                            <div class="form-group">
                                <a data-fancybox="gallery" class="primary-btn" href="/assets/images/clients/{{$data->image_national_id}}"><img style="height: 107px;width: 158px;" src="/assets/images/clients/{{$data->image_national_id}}"/></a>
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