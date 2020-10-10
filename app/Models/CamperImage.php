<?php

namespace App\Models;

class CamperImage extends Base
{
    protected $table = 'camper_images';
    public $primarykey = 'id';
    protected $fillable = [
        'image',
        'id_campers',
        'created_by',
        'updated_by',
    ];
}
