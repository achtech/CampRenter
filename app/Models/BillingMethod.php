<?php

namespace App\Models;

class BillingMethod extends Base
{
    protected $table = 'billing_methods';
    public $primarykey = 'id';
    protected $fillable = [
        'label'
    ];
}
