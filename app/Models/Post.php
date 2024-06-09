<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
            $post->slug = Str::slug($post->title);
            $post->user_id = auth()->id();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
