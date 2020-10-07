@extends('layout', ['activePage' => 'camper', 'titlePage' => __('backend.camper_managment.lbl')])
@section('content')
{{ Breadcrumbs::render('details_camper') }}
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html">{{__('backend.camper_details.lbl')}}</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="card">
    <div class="card-body">

        <ul class="nav nav-tabs nav-justified nav-bordered mb-3">
            <li class="nav-item">
                <a href="#home-b2" data-toggle="tab" aria-expanded="false" class="nav-link active">
                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                    <span class="d-none d-lg-block">Details</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#galery" data-toggle="tab" aria-expanded="true"
                    class="nav-link">
                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                    <span class="d-none d-lg-block">Galery</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#bookings" data-toggle="tab" aria-expanded="false" class="nav-link">
                    <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                    <span class="d-none d-lg-block">Bookings</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#location" data-toggle="tab" aria-expanded="false" class="nav-link">
                    <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                    <span class="d-none d-lg-block">Location</span>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane show active" id="home-b2">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.camper_name.lbl')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('id_campers_name',App\Http\Controllers\CamperController::getCamperName('camper_names',$camper_name->id),['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.client.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.brand.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.model.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.licence_categories.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.value_of_vehicle.lbl')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('value_of_vehicle',$data->value_of_vehicle,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.license_plate_number.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.seat_number.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.sleeping_places.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.category.lbl')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('id_camper_categories',$camperCategory->label_en,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.transmissions.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.vehicle_licence.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.length.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.width.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.height.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.description.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.animal_description.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.licence_age_desc.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.fuels.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.price_per_day.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.minimal_rent_days.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.included_kilometres.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.minimum_age.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.animals_allowed.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.license_needed.lbl')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('license_needed',$data->license_needed,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.licence_desc.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.license_age.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.smoking_allowed.lbl')}}</h4>
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
                            <h4 class="card-title">{{__('backend.availability.lbl')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('availability',$data->availability,['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.status.lbl')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                {{Form::text('id_campers_name',App\Http\Controllers\CamperController::getCamperName('camper_status',$camper_status->id),['class'=>'form-control','required','disabled'])}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('backend.confirmed.lbl')}}</h4>
                            <form class="mt-4">
                                <div class="form-group">
                                    @if($data->is_confirmed==1)
                                        <i class="fa fa-circle text-success mr-2"></i>
                                        @else
                                        <i class="fa fa-circle text-danger mr-2"></i>
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
                                        <div class="carousel-item active"> <img class="img-fluid"
                                                src="../../assets/images/big/img4.jpg" alt="First slide"> </div>
                                        <div class="carousel-item"> <img class="img-fluid"
                                                src="../../assets/images/big/img5.jpg" alt="Second slide"> </div>
                                        <div class="carousel-item"> <img class="img-fluid"
                                                src="../../assets/images/big/img6.jpg" alt="Third slide"> </div>
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
                                    <th>{{ __('backend.booking_renter.lbl') }}</th>
                                    <th>{{ __('backend.booking_from.lbl') }}</th>
                                    <th>{{ __('backend.booking_to.lbl') }}</th>
                                    <th>{{ __('backend.booking_price_per_day.lbl') }}</th>
                                    <th>{{ __('backend.total.lbl') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($booking_camper as $item)
                                <tr>
                                    <td></td>
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
