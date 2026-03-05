<?php

namespace App\Filament\Resources\RoomTypes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class RoomTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('price_per_night')
                    ->required()
                    ->numeric(),
                TextInput::make('capacity')
                    ->required()
                    ->numeric()
                    ->default(1),
                Toggle::make('featured')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('room_images'),
            ]);
    }
}
