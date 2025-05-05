<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\Repeater;

class Solution extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.solution')
            ->schema([
                Repeater::make('solutions')
                ->label('Çözümler')
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

                        Repeater::make('items')
                        ->label('Maddeler')
                            ->schema([
                                TextInput::make('titles')
                                ->label('Maddeler')
                                    ->required()
                                    ->placeholder('Maddeler giriniz...')
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
                    ->collapsible()
                    ->columns(1)
                    ->minItems(1)
                    ->maxItems(10),
            ])
            ->label('Solution');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
