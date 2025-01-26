<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('storeItem', [\App\Http\Controllers\HomeController::class, 'postProfileForm'])->name('admin.storeItem');
Route::get('addItem', [\App\Http\Controllers\HomeController::class, 'viewProfileForm'])->name('admin.addItem');

Route::post('storeCarousel', [\App\Http\Controllers\HomeController::class, 'postCarouselForm'])->name('admin.storeCarousel');
Route::get('addCarousel', [\App\Http\Controllers\HomeController::class, 'viewCarouselForm'])->name('admin.addCarousel');
