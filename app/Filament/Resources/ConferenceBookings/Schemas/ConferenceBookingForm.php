<?php

namespace App\Filament\Resources\ConferenceBookings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ConferenceBookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('conference_room_id')
                    ->required()
                    ->numeric(),
                TextInput::make('client_name')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                DatePicker::make('event_date')
                    ->required(),
                TextInput::make('attendees')
                    ->numeric(),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
