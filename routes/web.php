<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['post', 'get'],'/', [\App\Http\Controllers\AuthController::class, 'login']);
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
Route::get('/dashboard', [\App\Http\Controllers\MainController::class, 'index']);

Route::group(['prefix' => 'pengguna'], function (){
    Route::get('/', [\App\Http\Controllers\UsersController::class, 'index']);
    Route::get('/tambah', [\App\Http\Controllers\UsersController::class, 'add_page']);
    Route::get('/edit/{id}', [\App\Http\Controllers\UsersController::class, 'edit_page']);
    Route::post('/create', [\App\Http\Controllers\UsersController::class, 'create']);
    Route::post('/patch', [\App\Http\Controllers\UsersController::class, 'patch']);
    Route::post('/destroy', [\App\Http\Controllers\UsersController::class, 'destroy']);
});

Route::group(['prefix' => 'wilayah'], function (){
    Route::get('/', [\App\Http\Controllers\WilayahController::class, 'index']);
    Route::get('/tambah', [\App\Http\Controllers\WilayahController::class, 'add_page']);
    Route::get('/edit/{id}', [\App\Http\Controllers\WilayahController::class, 'edit_page']);
    Route::post('/create', [\App\Http\Controllers\WilayahController::class, 'create']);
    Route::post('/patch', [\App\Http\Controllers\WilayahController::class, 'patch']);
    Route::post('/destroy', [\App\Http\Controllers\WilayahController::class, 'destroy']);
});

Route::group(['prefix' => 'odc'], function (){
    Route::get('/', [\App\Http\Controllers\ODCController::class, 'index']);
    Route::get('/tambah', [\App\Http\Controllers\ODCController::class, 'add_page']);
    Route::get('/edit/{id}', [\App\Http\Controllers\ODCController::class, 'edit_page']);
    Route::post('/create', [\App\Http\Controllers\ODCController::class, 'create']);
    Route::post('/patch', [\App\Http\Controllers\ODCController::class, 'patch']);
});

Route::group(['prefix' => 'kml-history'], function (){
    Route::get('/', [\App\Http\Controllers\KMLHistoryController::class, 'index']);
    Route::get('/tambah', [\App\Http\Controllers\KMLHistoryController::class, 'add_page']);
    Route::get('/edit/{id}', [\App\Http\Controllers\KMLHistoryController::class, 'edit_page']);
    Route::post('/create', [\App\Http\Controllers\KMLHistoryController::class, 'create']);
    Route::post('/destroy', [\App\Http\Controllers\KMLHistoryController::class, 'destroy']);
});

Route::get('/mapping', [\App\Http\Controllers\Api\MappingController::class, 'get_haversine_data']);
