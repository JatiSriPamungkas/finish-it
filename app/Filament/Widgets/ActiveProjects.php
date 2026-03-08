<?php
namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class ActiveProjects extends Widget
{
    protected string $view = 'filament.widgets.active-projects';

    protected int|string|array $columnSpan = 'full';

    protected function getViewData(): array
    {
        return [
            // 'projects' => Project::where('status', 'active')
            //     ->latest()
            //     ->take(4)
            //     ->get(),
        ];
    }
}
