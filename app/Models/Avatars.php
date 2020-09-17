<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avatars extends Model
{
    protected $table = 'avatars';
    public $primarykey = 'id';
    protected $fillable = [
        'image'
    ];
}
