<?php

use App\Http\Controllers\V1\TravelController;
use App\Http\Controllers\V1\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\ClientController;
use App\Http\Controllers\V1\DetailController;
use App\Http\Controllers\V1\DriverController;
use App\Http\Controllers\V1\DriverVehicleController;
use App\Http\Controllers\V1\RoleController;
use App\Http\Controllers\V1\SellerController;
use App\Http\Controllers\V1\SellerShopController;
use App\Http\Controllers\V1\ShopController;
use App\Http\Controllers\V1\VehicleController;

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


//clientes
Route::apiResource('clients', ClientController::class);

Route::prefix('client')->group(function () {
    Route::get('{client}', [ClientController::class, 'show']);
});
//conductores
Route::apiResource('drivers', DriverController::class);

Route::prefix('driver')->group(function () {
    Route::get('{driver}', [DriverController::class, 'show']);
});
//dueño de la tienda 

Route::apiResource('sellers', SellerController::class);

Route::prefix('seller')->group(function () {
    Route::get('{seller}', [SellerController::class, 'show']);
});

//tienda 
Route::apiResource('shops', ShopController::class);

Route::prefix('shop')->group(function () {
    Route::patch('{shop}', [ShopController::class, 'destroy']);
});

//tiendas y dueños
Route::apiResource('shops.sellers', SellerShopController::class);

Route::prefix('shop/{shop}/seller')->group(function () {
    Route::get('{seller}', [SellerShopController::class, 'show']);
});


//metodo de pago
Route::apiResource('payments', PaymentController::class);

Route::prefix('payment')->group(function () {
    Route::get('{payment}', [PaymentController::class, 'show']);
});

//roles
Route::apiResource('roles', RoleController::class);

Route::prefix('role')->group(function () {
    Route::get('{role}', [RoleController::class, 'show']);
});
//vehiculos
Route::apiResource('vehicles', VehicleController::class);

Route::prefix('vehicle')->group(function () {
    Route::get('{vehicle}', [VehicleController::class, 'show']);
});
// conductores y vehiculos
Route::apiResource('drivers.vehicles', DriverVehicleController::class);

Route::prefix('driver/{driver}/vehicle')->group(function () {
    Route::get('{vehicle}', [DriverVehicleController::class, 'show']);
});
//detalles
Route::apiResource('details', DetailController::class);

Route::prefix('detail')->group(function () {
    Route::get('{detail}', [DetailController::class, 'show']);
});

Route::apiResource('travels', TravelController::class);

Route::prefix('travel')->group(function () {
    Route::get('{travel}', [TravelController::class, 'show']);
});
