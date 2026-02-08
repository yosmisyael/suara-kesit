<?php

namespace App\Models;

use App\Enums\EditorialAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Editorial extends Model
{
    protected $fillable = [
        'action',
        'review',
        'post_id',
        'user_id',
    ];

    protected $casts = [
        'action' => EditorialAction::class,
    ];

    // relationship methods
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
