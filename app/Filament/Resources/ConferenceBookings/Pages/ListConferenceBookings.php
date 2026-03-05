<?php

namespace App\Filament\Resources\ConferenceBookings\Pages;

use App\Filament\Resources\ConferenceBookings\ConferenceBookingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListConferenceBookings extends ListRecords
{
    protected static string $resource = ConferenceBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
