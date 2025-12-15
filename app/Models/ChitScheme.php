<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChitScheme extends Model
{
    use HasFactory;
    protected $fillable = [
        'chit_id', 'month', 'starting_bid', 'amount_payable', 'dividend'
    ];

    public function chit()
    {
        return $this->belongsTo(Chit::class);
    }
}
