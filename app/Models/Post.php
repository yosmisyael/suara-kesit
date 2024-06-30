<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'is_published',
    ];
    protected $attributes = [
        'is_published' => false
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean'
        ];
    }

    protected static function booted(): void
    {
        self::creating(function (Post $post) {
            $post->setAttribute('slug', Str::slug($post->getAttribute('title')));
            $post->setAttribute('user_id', auth()->id());
        });

        self::deleting(function (Post $post) {
            $post->submissions()->each(function (Submission $submission) {
                $submission->delete();
            });
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function submissions(): HasMany
    {
        return $this->hasMany(Submission::class);
    }
}
