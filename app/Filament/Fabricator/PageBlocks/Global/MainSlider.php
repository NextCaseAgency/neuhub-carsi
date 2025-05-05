<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class MainSlider extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.sliders')
            ->schema([
                Repeater::make('sliders')
                    ->columns([
                        'sm' => 2,
                        'xl' => 6,
                        '2xl' => 6,
                    ])
                    ->schema([
                        FileUpload::make('image')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ])
                            ->label('Görsel')
                            ->image()
                            ->maxSize(10240)
                            ->disk('public')
                            ->required()
                            ->directory('img'),
                        FileUpload::make('open_image')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ])
                            ->label('Ön Görsel')
                            ->image()
                            ->maxSize(10240)
                            ->disk('public')
                            ->required()
                            ->directory('img'),
                        TextInput::make('subtitle')->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ])->label('Kısa Başlık')->live(onBlur: true),
                        TextInput::make('title')->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ])->label('Başlık'),
                        TextInput::make('description')->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ])->label('Açıklama'),
                        TextInput::make('link_title')->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ])->label('Link Başlık'),
                        TextInput::make('link')->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ])->label('Link Adresi'),
                    ])
                    ->collapsed()
                    ->itemLabel(fn (array $state): ?string => $state['subtitle'] ?? null)
                    ->label('Slider'),
            ])->label('Main Slider');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
