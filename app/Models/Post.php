<?php

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Post extends Model
{
    use HasRichText, HasFactory;

    protected array $richTextAttributes = [
        'content'
    ];

    protected $fillable = [
        'title',
        'slug',
        'status',
        'content',
        'excerpt',
        'author_id',
        'category_id',
    ];

    protected $casts = [
        'status' => PostStatus::class,
    ];

    // utility methods
    public function scopeWithAuthor(Builder $query, User $user): Builder
    {
        return $query->where('author_id', $user->id);
    }

    public function scopeWithCategory(Builder $query, int $categoryId): Builder
    {
        return $query->when($categoryId !== 0, function (Builder $query) use ($categoryId) {
            return $query->where('category_id', $categoryId);
        });
    }

    public function scopeSearch(Builder $query, string $keyword): Builder
    {
        return $query->when($keyword, function (Builder $query) use ($keyword) {
            $query->where('title', 'ILIKE', "%{$keyword}%");
        });
    }

    public function likesCount(): int
    {
        return $this->likes()->where('is_liked', true)->count();
    }

    public function countComments(): int
    {
        return $this->comments()->count();
    }

    public function generateExcerpt(int $limit = 150): string
    {
        $htmlContent = (string) $this->content;

        $plainText = strip_tags(html_entity_decode($htmlContent));

        $plainText = preg_replace('/\s+/', ' ', $plainText);

        $plainText = trim($plainText);

        return Str::limit($plainText, $limit);
    }

    protected static function booted(): void
    {
        static::saving(function (Post $post) {
            // slug generation
            if ($post->isDirty('title') && !$post->isDirty('slug')) {
                $slug = Str::slug($post->title);

                $pattern = "^" . preg_quote($slug) . "(-[0-9]+)?$";

                $count = static::whereRaw('slug ~ ?', [$pattern])
                    ->where('id', '!=', $post->id)
                    ->count();

                $post->slug = $count ? "$slug-$count" : $slug;
            }

            // excerpt generation
            $plainContent = strip_tags(html_entity_decode($post->content));

            $plainContent = trim(preg_replace('/\s+/', ' ', $plainContent));

            if (empty($post->excerpt) && !empty($plainContent)) {
                $post->excerpt = Str::limit($plainContent, 160);
            }
        });
    }

    // relationship methods
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

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function postStatistic(): HasOne
    {
        return $this->hasOne(PostStatistic::class);
    }
}
