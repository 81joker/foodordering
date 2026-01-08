<?php

use App\Http\Controllers\Admin\CuisineController;
use App\Http\Controllers\Admin\FoodController as AdminFoodController;
use App\Http\Controllers\Admin\RestaurantController as AdminRestaurantController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\CheckoutController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\FoodController as WebsiteFoodController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\RestaurantController as WebsiteRestaurantController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group([], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])
        ->name('checkout.place_order');
    Route::get('/restaurants', [WebsiteRestaurantController::class, 'index'])->name('restaurant.index');
    Route::get('/restaurants/{id}', [WebsiteRestaurantController::class, 'show'])->name('website.restaurants.show');
    Route::post('/restaurants/{id}/booking', [WebsiteRestaurantController::class, 'storeBooking'])->name('website.bookings.store');

    Route::get('/food', [WebsiteFoodController::class, 'index'])->name('food.index');
    Route::get('/food/{id}', [WebsiteFoodController::class, 'show'])->name('website.food.show');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
});

Route::middleware(IsAdmin::class)->prefix('admin')->name('admin.')->group(function () {
    // Other admin routes can be defined here
    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    })->name('dashboard');
    // Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('foods', AdminFoodController::class);
    Route::resource('cuisines', CuisineController::class);
    Route::resource('restaurants', AdminRestaurantController::class);
});
