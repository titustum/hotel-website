<?php

namespace App\Filament\Widgets;

use App\Models\Room;
use App\Models\RoomBooking;
use App\Models\MenuItem;
use App\Models\ConferenceRoom;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TopMainStatsWidget extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected ?string $description = 'Hotel Overview';

    protected function getStats(): array
    {

        return [

            Stat::make('Total Rooms', Room::count())
                ->description('Rooms in the resort')
                ->icon('heroicon-o-home')
                ->color('primary'),

            Stat::make('Bookings Today', RoomBooking::whereDate('check_in', today())->count())
                ->description('Guest check-ins today')
                ->icon('heroicon-o-calendar-days')
                ->color('success'),

            Stat::make('Menu Items', MenuItem::where('available', true)->count())
                ->description('Total menu items available')
                ->icon('heroicon-o-cake')
                ->color('warning'),

            Stat::make('Conference rooms', ConferenceRoom::count())
                ->description('Total conference rooms')
                ->icon('heroicon-o-building-office-2')
                ->color('info'),
        ];
    }
}
