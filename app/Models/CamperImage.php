<?php

namespace App\Models;

class CamperImage extends Base
{
    protected $table = 'camper_categories';
    public $primarykey = 'id';
    protected $fillable = [
        'image',
        'id_campers',
        'created_by',
        'updated_by'
    ];
}
