<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClothingItemController;
use App\Http\Controllers\DonationPostController;
use App\Http\Controllers\DonationRequestController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\OutfitPlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/story-page', [GuestController::class, 'story'])->name('stories');
Route::get('/', [GuestController::class, 'home'])->name('home');
Route::view('/about', 'about')->name('about');

// Registration Routes
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.post');

// Login Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');

// Logout Route
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');






// Dashboard Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/donor/dashboard', [DashboardController::class, 'donor'])->name('donor.dashboard');
    Route::get('/recipient/dashboard', [DashboardController::class, 'recipient'])->name('recipient.dashboard');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/admin/dashboard', fn() => view('dashboards.admin'))->name('admin.dashboard');
//     Route::get('/donor/dashboard', fn() => view('dashboards.donor'))->name('donor.dashboard');
//     Route::get('/recipient/dashboard', fn() => view('dashboards.recipient'))->name('recipient.dashboard');
// });

// Admin Specific Routes
Route::get('/donations', [AdminController::class, 'donationPosts'])->name('admin.donations');
Route::get('/requests', [AdminController::class, 'donationRequests'])->name('admin.requests');
// // Edit Profile Route
// Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');


// Show edit form
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');

// Handle form submission
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');




// UserController Routes
Route::resource('users', UserController::class)->middleware('role:admin');

// Stories Routes
Route::resource('stories', StoryController::class)->middleware('auth');

// OutfitPlan Routes
Route::resource('outfit-plans', OutfitPlanController::class)->middleware('auth');

// DonationRequests Routes
Route::resource('donation-requests', DonationRequestController::class)->middleware('auth')->except(['edit', 'update']);

// DonationPosts Routes
Route::resource('donation-posts', DonationPostController::class)->middleware('auth');

// ClothingItem Routes
Route::resource('clothing-items', ClothingItemController::class)->middleware('auth');
