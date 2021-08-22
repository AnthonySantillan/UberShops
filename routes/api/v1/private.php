<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\UserController;
use App\Http\Controllers\V1\FileController;
use App\Http\Controllers\V1\CatalogueController;
use App\Http\Controllers\V1\TravelController;
use App\Http\Controllers\V1\PaymentController;
use App\Http\Controllers\V1\ClientController;
use App\Http\Controllers\V1\DetailController;
use App\Http\Controllers\V1\DriverController;
use App\Http\Controllers\V1\DriverVehicleController;
use App\Http\Controllers\V1\ProductController;
use App\Http\Controllers\V1\SellerController;
use App\Http\Controllers\V1\SellerShopController;
use App\Http\Controllers\V1\ShopController;
use App\Http\Controllers\V1\VehicleController;

Route::apiResource('users', UserController::class);

Route::apiResource('catalogues', CatalogueController::class);

Route::apiResource('files', FileController::class)->except(['index', 'store']);

Route::prefix('user')->group(function () {
    Route::patch('destroys', [UserController::class, 'destroys']);
});

Route::prefix('user/{user}')->group(function () {
    Route::prefix('file')->group(function () {
        Route::get('{file}/download', [UserController::class, 'downloadFile']);
        Route::get('', [UserController::class, 'indexFiles']);
        Route::get('{file}', [UserController::class, 'showFile']);
        Route::post('', [UserController::class, 'uploadFile']);
        Route::put('{file}', [UserController::class, 'updateFile']);
        Route::delete('{file}', [UserController::class, 'destroyFile']);
        Route::patch('', [UserController::class, 'destroyFiles']);
    });
    Route::prefix('image')->group(function () {
        Route::get('{image}/download', [UserController::class, 'downloadImage']);
        Route::get('', [UserController::class, 'indexImages']);
        Route::get('{image}', [UserController::class, 'showImage']);
        Route::post('', [UserController::class, 'uploadImage']);
        Route::put('{image}', [UserController::class, 'updateImage']);
        Route::delete('{image}', [UserController::class, 'destroyImage']);
        Route::patch('', [UserController::class, 'destroyImages']);
    });
});

Route::prefix('file')->group(function () {
    Route::patch('destroys', [FileController::class, 'destroys']);
});

Route::prefix('file/{file}')->group(function () {
    Route::get('download', [FileController::class, 'download']);
});


//rutas
//clientes
Route::apiResource('clients', ClientController::class);

Route::prefix('client')->group(function () {
    Route::patch('{client}', [ClientController::class, 'destroy']);
});
//conductores
Route::apiResource('drivers', DriverController::class);

Route::prefix('driver')->group(function () {
    Route::patch('{driver}', [DriverController::class, 'destroy']);
});

//dueño de la tienda 

Route::apiResource('sellers', SellerController::class);

Route::prefix('seller')->group(function () {
    Route::patch('{seller}', [SellerController::class, 'destroy']);
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
    Route::patch('{payment}', [PaymentController::class, 'destroy']);
});

//roles
Route::apiResource('roles', RoleController::class);

Route::prefix('role')->group(function () {
    Route::patch('{role}', [RoleController::class, 'destroy']);
});
//vehiculos
Route::apiResource('vehicles', VehicleController::class);

Route::prefix('vehicle')->group(function () {
    Route::patch('{vehicle}', [VehicleController::class, 'destroy']);
});
// conductores y vehiculos
Route::apiResource('drivers.vehicles', DriverVehicleController::class);

Route::prefix('driver/{driver}/vehicle')->group(function () {
    Route::get('{vehicle}', [DriverVehicleController::class, 'show']);
});
//detalles
Route::apiResource('details', DetailController::class);

Route::prefix('detail')->group(function () {
    Route::patch('{detail}', [DetailController::class, 'destroy']);
});

Route::apiResource('travels', TravelController::class);

Route::prefix('travel')->group(function () {
    Route::patch('{travel}', [TravelController::class, 'destroy']);
});

//productos
Route::apiResource('products', ProductController::class);

Route::prefix('product')->group(function () {
    Route::patch('{product}', [ProductController::class, 'destroy']);
});
