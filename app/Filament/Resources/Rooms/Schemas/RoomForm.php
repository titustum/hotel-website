<?php

namespace App\Filament\Resources\Rooms\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RoomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('room_type_id')
                    ->required()
                    ->numeric(),
                TextInput::make('room_number')
                    ->required(),
                TextInput::make('floor'),
                TextInput::make('status')
                    ->required()
                    ->default('available'),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
