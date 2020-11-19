<?php

namespace App\Models;

class Notification extends Base
{
    protected $table = 'notifications';
    public $primarykey = 'id';
    protected $fillable = [
        'message',
        'type',
        'id_renter',
        'id_owner',
        'status'
    ];
}
