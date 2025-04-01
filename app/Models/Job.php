<?php

// Laravel uses PSR4 standard for auto-loading, defined in composer.json
// namespace and its path is defined there
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Job extends Model
{
    // 2 options: rename class to JobListing or do this
    protected $table = 'job_listings';
    protected $fillable = ['title', 'salary'];  // allow mass assignment on these, won't allow user to update id or other attributes
}
