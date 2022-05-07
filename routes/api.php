<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\{
    ListCodesController,
    GetAvailableDestinationsByOriginCodeController,
    ListCallPricesController
};

$version = '/v1';

Route::get("{$version}/codes", [ListCodesController::class, 'handle']);
Route::get("{$version}/codes/{code}/available-destinations", [GetAvailableDestinationsByOriginCodeController::class, 'handle']);

Route::get("{$version}/call_prices", [ListCallPricesController::class, 'handle']);
