<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Gallery details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title'),
                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('galleries')
                            ->required(),
                        Select::make('category')
                            ->options(['Restaurant', 'Accommodation', 'Conference', 'Team Building', 'Others']),
                        Textarea::make('description')
                            ->columnSpanFull(),

                    ]),
            ]);
    }
}
