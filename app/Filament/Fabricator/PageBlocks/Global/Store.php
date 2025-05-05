<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\Repeater;

class Store extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.store')
        ->schema([
            Repeater::make('stores')
            ->label('Mağazalar')
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
                    TextInput::make('phone')
                        ->label('Numara')

                        ->placeholder('Numara giriniz...')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),
                    TextInput::make('link')
                        ->label('Link')
                  
                        ->placeholder('Link giriniz...')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),
                    FileUpload::make('image')
                        ->label('Logo')
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
                    FileUpload::make('store_image')
                        ->label('Harita Görseli')
                        ->image()
                        ->maxSize(150000)
                        ->disk('public')
                        ->directory('img')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),
                ])
                ->collapsible()
                ->columns(1)
                ->minItems(1)
                ->maxItems(80),
        ])
        ->label('Store');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
