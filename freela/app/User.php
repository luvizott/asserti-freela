<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\DB;
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
    public function search($filter = null, $filter2 = null, $filter3 = null)
    {
        if (isset($filter) && ($filter2 == null) && ($filter3 == null)) {
            return $data = DB::table('users')
            ->where('idioma.idioma', $filter)
            ->join('idioma', 'idioma.user_id', 'users.id')
            ->join('address', 'address.user_id', 'users.id')
            ->join('tecnology', 'tecnology.user_id', 'users.id')
            ->join('contact', 'contact.user_id', 'users.id')
            ->select('users.*', 'idioma.*', 'address.*', 'tecnology.*', 'contact.*' )
            ->paginate(10);
        }
        elseif (isset($filter2) && ($filter == null) && ($filter3 == null)) {
            return $data = DB::table('users')
            ->where('address.cidade', $filter2)
            ->join('idioma', 'idioma.user_id', 'users.id')
            ->join('address', 'address.user_id', 'users.id')
            ->join('tecnology', 'tecnology.user_id', 'users.id')
            ->join('contact', 'contact.user_id', 'users.id')
            ->select('users.*', 'idioma.*', 'address.*', 'tecnology.*', 'contact.*' )
            ->paginate(10);
        }
        elseif (isset($filter3) && ($filter == null) && ($filter2 == null) ) {
            return $data = DB::table('users')
            ->where('tecnology.tecnology', $filter3)
            ->join('idioma', 'idioma.user_id', 'users.id')
            ->join('address', 'address.user_id', 'users.id')
            ->join('tecnology', 'tecnology.user_id', 'users.id')
            ->join('contact', 'contact.user_id', 'users.id')
            ->select('users.*', 'idioma.*', 'address.*', 'tecnology.*', 'contact.*' )
            ->paginate(10);
        }
        elseif (isset($filter) && isset($filter2) && ($filter3 == null)) {
            return $data = DB::table('users')
            ->where('address.cidade', $filter2)
            ->where('idioma.idioma', $filter)
            ->join('idioma', 'idioma.user_id', 'users.id')
            ->join('address', 'address.user_id', 'users.id')
            ->join('tecnology', 'tecnology.user_id', 'users.id')
            ->join('contact', 'contact.user_id', 'users.id')
            ->select('users.*', 'idioma.*', 'address.*', 'tecnology.*', 'contact.*' )
            ->paginate(10);
        }
        elseif (isset($filter) && isset($filter2) && isset($filter3)) {
            return $data = DB::table('users')
            ->where('tecnology.tecnology', $filter3)
            ->where('address.cidade', $filter2)
            ->where('idioma.idioma', $filter)
            ->join('idioma', 'idioma.user_id', 'users.id')
            ->join('address', 'address.user_id', 'users.id')
            ->join('tecnology', 'tecnology.user_id', 'users.id')
            ->join('contact', 'contact.user_id', 'users.id')
            ->select('users.*', 'idioma.*', 'address.*', 'tecnology.*', 'contact.*' )
            ->paginate(10);
        }
        elseif (isset($filter) && isset($filter3) && ($filter2 == null)) {
            return $data = DB::table('users')
            ->where('tecnology.tecnology', $filter3)
            ->where('idioma.idioma', $filter)
            ->join('idioma', 'idioma.user_id', 'users.id')
            ->join('address', 'address.user_id', 'users.id')
            ->join('tecnology', 'tecnology.user_id', 'users.id')
            ->join('contact', 'contact.user_id', 'users.id')
            ->select('users.*', 'idioma.*', 'address.*', 'tecnology.*', 'contact.*' )
            ->paginate(10);
        }
        elseif (($filter == null) && isset($filter2) && isset($filter3)) {
            return $data = DB::table('users')
            ->where('tecnology.tecnology', $filter3)
            ->where('address.cidade', $filter2)
            ->join('idioma', 'idioma.user_id', 'users.id')
            ->join('address', 'address.user_id', 'users.id')
            ->join('tecnology', 'tecnology.user_id', 'users.id')
            ->join('contact', 'contact.user_id', 'users.id')
            ->select('users.*', 'idioma.*', 'address.*', 'tecnology.*', 'contact.*' )
            ->paginate(10);
        }
    }
}
