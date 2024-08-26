<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\ApplicationController;

Route::middleware(['auth'])->group(function () {
    Route::get('/jobs/{job}/apply', [ApplicationController::class, 'showApplyForm'])->name('jobs.apply');
    Route::post('/jobs/{job}/apply', [ApplicationController::class, 'submitApplication'])->name('jobs.apply.submit');
    Route::get('/applications', [ApplicationController::class, 'manageApplications'])->name('applications.manage');
});

