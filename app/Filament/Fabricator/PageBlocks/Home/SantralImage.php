<?php

namespace App\Filament\Fabricator\PageBlocks\Home;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;

class SantralImage extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('home.santral-image')
            ->schema([
                Tabs::make('Santral Bilgileri')
                    ->tabs([
                        Tabs\Tab::make('İçerik')
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Görsel')
                                    ->image()
                                    ->maxSize(150000)
                                    ->disk('public')
                                    ->directory('img')
                                    ->required(),
//                                    ->optimize('webp'),
                                TextInput::make('title')
                                    ->required()
                                    ->label('Başlık'),
                                TextInput::make('description')
                                    ->required()
                                    ->label('Açıklama'),
                            ]),
                        Tabs\Tab::make('İcon List')
                            ->schema([
                                TextInput::make('sehir')
                                    ->label('Şehir')
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 3,
                                    ]),
                                TextInput::make('santral')
                                    ->label('Santral')
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 3,
                                    ]),
                                TextInput::make('guc')
                                    ->label('Güç')
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 3,
                                    ]),
                                TextInput::make('uretim')
                                    ->label('Üretim')
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 3,
                                    ]),
                                TextInput::make('tedarik')
                                    ->label('Tedarik')
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 3,
                                    ]),
                                TextInput::make('emisyon')
                                    ->label('Emisyon')
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 3,
                                    ]),
                            ])->columns([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                    ]),
            ])->label('Santral Image Map');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
