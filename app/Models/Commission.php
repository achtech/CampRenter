<?php

namespace App\Models;

class Commission extends Base
{
    protected $table = 'commissions';
    public $primarykey = 'id';
    protected $fillable = [
        'rate',
    ];
}
