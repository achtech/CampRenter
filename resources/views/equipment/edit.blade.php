@extends('layout', ['activePage' => 'equipment', 'titlePage' => __('backend.owner.lbl')])
@section('content')

<div class="container-fluid">
    <!--'action'=>'App\Http\Controllers\EquipmentController@update',-->
    {{ Form::open(array('method'=>'PUT','route' => ['equipment.update', $data->id])) }}
    
    @csrf
    <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('backend.equipment_name.lbl')}}</h4>
                        <form class="mt-4">
                            <div class="form-group">
                            {{Form::text('equipment_name',$data->equipment_name,['class'=>'form-control','required','disabled'])}}
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
                            {{Form::text('id_client',$clients->client_name,['class'=>'form-control','required','disabled'])}}
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
                            {{Form::text('id_equipment_categories',$equipmentCategory->label_en,['class'=>'form-control','required','disabled'])}}
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
                        <h4 class="card-title">{{__('backend.description.lbl')}} EN</h4>
                        <form class="mt-4">
                            <div class="form-group">
                            {{Form::textArea('description_en',$data->description_en,['class'=>'form-control','required','disabled'])}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('backend.description.lbl')}} DE</h4>
                        <form class="mt-4">
                            <div class="form-group">
                            {{Form::textArea('description_de',$data->description_de,['class'=>'form-control','required','disabled'])}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('backend.description.lbl')}} FR</h4>
                        <form class="mt-4">
                            <div class="form-group">
                            {{Form::textArea('description_fr',$data->description_fr,['class'=>'form-control','required','disabled'])}}
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
                        <h4 class="card-title">{{__('backend.location.lbl')}}</h4>
                        <form class="mt-4">
                            <div class="form-group">
                            {{Form::text('location',$data->location,['class'=>'form-control','required','disabled'])}}
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
                        <h4 class="card-title">{{__('backend.animals_allowed.lbl')}} EN</h4>
                        <form class="mt-4">
                            <div class="form-group">
                            {{Form::text('animals_allowed_en',$data->animals_allowed_en,['class'=>'form-control','required','disabled'])}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('backend.animals_allowed.lbl')}} DE</h4>
                        <form class="mt-4">
                            <div class="form-group">
                            {{Form::text('animals_allowed_de',$data->animals_allowed_de,['class'=>'form-control','required','disabled'])}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('backend.animals_allowed.lbl')}} FR</h4>
                        <form class="mt-4">
                            <div class="form-group">
                            {{Form::text('animals_allowed_fr',$data->animals_allowed_fr,['class'=>'form-control','required','disabled'])}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('backend.animal_description.lbl')}} EN</h4>
                        <form class="mt-4">
                            <div class="form-group">
                            {{Form::textArea('animal_description_en',$data->animal_description_en,['class'=>'form-control','required','disabled'])}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('backend.animal_description.lbl')}} DE</h4>
                        <form class="mt-4">
                            <div class="form-group">
                            {{Form::textArea('animal_description_de',$data->animal_description_de,['class'=>'form-control','required','disabled'])}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('backend.animal_description.lbl')}} FR</h4>
                        <form class="mt-4">
                            <div class="form-group">
                            {{Form::textArea('animal_description_fr',$data->animal_description_fr,['class'=>'form-control','required','disabled'])}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('backend.license_needed.lbl')}} EN</h4>
                        <form class="mt-4">
                            <div class="form-group">
                            {{Form::text('license_needed_en',$data->license_needed_en,['class'=>'form-control','required','disabled'])}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('backend.license_needed.lbl')}} DE</h4>
                        <form class="mt-4">
                            <div class="form-group">
                            {{Form::text('license_needed_de',$data->license_needed_de,['class'=>'form-control','required','disabled'])}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('backend.license_needed.lbl')}} FR</h4>
                        <form class="mt-4">
                            <div class="form-group">
                            {{Form::text('license_needed_fr',$data->license_needed_fr,['class'=>'form-control','required','disabled'])}}
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
                        <h4 class="card-title">{{__('backend.licence_age_desc.lbl')}} EN</h4>
                        <form class="mt-4">
                            <div class="form-group">
                            {{Form::textArea('licence_age_desc_en',$data->licence_age_desc_en,['class'=>'form-control','required','disabled'])}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('backend.licence_age_desc.lbl')}} DE</h4>
                        <form class="mt-4">
                            <div class="form-group">
                            {{Form::textArea('licence_age_desc_de',$data->licence_age_desc_de,['class'=>'form-control','required','disabled'])}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('backend.licence_age_desc.lbl')}} FR</h4>
                        <form class="mt-4">
                            <div class="form-group">
                            {{Form::textArea('licence_age_desc_fr',$data->licence_age_desc_fr,['class'=>'form-control','required','disabled'])}}
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
                            {{Form::text('status',$data->status,['class'=>'form-control','required','disabled'])}}
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
                            {{Form::text('confirmed',$data->confirmed,['class'=>'form-control','required','disabled'])}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                {{Form::submit('Update',['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}
                <a href="{{ route('insurance.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right" style="width:200px">{{ __('backend.cancel.btn') }}</a>
            </div>
    </div>
    {{ Form::close() }}
</div>

@endsection