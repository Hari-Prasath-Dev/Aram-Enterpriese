<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChitDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'auction_count',
        'auction_completed_amount',
        'dividend',
        'payable_amount',
        'last_date',
        'successful_bidder'
    ];

    public function group()
    {
        return $this->belongsTo(Chit::class, 'group_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'group_id'); // adjust column name if different
    }

}
