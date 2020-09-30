<?php

namespace App\Models;

class InsuranceCompany extends Base
{
    protected $table = 'inssurance_company';
    public $primarykey = 'id';
    protected $fillable = [
        'label_en',
        'label_de',
        'label_fr'
    ];
}