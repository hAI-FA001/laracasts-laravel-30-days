<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    // cursor = starting point/location for the next set of records
    // most performant option
    // downside: shows ?cursor= instead of ?page=, so we can't say "go to page X"
    // scenarios: for infinite scrolling/not accessing a direct URL manually, large datasets, etc
    $jobs = Job::with('employer')->cursorPaginate(3);

    return view('jobs', [
        'jobs' => $jobs,
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
