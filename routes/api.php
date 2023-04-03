<?php

use Facade\FlareClient\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('centers','Api\CentersController');
// ROUTE TO FETCH DOCTORS FOR A CENTER

Route::get('center/{centerId}/doctors', 'Api\Center\CenterDoctorsController')->name('center.doctors');

// ROUTE TO FETCH CENTERS FOR A DOCTOR
Route::get('doctor/{doctorId}/centers', 'Api\Doctor\DoctorCentersController')->name('doctor.centers');
Route::get('centers-search', 'Api\CentersSearchController')->name('centers.search');
