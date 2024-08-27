<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployerController;




Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

 

require __DIR__.'/auth.php';

Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');
Route::get('/job-posts/create', [JobController::class, 'create'])->name('job_posts.create');
Route::post('/job-posts', [JobController::class, 'store'])->name('job_posts.store');
Route::get('/job-posts/{id}/edit', [JobController::class, 'edit'])->name('job_posts.edit');
Route::put('/job_posts/{id}', [JobController::class, 'update'])->name('job_posts.update');

Route::delete('/job-posts/{id}', [JobController::class, 'destroy'])->name('job_posts.destroy');


Route::get('/job-posts/index', [JobController::class, 'index'])->name('job_posts.index');



Route::get('/employers', [EmployerController::class, 'index'])->name('employers.index');
Route::get('/jobs/{job}/apply', [JobController::class, 'showApplyForm'])->name('jobs.apply');
Route::post('/jobs/{job}/submit', [JobController::class, 'submitApplication'])->name('jobs.submitApplication');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// routes/web.php
use App\Http\Controllers\AdminController;

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/jobs/{job}/accept', [AdminController::class, 'acceptJob'])->name('admin.jobs.accept');
    Route::post('/admin/jobs/{job}/reject', [AdminController::class, 'rejectJob'])->name('admin.jobs.reject');
});








