<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;

    protected $table='crops';


    protected $fillable=[
        'crop_name',
        'soil_type',
        'planting_type',
        'activity',
        'activity_start_days',
        'activity_end_days',
    ];
}
