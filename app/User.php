<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasRoles(array $roles) {
      foreach ($roles as $role) {
        foreach ($this->roles as $userRole){
          if ($userRole->name === $role){
            return true;
          }
        }
      }
      return false;
    }

    public function roles() {
      #linking the role table to users table
      return $this->belongsToMany(Role::class);
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
