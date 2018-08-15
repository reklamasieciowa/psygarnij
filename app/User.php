<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'newsletter', 'notification',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function Animals()
    {
        return $this->hasMany(Animal::class);   
    }

    public function hasRole($id)
    {
         $roles = Auth::user()->roles;
        foreach($roles as $role) {
            if($role->id == $id){
                return true;
            }
        }
        return false;
    }


}
