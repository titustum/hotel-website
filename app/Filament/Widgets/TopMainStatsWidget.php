<?php

namespace App\Filament\Widgets;

use App\Models\Room;
use App\Models\RoomBooking;
use App\Models\Order;
use App\Models\MenuItem;
use App\Models\ConferenceBooking;
use App\Models\ContactMessage;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TopMainStatsWidget extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected ?string $description = 'Hotel Overview';

    protected function getStats(): array
    {

        // BOOKINGS TREND (last 7 days)
        $bookingTrend = Trend::model(RoomBooking::class)
            ->between(
                start: now()->subDays(6),
                end: now(),
            )
            ->perDay()
            ->count();

        // ORDERS TREND
        $orderTrend = Trend::model(Order::class)
            ->between(
                start: now()->subDays(6),
                end: now(),
            )
            ->perDay()
            ->count();

        // CONFERENCE BOOKINGS TREND
        $conferenceTrend = Trend::model(ConferenceBooking::class)
            ->dateColumn('event_date')
            ->between(
                start: now()->subDays(6),
                end: now(),
            )
            ->perDay()
            ->count();

        // MESSAGES TREND
        $messageTrend = Trend::model(ContactMessage::class)
            ->between(
                start: now()->subDays(6),
                end: now(),
            )
            ->perDay()
            ->count();



        return [

            Stat::make('Total Rooms', Room::count())
                ->description('Rooms in the resort')
                ->icon('heroicon-o-home')
                ->color('primary'),

            Stat::make('Bookings Today', RoomBooking::whereDate('check_in', today())->count())
                ->description('Guest check-ins today')
                ->icon('heroicon-o-calendar-days')
                ->color('success')
                ->chart(
                    $bookingTrend->map(fn (TrendValue $value) => $value->aggregate)->toArray()
                ),

            Stat::make('Restaurant Orders', Order::whereDate('created_at', today())->count())
                ->description('Orders today')
                ->icon('heroicon-o-cake')
                ->color('warning')
                ->chart(
                    $orderTrend->map(fn (TrendValue $value) => $value->aggregate)->toArray()
                ),

            Stat::make('Conference Events', ConferenceBooking::whereDate('event_date', today())->count())
                ->description('Events today')
                ->icon('heroicon-o-building-office-2')
                ->color('info')
                ->chart(
                    $conferenceTrend->map(fn (TrendValue $value) => $value->aggregate)->toArray()
                ),

            Stat::make('New Messages', ContactMessage::where('status', 'new')->count())
                ->description('Unanswered inquiries')
                ->icon('heroicon-o-envelope')
                ->color('danger')
                ->chart(
                    $messageTrend->map(fn (TrendValue $value) => $value->aggregate)->toArray()
                ),

            Stat::make('Total Menu Items', MenuItem::where('available', 'true')->count())
                ->description('Total menu items')
                ->icon('heroicon-o-cake')
                ->color('success')
                ->chart(
                    $messageTrend->map(fn (TrendValue $value) => $value->aggregate)->toArray()
                ),

        ];
    }
}
