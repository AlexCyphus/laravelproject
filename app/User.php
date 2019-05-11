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
      return $this->roles->pluck('name')->intersect($roles);
    }

    public function roles() {
      #linking the role table to users table
      return $this->belongsToMany(Role::class);
    }

    public function isAdmin(){
      return $this->hasRoles(['admin']);
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function messages(){
      return $this->hasMany(Message::class);
    }

    public function setPasswordAttribute($password){
      $this->attributes['password'] = bcrypt($password);
    }

    public function note() {
      return $this->morphOne(Note::class, 'notable');
    }

    public function tags(){
      return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }
}
