<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentsPay extends Model
{
    protected $table = 'paymentspaypal';

    protected $fillable = [
        'txnid', 'payment_amount', 'payment_status', 'itemid',
    ];

}
