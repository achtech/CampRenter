<?php

namespace App\Models;

class Billing extends Base
{
    protected $table = 'billings';
    public $primarykey = 'id';
    protected $fillable = [
        'id_renter',
        'id_owner',
        'id_bill',
        'id_booking',
        'email_paypal',
        'num_card',
        'exp_date',
        'cvc',
        'type',
        'amount',
        'status'
    ];
}
