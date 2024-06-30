<?php

namespace Tests\Http\Middleware;

use App\Models\Admin;
use App\Models\User;
use Database\Seeders\AdminSeeder;
use Database\Seeders\RolesAndPermissionSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

describe('AllowAuthenticatedAdminOrUser', function() {
    beforeEach(function() {
        $this->seed(RolesAndPermissionSeeder::class);
    });

    afterEach(function () {
        $directories = ['attachments', 'profiles'];

        foreach ($directories as $directory) {
            Storage::disk('public')->delete($directory);
        }
    });

    it('should be able to upload image for authenticated admin', function () {
        $this->seed(AdminSeeder::class);

        /** @var Authenticatable $admin */
        $admin = Admin::query()->where('username', 'alpha')->first();

        $image = UploadedFile::fake()->image('test.jpg');

        $response = $this->actingAs($admin, 'admin')
            ->post(route('image.store'), [
                'image' => $image,
                'type' => 'attachment'
            ]);

        $response->assertOk();

        expect(json_decode($response->baseResponse->getContent())->image_url)->toBeString();
    });

    it('should be able to upload image for authenticated user', function () {
        $this->seed(UserSeeder::class);

        /** @var Authenticatable $user */
        $user = User::query()->where('username', 'alpha')->first();

        $image = UploadedFile::fake()->image('test.jpg');

        $response = $this->actingAs($user)
            ->post(route('image.store'), [
                'image' => $image,
                'type' => 'profile'
            ]);

        $response->assertOk();

        expect(json_decode($response->baseResponse->getContent())->image_url)->toBeString();
    });
});
