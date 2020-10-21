<?php

namespace App\Models;

class InsuranceCompany extends Base
{
    protected $table = 'insurance_companies';
    public $primarykey = 'id';
    protected $fillable = [
        'name',
        'logo',
        'created_by',
        'updated_by'
    ];
}
