<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\RestaurantController as AdminRestaurantController;
use App\Http\Controllers\Admin\FoodController as AdminFoodController;
use App\Http\Controllers\Admin\CuisineController as AdminCuisineController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\CheckoutController;
use App\Http\Controllers\Website\RestaurantController;
use App\Http\Controllers\Website\FoodController;
use App\Http\Controllers\Website\CartController;
use App\Http\Middleware\IsAdmin;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group([], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])
        ->name('checkout.place_order');
    Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurant.index');
    Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])->name('website.restaurants.show');
    Route::post('/restaurants/{id}/booking', [RestaurantController::class, 'storeBooking'])->name('website.bookings.store');

    Route::get('/food', [FoodController::class, 'index'])->name('food.index');
    Route::get('/food/{id}', [FoodController::class, 'show'])->name('website.food.show');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
});

Route::middleware(IsAdmin::class)->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('restaurants', AdminRestaurantController::class);
    Route::resource('foods', AdminFoodController::class);
    Route::resource('cuisines', AdminCuisineController::class);
    Route::resource('bookings', AdminBookingController::class);
    Route::resource('reviews', AdminReviewController::class);
    Route::resource('users', AdminUserController::class);
    Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}/lines', [AdminOrderController::class, 'orderLines'])->name('orders.lines');
    Route::post('orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::delete('orders/{order}', [AdminOrderController::class, 'destroy'])->name('orders.destroy');
});
