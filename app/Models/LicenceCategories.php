<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LicenceCategories extends Model
{
    protected $table = 'licence_categories';
    public $primarykey = 'id';
    protected $fillable = [
        'name'
    ];
}
