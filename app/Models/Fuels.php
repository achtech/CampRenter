<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fuels extends Model
{
    protected $table = 'fuels';
    public $primarykey = 'id';
    protected $fillable = [
        'name'
    ];
}
