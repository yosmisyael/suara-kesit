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
            ->post(route('image.store'), [
                'image' => $image,
                'type' => 'attachment'
            ]);
        $response->assertOk();
        expect(json_decode($response->baseResponse->getContent())->image_url)->toBeString();
    });

    it('should be able to reject upload request if file is not image', function () {
        $image = UploadedFile::fake()->image('test.text');
        $this->actingAs($this->admin, 'admin')
            ->post(route('image.store'), [
                'image' => $image,
                'type' => 'attachment'
            ])->assertSessionHasErrors(['image' => 'The image field must be an image.']);
    });

    it('should be able to reject upload request if image size is more than 1mb', function () {
        $image = UploadedFile::fake()->image('test.jpg')->size(1001);
        $this->actingAs($this->admin, 'admin')
            ->post(route('image.store'), [
                'image' => $image,
                'type' => 'attachment'
            ])->assertSessionHasErrors(['image' => 'The image field must not be greater than 1000 kilobytes.']);
    });

    it('should be able to reject upload request if image field is missing', function () {
        $this->actingAs($this->admin, 'admin')
            ->post(route('image.store'), [
                'type' => 'attachment'
            ])->assertSessionHasErrors(['image' => 'The image field is required.']);
    });

    it('should be able to reject upload request if type is invalid', function () {
        $image = UploadedFile::fake()->image('test.jpg');
        $this->actingAs($this->admin, 'admin')
            ->post(route('image.store'), [
                'image' => $image,
                'type' => 'wrong'
            ])
            ->assertSessionHasErrors(['type' => 'The selected type is invalid.']);
    });

    it('should be able to reject upload request if type field is missing', function () {
        $image = UploadedFile::fake()->image('test.jpg')->size(1001);
        $this->actingAs($this->admin, 'admin')
            ->post(route('image.store'), [
                'image' => $image,
            ])->assertSessionHasErrors(['type' => 'The type field is required.']);
    });

    it('should be able to delete attachment image', function () {
        $image = UploadedFile::fake()->image('test.jpg');
        $response = $this->actingAs($this->admin, 'admin')
            ->post(route('image.store'), [
                'image' => $image,
                'type' => 'attachment'
            ]);
        $response->assertOk();
        expect(json_decode($response->baseResponse->getContent())->image_url)->toBeString();

        $url = explode('/', json_decode($response->baseResponse->getContent())->image_url);
        $filename = end($url);
        $this->actingAs($this->admin, 'admin')
            ->delete(route('image.delete', ['name' => $filename]))
            ->assertOk();
        expect(Storage::disk('public')->get('attachments/' . $filename))->toBeNull();
    });

});
