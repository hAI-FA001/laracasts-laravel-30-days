<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

class Job
{
    public static function all(): array
    {
        return [
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
    }
}

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
