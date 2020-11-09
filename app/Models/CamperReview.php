<?php

namespace App\Models;

class CamperReview extends Base
{
    protected $table = 'camper_reviews';
    public $primarykey = 'id';
    protected $fillable = [
        'name',
        'email',
        'comment',
        'id_campers',
        'rate_service',
        'rate_managing',
        'rate_cleanliness',
        'created_by',
        'updated_by',
    ];
}
