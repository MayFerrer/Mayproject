<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageStudentController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;

// Welcome page route (must be before middleware group)
Route::get('/', [PageController::class, 'welcome'])->name('welcome');

// Authentication routes (no session middleware)
Route::get('/login', [UserAccountController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserAccountController::class, 'login'])->name('users.login');
Route::get('/users/create', [UserAccountController::class, 'create'])->name('users.create');
Route::post('/users', [UserAccountController::class, 'store'])->name('users.store');
Route::get('/update-password', [UserAccountController::class, 'showUpdatePasswordForm'])->name('password.update.form');
Route::post('/update-password', [UserAccountController::class, 'updatePassword'])->name('password.update');

// Public pages
Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');
Route::get('/contactus', [PageController::class, 'contactus'])->name('contactus');
Route::get('/maintenance', [PageController::class, 'maintenance'])->name('maintenance');

// Protected routes
Route::middleware(['session.user'])->group(function () {
    // Dashboard and logout
    Route::get('/dashboard', [UserAccountController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [UserAccountController::class, 'logout'])->name('logout');
    
    // Student management
    Route::get('/students/toggle-status/{student}', [StudentController::class, 'toggleStatus'])->name('students.toggle-status');
    Route::resource('students', StudentController::class);
    
    // Additional protected pages
    Route::get('/conditional/{grade?}', [PageController::class, 'conditional'])->name('conditional');
});

// Test routes
Route::get('/test', fn() => "Laravel is working!");
Route::get('/try', [RedirectController::class, 'showMessage'])->name('RedirectIndex');
Route::get('/redirectme', fn() => redirect()->route('RedirectIndex', ["message" => "This is my message"]));
Route::get('/showSomething/{message}', [RedirectController::class, 'showSomething'])->name('showSomething');
Route::get('/showSomething', [RedirectController::class, 'showSomething']);


