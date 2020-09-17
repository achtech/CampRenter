<?php

namespace App\Models;

class Avatars extends Base
{
    protected $table = 'avatars';
    public $primarykey = 'id';
    protected $fillable = [
        'image',
        'label'
    ];
}
