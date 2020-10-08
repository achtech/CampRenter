<?php

namespace App\Models;

class InsuranceCompany extends Base
{
    protected $table = 'insurance_companies';
    public $primarykey = 'id';
    protected $fillable = [
        'label_en',
        'label_de',
        'label_fr',
        'created_by',
        'updated_by'
    ];
}
