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

    // can also use jobs/index but jobs.index is more common
    return view('jobs.index', [
        'jobs' => $jobs,
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// wildcards should go at the bottom
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    // won't work, gives 419 error due to Cross-Site Request Forgery (CSRF)
    // e.g. filled a form on site A but it POSTs to site B -> cross-site
    // avoided by using a token and comparing the token from the client with the one in the session
    // if it doesn't match, Laravel throws 419 error
    dd('hello');
});

Route::get('/contact', function () {
    return view('contact');
});
