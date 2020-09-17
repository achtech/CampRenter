<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renters extends Model
{
    protected $table = 'renters';
    public $primarykey = 'id';
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'id_licence_categories',
        'image_licence_categories',
        'national_id',
        'image_national_id',
        'id_avatars',
        'paypal_account',
        'credit_card'
    ];
}
