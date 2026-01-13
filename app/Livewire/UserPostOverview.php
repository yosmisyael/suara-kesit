<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class UserPostOverview extends Component
{
    public array $chartData = [];
    public array $chartLabels = [];

    public function mount(): void
    {
        $days = 30;
        $visitorsData = [];
        $scoreData = [];
        $labels = [];

        for ($i = $days; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $labels[] = $date->format('M d');

            $isViral = rand(1, 10) > 8;
            $visitors = $isViral ? rand(1500, 2500) : rand(500, 900);

            $engagementBase = $isViral ? rand(2, 5) : rand(5, 12);

            $score = $engagementBase + (rand(-10, 10) / 10);

            $visitorsData[] = $visitors;
            $scoreData[] = round($score, 1);
        }

        $this->chartData = [
            [
                'name' => 'Visitors',
                'type' => 'column',
                'data' => $visitorsData
            ],
            [
                'name' => 'Engagement Score',
                'type' => 'line',
                'data' => $scoreData
            ]
        ];

        $this->chartLabels = $labels;
    }

    public function render(): View
    {
        return view('livewire.user.post-overview', [
        ])->layout('components.layouts.user-with-sidebar', [
                'title' => 'User Post',
                'user' => auth()->user(),
        ]);
    }
}
