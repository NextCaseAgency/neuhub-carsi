<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Slider extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.slider')
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
                            ->label('Video')
                            ->maxSize(150000)
                            ->disk('public')
                            ->required(),
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
                        TextInput::make('url')->columnSpan([
                            'sm' => 2,
                            'xl' => 3,
                            '2xl' => 3,
                        ])->label('URL'),
                        TextInput::make('button_name')->columnSpan([
                            'sm' => 2,
                            'xl' => 3,
                            '2xl' => 3,
                        ])->label('Buton Metni'),
                    ])
                    ->collapsed()
                    ->itemLabel(fn (array $state): ?string => $state['subtitle'] ?? null)
                    ->label('Slider'),
            ])->label('Hero Slider')->visible(fn ($get) => $get('../layout') == 'corporate');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
