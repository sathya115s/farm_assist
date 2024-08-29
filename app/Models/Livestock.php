<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livestock extends Model
{
    use HasFactory;

    protected $table = 'livetocks';
    protected $fillable = [
        'name',
        'birthdate',
        'color',
        'feeding_time',
        'gender',
        'doctor_name',
        'age',
        'prescription',
        'vaccinated'
    ];

}
