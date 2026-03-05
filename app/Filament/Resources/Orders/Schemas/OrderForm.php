<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('customer_name'),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('order_type')
                    ->required()
                    ->default('dine_in'),
                TextInput::make('room_id')
                    ->numeric(),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
