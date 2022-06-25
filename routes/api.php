<?php

use Illuminate\Support\Facades\Route;
Route::resource('product','ProductController')->except(['create','edit']);
Route::resource('service','ServiceController')->except(['create','edit']);
