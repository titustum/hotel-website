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
                            ->directory('team_members')
                            ->imageEditor()
                            ->avatar(),
                        Select::make('gender')
                            ->required()
                            ->options([
                                'male'=>'Male',
                                'female'=>'Female'
                                ]),
                        TextInput::make('role'),
                        DatePicker::make('joined_on'),
                        Select::make('status')
                            ->required()
                            ->default('active')
                            ->options([
                                'active'=>'Active',
                                'left'=>'Left',
                                'dead'=>'Dead'
                                ]),
                        Textarea::make('bio')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
