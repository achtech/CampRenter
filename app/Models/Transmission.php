<?php

namespace App\Models;

class Transmission extends Base
{
    protected $table = 'transmissions';
    public $primarykey = 'id';
    protected $fillable = [
        'label_en',
        'label_de',
        'label_fr',
        'created_by',
        'updated_by'
    ];
}
