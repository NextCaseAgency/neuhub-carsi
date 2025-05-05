<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Social extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.social')
            ->schema([
                Textarea::make('google_map')
                    ->required(),
                Textarea::make('address')
                    ->required(),
                Textarea::make('phone')
                    ->required(),
                Textarea::make('email')
                    ->required(),
                Textarea::make('cookie_text')
                    ->required(),
            ])->label('Social');
    }

    public static function mutateData(array $data): array
    {
        unset($data['preview']);
        return  $data;
    }
}
