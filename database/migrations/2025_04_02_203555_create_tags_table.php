<?php

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // no restriction on number of schemas within 1 migration
        // might be better if doing it all at once right now, but might prefer a separate migration for something a month from now
        // naming: Jobs Tags -> singular: job tag -> underscore: job_tag
        Schema::create('job_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Job::class, 'job_listing_id');  # override column name so it doesn't point to job_id
            $table->foreignIdFor(Tag::class);
            $table->timestamps();  // depends, sometimes you wanna track it for pivot tables
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
