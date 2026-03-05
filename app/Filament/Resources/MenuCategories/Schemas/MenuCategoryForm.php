<?php

namespace App\Filament\Resources\MenuCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MenuCategoryForm
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
            ]);
    }
}
