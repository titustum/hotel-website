<?php

namespace App\Filament\Resources\ConferenceRooms\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ConferenceRoomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('capacity')
                    ->required()
                    ->numeric(),
                TextInput::make('price_per_day')
                    ->required()
                    ->numeric(),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('conference_images'),
            ]);
    }
}
