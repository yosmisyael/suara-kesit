<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'token',
        'user_id'
    ];
    protected $attributes = [
        'status' => Status::Pending
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function token(): HasOne
    {
        return $this->hasOne(Token::class);
    }

    protected function casts(): array
    {
        return [
            'status' => Status::class
        ];
    }
}
