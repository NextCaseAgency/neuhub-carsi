<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Gallery extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.gallery')
            ->schema([
                Repeater::make('galleries')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Görsel')
                            ->image()
                            ->maxSize(150000)
                            ->disk('public')
                            ->required()
                            ->directory('img')
//                            ->optimize('webp'),
                    ])
                    ->collapsed()
                    ->label('Slider'),
            ])->label('Galeri');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
