<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable  implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password', 'mobile', 'address', 'photo', 'type'];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function unread()
    {
        return $this->hasMany(ChMessage::class, 'to_id')->where('seen', '0');
    }
    public function agreement()
    {
        return $this->hasMany(Agreement::class)->where('tenantid', '!=', '0')->where('amountStatus', '==', '1');
    }
    public function agreementRequest()
    {
        return $this->hasMany(AgreementRequest::class, 'owner_id')->where('status', '3');
    }
    public function maintenance()
    {
        return $this->hasMany(Maintenance::class, 'owner_id')->where('status', '0');
    }
}
