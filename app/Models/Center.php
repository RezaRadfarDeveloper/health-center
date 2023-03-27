<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Center extends Model
{
    use HasFactory;

    public function doctors() 
    {
       return $this->belongsToMany(Doctor::class);
    }

     public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
