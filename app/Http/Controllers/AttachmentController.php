<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttachmentRequest;
use App\Models\Attachment;
use App\Services\AttachmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use function Illuminate\Support\Facades\Log;

class AttachmentController extends Controller
{
    protected AttachmentService $attachmentService;

    public function __construct(AttachmentService $attachmentService)
    {
        $this->attachmentService = $attachmentService;
    }

    public function store(StoreAttachmentRequest $request): JsonResponse
    {
        $path2File = $request->file('image')->store('attachments', 'public');

        $attachment = $this->attachmentService->storeTempAttachment(
            $request->input('batch_id'),
            $path2File,
        );

        return response()->json([
            'url' => Storage::disk('public')->url($path2File),
            'attachmentId' => $attachment->id,
        ]);
    }

    public function destroy(string $attachmentId): JsonResponse
    {
        $attachment = Attachment::findOrFail($attachmentId);

        // TODO: ensure attachment delete request belongs to respective user
        $this->attachmentService->deleteAttachment($attachment);

        return response()->json([
            'message' => 'Attachment with id ' . $attachment->id . ' has been removed.',
        ]);
    }
}
