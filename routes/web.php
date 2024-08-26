<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\DashboardController;




Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\ApplicationController;

Route::middleware(['auth'])->group(function () {
    Route::get('/jobs/{job}/apply', [ApplicationController::class, 'showApplyForm'])->name('jobs.apply');
    Route::post('/jobs/{job}/apply', [ApplicationController::class, 'submitApplication'])->name('jobs.apply.submit');
    Route::get('/applications', [ApplicationController::class, 'manageApplications'])->name('applications.manage');
});


require __DIR__ . '/auth.php';

Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');