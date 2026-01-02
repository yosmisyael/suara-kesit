<?php

namespace App\Models;

use App\PostStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'status',
    ];

    protected $casts = [
        'status' => PostStatus::class,
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function keywords(): MorphToMany
    {
        return $this->morphToMany(Keyword::class, 'taggable');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(PostLike::class);
    }

    public function likesCount(): int
    {
        return $this->likes()->where('is_liked', true)->count();
    }

    public function countComments(): int
    {
        return $this->comments()->count();
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function postStatistic(): HasOne
    {
        return $this->hasOne(PostStatistic::class);
    }

    protected static function booted(): void
    {
        static::saving(function (Post $post) {
            if ($post->isDirty('title') && !$post->isDirty('slug')) {
                $slug = Str::slug($post->title);

                $count = static::whereRaw("slug RLIKE '^$slug(-[0-9]+)?$'")
                    ->where('id', '!=', $post->id) // exclude self
                    ->count();

                $post->slug = $count ? "$slug-$count" : $slug;
            }
        });
    }
}
