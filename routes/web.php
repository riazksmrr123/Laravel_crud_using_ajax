<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\OrderController;


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

Route::get('', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']); //->name('home');
Route::resource('customers',CustomerController::class);//->middleware('auth');

Route::get('cities/index',[CityController::class,'index']);
Route::get('cities/add',[CityController::class,'show']);
Route::post('cities/create',[CityController::class,'create']);

Route::get('products/index',[ProductController::class,'index']);
Route::get('products/create',[ProductController::class,'create']);
Route::post('products/store',[ProductController::class,'store']);
Route::get('products/edit/{id}',[ProductController::class,'edit']);
Route::post('products/delete/{id}',[ProductController::class,'destroy']);
Route::put('products/update/{id}',[ProductController::class,'update']);

// Route::get('orders/index',[OrderController::class,'index']);
Route::get('orders/create',[OrderController::class,'create']);
Route::post('orders/store',[OrderController::class,'store']);

// Route::get('orders/update',[OrderController::class,'update']);
Route::get('orders/index',[OrderController::class,'index']);
Route::get('orders/edit/{id}',[OrderController::class,'edit']);
Route::post('orders/update/{id}',[OrderController::class,'update']);



