<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Team Member details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([

                        TextInput::make('name')
                            ->required(),
                        FileUpload::make('image')
                            ->image()
                            ->required()
                            ->disk('public')
                            ->directory('team_members'),
                        Select::make('gender')
                            ->required()
                            ->options(['Male', 'Female']),
                        TextInput::make('role'),
                        DatePicker::make('joined_on'),
                        Textarea::make('bio')
                            ->columnSpanFull(),
                        Select::make('status')
                            ->required()
                            ->default('active')
                            ->options(['active', 'left', 'dead']),
                    ]),
            ]);
    }
}
