<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

class LeftImageText extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.left-image-text')
            ->schema([
                Tabs::make('İçerik')
                    ->tabs([
                        Tabs\Tab::make('Sol Img')
                            ->schema([
                                FileUpload::make('left_image')
                                    ->label('Görsel')
                                    ->image()
                                    ->maxSize(150000)
                                    ->disk('public')
                                    ->required()
                                    ->directory('img'),
//                                    ->optimize('webp'),
                                TextInput::make('left_title')
                                    ->label('Başlık')
                                    ->required(),
                                TextInput::make('left_description')
                                    ->label('Açıklama')
                                    ->required(),
                                TextInput::make('left_url')
                                    ->label('URL')
                                    ->required(),
                            ]),
                        Tabs\Tab::make('Sağ Img')
                            ->schema([
                                FileUpload::make('right_image')
                                    ->label('Görsel')
                                    ->image()
                                    ->maxSize(150000)
                                    ->disk('public')
                                    ->required()
                                    ->directory('img'),
//                                    ->optimize('webp'),
                                TextInput::make('right_title')
                                    ->label('Başlık')
                                    ->required(),
                                TextInput::make('right_description')
                                    ->label('Açıklama')
                                    ->required(),
                                TextInput::make('right_url')
                                    ->label('URL')
                                    ->required(),
                            ]),
                    ]),
            ])->label('4 Santral Görsel - Metin');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
