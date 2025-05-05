<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\Repeater;

class Station extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.station')
        ->schema([
            Repeater::make('stations')
            ->label('Duraklar')
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

                    Repeater::make('stations')
                    ->label('Duraklar')
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

                            Repeater::make('stations')
                                ->label('Saatler')
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
                                ])
                        ])


                ])
                ->collapsible()
                ->columns(1)
                ->minItems(1)
                ->maxItems(15),
        ])
        ->label('Station');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
