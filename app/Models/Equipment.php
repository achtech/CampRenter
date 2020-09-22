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
        'description_en',
        'description_de',
        'description_fr',
        'location',
        'price_per_day',
        'minimal_rent_days',
        'included_kilometres',
        'minimum_age',
        'animals_allowed_en',
        'animals_allowed_de',
        'animals_allowed_fr',
        'animal_description_en',
        'animal_description_de',
        'animal_description_fr',
        'license_needed_en',
        'license_needed_de',
        'license_needed_fr',
        'licence_needed_desc',
        'license_age',
        'licence_age_desc_en',
        'licence_age_desc_de',
        'licence_age_desc_fr',
        'smoking_allowed',
        'availability',
        'status',
        'confirmed'

    ];
}
