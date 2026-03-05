<?php

namespace App\Filament\Resources\ConferenceBookings\Pages;

use App\Filament\Resources\ConferenceBookings\ConferenceBookingResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConferenceBooking extends ViewRecord
{
    protected static string $resource = ConferenceBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
