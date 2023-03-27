<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\IndexController;

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
Route::get('/login', [IndexController::class, 'login'])->name('movetologin');
Route::get('/register', [IndexController::class, 'register'])->name('movetoregister');
