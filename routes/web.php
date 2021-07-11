<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Inventory\ProductsController;

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

Route::get('/',function(){
  return view('welcome');
});

Auth::routes();
   
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/home/analytic', [HomeController::class, 'analytic'])->name('home.analytic');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('activities',ActivityController::class);
    Route::group(['prefix'=>'inventory'],function(){
      Route::resource('products',ProductsController::class);
    });
});
