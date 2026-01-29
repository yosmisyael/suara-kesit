<?php

namespace App\Services;

use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class AttachmentService
{
    /**
     * Create a "draft" attachment record.
     */
    public function storeTempAttachment(string $batchId, string $filepath, ?int $postId): Attachment
    {
        return Attachment::query()->create([
            'batch_id' => $batchId,
            'post_id' => $postId,
            'filepath' => $filepath,
            'mimetype' => Storage::mimeType($filepath),
        ]);
    }

    /**
     * Permanently delete an attachment from DB and Storage.
     */
    public function deleteAttachment(Attachment $attachment): void
    {
        if (Storage::disk('public')->exists($attachment->filepath)) {
            Storage::disk('public')->delete($attachment->filepath);
        }

        $attachment->delete();
    }

    /**
     * Handle image deletion on Trix "undo" or "remove" event.
     */
    public function deleteByUrl(string $url): bool
    {
        // TODO: implement image removal on Trix undo events

        return false;
    }
}
