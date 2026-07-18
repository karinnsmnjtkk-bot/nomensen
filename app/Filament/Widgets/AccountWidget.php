<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class AccountWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Welcome', Auth::user()->name ?? 'Administrator')
                ->description('Logged in as ' . (Auth::user()->email ?? ''))
                ->descriptionIcon('heroicon-m-user')
                ->color('primary'),
            Stat::make('Filament Version', 'v3.x')
                ->description('Admin Panel Dashboard')
                ->descriptionIcon('heroicon-m-cog-6-tooth')
                ->color('success'),
        ];
    }

    protected function getColumns(): int
    {
        return 2;
    }
}
