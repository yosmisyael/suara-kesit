<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'title',
        'content',
    ];

    protected static function booting()
    {
        parent::booting();

        self::creating(function (Post $post) {
            $post->slug = Str::slug($post->title, '-');
            $post->user_id = auth()->id();
        });
    }
}
