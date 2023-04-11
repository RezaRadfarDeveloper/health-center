<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeekDay extends Model
{
    use HasFactory;

    public function sessions() {
        return $this->belongsToMany(Session::class);
    }
}
