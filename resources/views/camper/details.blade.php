@extends('layout', ['activePage' => 'camper', 'titlePage' => __('backend.camper_managment')])
@section('content')
{{ Breadcrumbs::render('details_camper') }}

<div class="card">
    <div class="card-body">

        <ul class="nav nav-tabs nav-justified nav-bordered mb-3">
            <li class="nav-item">
                <a href="#home-b2" data-toggle="tab" aria-expanded="false" class="nav-link active">
                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                    <span class="d-none d-lg-block">{{ __('backend.Detail') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#galery" data-toggle="tab" aria-expanded="true"
                    class="nav-link">
                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                    <span class="d-none d-lg-block">{{ __('backend.galery') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#bookings" data-toggle="tab" aria-expanded="false" class="nav-link">
                    <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                    <span class="d-none d-lg-block">{{ __('backend.menu_booking') }}</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#location" data-toggle="tab" aria-expanded="false" class="nav-link">
                    <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                    <span class="d-none d-lg-block">{{ __('backend.location') }}</span>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane show active" id="home-b2">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.camper_name')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('camper_name',$data->camper_name,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.Client')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('id_clients',$clients->client_name,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.brand')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('brand',$data->brand,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.model')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('model',$data->model,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.licence_categories')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('id_licence_categories',$licenceCategories->label_en,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.value_of_vehicle')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('value_of_vehicle',$data->value_of_vehicule,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.license_plate_number')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('license_plate_number',$data->license_plate_number,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.seat_number')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('seat_number',$data->seat_number,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.sleeping_places')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('sleeping_places',$data->sleeping_places,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.category')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('id_camper_categories',$camper_categories->label_en,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.transmissions')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('id_transmissions',$transmissions->label_en,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.vehicle_licence')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('vehicle_licence',$data->vehicle_licence,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.length')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('length',$data->length,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.width')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('width',$data->width,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.height')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('height',$data->height,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.Description')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::textArea('description',$data->description_camper,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.animal_description')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::textArea('animal_description',$data->animal_description,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.licence_age_desc')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::textArea('licence_age_desc',$data->licence_age_desc,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.fuels')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('id_fuels',$fuels->label_en,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.Price per day')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('price_per_day',$data->price_per_day,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.minimal_rent_days')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('minimal_rent_days',$data->minimal_rent_days,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.included_kilometres')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('included_kilometres',$data->included_kilometres,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.minimum_age')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('minimum_age',$data->minimum_age,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.animals_allowed')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('animals_allowed',$data->animals_allowed,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.license_needed')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('licence_needed',$data->licence_needed,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.licence_desc')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('licence_needed_desc',$data->licence_needed_desc,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.license_age')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('license_age',$data->license_age,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.smoking_allowed')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('smoking_allowed',$data->smoking_allowed,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.availability')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                    @if($data->availability==0)
                                        <i class="btn waves-effect waves-light btn-danger">Blocked</i>
                                    @elseif($data->availability==1)
                                        <i class="btn waves-effect waves-light btn-warning">Reserved</i>
                                    @else
                                        <i class="btn waves-effect waves-light btn-success">Available</i>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.Status')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                    @if($data->availability==0)
                                        Blocked by Owner {{App\Http\Controllers\CamperController::getName('clients',$data->id_clients)}}
                                    @elseif($data->availability==1)
                                        Reserved by {{App\Http\Controllers\CamperController::getName('clients',$data->id_clients)}}
                                        <br />From : {{App\Http\Controllers\CamperController::getBookingCamperStart($data->id)}}
                                        <br />To  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp{{App\Http\Controllers\CamperController::getBookingCamperEnd($data->id)}}
                                    @else
                                        Available
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.confirmed')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                        @if($data->is_confirmed==1)
                                            <i class="btn waves-effect waves-light btn-outline-success">&nbsp&nbsp&nbspConfirmed &nbsp&nbsp&nbsp</i></br>
                                            by {{App\Http\Controllers\CamperController::getUserName($data->updated_by)}}
                                        @else
                                            <i class="btn waves-effect waves-light btn-outline-danger">Not Confirmed</i></br>
                                            by {{App\Http\Controllers\CamperController::getUserName($data->updated_by)}}
                                        @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
  </div>
            <div class="tab-pane show" id="galery">
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- row -->
                <div class="row">

                    <div class="col-lg-6" style="display: contents;">
                        <div class="card" style="margin: auto;">
                            <div class="card-body">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">

                                        @foreach($gallery as $item)
                                        <div class="carousel-item @if ($loop->first) active @endif" >
                                            <img class="img-fluid" src="../../assets/images/campers/{{$item->image}}" alt="First slide">
                                        </div>
                                        @endforeach

                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                        data-slide="prev"> <span class="carousel-control-prev-icon"
                                            aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                        data-slide="next"> <span class="carousel-control-next-icon"
                                            aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row -->
            </div>

            <div class="tab-pane" id="bookings">
                    <div class="table-responsive">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.Renter') }}</th>
                                    <th>{{ __('backend.From') }}</th>
                                    <th>{{ __('backend.To') }}</th>
                                    <th>{{ __('backend.Price per day') }}</th>
                                    <th>{{ __('backend.booking_total_price') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($booking_camper as $item)
                                <tr>
                                    <td>{{$item->client_name }} {{$item->client_last_name }}</td>
                                    <td>{{$item->start_date}}</td>
                                    <td>{{$item->end_date}}</td>
                                    <td>{{$item->price_per_day}}</td>
                                    <td>{{$item->total}}</td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>

            <div class="tab-pane" id="location">
                    <div class="table-responsive">

                    </div>
            </div>
        </div>

    </div> <!-- end card-body-->
</div> <!-- end card-->

@endsection
