<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CityController;

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
Route::get('addnewcity',[CustomerController::class,'addnewcity']);
//Route::resource('cities',CityController::class);
//Route::get('show',[CityController::class,'show']);
//Route::post('update',[CustomerController::class,'update']);
// Route::post('create',[CityController::class,'create']);
