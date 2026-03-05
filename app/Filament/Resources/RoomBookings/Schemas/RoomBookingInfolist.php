<?php

namespace App\Filament\Resources\RoomBookings\Schemas;

use App\Models\RoomBooking;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RoomBookingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('room_id')
                    ->numeric(),
                TextEntry::make('guest_name'),
                TextEntry::make('guest_phone'),
                TextEntry::make('guest_email')
                    ->placeholder('-'),
                TextEntry::make('check_in')
                    ->date(),
                TextEntry::make('check_out')
                    ->date(),
                TextEntry::make('total_price')
                    ->money()
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
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (RoomBooking $record): bool => $record->trashed()),
            ]);
    }
}
