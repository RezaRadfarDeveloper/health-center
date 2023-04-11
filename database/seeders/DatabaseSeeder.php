<?php

namespace Database\Seeders;

use App\Models\Center;
use App\Models\Doctor;
use App\Models\Image;
use App\Models\Session;
use App\Models\WeekDay;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $days = [['name'=>'Monday'],['name'=> 'Tuesday'],['name'=> 'Wednesday'],['name'=> 'Thursday'],['name'=> 'Friday']];
        $sessions = [
         ['session'=>"09:00 - 09:30"]
        ,['session'=>"09:30 - 10:00"]
        ,['session'=>"10:00 - 10:30"]
        ,['session'=>"10:30 - 11:00"]
        ,['session'=>"11:00 - 11:30"]
        ,['session'=>"11:30 - 12:00"]
        ,['session'=>"12:00 - 12:30"]
        ,['session'=>"12:30 - 13:00"]
        ,['session'=>"13:00 - 13:30"]
        ,['session'=>"13:30 - 14:00"]
        ,['session'=>"14:00 - 14:30"]
        ,['session'=>"14:30 - 15:00"]
        ,['session'=>"15:00 - 15:30"]
        ,['session'=>"15:30 - 16:00"]
        ,['session'=>"16:00 - 16:30"]
        ,['session'=>"16:30 - 17:00"]
       ];

        DB::table('week_days')->insert($days);
        DB::table('sessions')->insert($sessions);

        $this->call(CentersTableSeeder::class);
        $this->call(DoctorsTableSeeder::class);

        $weekdays = WeekDay::all();
        Session::all()->each(function($session) use ($weekdays) {
            $session->weekDays()->attach(
                $weekdays->pluck('id')->toArray()
            );
        });

        $doctors = Doctor::all();
        $doctorsCount = $doctors->count();
        Center::all()->each(function ($center) use ($doctors, $doctorsCount) { 
            $center->doctors()->attach(
                $doctors->random(rand(1, $doctorsCount))->pluck('id')->toArray()
            ); 
        });
    }
}

