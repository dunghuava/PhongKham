<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api'], function(){
    Route::resource('product','ProductController')->except(['create','edit']);
    Route::resource('service','ServiceController')->except(['create','edit']);
    Route::resource('user','UserController')->except(['create','edit']);
});
