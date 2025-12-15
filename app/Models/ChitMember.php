<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChitMember extends Model
{
    protected $fillable = [
        'group_id',
        'user_id',
        'joined_at',
    ];
}
