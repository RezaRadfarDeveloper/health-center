<?php

namespace Database\Seeders;
use App\Models\Center;
use App\Models\Image;
use Illuminate\Database\Seeder;

class CentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $centers =Center::factory()->count(20)->create();
        $centers->each(function($center) {
        $image = Image::factory()->make(); 
        $center->image()->save($image);
        });
    }
}
