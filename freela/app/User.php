<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'provider', 'provider_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function contact()
    {
        return $this->hasOne(Contact::class, 'users', 'id');
    }
    public function tecnology()
    {
        return $this->hasOne(Tecnology::class, 'users', 'id');
    }

    public function courses()
    {
        return $this->hasOne(Courses::class, 'users', 'id');
    }
    public function idioma()
    {
        return $this->hasOne(Idioma::class, 'users', 'id');
    }
    public function address()
    {
        return $this->hasOne(Address::class, 'users', 'id');
    }
}
