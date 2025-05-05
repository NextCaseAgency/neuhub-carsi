<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HeaderBanner extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.header-banner')
            ->schema([
                FileUpload::make('image')
                    ->label('Görsel')
                    ->image()
                    ->maxSize(150000)
                    ->disk('public')
                    ->required()
                    ->directory('img')
//                    ->optimize('webp')
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 6,
                        '2xl' => 6,
                    ]),
                TextInput::make('subtitle')->columnSpan([
                    'sm' => 2,
                    'xl' => 6,
                    '2xl' => 6,
                ])->label('Alt Başlık')

            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
