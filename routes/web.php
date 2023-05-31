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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {

Route::resource('users', App\Http\Controllers\UserController::class);
Route::post('delete-user', [App\Http\Controllers\UserController::class, 'delete'])->name('deleteUser');
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::resource('activity', App\Http\Controllers\ActivityController::class);
Route::resource('adds', App\Http\Controllers\AddController::class);
Route::post('delete-add', [App\Http\Controllers\AddController::class, 'delete'])->name('deleteAdds');

Route::get('profile', function () {
    return view('users.profile');
});

Route::post('profile-update/{id}',[App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

});
