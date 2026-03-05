<?php

namespace App\Filament\Resources\ConferenceBookings\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ConferenceBookingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('conference_room_id')
                    ->numeric(),
                TextEntry::make('client_name'),
                TextEntry::make('phone'),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('event_date')
                    ->date(),
                TextEntry::make('attendees')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('status'),
                TextEntry::make('notes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
