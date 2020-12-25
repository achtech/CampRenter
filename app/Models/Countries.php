<?php

namespace App\Models;

class Countries extends Base
{
    protected $table = 'countries';
    public $primarykey = 'id';
    protected $fillable = [
        'label',
    ];
}
