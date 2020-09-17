<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commissions extends Model
{
    protected $table = 'commissions';
    public $primarykey = 'id';
    protected $fillable = [
        'value',
        'update_date'
    ];
}
