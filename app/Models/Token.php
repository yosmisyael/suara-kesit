<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'token',
        'is_active'
    ];
    protected $attributes = [
        'is_active' => false
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean'
        ];
    }
}
