<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    protected $fillable = [
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];
}
