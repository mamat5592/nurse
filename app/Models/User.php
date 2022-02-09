<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function announcements(){
        return $this->hasMany(Announcement::class);
    }

    public function phones(){
        return $this->hasMany(Phone::class);
    }

    public function nurse(){
        return $this->belongsTo(Nurse::class);
    }
}
