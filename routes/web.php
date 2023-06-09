<?php

use App\Http\Controllers\AddressesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HubController;
use App\Http\Controllers\JobOffersController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\ProfileController;
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

Route::resource('users', UsersController::class);
Route::resource('hub', HubController::class);
Route::resource('joboffers', JobOffersController::class);
Route::resource('address', AddressesController::class);
Route::resource('jobs', JobsController::class);
Route::resource('profile', ProfileController::class);

Route::get('usersjobs.ajax', [JobsController::class,'usersjobsAjaxDataTables'])->name('usersjobs.ajax');
Route::get('anotherjobs.ajax', [JobsController::class,'anotherjobsAjaxDataTables'])->name('anotherjobs.ajax');
Route::get('anotheraccept.ajax', [JobsController::class, 'anotheracceptAjaxDataTables'])->name('anotheraccept.ajax');
Route::get('youraccept.ajax', [JobsController::class, 'youracceptAjaxDataTables'])->name('youraccept.ajax');


Route::controller(JobsController::class)->group(function(){
    Route::get('/removeJob', 'removeJob')->name('removeJob');
    Route::get('/addJob', 'addJob')->name('addJob');
    Route::get('/discartJob', 'discartJob')->name('discartJob');
});
Route::controller(ProfileController::class)->group(function(){
    Route::get('/profile', 'login')->name('profile.login');
    Route::post('/attDescription', 'attDescription')->name('profile.attDescription');
});
Route::controller(WorkersController::class)->group(function(){
    Route::get('/add', 'add')->name('add');
    Route::get('/delete', 'delete')->name('delete');
});

Route::controller(IndexController::class)->group(function(){
    Route::get('/login', 'login')->name('movetologin');
    Route::get('/register', 'register')->name('movetoregister');
});

Route::controller(UsersController::class)->group(function(){
    Route::post('/users/login', 'login')->name('users.login');
    Route::get('/config', 'config')->name('config');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(AddressesController::class)->group(function(){
    Route::get('/addressesdelete', 'addressesdelete')->name('addressesdelete');
});
