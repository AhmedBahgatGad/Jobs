<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');

Route::middleware(['auth', 'checkAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/jobs/{id}/edit', [AdminController::class, 'editJob'])->name('admin.jobs.edit');
    Route::put('/admin/jobs/{id}', [AdminController::class, 'updateJob'])->name('admin.jobs.update');
    Route::delete('/admin/jobs/{id}', [AdminController::class, 'deleteJob'])->name('admin.jobs.delete');
    Route::post('/admin/applications/{id}/accept', [AdminController::class, 'acceptApplication'])->name('admin.applications.accept');
    Route::post('/admin/applications/{id}/reject', [AdminController::class, 'rejectApplication'])->name('admin.applications.reject');
});

Auth::routes();

Route::get('/home', [AdminController::class, 'index'])->name('home');

