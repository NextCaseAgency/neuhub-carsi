<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\Repeater;
use Z3d0X\FilamentFabricator\Models\Page;
class Art extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.art')
        ->schema([
            Repeater::make('art')
            ->label('Sanat Galerisi')
                ->schema([
                    Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'category1' => 'ArtOn',
                        'category2' => '.artSümer',
                        'category3' => 'DG Art Project',
                        'category4' => 'Eylül Deniz Artist Studio',
                        'category5' => 'Merkür',
                        'category6' => 'Pi Artworks İstanbul',
                        'category7' => 'Zilberman',
                    ])
                    ->required()
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 6,
                        '2xl' => 6,
                    ]),
                    TextInput::make('title')
                        ->label('Başlık')
                        ->required()
                        ->placeholder('Başlık giriniz...')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),
                    TextInput::make('branc')
                        ->label('Marka İsmi')
                        ->placeholder('Marka İsmi giriniz...')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),
                    DatePicker::make('start_date')
                        ->label('Başlangıç Tarih')
                        ->required()
                        ->placeholder('Başlangıç Tarih giriniz...')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),
                    DatePicker::make('end_date')
                        ->label('Bitiş Tarih')
                        ->required()
                        ->placeholder('Bitiş Tarih giriniz...')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),
                    TextInput::make('location')
                        ->label('Lokasyon')
                        ->required()
                        ->placeholder('Lokasyon giriniz...')
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
                ->maxItems(10),
        ])
        ->label('Art');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
