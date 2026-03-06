<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

use App\Models\RoomBooking;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Carbon\Carbon;

class RoomBookingChartWidget extends ChartWidget
{
    protected ?string $heading = 'Room Bookings (Last 6 Months)';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = Trend::model(RoomBooking::class)
            ->between(
                start: now()->subMonths(6)->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Room Bookings',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59,130,246,0.2)',
                    'tension' => 0.3, // smooth curve
                    'fill' => true,
                ],
            ],

            'labels' => $data->map(
                fn (TrendValue $value) => Carbon::parse($value->date)->format('M')
            ),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
