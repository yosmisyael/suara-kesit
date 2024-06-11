<?php

use App\Enums\Status;
use App\Models\Admin;
use App\Models\Review;
use App\Models\Submission;
use Database\Seeders\DatabaseSeeder;

describe('AdminReviewController', function () {
    beforeEach(function() {
        $this->seed(DatabaseSeeder::class);
        $this->admin = Admin::query()->where('username', 'alpha')->first();
    });

    it('should be able to access submission review page', function () {
        $submission = Submission::query()->first();

        $this->actingAs($this->admin, 'admin')
            ->get(route('admin.review.create', ['id' => $submission->id]))
            ->assertOk()
            ->assertViewIs('pages.admin.review');
    });

    it('should be able to create submission review', function () {
        $submission = Submission::query()->first();

        $this->actingAs($this->admin, 'admin')
            ->post(route('admin.review.store', ['id' => $submission->id]), [
                'status' => 'approved',
                'submission_id' => $submission->id,
                'note' => 'good work',
            ])->assertRedirect(route('admin.submission.index'))
            ->assertSessionHas('success', 'Submission has been reviewed.');

        expect(Review::query()->where('submission_id', $submission->id)->first()->status)->toBe(Status::Approved);
    });
});

