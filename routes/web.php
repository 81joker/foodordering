<?php

use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.layouts.app');
})->name('admin.dashboard');

use App\Http\Controllers\Admin\CuisineController;
use App\Http\Controllers\Admin\RestaurantController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Crud Users
// Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
// Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
// Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.users.store');
// Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
// Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
// Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

// Route::get('/admin/cuisines', [UserController::class, 'index'])->name('admin.cuisines.index');

Route::middleware(IsAdmin::class)->prefix('admin')->name('admin.')->group(function () {
    // Other admin routes can be defined here
    Route::resource('users', UserController::class);
    Route::resource('foods', FoodController::class);
    Route::resource('cuisines', CuisineController::class);
    Route::resource('restaurants', RestaurantController::class);
});
