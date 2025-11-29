<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\EnrollmentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CommentController;
use Illuminate\Support\Facades\Route;

// Frontend BabyCare Template Routes
use App\Http\Controllers\FrontendController;

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/services', 'services')->name('services');
    Route::get('/programs', 'programs')->name('programs');
    Route::get('/events', 'events')->name('events');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/team', 'team')->name('team');
    Route::get('/testimonials', 'testimonials')->name('testimonials');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/enrollment', 'enrollment')->name('enrollment');

    // Form Submissions
    Route::post('/contact', 'storeContact')->name('contact.store');
    Route::post('/enrollment', 'storeEnrollment')->name('enrollment.store');
});

// Auth Routes
require __DIR__ . '/auth.php';

// User Dashboard (for authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        // Redirect admins to admin dashboard
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes (protected by admin middleware)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Posts Management
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);

    // Teachers Management
    Route::resource('teachers', TeacherController::class);

    // Events Management
    Route::resource('events', EventController::class);

    // Enrollments Management
    Route::resource('enrollments', EnrollmentController::class)->only(['index', 'show', 'edit', 'update', 'destroy']);
    Route::patch('enrollments/{enrollment}/status', [EnrollmentController::class, 'updateStatus'])->name('enrollments.status');

    // Contacts Management
    Route::resource('contacts', ContactController::class)->only(['index', 'show', 'destroy']);
    Route::patch('contacts/{contact}/mark-read', [ContactController::class, 'markAsRead'])->name('contacts.mark-read');

    // Comments Management
    Route::get('comments', [CommentController::class, 'index'])->name('comments.index');
    Route::patch('comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
    Route::patch('comments/{comment}/reject', [CommentController::class, 'reject'])->name('comments.reject');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});
