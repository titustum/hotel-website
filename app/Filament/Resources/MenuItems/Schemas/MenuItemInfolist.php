<?php

namespace App\Filament\Resources\MenuItems\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MenuItemInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Gallery details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('menu_category_id')
                            ->numeric(),
                        TextEntry::make('name'),
                        TextEntry::make('description')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('price')
                            ->money(),
                        ImageEntry::make('image')
                            ->placeholder('-'),
                        IconEntry::make('is_signature')
                            ->boolean(),
                        IconEntry::make('is_popular')
                            ->boolean(),
                        IconEntry::make('is_premium')
                            ->boolean(),
                        IconEntry::make('available')
                            ->boolean(),
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->placeholder('-'),
                    ]),
            ]);
    }
}
