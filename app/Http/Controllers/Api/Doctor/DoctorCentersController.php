<?php

namespace App\Http\Controllers\Api\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorCentersController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $doctorId)
    {
        $doctorWithCenters = Doctor::with(['centers.image' => function($query) {
            $query->select(['imageable_id', 'path']);
        },'image' =>function($query) {
            $query->select(['imageable_id', 'path']);
        }])
        ->where('doctors.id','=',$doctorId)
        ->first();

        return response()->json($doctorWithCenters);
        
    }
}
