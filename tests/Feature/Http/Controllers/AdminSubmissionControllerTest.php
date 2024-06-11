<?php

use App\Models\Admin;
use Database\Seeders\DatabaseSeeder;

describe('AdminSubmissionControllerTest', function() {
    beforeEach(function() {
        $this->seed(DatabaseSeeder::class);
        $this->admin = Admin::query()->where('username', 'alpha')->first();
    });

    it('should be able to access submission list page', function () {
        $this->actingAs($this->admin, 'admin')
            ->get(route('admin.submission.index'))
            ->assertOk()
            ->assertViewIs('pages.admin.submissions');
    });
});
