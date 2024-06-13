<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;


/**
 * @property string $id
 * @property string $title
 * @property string $content
 * @property bool $is_published
 * @property string $user_id
 * @property string $slug
 * @property User $user
 * @property Collection $submissions
 * @property DateTimeInterface $created_at
 * @property DateTimeInterface $updated_at
 */
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
