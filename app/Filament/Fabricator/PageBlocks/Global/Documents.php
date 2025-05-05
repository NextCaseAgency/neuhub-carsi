<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Documents extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.documents')
            ->schema([
                Repeater::make('documents')
                    ->schema([
                        TextInput::make('title')
                            ->label('Başlık')
                            ->required(),
                        FileUpload::make('file')
                            ->label('Döküman PDF')
                            ->preserveFilenames()
                            ->disk('public')
                            ->required()
                            ->directory('file'),
                    ])
                    ->collapsible()
                    ->collapsed()
                    ->itemLabel(fn(array $state): ?string => $state['title'] ?? null)
            ])->label('Döküman List');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
