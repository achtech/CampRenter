<?php

namespace App\Models;

class Billing extends Base
{
    protected $table = 'billings';
    public $primarykey = 'id';
    protected $fillable = [
        'iban',
        'billings_methods',
        'total',
        'id_clients',
        'billings_status',
        'created_by',
        'updated_by'
    ];
}
