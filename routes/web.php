<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('storeProfile', [\App\Http\Controllers\HomeController::class, 'postProfileForm'])->name('admin.storeProfile');
Route::get('viewProfile', [\App\Http\Controllers\HomeController::class, 'viewProfileForm'])->name('admin.viewProfile');

Route::post('storeCarousel', [\App\Http\Controllers\HomeController::class, 'postCarouselForm'])->name('admin.storeCarousel');
Route::get('addCarousel', [\App\Http\Controllers\HomeController::class, 'viewCarouselForm'])->name('admin.addCarousel');
Route::get('editCarousel', [\App\Http\Controllers\HomeController::class, 'editCarousel'])->name('admin.editCarousel');
Route::post('editCarousel/{carousel_id}', [\App\Http\Controllers\HomeController::class, 'postEditCarousel'])->name('admin.postEditCarousel');

Route::post('storeItem', [\App\Http\Controllers\ItemController::class, 'addItem'])->name('admin.storeItem');
Route::get('viewItem', [\App\Http\Controllers\ItemController::class, 'index'])->name('admin.viewItem');
