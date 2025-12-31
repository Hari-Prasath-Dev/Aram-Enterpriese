<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'bank_name', 'ifsc_code', 'account_name', 'branch',
        'bank_statement', 'aadhar_number', 'pan_number',
        'aadhar_front', 'aadhar_back', 'pan_card',
        'cibil_score', 'other_proof'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
