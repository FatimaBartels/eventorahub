<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\EventListController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EventController as AdminEventController; // ADMIN controller
use App\Http\Controllers\Admin\BookingController as AdminBookingController; // ADMIN controller
use App\Http\Controllers\BookingController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/about', 'public-pages.about')->name('about');

Route::get('/events', [EventListController::class, 'index'])->name('events.index');

Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

Route::middleware('auth')->group(function() {
    Route::get('/events/{event}/book', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/events/{id}/book', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/dashboard/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/dashboard/bookings/{id}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
    Route::get('/events/{event}/payment', [BookingController::class, 'payment'])->name('bookings.payment');
    Route::post('/events/{event}/payment', [BookingController::class, 'processPayment'])->name('bookings.processPayment');
    Route::get('/bookings/{booking}/confirmed', [BookingController::class, 'confirmed'])->name('bookings.confirmed');
});


// User 
Route::middleware(['auth', 'verified'])->group( function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Admin Area 

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('events', AdminEventController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class );
    Route::resource('bookings', AdminBookingController::class)->only(['index', 'show']);
    
    });




require __DIR__.'/auth.php';
