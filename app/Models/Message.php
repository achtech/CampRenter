<?php

namespace App\Models;

class Message extends Base
{
    protected $table = 'messages';
    public $primarykey = 'id';
    protected $fillable = [
        'email',
        'full_name',
        'telephone',
        'subject',
        'message',
        'status'
    ];
}
