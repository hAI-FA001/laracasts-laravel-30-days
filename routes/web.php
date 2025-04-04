<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::resource('jobs', JobController::class, [
    // 'only' => ['index', 'show', 'create', 'store'],
    // 'except' => ['edit'],
]);

Route::view('/contact', 'contact');
