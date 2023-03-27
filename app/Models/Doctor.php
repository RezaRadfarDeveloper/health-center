<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function centers()
    {
       return  $this->belongsToMany(Center::class);
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
