<?php

namespace App\Models;

class CamperName extends Base
{
    protected $table = 'camper_names';
    public $primarykey = 'id';
    protected $fillable = [
        'label_en',
        'label_de',
        'label_fr'
    ];
}
