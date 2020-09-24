@extends('layout',['activePage' => 'client', 'titlePage' => __('backend.client.lbl')]))
@section('content')
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">Clients</a>
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
                    <h4 class="card-title">{{ __('backend.detail_client.lbl') }}</h4>
                        
                            <table>
                                <tr>
                                    <td>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ __('backend.client_name.lbl') }}</h4>
                                            <div class="mt-4">
                                                <div class="form-group">
                                                {{Form::text('client_name',$data->client_name,['class'=>'form-control','required','disabled'])}}
                                                </div>
                                            </div>
                                        </div>
                                    </div></div>
                                </td>
                                <td>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ __('backend.client_last_name.lbl') }}</h4>
                                        <div class="mt-4">
                                            <div class="form-group">
                                            {{Form::text('client_last_name',$data->client_last_name,['class'=>'form-control','required','disabled'])}}
                                            </div>
                                        </div>
                                    </div>
                                </div></div>
                            </td>
                            <td>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">{{ __('backend.client_email.lbl') }}</h4>
                                    <div class="mt-4">
                                        <div class="form-group">
                                        {{Form::text('email',$data->email,['class'=>'form-control','required','disabled'])}}
                                        </div>
                                    </div>
                                </div>
                            </div></div>
                        </td>
                                    <td>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ __('backend.client_national_number.lbl') }}</h4>
                                            <div class="mt-4">
                                                <div class="form-group">
                                                    {{Form::text('national_id',$data->national_id,['class'=>'form-control','required','disabled'])}}
                                                </div>
                                            </div>
                                        </div> </div>
                                    </div></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ __('backend.client_driver_licence_image.lbl') }}</h4>
                                            <div class="mt-4">
                                                <div class="form-group">
                                                {{Form::text('image_national_id',$data->image_national_id,['class'=>'form-control','required','disabled'])}}
                                                </div>
                                            </div>
                                        </div>
                                    </div></div>
                                </td>
                                    <td>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ __('backend.status.lbl') }}</h4>
                                            <div class="mt-4">
                                                <div class="form-group">
                                                    {{Form::text('status',$data->status,['class'=>'form-control','required','disabled'])}}
                                                </div>
                                            </div>
                                        </div> </div>
                                    </div></td>
                                    <td>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ __('backend.client_avatar.lbl') }}</h4>
                                            <div class="mt-4">
                                                <div class="form-group">
                                                {{Form::text('id_avatars',$data->id_avatars,['class'=>'form-control','required','disabled'])}}
                                                </div>
                                            </div>
                                        </div>
                                    </div></div>
                                </td>
                                <td>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ __('backend.driving_licence.lbl') }}</h4>
                                        <div class="mt-4">
                                            <div class="form-group">
                                            {{Form::text('driving_licence',$data->driving_licence,['class'=>'form-control','required','disabled'])}}
                                            </div>
                                        </div>
                                    </div>
                                </div></div>
                            </td>
                                </tr>
                            </table>
                            
                                
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection