<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
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
=======

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/job-posts/create', [JobController::class, 'create'])->name('job_posts.create');
Route::post('/job-posts', [JobController::class, 'store'])->name('job_posts.store');


Route::get('/job-posts/index', [JobController::class, 'index'])->name('job_posts.index');

Route::get('/job-posts/{id}/edit', [JobController::class, 'edit'])->name('job_posts.edit');
Route::put('/job_posts/{id}', [JobController::class, 'update'])->name('job_posts.update');

Route::delete('/job-posts/{id}', [JobController::class, 'destroy'])->name('job_posts.destroy');
>>>>>>> 38e621876afad83ef1ea3a156998f435d0dadd51

Route::middleware(['auth', 'checkAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/jobs/{id}/edit', [AdminController::class, 'editJob'])->name('admin.jobs.edit');
    Route::put('/admin/jobs/{id}', [AdminController::class, 'updateJob'])->name('admin.jobs.update');
    Route::delete('/admin/jobs/{id}', [AdminController::class, 'deleteJob'])->name('admin.jobs.delete');
    Route::post('/admin/applications/{id}/accept', [AdminController::class, 'acceptApplication'])->name('admin.applications.accept');
    Route::post('/admin/applications/{id}/reject', [AdminController::class, 'rejectApplication'])->name('admin.applications.reject');
});

Auth::routes();

<<<<<<< HEAD
Route::get('/home', [AdminController::class, 'index'])->name('home');
=======
require __DIR__ . '/auth.php';
>>>>>>> 38e621876afad83ef1ea3a156998f435d0dadd51

Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');