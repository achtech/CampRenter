<?php

namespace App\Models;

class Promotion extends Base
{
    protected $table = 'promotions';
    public $primarykey = 'id';

    protected $fillable = [
        'commission',
        'details',
        'status',
        'created_by',
        'updated_by'
    ];
}
