<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\ParticipantController;

// =============================================
// PUBLIC ROUTES (User)
// =============================================
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/activities', [PublicController::class, 'activities'])->name('activities');
Route::get('/featured', [PublicController::class, 'featured'])->name('featured');
Route::get('/contacts', [PublicController::class, 'contacts'])->name('contacts');

// Pendaftaran Peserta (Register Participant)
Route::get('/register/{eventId}', [PublicController::class, 'registerForm'])->name('register.form');
Route::post('/register', [PublicController::class, 'registerSubmit'])->name('register.submit');


// =============================================
// ADMIN AUTH ROUTES
// =============================================
Route::prefix('admin')->name('admin.')->group(function () {

    // Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes (harus login dulu)
    Route::middleware('auth.admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Manage Events
        Route::resource('events', EventController::class);

        // Manage Schedules
        Route::resource('schedules', ScheduleController::class);

        // Manage Participants
        Route::resource('participants', ParticipantController::class);
    });
});



