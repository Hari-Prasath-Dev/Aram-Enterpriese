<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'password_expire_at',
        'chit_id',
        'password_expire_at',
        'role',
        'mobile',
        'location',
        'nominee_name',
        'nominee_number',
        'pin_number',
        'last_login_at',
		'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function bankDetail()
    {
        return $this->hasOne(BankDetail::class);
    }

    public function chits()
{
    return $this->belongsToMany(Chit::class, 'chit_members', 'user_id', 'group_id')
                ->withPivot('joined_at')
                ->withTimestamps();
}


}
