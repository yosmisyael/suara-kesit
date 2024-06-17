<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'note'
    ];

    protected $attributes = [
        'note' => '',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    protected static function booted(): void
    {
        self::deleting(function (Submission $submission) {
            $submission->reviews()->each(function (Review $review) {
                foreach ($review->note->attachments() as $attachment) {
                    $url = explode('/', $attachment->attachable->url);
                    $file = end($url);
                    Storage::disk('public')->delete('attachments/' . $file);
                }
            });

            $submission->reviews()->delete();
        });
    }
}
