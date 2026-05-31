<?php

namespace App\Livewire;

use App\Enums\EditorialAction;
use App\Enums\PostStatus;
use App\Models\Editorial;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class EditorSubmissionOverview extends Component
{
    use WithPagination;

    public function render(): View
    {
        $submissions = Editorial::query()->with(['post'])->where('action', '=', EditorialAction::SUBMIT)
            ->whereHas('post', function (Builder $query) {
                $query->where('status', PostStatus::PENDING);
            })->paginate(5);

        return view('livewire.editor.submission-overview', [
            'submissions' => $submissions,
        ])
            ->layout('components.layouts.user', [
                'title' => 'Submission Overview',
                'user' => auth()->user(),
            ]);
    }
}
