<?php

namespace App\Models;

class Equipment extends Base
{
    protected $table = 'equipments';
    public $primarykey = 'id';
    protected $fillable = [
        'equipment_name',
        'id_client',
        'image',
        'brand',
        'model',
        'id_licence_categories',
        'value_of_vehicle',
        'license_plate_number',
        'seat_number',
        'sleeping_places',
        'id_equipment_categories',
        'id_transmissions',
        'id_fuels',
        'vehicle_licence',
        'length',
        'width',
        'height',
        'description',
        'location',
        'zip_code',
        'city',
        'country',
        'position_x',
        'position_y',
        'price_per_day',
        'minimal_rent_days',
        'included_kilometres',
        'minimum_age',
        'animals_allowed',
        'animal_description',
        'license_needed',
        'licence_needed_desc',
        'license_age',
        'licence_age_desc',
        'smoking_allowed',
        'availability',
        'status',
        'confirmed',

    ];
}
