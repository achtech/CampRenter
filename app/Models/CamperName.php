<?php

namespace App\Models;

class CamperName extends Base
{
    protected $table = 'camper_name';
    public $primarykey = 'id';
    protected $fillable = [
        'label'
    ];
}
