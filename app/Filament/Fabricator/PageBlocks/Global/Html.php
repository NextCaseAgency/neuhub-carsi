<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Textarea;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Html extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.html')
            ->schema([
                Textarea::make('html')
                ->label('HTML Kod')
            ])->label('HTML Video');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
