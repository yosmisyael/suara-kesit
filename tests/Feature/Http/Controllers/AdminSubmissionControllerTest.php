<?php

use App\Enums\Status;
use App\Models\Admin;
use App\Models\Submission;
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

    it('should be able to access submission review page', function () {
        $submission = Submission::query()->first();

        $this->actingAs($this->admin, 'admin')
            ->get(route('admin.submission.edit', ['id' => $submission->id]))
            ->assertOk()
            ->assertViewIs('pages.admin.submission');
    });

    it('should be able to update submission', function () {
        $submission = Submission::query()->first();

        $this->actingAs($this->admin, 'admin')
            ->put(route('admin.submission.update', ['id' => $submission->id]), [
                'status' => 'approved',
                'id' => $submission->id
            ])->assertRedirect(route('admin.submission.index'));

        expect(Submission::query()->find($submission->id)->status)->toBe(Status::Approved);
    });
});
