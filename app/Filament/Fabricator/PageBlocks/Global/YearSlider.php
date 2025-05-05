<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class YearSlider extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.year-slider')
            ->schema([
                Repeater::make('sliders')
                    ->columns([
                        'sm' => 2,
                        'xl' => 6,
                        '2xl' => 6,
                    ])
                    ->cloneable()
                    ->schema([
                        FileUpload::make('image')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ])
                            ->label('Görsel')
                            ->image()
                            ->maxSize(150000)
                            ->disk('public')
                            ->required()
                            ->directory('img'),
//                            ->optimize('webp'),
                        TextInput::make('year')->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ])->label('Yıl')->live(onBlur: true),
                        TextInput::make('description')->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ])->label('Açıklama'),
                    ])
                    ->collapsed()
                    ->itemLabel(fn (array $state): ?string => $state['year'] ?? null)
                    ->label('Slider'),
            ])->label('Tarih Slider');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
