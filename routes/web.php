<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('addItem', 'ItemController@addItem')->name('addItem');
