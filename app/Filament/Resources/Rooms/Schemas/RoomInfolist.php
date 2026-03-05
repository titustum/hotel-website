<?php

namespace App\Filament\Resources\Rooms\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RoomInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('room_type_id')
                    ->numeric(),
                TextEntry::make('room_number'),
                TextEntry::make('floor')
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
