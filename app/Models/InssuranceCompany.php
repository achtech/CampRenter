<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InssuranceCompany extends Model
{
    protected $table = 'inssurance_company';
    public $primarykey = 'id';
    protected $fillable = [
        'name'
    ];
}
