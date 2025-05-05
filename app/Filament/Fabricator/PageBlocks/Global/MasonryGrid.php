<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

class MasonryGrid extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.masonry-grid')
            ->schema([
                Repeater::make('grids')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Görsel')
                            ->image()
                            ->maxSize(150000)
                            ->disk('public')
                            ->directory('hero_image'),
//                            ->optimize('webp'),
                        TextInput::make('title')
                            ->required(),
                        TextInput::make('description'),
                        TextInput::make('button_name')
                            ->required(),
                        TextInput::make('url')
                            ->required(),
                    ])
                    ->cloneable()
                    ->collapsible()
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
