<?php

namespace App\Http\Controllers;

use App\Enums\ImageType;
use App\Http\Requests\UploadImageRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Mockery\Exception;

class ImageController extends Controller
{
    public function store(UploadImageRequest $request): array
    {
        $validated = $request->validated();
        $path = null;
        $file = Str::uuid()->toString() . '.' . $validated['image']->getClientOriginalExtension();

        switch (ImageType::from($validated['type'])) {
            case ImageType::Attachment:
                $path = Storage::disk('public')->path('attachments/' . $file);
                break;
            case ImageType::Profile:
                $path = Storage::disk('public')->path('profiles/' . $file);
                break;
        }

        if (!$path) throw new Exception('An error occurred when saving image.');

        Image::read($validated['image'])
            ->scale(1200)
            ->save($path, progressive: true);

        return [
            'image_url' => ImageType::from($validated['type']) === ImageType::Attachment ?
                Storage::disk('public')->url("attachments/$file")
                :
                Storage::disk('public')->url("profiles/$file"),
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
