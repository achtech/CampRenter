<?php

namespace App\Models;

class Commissions extends Base
{
    protected $table = 'commissions';
    public $primarykey = 'id';
    protected $fillable = [
        'rate',
    ];
}
