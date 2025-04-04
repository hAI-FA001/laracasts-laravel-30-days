<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

// Index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->cursorPaginate(3);

    return view('jobs.index', [
        'jobs' => $jobs,
    ]);
});

// Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Show
// Model Binding
// - wild card and parameter name need to be identical
// - add a type to the parameter
// By default, it fetches based on id, but we can change that: Route::get('posts/{post:slug}')
Route::get('/jobs/{job}', function (Job $job) {
    return view('jobs.show', ['job' => $job]);
});

// Store
Route::post('/jobs', function () {
    request()->validate([
        // ref: https://laravel.com/docs/12.x/validation#available-validation-rules
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});

// Edit
Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', [
        'job' => $job,
    ]);
});

// Update
Route::patch('/jobs/{job}', function (Job $job) {
    // validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    // authorize (later)

    // update job
    // and persist
    // headstart: don't need to fetch it ourselves, check "Route Model Binding"
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);


    // redirect to job-specific page
    return redirect('/jobs/' . $job->id);
});

// Destroy
Route::delete('/jobs/{job}', function (Job $job) {
    // authorize (later)

    // delete job
    $job->delete();  // can inline instead of first storing in $job

    // redirect
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
