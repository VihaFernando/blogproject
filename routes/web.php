<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class,'homepage']);

// Redirect users to the appropriate dashboard based on their type
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth'])->name('home');

// User dashboard
Route::get('/dashboard', function () {
    return view('home.homepage');
})->middleware(['auth', 'verified'])->name('home.homepage');

// Admin home
Route::get('/admin/home', function () {
    return view('admin.adminhome');
})->middleware(['auth', 'verified'])->name('admin.home');

Route::get('post',[HomeController::class,'post']);

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/post_page', [AdminController::class,'post_page']);
Route::post('/add_post', [AdminController::class,'add_post']);
Route::get('/show_post', [AdminController::class,'show_post']);
Route::get('/delete_post/{id}', [AdminController::class,'delete_post']);