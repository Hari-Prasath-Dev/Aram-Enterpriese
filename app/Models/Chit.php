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
        'duration_months',
        'auction_held_on',
        'status',
    ];

    public function schemes()
    {
        return $this->hasMany(ChitScheme::class, 'chit_id');
    }

    public function users()
    {
        // Ensure pivot table columns match actual table
        return $this->belongsToMany(User::class, 'chit_members', 'group_id', 'user_id')
                    ->withPivot('joined_at')
                    ->withTimestamps();
    }

    public function members()
    {
        // Assuming 'chit_members' table has 'group_id' and 'user_id'
        return $this->hasMany(ChitMember::class, 'group_id');
    }

}
