<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CamperStatus extends Model
{
    protected $table = 'v_camper_status';
    protected $fillable = [
        'CamperId',
        'bookingId',
        'bookingStatusId',
        'label_de',
        'label_en',
        'label_fr',
    ];
}
