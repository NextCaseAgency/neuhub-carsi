<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class MultipleTitle extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.multiple_title')
            ->schema([
                Repeater::make('titles')
                    ->label('Başlıklar')
                    ->schema([
                        TextInput::make('title')
                            ->label('Başlık')
                            ->required()
                            ->placeholder('Başlık giriniz')
                            ->maxLength(955),
                    ])
                    ->minItems(1)
                    ->maxItems(10)
                    ->columns(1),
            ])
            ->label('Çoklu Başlık');
    }

    public static function mutateData(array $data): array
    {
        unset($data['preview']);
        return  $data;
    }
}
