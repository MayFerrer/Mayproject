<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageStudentController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\PageController;

Route::middleware(['session.user'])->group(function () {
    // All protected routes go here
    Route::get('/dashboard', [UserAccountController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [UserAccountController::class, 'logout'])->name('logout');
    // etc...
});



// Route for managing students (CRUD)
Route::middleware(['maintenance'])->group(function () {
    Route::resource('/students', ManageStudentController::class);

});


// Additional page routes
Route::get('/maintenance', [PageController::class, 'maintenance']);
Route::get('/', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');
Route::get('/contactus', [PageController::class, 'contactus'])->name('contactus');
Route::get('/students', [PageController::class, 'students'])->name('students');
Route::get('/conditional/{grade?}', [PageController::class, 'conditional'])->name('conditional');

// Redirect routes
Route::get('/try', [RedirectController::class, 'showMessage'])->name('RedirectIndex');
Route::get('/redirectme', fn() => redirect()->route('RedirectIndex', ["message" => "This is my message"]));
Route::get('/showSomething/{message}', [RedirectController::class, 'showSomething'])->name('showSomething');
Route::get('/showSomething', [RedirectController::class, 'showSomething']);

// Laravel test route
Route::get('/test', fn() => "Laravel is working!");




//authentication

// Public routes (no session middleware)
Route::get('/login', [UserAccountController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserAccountController::class, 'login'])->name('users.login');

Route::get('/users/create', [UserAccountController::class, 'create'])->name('users.create');
Route::post('/users', [UserAccountController::class, 'store'])->name('users.store');

Route::get('/update-password', [UserAccountController::class, 'showUpdatePasswordForm'])->name('password.update.form');
Route::post('/update-password', [UserAccountController::class, 'updatePassword'])->name('password.update');

// Routes protected by session middleware
Route::middleware('session.user')->group(function () {
    Route::post('/logout', [UserAccountController::class, 'logout'])->name('logout');

    Route::get('/', [UserAccountController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [UserAccountController::class, 'dashboard']);

    Route::resource('/students', ManageStudentController::class);

    Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');
    Route::get('/contactus', [PageController::class, 'contactus'])->name('contactus');
    Route::get('/students/{?}', [PageController::class, 'students'])->name('students');
    Route::get('/conditional/{grade?}', [PageController::class, 'conditional'])->name('conditional');
});


