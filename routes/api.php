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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [App\Http\Controllers\ApiController::class, 'login']);
Route::post('forget-password', [App\Http\Controllers\ApiController::class, 'forget_password']);
Route::get('adds', [App\Http\Controllers\ApiController::class, 'adds']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('activity/{id}', [App\Http\Controllers\ApiController::class, 'activity']);
    Route::post('add-permission', [App\Http\Controllers\ApiController::class, 'add_permission']);
    Route::get('permissions/{id}', [App\Http\Controllers\ApiController::class, 'permissions']);
    Route::post('delete-permission', [App\Http\Controllers\ApiController::class, 'delete_permission']);

    
    Route::post('update-password', [App\Http\Controllers\ApiController::class, 'update_password']);
});
