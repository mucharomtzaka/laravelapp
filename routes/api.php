<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TransactionController;

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
//route register new user
Route::post('/register',[AuthController::class,'register']);

//route login 
Route::post('/login', [AuthController::class,'login']);

//route group with middleware 
Route::group(['middleware' => 'auth:sanctum'], function() {
    //route get info profil user
    Route::get('/profil/user',[AuthController::class,'profilUser']);
    
   //route logout user
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::post('/logoutall', [AuthController::class,'logoutall']);
    
  // route get list all product
    Route::get('/product',[ProductController::class,'index']);

  // route store new product 
    Route::post('/product/new-product',[ProductController::class,'store']);
    
  // route get one detail product with id 
    Route::get('/product/detail/{id}',[ProductController::class,'show']);
   
  // route remove product 
    Route::delete('/product/remove/{id}',[ProductController::class,'destroy']);
  
  //route update data store Product
    Route::post('/product/update/{id}',[ProductController::class,'update']);
    
  //route truncate store data Product
    Route::get('/product/removeall',[ProductController::class,'truncate']);
    
   // route search
    Route::get('/product/search/{keyword}'
    ,[ ProductController::class,'search']);
    
    //route group transaction
    //get list transaction
    Route::get('/transaction',[TransactionController::class,'index']);
    
    // route new transaction
    Route::post('/transaction/new-transaction',[
      TransactionController::class,'store'
      ]);
      
    // route detail transaction
    Route::get('/transaction/detail/{id}',[
      TransactionController::class,'show'
      ]);
      
    //route update transaction 
    Route::post('/transaction/update/{id}',[
      TransactionController::class,'update'
      ]);
      
     //route delete transaction
    Route::delete('transaction/remove/{id}',[
       TransactionController::class,'destroy'
       ]);
    
    // route search transaction with param factur
    Route::get('transaction/search/{keyword}',[
      TransactionController::class,'search'
      ]);
      
     
    
    
    
});

/**
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
**/
