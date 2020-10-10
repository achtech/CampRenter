@extends('layout',['activePage' => 'client', 'titlePage' => __('backend.camper_detail.lbl').': '.strtoupper($client->client_last_name) . " " . $client->client_name]))
@section('content')
{{ Breadcrumbs::render('clients_campers',$client) }}DDD
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item">
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
                 
            <ul style="list-style-type: none;">
                @if($datas->count()>0)
                @foreach($datas as $item)
                <li >
                    <table>
                       
                        <tr>
                            <td><div>
                            <img src="/assets/images/clients/{{$item->image}}"/>
                            </div></td>
                            <td style="vertical-align: top !important;">
                               
                                <table>
                                    <tr>
                                        <td> <span style="color: black;font-weight: 400;">{{ __('backend.camper_description.lbl') }} :</span> {{$item->description_en}}</td>
                                    </tr>
                                    <tr>
                                        <td><span style="color: black;font-weight: 400;"> {{ __('backend.camper_name.lbl') }} :</span> {{$item->camper_name}}</td>
                                    </tr>
                                    <tr>
                                        <td> <span style="color: black;font-weight: 400;"> {{ __('backend.camper_model.lbl') }} :</span> {{$item->model}}</td>
                                    </tr>
                                    <tr>
                                        <td><span style="color: black;font-weight: 400;"> {{ __('backend.camper_sleeping_places.lbl') }} :</span> {{$item->sleeping_places}}</td>
                                    </tr>
                                    <tr>
                                        <td><span style="color: black;font-weight: 400;"> {{ __('backend.camper_price_per_day.lbl') }} :</span> {{$item->price_per_day}}</td>
                                    </tr>
                                    <tr>
                                        <td><span style="color: black;font-weight: 400;"> {{ __('backend.camper_number_kilometre.lbl') }} :</span> {{$item->included_kilometres}}</td>
                                    </tr>
                                    <tr>
                                        <td><span style="color: black;font-weight: 400;"> {{ __('backend.camper_availability.lbl') }} :</span> {{$item->availability}}</td>
                                    </tr>
                                    <tr>
                                        <td><span style="color: black;font-weight: 400;"> {{ __('backend.camper_smoking_allowed.lbl') }} :</span> {{$item->smoking_allowed}}</td>
                                    </tr>
                                      
                                </table>
                            </td>
                        </tr>

                        
                    </table>
                    
                    
                </li>
                @endforeach
                @else
                <h4>{{ __('backend.no_camper.lbl') }}</h4>
                @endif
            </ul>
        </div> </div> </div> </div> </div>
@endsection