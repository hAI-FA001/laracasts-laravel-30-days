<?php

// Laravel uses PSR4 standard for auto-loading, defined in composer.json
// namespace and its path is defined there
namespace App\Models;

use Illuminate\Support\Arr;

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

    public static function find(int $id): array  // return type helps catch errors in earlier parts of code
    {
        // static:: cuz we're already in Job class
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);

        if(! $job) {
            abort(404);
        }

        return $job;
    }
}
