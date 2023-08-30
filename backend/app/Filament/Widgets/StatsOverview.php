<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('User', User::totalUser(0))
                ->description('Total User')
                ->descriptionIcon('heroicon-m-user')
                ->color('success'),
            Stat::make('Admin', User::totalUser(1))
                ->description('Total Admin')
                ->descriptionIcon('heroicon-m-user')
                ->color('danger'),
            // Stat::make('Average time on page', '3:12')
            //     ->description('3% increase')
            //     ->descriptionIcon('heroicon-m-arrow-trending-up')
            //     ->color('success'),
        ];
    }
}
