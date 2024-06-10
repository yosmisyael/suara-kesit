<?php

namespace App\Models;

use App\Enums\AuthorApplicationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'post_id',
        'note'
    ];

    protected function casts(): array
    {
        return [
            'status' => AuthorApplicationStatus::class
        ];
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
