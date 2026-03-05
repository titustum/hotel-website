<?php

namespace App\Filament\Resources\ConferenceBookings;

use App\Filament\Resources\ConferenceBookings\Pages\CreateConferenceBooking;
use App\Filament\Resources\ConferenceBookings\Pages\EditConferenceBooking;
use App\Filament\Resources\ConferenceBookings\Pages\ListConferenceBookings;
use App\Filament\Resources\ConferenceBookings\Pages\ViewConferenceBooking;
use App\Filament\Resources\ConferenceBookings\Schemas\ConferenceBookingForm;
use App\Filament\Resources\ConferenceBookings\Schemas\ConferenceBookingInfolist;
use App\Filament\Resources\ConferenceBookings\Tables\ConferenceBookingsTable;
use App\Models\ConferenceBooking;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ConferenceBookingResource extends Resource
{
    protected static ?string $model = ConferenceBooking::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'client_name';

    public static function form(Schema $schema): Schema
    {
        return ConferenceBookingForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ConferenceBookingInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConferenceBookingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListConferenceBookings::route('/'),
            'create' => CreateConferenceBooking::route('/create'),
            'view' => ViewConferenceBooking::route('/{record}'),
            'edit' => EditConferenceBooking::route('/{record}/edit'),
        ];
    }
}
