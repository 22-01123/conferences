<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Global Route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Routes for authenticated users (login required)
Route::middleware(['auth'])->group(function () {

    // Client routes
    Route::middleware(['auth', 'role:client'])->group(function () {
        Route::get('/conferences', [ClientController::class, 'index'])->name('conferences.index');
        Route::get('/conferences/{id}', [ClientController::class, 'show'])->name('conferences.show');
        Route::post('/conferences/{id}/register', [ClientController::class, 'register'])->name('conferences.register');
    });

// Employee routes
    Route::middleware(['auth', 'role:employee'])->group(function () {
        Route::get('/employee/conferences', [EmployeeController::class, 'index'])->name('employee.conferences.index');
        Route::get('/employee/conferences/{id}', [EmployeeController::class, 'show'])->name('employee.conferences.show');
    });

// Admin routes
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::resource('/admin/conferences', AdminConferenceController::class);
        Route::resource('/admin/users', AdminUserController::class);
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


});


require __DIR__.'/auth.php';
