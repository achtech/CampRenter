<?php

namespace App\Models;

class CamperSubCategory extends Base
{
    protected $table = 'camper_sub_categories';
    public $primarykey = 'id';
    protected $fillable = [
        'label_en',
        'label_de',
        'label_fr',
        'image',
        'id_camper_categories',
        'created_by',
        'updated_by'
    ];
}
