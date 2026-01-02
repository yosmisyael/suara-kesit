<?php

namespace App\Models;

use App\EditorialAction;
use Illuminate\Database\Eloquent\Model;

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
}
