<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    // is similar to the Gate we defined
    // migrated from a simple gate closure to a dedicated policy
    public function edit(User $user, Job $job): bool
    {
        return $job->employer->user->is($user);
    }
}
