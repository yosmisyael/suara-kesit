<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    protected static function booted(): void
    {
        static::saving(function (Category $category) {
            if ($category->isDirty('name') && !$category->isDirty('slug')) {
                $slug = Str::slug($category->name);
                $category->slug = $slug;
            }
        });
    }
}
