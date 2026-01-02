<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostStatistic extends Model
{
    protected $fillable = [
        'visitor',
        'post_id',
    ];
}
