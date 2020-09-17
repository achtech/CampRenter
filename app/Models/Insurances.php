<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inssurances extends Model
{
    protected $table = 'inssurances';
    public $primarykey = 'id';
    protected $fillable = [
        'id_camper_name',
        'id_inssurance_company',
        'description',
        'price_per_day'
    ];
}
