<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\PasienRawatInapController;

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

// Route::get('doctors',[DoctorController::class,'index']);
// Route::get('doctors/{id}',[DoctorController::class,'show']);
// Route::post('doctors',[DoctorController::class,'store']);
// Route::put('doctors/{id}',[DoctorController::class,'update']);
// Route::delete('doctors/{id}',[DoctorController::class,'destroy']);

Route::apiResource('doctors',DoctorController::class);
Route::apiResource('pasien_rawat_inap', PasienRawatInapController::class);
