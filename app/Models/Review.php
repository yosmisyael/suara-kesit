<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tonysm\RichTextLaravel\Casts\AsRichTextContent;
use Tonysm\RichTextLaravel\Content;


/**
 * @property Status $status
 * @property Content note
 * @property string $submission_id
 */
class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'submission_id',
        'note',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => Status::class,
            'note' => AsRichTextContent::class,
        ];
    }

    public function submission(): BelongsTo
    {
        return $this->belongsTo(Submission::class);
    }
}
