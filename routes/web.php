<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserHostController;
use App\Http\Controllers\UsabilityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});
Route::resource('hosts',HostController::class);
Route::resource('files',FileController::class);
Route::resource('profiles',ProfileController::class);
Route::resource('roles',RoleController::class);
Route::resource('usabilities',UsabilityController::class);
Route::resource('userhosts',UserHostController::class);
Route::resource('users',UserController::class);
Route::resource('images',ImageController::class);