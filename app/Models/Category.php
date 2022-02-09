<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function nurses(){
        return $this->belongsToMany(Nurse::class);
    }

    public function announcement(){
        return $this->belongsTo(Announcement::class);
    }
}
