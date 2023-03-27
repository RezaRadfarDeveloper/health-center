<?php

namespace Database\Seeders;

use App\Models\Center;
use App\Models\Doctor;
use App\Models\Image;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CentersTableSeeder::class);
        $this->call(DoctorsTableSeeder::class);
        $doctors = Doctor::all();
        $doctorsCount = $doctors->count();
        Center::all()->each(function ($center) use ($doctors, $doctorsCount) { 
            $center->doctors()->attach(
                $doctors->random(rand(1, $doctorsCount))->pluck('id')->toArray()
            ); 
        });
    }
}

