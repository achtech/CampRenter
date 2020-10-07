<?php

namespace App\Models;

class LicenceCategory extends Base
{
    protected $table = 'licence_categories';
    public $primarykey = 'id';
    protected $fillable = [
        'label_en',
        'label_de',
        'label_fr',
        'created_by',
        'updated_by'
    ];
}
