<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(Request $request): array
    {
        $request->validate([
            'attachment' => ['required', 'image'],
        ]);

        $path = request()->file('attachment')->storePublicly('attachments', 'public');

        return [
            'image_url' => Storage::disk('public')->url($path),
        ];
    }

    public function delete(Request $request): array
    {
        $request->validate([
            'attachment' => ['required', 'string'],
        ]);

        Storage::disk('public')->delete('attachments', $request->input('attachment'));

        return [
            'success' => true,
        ];
    }
}
