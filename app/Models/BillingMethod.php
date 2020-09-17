<?php

namespace App\Models;

class BillingMethod extends Base
{
    protected $table = 'billing_method';
    public $primarykey = 'id';
    protected $fillable = [
        'label'
    ];
}
