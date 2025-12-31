<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chit extends Model
{
    use HasFactory;
    protected $fillable = [
        'chit_name',
        'amount',
        'type',
        'start_date',
        'status',
    ];
}
