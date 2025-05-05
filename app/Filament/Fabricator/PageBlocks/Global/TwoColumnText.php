<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class TwoColumnText extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.two-column-text')
            ->schema([
                TextInput::make('subtitle')
                    ->label('Üst Başlık')
                    ->required(),
                TextInput::make('title')
                    ->label('Başlık')
                    ->required(),
                RichEditor::make('leftContent')
                    ->label('Sol İçerik')
                    ->required(),
                RichEditor::make('rightContent')
                    ->label('Sağ İçerik')
                    ->required(),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
