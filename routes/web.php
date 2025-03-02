<?php

use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WelcomeController::class, 'index'])->name('welcomePage');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', [adminController::class, 'index'])->name('adminDashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
});
require __DIR__ . '/auth.php';
