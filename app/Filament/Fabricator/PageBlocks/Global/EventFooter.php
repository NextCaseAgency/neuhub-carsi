<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\Repeater;

class EventFooter extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.event')
        ->schema([
            Repeater::make('events')
            ->label('Etkinlikler')
                ->schema([
                    TextInput::make('title')
                        ->label('Başlık')
                        ->required()
                        ->placeholder('Başlık giriniz...')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),
                    TextInput::make('link')
                        ->label('Link')
                        ->required()
                        ->placeholder('Başlık giriniz...')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),
                    FileUpload::make('image')
                        ->label('Görsel')
                        ->image()
                        ->maxSize(150000)
                        ->disk('public')
                        ->directory('img')
                        ->required()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),
                ])
                ->collapsible()
                ->columns(1)
                ->minItems(1)
                ->maxItems(15),
        ])
        ->label('EventFooter');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
