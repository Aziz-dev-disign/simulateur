<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id','name', 'email', 'status', 'password',
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
    public function isAdmin()
    {
        return $this->roles()->where('nom','adminisitrateur')->first();
    }
    public function hasAnyRole(array $roles)
    {
        return $this->roles()->where('nom',$roles);
    }

    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id','id');
    }

    public function scopeStatuActif($query)
    {
        return $query->where('status', 'actif')->get();
    }

    public function scopeStatuInactif($query)
    {
        return $query->where('status', 'inactif')->get();
    }

    public function getStatuAttribut($attributes){
        return $this->getStatuOptions()[$attributes];
    }

    public function getStatuOptions(){
        return [
            'actif'     =>'actif',
            'inactif'     =>'inactif',
        ];
    }
}


