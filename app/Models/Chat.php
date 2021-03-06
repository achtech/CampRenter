<?php

namespace App\Models;

class Chat extends Base
{
    protected $table = 'chats';
    public $primarykey = 'id';
    protected $fillable = [
        'message', 
        'date_sent', 
        'ordre_message', 
        'id_owners', 
        'id_renters', 
        'id_bookings',
        'status',
        'created_by',
        'updated_by'
    ];
}
