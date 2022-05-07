<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\{
    ListCodesController,
    GetAvailableDestinationsByOriginCodeController,
    ListCallPricesController,
    GetRatePerMinuteController
};

Route::get("/codes", [ListCodesController::class, 'handle']);
Route::get("/codes/{code}/available-destinations", [GetAvailableDestinationsByOriginCodeController::class, 'handle']);

Route::get("/call-prices", [ListCallPricesController::class, 'handle']);
Route::get("/call-prices/{origin}/{destiny}/rate-per-minute", [GetRatePerMinuteController::class, 'handle']);
