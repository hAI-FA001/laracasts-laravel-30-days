<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag2 extends Model
{
    /** @use HasFactory<\Database\Factories\Tag2Factory> */
    use HasFactory;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
