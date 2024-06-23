<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ObatController;
use App\Http\Controllers\Api\ResepController;
use App\Http\Controllers\Api\ObatResepController;

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

// reseps
Route::apiResource('/reseps', ResepController::class);
// obat_reseps
Route::apiResource('/obat_reseps', ObatResepController::class);
// obats
Route::apiResource('/obats', ObatController::class);