<?php

namespace App\Models;

class Client extends Base
{
    protected $table = 'clients';
    public $primarykey = 'id';
    protected $fillable = ['message','date_sent','ordre_message','id_owners','id_renters','id_bookings'];
}
