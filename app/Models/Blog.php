<?php

namespace App\Models;

class Blog extends Base
{
    protected $table = 'blogs';
    public $primarykey = 'id';
    protected $fillable = [
        'photo',
        'title',
        'article',
    ];
}
