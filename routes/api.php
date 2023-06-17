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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

Route::group(['prefix' => 'mapping', 'middleware' => 'auth:api'], function () {
    Route::get('/', [\App\Http\Controllers\Api\MappingController::class, 'get_data_by_region']);
});

Route::get('/odc', [\App\Http\Controllers\Api\MappingController::class, 'get_data_by_name']);
Route::get('/odc/{id}', [\App\Http\Controllers\Api\MappingController::class, 'get_detail_odc']);
Route::get('/odc/{id}/kml', [\App\Http\Controllers\Api\KMLHistoryController::class, 'index']);
Route::get('/mapping', [\App\Http\Controllers\Api\MappingController::class, 'get_haversine_data']);
