<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Image extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.image')
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
                    ->directory('img')
//                    ->optimize('webp'),
            ])->label('Görsel');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
