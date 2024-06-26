<?php

namespace Tests\Http\Controllers;

use App\Models\Admin;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

describe('ImageControllerTest', function() {
    beforeEach(function() {
        $this->seed(DatabaseSeeder::class);
        $this->admin = Admin::query()->where('username', 'alpha')->first();
    });

    afterEach(function () {
        $files = Storage::disk('public')->files('attachments');
        Storage::disk('public')->delete($files);
    });

    it('should be able to store image as attachments', function () {
        $image = UploadedFile::fake()->image('test.jpg');
        $response = $this->actingAs($this->admin, 'admin')
            ->post(route('admin.attachment.store'), [
                'image' => $image,
                'type' => 'attachment'
            ]);
        $response->assertOk();
        expect(json_decode($response->baseResponse->getContent())->image_url)->toBeString();
    });

    it('should be able to delete attachment image', function () {
        $image = UploadedFile::fake()->image('test.jpg');
        $response = $this->actingAs($this->admin, 'admin')
            ->post(route('admin.attachment.store'), [
                'image' => $image,
                'type' => 'attachment'
            ]);
        $response->assertOk();
        expect(json_decode($response->baseResponse->getContent())->image_url)->toBeString();

        $url = explode('/', json_decode($response->baseResponse->getContent())->image_url);
        $filename = end($url);
        $this->actingAs($this->admin, 'admin')
            ->delete(route('admin.attachment.delete', ['name' => $filename]))
            ->assertOk();
        expect(Storage::disk('public')->get('attachments/' . $filename))->toBeNull();
    });

});
