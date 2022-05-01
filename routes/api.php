<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

$version = '/v1';

Route::get("{$version}/codes", [\App\Http\Controllers\Api\V1\ListCodesController::class, 'handle']);

Route::get("{$version}/call_prices", [\App\Http\Controllers\Api\V1\ListCallPricesController::class, 'handle']);
