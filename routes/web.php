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

Route::get('/register/{eventId}', [PublicController::class, 'registerForm'])->name('register.form');
Route::post('/register', [PublicController::class, 'registerSubmit'])->name('register.submit');

Route::post('/join-club-activity', [PublicController::class, 'joinFiturBaru'])->name('fitur.join');

// =============================================
// ADMIN AUTH ROUTES
// =============================================
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth.admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('events', EventController::class);
        Route::resource('schedules', ScheduleController::class);
        Route::resource('participants', ParticipantController::class);

        Route::get('/events/{id}/participants', [EventController::class, 'listParticipants'])
            ->name('events.participants');

        Route::get('/schedules/{id}/participants', [ScheduleController::class, 'listParticipants'])
            ->name('schedules.participants');
    });
});