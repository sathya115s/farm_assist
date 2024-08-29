<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;


    protected $table='expenses';

    protected $fillable=[
        'type_expenses',
        'expense_item',
        'expense_amount',
        'expense_date'
    ];
}
