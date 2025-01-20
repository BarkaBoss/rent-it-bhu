<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('addItem', 'ItemController@addItem')->name('addItem');
