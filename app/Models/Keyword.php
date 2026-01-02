<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;

class Keyword extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    protected static function booted(): void
    {
        static::saving(function (Keyword $keyword) {
            if ($keyword->isDirty('name') && !$keyword->isDirty('slug')) {
                $slug = Str::slug($keyword->name);
                $keyword->slug = $slug;
            }
        });
    }
}
