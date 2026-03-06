<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeamMemberInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Team Member details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([

                        TextEntry::make('name'),
                        ImageEntry::make('image'),
                        TextEntry::make('gender'),
                        TextEntry::make('role')
                            ->placeholder('-'),
                        TextEntry::make('joined_on')
                            ->date()
                            ->placeholder('-'),
                        TextEntry::make('bio')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('status'),
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
