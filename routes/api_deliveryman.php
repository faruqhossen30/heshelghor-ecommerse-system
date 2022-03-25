<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\BrandAPIController;




Route::get('jsutfortest', [BrandAPIController::class, 'brands']); // Brand List
