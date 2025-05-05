<?php

namespace App\Filament\Fabricator\PageBlocks\Home;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Slider extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('home.slider')
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
                            ->maxSize(150000)
                            ->disk('public')
                            ->required()
                            ->directory('img'),
//                            ->optimize('webp'),
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
                    ])
                    ->collapsed()
                    ->itemLabel(fn (array $state): ?string => $state['subtitle'] ?? null)
                    ->label('Slider'),
            ])->label('Hero Slider')->visible(fn ($get) => $get('../layout') == 'home');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
