<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageStudentController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;

Route::middleware(['session.user'])->group(function () {
    // All protected routes go here
    Route::get('/dashboard', [UserAccountController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [UserAccountController::class, 'logout'])->name('logout');
    
    // Student routes
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
});

// Authentication routes (no session middleware)
Route::get('/login', [UserAccountController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserAccountController::class, 'login'])->name('users.login');

Route::get('/users/create', [UserAccountController::class, 'create'])->name('users.create');
Route::post('/users', [UserAccountController::class, 'store'])->name('users.store');

Route::get('/update-password', [UserAccountController::class, 'showUpdatePasswordForm'])->name('password.update.form');
Route::post('/update-password', [UserAccountController::class, 'updatePassword'])->name('password.update');

// Additional page routes
Route::get('/maintenance', [PageController::class, 'maintenance']);
Route::get('/', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');
Route::get('/contactus', [PageController::class, 'contactus'])->name('contactus');
Route::get('/conditional/{grade?}', [PageController::class, 'conditional'])->name('conditional');

// Routes for PageController students method (sample student data)
Route::get('/student-samples/{grade?}', [PageController::class, 'students'])->name('students');

// Redirect routes
Route::get('/try', [RedirectController::class, 'showMessage'])->name('RedirectIndex');
Route::get('/redirectme', fn() => redirect()->route('RedirectIndex', ["message" => "This is my message"]));
Route::get('/showSomething/{message}', [RedirectController::class, 'showSomething'])->name('showSomething');
Route::get('/showSomething', [RedirectController::class, 'showSomething']);

// Laravel test route
Route::get('/test', fn() => "Laravel is working!");

// Routes for student management (CRUD)
// Place this route BEFORE the resource route to avoid conflicts
Route::get('/students/toggle-status/{student}', [StudentController::class, 'toggleStatus'])->name('students.toggle-status');
Route::resource('students', StudentController::class);

// Routes protected by session middleware
Route::middleware('session.user')->group(function () {
    Route::post('/logout', [UserAccountController::class, 'logout'])->name('logout');

    Route::get('/', [UserAccountController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [UserAccountController::class, 'dashboard']);

    Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');
    Route::get('/contactus', [PageController::class, 'contactus'])->name('contactus');
    Route::get('/conditional/{grade?}', [PageController::class, 'conditional'])->name('conditional');
});

// Test route to create a user account
Route::get('/test-create-user', function () {
    $user = new \App\Models\UserAccount([
        'username' => 'testuser',
        'password' => \Illuminate\Support\Facades\Hash::make('password123'),
        'defaultpassword' => 'Changeme123', // This is now a string
        'status' => 'active',
    ]);
    
    try {
        $user->save();
        return 'User created successfully with ID: ' . $user->id;
    } catch (\Exception $e) {
        return 'Error creating user: ' . $e->getMessage();
    }
});


