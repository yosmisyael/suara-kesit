<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = [
        'post_id',
        'batch_id',
        'filepath',
        'mimetype',
    ];
}
