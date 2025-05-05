<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Title extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.title')
            ->schema([
                TextInput::make('title')
                    ->label('Başlık')
                    ->placeholder('Başlık giriniz')
                    ->maxLength(255),
            ])->label('Başlık');
    }

    public static function mutateData(array $data): array
    {
        unset($data['preview']);
        return  $data;
    }
}
