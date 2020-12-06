<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    protected $guard = 'client';
    protected $table = 'clients';
    public $primarykey = 'id';
    protected $fillable = [
        'name',
        'client_name',
        'client_last_name',
        'email',
        'sex',
        'street',
        'street_number',
        'location',
        'postal_code',
        'country',
        'professional_rental_company',
        'telephone',
        'telephone_code',
        'day_of_birth',
        'month_of_birth',
        'year_of_birth',
        'account_holder_name',
        'account_holder_location',
        'account_holder_street',
        'account_holder_building_number',
        'account_holder_postal_code',
        'account_holder_country',
        'bank_data_adress',
        'bank_data_iban',
        'bank_data_bic',
        'where_you_see_us',
        'instagram_user_name',
        'who_are_you',
        'review',
        'language',
        'password',
        'national_id',
        'image_national_id',
        'driving_licence',
        'driving_licence_image',
        'status',
        'id_avatars',
        'photo',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    // public function getAuthPassword()
    // {
    //     return $this->password;
    // }
    // public function getNameAttribute()
    // {
    //     return $this->client_name;
    // }
}
