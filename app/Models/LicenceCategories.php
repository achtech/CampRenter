<?php

namespace App\Models;

class LicenceCategories extends Base
{
    protected $table = 'licence_categories';
    public $primarykey = 'id';
    protected $fillable = [
        'label'
    ];
}
