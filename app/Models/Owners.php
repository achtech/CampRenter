<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owners extends Model
{
    protected $table = 'owners';
    public $primarykey = 'id';
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'national_id',
        'image_national_id',
        'id_avatars',
        'paypal_account',
        'credit_card'
    ];
}
