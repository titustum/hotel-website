<?php

namespace App\Filament\Resources\ConferenceBookings\Pages;

use App\Filament\Resources\ConferenceBookings\ConferenceBookingResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditConferenceBooking extends EditRecord
{
    protected static string $resource = ConferenceBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
