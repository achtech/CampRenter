<?php

namespace App\Models;

class CamperBookmark extends Base
{
    protected $table = 'camper_bookmarks';
    public $primarykey = 'id';
    protected $fillable = [
        'id_campers',
        'id_clients',
    ];
}
