<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\BrandAPIController;
use App\Http\Controllers\API\Deliveryman\DeliverymanAuthAPIController;




// Merchant
Route::prefix('deliveryman')->group(function () {
    Route::post('/login', [DeliverymanAuthAPIController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function(){
        Route::get('jsutfortest', [BrandAPIController::class, 'brands']); // Brand List

    });


});
