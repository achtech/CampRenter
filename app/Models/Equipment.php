<?php

namespace App\Models;

class Equipment extends Base
{
    protected $table = 'camper_equipment';
    public $primarykey = 'id';
    protected $fillable = [
        'id_campers',
        'camping_table',
        'camping_chairs',
        'transport',
        'water',
        'winter',
        'additional_equipment_outside',
        'other_additional_equipment',
        'single_beds',
        'double_beds',
        'air_conditioner',
        'heating',
        'power',
        'dimming',
        'indoor_table',
        'rotatable_seats',
        'baby_seat',
        'electronics',
        'cooking_possibility',
        'cooling_possibility',
        'bathroom',
        'sink',
        'dishes',
        'additional_equipment_inside',
        'sleeping_spots'
    ];
}
