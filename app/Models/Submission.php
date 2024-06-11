<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
