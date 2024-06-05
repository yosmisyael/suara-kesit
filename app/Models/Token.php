<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Token extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'is_active'
    ];
    protected $attributes = [
        'is_active' => false
    ];

    public function AuthorApplication(): BelongsTo
    {
        return $this->belongsTo(AuthorApplication::class);
    }

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean'
        ];
    }
}
