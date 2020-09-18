<?php

namespace App\Models;

class Favoris extends Base
{
    protected $table = 'favoris';
    public $primarykey = 'id';
    protected $fillable = [
        'id_equipments',
        'id_clients',
        
    ];
}
