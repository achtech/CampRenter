<?php

namespace App\Models;

class Camper extends Base
{
    protected $table = 'campers';
    public $primarykey = 'id';
    protected $fillable = ['is_completed', 'image', 'camper_name', 'brand', 'model', 'value_of_vehicule',
        'license_plate_number', 'seat_number', 'sleeping_places', 'vehicle_licence', 'length', 'width', 'height', 'description_camper',
        'location', 'minimal_rent_days', 'included_kilometres', 'minimum_age', 'animals_allowed', 'animal_description',
        'licence_needed_desc', 'license_age', 'licence_age_desc', 'smoking_allowed', 'is_confirmed',
        'id_clients', 'id_camper_names', 'id_licence_categories', 'id_camper_categories', 'camper_sub_categories', 'id_transmissions', 'id_fuels',
        'licence_needed', 'zip_code', 'city', 'country', 'position_x', 'position_y', 'leasing_vehicle', 'additional_attribute',
        'created_by',
        'updated_by'];
}
