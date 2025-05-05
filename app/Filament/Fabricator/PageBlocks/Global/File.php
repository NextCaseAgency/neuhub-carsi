<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\Repeater;

class File extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.file')
        ->schema([
            Repeater::make('files')
            ->label('Dosyalar')
                ->schema([
                    FileUpload::make('attachments')
                        ->label('PDF Dosyası')
                        ->acceptedFileTypes(['application/pdf'])
                        ->maxSize(150000)
                        ->disk('public')
                        ->directory('pdf')
                        ->required()
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
        ->label('File');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
