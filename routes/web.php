<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\EnrollmentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostImageController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Frontend BabyCare Template Routes
Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/blog/{slug}', 'postDetail')->name('blog.show');

    // Form Submissions với Rate Limiting (5 requests/phút)
    Route::middleware(['throttle.form:5,1'])->group(function () {
        Route::post('/contact', 'storeContact')->name('contact.store');
        Route::post('/enrollment', 'storeEnrollment')->name('enrollment.store');
    });
});

// Auth Routes
require __DIR__ . '/auth.php';

// Admin Routes (protected by admin middleware)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Posts Management
    Route::resource('posts', PostController::class);
    Route::post('posts/upload-image', [PostImageController::class, 'upload'])->name('posts.upload');
    Route::resource('categories', CategoryController::class);
    // Teachers Management
    Route::resource('teachers', TeacherController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('branches', BranchController::class);
    // Settings Routes
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
    // Enrollments Management
    Route::resource('enrollments', EnrollmentController::class)->only(['index', 'show', 'edit', 'update', 'destroy']);
    Route::patch('enrollments/{enrollment}/status', [EnrollmentController::class, 'updateStatus'])->name('enrollments.status');

    // User Management (Admins)
    Route::resource('users', UserController::class);
    Route::patch('users/{user}/status', [UserController::class, 'toggleStatus'])->name('users.status');

    // Contacts Management
    Route::resource('contacts', ContactController::class)->only(['index', 'show', 'destroy']);
    Route::patch('contacts/{contact}/mark-read', [ContactController::class, 'markAsRead'])->name('contacts.mark-read');

});
