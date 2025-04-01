<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;


Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::all(),
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    // dump($id);
    // dd($id);  // "dump and die"

    // either add use($id) after function($job) to access $id
    // or a short closure:
    $job = Arr::first(Job::all(), fn($job) => $job['id'] == $id);
    // dd($job);

    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
