<?php

namespace App\Http\Controllers;

use App\Enums\ImageType;
use App\Http\Requests\UploadImageRequest;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(UploadImageRequest $request): array
    {
        $validated = $request->validated();

        $path = '';

        switch (ImageType::from($validated['type'])) {
            case ImageType::Attachment:
                $path = $validated['image']->storePublicly('attachments', 'public');
                break;

            case ImageType::Profile:
                $path = $validated['image']->storePublicly('profiles', 'public');
                break;
        }

        return [
            'image_url' => Storage::disk('public')->url($path),
        ];
    }

    public function delete(string $name): array
    {
        $result = Storage::disk('public')->delete('attachments/' . $name);

        if (!$result) {
            return ['success' => false];
        }

        return [
            'success' => true,
        ];
    }
}
