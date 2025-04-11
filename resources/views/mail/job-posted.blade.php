<h2>
    {{ $job->title }}
</h2>

<p>
    Congrats! Your job is now live on our website.
</p>

<p>
    {{-- user won't be in our website, so we can't just do /jobs/etc --}}
    <a href="{{ url('/jobs/' . $job->id) }}">View Your Job Listing</a>
</p>
