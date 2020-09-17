<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transmissions extends Model
{
    protected $table = 'transmissions';
    public $primarykey = 'id';
    protected $fillable = [
        'name'
    ];
}
