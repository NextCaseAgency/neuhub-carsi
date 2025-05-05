<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\Repeater;
use Z3d0X\FilamentFabricator\Models\Page;
class Campaign extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.campaign')
        ->schema([
            Repeater::make('campaigns')
            ->label('Kampanyalar')
                ->schema([
                    Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'avm' => 'AVM',
                        'magaza' => 'Mağaza',
                    ])
                    ->required()
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 6,
                        '2xl' => 6,
                    ]),
                    TextInput::make('title')
                        ->label('Başlık')
                        ->required()
                        ->placeholder('Başlık giriniz...')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),
                    FileUpload::make('image')
                        ->label('Görsel')
                        ->image()
                        ->maxSize(150000)
                        ->disk('public')
                        ->directory('img')
                        ->required()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),
                ])
                ->collapsible()
                ->columns(1)
                ->minItems(1)
                ->maxItems(10),
        ])
        ->label('Campaign');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
