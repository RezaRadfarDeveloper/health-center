<?php

namespace App\Http\Controllers\Api\Center;

use App\Http\Controllers\Controller;
use App\Http\Resources\DoctorResource;
use App\Models\Center;
use App\Models\Doctor;
use Illuminate\Http\Request;

class CenterDoctorsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $centerId)
    {
        
       $center = Center::findOrFail($centerId);
        $test = $center->doctors()->join('images', 'images.imageable_id', '=', 'doctors.id')
        ->where('imageable_type', '=', 'App\Models\Doctor')->select('doctors.*','images.path as img')->get();
        $doctors = DoctorResource::collection($center->doctors()->get());
        // return response()->json($doctors);
        return response()->json($test);
    }
}
