<?php

namespace App\Models;

class CamperCategory extends Base
{
    protected $table = 'camper_categories';
    public $primarykey = 'id';
    protected $fillable = [
        'label_en',
        'label_de',
        'label_fr',
        'image',
        'created_by',
        'updated_by'
    ];
}
