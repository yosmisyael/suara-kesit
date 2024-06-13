<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function __invoke(Request $request): array
    {
        $request->validate([
            'attachment' => ['required', 'image'],
        ]);

        $path = request()->file('attachment')->storePublicly('attachments', 'public');
        Log::info("file saved $path");
        return [
            'image_url' => Storage::disk('public')->url($path),
        ];
    }
}
