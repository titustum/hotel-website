<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\RoomBookings\RoomBookingResource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\RoomBooking;
use Carbon\Carbon;
use Filament\Actions\ViewAction;

class RecentBookingsTableWidget extends TableWidget
{
    protected static ?int $sort = 3;

    protected static ?string $heading = 'Recent Room Bookings';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => RoomBooking::latest()->take(6))
            ->columns([
                TextColumn::make('guest_name')
                    ->label('Guest Name')
                    ->sortable(),

                TextColumn::make('room.room_number')
                    ->label('Room')
                    ->sortable(),

                TextColumn::make('check_in')
                    ->label('Check-in')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('check_out')
                    ->label('Check-out')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge(),
            ])
            ->paginated(false)
            ->filters([
                // Example: Filter by status
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                ViewAction::make()->url(fn ($record) => RoomBookingResource::getUrl('view', ['record'=>$record])),
            ])
            ->toolbarActions([

            ]);
    }
}
