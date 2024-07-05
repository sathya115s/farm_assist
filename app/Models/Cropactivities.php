<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cropactivities extends Model
{
    use HasFactory;

    protected $table='cropactivities';

    protected $fillable=[
        'crop',
        'activity',
        'start_date',
        'end_date',
    ];
}
