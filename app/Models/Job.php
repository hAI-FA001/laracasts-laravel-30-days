<?php

// Laravel uses PSR4 standard for auto-loading, defined in composer.json
// namespace and its path is defined there
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_listings';
    protected $fillable = ['title', 'salary'];  // mass assignable

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
    // $job->employer (as an attribute, not function)

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');  // override this so it points to correct column
    }
    // $job->tags
}
