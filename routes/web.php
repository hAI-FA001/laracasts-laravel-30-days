<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    // convention over configuration: assumes we have table called jobs for class called Job, but ours is called job_listings
    $jobs = Job::all();
    // dd($jobs);
    dd($jobs[0]->title);
    // return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::all(),
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
