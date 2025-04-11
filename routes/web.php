<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

// issue with one liner: middleware applies to all routes
// Route::resource('jobs', JobController::class)->middleware('auth');

// 1 solution
// Route::resource('jobs', JobController::class)->only(['index', 'show']);
// Route::resource('jobs', JobController::class)->except(['index', 'show'])->middleware('auth');

// better to revert to single-route declarations
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);

// multiple middlewares, can:gate-name,implicit-model-binding
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware(['auth', 'can:edit-job,job']);

// another way for multiple middlewares
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    // laravel will know there's a link between Job model and Job policy
    // finds job policy and runs edit()
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update'])
    ->middleware('auth')
    ->can('edit-job', 'job');

Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
    ->middleware('auth')
    ->can('edit-job', 'job');


// Auth
Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);

// laravel looks for route named login if auth middleware fails
// check named-routes in docs
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post("/logout", [SessionController::class, 'destroy']);

Route::get('/test', function () {
    Mail::to('test@gmail.com')->send(new JobPosted());
    return 'Done';
});
