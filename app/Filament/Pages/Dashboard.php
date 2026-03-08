<?php
namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function getTitle(): string
    {
        return 'Good Morning, Jati 👋🏻';
    }

    public function getSubheading(): ?string
    {
        return 'This is an overview to your projects today.';
    }
}
