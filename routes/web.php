<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminConferenceController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;

// Global Route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Routes for authenticated users (login required)
Route::middleware(['auth'])->group(function () {

    // Client routes
    // Admin Routes
    Route::middleware(['auth', 'role:admin'])->group(function () {
        // Conference Management
        Route::resource('admin/conferences', AdminConferenceController::class);

        // User Management
        Route::resource('admin/users', AdminUserController::class);
    });


    Route::middleware('role:employee')->group(function () {
        Route::get('/employee/conferences', [EmployeeController::class, 'index'])->name('employee.conferences.index');
    });

    Route::middleware('role:client')->group(function () {
        Route::get('/conferences', [ClientController::class, 'index'])->name('conferences.index');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile routes
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


// Include the authentication routes
require __DIR__.'/auth.php';

