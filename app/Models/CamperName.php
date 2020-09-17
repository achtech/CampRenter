<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CamperName extends Model
{
    protected $table = 'camper_name';
    public $primarykey = 'id';
    protected $fillable = [
        'name'
    ];
}
