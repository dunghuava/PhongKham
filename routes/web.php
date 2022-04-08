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

Route::group(['prefix'=>'/','middleware'=>'user'],function(){
    Route::resource('product','ProductController');
});

// Layout
Route::get('{any}',[LayoutController::class,'index'])->where('any','^(?!(api|web-tool)\/).*$')->middleware('user');
