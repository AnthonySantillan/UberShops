<?php

use App\Http\Controllers\DriversController;
use App\Http\Controllers\RolesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::apiResource('users',UsersController::class);
Route::apiResource('drivers',DriversController::class);
Route::apiResource('roles',RolesController::class);
Route::apiResource('vehicles',VehiclesController::class);
Route::apiResource('payments',PaymentsController::class);
Route::apiResource('travels',TravelsController::class);