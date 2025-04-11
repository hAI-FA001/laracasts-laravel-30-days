<?php

namespace App\Jobs;

use App\Models\Job;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class TranslateJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Job $jobListing)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // logger('hello from TranslateJob');
        // e.g.
        // AI::translate($this->jobListing->title, 'spanish');
        // Point: long-running process that takes time should not be part of the current request
        logger('Translating ' . $this->jobListing->title . ' to Spanish.');
    }
}
