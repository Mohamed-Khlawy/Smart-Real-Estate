<?php

use App\Http\Controllers\LinksController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(LinksController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/agents', 'agents')->name('agents');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/buysalerent', 'buysalerent')->name('buysalerent');
    Route::get('/buy_salerent', 'sortData')->name('sortData');
    Route::Get('/search', 'search')->name('search');
    Route::get('/blogdetail', 'blogdetail')->name('blogdetail');
    Route::get('/propertydetail', 'property_detail')->name('propertydetail');

});

require __DIR__.'/auth.php';



