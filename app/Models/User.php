<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Events\Registered;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    //protected $primaryKey = $id_user;
    protected $fillable = [
           
        'name',
        'username',
        'nip',
        'email',
        'status',
        'password',
        'level_user',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // public function handle(Registered $event)
    // {
    //     if ($event->user instanceof MustVerifyEmail && ! $event->user->hasVerifiedEmail()) {
    //         $event->user->sendEmailVerificationNotification();
    //     }
    // }

    public function surattugas(){
        
        return $this->hasMany(Surattugas::class);
    }
    public function sppd(){
        
        return $this->hasMany(Sppd::class);
    }
}
