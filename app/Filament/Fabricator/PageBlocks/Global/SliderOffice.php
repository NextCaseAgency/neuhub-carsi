<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class SliderOffice extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.slider-office')
            ->schema([
                Repeater::make('slider_office')
                    ->label('Ofis Sliderları')
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
                        TextInput::make('content_title')
                            ->label('İçerik Başlık')
                            ->required()
                            ->placeholder('İçerik Başlık giriniz...')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        Textarea::make('content_description')
                            ->label('İçerik Açıklama')
                            ->placeholder('İçerik Açıklama giriniz...')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        TextInput::make('product_sub_title')
                            ->label('Ürün Üst Başlık')
                            ->required()
                            ->placeholder('Ürün Üst Başlık giriniz...')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        TextInput::make('product_title')
                            ->label('Ürün Başlık')
                            ->required()
                            ->placeholder('Ürün Başlık giriniz...')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        Textarea::make('product_description')
                            ->label('Ürün Açıklama')
                            ->placeholder('Ürün Açıklama giriniz...')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        TextInput::make('product_link')
                            ->label('Ürün Link')
                            ->required()
                            ->placeholder('Ürün Link giriniz...')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        TextInput::make('button_text')
                            ->label('Buton Metni')
                            ->required()
                            ->placeholder('Buton Metni giriniz...')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        Repeater::make('product_images')
                            ->label('Ürün Görselleri')
                            ->schema([
                                FileUpload::make('product_image')
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 6,
                                        '2xl' => 6,
                                    ])
                                    ->label('Ürün Görseli')
                                    ->image()
                                    ->maxSize(150000)
                                    ->disk('public')
                                    ->required()
                                    ->directory('img'),
                            ])
                            ->collapsible()
                            ->columns(1)
                            ->minItems(1)
                            ->maxItems(5), // Maksimum 5 ürün görseli
                    ])
                    ->collapsible()
                    ->columns(1)
                    ->minItems(1)
                    ->maxItems(2), // Maksimum 2 ofis sliderı
            ])
            ->label('SliderOffice');

    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
