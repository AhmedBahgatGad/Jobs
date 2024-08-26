<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JobController;

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

