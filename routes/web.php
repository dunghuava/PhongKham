<?php

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
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;

Route::group(['prefix'=>'auth'],function(){
    Route::post('info',[AuthController::class,'info']);
    Route::post('login',[AuthController::class,'login']);
    Route::post('logout',[AuthController::class,'logout']);
});

Route::group(['prefix' => 'product'], function() {
    Route::post('list',[ProductController::class,'index']);
    Route::post('delete',[ProductController::class,'delete']);
    Route::post('get',[ProductController::class,'getItem']);
    Route::post('save',[ProductController::class,'saveItem']);
});

Route::group(['prefix' => 'setting'], function() {
    Route::post('profile',[SettingController::class,'index']);
    Route::post('update-profile',[SettingController::class,'updateProfile']);
});


// Layout
Route::get('{any}',[LayoutController::class,'index'])->where('any','^(?!(api|web-tool)\/).*$')->middleware('user');
