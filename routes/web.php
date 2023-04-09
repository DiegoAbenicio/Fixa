<?php

use App\Http\Controllers\AddressesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HubController;
use App\Http\Controllers\JobOffersController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ServicesCaughtController;
use App\Http\Controllers\WorkersController;

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

Route::get('/', function () {
    return view('index');
});


Route::post('users/login', [UsersController::class, 'login'])->name('users.login');



Route::resource('users', UsersController::class);
Route::resource('hub', HubController::class);
Route::resource('joboffers', JobOffersController::class);
Route::resource('address', AddressesController::class);

Route::get('/add', [WorkersController::class, 'add'])->name('add');
Route::get('/delete', [WorkersController::class, 'delete'])->name('delete');
Route::get('/config', [UsersController::class, 'config'])->name('config');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
Route::get('/login', [IndexController::class, 'login'])->name('movetologin');
Route::get('/register', [IndexController::class, 'register'])->name('movetoregister');
