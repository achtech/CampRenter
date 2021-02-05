<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaypalStripe extends Model
{
    protected $table = 'paypal_stripe';
    public $primarykey = 'id';
    protected $fillable = [
        'transaction_id',
        'booking_id',
        'camper_name',
        'amount',
        'payer_email',
        'typepaiement',
        'payment_status',
        'created_at',
        'updated_at',
    ];
    protected $hidden = ['created_at', 'updated_at'];

}
