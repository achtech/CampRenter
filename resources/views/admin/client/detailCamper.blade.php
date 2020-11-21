@extends('admin.layout',['activePage' => 'client', 'titlePage' => trans('backend.camper_detail').': '.strtoupper($client->client_last_name) . " " . $client->client_name]))
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
                            <img src="{{ asset('/images/clients') }}/{{$item->image}}"/>
                            </div></td>
                            <td style="vertical-align: top !important;">

                                <table>
                                    <tr>
                                        <td> <span style="color: black;font-weight: 400;">{{ __('backend.description') }} :</span> {{$item->description_en}}</td>
                                    </tr>
                                    <tr>
                                        <td><span style="color: black;font-weight: 400;"> {{ __('backend.camper_name') }} :</span> {{$item->camper_name}}</td>
                                    </tr>
                                    <tr>
                                        <td> <span style="color: black;font-weight: 400;"> {{ __('backend.model') }} :</span> {{$item->model}}</td>
                                    </tr>
                                    <tr>
                                        <td><span style="color: black;font-weight: 400;"> {{ __('backend.sleeping_places') }} :</span> {{$item->sleeping_places}}</td>
                                    </tr>
                                    <tr>
                                        <td><span style="color: black;font-weight: 400;"> {{ __('backend.Price per day') }} :</span> {{$item->price_per_day}}</td>
                                    </tr>
                                    <tr>
                                        <td><span style="color: black;font-weight: 400;"> {{ __('backend.number_kilometre') }} :</span> {{$item->included_kilometres}}</td>
                                    </tr>
                                    <tr>
                                        <td><span style="color: black;font-weight: 400;"> {{ __('backend.availability') }} :</span> {{$item->availability}}</td>
                                    </tr>
                                    <tr>
                                        <td><span style="color: black;font-weight: 400;"> {{ __('backend.smoking_allowed') }} :</span> {{$item->smoking_allowed}}</td>
                                    </tr>

                                </table>
                            </td>
                        </tr>


                    </table>


                </li>
                @endforeach
                @else
                <h4>{{ __('backend.No data found') }}</h4>
                @endif
            </ul>
        </div> </div> </div> </div> </div>
@endsection
