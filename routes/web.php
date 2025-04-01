<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

$jobs = [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000',
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '$10,000',
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '$40,000',
            ],
        ];

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () use($jobs) {
    return view('jobs', [
        'jobs' => $jobs,
    ]);
});

Route::get('/jobs/{id}', function ($id) use($jobs) {
    // dump($id);
    // dd($id);  // "dump and die"
    
    // either add use($id) after function($job) to access $id
    // or a short closure:
    $job = Arr::first($jobs, fn($job) => $job['id'] == $id);
    // dd($job);

    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
