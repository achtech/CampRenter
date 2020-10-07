<?php

namespace App\Models;

class Promotion extends Base
{
    protected $table = 'promotions';
    public $primarykey = 'id';
    protected $fillable = [
        'rate',
        'start_date',
        'end_date',
        
    ];
}
