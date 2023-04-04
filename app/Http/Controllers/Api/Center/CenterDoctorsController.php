<?php

namespace App\Http\Controllers\Api\Center;

use App\Http\Controllers\Controller;
use App\Http\Resources\DoctorResource;
use App\Models\Center;
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

    $centerDoctors = Center::with(['doctors.image' => function($query) {
            $query->select(['imageable_id', 'path']);
        },'image' =>function($query) {
            $query->select(['imageable_id', 'path']);
        }])
        ->where('centers.id','=',$centerId)
        ->first();

        return response()->json($centerDoctors);
    }
}
