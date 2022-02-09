<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }

    public function cv(){
        return $this->hasOne(Cv::class);
    }
}
