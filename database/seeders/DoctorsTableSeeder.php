<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Image;
use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $doctors =  Doctor::factory()->count(50)->create();
        $doctors->each(function($doctor) {
        $image = Image::factory()->make(); 
        $doctor->image()->save($image);

        });
    }
}
